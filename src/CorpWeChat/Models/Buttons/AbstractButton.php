<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:24
 */

namespace Leo108\CorpWeChat\Models\Buttons;

/**
 * Class BaseButton
 * @package Leo108\CorpWeChat\Models\Buttons
 */
abstract class AbstractButton
{
    /**
     * @var string
     */
    protected $name;

    /**
     * BaseButton constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        preg_match('~\(.+)$~', static::class, $m);

        return strtolower($m[1]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    abstract public function toArray();
}
