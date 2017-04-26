<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 11:33
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\User as UserModel;
use Leo108\CorpWeChat\Response\JsonResponse;
use Leo108\CorpWeChat\Response\User\DetailListResponse;
use Leo108\CorpWeChat\Response\User\GetUserResponse;
use Leo108\CorpWeChat\Response\User\SimpleListResponse;
use Leo108\CorpWeChat\Response\User\ToOpenIdResponse;
use Leo108\CorpWeChat\Response\User\ToUserIdResponse;
use Leo108\CorpWeChat\Response\User\UserInfoResponse;

/**
 * 通讯录-成员管理接口
 * Class User
 *
 * @package Leo108\CorpWeChat\Api
 */
class User extends AbstractApi
{
    /**
     * 根据code获取成员信息
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=OAuth%E9%AA%8C%E8%AF%81%E6%8E%A5%E5%8F%A3
     *
     * @param string $code 通过成员授权获取到的code，每次成员授权带上的code将不一样，code只能使用一次，5分钟未被使用自动过期
     *
     * @return UserInfoResponse
     */
    public function getUserInfo($code)
    {
        return new UserInfoResponse($this->httpGet('user/getuserinfo', ['code' => $code]));
    }

    /**
     * userid转换成openid接口
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=Userid%E4%B8%8Eopenid%E4%BA%92%E6%8D%A2%E6%8E%A5%E5%8F%A3
     *
     * @param string   $userId  企业号内的成员id
     * @param null|int $agentId 需要发送红包的应用ID，若只是使用微信支付和企业转账，则无需该参数
     *
     * @return ToOpenIdResponse
     */
    public function convertToOpenId($userId, $agentId = null)
    {
        $param = [
            'userid' => $userId,
        ];
        if (!is_null($agentId)) {
            $param['agentid'] = $agentId;
        }

        return new ToOpenIdResponse($this->httpPostJson('user/convert_to_openid', $param));
    }

    /**
     * openid转换成userid接口
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=Userid%E4%B8%8Eopenid%E4%BA%92%E6%8D%A2%E6%8E%A5%E5%8F%A3#openid.E8.BD.AC.E6.8D.A2.E6.88.90userid.E6.8E.A5.E5.8F.A3
     *
     * @param string $openId 在使用微信支付、微信红包和企业转账之后，返回结果的openid
     *
     * @return ToUserIdResponse
     */
    public function convertToUserId($openId)
    {
        return new ToUserIdResponse($this->httpPostJson('user/convert_to_userid', ['openid' => $openId]));
    }

    /**
     * 标记成员二次验证成功
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E6%88%90%E5%91%98%E5%85%B3%E6%B3%A8%E4%BC%81%E4%B8%9A%E5%8F%B7
     *
     * @param string $userId
     *
     * @return JsonResponse
     */
    public function authSuccess($userId)
    {
        return new JsonResponse($this->httpGet('user/authsucc', ['userid' => $userId]));
    }

    /**
     * 创建成员
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%88%90%E5%91%98#.E5.88.9B.E5.BB.BA.E6.88.90.E5.91.98
     *
     * @param UserModel $user
     *
     * @return JsonResponse
     */
    public function create(UserModel $user)
    {
        return new JsonResponse($this->httpPostJson('user/create', $user->toArray()));
    }

    /**
     * 更新成员
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%88%90%E5%91%98#.E6.9B.B4.E6.96.B0.E6.88.90.E5.91.98
     *
     * @param UserModel $user
     *
     * @return JsonResponse
     */
    public function update(UserModel $user)
    {
        return new JsonResponse($this->httpPostJson('user/update', $user->toArray()));
    }

    /**
     * 删除成员
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%88%90%E5%91%98#.E5.88.A0.E9.99.A4.E6.88.90.E5.91.98
     *
     * @param string $userId
     *
     * @return JsonResponse
     */
    public function delete($userId)
    {
        return new JsonResponse($this->httpGet('user/delete', ['userid' => $userId]));
    }

    /**
     * 批量删除成员
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%88%90%E5%91%98#.E6.89.B9.E9.87.8F.E5.88.A0.E9.99.A4.E6.88.90.E5.91.98
     *
     * @param array $userIdArr
     *
     * @return JsonResponse
     */
    public function batchDelete($userIdArr)
    {
        return new JsonResponse($this->httpPostJson('user/batchdelete', ['useridlist' => $userIdArr]));
    }

    /**
     * 获取成员
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%88%90%E5%91%98#.E8.8E.B7.E5.8F.96.E6.88.90.E5.91.98
     *
     * @param string $userId
     *
     * @return GetUserResponse
     */
    public function get($userId)
    {
        return new GetUserResponse($this->httpGet('get', ['userid' => $userId]));
    }

    /**
     * 获取部门成员
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%88%90%E5%91%98#.E8.8E.B7.E5.8F.96.E9.83.A8.E9.97.A8.E6.88.90.E5.91.98
     *
     * @param int  $departmentId
     * @param bool $fetchChild
     * @param int  $status
     *
     * @return SimpleListResponse
     */
    public function simpleList($departmentId, $fetchChild = false, $status = UserModel::STATUS_UN_FOLLOWED)
    {
        return new SimpleListResponse($this->httpGet(
            'simplelist',
            [
                'department_id' => $departmentId,
                'fetch_child'   => $fetchChild ? 1 : 0,
                'status'        => $status,
            ]
        ));
    }

    /**
     * 获取部门成员(详情)
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%88%90%E5%91%98#.E8.8E.B7.E5.8F.96.E9.83.A8.E9.97.A8.E6.88.90.E5.91.98.28.E8.AF.A6.E6.83.85.29
     *
     * @param int  $departmentId
     * @param bool $fetchChild
     * @param int  $status
     *
     * @return DetailListResponse
     */
    public function detailList($departmentId, $fetchChild = false, $status = UserModel::STATUS_UN_FOLLOWED)
    {
        return new DetailListResponse($this->httpGet(
            'list',
            [
                'department_id' => $departmentId,
                'fetch_child'   => $fetchChild ? 1 : 0,
                'status'        => $status,
            ]
        ));
    }
}
