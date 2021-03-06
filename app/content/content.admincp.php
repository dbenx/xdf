<?php
/**
* iCMS - i Content Management System
* Copyright (c) 2007-2017 iCMSdev.com. All rights reserved.
*
* @author icmsdev <master@icmsdev.com>
* @site https://www.icmsdev.com
* @licence https://www.icmsdev.com/LICENSE.html
*/
class contentAdmincp{
    public $appid     = null;
    public $app       = null;
    public $callback  = array();
    public $table     = null;
    public $primary   = null;
    public $union_key = null;
    public $config    = null;

    protected $_view_add     = 'content.add';
    protected $_view_manage  = 'content.manage';
    protected $_view_tpl_dir = null;

    public function __construct($data=null,$dir=null) {
        if($data===null){
            $id = iSecurity::request('appid');
            $data = apps::get_app($id);
        }else if(!is_array($data)){
            $data = apps::get_app($data);
        }
        $this->app       = $data;
        $this->appid     = $data['id'];
        $_GET['appid'] && $this->appid = (int)$_GET['appid'];

        $table_array        = apps::get_table($this->app);
        content::$app       = $this->app['app'];
        content::$table     = $table_array['table'];
        content::$primary   = $table_array['primary'];
        content::$union_key = apps_mod::data_union_key($this->app['app']);
        unset($table_array);

        $this->id        = (int)$_GET['id'];
        $this->_postype  = '1';
        $this->_status   = '1';
        $this->config    = iCMS::$config[$this->app['app']];
        category::$appid = $this->appid;
        tag::$appid      = $this->appid;
        $this->_view_tpl_dir = $dir;
    }
    public function do_config(){
        configAdmincp::app($this->appid);
    }
    public function do_save_config(){
        configAdmincp::save($this->appid);
    }
    public function do_add(){
        $rs = apps_mod::get_data($this->app,$this->id);
        isset($rs['status']) OR $rs['status'] = '1';
        if(empty($rs['cid']) && isset($_GET['cid'])){
            $rs['cid'] = (int)$_GET['cid'];
        }
        iPHP::callback(array("apps_meta","get"),array($this->appid,$this->id));
        iPHP::callback(array("formerApp","add"),array($this->app,$rs));
        include admincp::view($this->_view_add,$this->_view_tpl_dir);
    }
    public function do_update(){
        $data = iSQL::update_args($_GET['_args']);
        if($data){
            if(isset($data['pid'])){
                iMap::init('prop',$this->appid,'pid');
                $_pid = content::value('pid',$this->id);
                iMap::diff($data['pid'],$_pid,$this->id);
            }
            content::update($data,array('id'=>$this->id));
        }
        iUI::success('????????????!','js:1');
    }
    public function do_updateorder(){
        foreach((array)$_POST['sortnum'] as $sortnum=>$id){
            content::update(compact('sortnum'),compact('id'));
        }
    }
    public function do_batch(){
        list($idArray,$ids,$batch) = iUI::get_batch_args("?????????????????????".$this->app['title']);
        switch($batch){
            case 'order':
                foreach((array)$_POST['sortnum'] AS $id=>$sortnum) {
                    content::update(compact('sortnum'),compact('id'));
                }
                iUI::success('???????????????!','js:1');
            break;
            case 'meta':
                foreach((array)$_POST['id'] AS $id) {
                    iPHP::callback(array("apps_meta","save"),array($this->appid,$id));
                }
                iUI::success('????????????!','js:1');
            break;
            case 'baiduping':
                foreach($idArray AS $id) {
                    $msg.= $this->do_baiduping($id,false);
                }
                iUI::success($msg,'js:1');
            break;
            case 'move':
                $_POST['cid'] OR iUI::alert("?????????????????????!");
                iMap::init('category',$this->appid,'cid');
                $cid = (int)$_POST['cid'];
                category::check_priv($cid,'ca','alert');
                foreach((array)$_POST['id'] AS $id) {
                    $_cid = content::value('cid',$id);
                    content::update(compact('cid'),compact('id'));
                    if($_cid!=$cid) {
                        iMap::diff($cid,$_cid,$id);
                        categoryAdmincp::update_count($_cid,'-');
                        categoryAdmincp::update_count($cid);
                    }
                }
                iUI::success('???????????????????????????!','js:1');
            break;
            case 'prop':
                iMap::init('prop',$this->appid,'pid');
                $pid = implode(',', (array)$_POST['pid']);
                foreach((array)$_POST['id'] AS $id) {
                    $_pid = content::value('pid',$id);
                    content::update(compact('pid'),compact('id'));
                    iMap::diff($pid,$_pid,$id);
                }
                iUI::success('??????????????????!','js:1');
            break;
            case 'weight':
                $data = array('weight'=>$_POST['mweight']);
            break;
            case 'keyword':
                if($_POST['pattern']=='replace') {
                    $data = array('keywords'=>iSecurity::escapeStr($_POST['mkeyword']));
                }elseif($_POST['pattern']=='addto') {
                    foreach($_POST['id'] AS $id){
                        $keywords = content::value('keywords',$id);
                        $keywords = $keywords?$keywords.','.iSecurity::escapeStr($_POST['mkeyword']):iSecurity::escapeStr($_POST['mkeyword']);
                        content::update(compact('keywords'),compact('id'));
                    }
                    iUI::success('?????????????????????!','js:1');
                }
            break;
            case 'tag':
                foreach($_POST['id'] AS $id){
                    $art  = content::row($id,'tags,cid');
                    $mtag = iSecurity::escapeStr($_POST['mtag']);
                    $tagArray  = $art['tags']?explode(',', $art['tags']):array();
                    $mtagArray = explode(',', $mtag);
                    if($_POST['pattern']=='replace') {
                    }elseif($_POST['pattern']=='delete') {
                        foreach ($mtagArray as $key => $value) {
                            $tk = array_search($value, $tagArray);
                            if($tk!==false){
                                unset($tagArray[$tk]);
                            }
                        }
                        $mtag   = implode(',', $tagArray);
                    }elseif($_POST['pattern']=='addto') {
                        $pieces = array_merge($tagArray,$mtagArray);
                        $pieces = array_unique($pieces);
                        $mtag   = implode(',', $pieces);
			        }
                    $mtag = ltrim($mtag,',');
                    $tags = tag::diff($mtag,$art['tags'],members::$userid,$id,$art['cid']);
                    $tags = addslashes($tags);
                    content::update(compact('tags'),compact('id'));
                }
                iUI::success('??????????????????!','js:1');
            break;
            case 'dels':
                iUI::$break = false;
                iUI::flush_start();
                $_count = count($_POST['id']);
                foreach((array)$_POST['id'] AS $i=>$id) {
                    $this->do_del($id,false);
                    $updateMsg  = $i?true:false;
                    $timeout    = ($i++)==$_count?'3':false;
                    iUI::dialog($id."??????",'js:parent.$("#id'.$id.'").remove();',$timeout,0,$updateMsg);
                    iUI::flush();
                }
                iUI::$break = true;
                iUI::success('??????????????????!','js:1',3,0,true);
            break;
            default:
                $data = iSQL::update_args($batch);
        }
        $data && content::batch($data,$ids);
        iUI::success('????????????!','js:1');
    }
    /**
     * [???????????? ]
     * @param  [type]  $id     [description]
     * @param  boolean $dialog [description]
     * @return [type]          [description]
     */
    public function do_baiduping($id = null,$dialog=true){
        $id===null && $id=$this->id;
        $id OR iUI::alert('???????????????????????????!');
        $rs   = content::row($id);
        $C    = category::get($rs['cid']);
        $iurl = (array)iURL::get($this->app['app'],array($rs,$C));
        $urls = array();
        $urls[] = $iurl['href'];
        if($iurl['mobile']['url']){
            $urls[] = $iurl['mobile']['url'];
        }
        $res = plugin_baidu::ping($urls);
        // if($iurl['mip']['url']){
        //     $mip = plugin_baidu::ping($iurl['mip']['url'],'mip');
        // }
        if($res===true){
            $msg = '????????????';
            $dialog && iUI::success($msg,'js:1');
        }else{
            $msg = '???????????????['.$res->message.']';
            $dialog && iUI::alert($msg,'js:1');
        }
        if(!$dialog) return $msg.'<br />';
    }
    public function do_iCMS(){
    	admincp::$APP_METHOD="domanage";
    	$this->do_manage();
    }
    public function do_inbox(){
        $this->do_manage("inbox");
    }
    public function do_trash(){
        $this->_postype = 'all';
        $this->do_manage("trash");
    }
    public function do_user(){
        $this->_postype = 0;
        $this->do_manage();
    }
    public function do_examine(){
        $this->_postype = 0;
        $this->do_manage("examine");
    }
    public function do_off(){
        $this->_postype = 0;
        $this->do_manage("off");
    }
    public function do_manage($stype='normal') {
        $cid = (int)$_GET['cid'];
        $pid = $_GET['pid'];
        //$stype OR $stype = admincp::$APP_DO;
        $stype_map = array(
            'inbox'   =>'0',//??????
            'normal'  =>'1',//??????
            'trash'   =>'2',//?????????
            'examine' =>'3',//?????????
            'off'     =>'4',//?????????
        );
        $map_where = array();
        //status:[0:??????][1:??????][2:??????][3:?????????][4:?????????]
        //postype: [0:??????][1:?????????]
        $stype && $this->_status = $stype_map[$stype];

        $sql = 'WHERE 1=1';
        if(is_numeric($_GET['postype'])){
            $this->_postype = (int)$_GET['postype'];
        }
        if(is_numeric($_GET['status'])){
            $this->_status = (int)$_GET['status'];
        }
        is_numeric($this->_postype) && $sql.=" AND `postype` ='".$this->_postype."'";
        is_numeric($this->_status) && $sql.=" AND `status` ='".$this->_status."'";

        if(members::check_priv($this->app['app'].".VIEW")){
            $_GET['userid'] && $sql.= iSQL::in($_GET['userid'],'userid');
        }else{
            $sql.= iSQL::in(members::$userid,'userid');
        }

        if(isset($_GET['pid']) && $pid!='-1'){
            $uri_array['pid'] = $pid;
            if(empty($_GET['pid'])){
                $sql.= " AND `pid`=''";
            }else{
                iMap::init('prop',$this->appid,'pid');
                $map_where+=iMap::where($pid);
            }
        }

        $cp_cids = category::check_priv('CIDS','cs');//??????????????????????????????ID

        if($cp_cids) {
            if(is_array($cp_cids)){
                if($cid){
                    array_search($cid,$cp_cids)===false && admincp::permission_msg('??????[cid:'.$cid.']',$ret);
                }else{
                    $cids = $cp_cids;
                }
            }else{
                $cids = $cid;
            }
            if($_GET['sub'] && $cid){
                $cids = categoryApp::get_cids($cid,true);
                array_push ($cids,$cid);
            }
            if($_GET['scid'] && $cid){
                iMap::init('category',$this->appid,'cid');
                $map_where+= iMap::where($cids);
            }else{
                $sql.= iSQL::in($cids,'cid');
            }
        }else{
            $sql.= iSQL::in('-1','cid');
        }
        if($_GET['hidden']) {
            $hidden = categoryApp::get_cache('hidden');
            $hidden && $sql.= iSQL::in($hidden, 'cid', 'not');
        }
        if($_GET['keywords']) {
            $kws = $_GET['keywords'];
            switch ($_GET['st']) {
                case "title": $sql.=" AND `title` REGEXP '{$kws}'";break;
                case "tag":   $sql.=" AND `tags` REGEXP '{$kws}'";break;
                //case "source":$sql.=" AND `source` REGEXP '{$kws}'";break;
                case "weight":$sql.=" AND `weight`='{$kws}'";break;
                case "id":
                $kws = str_replace(',', "','", $kws);
                $sql.=" AND `id` IN ('{$kws}')";
                break;
                case "tkd":   $sql.=" AND CONCAT(title,keywords,description) REGEXP '{$kws}'";break;
                default:
                if($this->app['fields'][$_GET['st']]){
                    $sql.=" AND `".$_GET['st']."`='{$kws}'";
                }
            }
        }

        $sql.= category::search_sql($cid);

        isset($_GET['nopic'])&& $sql.=" AND `haspic` ='0'";
        isset($_GET['pic'])&& $sql.=" AND `haspic` ='".($_GET['pic']?1:0)."'";
        $_GET['tag']       && $sql.=" AND `tags` REGEXP '[[:<:]]".preg_quote(rawurldecode($_GET['tag']),'/')."[[:>:]]'";
        $_GET['starttime'] && $sql.=" AND `pubdate`>='".str2time($_GET['starttime'].(strpos($_GET['starttime'],' ')!==false?'':" 00:00:00"))."'";
        $_GET['endtime']   && $sql.=" AND `pubdate`<='".str2time($_GET['endtime'].(strpos($_GET['endtime'],' ')!==false?'':" 23:59:59"))."'";
        $_GET['post_starttime'] && $sql.=" AND `postime`>='".str2time($_GET['post_starttime'].(strpos($_GET['post_starttime'],' ')!==false?'':" 00:00:00"))."'";
        $_GET['post_endtime']   && $sql.=" AND `postime`<='".str2time($_GET['post_endtime'].(strpos($_GET['post_endtime'],' ')!==false?'':" 23:59:59"))."'";


        isset($_GET['userid']) && $uriArray['userid']  = (int)$_GET['userid'];
        isset($_GET['keyword'])&& $uriArray['keyword'] = $_GET['keyword'];
        isset($_GET['tag'])    && $uriArray['tag']     = $_GET['tag'];
        isset($_GET['postype'])&& $uriArray['postype'] = $_GET['postype'];
        isset($_GET['cid'])    && $uriArray['cid']     = $_GET['cid'];

        list($orderby,$orderby_option) = $this->get_orderby();

        $maxperpage = $_GET['perpage']>0?(int)$_GET['perpage']:20;

        if($map_where){
            $map_sql = iSQL::select_map($map_where);
            $sql     = ",({$map_sql}) map {$sql} AND `id` = map.`iid`";
        }

        $total = iPagination::totalCache("SELECT count(*) FROM `".content::$table."` {$sql}","G");
        iUI::pagenav($total,$maxperpage,"?????????");

        $limit = 'LIMIT '.iPagination::$offset.','.$maxperpage;

        if($map_sql||iPagination::$offset){
            if(iPagination::$offset > 1000 && $total > 2000 && iPagination::$offset >= $total/2) {
                $_offset = $total-iPagination::$offset-$maxperpage;
                if($_offset < 0) {
                    $_offset = 0;
                }
                $orderby = "id ASC";
                $limit = 'LIMIT '.$_offset.','.$maxperpage;
            }
        // if($map_sql){
            $ids_array = iDB::all("
                SELECT `id` FROM `".content::$table."` {$sql}
                ORDER BY {$orderby} {$limit}
            ");
            if(isset($_offset)){
                $ids_array = array_reverse($ids_array, TRUE);
                $orderby   = "id DESC";
            }

            $ids = iSQL::values($ids_array);
            $ids = $ids?$ids:'0';
            $sql = "WHERE `id` IN({$ids})";
            // }else{
                // $sql = ",(
                    // SELECT `id` AS aid FROM `".content::$table."` {$sql}
                    // ORDER BY {$orderby} {$limit}
                // ) AS art WHERE `id` = art.aid ";
            // }
            $limit = '';
        }
        $rs = iDB::all("SELECT * FROM `".content::$table."` {$sql} ORDER BY {$orderby} {$limit}");
        $_count = count($rs);
        $propArray = propAdmincp::get("pid",null,'array');
        include admincp::view($this->_view_manage,$this->_view_tpl_dir);
    }
    public function do_save(){
        iPHP::callback($this->callback['save:begin'],array($this));
        $update = iPHP::callback(array("formerApp","save"),array($this->app));
        iPHP::callback($this->callback['save:end'],array($this,formerApp::$primary_id,$update));
        iPHP::callback(array("apps_meta","save"),array($this->appid,formerApp::$primary_id));
        iPHP::callback(array("spider","callback"),array($this,formerApp::$primary_id));

        if($this->callback['return']){
            $this->callback['indexid'] =formerApp::$primary_id;
            return $this->callback['return'];
        }
        if($this->callback['save:return']){
            $this->callback['indexid'] =formerApp::$primary_id;
            return $this->callback['save:return'];
        }

        $REFERER_URL= APP_URI.'&do=manage';
        if($update){
            iUI::success($this->app['title'].'????????????!<br />3????????????'.$this->app['title'].'??????','url:'.$REFERER_URL);
        }else{
            $moreBtn = array(
                    array("text" =>"?????????".$this->app['title'],"target"=>'_blank',"url"=>$article_url,"close"=>false),
                    array("text" =>"?????????".$this->app['title'],"url"=>APP_URI."&do=add&id=".formerApp::$primary_id),
                    array("text" =>"????????????".$this->app['title'],"url"=>APP_URI."&do=add&cid=".$cid),
                    array("text" =>"??????".$this->app['title']."??????","url"=>$REFERER_URL),
                    array("text" =>"??????????????????","url"=>iCMS_URL,"target"=>'_blank')
            );
            iUI::$dialog['modal'] = true;
            iUI::dialog('success:#:check:#:'.$this->app['title'].'????????????!<br />10????????????'.$this->app['title'].'??????'.$msg,'url:'.$REFERER_URL,10,$moreBtn);
        }
    }

    public function do_del($id = null,$dialog=true){
    	$id===null && $id=$this->id;
		$id OR iUI::alert("?????????????????????{$this->app['title']}");

        $tables = $this->app['table'];
        foreach ($tables as $key => $value) {
            $primary_key = $value['primary'];
            $value['union'] && $primary_key = $value['union'];
            iDB::query("DELETE FROM `{$value['table']}` WHERE `{$primary_key}`='$id'");
        }
		$dialog && iUI::success("{$this->app['title']}????????????",'js:parent.$("#id'.$id.'").remove();');
    }
    public function get_orderby(){
        return get_orderby(array(
            content::$primary =>"ID",
            'hits'       =>"??????",
            'hits_week'  =>"?????????",
            'hits_month' =>"?????????",
            'good'       =>"???",
            'postime'    =>"??????",
            'pubdate'    =>"????????????",
            'comments'   =>"?????????",
        ));
    }
    // public static function menu($menu){
    //     $path     = iPHP_APP_DIR.'/apps/etc/content.menu.json.php';
    //     $json     = file_get_contents($path);
    //     $json     = str_replace("<?php defined('iPHP') OR exit('What are you doing?');? >\n", '', $json);
    //     $variable = array();
    //     $array    = apps::get_array(array("apptype"=>'2'));
    //     if($array)foreach ($array as $key => $value) {
    //         if($value['config']['menu']){
    //             $sort = 200000+$key;

    //             $json = str_replace(
    //                 array('{appid}','{app}','{name}','{sort}'),
    //                 array($value['id'],$value['app'],$value['name'],$sort), $json);

    //             if($value['config']['menu']!='main'){
    //                 $json = '[{"id": "'.$value['config']['menu'].'","children":[{"caption": "-"},'.$json.']}]';
    //             }else{
    //                 $json = '['.$json.']';
    //             }

    //             $array  = json_decode($json,true);
    //             if($array){
    //                 $array = $menu::mid($array,$sort);
    //                 $variable[] = $array;
    //             }
    //         }
    //     }
    //     return $variable;
    // }
}
