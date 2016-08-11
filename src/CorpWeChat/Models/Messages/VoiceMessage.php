<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:34
 */

namespace CorpWeChat\Models\Messages;

use CorpWeChat\Models\Messages\Interfaces\BroadCastMessageInterface;
use CorpWeChat\Models\Messages\Interfaces\ChatMessageInterface;
use CorpWeChat\Models\Messages\Interfaces\KFMessageInterface;
use CorpWeChat\Models\Messages\Interfaces\ResponseMessageInterface;
use CorpWeChat\Models\Messages\Traits\BroadCastMessageTrait;
use CorpWeChat\Models\Messages\Traits\ChatMessageTrait;
use CorpWeChat\Models\Messages\Traits\KFMessageTrait;
use CorpWeChat\Models\Messages\Traits\ResponseMessageTrait;

/**
 * Class VoiceMessage
 * @package CorpWeChat\Models\Messages
 */
class VoiceMessage extends AbstractMessage implements ChatMessageInterface, BroadCastMessageInterface, KFMessageInterface, ResponseMessageInterface
{
    use ChatMessageTrait;
    use BroadCastMessageTrait;
    use KFMessageTrait;
    use ResponseMessageTrait;

    /**
     * Voice constructor.
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
            'Voice' => [
                'MediaId' => $this->data['media_id'],
            ],
        ];
    }
}
