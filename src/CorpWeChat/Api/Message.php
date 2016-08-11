<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 18:03
 */

namespace CorpWeChat\Api;

use CorpWeChat\Models\Messages\Users\BroadCastReceivers;
use CorpWeChat\Models\Messages\Interfaces\BroadCastMessageInterface;
use CorpWeChat\Response\Message\SendResponse;

/**
 * 发消息接口
 * Class Message
 * @package CorpWeChat\Api
 */
class Message extends AbstractApi
{
    /**
     * 发送消息
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E5%8F%91%E9%80%81%E6%8E%A5%E5%8F%A3%E8%AF%B4%E6%98%8E
     * @param BroadCastReceivers        $receivers
     * @param BroadCastMessageInterface $msg
     * @return SendResponse
     */
    public function send(BroadCastReceivers $receivers, BroadCastMessageInterface $msg)
    {
        return $this->httpPostJson('message/send', $msg->toBroadCastMessage($receivers), new SendResponse());
    }
}
