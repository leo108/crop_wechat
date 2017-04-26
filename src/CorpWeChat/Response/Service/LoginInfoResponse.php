<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:15
 */

namespace Leo108\CorpWeChat\Response\Service;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class LoginInfoResponse
 * @package Leo108\CorpWeChat\Response\Service
 *
 * @property int   $usertype
 * @property array $user_info
 * @property array $corp_info
 * @property array $agent
 * @property array $auth_info
 * @property array $redirect_login_info
 */
class LoginInfoResponse extends JsonResponse
{
    protected static $allowFields = ['usertype', 'user_info', 'corp_info', 'agent', 'auth_info', 'redirect_login_info'];
    protected static $requiredFields = ['usertype', 'user_info', 'corp_info'];
}
