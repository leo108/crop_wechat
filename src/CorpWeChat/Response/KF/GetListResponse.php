<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 14:27
 */

namespace Leo108\CorpWeChat\Response\KF;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class GetListResponse
 * @package Leo108\CorpWeChat\Response\KF
 *
 * @property array $internal
 * @property array $external
 */
class GetListResponse extends JsonResponse
{
    protected static $allowFields = ['internal', 'external'];
}
