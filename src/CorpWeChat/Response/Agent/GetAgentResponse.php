<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/11
 * Time: 14:06
 */

namespace Leo108\CorpWeChat\Response\Agent;

use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class GetAgentResponse
 * @package Leo108\CorpWeChat\Response\Agent
 *
 * @property int    $agentid
 * @property string $name
 * @property string $square_logo_url
 * @property string $round_logo_url
 * @property string $description
 * @property array  $allow_userinfos
 * @property array  $allow_partys
 * @property array  $allow_tags
 * @property int    $close
 * @property string $redirect_domain
 * @property int    $report_location_flag
 * @property int    $isreportuser
 * @property int    $isreportenter
 * @property string $chat_extension_url
 * @property int    $type
 */
class GetAgentResponse extends JsonResponse
{
    protected static $allowFields = [
        'agentid',
        'name',
        'square_logo_url',
        'round_logo_url',
        'description',
        'allow_userinfos',
        'allow_partys',
        'allow_tags',
        'close',
        'redirect_domain',
        'report_location_flag',
        'isreportuser',
        'isreportenter',
        'chat_extension_url',
        'type',
    ];
    protected static $requiredFields = [
        'agentid',
        'name',
        'square_logo_url',
        'round_logo_url',
        'description',
        'allow_userinfos',
        'allow_partys',
        'allow_tags',
        'close',
        'redirect_domain',
        'report_location_flag',
        'isreportuser',
        'isreportenter',
        'chat_extension_url',
        'type',
    ];
}
