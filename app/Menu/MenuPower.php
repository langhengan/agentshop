<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/06/11 0011
 * Time: 21:11
 */

namespace App\Menu;

use Entrust;
class MenuPower
{

    /**
     * 菜单配置。菜单的配置文件数组与循环遍历的关联
     *
     * @var \App\Menu\MenuConfig
     */
    private $menu;

    private $routePrifix = 'admin';
    public function __construct(MenuConfig $config)
    {
        //为什么实例化模型后就是配置文件中的menu数组
        $this->menu = $config->toArray();
        //遍历menu数组 给menu中的routes拼接前缀
        $this->menu = $this->combinationRoutesFromChild($this->menu);

        // 然后我们决断一个菜单对当前用户是否可见，并将这种效果同时影响到父菜单上（如果有）。
////        dd($this->menu);

        $this->menu = $this->applyPermissionDisplay($this->menu);
        $this->html = $this->init();

    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link http://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * 返回菜单 HTML。
     *
     * @return string
     */
    public function render()
    {
        return $this->html ?: $this->html = $this->init();
        // TODO: Implement render() method.
    }

    /**
     * 子菜单使用的所有路由全部附加到父菜单上。
     *
     * @param array $menu
     *
     * @return array
     */
    private function combinationRoutesFromChild(array $menu)
    {

        foreach ($menu as $key => $item) {
            $prefix = is_array($menu[$key]['routes']) ? $menu[$key]['routes'][0] : $menu[$key]['routes'];
//            dd($menu[$key]['routes']);
            $menu[$key]['routes'] = [];
            if ($this->hasChild($item)) {
                foreach ($this->getChild($item) as $itemKey => $childItem) {
                    //获取子菜单的路由
                    $childItemRoute = is_array($childItem['routes']) ? $childItem['routes'][0] : $childItem['routes'];
                    //给父级菜单添加子菜单
                    array_push($menu[$key]['routes'], ($prefix ? $prefix. '/' : '') . $childItemRoute);
//                    dd($menu[$key]['routes']);
                    // 如果父级菜单有路由，也附加给子菜单
                    $menu[$key]['child'][$itemKey]['routes'] = [($prefix ? $prefix . '/' : '') . $childItemRoute];
//                    dd($menu[$key]['child'][$itemKey]);
                }
            } else {
                $menu[$key]['routes'] = $prefix;
            }
        }
//        dd($menu);
        return $menu;

    }

    /**
     * 初始化菜单 HTML。
     *
     * @return string
     */
    public function init()
    {
        $html = '';

        foreach ($this->menu as $item) {
            if ($item['show']) {
                if ($this->hasChild($item)) {
                    $html .= $this->buildChildItem($item);
                } else {
                    $html .= $this->buildTopLevelItem($item);
                }
            }
        }

        return $html;
    }

    /**
     * 一个菜单是否有子菜单。
     *
     * @param array $item
     *
     * @return bool
     */
    private function hasChild(array $item)
    {
        return isset($item['child'])
            && is_array($child = $item['child'])
            && count($child) > 0;
    }

    /**
     * 获取一个对应菜单的子菜单。
     *
     * @param array $item
     *
     * @return array
     */
    private function getChild(array $item)
    {
        return $item['child'];
    }

    /**
     * 构造顶层菜单 HTML。
     *
     * @param array $item
     *
     * @return string
     */
    private function buildTopLevelItem(array $item)
    {
//        dd($item);
        //item参数为menu数组
        $url = $this->getUrl($item['url']);
        $icon = isset($item['icon']) ? "<i class=\"{$item['icon']}\"></i>" : '';
        $name = $this->getDisplayName($item);
        $active = $this->getActive($item);
//        dd($active);
        if ($this->is_active($item['routes'])) {
            $this->activeName = $name;
        }

        return "<li class='tpl-left-nav-item'><a href='{$url}' class='nav-link {$active}' >{$icon}<i class='nav-label'><span>{$name}</span></i></a></li>\n";
    }

    /**
     * 为每一个菜单判断是否对于当前用户显示，并把结果增加到菜单的 $item['show'] 上。
     *为menu数组添加是否为用户可见的状态字段show
     * @param array $menu
     *
     * @return array
     */
    private function applyPermissionDisplay(array $menu)
    {
        // 我们遍历所有菜单和其子菜单，如果一个菜单对当前用户可见，我们就设置 show 为真。
        // 如果一个父级菜单的任何子菜单应该对用户可见，父菜单也应该为可见。
//        dd($menu);
        foreach ($menu as $key => $item) {
            $menu[$key]['show'] = false;
            if ($this->hasChild($item)) {
                $childShow = false;
                //getChild()获取对应菜单的子菜单
                foreach ($this->getChild($item) as $childKey => $childItem) {
                    $menu[$key]['child'][$childKey]['show'] = false;
                    if (Entrust::can($childItem['permission_key'])) {
//                       var_dump(Entrust::can($childItem['permission_key']));
                        $childShow = true;
                        $menu[$key]['child'][$childKey]['show'] = true;
                    }
                }
                $menu[$key]['show'] = $childShow;
//                var_dump( $menu[$key]['show']);exit();
            } else {
                $menu[$key]['show'] = Entrust::can($item['permission_key']);
            }
        }
//       var_dump($menu);exit;
        return $menu;
    }

    /**
     * 获取一个菜单的 URL。
     *
     * @param string $url
     *
     * @return string
     */
    private function getUrl($url)
    {
//        dd($url);//$url为"home"
        //url函数解析出的路径"http://www.openadmin.com/admin/home"
        return isset($url) ? url($this->routePrifix.'/'.$url) : '';
    }

    /**
     * 获取一个菜单的显示名称。
     *
     * @param array $item
     *
     * @return string
     */
    private function getDisplayName(array $item)
    {
        return isset($item['display_name']) ? $item['display_name'] : '';
    }

    /**
     * 获取一个菜单的图标。
     *
     * @param array $item
     *
     * @return string
     */
    private function getIcon(array $item)
    {
        return isset($item['icon']) ? "<i class=\"{$item['icon']}\"></i>" : '';
    }

    /**
     * 判断一个菜单是否是活动状态。
     *
     * Note: 这个方法之前需要执行 {self::payloadParentRoutesFromChild()} 以便自动为父级菜单
     * 附加路由。
     *
     * @param array $item
     *
     * @return string
     */
    private function getActive(array $item)
    {
        return $this->is_active($item['url']) ? 'active' : '';
    }

    /**
     * 返回一个菜单是否应该加上 active，通过识别路由名称。
     *
     * @param mixed $routeName
     *
     * @return boolean
     */
    function is_active($routeName)
    {
//        dd($routeName);
        $keys = is_array($routeName) ? $routeName : [$routeName];
//        dd($keys);
        //变量返回的url "/admin/power/permission/index"
        $requestRouteName = \Request::getRequestUri();
        //substr()返回字符串的子串去掉了斜杠"admin/power/permission/index"
        $requestRouteName = substr($requestRouteName,1,strlen($requestRouteName));
        $splitRouteName = explode('/', $requestRouteName);
//        dd($splitRouteName);
        $shouldActive = false;
        foreach ($keys as $key) {
            //返回值为"admin/power"
            $requestRouteResult = count($splitRouteName) > 1 ? $splitRouteName[0] . '/' . $splitRouteName[1] : $splitRouteName[0];
            if ($this->routePrifix.'/'.$key === ($requestRouteResult)) {
                $shouldActive = true;
                break;
            }
        }
//        dd($shouldActive);
        return $shouldActive;
    }

    /**
     * 构造每个子菜单的 HTML。
     *
     * @param array $item
     *
     * @return string
     */

    private function buildChildItem(array $item)
    {
        $html = '';
        //菜单的显示名称
        $name = $this->getDisplayName($item);
        $icon = $this->getIcon($item);
        //判断一个菜单是否是活动状态
        $active = $this->getActive($item);
        //获取一个菜单是否应该折叠（用于 CSS，一个菜单如果是活动状态则不该折叠）
        $collapse = $this->getCollapse($item);
        $html .= "<li class='tpl-left-nav-item'>
          <a href='javascript:;' class='nav-link tpl-left-nav-link-list {$active}'>
            {$icon}<span class=\"nav-label\">{$name}</span>
            <i class=\"am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate\"></i>
          </a>
          <ul class=\"tpl-left-nav-sub-menu \" {$collapse}>\n";
        foreach ($this->getChild($item) as $itemChild) {
            if ($itemChild['show']) {
                $childUrl = $this->getUrl(($item['url'] ? $item['url'] . '/' : '') . $itemChild['url']);
                $childName = $this->getDisplayName($itemChild);
                $childActive = $this->getchildActive($itemChild['routes']);
                if ($this->is_active($itemChild['routes'])) {
                    $this->activeName = $childName;
                }
                //dd($childActive,$itemChild);
                if($childActive){
                    $html .= "<i class=\"am-icon-star tpl-left-nav-content-ico am-fr am-margin-right\"></i>";
                }
                $html .=     "<a href=\"{$childUrl}\"><i class=\"am-icon-angle-right\"></i><span>{$childName}</span></a>\n";
            }
        }
        $html .= "</ul></li>\n";

        return $html;
    }

    /**
     * 获取一个菜单是否应该折叠（用于 CSS，一个菜单如果是活动状态则不该折叠）。
     *
     * @param array $item
     *
     * @return string
     */
    private function getCollapse($item)
    {
        return $this->is_active($item['url']) ? 'style="display: block;"' : '';
    }

    /**
     *
     *
     * @param array $item
     *
     * @return string
     */
    private function getchildActive($item)
    {
        $requestRouteName = explode('?',\Request::getRequestUri());
        $requestRouteName = substr($requestRouteName[0],1,strlen($requestRouteName[0]));
        $shouldActive = false;
        foreach ($item as $key) {
            if($this->routePrifix.'/'.$key==$requestRouteName){
                $shouldActive = true;
            }
        }
        return $shouldActive;
    }
}