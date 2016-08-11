<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 11:32
 */

namespace CorpWeChat\Exceptions;

/**
 * Class UnexpectedResponseException
 * @package CorpWeChat\Exceptions
 */
class UnexpectedResponseException extends \UnexpectedValueException
{
    const HTTP_ERROR = 1;
    const WECHAT_ERROR = 2;
    const API_ERROR = 3;

    protected static $map = [
        self::HTTP_ERROR   => 'non-200 response',
        self::WECHAT_ERROR => 'a not valid wechat response',
        self::API_ERROR    => 'api error',
    ];
    protected $context;

    /**
     * UnexpectedResponseException constructor.
     * @param string $code
     * @param mixed  $context
     */
    public function __construct($code, $context = null)
    {
        parent::__construct(self::$map[$code], $code);
        $this->context = $context;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }
}
