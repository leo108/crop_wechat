<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 10:50
 */

namespace CorpWeChat\Models;

/**
 * Class Config
 * @package CorpWeChat\Models
 */
class Config
{
    /**
     * @var
     */
    protected $corpId;
    /**
     * @var
     */
    protected $secret;

    /**
     * 各个应用的token和aes key
     * @var array
     */
    protected $agents = [];

    /**
     * @var array
     */
    protected $httpConfig = [];

    /**
     * @var int
     */
    protected $retryCount = 1;

    /**
     * access token 缓存key的前缀
     * @var string
     */
    protected $accessTokenCacheKeyPrefix = 'access_token_';

    /**
     * Config constructor.
     * @param string $corpId
     * @param string $secret
     */
    public function __construct($corpId, $secret)
    {
        $this->corpId = $corpId;
        $this->secret = $secret;
    }

    /**
     * @return array
     */
    public function getHttpConfig()
    {
        return $this->httpConfig;
    }

    /**
     * @param mixed $httpConfig
     */
    public function setHttpConfig($httpConfig)
    {
        $this->httpConfig = $httpConfig;
    }

    /**
     * @return mixed
     */
    public function getCorpId()
    {
        return $this->corpId;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param string $accessTokenCacheKeyPrefix
     */
    public function setAccessTokenCacheKeyPrefix($accessTokenCacheKeyPrefix)
    {
        $this->accessTokenCacheKeyPrefix = $accessTokenCacheKeyPrefix;
    }

    /**
     * @return string
     */
    public function getAccessTokenCacheKeyPrefix()
    {
        return $this->accessTokenCacheKeyPrefix;
    }

    /**
     * @param string $name
     * @param int    $id
     * @param string $token
     * @param string $aesKey
     */
    public function addAgent($name, $id, $token, $aesKey)
    {
        $this->agents[$name] = [
            'id'    => $id,
            'token' => $token,
            'key'   => $aesKey,
        ];
    }

    /**
     * @param string $name
     * @return array|null
     */
    public function getAgent($name)
    {
        return isset($this->agents[$name]) ? $this->agents[$name] : null;
    }

    /**
     * @return array
     */
    public function getAgents()
    {
        return $this->agents;
    }

    /**
     * @return int
     */
    public function getRetryCount()
    {
        return $this->retryCount;
    }

    /**
     * @param int $retryCount
     */
    public function setRetryCount($retryCount)
    {
        $this->retryCount = $retryCount;
    }
}
