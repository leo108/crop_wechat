<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:08
 */

namespace CorpWeChat\Models\Messages\Interfaces;

use CorpWeChat\Models\Messages\Users\ChatReceiver;

/**
 * Interface ChatMessageInterface
 * @package CorpWeChat\Models\Messages\Interfaces
 */
interface ChatMessageInterface
{
    /**
     * @param ChatReceiver $receiver
     * @param string       $senderId
     * @return array
     */
    public function toChatMessage(ChatReceiver $receiver, $senderId);
}
