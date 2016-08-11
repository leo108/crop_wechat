<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:38
 */

namespace CorpWeChat\Models\Buttons;

/**
 * Class ScanCodePushButton
 * @package CorpWeChat\Models\Buttons
 */
class ScanCodePushButton extends KeyBasedButton
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'scancode_push';
    }
}
