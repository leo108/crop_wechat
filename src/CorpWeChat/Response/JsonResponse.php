<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 10:58
 */

namespace Leo108\CorpWeChat\Response;

use Leo108\CorpWeChat\Exceptions\UnexpectedResponseException;
use Leo108\CorpWeChat\Exceptions\ApiException;

/**
 * 格式为JSON字符串的响应
 * Class JsonResponse
 *
 * @package Leo108\CorpWeChat\Response
 */
class JsonResponse extends BaseResponse
{
    /**
     * @var array
     */
    protected static $allowFields = [];
    /**
     * @var array
     */
    protected static $requiredFields = [];
    /**
     * @var array
     */
    protected $jsonData = [];

    /**
     * @return array
     */
    public function getData()
    {
        return $this->jsonData;
    }

    /**
     * @param string $name
     *
     * @return mixed|null
     */
    public function __get($name)
    {
        return $this->get($name);
    }

    /**
     * @param string $name
     *
     * @return mixed|null
     */
    public function get($name)
    {
        return isset($this->jsonData[$name]) ? $this->jsonData[$name] : null;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        try {
            $data = \GuzzleHttp\json_decode($this->originResponse->getBody(), true);
        } catch (\InvalidArgumentException $e) {
            throw new UnexpectedResponseException(UnexpectedResponseException::WECHAT_ERROR, $this->originResponse);
        }

        if (isset($data['errcode']) && $data['errcode'] != ApiException::OK) {
            throw new ApiException($data['errmsg'], $data['errcode']);
        }

        $this->jsonData = $this->filter($data);
    }

    /**
     * @param array $arr
     *
     * @return mixed
     */
    protected function filter($arr)
    {
        if (!empty(static::$allowFields)) {
            foreach ($arr as $k => $v) {
                if (!in_array($k, static::$allowFields)) {
                    unset($arr[$k]);
                }
            }
        }

        foreach (static::$requiredFields as $field) {
            if (!isset($arr[$field])) {
                throw new UnexpectedResponseException(UnexpectedResponseException::WECHAT_ERROR, $this->originResponse);
            }
        }

        return $arr;
    }
}
