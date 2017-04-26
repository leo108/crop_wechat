<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 14:35
 */

namespace Leo108\CorpWeChat\Response\Chat;

use Leo108\CorpWeChat\Models\Chat;
use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class GetChatResponse
 * @package Leo108\CorpWeChat\Response\Chat
 */
class GetChatResponse extends JsonResponse
{
    protected static $allowFields = ['chat_info'];
    protected static $requiredFields = ['chat_info'];

    /**
     * @var Chat
     */
    protected $chat;

    /**
     * @return Chat
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        $this->chat = new Chat();
        $this->chat->setId($this->jsonData['chat_info']['chatid'])
            ->setName($this->jsonData['chat_info']['name'])
            ->setOwner($this->jsonData['chat_info']['owner']);
        foreach ($this->jsonData['chat_info']['userlist'] as $id) {
            $this->chat->addUserId($id);
        }
    }
}
