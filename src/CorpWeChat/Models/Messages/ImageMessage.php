<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:31
 */

namespace Leo108\CorpWeChat\Models\Messages;

use Leo108\CorpWeChat\Models\Messages\Interfaces\BroadCastMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Interfaces\ChatMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Interfaces\KFMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Interfaces\ResponseMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Traits\BroadCastMessageTrait;
use Leo108\CorpWeChat\Models\Messages\Traits\ChatMessageTrait;
use Leo108\CorpWeChat\Models\Messages\Traits\KFMessageTrait;
use Leo108\CorpWeChat\Models\Messages\Traits\ResponseMessageTrait;

/**
 * Class ImageMessage
 * @package Leo108\CorpWeChat\Models\Messages
 */
class ImageMessage extends AbstractMessage implements ChatMessageInterface, BroadCastMessageInterface, KFMessageInterface, ResponseMessageInterface
{
    use ChatMessageTrait;
    use BroadCastMessageTrait;
    use KFMessageTrait;
    use ResponseMessageTrait;

    /**
     * Image constructor.
     *
     * @param string $id
     */
    public function __construct($id = '')
    {
        $this->setMediaId($id);
    }

    /**
     * @param string $id
     */
    public function setMediaId($id)
    {
        $this->setData(['media_id' => $id]);
    }

    /**
     * @return array
     */
    public function toResponseArray()
    {
        return [
            'Image' => [
                'MediaId' => $this->data['media_id'],
            ],
        ];
    }
}
