<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 09:18
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Response\FileResponse;
use Leo108\CorpWeChat\Response\Media\UploadImgResponse;
use Leo108\CorpWeChat\Response\Media\UploadResponse;

/**
 * 临时素材接口
 * Class Media
 *
 * @package Leo108\CorpWeChat\Api
 */
class Media extends AbstractApi
{
    const TYPE_IMAGE = 'image';
    const TYPE_VOICE = 'voice';
    const TYPE_VIDEO = 'video';
    const TYPE_FILE = 'file';

    /**
     * 上传临时素材文件
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E4%B8%8A%E4%BC%A0%E4%B8%B4%E6%97%B6%E7%B4%A0%E6%9D%90%E6%96%87%E4%BB%B6
     *
     * @param string $type
     * @param string $filePath
     *
     * @return UploadResponse
     */
    public function upload($type, $filePath)
    {
        return new UploadResponse($this->httpUpload(
            'media/upload',
            [
                'type'  => $type,
                'media' => fopen($filePath, 'r'),
            ]
        ));
    }

    /**
     * 上传图文消息内的图片
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E4%B8%8A%E4%BC%A0%E5%9B%BE%E6%96%87%E6%B6%88%E6%81%AF%E5%86%85%E7%9A%84%E5%9B%BE%E7%89%87
     *
     * @param string $filePath
     *
     * @return UploadImgResponse
     */
    public function uploadImg($filePath)
    {
        return new UploadImgResponse($this->httpUpload(
            'media/uploadimg',
            [
                'media' => fopen($filePath, 'r'),
            ]
        ));
    }

    /**
     * 获取临时素材文件
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96%E4%B8%B4%E6%97%B6%E7%B4%A0%E6%9D%90%E6%96%87%E4%BB%B6
     *
     * @param string $mediaId
     *
     * @return FileResponse
     */
    public function get($mediaId)
    {
        return new FileResponse($this->httpGet('media/get', ['media_id' => $mediaId]));
    }
}
