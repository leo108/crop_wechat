<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 11:03
 */

namespace CorpWeChat\Response;

use Psr\Http\Message\ResponseInterface;
use CorpWeChat\Exceptions\UnexpectedResponseException;

/**
 * Class BaseResponse
 * @package CorpWeChat\Response
 */
class BaseResponse
{
    /**
     * @var ResponseInterface|null
     */
    protected $originResponse = null;

    /**
     * @param ResponseInterface $response
     * @return static
     */
    public function setOriginResponse(ResponseInterface $response)
    {
        $this->originResponse = $response;
        $this->checkResponse();
        $this->parseData();
    }

    /**
     * @return null|ResponseInterface
     */
    public function getOriginResponse()
    {
        return $this->originResponse;
    }

    /**
     * @throws UnexpectedResponseException
     */
    protected function checkResponse()
    {
        if ($this->originResponse->getStatusCode() != 200) {
            throw new UnexpectedResponseException(UnexpectedResponseException::HTTP_ERROR, $this->originResponse);
        }
    }

    /**
     * 解析返回数据
     */
    protected function parseData()
    {
    }
}
