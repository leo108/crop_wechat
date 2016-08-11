<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:09
 */

namespace CorpWeChat\Models\Messages\Interfaces;

use CorpWeChat\Models\Messages\Users\BroadCastReceivers;

/**
 * Interface BroadCastMessageInterface
 * @package CorpWeChat\Models\Messages\Interfaces
 */
interface BroadCastMessageInterface
{
    /**
     * @param BroadCastReceivers $receivers
     * @return array
     */
    public function toBroadCastMessage(BroadCastReceivers $receivers);
}
