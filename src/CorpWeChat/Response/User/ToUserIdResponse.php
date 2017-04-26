<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 16:03
 */

namespace Leo108\CorpWeChat\Response\User;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class ToUserIdResponse
 * @package Leo108\CorpWeChat\Response\User
 *
 * @property string $userid
 */
class ToUserIdResponse extends JsonResponse
{
    protected static $allowFields = ['userid'];
    protected static $requiredFields = ['userid'];
}
