<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 11:03
 */

namespace Leo108\CorpWeChat\Response;

use Psr\Http\Message\ResponseInterface;
use Leo108\CorpWeChat\Exceptions\UnexpectedResponseException;

/**
 * Class BaseResponse
 *
 * @package Leo108\CorpWeChat\Response
 */
class BaseResponse
{
    /**
     * @var ResponseInterface
     */
    protected $originResponse;

    /**
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->originResponse = $response;
        $this->checkResponse();
        $this->parseData();
    }

    /**
     * @return ResponseInterface
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
