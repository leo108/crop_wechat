<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 14:01
 */

namespace CorpWeChat\Response\Material;

use CorpWeChat\Exceptions\UnexpectedResponseException;
use CorpWeChat\Models\Articles\MpNewArticle;
use CorpWeChat\Models\MaterialItems\ImageItem;
use CorpWeChat\Models\MaterialItems\MpNewsItem;
use CorpWeChat\Response\JsonResponse;

/**
 * Class GetListResponse
 * @package CorpWeChat\Response\Material
 */
class GetListResponse extends JsonResponse
{
    protected static $allowFields = ['type', 'total_count', 'item_count', 'itemlist'];
    protected static $requiredFields = ['type', 'total_count', 'item_count', 'itemlist'];

    protected $itemList = [];

    /**
     * @return MpNewsItem[]|ImageItem[]
     */
    public function getItemList()
    {
        return $this->itemList;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        foreach ($this->jsonData['itemlist'] as $item) {
            if ($this->jsonData['type'] == 'image') {
                $this->itemList[] = self::parseImage($item);
            } elseif ($this->jsonData['type'] == 'mpnews') {
                $this->itemList[] = self::parseMpNews($item);
            } else {
                throw new UnexpectedResponseException(UnexpectedResponseException::WECHAT_ERROR, $this->originResponse);
            }
        }
    }

    /**
     * @param array $item
     * @return ImageItem
     */
    protected static function parseImage($item)
    {
        $image = new ImageItem();
        $image->setMediaId($item['media_id'])->setFileName($item['filename'])->setUpdateTime($item['update_time']);

        return $image;
    }

    /**
     * @param array $item
     * @return MpNewsItem
     */
    protected static function parseMpNews($item)
    {
        $news = new MpNewsItem();
        $news->setMediaId($item['media_id']);
        foreach ($item['content']['articles'] as $article) {
            $model = new MpNewArticle();
            $model->setAuthor($article['auther'])
                ->setTitle($article['title'])
                ->setDigest($article['digest'])
                ->setThumbMediaId($article['thumb_media_id'])
                ->setContentSourceUrl($article['content_source_url'])
                ->setShowCoverPic($article['show_cover_pic']);
            $news->addArticle($model);
        }

        return $news;
    }
}
