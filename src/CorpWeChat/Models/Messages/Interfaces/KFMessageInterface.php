<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:10
 */

namespace CorpWeChat\Models\Messages\Interfaces;

use CorpWeChat\Models\Messages\Users\KFUser;

/**
 * Interface KFMessageInterface
 * @package CorpWeChat\Models\Messages\Interfaces
 */
interface KFMessageInterface
{
    /**
     * @param KFUser $sender
     * @param KFUser $receiver
     * @return array
     */
    public function toKFMessage(KFUser $sender, KFUser $receiver);
}
