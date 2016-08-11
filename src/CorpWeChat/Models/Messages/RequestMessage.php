<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/11
 * Time: 09:57
 */

namespace CorpWeChat\Models\Messages;

/**
 * Class RequestMessage
 * @package CorpWeChat\Models\Messages
 *
 * @property string $ToUserName
 * @property string $FromUserName
 * @property string $CreateTime
 * @property string $MsgType
 * @property string $MsgId
 * @property string $AgentID
 * @property string $Content
 * @property string $MediaId
 * @property string $PicUrl
 * @property string $Format
 * @property string $ThumbMediaId
 * @property string $Location_X
 * @property string $Location_Y
 * @property string $Scale
 * @property string $Label
 * @property string $Title
 * @property string $Description
 */
class RequestMessage
{
    /**
     * RequestMessage constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        $this->originData = $data;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        return isset($this->originData[$name]) ? $this->originData : null;
    }
}
