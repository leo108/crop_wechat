<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:40
 */

namespace Leo108\CorpWeChat\Models\Buttons;

/**
 * Class PicWeixinButton
 * @package Leo108\CorpWeChat\Models\Buttons
 */
class PicWeixinButton extends KeyBasedButton
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'pic_weixin';
    }
}
