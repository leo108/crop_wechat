<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:53
 */

namespace CorpWeChat\Models\Messages;

use CorpWeChat\Models\Articles\MpNewArticle;
use CorpWeChat\Models\Messages\Interfaces\BroadCastMessageInterface;
use CorpWeChat\Models\Messages\Traits\BroadCastMessageTrait;

/**
 * Class MpNewsMessage
 * @package CorpWeChat\Models\Messages
 */
class MpNewsMessage extends AbstractMessage implements BroadCastMessageInterface
{
    use BroadCastMessageTrait;

    /**
     * MpNewsMessage constructor.
     * @param MpNewArticle[] $articles
     */
    public function __construct($articles = [])
    {
        $this->setArticles($articles);
    }

    /**
     * @param MpNewArticle[] $articles
     */
    public function setArticles($articles)
    {
        $this->setData(['articles' => []]);
        foreach ($articles as $article) {
            $this->addArticle($article);
        }
    }

    /**
     * @param MpNewArticle $article
     */
    public function addArticle(MpNewArticle $article)
    {
        if (!isset($this->data['articles'])) {
            $this->setData(['articles' => []]);
        }
        $this->data['articles'][] = $article->toArray();
    }
}
