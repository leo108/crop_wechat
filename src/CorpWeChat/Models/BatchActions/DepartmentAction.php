<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 15:06
 */

namespace CorpWeChat\Models\BatchActions;

/**
 * Class DepartmentAction
 * @package CorpWeChat\Models\BatchActions
 */
class DepartmentAction
{
    protected $action;
    protected $departmentId;
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
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * @param mixed $departmentId
     * @return $this
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;

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
