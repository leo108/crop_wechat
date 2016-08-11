<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 15:32
 */

namespace CorpWeChat\Models\Messages\Users;

/**
 * Class BroadCastReceivers
 * @package CorpWeChat\Models\Messages\Users
 */
class BroadCastReceivers
{
    protected $toUser = [];
    protected $toParty = [];
    protected $toTag = [];
    protected $safe = false;
    protected $agentId;

    /**
     * BroadCastReceivers constructor.
     * @param int  $agentId
     * @param bool $safe
     */
    public function __construct($agentId, $safe = false)
    {
        $this->safe    = $safe;
        $this->agentId = $agentId;
    }

    /**
     * @param string $userId
     */
    public function addUser($userId)
    {
        $this->toUser[] = $userId;
    }

    /**
     * @param int $departmentId
     */
    public function addDepartment($departmentId)
    {
        $this->toParty[] = $departmentId;
    }

    /**
     * @param int $tagId
     */
    public function addTag($tagId)
    {
        $this->toTag[] = $tagId;
    }

    /**
     * @param int $agentId
     */
    public function setAgentId($agentId)
    {
        $this->agentId = $agentId;
    }

    /**
     * @param boolean $safe
     */
    public function setSafe($safe)
    {
        $this->safe = $safe;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'touser'  => join('|', $this->toUser),
            'toparty' => join('|', $this->toParty),
            'totag'   => join('|', $this->toTag),
            'agentid' => $this->agentId,
            'safe'    => $this->safe ? 1 : 0,
        ];
    }
}
