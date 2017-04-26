<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:36
 */

namespace Leo108\CorpWeChat\Models\Buttons;

/**
 * Class ScanCodeWaitMsgButton
 * @package Leo108\CorpWeChat\Models\Buttons
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
