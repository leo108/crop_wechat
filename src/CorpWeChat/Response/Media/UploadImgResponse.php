<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:38
 */

namespace Leo108\CorpWeChat\Response\Media;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class UploadImgResponse
 * @package Leo108\CorpWeChat\Response\Media
 *
 * @property string $url
 */
class UploadImgResponse extends JsonResponse
{
    protected static $allowFields = ['url'];
    protected static $requiredFields = ['url'];
}
