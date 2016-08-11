<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 11:33
 */

namespace CorpWeChat\Api;

use GuzzleHttp\HandlerStack;
use CorpWeChat\Response\BaseResponse;
use CorpWeChat\CorpWeChat;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use GuzzleHttp\Middleware;

/**
 * Class AbstractApi
 * @package CorpWeChat\Api
 */
abstract class AbstractApi
{
    /**
     *
     */
    const BASE_API_URL = 'https://qyapi.weixin.qq.com/cgi-bin/';

    /**
     * @var CorpWeChat
     */
    protected $wx;

    /**
     * BaseApi constructor.
     * @param CorpWeChat $wx
     */
    public function __construct(CorpWeChat $wx)
    {
        $this->wx = $wx;
    }

    /**
     * Get方式请求
     * @param string       $api
     * @param array        $param Get参数
     * @param BaseResponse $response
     * @param array        $options
     * @return BaseResponse
     */
    protected function httpGet($api, $param, BaseResponse $response, array $options = [])
    {
        $api = self::BASE_API_URL.$api;
        if (!empty($param)) {
            $api = $api.'?'.http_build_query($param);
        }

        return $this->httpRequest('GET', $api, $response, $options);
    }

    /**
     * 上传文件
     * @param string       $api
     * @param array        $files key => value 格式的数组,key为参数名,value可以是文件内容、fopen的句柄或者Psr\Http\Message\StreamInterface
     * @param BaseResponse $response
     * @param array        $options
     * @return BaseResponse
     */
    protected function httpUpload($api, $files, BaseResponse $response, array $options = [])
    {
        $api                  = self::BASE_API_URL.$api;
        $options['multipart'] = [];
        foreach ($files as $name => $content) {
            $options['multipart'][] = [
                'name'    => $name,
                'content' => $content,
            ];
        }

        return $this->httpRequest('POST', $api, $response, $options);
    }

    /**
     * Post方式请求,数据以JSON格式传输
     * @param string       $api
     * @param array        $param
     * @param BaseResponse $response
     * @param array        $options
     * @return BaseResponse
     */
    protected function httpPostJson($api, $param, BaseResponse $response, array $options = [])
    {
        $api             = self::BASE_API_URL.$api;
        $options['json'] = $param;

        return $this->httpRequest('POST', $api, $response, $options);
    }

    /**
     * 发起http请求
     * @param string       $method
     * @param string       $url
     * @param BaseResponse $response
     * @param array        $options
     * @return BaseResponse
     */
    protected function httpRequest($method, $url, BaseResponse $response, $options = [])
    {
        $options['handler'] = $this->createHandler();
        $this->wx->getLog()->debug(sprintf('WeChat request: %s %s', $method, $url), $options);
        $origin = $this->wx->getHttpClient()->request($method, $url, $options);
        $response->setOriginResponse($origin);
        $this->wx->getLog()->debug(sprintf('WeChat response: code: %d'));

        return $response;
    }

    /**
     * @return callable
     */
    private function retryMiddleware()
    {
        return Middleware::retry(
            function ($retries, RequestInterface $request, ResponseInterface $response = null) {
                $this->wx->getLog()->warning('WeChat request retry, current: '.$retries);
                //超出设置的重试次数,不再重试
                if ($retries > $this->wx->getConfig()->getRetryCount()) {
                    return false;
                }

                //没有正确的response对象,或者返回码不是200,需要重试
                if (!$response || $response->getStatusCode() != 200) {
                    return true;
                }

                //不是json串,不重试
                if (stripos($response->getHeader('Content-Type'), 'json') === false) {
                    return false;
                }

                //access token错误,替换token之后重新请求
                $decode = \GuzzleHttp\json_decode($response->getBody(), true);
                if (isset($decode['errcode']) && $decode['errcode'] == '42001') {
                    $this->attachAccessToken($request, false);

                    return true;
                }

                //其他情况不需要重试
                return false;
            }
        );
    }

    /**
     * @return \Closure
     */
    private function accessTokenMiddleware()
    {
        return function (callable $handler) {
            return function (RequestInterface $request, array $options) use ($handler) {
                $whiteList = [
                    'gettoken',
                ];
                $uri       = $request->getUri();
                //不是微信企业号的域名,不加token
                if (strtolower($uri->getHost()) != strtolower(parse_url(AbstractApi::BASE_API_URL, PHP_URL_HOST))) {
                    return $handler($request, $options);
                }

                //白名单的api也不加token
                $api = preg_replace('~/cgi\-bin/~', '', $uri->getPath(), 1);
                if (in_array($api, $whiteList)) {
                    return $handler($request, $options);
                }

                //其他情况在uri后加入access_token参数
                $this->attachAccessToken($request);

                return $handler($request, $options);
            };
        };
    }

    /**
     * 在请求的url后加上access token参数
     * @param RequestInterface $request
     * @param bool             $cache
     */
    private function attachAccessToken(RequestInterface $request, $cache = true)
    {
        $query                 = \GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery());
        $query['access_token'] = $this->wx->getAccessToken($cache);
        $request->withUri(http_build_query($query));
    }

    /**
     * @return HandlerStack
     */
    private function createHandler()
    {
        $stack = HandlerStack::create();
        $stack->push($this->retryMiddleware());
        $stack->push($this->accessTokenMiddleware());

        return $stack;
    }
}
