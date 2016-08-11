<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:05
 */

namespace CorpWeChat\Models\Messages\Interfaces;

/**
 * Interface ResponseMessageInterface
 * @package CorpWeChat\Models\Messages\Interfaces
 */
interface ResponseMessageInterface
{
    /**
     * @param string $toUser
     * @param string $corpId
     * @return array
     */
    public function toResponseMessage($toUser, $corpId);

    /**
     * @return array
     */
    public function toResponseArray();
}
