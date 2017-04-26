<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:15
 */

namespace Leo108\CorpWeChat\Models\Messages\Traits;

use Leo108\CorpWeChat\Models\Messages\Users\ChatReceiver;

/**
 * Class ChatMessageTrait
 * @package Leo108\CorpWeChat\Models\Messages\Traits
 */
trait ChatMessageTrait
{
    /**
     * @param ChatReceiver $receiver
     * @param string       $senderId
     * @return array
     */
    public function toChatMessage(ChatReceiver $receiver, $senderId)
    {
        $ret             = $this->toArray();
        $ret['receiver'] = $receiver->toArray();
        $ret['sender']   = $senderId;

        return $ret;
    }
}
