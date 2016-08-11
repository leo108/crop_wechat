<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 14:27
 */

namespace CorpWeChat\Response\KF;

use CorpWeChat\Response\JsonResponse;

/**
 * Class GetListResponse
 * @package CorpWeChat\Response\KF
 *
 * @property array $internal
 * @property array $external
 */
class GetListResponse extends JsonResponse
{
    protected static $allowFields = ['internal', 'external'];
}
