<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 15:06
 */

namespace Leo108\CorpWeChat\Models\BatchActions;

/**
 * Class DepartmentAction
 *
 * @package Leo108\CorpWeChat\Models\BatchActions
 */
class DepartmentAction
{
    /**
     * @var string
     */
    protected $action;
    /**
     * @var integer
     */
    protected $departmentId;
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
     * @param string $action
     *
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDepartmentId()
    {
        return $this->departmentId;
    }

    /**
     * @param integer $departmentId
     *
     * @return $this
     */
    public function setDepartmentId($departmentId)
    {
        $this->departmentId = $departmentId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getErrCode()
    {
        return $this->errCode;
    }

    /**
     * @param integer $errCode
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
     * @param string $errMsg
     *
     * @return $this
     */
    public function setErrMsg($errMsg)
    {
        $this->errMsg = $errMsg;

        return $this;
    }
}
