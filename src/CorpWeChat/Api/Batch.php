<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:09
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\BatchCallback;
use Leo108\CorpWeChat\Response\Batch\CreateResponse;
use Leo108\CorpWeChat\Response\Batch\GetResultResponse;

/**
 * 异步任务相关接口
 * Class Batch
 *
 * @package Leo108\CorpWeChat\Api
 */
class Batch extends AbstractApi
{
    /**
     *增量更新成员
     *
     * @param string        $mediaId
     * @param BatchCallback $callback
     *
     * @return CreateResponse
     */
    public function syncUser($mediaId, BatchCallback $callback)
    {
        return new CreateResponse($this->httpPostJson(
            'batch/syncuser',
            [
                'media_id' => $mediaId,
                'callback' => $callback->toArray(),
            ]
        ));
    }

    /**
     * 全量覆盖成员
     *
     * @param string        $mediaId
     * @param BatchCallback $callback
     *
     * @return CreateResponse
     */
    public function replaceUser($mediaId, BatchCallback $callback)
    {
        return new CreateResponse($this->httpPostJson(
            'batch/replaceuser',
            [
                'media_id' => $mediaId,
                'callback' => $callback->toArray(),
            ]
        ));
    }

    /**
     * 全量覆盖部门
     *
     * @param string        $mediaId
     * @param BatchCallback $callback
     *
     * @return CreateResponse
     */
    public function replaceDepartment($mediaId, BatchCallback $callback)
    {
        return new CreateResponse($this->httpPostJson(
            'batch/replaceparty',
            [
                'media_id' => $mediaId,
                'callback' => $callback->toArray(),
            ]
        ));
    }

    /**
     * 获取异步任务结果
     *
     * @param string $jobId
     *
     * @return GetResultResponse
     */
    public function getResult($jobId)
    {
        return new GetResultResponse($this->httpGet('batch/getresult', ['jobid' => $jobId]));
    }
}
