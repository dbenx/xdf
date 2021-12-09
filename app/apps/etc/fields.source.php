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

return '[
    {
        "id": "id",
        "label": "内容id",
        "comment": "主键 自增ID",
        "field": "PRIMARY",
        "name": "id",
        "default": "",
        "type": "PRIMARY",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "type": "br"
    },
    {
        "id": "cid",
        "label": "栏目cid",
        "field": "INT",
        "name": "cid",
        "default": "",
        "type": "category",
        "len": "10",
        "unsigned": "1",
        "class": "span3",
        "validate": [
            "empty"
        ]
    },
    {
        "id": "status",
        "label": "状态",
        "comment": "0:草稿;1:正常;2:回收;3:审核;4:不合格",
        "option": "草稿=0;正常=1;回收=2;审核=3;不合格=4;",
        "field": "TINYINT",
        "name": "status",
        "default": "1",
        "type": "select",
        "len": "1",
        "unsigned": "1",
        "class": "chosen-select span3"
    },
    {
        "type": "br"
    },
    {
        "id": "ucid",
        "label": "用户分类",
        "field": "INT",
        "name": "ucid",
        "default": "",
        "type": "user_category",
        "len": "10",
        "unsigned": "1",
        "class": "span6"
    },
    {
        "type": "br"
    },
    {
        "id": "pid",
        "label": "属性",
        "field": "VARCHAR",
        "name": "pid",
        "type": "multi_prop",
        "default": "",
        "len": "255",
        "class": "span6"
    },
    {
        "type": "br"
    },
    {
        "id": "title",
        "label": "标题",
        "field": "VARCHAR",
        "name": "title",
        "type": "text",
        "default": "",
        "len": "255",
        "class": "span6",
        "validate": [
            "empty"
        ]
    },
    {
        "type": "br"
    },
    {
        "id": "editor",
        "label": "编辑",
        "comment": "编辑或用户名",
        "field": "VARCHAR",
        "name": "editor",
        "type": "username",
        "default": "",
        "len": "255",
        "class": "span3"
    },
    {
        "id": "userid",
        "label": "用户ID",
        "field": "INT",
        "name": "userid",
        "type": "userid:hidden",
        "default": "",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "type": "br"
    },
    {
        "id": "scores",
        "label": "阅读点数",
        "field": "INT",
        "name": "scores",
        "default": "",
        "type": "number:scores",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "id": "credit",
        "label": "积分",
        "field": "INT",
        "name": "credit",
        "default": "",
        "type": "number:credit",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "type": "br"
    },
    {
        "id": "pubdate",
        "label": "发布时间",
        "field": "INT",
        "name": "pubdate",
        "default": "",
        "type": "datetime",
        "len": "10",
        "unsigned": "1",
        "class": "span3"
    },
    {
        "id": "postime",
        "label": "提交时间",
        "field": "INT",
        "name": "postime",
        "default": "",
        "type": "datetime:hidden",
        "len": "10",
        "unsigned": "1",
        "class": "span3"
    },
    {
        "type": "br"
    },
    {
        "id": "clink",
        "label": "自定义链接",
        "field": "VARCHAR",
        "name": "clink",
        "type": "text",
        "default": "",
        "len": "255",
        "class": "span6"
    },
    {
        "type": "br"
    },
    {
        "id": "tpl",
        "label": "模板",
        "field": "VARCHAR",
        "name": "tpl",
        "type": "tplfile",
        "default": "",
        "len": "255",
        "class": "span6"
    },
    {
        "type": "br"
    },
    {
        "id": "hits",
        "label": "总点击数",
        "field": "INT",
        "name": "hits",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "id": "hits_today",
        "label": "当天点击数",
        "field": "INT",
        "name": "hits_today",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "id": "hits_yday",
        "label": "昨天点击数",
        "field": "INT",
        "name": "hits_yday",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "id": "hits_week",
        "label": "周点击",
        "field": "INT",
        "name": "hits_week",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "id": "hits_month",
        "label": "月点击",
        "field": "INT",
        "name": "hits_month",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "type": "br"
    },
    {
        "id": "favorite",
        "label": "收藏数",
        "field": "INT",
        "name": "favorite",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "id": "comments",
        "label": "评论数",
        "field": "INT",
        "name": "comments",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "type": "br"
    },
    {
        "id": "good",
        "label": "顶",
        "field": "INT",
        "name": "good",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "id": "bad",
        "label": "踩",
        "field": "INT",
        "name": "bad",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "type": "br"
    },
    {
        "id": "sortnum",
        "label": "排序",
        "field": "INT",
        "name": "sortnum",
        "default": "",
        "type": "number",
        "len": "10",
        "unsigned": "1",
        "class": "span3"
    },
    {
        "id": "weight",
        "label": "权重",
        "field": "INT",
        "name": "weight",
        "default": "",
        "type": "number",
        "len": "10",
        "class": "span3"
    },
    {
        "type": "br"
    },
    {
        "id": "creative",
        "label": "内容类型",
        "comment": "0:转载;1:原创",
        "field": "TINYINT",
        "name": "creative",
        "option": "转载=0;原创=1;",
        "default": "0",
        "type": "radio",
        "len": "1",
        "unsigned": "1",
        "class": "radio"
    },
    {
        "type": "br"
    },
    {
        "id": "mobile",
        "label": "发布设备",
        "comment": "0:pc;1:手机",
        "field": "TINYINT",
        "name": "mobile",
        "default": "0",
        "type": "device:hidden",
        "len": "1",
        "unsigned": "1",
        "class": "span2"
    },
    {
        "type": "br"
    },
    {
        "id": "postype",
        "label": "发布类型",
        "comment": "0:用户;1:管理员",
        "field": "TINYINT",
        "name": "postype",
        "default": "1",
        "type": "postype:hidden",
        "len": "1",
        "unsigned": "1",
        "class": "span2"
    }
]';
