<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:36
 */

namespace CorpWeChat\Models\Buttons;

/**
 * Class ScanCodeWaitMsgButton
 * @package CorpWeChat\Models\Buttons
 */
class ScanCodeWaitMsgButton extends KeyBasedButton
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'scancode_waitmsg';
    }
}
