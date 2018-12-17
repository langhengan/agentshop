<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/06/11 0011
 * Time: 21:09
 */

namespace App\Menu;


class MenuConfig
{

    /**
     * 菜单，注释在前两项中。
     *
     * @var array
     */
    private static $menu = [
        [
            // 显示名称、链接文字名称
            'display_name'   => '首页',
            // 识别唯一权限的前缀，全局必须唯一，最就是符合 route 或 url
            'permission_key' => 'home',
            // icon 图标 class， 子菜单无图标，可省略
            'icon'           => 'am-icon-home',
            // url，这个值将用来生成页面网址，必须唯一
            'url'            => 'home',
            // 本页所符合的路由名称，用来决断菜单是否高亮显示（如果本页所使用的路由名称
            // 能符合请求的路由，说明这个菜单应该 active），
            'routes'         => 'home',
        ],
        [
            // 显示名称、链接文字名称
            'display_name'   => '用户列表',
            // 识别唯一权限的前缀，全局必须唯一，最就是符合 route 或 url
            'permission_key' => '',
            // icon 图标 class， 子菜单无图标，可省略
            'icon'           => 'fa fa-th-large',
            // url，这个值将用来生成页面网址，必须唯一
            'url'            => 'power',
            // 本页所符合的路由名称，用来决断菜单是否高亮显示（如果本页所使用的路由名称
            // 能符合请求的路由，说明这个菜单应该 active），
            'routes'         => 'power',
            'child'          => [
                [
                    'display_name'   => '帐号管理',
                    'permission_key' => 'adminAccount',
                    'url'            => 'user/index',
                    'routes'         => ['user/index'],
                ],
                [
                    'display_name'   => '角色管理',
                    'permission_key' => 'roleAdmin',
                    'url'            => 'role/index',
                    'routes'         => ['role/index'],
                ],
                [
                    'display_name'   => '权限管理',
                    'permission_key' => 'permissions',
                    'url'            => 'permission/index',
                    'routes'         => ['permission/index'],
                ],
            ],
        ],
        [
            // 显示名称、链接文字名称
            'display_name'   => '代理授权',
            // 识别唯一权限的前缀，全局必须唯一，最就是符合 route 或 url
            'permission_key' => '',
            // icon 图标 class， 子菜单无图标，可省略
            'icon'           => 'fa fa-th-large',
            // url，这个值将用来生成页面网址，必须唯一
            'url'            => 'power',
            // 本页所符合的路由名称，用来决断菜单是否高亮显示（如果本页所使用的路由名称
            // 能符合请求的路由，说明这个菜单应该 active），
            'routes'         => 'power',
            'child' => [
                [
                    'display_name'   => '前端用户的管理',
                    'permission_key' => 'ordinaryUser',
                    'url'            => 'admin/index',
                    'routes'         => ['admin/index'],
                ],
            ],
        ],
        [
            // 显示名称、链接文字名称
            'display_name'   => '模板管理',
            // 识别唯一权限的前缀，全局必须唯一，最就是符合 route 或 url
            'permission_key' => '',
            // icon 图标 class， 子菜单无图标，可省略
            'icon'           => 'fa fa-th-large',
            // url，这个值将用来生成页面网址，必须唯一
            'url'            => 'power',
            // 本页所符合的路由名称，用来决断菜单是否高亮显示（如果本页所使用的路由名称
            // 能符合请求的路由，说明这个菜单应该 active），
            'routes'         => 'power',
            'child' => [
                [
                    'display_name'   => '各类模板',
                    'permission_key' => 'allModule',
                    'url'            => 'allModule/index',
                    'routes'         => ['allModule/index'],
                ],
            ],
        ],
        [
            // 显示名称、链接文字名称
            'display_name'   => '订单管理',
            // 识别唯一权限的前缀，全局必须唯一，最就是符合 route 或 url
            'permission_key' => '',
            // icon 图标 class， 子菜单无图标，可省略
            'icon'           => 'fa fa-th-large',
            // url，这个值将用来生成页面网址，必须唯一
            'url'            => 'power',
            // 本页所符合的路由名称，用来决断菜单是否高亮显示（如果本页 所使用的路由名称
            // 能符合请求的路由，说明这个菜单应该 active），
            'routes'         => 'power',
            'child' => [
                [
                    'display_name'   => '后台订单的管理',
                    'permission_key' => 'order',
                    'url'            => 'order/index',
                    'routes'         => ['order/index'],
                ],
            ],
        ],
        [
            // 显示名称、链接文字名称
            'display_name'   => '发票管理',
            // 识别唯一权限的前缀，全局必须唯一，最就是符合 route 或 url
            'permission_key' => '',
            // icon 图标 class， 子菜单无图标，可省略
            'icon'           => 'fa fa-th-large',
            // url，这个值将用来生成页面网址，必须唯一
            'url'            => 'power',
            // 本页所符合的路由名称，用来决断菜单是否高亮显示（如果本页 所使用的路由名称
            // 能符合请求的路由，说明这个菜单应该 active），
            'routes'         => 'power',
            'child' => [
                [
                    'display_name'   => '发票的管理',
                    'permission_key' => 'boill',
                    'url'            => 'boill/index',
                    'routes'         => ['boill/index'],
                ],
            ],
        ],
        [
            // 显示名称、链接文字名称
            'display_name'   => '商品管理',
            // 识别唯一权限的前缀，全局必须唯一，最就是符合 route 或 url
            'permission_key' => '',
            // icon 图标 class， 子菜单无图标，可省略
            'icon'           => 'fa fa-th-large',
            // url，这个值将用来生成页面网址，必须唯一
            'url'            => 'power',
            // 本页所符合的路由名称，用来决断菜单是否高亮显示（如果本页 所使用的路由名称
            // 能符合请求的路由，说明这个菜单应该 active），
            'routes'         => 'power',
            'child' => [
                [
                    'display_name'   => '商品列表',
                    'permission_key' => 'goods',
                    'url'            => 'goods/index',
                    'routes'         => ['goods/index'],
                ],
            ],
        ],

    ];

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return static::$menu;
    }
}