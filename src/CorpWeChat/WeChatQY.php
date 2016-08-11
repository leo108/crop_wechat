<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 10:12
 */

namespace CorpWeChat;

use Fig\Cache\Memory\MemoryPool;
use GuzzleHttp\Client;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Log\NullLogger;
use CorpWeChat\AgentCallBack\CallBackHandler;
use CorpWeChat\Models\Config;
use \ReflectionClass;

/**
 * Class CorpWeChat
 * @package CorpWeChat
 *
 * @property Api\Agent      $agent
 * @property Api\Batch      $batch
 * @property Api\Chat       $chat
 * @property Api\Common     $common
 * @property Api\Department $department
 * @property Api\KF         $kf
 * @property Api\Material   $material
 * @property Api\Media      $media
 * @property Api\Menu       $menu
 * @property Api\Message    $message
 * @property Api\OAuth      $oauth
 * @property Api\Service    $service
 * @property Api\Tag        $tag
 * @property Api\User       $user
 *
 */
class CorpWeChat
{
    protected $apiArr = [];
    /**
     * @var Config
     */
    protected $config;
    /**
     * @var PsrCacheAdapter
     */
    protected $cache;
    /**
     * @var LoggerInterface
     */
    protected $log;

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var CallBackHandler[]
     */
    protected $agentCallbacks = [];

    /**
     * CorpWeChat constructor.
     * @param Config                 $config
     * @param CacheItemPoolInterface $cache
     * @param LoggerInterface        $log
     */
    public function __construct(Config $config, CacheItemPoolInterface $cache = null, LoggerInterface $log = null)
    {
        $this->config     = $config;
        $this->httpClient = new Client($this->config->getHttpConfig());
        $this->setLog($log);
        $this->setCache($cache);
    }

    /**
     * @return PsrCacheAdapter
     */
    public function getCache()
    {
        return $this->cache;
    }

    /**
     * @param CacheItemPoolInterface $cache
     */
    public function setCache($cache)
    {
        $this->cache = new PsrCacheAdapter($cache ?: new MemoryPool());
    }

    /**
     * @return LoggerInterface
     */
    public function getLog()
    {
        return $this->log;
    }

    /**
     * @param LoggerInterface $log
     */
    public function setLog($log)
    {
        $this->log = $log ?: new NullLogger();
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param bool $cache
     * @return string
     */
    public function getAccessToken($cache = true)
    {
        return $this->common->getAccessToken($cache);
    }

    /**
     *
     * @param string $name
     * @return mixed|null
     */
    public function __get($name)
    {
        $map = [
            'agent'      => Api\Agent::class,
            'batch'      => Api\Batch::class,
            'chat'       => Api\Chat::class,
            'common'     => Api\Common::class,
            'department' => Api\Department::class,
            'kf'         => Api\KF::class,
            'material'   => Api\Material::class,
            'media'      => Api\Media::class,
            'menu'       => Api\Menu::class,
            'message'    => Api\Message::class,
            'oauth'      => Api\OAuth::class,
            'service'    => Api\Service::class,
            'tag'        => Api\Tag::class,
            'user'       => Api\User::class,
        ];
        if (!isset($map[$name])) {
            return null;
        }

        if (!isset($this->apiArr[$name])) {
            $this->apiArr[$name] = (new ReflectionClass($map[$name]))->newInstanceArgs([$this]);
        }

        return $this->apiArr[$name];
    }

    /**
     * 被动响应消息
     * @param string           $name
     * @param RequestInterface $request
     * @param callable         $handler
     * @return string
     */
    public function handleAgentCallBack($name, RequestInterface $request, callable $handler)
    {
        if (!isset($this->agentCallbacks[$name])) {
            $this->agentCallbacks[$name] = new CallBackHandler($name, $this);
        }

        return $this->agentCallbacks[$name]->handle($request, $handler);
    }
}
