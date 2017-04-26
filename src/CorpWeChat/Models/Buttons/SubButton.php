<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:26
 */

namespace Leo108\CorpWeChat\Models\Buttons;

/**
 * Class SubButton
 * @package Leo108\CorpWeChat\Models\Buttons
 */
class SubButton extends AbstractButton
{
    /**
     * @var AbstractButton[]
     */
    protected $sub = [];

    /**
     * @param AbstractButton $button
     */
    public function addButton(AbstractButton $button)
    {
        $this->sub[] = $button;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $ret = [
            'name'       => $this->name,
            'sub_button' => [],
        ];
        foreach ($this->sub as $button) {
            $ret['sub_button'][] = $button->toArray();
        }

        return $ret;
    }
}
