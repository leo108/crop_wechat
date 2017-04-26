<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:19
 */

namespace Leo108\CorpWeChat\Models\Messages;

/**
 * Class AbstractMessage
 * @package Leo108\CorpWeChat\Models\Messages
 */
abstract class AbstractMessage
{
    protected $data = [];

    /**
     * @return string
     */
    public function getType()
    {
        preg_match('~\\\\([^\\\\]+)message$~i', static::class, $m);

        return strtolower($m[1]);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'msgtype'        => $this->getType(),
            $this->getType() => $this->data,
        ];
    }

    /**
     * @param $data
     */
    protected function setData($data)
    {
        $this->data = $data;
    }
}
