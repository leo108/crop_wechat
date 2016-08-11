<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 16:48
 */

namespace CorpWeChat\AgentCallBack;

use Psr\Http\Message\RequestInterface;
use CorpWeChat\Exceptions\InvalidArgumentException;
use CorpWeChat\Models\Messages\Interfaces\ResponseMessageInterface;
use CorpWeChat\Models\Messages\RequestMessage;
use CorpWeChat\Utils\Crypt;
use CorpWeChat\Utils\XML;
use CorpWeChat\CorpWeChat;

/**
 * 接受消息并处理
 * Class CallBackHandler
 * @package CorpWeChat\AgentCallBack
 */
class CallBackHandler
{
    /**
     * @var CorpWeChat
     */
    protected $wx;

    /**
     * @var Crypt
     */
    protected $crypt;

    /**
     * 解密后的消息
     * @var RequestMessage
     */
    protected $requestMessage;

    /**
     * BaseCallBack constructor.
     * @param string     $name
     * @param CorpWeChat $wx
     */
    public function __construct($name, CorpWeChat $wx)
    {
        $config = $wx->getConfig()->getAgent($name);
        if (is_null($config)) {
            throw new InvalidArgumentException(sprintf('agent %s config not set', $name));
        }
        $this->wx    = $wx;
        $this->crypt = new Crypt($this->wx->getConfig()->getCorpId(), $config['token'], $config['key']);
    }

    /**
     * 将消息解密后交给用户定义的函数处理
     * @param RequestInterface $request
     * @param callable         $handler 消息处理函数
     * @return string
     */
    public function handle(RequestInterface $request, callable $handler)
    {
        $query     = \GuzzleHttp\Psr7\parse_query($request->getUri()->getQuery());
        $msgSig    = isset($query['msg_signature']) ? $query['msg_signature'] : '';
        $timestamp = isset($query['timestamp']) ? $query['timestamp'] : '';
        $nonce     = isset($query['nonce']) ? $query['nonce'] : '';
        $echoStr   = isset($query['echostr']) ? $query['echostr'] : '';
        $body      = $request->getBody();

        if (!empty($echoStr)) {
            return $this->crypt->verifyURL($msgSig, $nonce, $timestamp, $echoStr);
        }

        $this->requestMessage = new RequestMessage($this->crypt->decryptMsg($msgSig, $nonce, $timestamp, $body));

        $ret = call_user_func_array($handler, [$this->requestMessage]);
        if ($ret instanceof ResponseMessageInterface) {
            return $this->response($ret);
        }

        return '';
    }

    /**
     * 将消息转为xml格式
     * @param ResponseMessageInterface $responseMessage
     * @return string
     */
    protected function response(ResponseMessageInterface $responseMessage)
    {
        $responseArr = $responseMessage->toResponseMessage(
            $this->requestMessage->FromUserName,
            $this->wx->getConfig()->getCorpId()
        );

        return XML::build($responseArr);
    }
}
