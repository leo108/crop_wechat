<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 10:20
 */

namespace CorpWeChat\Exceptions;

/**
 * Class ApiException
 * @package CorpWeChat\Exceptions
 */
class ApiException extends UnexpectedResponseException
{
    const OK = 0;
    const SERVICE_UNAVAILABLE = -1;

    protected $apiCode;
    protected $apiMsg;

    /**
     * ApiException constructor.
     * @param string $apiMsg  服务器返回的错误消息
     * @param int    $apiCode 服务器返回的错误码
     */
    public function __construct($apiMsg, $apiCode)
    {
        parent::__construct(parent::API_ERROR);
        $this->apiCode = $apiCode;
        $this->apiMsg  = $apiMsg;
    }

    /**
     * 获取服务器返回的错误码
     * @return int
     */
    public function getApiCode()
    {
        return $this->apiCode;
    }

    /**
     * 获取服务器返回的错误消息
     * @return string
     */
    public function getApiMsg()
    {
        return $this->apiMsg;
    }
}
