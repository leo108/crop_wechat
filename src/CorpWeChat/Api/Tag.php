<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:04
 */

namespace CorpWeChat\Api;

use CorpWeChat\Models\Tag as TagModel;
use CorpWeChat\Response\JsonResponse;
use CorpWeChat\Response\Tag\CreateResponse;
use CorpWeChat\Response\Tag\GetMemberResponse;
use CorpWeChat\Response\Tag\ModifyResponse;
use CorpWeChat\Response\Tag\TagListResponse;

/**
 * 通讯录-标签管理接口
 * Class Tag
 * @package CorpWeChat\Api
 */
class Tag extends AbstractApi
{
    /**
     * 创建标签
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E5.88.9B.E5.BB.BA.E6.A0.87.E7.AD.BE
     * @param TagModel $tag
     * @return CreateResponse
     */
    public function create(TagModel $tag)
    {
        return $this->httpPostJson('tag/create', $tag->toArray(), new CreateResponse());
    }

    /**
     * 更新标签名字
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E6.9B.B4.E6.96.B0.E6.A0.87.E7.AD.BE.E5.90.8D.E5.AD.97
     * @param TagModel $tag
     * @return JsonResponse
     */
    public function update(TagModel $tag)
    {
        return $this->httpPostJson('tag/update', $tag->toArray(), new JsonResponse());
    }

    /**
     * 删除标签
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E5.88.A0.E9.99.A4.E6.A0.87.E7.AD.BE
     * @param int $tagId
     * @return JsonResponse
     */
    public function delete($tagId)
    {
        return $this->httpGet('tag/delete', ['id' => $tagId], new JsonResponse());
    }

    /**
     * 获取标签成员
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E8.8E.B7.E5.8F.96.E6.A0.87.E7.AD.BE.E6.88.90.E5.91.98
     * @param int $tagId
     * @return GetMemberResponse
     */
    public function get($tagId)
    {
        return $this->httpGet('tag/get', ['id' => $tagId], new GetMemberResponse());
    }

    /**
     * 增加标签成员
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E5.A2.9E.E5.8A.A0.E6.A0.87.E7.AD.BE.E6.88.90.E5.91.98
     * @param int   $tagId
     * @param array $userIdArr
     * @param array $departmentIdArr
     * @return ModifyResponse
     */
    public function addTagUsers($tagId, $userIdArr, $departmentIdArr = [])
    {
        return $this->httpPostJson(
            'tag/addtagusers',
            [
                'tagid'     => $tagId,
                'userlist'  => $userIdArr,
                'partylist' => $departmentIdArr,
            ],
            new ModifyResponse()
        );
    }

    /**
     * 删除标签成员
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E5.88.A0.E9.99.A4.E6.A0.87.E7.AD.BE.E6.88.90.E5.91.98
     * @param int   $tagId
     * @param array $userIdArr
     * @param array $departmentIdArr
     * @return ModifyResponse
     */
    public function delTagUsers($tagId, $userIdArr, $departmentIdArr = [])
    {
        return $this->httpPostJson(
            'tag/deltagusers',
            [
                'tagid'     => $tagId,
                'userlist'  => $userIdArr,
                'partylist' => $departmentIdArr,
            ],
            new ModifyResponse()
        );
    }

    /**
     * 获取标签列表
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E7%AE%A1%E7%90%86%E6%A0%87%E7%AD%BE#.E8.8E.B7.E5.8F.96.E6.A0.87.E7.AD.BE.E5.88.97.E8.A1.A8
     * @return TagListResponse
     */
    public function tagList()
    {
        return $this->httpGet('tag/list', [], new TagListResponse());
    }
}
