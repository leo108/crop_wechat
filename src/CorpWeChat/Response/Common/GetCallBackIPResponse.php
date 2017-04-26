<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/11
 * Time: 12:48
 */

namespace Leo108\CorpWeChat\Response\Common;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class GetCallBackIPResponse
 * @package Leo108\CorpWeChat\Response\Common
 *
 * @property array $ip_list
 */
class GetCallBackIPResponse extends JsonResponse
{
    protected static $allowFields = ['ip_list'];
    protected static $requiredFields = ['ip_list'];
}
