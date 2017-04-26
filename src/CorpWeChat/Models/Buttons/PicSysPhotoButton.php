<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:38
 */

namespace Leo108\CorpWeChat\Models\Buttons;

/**
 * Class PicSysPhotoButton
 * @package Leo108\CorpWeChat\Models\Buttons
 */
class PicSysPhotoButton extends KeyBasedButton
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'pic_sysphoto';
    }
}
