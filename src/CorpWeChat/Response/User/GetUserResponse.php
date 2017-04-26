<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 12:20
 */

namespace Leo108\CorpWeChat\Response\User;

use Leo108\CorpWeChat\Models\User;
use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class GetUserResponse
 * @package Leo108\CorpWeChat\Response\User
 */
class GetUserResponse extends JsonResponse
{
    /**
     * @var User
     */
    protected $user;
    protected static $allowFields = [
        'userid',
        'name',
        'department',
        'position',
        'mobile',
        'gender',
        'email',
        'weixinid',
        'avatar',
        'status',
        'extattr',
    ];
    protected static $requiredFields = [
        'userid',
        'name',
        'department',
        'position',
        'mobile',
        'gender',
        'email',
        'weixinid',
        'avatar',
        'status',
        'extattr',
    ];

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        $this->user = new User();
        $this->user->setUserId($this->jsonData['userid'])
            ->setName($this->jsonData['name'])
            ->setDepartment($this->jsonData['department'])
            ->setPosition($this->jsonData['position'])
            ->setMobile($this->jsonData['mobile'])
            ->setGender($this->jsonData['gender'])
            ->setEmail($this->jsonData['email'])
            ->setWeixinId($this->jsonData['weixinid'])
            ->setAvatar($this->jsonData['avatar'])
            ->setStatus($this->jsonData['status'])
            ->setExtAttr($this->jsonData['extattr']);
    }
}
