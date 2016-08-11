<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 12:42
 */

namespace CorpWeChat\Response\Tag;

use CorpWeChat\Response\JsonResponse;

/**
 * Class ModifyResponse
 * @package CorpWeChat\Response\Tag
 */
class ModifyResponse extends JsonResponse
{
    protected static $allowFields = ['invalidlist', 'invalidparty'];

    protected $invalidUserIdList = [];
    protected $invalidDepartmentIdList = [];

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
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        if (isset($this->jsonData['invalidlist'])) {
            $this->invalidUserIdList = explode('|', $this->jsonData['invalidlist']);
        }
        if (isset($this->jsonData['invalidparty'])) {
            $this->invalidDepartmentIdList = $this->jsonData['invalidparty'];
        }
    }
}
