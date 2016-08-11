<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 17:09
 */

namespace CorpWeChat\Models\Messages\Traits;

use CorpWeChat\Models\Messages\Users\KFUser;

/**
 * Class KFMessageTrait
 * @package CorpWeChat\Models\Messages\Traits
 */
trait KFMessageTrait
{
    /**
     * @param KFUser $sender
     * @param KFUser $receiver
     * @return array
     */
    public function toKFMessage(KFUser $sender, KFUser $receiver)
    {
        $ret             = $this->toArray();
        $ret['sender']   = $sender->toArray();
        $ret['receiver'] = $receiver->toArray();

        return $ret;
    }
}
