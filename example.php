<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/11
 * Time: 16:34
 */

use CorpWeChat\Models\Config;
use CorpWeChat\CorpWeChat;
use CorpWeChat\Models\Messages\RequestMessage;
use CorpWeChat\Models\Messages\TextMessage;
use CorpWeChat\Models\Messages\Users\BroadCastReceivers;

//设置企业号信息
$config = new Config('corpId', 'corpSecret');
//设置接口请求重试次数,默认为1
$config->setRetryCount(3);
//设置access token缓存key前缀
$config->setAccessTokenCacheKeyPrefix('corp_wechat_access_token');
//设置guzzle的选项,参考 http://docs.guzzlephp.org/en/latest/request-options.html
$config->setHttpConfig(['proxy' => 'tcp://localhost:8125']);
//添加一个企业号应用
$config->addAgent('test', 1, 'token', 'aesKey');
//创建接口操作对象
$wx = new CorpWeChat($config);
//回调模式接受消息和事件,handleAgentCallBack会自动处理微信服务器发来的验证URL请求,开发者无需再次处理
//其中$request参数必须是一个Psr\Http\Message\RequestInterface对象,请根据自己的框架自行构建
echo $wx->handleAgentCallBack('test', $request, function (RequestMessage $message) {
    return new TextMessage('message type:'.$message->MsgType);
});

//创建一个文本消息
$message = new TextMessage('Hello world');
//从配置中读取应用id
$agentId = $wx->getConfig()->getAgent('test')['id'];
//创建一个消息接受列表对象
$receivers = new BroadCastReceivers($agentId);
//消息接受列表添加一个用户
$receivers->addUser('userid1');
//消息接受列表添加一个部门
$receivers->addDepartment(1);
//消息接受列表添加一个标签
$receivers->addTag(1);
//发送消息
$response = $wx->message->send($receivers, $message);
//获取发送失败的用户id列表
$response->getInvalidUserIdList();
