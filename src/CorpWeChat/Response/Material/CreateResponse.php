<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:49
 */

namespace Leo108\CorpWeChat\Response\Material;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class CreateResponse
 * @package Leo108\CorpWeChat\Response\Material
 *
 * @property string $media_id
 */
class CreateResponse extends JsonResponse
{
    protected static $allowFields = ['media_id'];
    protected static $requiredFields = ['media_id'];
}
