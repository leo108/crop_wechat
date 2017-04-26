<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/11
 * Time: 13:33
 */

namespace Leo108\CorpWeChat\Models;

/**
 * 应用设置
 * Class AgentSetting
 * @package Leo108\CorpWeChat\Models
 */
class AgentSetting
{
    protected $id;
    protected $name;
    protected $description;
    protected $redirectDomain;
    protected $reportLocationFlag;
    protected $logoMediaId;
    protected $isReportUser;
    protected $isReportEnter;
    protected $homeUrl;
    protected $chatExtensionUrl;

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRedirectDomain()
    {
        return $this->redirectDomain;
    }

    /**
     * @param mixed $redirectDomain
     * @return $this
     */
    public function setRedirectDomain($redirectDomain)
    {
        $this->redirectDomain = $redirectDomain;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReportLocationFlag()
    {
        return $this->reportLocationFlag;
    }

    /**
     * @param mixed $reportLocationFlag
     * @return $this
     */
    public function setReportLocationFlag($reportLocationFlag)
    {
        $this->reportLocationFlag = $reportLocationFlag;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLogoMediaId()
    {
        return $this->logoMediaId;
    }

    /**
     * @param mixed $logoMediaId
     * @return $this
     */
    public function setLogoMediaId($logoMediaId)
    {
        $this->logoMediaId = $logoMediaId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsReportUser()
    {
        return $this->isReportUser;
    }

    /**
     * @param mixed $isReportUser
     * @return $this
     */
    public function setIsReportUser($isReportUser)
    {
        $this->isReportUser = $isReportUser;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIsReportEnter()
    {
        return $this->isReportEnter;
    }

    /**
     * @param mixed $isReportEnter
     * @return $this
     */
    public function setIsReportEnter($isReportEnter)
    {
        $this->isReportEnter = $isReportEnter;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHomeUrl()
    {
        return $this->homeUrl;
    }

    /**
     * @param mixed $homeUrl
     * @return $this
     */
    public function setHomeUrl($homeUrl)
    {
        $this->homeUrl = $homeUrl;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getChatExtensionUrl()
    {
        return $this->chatExtensionUrl;
    }

    /**
     * @param mixed $chatExtensionUrl
     * @return $this
     */
    public function setChatExtensionUrl($chatExtensionUrl)
    {
        $this->chatExtensionUrl = $chatExtensionUrl;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array_filter(
            [
                'agentid'              => $this->id,
                'report_location_flag' => intval($this->reportLocationFlag),
                'logo_mediaid'         => $this->logoMediaId,
                'name'                 => $this->name,
                'description'          => $this->description,
                'redirect_domain'      => $this->redirectDomain,
                'isreportuser'         => $this->isReportUser,
                'isreportenter'        => $this->isReportEnter,
                'home_url'             => $this->homeUrl,
                'chat_extension_url'   => $this->chatExtensionUrl,
            ]
        );
    }
}
