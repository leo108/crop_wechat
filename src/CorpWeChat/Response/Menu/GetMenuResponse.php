<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/9
 * Time: 13:24
 */

namespace Leo108\CorpWeChat\Response\Menu;

use Leo108\CorpWeChat\Models\Buttons\AbstractButton;
use Leo108\CorpWeChat\Models\Buttons\ClickButton;
use Leo108\CorpWeChat\Models\Buttons\LocationSelectButton;
use Leo108\CorpWeChat\Models\Buttons\PicPhotoOrAlbumButton;
use Leo108\CorpWeChat\Models\Buttons\PicSysPhotoButton;
use Leo108\CorpWeChat\Models\Buttons\PicWeixinButton;
use Leo108\CorpWeChat\Models\Buttons\ScanCodePushButton;
use Leo108\CorpWeChat\Models\Buttons\ScanCodeWaitMsgButton;
use Leo108\CorpWeChat\Models\Buttons\SubButton;
use Leo108\CorpWeChat\Models\Buttons\ViewButton;
use Leo108\CorpWeChat\Response\JsonResponse;

/**
 * Class GetMenuResponse
 * @package Leo108\CorpWeChat\Response\Menu
 */
class GetMenuResponse extends JsonResponse
{
    protected static $allowFields = ['menu'];
    protected static $requiredFields = ['menu'];

    /**
     * @var AbstractButton[]
     */
    protected $buttons;

    /**
     * @return AbstractButton[]
     */
    public function getButtons()
    {
        return $this->buttons;
    }

    /**
     * @inheritdoc
     */
    protected function parseData()
    {
        parent::parseData();
        foreach ($this->jsonData['menu']['button'] as $item) {
            $button = self::parseButton($item);
            if ($button !== false) {
                $this->buttons[] = $button;
            }
        }
    }

    /**
     * @param array $data
     * @return bool|ClickButton|LocationSelectButton|PicPhotoOrAlbumButton|PicSysPhotoButton|PicWeixinButton|ScanCodePushButton|ScanCodeWaitMsgButton|SubButton|ViewButton
     */
    protected static function parseButton($data)
    {
        if (!isset($data['type']) || (isset($data['sub_button']) && !empty($data['sub_button']))) {
            $button = new SubButton($data['name']);
            foreach ($data['sub_button'] as $sub) {
                $button->addButton(self::parseButton($sub));
            }

            return $button;
        }

        switch ($data['type']) {
            case 'click':
                return new ClickButton($data['name'], $data['key']);
            case 'view':
                return new ViewButton($data['name'], $data['url']);
            case 'scancode_push':
                return new ScanCodePushButton($data['name'], $data['key']);
            case 'scancode_waitmsg':
                return new ScanCodeWaitMsgButton($data['name'], $data['key']);
            case 'pic_sysphoto':
                return new PicSysPhotoButton($data['name'], $data['key']);
            case 'pic_photo_or_album':
                return new PicPhotoOrAlbumButton($data['name'], $data['key']);
            case 'pic_weixin':
                return new PicWeixinButton($data['name'], $data['key']);
            case 'location_select':
                return new LocationSelectButton($data['name'], $data['key']);
        }

        return false;
    }
}
