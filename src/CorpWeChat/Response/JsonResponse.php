<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 10:58
 */

namespace CorpWeChat\Response;

use CorpWeChat\Exceptions\UnexpectedResponseException;
use CorpWeChat\Exceptions\ApiException;

/**
 * 格式为JSON字符串的响应
 * Class JsonResponse
 * @package CorpWeChat\Response
 */
class JsonResponse extends BaseResponse
{
    protected static $allowFields = [];
    protected static $requiredFields = [];
    protected $jsonData = [];

    /**
     * @return array
     */
    public function getData()
    {
        return $this->jsonData;
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * @param string $name
     * @return mixed|null
     */
    public function get($name)
    {
        return isset($this->jsonData[$name]) ? $this->jsonData[$name] : null;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        try {
            $data = \GuzzleHttp\json_decode($this->originResponse->getBody(), true);
        } catch (\InvalidArgumentException $e) {
            throw new UnexpectedResponseException(UnexpectedResponseException::WECHAT_ERROR, $this->originResponse);
        }

        if (isset($data['errcode']) && $data['errcode'] != ApiException::OK) {
            throw new ApiException($data['errmsg'], $data['errcode']);
        }

        $this->jsonData = $this->filter($data);
    }

    /**
     * @param array $arr
     * @return mixed
     */
    protected function filter($arr)
    {
        foreach ($arr as $k => $v) {
            if (!in_array($k, static::$allowFields)) {
                unset($arr[$k]);
            }
        }

        foreach (static::$requiredFields as $field) {
            if (!isset($arr[$field])) {
                throw new UnexpectedResponseException(UnexpectedResponseException::WECHAT_ERROR, $this->originResponse);
            }
        }

        return $arr;
    }
}
