<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:32
 */

namespace Leo108\CorpWeChat\Models\Buttons;

/**
 * Class ViewButton
 * @package Leo108\CorpWeChat\Models\Buttons
 */
class ViewButton extends AbstractButton
{
    /**
     * @var string
     */
    protected $url;

    /**
     * ViewButton constructor.
     * @param string $name
     * @param string $url
     */
    public function __construct($name, $url)
    {
        parent::__construct($name);
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->getType(),
            'name' => $this->name,
            'url'  => $this->url,
        ];
    }
}
