<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 15:01
 */

namespace CorpWeChat\Response\Batch;

use CorpWeChat\Response\JsonResponse;

/**
 * Class CreateResponse
 * @package CorpWeChat\Response\Batch
 *
 * @property string $jobid
 */
class CreateResponse extends JsonResponse
{
    protected static $allowFields = ['jobid'];
    protected static $requiredFields = ['jobid'];
}
