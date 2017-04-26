<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 16:00
 */

namespace Leo108\CorpWeChat\Response\User;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class UserInfoResponse
 * @package Leo108\CorpWeChat\Response\User
 *
 * @property string $UserId
 * @property string $DeviceId
 * @property string $OpenId
 */
class UserInfoResponse extends JsonResponse
{
    protected static $allowFields = ['UserId', 'DeviceId', 'OpenId'];
    protected static $requiredFields = ['DeviceId'];
}
