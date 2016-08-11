<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 09:47
 */

namespace CorpWeChat\Api;

use CorpWeChat\Models\Messages\Interfaces\KFMessageInterface;
use CorpWeChat\Models\Messages\Users\KFUser;
use CorpWeChat\Response\JsonResponse;
use CorpWeChat\Response\KF\GetListResponse;

/**
 * 客服相关接口
 * Class KF
 * @package CorpWeChat\Api
 */
class KF extends AbstractApi
{
    const TYPE_INTERNAL = 'internal';
    const TYPE_EXTERNAL = 'external';

    /**
     * 发送客服消息
     * @param KFUser             $sender
     * @param KFUser             $receiver
     * @param KFMessageInterface $message
     * @return JsonResponse
     */
    public function send(KFUser $sender, KFUser $receiver, KFMessageInterface $message)
    {
        return $this->httpPostJson('kf/send', $message->toKFMessage($sender, $receiver), new JsonResponse());
    }

    /**
     * 获取客服列表
     * @param null|string $type
     * @return GetListResponse
     */
    public function getList($type = null)
    {
        $req = [];
        if (!is_null($type)) {
            $req['type'] = $type;
        }

        return $this->httpGet('kf/list', $req, new GetListResponse());
    }
}
