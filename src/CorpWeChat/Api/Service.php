<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 09:15
 */

namespace CorpWeChat\Api;

use CorpWeChat\Response\Service\LoginInfoResponse;
use CorpWeChat\Response\Service\LoginUrlResponse;

/**
 * 认证接口
 * Class Service
 * @package CorpWeChat\Api
 */
class Service extends AbstractApi
{
    const TARGET_AGENT_SETTING = 'agent_setting';
    const TARGET_SEND_MSG = 'send_msg';
    const TARGET_CONTACT = 'contact';

    /**
     * 获取企业号登录用户信息
     * @link http://qydev.weixin.qq.com/wiki/index.php?title=%E6%88%90%E5%91%98%E7%99%BB%E5%BD%95%E6%8E%88%E6%9D%83
     * @param string $authCode
     * @return LoginInfoResponse
     */
    public function getLoginInfo($authCode)
    {
        return $this->httpPostJson('service/get_login_info', ['auth_code' => $authCode], new LoginInfoResponse());
    }

    /**
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E5%8D%95%E7%82%B9%E7%99%BB%E5%BD%95%E6%8E%88%E6%9D%83#.E8.8E.B7.E5.8F.96.E7.99.BB.E5.BD.95.E4.BC.81.E4.B8.9A.E5.8F.B7.E5.AE.98.E7.BD.91.E7.9A.84url
     * 获取单点登录地址
     * @param string   $loginTicket
     * @param string   $target
     * @param null|int $agentId
     * @return LoginUrlResponse
     */
    public function getLoginUrl($loginTicket, $target, $agentId = null)
    {
        $param = [
            'login_ticket' => $loginTicket,
            'target'       => $target,
        ];
        if (!is_null($agentId)) {
            $param['agentid'] = $agentId;
        }

        return $this->httpPostJson('service/get_login_url', $param, new LoginUrlResponse());
    }
}
