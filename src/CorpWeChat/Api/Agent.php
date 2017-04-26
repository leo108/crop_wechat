<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:20
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\AgentSetting;
use Leo108\CorpWeChat\Response\Agent\GetAgentListResponse;
use Leo108\CorpWeChat\Response\Agent\GetAgentResponse;
use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * 企业号应用相关接口
 * Class Agent
 *
 * @package Leo108\CorpWeChat\Api
 */
class Agent extends AbstractApi
{
    /**
     * 获取企业号应用详细信息
     *
     * @param int $agentId
     *
     * @return GetAgentResponse
     */
    public function get($agentId)
    {
        return new GetAgentResponse($this->httpGet('agent/get', ['agentid' => $agentId]));
    }

    /**
     * 设置企业号应用
     *
     * @param AgentSetting $setting
     *
     * @return JsonResponse
     */
    public function set(AgentSetting $setting)
    {
        return $this->httpPostJson('agent/set', $setting->toArray());
    }

    /**
     * 获取企业号应用列表
     *
     * @return GetAgentListResponse
     */
    public function getList()
    {
        return new GetAgentListResponse($this->httpGet('agent/list', []));
    }
}
