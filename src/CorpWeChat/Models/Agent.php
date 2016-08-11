<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/11
 * Time: 14:11
 */

namespace CorpWeChat\Models;

/**
 * 企业号应用基础信息
 * Class Agent
 * @package CorpWeChat\Models
 */
class Agent
{
    protected $id;
    protected $name;
    protected $squareLogoUrl;
    protected $roundLogoUrl;

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
    public function getSquareLogoUrl()
    {
        return $this->squareLogoUrl;
    }

    /**
     * @param mixed $squareLogoUrl
     * @return $this
     */
    public function setSquareLogoUrl($squareLogoUrl)
    {
        $this->squareLogoUrl = $squareLogoUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRoundLogoUrl()
    {
        return $this->roundLogoUrl;
    }

    /**
     * @param mixed $roundLogoUrl
     * @return $this
     */
    public function setRoundLogoUrl($roundLogoUrl)
    {
        $this->roundLogoUrl = $roundLogoUrl;

        return $this;
    }
}
