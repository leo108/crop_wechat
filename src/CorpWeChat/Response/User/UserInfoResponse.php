<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 16:00
 */

namespace CorpWeChat\Response\User;

use CorpWeChat\Response\JsonResponse;

/**
 * Class UserInfoResponse
 * @package CorpWeChat\Response\User
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
