<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 14:58
 */

namespace Leo108\CorpWeChat\Response\Chat;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class SetMuteResponse
 * @package Leo108\CorpWeChat\Response\Chat
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
