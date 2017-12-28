<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<div class="dedeLeft">
   <div class='allmenu'>
    <!-- //内容管理 -->
    <div class='menuTitle mbccontent' onclick="ShowHideMenuD('mbccontent')"></div>
    <ul class="leftNav" id="mbccontent">
        		<li class="icon tougao"><a href="/e/DoInfo/ChangeClass.php?mid=1" title="发表新文章">发表稿件 <img src="/skin/user/img/xin.gif"></a></li>
        <li class="icon article"><a href="/e/DoInfo/ListInfo.php?mid=1" title="已发布的文章">我的文章</a></li>
		<li class="icon paiban"><a href="/about/paiban.html" title="专用文字排版工具" target="_blank">排版工具</a></li>
           </ul>
    <!-- //资料设置 -->
    <div class='menuTitle mbcconfig' onclick="ShowHideMenuD('mbcconfig')"></div>
    <ul class="leftNav" id="mbcconfig">
        <li class="icon myinfo"><a href="/e/member/EditInfo/">基本资料</a></li>
		<li class="icon myconfig"><a href="/e/member/EditInfo/EditSafeInfo.php">邮箱/密码</a></li>
       <li class="icon zndx"><a href="/e/member/msg/">站内短信</a></li>
		<li class="icon hylb"><a href="/e/member/friend/">好友列表</a></li>
    </ul>
    <!-- //其它设置 -->
  	<div class='menuTitle mbcapp' onclick="ShowHideMenuD('mbcapp')"></div>
    <ul class="leftNav" id="mbcapp">
	    <li class="sitemap"><a href="/sitemap.html" title="网站地图" target="_blank">网站地图</a></li>
		<li class="icon zhinan"><a href="/about/tougao.html" title="投稿帮助" target="_blank">投稿指南</a></li>
        <li class="icon contact"><a href="/about/contact.html" title="联系站长" target="_blank">联系我们</a></li>
    </ul>
    <hr width="94%" class="dotted" />
	<div style="margin: 15px auto;">
	<a href='http://wpa.qq.com/msgrd?v=3&uin=<?=$public_r['add_www_92game_net_qq']?>&site=qq&menu=yes' target="_blank"><img src="/skin/user/img/calendar_button.gif" title="点击这里，开始问题咨询" border="0"></a></div>
  </div>
</div>
<script language="javascript" type="text/javascript">
function ShowHideMenuD(mid){if($("#"+mid).css("display") == 'block') {$("#"+mid).hide(200);}else {$("#"+mid).show(200);}}
</script>
