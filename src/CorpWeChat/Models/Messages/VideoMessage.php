<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:31
 */

namespace Leo108\CorpWeChat\Models\Messages;

use Leo108\CorpWeChat\Models\Messages\Interfaces\BroadCastMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Interfaces\ResponseMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Traits\BroadCastMessageTrait;
use Leo108\CorpWeChat\Models\Messages\Traits\ResponseMessageTrait;

/**
 * Class VideoMessage
 * @package Leo108\CorpWeChat\Models\Messages
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
