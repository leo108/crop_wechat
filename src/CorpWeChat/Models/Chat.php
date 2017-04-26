<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 14:30
 */

namespace Leo108\CorpWeChat\Models;

/**
 * Class Chat
 * @package Leo108\CorpWeChat\Models
 */
class Chat
{
    protected $id;
    protected $name;
    protected $owner;
    protected $userList = [];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * @return mixed
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param mixed $owner
     * @return $this
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * @return array
     */
    public function getUserList()
    {
        return $this->userList;
    }

    /**
     * @param string $userId
     */
    public function addUserId($userId)
    {
        $this->userList[] = $userId;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'chatid'   => $this->id,
            'name'     => $this->name,
            'owner'    => $this->owner,
            'userlist' => $this->userList,
        ];
    }
}
