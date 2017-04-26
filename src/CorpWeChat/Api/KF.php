<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 09:47
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\Messages\Interfaces\KFMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Users\KFUser;
use Leo108\CorpWeChat\Response\JsonResponse;
use Leo108\CorpWeChat\Response\KF\GetListResponse;

/**
 * 客服相关接口
 * Class KF
 *
 * @package Leo108\CorpWeChat\Api
 */
class KF extends AbstractApi
{
    const TYPE_INTERNAL = 'internal';
    const TYPE_EXTERNAL = 'external';

    /**
     * 发送客服消息
     *
     * @param KFUser             $sender
     * @param KFUser             $receiver
     * @param KFMessageInterface $message
     *
     * @return JsonResponse
     */
    public function send(KFUser $sender, KFUser $receiver, KFMessageInterface $message)
    {
        return new JsonResponse($this->httpPostJson('kf/send', $message->toKFMessage($sender, $receiver)));
    }

    /**
     * 获取客服列表
     *
     * @param null|string $type
     *
     * @return GetListResponse
     */
    public function getList($type = null)
    {
        $req = [];
        if (!is_null($type)) {
            $req['type'] = $type;
        }

        return new GetListResponse($this->httpGet('kf/list', $req));
    }
}
