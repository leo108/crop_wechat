<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:36
 */

namespace Leo108\CorpWeChat\Response\Media;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class Upload
 * @package Leo108\CorpWeChat\Response\Media
 *
 * @property string $type
 * @property string $media_id
 * @property int    $created_at
 */
class UploadResponse extends JsonResponse
{
    protected static $allowFields = ['type', 'media_id', 'created_at'];
    protected static $requiredFields = ['type', 'media_id', 'created_at'];
}
