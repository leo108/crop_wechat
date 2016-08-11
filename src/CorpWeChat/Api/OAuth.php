<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 11:13
 */

namespace CorpWeChat\Api;

/**
 * Class OAuth
 * @package CorpWeChat\Api
 */
class OAuth extends AbstractApi
{
    const USER_TYPE_ALL = 'all';
    const USER_TYPE_MEMBER = 'member';
    const USER_TYPE_ADMIN = 'admin';

    /**
     * 获取PC端登录url
     * @param string $redirect
     * @param string $state
     * @param string $userType
     * @return string
     */
    public function getPCUrl($redirect, $state = '', $userType = self::USER_TYPE_ADMIN)
    {
        $query = [
            'corp_id'      => $this->wx->getConfig()->getCorpId(),
            'redirect_uri' => $redirect,
            'state'        => $state,
            'usertype'     => $userType,
        ];

        return 'https://qy.weixin.qq.com/cgi-bin/loginpage?'.http_build_query($query);
    }

    /**
     * 获取微信端登录url
     * @param string $redirect
     * @param string $state
     * @return string
     */
    public function getWeChatUrl($redirect, $state = '')
    {
        $query = [
            'appid'         => $this->wx->getConfig()->getCorpId(),
            'redirect_uri'  => $redirect,
            'state'         => $state,
            'response_type' => 'code',
            'scope'         => 'snsapi_base',
        ];

        return 'https://open.weixin.qq.com/connect/oauth2/authorize?'.http_build_query($query).'#wechat_redirect';
    }
}
