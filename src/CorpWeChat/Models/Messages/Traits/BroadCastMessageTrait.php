<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 17:01
 */

namespace CorpWeChat\Models\Messages\Traits;

use CorpWeChat\Models\Messages\Users\BroadCastReceivers;

/**
 * Class BroadCastMessageTrait
 * @package CorpWeChat\Models\Messages\Traits
 */
trait BroadCastMessageTrait
{
    /**
     * @param BroadCastReceivers $receivers
     * @return array
     */
    public function toBroadCastMessage(BroadCastReceivers $receivers)
    {
        return array_merge($this->toArray(), $receivers->toArray());
    }
}
