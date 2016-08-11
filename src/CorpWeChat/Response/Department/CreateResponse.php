<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 11:53
 */

namespace CorpWeChat\Response\Department;

use CorpWeChat\Response\JsonResponse;

/**
 * Class CreateResponse
 * @package CorpWeChat\Response\Department
 *
 * @property int $id
 */
class CreateResponse extends JsonResponse
{
    protected static $allowFields = ['id'];
    protected static $requiredFields = ['id'];
}
