<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:09
 */

namespace Leo108\CorpWeChat\Models\Messages\Interfaces;

use Leo108\CorpWeChat\Models\Messages\Users\BroadCastReceivers;

/**
 * Interface BroadCastMessageInterface
 * @package Leo108\CorpWeChat\Models\Messages\Interfaces
 */
interface BroadCastMessageInterface
{
    /**
     * @param BroadCastReceivers $receivers
     * @return array
     */
    public function toBroadCastMessage(BroadCastReceivers $receivers);
}
