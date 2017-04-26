<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 09:23
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\Articles\MpNewArticle;
use Leo108\CorpWeChat\Response\FileResponse;
use Leo108\CorpWeChat\Response\JsonResponse;
use Leo108\CorpWeChat\Response\Material\CreateResponse;
use Leo108\CorpWeChat\Response\Material\GetCountResponse;
use Leo108\CorpWeChat\Response\Material\GetListResponse;

/**
 * 永久素材相关接口
 * Class Material
 *
 * @package Leo108\CorpWeChat\Api
 */
class Material extends AbstractApi
{
    const TYPE_IMAGE = 'image';
    const TYPE_VOICE = 'voice';
    const TYPE_VIDEO = 'video';
    const TYPE_FILE = 'file';

    /**
     * 上传永久图文素材
     *
     * @link http://qydev.weixin.qq.com/wiki/index.php?title=%E4%B8%8A%E4%BC%A0%E6%B0%B8%E4%B9%85%E7%B4%A0%E6%9D%90
     *
     * @param int            $agentId
     * @param MpNewArticle[] $articles
     *
     * @return CreateResponse
     */
    public function addMpNews($agentId, $articles)
    {
        $req = [
            'agentid' => $agentId,
            'mpnews'  => [
                'articles' => [],
            ],
        ];
        foreach ($articles as $article) {
            $req['mpnews']['articles'][] = $article->toArray();
        }

        return new CreateResponse($this->httpPostJson('material/add_mpnews', $req));
    }

    /**
     * 修改永久图文素材
     *
     * @link http://qydev.weixin.qq.com/wiki/index.php?title=%E4%BF%AE%E6%94%B9%E6%B0%B8%E4%B9%85%E5%9B%BE%E6%96%87%E7%B4%A0%E6%9D%90
     *
     * @param int            $agentId
     * @param string         $mediaId
     * @param MpNewArticle[] $articles
     *
     * @return JsonResponse
     */
    public function updateMpNews($agentId, $mediaId, $articles)
    {
        $req = [
            'agentid'  => $agentId,
            'media_id' => $mediaId,
            'mpnews'   => [
                'articles' => [],
            ],
        ];
        foreach ($articles as $article) {
            $req['mpnews']['articles'][] = $article->toArray();
        }

        return new JsonResponse($this->httpPostJson('material/update_mpnews', $req));
    }

    /**
     * 上传其他类型永久素材
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E4%B8%8A%E4%BC%A0%E6%B0%B8%E4%B9%85%E7%B4%A0%E6%9D%90#.E4.B8.8A.E4.BC.A0.E5.85.B6.E4.BB.96.E7.B1.BB.E5.9E.8B.E6.B0.B8.E4.B9.85.E7.B4.A0.E6.9D.90
     *
     * @param int    $agentId
     * @param string $type
     * @param string $filePath
     *
     * @return CreateResponse
     */
    public function addMaterial($agentId, $type, $filePath)
    {
        $url = 'material/add_material?'.http_build_query(['agentid' => $agentId, 'type' => $type]);

        return new CreateResponse($this->httpUpload($url, ['media' => fopen($filePath, 'r')]));
    }

    /**
     * 获取永久素材
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96%E6%B0%B8%E4%B9%85%E7%B4%A0%E6%9D%90
     *
     * @param int    $agentId
     * @param string $mediaId
     *
     * @return FileResponse
     */
    public function get($agentId, $mediaId)
    {
        return new FileResponse($this->httpGet('material/get', ['agentid' => $agentId, 'media_id' => $mediaId]));
    }

    /**
     * 删除永久素材
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E5%88%A0%E9%99%A4%E6%B0%B8%E4%B9%85%E7%B4%A0%E6%9D%90
     *
     * @param int    $agentId
     * @param string $mediaId
     *
     * @return JsonResponse
     */
    public function del($agentId, $mediaId)
    {
        return new JsonResponse($this->httpGet('material/del', ['agentid' => $agentId, 'media_id' => $mediaId]));
    }

    /**
     * 获取素材总数
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96%E7%B4%A0%E6%9D%90%E6%80%BB%E6%95%B0
     *
     * @param int $agentId
     *
     * @return GetCountResponse
     */
    public function getCount($agentId)
    {
        return new GetCountResponse($this->httpGet('material/get_count', ['agentid' => $agentId]));
    }

    /**
     * 获取素材列表
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96%E7%B4%A0%E6%9D%90%E5%88%97%E8%A1%A8
     *
     * @param string $type
     * @param int    $agentId
     * @param int    $offset
     * @param int    $count
     *
     * @return GetListResponse
     */
    public function batchGet($type, $agentId, $offset, $count)
    {
        return new GetListResponse($this->httpPostJson(
            'material/batchget',
            [
                'type'    => $type,
                'agentid' => $agentId,
                'offset'  => $offset,
                'count'   => $count,
            ]
        ));
    }
}
