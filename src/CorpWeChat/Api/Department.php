<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 16:54
 */

namespace CorpWeChat\Api;

use CorpWeChat\Models\Department as DepartmentModel;
use CorpWeChat\Response\Department\CreateResponse;
use CorpWeChat\Response\Department\DepartmentListResponse;
use CorpWeChat\Response\JsonResponse;

/**
 * 通讯录-部门管理
 * Class Department
 * @package CorpWeChat\Api
 * @link    http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E9%83%A8%E9%97%A8
 */
class Department extends AbstractApi
{
    /**
     * 创建部门
     * @param DepartmentModel $department
     * @return CreateResponse
     */
    public function create(DepartmentModel $department)
    {
        return $this->httpPostJson('department/create', $department->toArray(), new CreateResponse());
    }

    /**
     * 更新部门
     * @param DepartmentModel $department
     * @return JsonResponse
     */
    public function update(DepartmentModel $department)
    {
        return $this->httpPostJson('department/update', $department->toArray(), new JsonResponse());
    }

    /**
     * 删除部门
     * @param int $departmentId
     * @return JsonResponse
     */
    public function delete($departmentId)
    {
        return $this->httpGet('department/delete', ['id' => $departmentId], new JsonResponse());
    }

    /**
     * 获取部门列表
     * @param null|int $id
     * @return DepartmentListResponse
     */
    public function departmentList($id = null)
    {
        $req = [];
        if (!is_null($id)) {
            $req['id'] = $id;
        }

        return $this->httpGet('department/list', $req, new DepartmentListResponse());
    }
}
