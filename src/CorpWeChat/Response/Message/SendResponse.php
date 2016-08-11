<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:17
 */

namespace CorpWeChat\Response\Message;

use CorpWeChat\Response\JsonResponse;

/**
 * Class SendResponse
 * @package CorpWeChat\Response\Message
 */
class SendResponse extends JsonResponse
{
    protected static $allowFields = ['invalidlist', 'invalidparty', 'invalidtag'];

    protected $invalidUserIdList = [];
    protected $invalidDepartmentIdList = [];
    protected $invalidTagIdList = [];

    /**
     * @return array
     */
    public function getInvalidUserIdList()
    {
        return $this->invalidUserIdList;
    }

    /**
     * @return array
     */
    public function getInvalidDepartmentIdList()
    {
        return $this->invalidDepartmentIdList;
    }

    /**
     * @return array
     */
    public function getInvalidTagIdList()
    {
        return $this->invalidTagIdList;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        if (isset($this->jsonData['invalidlist'])) {
            $this->invalidUserIdList = explode('|', $this->jsonData['invalidlist']);
        }
        if (isset($this->jsonData['invalidparty'])) {
            $this->invalidDepartmentIdList = explode('|', $this->jsonData['invalidparty']);
        }
        if (isset($this->jsonData['invalidtag'])) {
            $this->invalidTagIdList = explode('|', $this->jsonData['invalidtag']);
        }
    }
}
