<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 17:12
 */

namespace Leo108\CorpWeChat\Models\Messages\Traits;

/**
 * Class ResponseMessageTrait
 * @package Leo108\CorpWeChat\Models\Messages\Traits
 */
trait ResponseMessageTrait
{
    /**
     * @param string $toUser
     * @param string $corpId
     * @return array
     */
    public function toResponseMessage($toUser, $corpId)
    {
        $ret                 = $this->toResponseArray();
        $ret['ToUserName']   = $toUser;
        $ret['FromUserName'] = $corpId;
        $ret['CreateTime']   = time();
        $ret['MsgType']      = $this->getType();

        return $ret;
    }
}
