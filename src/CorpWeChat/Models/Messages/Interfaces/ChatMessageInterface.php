<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:08
 */

namespace Leo108\CorpWeChat\Models\Messages\Interfaces;

use Leo108\CorpWeChat\Models\Messages\Users\ChatReceiver;

/**
 * Interface ChatMessageInterface
 * @package Leo108\CorpWeChat\Models\Messages\Interfaces
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
