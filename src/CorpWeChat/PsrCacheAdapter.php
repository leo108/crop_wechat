<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 15:52
 */

namespace CorpWeChat;

use Psr\Cache\CacheItemPoolInterface;

/**
 * Class PsrCacheAdapter
 * @package CorpWeChat
 * @link    https://github.com/aws/aws-sdk-php/blob/454d31759ad42005f70f42d82a3fbf2659e397a0/src/PsrCacheAdapter.php
 */
class PsrCacheAdapter
{
    /** @var CacheItemPoolInterface */
    private $pool;

    /**
     * PsrCacheAdapter constructor.
     * @param CacheItemPoolInterface $pool
     */
    public function __construct(CacheItemPoolInterface $pool)
    {
        $this->pool = $pool;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function get($key)
    {
        $item = $this->pool->getItem($key);

        return $item->isHit() ? $item->get() : null;
    }

    /**
     * @param string $key
     * @param mixed  $value
     * @param int    $ttl
     */
    public function set($key, $value, $ttl = 0)
    {
        $item = $this->pool->getItem($key);
        $item->set($value);
        if ($ttl > 0) {
            $item->expiresAfter($ttl);
        }
        $this->pool->save($item);
    }

    /**
     * @param string $key
     */
    public function remove($key)
    {
        $this->pool->deleteItem($key);
    }
}
