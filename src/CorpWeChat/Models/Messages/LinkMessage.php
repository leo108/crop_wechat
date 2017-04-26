<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 10:19
 */

namespace Leo108\CorpWeChat\Models\Messages;

use Leo108\CorpWeChat\Models\Messages\Interfaces\ChatMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Traits\ChatMessageTrait;

/**
 * Class LinkMessage
 * @package Leo108\CorpWeChat\Models\Messages
 */
class LinkMessage extends AbstractMessage implements ChatMessageInterface
{
    use ChatMessageTrait;

    /**
     * LinkMessage constructor.
     * @param string $title
     * @param string $desc
     * @param string $url
     * @param string $thumbMediaId
     */
    public function __construct($title = '', $desc = '', $url = '', $thumbMediaId = '')
    {
        $this->setLink($title, $desc, $url, $thumbMediaId);
    }

    /**
     * @param string $title
     * @param string $desc
     * @param string $url
     * @param string $thumbMediaId
     */
    public function setLink($title, $desc, $url, $thumbMediaId)
    {
        $this->setData(
            [
                'title'          => $title,
                'description'    => $desc,
                'url'            => $url,
                'thumb_media_id' => $thumbMediaId,
            ]
        );
    }
}
