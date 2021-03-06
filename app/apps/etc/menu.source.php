<?php
/**
 * iCMS - i Content Management System
 * Copyright (c) 2007-2019 iCMSdev.com. All rights reserved.
 *
 * @author icmsdev <master@icmsdev.com>
 * @site https://www.icmsdev.com
 * @licence https://www.icmsdev.com/LICENSE.html
 *
 */
defined('iPHP') or exit('What are you doing?');

return '[{
    "id": "{app}",
    "caption": "{name}",
    "icon": "pencil-square-o",
    "children": [{
        "caption": "更新栏目缓存",
        "href": "{app}_category&do=cache",
        "icon": "refresh",
        "target":"iPHP_FRAME"
    }, {
        "caption": "-"
    }, {
        "caption": "栏目管理",
        "href": "{app}_category",
        "icon": "list-alt"
    }, {
        "caption": "添加栏目",
        "href": "{app}_category&do=add",
        "icon": "edit"
    }, {
        "caption": "-"
    }, {
        "caption": "添加{title}",
        "href": "{app}&do=add",
        "icon": "edit"
    }, {
        "caption": "{title}管理",
        "href": "{app}&do=manage",
        "icon": "list-alt"
    }, {
        "caption": "草稿箱",
        "href": "{app}&do=inbox",
        "icon": "inbox"
    }, {
        "caption": "回收站",
        "href": "{app}&do=trash",
        "icon": "trash-o"
    }, {
        "caption": "-"
    }, {
        "caption": "用户{title}管理",
        "href": "{app}&do=user",
        "icon": "check-circle"
    }, {
        "caption": "审核用户{title}",
        "href": "{app}&do=examine",
        "icon": "minus-circle"
    }, {
        "caption": "淘汰的{title}",
        "href": "{app}&do=off",
        "icon": "times-circle"
    }, {
        "caption": "-"
    }, {
        "caption": "{title}评论管理",
        "href": "comment&appname={app}&appid={appid}",
        "icon": "comments"
    }]
}]';
