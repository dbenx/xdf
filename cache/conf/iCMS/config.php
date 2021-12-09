<?php
defined('iPHP') OR exit('Access Denied');
return array (
  'api' => 
  array (
    'baidu' => 
    array (
      'sitemap' => 
      array (
        'site' => '',
        'access_token' => '',
        'sync' => '0',
      ),
    ),
  ),
  'apps' => 
  array (
    'article' => '1',
    'category' => '2',
    'tag' => '3',
    'comment' => '5',
    'prop' => '6',
    'message' => '7',
    'favorite' => '8',
    'user' => '9',
    'admincp' => '10',
    'config' => '11',
    'files' => '12',
    'menu' => '13',
    'group' => '14',
    'members' => '15',
    'editor' => '16',
    'apps' => '17',
    'former' => '18',
    'patch' => '19',
    'content' => '20',
    'index' => '21',
    'public' => '22',
    'cache' => '23',
    'filter' => '24',
    'plugin' => '25',
    'forms' => '26',
    'keywords' => '28',
    'links' => '29',
    'search' => '31',
    'database' => '32',
    'html' => '33',
    'spider' => '34',
  ),
  'cache' => 
  array (
    'engine' => 'file',
    'host' => '',
    'time' => '300',
    'compress' => '1',
    'page_total' => '300',
    'prefix' => 'iCMS',
  ),
  'CDN' => 
  array (
    'enable' => '0',
    'cache_control' => 'public',
    'expires' => '86400',
  ),
  'debug' => 
  array (
    'php' => '1',
    'php_trace' => '0',
    'php_errorlog' => '0',
    'access_log' => '0',
    'tpl' => '1',
    'tpl_trace' => '0',
    'db' => '1',
    'db_trace' => '0',
    'db_explain' => '0',
    'db_optimize_in' => '0',
  ),
  'FS' => 
  array (
    'url' => 'http://192.168.2.77/res/',
    'dir' => 'res',
    'dir_format' => '{Y}/{m}-{d}/{H}',
    'allow_ext' => 'gif,jpg,rar,swf,jpeg,png',
    'check_md5' => '0',
  ),
  'mail' => 
  array (
    'host' => '',
    'secure' => '',
    'port' => '25',
    'username' => '',
    'password' => '',
    'setfrom' => '',
    'replyto' => '',
  ),
  'open' => 
  array (
  ),
  'other' => 
  array (
    'sidebar_enable' => '1',
    'sidebar' => '1',
  ),
  'plugin' => 
  array (
    'baidu' => 
    array (
      'sitemap' => 
      array (
        'site' => '',
        'access_token' => '',
        'sync' => '0',
      ),
      'xzh' => 
      array (
        'appid' => '',
        'token' => '',
      ),
    ),
  ),
  'publish' => 
  array (
  ),
  'router' => 
  array (
    'url' => 'http://192.168.2.77',
    'redirect' => '0',
    404 => 'http://www.i.com/public/404.htm',
    'public' => 'http://www.i.com/public',
    'user' => 'http://www.i.com/user',
    'dir' => '/',
    'ext' => '.html',
    'speed' => '5',
    'rewrite' => '0',
    'config' => 
    array (
      'api' => 
      array (
        0 => '/api',
        1 => 'api.php',
      ),
      'comment' => 
      array (
        0 => '/comment',
        1 => 'api.php?app=comment',
      ),
      'favorite' => 
      array (
        0 => '/favorite',
        1 => 'api.php?app=favorite',
      ),
      'favorite:id' => 
      array (
        0 => '/favorite/{id}/',
        1 => 'api.php?app=favorite&id={id}',
      ),
      'forms' => 
      array (
        0 => '/forms',
        1 => 'api.php?app=forms',
      ),
      'forms:id' => 
      array (
        0 => '/forms/{id}/',
        1 => 'api.php?app=forms&id={id}',
      ),
      'forms:save' => 
      array (
        0 => '/forms/save',
        1 => 'api.php?app=forms&do=save',
      ),
      'public:agreement' => 
      array (
        0 => '/public/agreement',
        1 => 'api.php?app=public&do=agreement',
      ),
      'public:seccode' => 
      array (
        0 => '/public/seccode',
        1 => 'api.php?app=public&do=seccode',
      ),
      'search' => 
      array (
        0 => '/search',
        1 => 'api.php?app=search',
      ),
      'uid:cid' => 
      array (
        0 => '/{uid}/{cid}/',
        1 => 'api.php?app=user&do=home&uid={uid}&cid={cid}',
      ),
      'uid:comment' => 
      array (
        0 => '/{uid}/comment/',
        1 => 'api.php?app=user&do=comment&uid={uid}',
      ),
      'uid:fans' => 
      array (
        0 => '/{uid}/fans/',
        1 => 'api.php?app=user&do=fans&uid={uid}',
      ),
      'uid:favorite' => 
      array (
        0 => '/{uid}/favorite/',
        1 => 'api.php?app=user&do=favorite&uid={uid}',
      ),
      'uid:favorite:id' => 
      array (
        0 => '/{uid}/favorite/{id}/',
        1 => 'api.php?app=user&do=favorite&uid={uid}&id={id}',
      ),
      'uid:follower' => 
      array (
        0 => '/{uid}/follower/',
        1 => 'api.php?app=user&do=follower&uid={uid}',
      ),
      'uid:home' => 
      array (
        0 => '/{uid}/',
        1 => 'api.php?app=user&do=home&uid={uid}',
      ),
      'uid:share' => 
      array (
        0 => '/{uid}/share/',
        1 => 'api.php?app=user&do=share&uid={uid}',
      ),
      'user' => 
      array (
        0 => '/user',
        1 => 'api.php?app=user',
      ),
      'user:article' => 
      array (
        0 => '/user/article',
        1 => 'api.php?app=user&do=manage&pg=article',
      ),
      'user:category' => 
      array (
        0 => '/user/category',
        1 => 'api.php?app=user&do=manage&pg=category',
      ),
      'user:comment' => 
      array (
        0 => '/user/comment',
        1 => 'api.php?app=user&do=manage&pg=comment',
      ),
      'user:findpwd' => 
      array (
        0 => '/user/findpwd',
        1 => 'api.php?app=user&do=findpwd',
      ),
      'user:home' => 
      array (
        0 => '/user/home',
        1 => 'api.php?app=user&do=home',
      ),
      'user:inbox' => 
      array (
        0 => '/user/inbox',
        1 => 'api.php?app=user&do=manage&pg=inbox',
      ),
      'user:inbox:uid' => 
      array (
        0 => '/user/inbox/{uid}',
        1 => 'api.php?app=user&do=manage&pg=inbox&user={uid}',
      ),
      'user:login' => 
      array (
        0 => '/user/login',
        1 => 'api.php?app=user&do=login',
      ),
      'user:login:qq' => 
      array (
        0 => '/user/login/qq',
        1 => 'api.php?app=user&do=login&sign=qq',
      ),
      'user:login:wb' => 
      array (
        0 => '/user/login/wb',
        1 => 'api.php?app=user&do=login&sign=wb',
      ),
      'user:login:wx' => 
      array (
        0 => '/user/login/wx',
        1 => 'api.php?app=user&do=login&sign=wx',
      ),
      'user:logout' => 
      array (
        0 => '/user/logout',
        1 => 'api.php?app=user&do=logout',
      ),
      'user:manage' => 
      array (
        0 => '/user/manage',
        1 => 'api.php?app=user&do=manage',
      ),
      'user:manage:fans' => 
      array (
        0 => '/user/manage/fans',
        1 => 'api.php?app=user&do=manage&pg=fans',
      ),
      'user:manage:favorite' => 
      array (
        0 => '/user/manage/favorite',
        1 => 'api.php?app=user&do=manage&pg=favorite',
      ),
      'user:manage:follow' => 
      array (
        0 => '/user/manage/follow',
        1 => 'api.php?app=user&do=manage&pg=follow',
      ),
      'user:profile' => 
      array (
        0 => '/user/profile',
        1 => 'api.php?app=user&do=profile',
      ),
      'user:profile:avatar' => 
      array (
        0 => '/user/profile/avatar',
        1 => 'api.php?app=user&do=profile&pg=avatar',
      ),
      'user:profile:base' => 
      array (
        0 => '/user/profile/base',
        1 => 'api.php?app=user&do=profile&pg=base',
      ),
      'user:profile:bind' => 
      array (
        0 => '/user/profile/bind',
        1 => 'api.php?app=user&do=profile&pg=bind',
      ),
      'user:profile:custom' => 
      array (
        0 => '/user/profile/custom',
        1 => 'api.php?app=user&do=profile&pg=custom',
      ),
      'user:profile:setpassword' => 
      array (
        0 => '/user/profile/setpassword',
        1 => 'api.php?app=user&do=profile&pg=setpassword',
      ),
      'user:publish' => 
      array (
        0 => '/user/publish',
        1 => 'api.php?app=user&do=manage&pg=publish',
      ),
      'user:register' => 
      array (
        0 => '/user/register',
        1 => 'api.php?app=user&do=register',
      ),
    ),
  ),
  'site' => 
  array (
    'name' => '深圳新东方烹饪学校【官网】',
    'seotitle' => '深圳新东方烹饪学校_学厨师_西点西餐厨师培训学校',
    'keywords' => '新东方烹饪学校,深圳新东方烹饪学校,新东方西点西餐学校,新东方厨师学校,新东方烹饪,新东方烹饪学校学费,学厨师要多少钱,深圳厨师培训,厨师培训,深圳学厨师,学厨师要多久,学厨师,烹饪学校,烹饪培训,深圳新东方,深圳新东方学校,厨师学校，广东省粤菜师傅培训基地',
    'description' => '深圳新东方烹饪学校是培养中式烹调师、西点师、西餐厨师的厨师培训学校,西点西餐培训学校.新东方烹饪学校学厨师、西点西餐,毕业推荐工作,是一所综合型烹饪学校.0755-89993666',
    'code' => '',
    'icp' => '',
  ),
  'sphinx' => 
  array (
    'host' => '127.0.0.1:9312',
    'index' => 'iCMS_article iCMS_article_delta',
  ),
  'system' => 
  array (
    'patch' => '1',
  ),
  'template' => 
  array (
    'index' => 
    array (
      'mode' => '0',
      'rewrite' => '0',
      'tpl' => '{iTPL}/index.htm',
      'name' => 'index',
    ),
    'desktop' => 
    array (
      'name' => 'mobile',
      'domain' => 'http://192.168.2.77',
      'tpl' => 'www/szxdfpr',
      'index' => '{iTPL}/index.htm',
    ),
    'mobile' => 
    array (
      'agent' => 'WAP,Smartphone,Mobile,UCWEB,Opera Mini,Windows CE,Symbian,SAMSUNG,iPhone,Android,BlackBerry,HTC,Mini,LG,SonyEricsson,J2ME,MOT',
      'domain' => 'http://192.168.2.77',
      'tpl' => 'www/szxdfpr',
      'index' => '{iTPL}/index.htm',
    ),
  ),
  'thumb' => 
  array (
    'size' => '',
  ),
  'time' => 
  array (
    'zone' => 'Asia/Shanghai',
    'cvtime' => '0',
    'dateformat' => 'Y-m-d H:i:s',
  ),
  'watermark' => 
  array (
    'enable' => '0',
    'mode' => '0',
    'pos' => '9',
    'x' => '10',
    'y' => '10',
    'width' => '140',
    'height' => '140',
    'allow_ext' => 'jpg,jpeg,png',
    'img' => 'watermark.png',
    'transparent' => '80',
    'text' => 'iCMS',
    'font' => '',
    'fontsize' => '24',
    'color' => '#000000',
    'mosaics' => 
    array (
      'width' => '150',
      'height' => '90',
      'deep' => '9',
    ),
  ),
  'article' => 
  array (
    'pic_center' => '1',
    'pic_next' => '0',
    'pageno_incr' => '',
    'markdown' => '0',
    'autoformat' => '0',
    'catch_remote' => '0',
    'remote' => '0',
    'autopic' => '1',
    'autodesc' => '1',
    'descLen' => '100',
    'autoPage' => '0',
    'AutoPageLen' => '',
    'repeatitle' => '0',
    'showpic' => '0',
    'filter' => '0',
    'clink' => '-',
  ),
  'category' => 
  array (
    'domain' => NULL,
  ),
  'tag' => 
  array (
    'rule' => '{PHP}',
    'tpl' => '{iTPL}/tag.htm',
    'tkey' => '-',
  ),
  'comment' => 
  array (
    'enable' => '1',
    'examine' => '0',
    'seccode' => '1',
  ),
  'user' => 
  array (
    'register' => 
    array (
      'enable' => '1',
      'seccode' => '1',
      'interval' => '86400',
    ),
    'login' => 
    array (
      'enable' => '1',
      'seccode' => '1',
      'interval' => '3600',
    ),
    'post' => 
    array (
      'seccode' => '1',
      'interval' => '10',
    ),
    'agreement' => '',
    'coverpic' => '/ui/coverpic.jpg',
    'open' => 
    array (
      'WX' => 
      array (
        'appid' => '',
        'appkey' => '',
        'redirect' => '',
      ),
      'QQ' => 
      array (
        'appid' => '',
        'appkey' => '',
        'redirect' => '',
      ),
      'WB' => 
      array (
        'appid' => '',
        'appkey' => '',
        'redirect' => '',
      ),
      'TB' => 
      array (
        'appid' => '',
        'appkey' => '',
        'redirect' => '',
      ),
    ),
  ),
  'cloud' => 
  array (
  ),
  'apps:meta' => 
  array (
    'article_meta' => '1',
    'category_meta' => '1',
    'tag_meta' => '1',
  ),
  'hooks' => 
  array (
    'article' => 
    array (
      'body' => 
      array (
        0 => 
        array (
          0 => 'keywordsApp',
          1 => 'HOOK_run',
        ),
        1 => 
        array (
          0 => 'plugin_download',
          1 => 'HOOK',
        ),
        2 => 
        array (
          0 => 'plugin_markdown',
          1 => 'HOOK',
        ),
      ),
    ),
  ),
  'weixin' => 
  array (
    'menu' => 
    array (
      0 => 
      array (
        'type' => 'click',
        'name' => '',
        'key' => '',
      ),
      1 => 
      array (
        'type' => 'click',
        'name' => '',
        'key' => '',
      ),
      2 => 
      array (
        'type' => 'click',
        'name' => '',
        'key' => '',
      ),
    ),
    'appid' => '',
    'appsecret' => '',
    'token' => '',
    'name' => '',
    'account' => '',
    'qrcode' => '',
    'subscribe' => '',
    'unsubscribe' => '',
    'AESKey' => '',
  ),
  'keywords' => 
  array (
    'limit' => '-1',
  ),
  'iurl' => 
  array (
    'article' => 
    array (
      'rule' => '2',
      'primary' => 'id',
      'page' => 'p',
    ),
    'category' => 
    array (
      'rule' => '1',
      'primary' => 'cid',
    ),
    'tag' => 
    array (
      'rule' => '3',
      'primary' => 'id',
    ),
    'index' => 
    array (
      'rule' => '0',
      'primary' => '',
    ),
  ),
  'meta' => 
  array (
  ),
);