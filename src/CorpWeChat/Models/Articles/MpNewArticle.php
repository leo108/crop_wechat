<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/5
 * Time: 18:01
 */

namespace Leo108\CorpWeChat\Models\Articles;

/**
 * Class MpNewArticle
 *
 * @package Leo108\CorpWeChat\Models\Articles
 */
class MpNewArticle
{
    /**
     * @var string
     */
    protected $title = '';
    /**
     * @var string
     */
    protected $thumbMediaId = '';
    /**
     * @var string
     */
    protected $author = '';
    /**
     * @var string
     */
    protected $contentSourceUrl = '';
    /**
     * @var string
     */
    protected $content = '';
    /**
     * @var string
     */
    protected $digest = '';
    /**
     * @var string
     */
    protected $showCoverPic = '';

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
    public function getThumbMediaId()
    {
        return $this->thumbMediaId;
    }

    /**
     * @param string $thumbMediaId
     *
     * @return $this
     */
    public function setThumbMediaId($thumbMediaId)
    {
        $this->thumbMediaId = $thumbMediaId;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     *
     * @return $this
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string
     */
    public function getContentSourceUrl()
    {
        return $this->contentSourceUrl;
    }

    /**
     * @param string $contentSourceUrl
     *
     * @return $this
     */
    public function setContentSourceUrl($contentSourceUrl)
    {
        $this->contentSourceUrl = $contentSourceUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getDigest()
    {
        return $this->digest;
    }

    /**
     * @param string $digest
     *
     * @return $this
     */
    public function setDigest($digest)
    {
        $this->digest = $digest;

        return $this;
    }

    /**
     * @return string
     */
    public function getShowCoverPic()
    {
        return $this->showCoverPic;
    }

    /**
     * @param string $showCoverPic
     *
     * @return $this
     */
    public function setShowCoverPic($showCoverPic)
    {
        $this->showCoverPic = $showCoverPic;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'title'              => $this->title,
            'thumb_media_id'     => $this->thumbMediaId,
            'author'             => $this->author,
            'content_source_url' => $this->contentSourceUrl,
            'content'            => $this->content,
            'digest'             => $this->digest,
            'show_cover_pic'     => $this->showCoverPic,
        ];
    }
}
