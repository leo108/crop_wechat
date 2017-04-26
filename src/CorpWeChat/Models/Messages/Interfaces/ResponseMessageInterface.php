<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:05
 */

namespace Leo108\CorpWeChat\Models\Messages\Interfaces;

/**
 * Interface ResponseMessageInterface
 * @package Leo108\CorpWeChat\Models\Messages\Interfaces
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
