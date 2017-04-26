<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 15:06
 */

namespace Leo108\CorpWeChat\Models\BatchActions;

/**
 * Class UserAction
 *
 * @package Leo108\CorpWeChat\Models\BatchActions
 */
class UserAction
{
    /**
     * @var string
     */
    protected $action;
    /**
     * @var integer
     */
    protected $userId;
    /**
     * @var integer
     */
    protected $errCode;
    /**
     * @var string
     */
    protected $errMsg;

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param $action
     *
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param $userId
     *
     * @return $this
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return int
     */
    public function getErrCode()
    {
        return $this->errCode;
    }

    /**
     * @param $errCode
     *
     * @return $this
     */
    public function setErrCode($errCode)
    {
        $this->errCode = $errCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getErrMsg()
    {
        return $this->errMsg;
    }

    /**
     * @param $errMsg
     *
     * @return $this
     */
    public function setErrMsg($errMsg)
    {
        $this->errMsg = $errMsg;

        return $this;
    }
}
