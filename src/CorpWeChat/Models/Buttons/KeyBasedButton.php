<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:37
 */

namespace Leo108\CorpWeChat\Models\Buttons;

/**
 * Class KeyBasedButton
 * @package Leo108\CorpWeChat\Models\Buttons
 */
class KeyBasedButton extends AbstractButton
{
    protected $key;

    /**
     * KeyBasedButton constructor.
     * @param string $name
     * @param string $key
     */
    public function __construct($name, $key)
    {
        parent::__construct($name);
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->getType(),
            'name' => $this->name,
            'key'  => $this->key,
        ];
    }
}
