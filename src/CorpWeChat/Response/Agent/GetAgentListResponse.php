<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/11
 * Time: 14:12
 */

namespace Leo108\CorpWeChat\Response\Agent;

use Leo108\CorpWeChat\Models\Agent;
use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class GetAgentListResponse
 * @package Leo108\CorpWeChat\Response\Agent
 */
class GetAgentListResponse extends JsonResponse
{
    protected static $allowFields = ['agentlist'];
    protected static $requiredFields = ['agentlist'];

    /**
     * @var Agent[]
     */
    protected $agentList = [];

    /**
     * @return Agent[]
     */
    public function getAgentList()
    {
        return $this->agentList;
    }

    /**
     * @inheritDoc
     */
    protected function parseData()
    {
        parent::parseData();
        foreach ($this->jsonData['agentlist'] as $item) {
            $agent = new Agent();
            $agent->setId($item['agentid'])
                ->setName($item['name'])
                ->setRoundLogoUrl($item['round_logo_url'])
                ->setSquareLogoUrl($item['square_logo_url']);
            $this->agentList[] = $agent;
        }
    }

}
