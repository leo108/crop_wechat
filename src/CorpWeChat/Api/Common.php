<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 11:36
 */

namespace CorpWeChat\Api;

use CorpWeChat\Response\Common\GetCallBackIPResponse;
use CorpWeChat\Response\Common\GetTokenResponse;

/**
 * 通用服务接口
 * Class Common
 * @package CorpWeChat\Api
 */
class Common extends AbstractApi
{
    /**
     * 通过id和secret换取access token
     * @param bool $cache true代表先读缓存
     * @return string
     */
    public function getAccessToken($cache = true)
    {
        $cacheKey = sprintf(
            '%s_%s',
            $this->wx->getConfig()->getAccessTokenCacheKeyPrefix(),
            md5($this->wx->getConfig()->getCorpId().$this->wx->getConfig()->getSecret())
        );
        if ($cache) {
            $token = $this->wx->getCache()->get($cacheKey);
            if ($token) {
                return $token;
            }
        }

        $ret   = $this->realGetAccessToken();
        $token = $ret->get('access_token');
        $this->wx->getCache()->set($cacheKey, $token, intval($ret->get('expires_in') / 2));

        return $token;
    }

    /**
     * 获取微信服务器的ip段
     * @return GetCallBackIPResponse
     */
    public function getCallBackIP()
    {
        return $this->httpGet('getcallbackip', [], new GetCallBackIPResponse());
    }

    /**
     * @return GetTokenResponse
     */
    protected function realGetAccessToken()
    {
        $param = [
            'corpid'     => $this->wx->getConfig()->getCorpId(),
            'corpsecret' => $this->wx->getConfig()->getSecret(),
        ];

        return $this->httpGet('gettoken', $param, new GetTokenResponse());
    }
}
