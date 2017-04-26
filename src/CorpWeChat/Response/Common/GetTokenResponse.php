<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 10:58
 */

namespace Leo108\CorpWeChat\Response\Common;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class GetTokenResponse
 * @package Leo108\CorpWeChat\Response
 *
 * @property string $access_token
 * @property int    expires_in
 */
class GetTokenResponse extends JsonResponse
{
    protected static $allowFields = ['access_token', 'expires_in'];
    protected static $requiredFields = ['access_token', 'expires_in'];
}
