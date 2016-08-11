<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:02
 */

namespace CorpWeChat\Models;

/**
 * Class Tag
 * @package CorpWeChat\Models
 */
class Tag
{
    protected $name;
    protected $id;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_filter(
            [
                'tagid'   => $this->id,
                'tagname' => $this->name,
            ]
        );
    }
}
