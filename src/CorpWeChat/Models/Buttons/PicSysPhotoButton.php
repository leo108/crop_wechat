<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:38
 */

namespace CorpWeChat\Models\Buttons;

/**
 * Class PicSysPhotoButton
 * @package CorpWeChat\Models\Buttons
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
