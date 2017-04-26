<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 09:40
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\Messages\Interfaces\ChatMessageInterface;
use Leo108\CorpWeChat\Models\Messages\Users\ChatReceiver;
use Leo108\CorpWeChat\Response\Chat\GetChatResponse;
use Leo108\CorpWeChat\Response\Chat\SetMuteResponse;
use Leo108\CorpWeChat\Response\JsonResponse;
use Leo108\CorpWeChat\Models\Chat as ChatModel;

/**
 * 会话服务相关接口
 * Class Chat
 *
 * @package Leo108\CorpWeChat\Api
 * @link    http://qydev.weixin.qq.com/wiki/index.php?title=%E4%BC%81%E4%B8%9A%E4%BC%9A%E8%AF%9D%E6%8E%A5%E5%8F%A3%E8%AF%B4%E6%98%8E
 */
class Chat extends AbstractApi
{
    const TYPE_SINGLE = 'single';
    const TYPE_GROUP = 'group';

    /**
     * 创建会话
     *
     * @param ChatModel $chat
     *
     * @return JsonResponse
     */
    public function create(ChatModel $chat)
    {
        return new JsonResponse($this->httpPostJson('chat/create', $chat->toArray()));
    }

    /**
     * 获取会话
     *
     * @param string $chatId
     *
     * @return GetChatResponse
     */
    public function get($chatId)
    {
        return new GetChatResponse($this->httpGet('chat/get', ['chatid' => $chatId]));
    }

    /**
     * 修改会话信息
     *
     * @param ChatModel $chat
     * @param string    $opUser
     * @param array     $addUserList
     * @param array     $delUserList
     *
     * @return JsonResponse
     */
    public function update(ChatModel $chat, $opUser, $addUserList, $delUserList = [])
    {
        $req = $chat->toArray();
        unset($req['userlist']);
        $req['opuser']        = $opUser;
        $req['add_user_list'] = $addUserList;
        $req['del_user_list'] = $delUserList;

        return new JsonResponse($this->httpPostJson('chat/update', $req));
    }

    /**
     * 退出会话
     *
     * @param string $chatId
     * @param string $opUser
     *
     * @return JsonResponse
     */
    public function quit($chatId, $opUser)
    {
        return new JsonResponse($this->httpGet('chat/quit', ['chatid' => $chatId, 'opuser' => $opUser]));
    }

    /**
     * 清除会话未读状态
     *
     * @param string $opUser
     * @param string $type
     * @param string $id
     *
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

        return new JsonResponse($this->httpPostJson('chat/clearnotify', $req));
    }

    /**
     * 发消息
     *
     * @param ChatReceiver         $receiver
     * @param string               $senderId
     * @param ChatMessageInterface $message
     *
     * @return JsonResponse
     */
    public function send(ChatReceiver $receiver, $senderId, ChatMessageInterface $message)
    {
        return new JsonResponse($this->httpPostJson('chat/send', $message->toChatMessage($receiver, $senderId)));
    }

    /**
     * 设置成员新消息免打扰
     *
     * @param array $userStatusList
     *
     * @return SetMuteResponse
     */
    public function setMute($userStatusList)
    {
        return new SetMuteResponse($this->httpPostJson('chat/setmute', ['user_mute_list' => $userStatusList]));
    }
}
