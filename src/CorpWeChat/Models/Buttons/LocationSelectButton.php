<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:41
 */

namespace CorpWeChat\Models\Buttons;

/**
 * Class LocationSelectButton
 * @package CorpWeChat\Models\Buttons
 */
class LocationSelectButton extends KeyBasedButton
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'location_select';
    }
}
