<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:44
 */

namespace Leo108\CorpWeChat\Response;

/**
 * 格式为文件下载的响应
 * Class FileResponse
 * @package Leo108\CorpWeChat\Response
 */
class FileResponse extends JsonResponse
{
    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getContent()
    {
        return $this->originResponse->getBody();
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        //返回值是json字符串,说明有错误,直接交给JsonResponse处理
        if ($this->originResponse->getBody()[0] == '{') {
            parent::parseData();
        }
    }

}
