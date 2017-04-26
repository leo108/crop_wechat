<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:04
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\Tag as TagModel;
use Leo108\CorpWeChat\Response\JsonResponse;
use Leo108\CorpWeChat\Response\Tag\CreateResponse;
use Leo108\CorpWeChat\Response\Tag\GetMemberResponse;
use Leo108\CorpWeChat\Response\Tag\ModifyResponse;
use Leo108\CorpWeChat\Response\Tag\TagListResponse;

/**
 * 通讯录-标签管理接口
 * Class Tag
 *
 * @package Leo108\CorpWeChat\Api
 */
class Tag extends AbstractApi
{
    /**
     * 创建标签
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E5.88.9B.E5.BB.BA.E6.A0.87.E7.AD.BE
     *
     * @param TagModel $tag
     *
     * @return CreateResponse
     */
    public function create(TagModel $tag)
    {
        return new CreateResponse($this->httpPostJson('tag/create', $tag->toArray()));
    }

    /**
     * 更新标签名字
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E6.9B.B4.E6.96.B0.E6.A0.87.E7.AD.BE.E5.90.8D.E5.AD.97
     *
     * @param TagModel $tag
     *
     * @return JsonResponse
     */
    public function update(TagModel $tag)
    {
        return new JsonResponse($this->httpPostJson('tag/update', $tag->toArray()));
    }

    /**
     * 删除标签
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E5.88.A0.E9.99.A4.E6.A0.87.E7.AD.BE
     *
     * @param int $tagId
     *
     * @return JsonResponse
     */
    public function delete($tagId)
    {
        return new JsonResponse($this->httpGet('tag/delete', ['id' => $tagId]));
    }

    /**
     * 获取标签成员
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E8.8E.B7.E5.8F.96.E6.A0.87.E7.AD.BE.E6.88.90.E5.91.98
     *
     * @param int $tagId
     *
     * @return GetMemberResponse
     */
    public function get($tagId)
    {
        return new GetMemberResponse($this->httpGet('tag/get', ['id' => $tagId]));
    }

    /**
     * 增加标签成员
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E5.A2.9E.E5.8A.A0.E6.A0.87.E7.AD.BE.E6.88.90.E5.91.98
     *
     * @param int   $tagId
     * @param array $userIdArr
     * @param array $departmentIdArr
     *
     * @return ModifyResponse
     */
    public function addTagUsers($tagId, $userIdArr, $departmentIdArr = [])
    {
        return new ModifyResponse($this->httpPostJson(
            'tag/addtagusers',
            [
                'tagid'     => $tagId,
                'userlist'  => $userIdArr,
                'partylist' => $departmentIdArr,
            ]
        ));
    }

    /**
     * 删除标签成员
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E5.88.A0.E9.99.A4.E6.A0.87.E7.AD.BE.E6.88.90.E5.91.98
     *
     * @param int   $tagId
     * @param array $userIdArr
     * @param array $departmentIdArr
     *
     * @return ModifyResponse
     */
    public function delTagUsers($tagId, $userIdArr, $departmentIdArr = [])
    {
        return new ModifyResponse($this->httpPostJson(
            'tag/deltagusers',
            [
                'tagid'     => $tagId,
                'userlist'  => $userIdArr,
                'partylist' => $departmentIdArr,
            ]
        ));
    }

    /**
     * 获取标签列表
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E8.8E.B7.E5.8F.96.E6.A0.87.E7.AD.BE.E5.88.97.E8.A1.A8
     * @return TagListResponse
     */
    public function tagList()
    {
        return new TagListResponse($this->httpGet('tag/list', []));
    }
}
