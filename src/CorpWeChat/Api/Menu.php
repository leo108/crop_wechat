<?php
/**
 * Created by PhpStorm.
 * User: chenyihong
 * Date: 16/8/8
 * Time: 17:41
 */

namespace Leo108\CorpWeChat\Api;

use Leo108\CorpWeChat\Models\Buttons\AbstractButton;
use Leo108\CorpWeChat\Response\JsonResponse;
use Leo108\CorpWeChat\Response\Menu\GetMenuResponse;

/**
 * 菜单操作接口
 * Class Menu
 *
 * @package Leo108\CorpWeChat\Api
 */
class Menu extends AbstractApi
{
    /**
     * 创建应用菜单
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E5%88%9B%E5%BB%BA%E5%BA%94%E7%94%A8%E8%8F%9C%E5%8D%95
     *
     * @param int              $agentId
     * @param AbstractButton[] $buttonArr
     *
     * @return JsonResponse
     */
    public function create($agentId, array $buttonArr)
    {
        $req = [
            'button' => [],
        ];
        foreach ($buttonArr as $button) {
            $req['button'][] = $button->toArray();
        }

        return new JsonResponse($this->httpPostJson("menu/create?agentid={$agentId}", $req));
    }

    /**
     * 删除菜单
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E5%88%A0%E9%99%A4%E8%8F%9C%E5%8D%95
     *
     * @param int $agentId
     *
     * @return JsonResponse
     */
    public function delete($agentId)
    {
        return new JsonResponse($this->httpGet('menu/delete', ['agentid' => $agentId]));
    }

    /**
     * 获取菜单列表
     *
     * @see http://qydev.weixin.qq.com/wiki/index.php?title=%E8%8E%B7%E5%8F%96%E8%8F%9C%E5%8D%95%E5%88%97%E8%A1%A8
     *
     * @param int $agentId
     *
     * @return GetMenuResponse
     */
    public function get($agentId)
    {
        return new GetMenuResponse($this->httpGet('menu/get', ['agentid' => $agentId]));
    }
}
