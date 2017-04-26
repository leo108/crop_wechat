<?php
/**
 * Created by PhpStorm.
 * User: leo108
 * Date: 2017/4/23
 * Time: 22:50
 */

namespace Leo108\CorpWeChat\Utils;

use Psr\SimpleCache\CacheInterface;

/**
 * Class MemoryCache
 *
 * @package Leo108\CorpWeChat\Utils
 */
class MemoryCache implements CacheInterface
{
    /**
     * @var array
     */
    protected $container = [];

    /**
     * @inheritDoc
     */
    public function get($key, $default = null)
    {
        return isset($this->container[$key]) ? $this->container[$key] : $default;
    }

    /**
     * @inheritDoc
     */
    public function set($key, $value, $ttl = null)
    {
        $this->container[$key] = $value;
    }

    /**
     * @inheritDoc
     */
    public function delete($key)
    {
        unset($this->container[$key]);
    }

    /**
     * @inheritDoc
     */
    public function clear()
    {
        $this->container = [];
    }

    /**
     * @inheritDoc
     */
    public function getMultiple($keys, $default = null)
    {
        // TODO: Implement getMultiple() method.
    }

    /**
     * @inheritDoc
     */
    public function setMultiple($values, $ttl = null)
    {
        // TODO: Implement setMultiple() method.
    }

    /**
     * @inheritDoc
     */
    public function deleteMultiple($keys)
    {
        // TODO: Implement deleteMultiple() method.
    }

    /**
     * @inheritDoc
     */
    public function has($key)
    {
        return isset($this->container[$key]);
    }
}
