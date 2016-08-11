<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 15:06
 */

namespace CorpWeChat\Models\BatchActions;

/**
 * Class UserAction
 * @package CorpWeChat\Models\BatchActions
 */
class UserAction
{
    protected $action;
    protected $userId;
    protected $errCode;
    protected $errMsg;

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

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
    public function getErrCode()
    {
        return $this->errCode;
    }

    /**
     * @param mixed $errCode
     * @return $this
     */
    public function setErrCode($errCode)
    {
        $this->errCode = $errCode;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getErrMsg()
    {
        return $this->errMsg;
    }

    /**
     * @param mixed $errMsg
     * @return $this
     */
    public function setErrMsg($errMsg)
    {
        $this->errMsg = $errMsg;

        return $this;
    }
}
