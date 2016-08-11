<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:20
 */

namespace CorpWeChat\Api;

use CorpWeChat\Models\AgentSetting;
use CorpWeChat\Response\Agent\GetAgentListResponse;
use CorpWeChat\Response\Agent\GetAgentResponse;
use CorpWeChat\Response\JsonResponse;

/**
 * 企业号应用相关接口
 * Class Agent
 * @package CorpWeChat\Api
 */
class Agent extends AbstractApi
{
    /**
     * 获取企业号应用详细信息
     * @param int $agentId
     * @return GetAgentResponse
     */
    public function get($agentId)
    {
        return $this->httpGet('agent/get', ['agentid' => $agentId], new GetAgentResponse());
    }

    /**
     * 设置企业号应用
     * @param AgentSetting $setting
     * @return JsonResponse
     */
    public function set(AgentSetting $setting)
    {
        return $this->httpPostJson('agent/set', $setting->toArray(), new JsonResponse());
    }

    /**
     * 获取企业号应用列表
     * @return GetAgentListResponse
     */
    public function getList()
    {
        return $this->httpGet('agent/list', [], new GetAgentListResponse());
    }
}
