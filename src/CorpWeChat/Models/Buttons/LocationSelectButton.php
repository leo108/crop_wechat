<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:41
 */

namespace Leo108\CorpWeChat\Models\Buttons;

/**
 * Class LocationSelectButton
 * @package Leo108\CorpWeChat\Models\Buttons
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
