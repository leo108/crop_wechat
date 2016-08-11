<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 16:03
 */

namespace CorpWeChat\Response\User;

use CorpWeChat\Response\JsonResponse;

/**
 * Class ToUserIdResponse
 * @package CorpWeChat\Response\User
 *
 * @property string $userid
 */
class ToUserIdResponse extends JsonResponse
{
    protected static $allowFields = ['userid'];
    protected static $requiredFields = ['userid'];
}
