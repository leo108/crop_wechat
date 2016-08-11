<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 10:58
 */

namespace CorpWeChat\Response\Common;

use CorpWeChat\Response\JsonResponse;

/**
 * Class GetTokenResponse
 * @package CorpWeChat\Response
 *
 * @property string $access_token
 * @property int    expires_in
 */
class GetTokenResponse extends JsonResponse
{
    protected static $allowFields = ['access_token', 'expires_in'];
    protected static $requiredFields = ['access_token', 'expires_in'];
}
