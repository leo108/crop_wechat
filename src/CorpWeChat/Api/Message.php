<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 18:03
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\Messages\Users\BroadCastReceivers;
use Leo108\CorpWeChat\Models\Messages\Interfaces\BroadCastMessageInterface;
use Leo108\CorpWeChat\Response\Message\SendResponse;

/**
 * 发消息接口
 * Class Message
 *
 * @package Leo108\CorpWeChat\Api
 */
class Message extends AbstractApi
{
    /**
     * 发送消息
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E5%8F%91%E9%80%81%E6%8E%A5%E5%8F%A3%E8%AF%B4%E6%98%8E
     *
     * @param BroadCastReceivers        $receivers
     * @param BroadCastMessageInterface $msg
     *
     * @return SendResponse
     */
    public function send(BroadCastReceivers $receivers, BroadCastMessageInterface $msg)
    {
        return new SendResponse($this->httpPostJson('message/send', $msg->toBroadCastMessage($receivers)));
    }
}
