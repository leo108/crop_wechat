<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:27
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
 * Class TextMessage
 * @package Leo108\CorpWeChat\Models\Messages
 */
class TextMessage extends AbstractMessage implements ChatMessageInterface, BroadCastMessageInterface, KFMessageInterface, ResponseMessageInterface
{
    use ChatMessageTrait;
    use BroadCastMessageTrait;
    use KFMessageTrait;
    use ResponseMessageTrait;

    /**
     * TextMessage constructor.
     * @param string $str
     */
    public function __construct($str = '')
    {
        $this->setContent($str);
    }

    /**
     * @param string $str
     */
    public function setContent($str)
    {
        $this->setData(['content' => $str]);
    }

    /**
     * @return array
     */
    public function toResponseArray()
    {
        return [
            'Content' => $this->data['content'],
        ];
    }
}
