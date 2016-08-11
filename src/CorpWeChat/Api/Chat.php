<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 09:40
 */

namespace CorpWeChat\Api;

use CorpWeChat\Models\Messages\Interfaces\ChatMessageInterface;
use CorpWeChat\Models\Messages\Users\ChatReceiver;
use CorpWeChat\Response\Chat\GetChatResponse;
use CorpWeChat\Response\Chat\SetMuteResponse;
use CorpWeChat\Response\JsonResponse;
use CorpWeChat\Models\Chat as ChatModel;

/**
 * 会话服务相关接口
 * Class Chat
 * @package CorpWeChat\Api
 * @link    http://qydev.weixin.qq.com/wiki/index.php?title=%E4%BC%81%E4%B8%9A%E4%BC%9A%E8%AF%9D%E6%8E%A5%E5%8F%A3%E8%AF%B4%E6%98%8E
 */
class Chat extends AbstractApi
{
    const TYPE_SINGLE = 'single';
    const TYPE_GROUP = 'group';

    /**
     * 创建会话
     * @param ChatModel $chat
     * @return JsonResponse
     */
    public function create(ChatModel $chat)
    {
        return $this->httpPostJson('chat/create', $chat->toArray(), new JsonResponse());
    }

    /**
     * 获取会话
     * @param string $chatId
     * @return GetChatResponse
     */
    public function get($chatId)
    {
        return $this->httpGet('chat/get', ['chatid' => $chatId], new GetChatResponse());
    }

    /**
     * 修改会话信息
     * @param ChatModel $chat
     * @param string    $opUser
     * @param array     $addUserList
     * @param array     $delUserList
     * @return JsonResponse
     */
    public function update(ChatModel $chat, $opUser, $addUserList, $delUserList = [])
    {
        $req = $chat->toArray();
        unset($req['userlist']);
        $req['opuser']        = $opUser;
        $req['add_user_list'] = $addUserList;
        $req['del_user_list'] = $delUserList;

        return $this->httpPostJson('chat/update', $req, new JsonResponse());
    }

    /**
     * 退出会话
     * @param string $chatId
     * @param string $opUser
     * @return JsonResponse
     */
    public function quit($chatId, $opUser)
    {
        return $this->httpGet('chat/quit', ['chatid' => $chatId, 'opuser' => $opUser], new JsonResponse());
    }

    /**
     * 清除会话未读状态
     * @param string $opUser
     * @param string $type
     * @param string $id
     * @return JsonResponse
     */
    public function clearNotify($opUser, $type, $id)
    {
        $req = [
            'op_user' => $opUser,
            'chat'    => [
                'type' => $type,
                'id'   => $id,
            ],
        ];

        return $this->httpPostJson('chat/clearnotify', $req, new JsonResponse());
    }

    /**
     * 发消息
     * @param ChatReceiver         $receiver
     * @param string               $senderId
     * @param ChatMessageInterface $message
     * @return JsonResponse
     */
    public function send(ChatReceiver $receiver, $senderId, ChatMessageInterface $message)
    {
        return $this->httpPostJson(
            'chat/send',
            $message->toChatMessage($receiver, $senderId),
            new JsonResponse()
        );
    }

    /**
     * 设置成员新消息免打扰
     * @param array $userStatusList
     * @return SetMuteResponse
     */
    public function setMute($userStatusList)
    {
        $req = ['user_mute_list' => $userStatusList];

        return $this->httpPostJson('chat/setmute', $req, new SetMuteResponse());
    }
}
