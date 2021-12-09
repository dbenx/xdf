
// 接入易聊工具，全天  大笨熊  2021 12 07
function swtClick(ms)
{
    if(!ms){ms='官网-PC站点-在线咨询'}
    try {
        var eventInfo = { "btn_name":"在线咨询","type":ms,'$title':document.title,'$url':window.location.href}
        AnalysysAgent.track("contact",eventInfo,callback);
    } catch (e) {
    }

    openJesongChatByGroup(13119, 25205);
    // console.log(window.location.href+'bbb');
    return false;  /*因为部分事件使用的是  onclick="return swtClick()" 所以返回一个值*/
}
var callback = function() {console.log('数据发送完毕')}

/*

document.writeln("<script language=\'javascript\' src=\'//scripts.easyliao.com/js/easyliao.js\'><\/script>");//易聊通用JS

document.writeln("<script type=\'text/javascript\' charset=\'UTF-8\' src=\'//scripts.easyliao.com/13119/37717.js\'><\/script>");//易聊对应ID JS

*/
//易聊接入结束


/*
* 右侧边弹窗
* */

document.writeln("<div class=\'swtRirhgt clearfix\'>");
document.writeln("  <a href=\'javascript:void(0)\' onclick=\'swtClick()\' class=\'xuefei\'>");
document.writeln("    <p>");
document.writeln("    </p>");
document.writeln("  </a>");
document.writeln("  <a href=\'javascript:void(0)\' onclick=\'swtClick()\' class=\'zhuanye\'>");
document.writeln("    <p>");
document.writeln("    </p>");
document.writeln("  </a>");
document.writeln("  <a href=\'javascript:void(0)\' onclick=\'swtClick()\' class=\'swtzx\'>");
document.writeln("    <p>");
document.writeln("    </p>");
document.writeln("  </a>");
document.writeln("  <a href=\'javascript:void(0)\' onclick=\'swtClick()\' class=\'telzx\'>");
document.writeln("    <p>");
document.writeln("    </p>");
document.writeln("  </a>");
document.writeln("  <a target=\'_blank\' href=\'javascript:;\' onclick=\'swtClick()\' class=\'qqzx zxUrl\'>");
document.writeln("    <p>");
document.writeln("    </p>");
document.writeln("  </a>");
document.writeln("  <div class=\'wechatzx\'>");
document.writeln("    <p>");
document.writeln("    </p>");
document.writeln("    <div class=\'qrcode\'></div>");
document.writeln("  </div>");
document.writeln("  <div class=\'backtopbtn\'>");
document.writeln("    <p>");
document.writeln("    </p>");
document.writeln("  </div>");
document.writeln("</div>");

/*top*/
$(function () {
    $('.backtopbtn').click(function(){
        $("html,body").stop().animate({scrollTop:"0"});
    });
});
