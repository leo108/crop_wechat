<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 14:35
 */

namespace CorpWeChat\Response\Chat;

use CorpWeChat\Models\Chat;
use CorpWeChat\Response\JsonResponse;

/**
 * Class GetChatResponse
 * @package CorpWeChat\Response\Chat
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
