<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 16:54
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\Department as DepartmentModel;
use Leo108\CorpWeChat\Response\Department\CreateResponse;
use Leo108\CorpWeChat\Response\Department\DepartmentListResponse;
use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * 通讯录-部门管理
 * Class Department
 *
 * @package Leo108\CorpWeChat\Api
 * @link    http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E9%83%A8%E9%97%A8
 */
class Department extends AbstractApi
{
    /**
     * 创建部门
     *
     * @param DepartmentModel $department
     *
     * @return CreateResponse
     */
    public function create(DepartmentModel $department)
    {
        return new CreateResponse($this->httpPostJson('department/create', $department->toArray()));
    }

    /**
     * 更新部门
     *
     * @param DepartmentModel $department
     *
     * @return JsonResponse
     */
    public function update(DepartmentModel $department)
    {
        return new JsonResponse($this->httpPostJson('department/update', $department->toArray()));
    }

    /**
     * 删除部门
     *
     * @param int $departmentId
     *
     * @return JsonResponse
     */
    public function delete($departmentId)
    {
        return new JsonResponse($this->httpGet('department/delete', ['id' => $departmentId]));
    }

    /**
     * 获取部门列表
     *
     * @param null|int $id
     *
     * @return DepartmentListResponse
     */
    public function departmentList($id = null)
    {
        $req = [];
        if (!is_null($id)) {
            $req['id'] = $id;
        }

        return new DepartmentListResponse($this->httpGet('department/list', $req));
    }
}
