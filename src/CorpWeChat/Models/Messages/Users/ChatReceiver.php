<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/10
 * Time: 17:19
 */

namespace Leo108\CorpWeChat\Models\Messages\Users;

/**
 * Class ChatReceiver
 * @package Leo108\CorpWeChat\Models\Messages\Users
 */
class ChatReceiver
{
    protected $id;
    protected $type;

    /**
     * ChatReceiver constructor.
     * @param string $id
     * @param string $type
     */
    public function __construct($id, $type)
    {
        $this->id   = $id;
        $this->type = $type;
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
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'type' => $this->type,
            'id'   => $this->id,
        ];
    }
}
