<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:49
 */

namespace CorpWeChat\Response\Material;

use CorpWeChat\Response\JsonResponse;

/**
 * Class CreateResponse
 * @package CorpWeChat\Response\Material
 *
 * @property string $media_id
 */
class CreateResponse extends JsonResponse
{
    protected static $allowFields = ['media_id'];
    protected static $requiredFields = ['media_id'];
}
