<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 18:19
 */

namespace CorpWeChat\Models;

/**
 * Class User
 * @package CorpWeChat\Models
 */
class User
{
    const GENDER_UNKNOWN = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    const STATUS_ALL = 0;
    const STATUS_FOLLOWED = 1;
    const STATUS_BANNED = 2;
    const STATUS_UN_FOLLOWED = 4;

    protected $userId;
    protected $name;
    protected $department = [];
    protected $position;
    protected $mobile;
    protected $gender = self::GENDER_UNKNOWN;
    protected $email;
    protected $weixinId;
    protected $avatarMediaId;
    protected $avatar;
    protected $status;
    protected $extAttr = [];

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return array
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param array $departmentArr
     * @return $this
     */
    public function setDepartment(array $departmentArr)
    {
        $this->department = $departmentArr;

        return $this;
    }

    /**
     * @param int $departmentId
     * @return $this
     */
    public function addDepartment($departmentId)
    {
        $this->department[] = $departmentId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     * @return $this
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     * @return $this
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWeixinId()
    {
        return $this->weixinId;
    }

    /**
     * @param mixed $weixinId
     * @return $this
     */
    public function setWeixinId($weixinId)
    {
        $this->weixinId = $weixinId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param mixed $avatar
     * @return $this
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAvatarMediaId()
    {
        return $this->avatarMediaId;
    }

    /**
     * @param mixed $avatarMediaId
     * @return $this
     */
    public function setAvatarMediaId($avatarMediaId)
    {
        $this->avatarMediaId = $avatarMediaId;

        return $this;
    }

    /**
     * @return array
     */
    public function getExtAttr()
    {
        return $this->extAttr;
    }

    /**
     * @param array $extAttr
     * @return $this
     */
    public function setExtAttr($extAttr)
    {
        $this->extAttr = $extAttr;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_filter(
            [
                'userid'         => $this->userId,
                'name'           => $this->name,
                'department'     => $this->department,
                'position'       => $this->position,
                'mobile'         => $this->mobile,
                'gender'         => $this->gender,
                'email'          => $this->email,
                'weixinid'       => $this->weixinId,
                'avatar_mediaid' => $this->avatarMediaId,
                'extattr'        => $this->extAttr,
            ]
        );
    }
}
