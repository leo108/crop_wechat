<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:38
 */

namespace CorpWeChat\Response\Media;

use CorpWeChat\Response\JsonResponse;

/**
 * Class UploadImgResponse
 * @package CorpWeChat\Response\Media
 *
 * @property string $url
 */
class UploadImgResponse extends JsonResponse
{
    protected static $allowFields = ['url'];
    protected static $requiredFields = ['url'];
}
