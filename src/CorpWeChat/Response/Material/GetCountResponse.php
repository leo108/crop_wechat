<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:53
 */

namespace CorpWeChat\Response\Material;

use CorpWeChat\Response\JsonResponse;

/**
 * Class GetCountResponse
 * @package CorpWeChat\Response\Material
 *
 * @property int $total_count
 * @property int $image_count
 * @property int $voice_count
 * @property int $video_count
 * @property int $file_count
 * @property int $mpnews_count
 */
class GetCountResponse extends JsonResponse
{
    protected static $allowFields = [
        'total_count',
        'image_count',
        'voice_count',
        'video_count',
        'file_count',
        'mpnews_count',
    ];
    protected static $requiredFields = ['total_count'];
}
