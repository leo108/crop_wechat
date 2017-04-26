<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:13
 */

namespace Leo108\CorpWeChat\Response\Service;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class LoginUrlResponse
 * @package Leo108\CorpWeChat\Response\Service
 *
 * @property string $login_url
 * @property int    $expires_in
 */
class LoginUrlResponse extends JsonResponse
{
    protected static $allowFields = ['login_url', 'expires_in'];
    protected static $requiredFields = ['login_url', 'expires_in'];
}
