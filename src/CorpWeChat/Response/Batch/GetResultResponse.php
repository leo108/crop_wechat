<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 15:02
 */

namespace CorpWeChat\Response\Batch;

use CorpWeChat\Models\BatchActions\DepartmentAction;
use CorpWeChat\Models\BatchActions\UserAction;
use CorpWeChat\Response\JsonResponse;

/**
 * Class GetResultResponse
 * @package CorpWeChat\Response\Batch
 */
class GetResultResponse extends JsonResponse
{
    const TYPE_SYNC_USER = 'sync_user';
    const TYPE_REPLACE_USER = 'replace_user';
    const TYPE_REPLACE_DEPARTMENT = 'replace_party';

    protected static $allowFields = ['status', 'type', 'total', 'percentage', 'remaintime', 'result'];
    protected static $requiredFields = ['status', 'type', 'total', 'percentage', 'remaintime', 'result'];

    protected $list = [];

    /**
     * @return DepartmentAction[]|UserAction[]
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        foreach ($this->jsonData['result'] as $item) {
            switch ($this->jsonData['type']) {
                case self::TYPE_SYNC_USER:
                case self::TYPE_REPLACE_USER:
                    $this->list[] = self::parseUser($item);
                    break;
                case self::TYPE_REPLACE_DEPARTMENT:
                    $this->list[] = self::parseDepartment($item);
                    break;
            }
        }
    }

    /**
     * @param array $item
     * @return UserAction
     */
    protected static function parseUser($item)
    {
        $action = new UserAction();
        $action->setUserId($item['userid'])
            ->setAction($item['action'])
            ->setErrCode($item['errcode'])
            ->setErrMsg($item['errmsg']);

        return $action;
    }

    /**
     * @param array $item
     * @return DepartmentAction
     */
    protected static function parseDepartment($item)
    {
        $action = new DepartmentAction();
        $action->setDepartmentId($item['partyid'])
            ->setAction($item['action'])
            ->setErrCode($item['errcode'])
            ->setErrMsg($item['errmsg']);

        return $action;
    }
}
