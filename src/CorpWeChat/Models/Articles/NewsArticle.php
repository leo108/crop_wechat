<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 17:59
 */

namespace Leo108\CorpWeChat\Models\Articles;

/**
 * Class NewsArticle
 *
 * @package Leo108\CorpWeChat\Models\Articles
 */
class NewsArticle
{
    /**
     * @var string
     */
    protected $title = '';
    /**
     * @var string
     */
    protected $description = '';
    /**
     * @var string
     */
    protected $url = '';
    /**
     * @var string
     */
    protected $picUrl = '';

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getPicUrl()
    {
        return $this->picUrl;
    }

    /**
     * @param string $picUrl
     *
     * @return $this
     */
    public function setPicUrl($picUrl)
    {
        $this->picUrl = $picUrl;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'title'       => $this->title,
            'description' => $this->description,
            'url'         => $this->url,
            'picurl'      => $this->picUrl,
        ];
    }
}
