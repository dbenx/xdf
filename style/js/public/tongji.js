/*
* PC站点跳转到手机站点
* 2021 12 08 dbenx
* */
var mobileAgent = new Array("iphone", "ipod", "android", "mobile", "blackberry", "webos", "incognito", "webmate", "bada", "nokia", "lg", "ucweb", "skyfire");
var browser = navigator.userAgent.toLowerCase();
var isMobile = false;
for (var i = 0; i < mobileAgent.length; i++) {
    if (browser.indexOf(mobileAgent[i]) != -1) {
        isMobile = true;
        location.href = '//m.szxdfpr.com/?pc';
        break
    }
}

//易观方舟  2021 12 08
//document.writeln("<script language=\'javascript\' src=\'//www.szxdfpr.com/sdk/initSdk.js\'><\/script>");

// 百度统计代码  2021 12 08  dbenx
var _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?a29d25eb513fdb1a6a11b8e36614ad17";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();



// 百度统计代码  2021 12 08  dbenx
var _hmt = _hmt || [];
(function() {
    var hm = document.createElement("script");
    hm.src = "https://hm.baidu.com/hm.js?3507279e8ed0a7a6c43145df9640ee64";
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(hm, s);
})();

/********2021 12 08  dbenx cnzz******************/
document.writeln("<div style=\'display:none;\'>");
document.writeln("<script type=\'text/javascript\' src=\'https://s9.cnzz.com/z_stat.php?id=1280030160&web_id=1280030160\'></script>");
document.writeln("</div>");

//ptengine  铂金分析
window._pt_lt = new Date().getTime();
window._pt_sp_2 = [];
_pt_sp_2.push('setAccount,71c52f68');
var _protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
(function() {
    var atag = document.createElement('script');
    atag.type = 'text/javascript';
    atag.async = true;
    atag.src = _protocol + 'js.ptengine.cn/71c52f68.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(atag, s);
})();


//追踪代码－－－－－－－－－
function eventGetPath(ele,path_arr) {
    path_arr.push(ele);
    if(ele.parentNode.tagName=='body'||ele.parentNode.tagName=='BODY'){
        return path_arr;
    }else {
        return eventGetPath(ele.parentNode,path_arr);
    }

}

window.onload=()=>{
    document.getElementsByTagName('body')[0].onclick=function(event){
        /**
         * event解决浏览器兼容
         * @type {*|Event}
         */
        event=event||window.event;
        event.target=event.target||event.srcElement;

        /**
         * 解决event.path的浏览器兼容
         */
        var path=event.path||eventGetPath(event.target,[]);
        /**
         *
         * 判断是否为提交按钮
         * */
        var url=location.href.split('?')[1];
        var zhengze=new RegExp("#");
        if(url==undefined){
            url=location.href.split('？')[1];
        }
        url=(url!==undefined)?'?'+url.split('#')[0]:"";
        for(var i=0;i<path.length;i++){
            if(path[i].tagName=='a'||path[i].tagName=='A'){
                var herfs=path[i].getAttribute('href');
                if(zhengze.test(herfs)){
                    if(herfs.indexOf('http://')==0||herfs.indexOf('https://')==0){
                     //   resource_click('超链接','链接',path[i].href.split('#')[0]+url+'#'+path[i].href.split('#')[1]);
                        // alert("1"+path[i].href.split('#')[0]+url+'#'+path[i].href.split('#')[1]);
                        location.href=path[i].href.split('#')[0]+url+'#'+path[i].href.split('#')[1];
                    }else{
                      //  resource_click('超链接','链接',path[i].href.split('#')[0]+url+'#'+path[i].href.split('#')[1]);
                        location.href=path[i].href;
                    }
                    return false
                }else if(herfs==false||herfs==null){
                    return false
                }
                if(path[i].getAttribute('target')=='_blank'){
                    //resource_click('超链接','链接',path[i].href+url);
                    window.open(path[i].href+url);

                    return false;
                }else{

                    //resource_click('超链接','链接',path[i].href+url);
                    location.href=path[i].href+url;
                    return false;
                }
                break;
            }
        }
    };
}


//获取日期
var date = new Date();
var y = date.getFullYear(); //年
var m = date.getMonth()+1;  //月
var d = date.getDate();     //日
var w = date.getDay();      //星期
var h = date.getHours();    //时
var min = date.getMinutes();//分
var s = date.getSeconds();  //秒
var mytime = date.toLocaleTimeString();//获取当前时间 例：上午8:50:35
var mytime2 = date.toLocaleString();//获取日期与时间 例：2021/2/20上午8:50:35
var season = '';
if(m<4){season = '春季'}
else if (m<7){season = '夏季'}
else if (m<10){season = '秋季'}
else {season = '冬季'}
