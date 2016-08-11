<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 16:02
 */

namespace CorpWeChat\Response\User;

use CorpWeChat\Response\JsonResponse;

/**
 * Class ToOpenIdResponse
 * @package CorpWeChat\Response\User
 *
 * @property string $openid
 * @property string $appid
 */
class ToOpenIdResponse extends JsonResponse
{
    protected static $allowFields = ['openid', 'appid'];
    protected static $requiredFields = ['openid'];
}
