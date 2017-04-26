<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 11:36
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Response\Common\GetCallBackIPResponse;
use Leo108\CorpWeChat\Response\Common\GetTokenResponse;

/**
 * 通用服务接口
 * Class Common
 *
 * @package Leo108\CorpWeChat\Api
 */
class Common extends AbstractApi
{
    /**
     * 通过id和secret换取access token
     *
     * @param bool $cache true代表先读缓存
     *
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
            if ($token = $this->wx->getCache()->get($cacheKey)) {
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
     *
     * @return GetCallBackIPResponse
     */
    public function getCallBackIP()
    {
        return new GetCallBackIPResponse($this->httpGet('getcallbackip', []));
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

        return new GetTokenResponse($this->httpGet('gettoken', $param));
    }
}
