<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:34
 */

namespace Leo108\CorpWeChat\Models\Messages;

use Leo108\CorpWeChat\Models\Messages\Interfaces\BroadCastMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Interfaces\ChatMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Interfaces\KFMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Traits\BroadCastMessageTrait;
use Leo108\CorpWeChat\Models\Messages\Traits\ChatMessageTrait;
use Leo108\CorpWeChat\Models\Messages\Traits\KFMessageTrait;

/**
 * Class FileMessage
 * @package Leo108\CorpWeChat\Models\Messages
 */
class FileMessage extends AbstractMessage implements ChatMessageInterface, BroadCastMessageInterface, KFMessageInterface
{
    use ChatMessageTrait;
    use BroadCastMessageTrait;
    use KFMessageTrait;

    /**
     * File constructor.
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
}
