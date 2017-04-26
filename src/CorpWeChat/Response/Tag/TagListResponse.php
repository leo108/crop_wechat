<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 12:35
 */

namespace Leo108\CorpWeChat\Response\Tag;

use Leo108\CorpWeChat\Models\Tag;
use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class TagListResponse
 * @package Leo108\CorpWeChat\Response\Tag
 */
class TagListResponse extends JsonResponse
{
    protected static $allowFields = ['taglist'];
    protected static $requiredFields = ['taglist'];

    /**
     * @var Tag[]
     */
    protected $tagList = [];

    /**
     * @return Tag[]
     */
    public function getTagList()
    {
        return $this->tagList;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        foreach ($this->jsonData['taglist'] as $item) {
            $tag = new Tag();
            $tag->setId($item['tagid'])->setName($item['tagname']);
            $this->tagList[] = $tag;
        }
    }
}
