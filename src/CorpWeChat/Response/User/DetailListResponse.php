<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 12:29
 */

namespace CorpWeChat\Response\User;

use CorpWeChat\Models\User;
use CorpWeChat\Response\JsonResponse;

/**
 * Class DetailListResponse
 * @package CorpWeChat\Response\User
 */
class DetailListResponse extends JsonResponse
{
    protected static $allowFields = ['userlist'];
    protected static $requiredFields = ['userlist'];

    /**
     * @var User[]
     */
    protected $list = [];

    /**
     * @return User[]
     */
    public function getUserList()
    {
        return $this->list;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        foreach ($this->jsonData['userlist'] as $item) {
            $user = new User();
            $user->setUserId($item['userid'])
                ->setName($item['name'])
                ->setDepartment($item['department'])
                ->setPosition($item['position'])
                ->setMobile($item['mobile'])
                ->setGender($item['gender'])
                ->setEmail($item['email'])
                ->setWeixinId($item['weixinid'])
                ->setAvatar($item['avatar'])
                ->setStatus($item['status'])
                ->setExtAttr($item['extattr']);
            $this->list[] = $user;
        }
    }
}
