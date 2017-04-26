<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:10
 */

namespace Leo108\CorpWeChat\Models\Messages\Interfaces;

use Leo108\CorpWeChat\Models\Messages\Users\KFUser;

/**
 * Interface KFMessageInterface
 * @package Leo108\CorpWeChat\Models\Messages\Interfaces
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
