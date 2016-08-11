<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:40
 */

namespace CorpWeChat\Models\Buttons;

/**
 * Class PicWeixinButton
 * @package CorpWeChat\Models\Buttons
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
