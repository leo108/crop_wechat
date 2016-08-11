<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 12:32
 */

namespace CorpWeChat\Response\Tag;

use CorpWeChat\Response\JsonResponse;

/**
 * Class CreateResponse
 * @package CorpWeChat\Response\Tag
 *
 * @property int $tagid
 */
class CreateResponse extends JsonResponse
{
    protected static $allowFields = ['tagid'];
    protected static $requiredFields = ['tagid'];
}
