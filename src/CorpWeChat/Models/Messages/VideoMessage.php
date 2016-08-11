<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:31
 */

namespace CorpWeChat\Models\Messages;

use CorpWeChat\Models\Messages\Interfaces\BroadCastMessageInterface;
use CorpWeChat\Models\Messages\Interfaces\ResponseMessageInterface;
use CorpWeChat\Models\Messages\Traits\BroadCastMessageTrait;
use CorpWeChat\Models\Messages\Traits\ResponseMessageTrait;

/**
 * Class VideoMessage
 * @package CorpWeChat\Models\Messages
 */
class VideoMessage extends AbstractMessage implements BroadCastMessageInterface, ResponseMessageInterface
{
    use BroadCastMessageTrait;
    use ResponseMessageTrait;

    /**
     * Video constructor.
     *
     * @param string $id
     * @param string $title
     * @param string $desc
     */
    public function __construct($id = '', $title = '', $desc = '')
    {
        $this->setVideo($id, $title, $desc);
    }

    /**
     * @param string $id
     * @param string $title
     * @param string $desc
     */
    public function setVideo($id, $title, $desc)
    {
        $this->setData(
            [
                'media_id'    => $id,
                'title'       => $title,
                'description' => $desc,
            ]
        );
    }

    /**
     * @return array
     */
    public function toResponseArray()
    {
        return [
            'Video' => [
                'MediaId' => $this->data['media_id'],
            ],
        ];
    }
}
