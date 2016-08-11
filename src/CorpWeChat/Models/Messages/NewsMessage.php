<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:34
 */

namespace CorpWeChat\Models\Messages;

use CorpWeChat\Models\Articles\NewsArticle;
use CorpWeChat\Models\Messages\Interfaces\BroadCastMessageInterface;
use CorpWeChat\Models\Messages\Interfaces\ResponseMessageInterface;
use CorpWeChat\Models\Messages\Traits\BroadCastMessageTrait;
use CorpWeChat\Models\Messages\Traits\ResponseMessageTrait;

/**
 * Class NewsMessage
 * @package CorpWeChat\Models\Messages
 */
class NewsMessage extends AbstractMessage implements BroadCastMessageInterface, ResponseMessageInterface
{
    use BroadCastMessageTrait;
    use ResponseMessageTrait;

    /**
     * NewsMessage constructor.
     *
     * @param NewsArticle[] $articles
     */
    public function __construct($articles = [])
    {
        $this->setArticles($articles);
    }

    /**
     * @param NewsArticle[] $articles
     */
    public function setArticles($articles)
    {
        $this->setData(['articles' => []]);
        foreach ($articles as $article) {
            $this->addArticle($article);
        }
    }

    /**
     * @param NewsArticle $article
     */
    public function addArticle(NewsArticle $article)
    {
        $this->data['articles'][] = $article->toArray();
    }


    /**
     * @return array
     */
    public function toResponseArray()
    {
        $ret = [
            'ArticleCount' => count($this->data['articles']),
            'Articles'     => [],
        ];
        foreach ($this->data['articles'] as $article) {
            $ret['Articles'][] = [
                'Title'       => $article['title'],
                'Description' => $article['description'],
                'PicUrl'      => $article['picurl'],
                'Url'         => $article['url'],
            ];
        }

        return $ret;
    }
}
