<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 12:38
 */

namespace CorpWeChat\Response\Tag;

use CorpWeChat\Models\User;
use CorpWeChat\Response\JsonResponse;

/**
 * Class GetMemberResponse
 * @package CorpWeChat\Response\Tag
 */
class GetMemberResponse extends JsonResponse
{
    protected static $allowFields = ['userlist', 'partylist'];

    /**
     * @var User[]
     */
    protected $userList = [];

    /**
     * @var int[]
     */
    protected $departmentIdList;

    /**
     * @return User[]
     */
    public function getUserList()
    {
        return $this->userList;
    }

    /**
     * @return int[]
     */
    public function getDepartmentIdList()
    {
        return $this->departmentIdList;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        $this->departmentIdList = $this->jsonData['partylist'];
        foreach ($this->jsonData['userlist'] as $item) {
            $user = new User();
            $user->setUserId($item['userid'])->setName($item['name']);
            $this->userList[] = $user;
        }
    }
}
