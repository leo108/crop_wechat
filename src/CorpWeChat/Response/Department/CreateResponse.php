<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 11:53
 */

namespace Leo108\CorpWeChat\Response\Department;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class CreateResponse
 * @package Leo108\CorpWeChat\Response\Department
 *
 * @property int $id
 */
class CreateResponse extends JsonResponse
{
    protected static $allowFields = ['id'];
    protected static $requiredFields = ['id'];
}
