<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 11:55
 */

namespace Leo108\CorpWeChat\Response\Department;

use Leo108\CorpWeChat\Models\Department;
use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class DepartmentListResponse
 * @package Leo108\CorpWeChat\Response\Department
 */
class DepartmentListResponse extends JsonResponse
{
    protected static $allowFields = ['department'];
    protected static $requiredFields = ['department'];

    /**
     * @var Department[]
     */
    protected $departments = [];

    /**
     * @return Department[]
     */
    public function getDepartments()
    {
        return $this->departments;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        foreach ($this->jsonData['department'] as $item) {
            $model = new Department();
            $model->setId($item['id'])
                ->setName($item['name'])
                ->setOrder($item['order'])
                ->setParentId($item['parentid']);
            $this->departments[] = $model;
        }
    }
}
