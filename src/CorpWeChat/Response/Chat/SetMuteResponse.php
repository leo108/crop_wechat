<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 14:58
 */

namespace CorpWeChat\Response\Chat;

use CorpWeChat\Response\JsonResponse;

/**
 * Class SetMuteResponse
 * @package CorpWeChat\Response\Chat
 */
class SetMuteResponse extends JsonResponse
{
    protected static $allowFields = ['invalidlist'];

    protected $invalidUserIdList = [];

    /**
     * @return array
     */
    public function getInvalidUserIdList()
    {
        return $this->invalidUserIdList;
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
    }
}
