<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 12:32
 */

namespace Leo108\CorpWeChat\Response\Tag;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class CreateResponse
 * @package Leo108\CorpWeChat\Response\Tag
 *
 * @property int $tagid
 */
class CreateResponse extends JsonResponse
{
    protected static $allowFields = ['tagid'];
    protected static $requiredFields = ['tagid'];
}
