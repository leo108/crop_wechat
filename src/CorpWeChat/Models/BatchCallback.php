<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:10
 */

namespace CorpWeChat\Models;

/**
 * Class BatchCallback
 * @package CorpWeChat\Models
 */
class BatchCallback
{
    protected $url;
    protected $token;
    protected $encodingAESKey;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getEncodingAESKey()
    {
        return $this->encodingAESKey;
    }

    /**
     * @param mixed $encodingAESKey
     */
    public function setEncodingAESKey($encodingAESKey)
    {
        $this->encodingAESKey = $encodingAESKey;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'url'            => $this->url,
            'token'          => $this->token,
            'encodingaeskey' => $this->encodingAESKey,
        ];
    }
}
