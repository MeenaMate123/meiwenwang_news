<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<meta http-equiv="Cache-Control" content="no-transform " />
<title><?=$spacename?> - <?=$public_r['sitename']?></title>
<meta content="<?=$spacename?>" name="keywords" />
<meta content="<?=$spacename?>" name="description" />
<link rel="stylesheet" type="text/css" href="<?=$public_r['newsurl']?>skin/user/s/css.css" />
<script type="text/javascript" src="<?=$public_r['newsurl']?>skin/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=$public_r['newsurl']?>skin/user/s/js.js"></script>
</head>
<body>
<div class="tool_warp">
  <div id="tool">
    <div id="tool_logo"><a href="<?=$public_r['newsurl']?>"><script>hello()</script>欢迎访问<?=$public_r['add_www_92game_net_name']?>！</a></div>
    <div class="tool_user">
<div class="youke">
    <?php if($myuserid){ ?>
    <b><?=$myusername?></b>
	<a href="<?=$public_r['newsurl']?>user/<?=$user[userid]?>/" target="_blank">主页</a>
    <a href="<?=$public_r['newsurl']?>e/member/cp/" target="_blank" target="_blank">会员中心</a>
    <a href="<?=$public_r['newsurl']?>e/member/doaction.php?enews=exit" target="_blank">[退出]</a>
    <? } else { ?>
    <b>游客</b>  
    <a href="<?=$public_r['newsurl']?>e/member/register/index.php?tobind=0&groupid=1" target="_blank">注册</a>
     <a href="<?=$public_r['newsurl']?>e/member/login/" target="_blank">登录</a>
    <?}?>			
    <a href="<?=$public_r['newsurl']?>new" target="_blank" class="cai">随便逛逛</a>
     </div>
    </div>
  </div>
</div>
<div class="snowbg">
<div id="main">
<div id="main_left">
  <div class="user_pic"> 
   <a href="<?=$public_r['newsurl']?>user/<?=$userid?>/"><img src="<?=$userpic?>" title="<?=$username?>的空间" width="188" height="188" /></a></div>
    <div class="user_info">
       <h1><a href="<?=$public_r['newsurl']?>user/<?=$userid?>/"><?=$username?></a></h1>
       <p> 		   <?=nl2br($usersay)?>
           </p>
    </div>
    <div class="user_menu"> 	
    <a href="<?=$public_r['newsurl']?>" class="user_dh"><span>首页</span></a>	
       <a href="<?=$public_r['newsurl']?>e/member/friend/add/?fname=<?=$username?>" class="user_dh" target="_blank"><span>加友</span></a>
       <a href="<?=$public_r['newsurl']?>e/member/msg/AddMsg/?username=<?=$username?>" class="user_dh" target="_blank"><span>留言</span></a>
	   <a href="<?=$public_r['newsurl']?>e/member/cp/" class="user_dh"><span>管理</span></a>
	</div>
    <div class="user_fans">
	   <h2>空间访问量:<strong> <?=$addur[viewstats]?> </strong>次</h2>
	</div>
  <div class="user_music">
  <h2>音乐列表</h2>
   <embed src="<?=$public_r['add_www_92game_net_mp3']?>" 
   type="application/x-shockwave-flash" width="229" height="300" wmode="opaque">
   </div>
  <div class="user_visitor">
     <h2>TA的好友</h2>
      <ul class="avatar_list">
	  <?=$hylist?>  
         </ul>
  </div>
</div>
		<div id="main_right">
			<div class="user_right" id="content_list"> 
		        <?=$newslist?>  
			</div>
	<?php if($num!=0){ ?>
	<div class="clickmore">
		<a href="javascript:getMoreSortAppInfo()" id="morenews">点击加载更多&nbsp;&nbsp;&darr;</a>
		<a id="noMore" style="display:none">全部加载完了</a>
		<a id="loading" style="display:none"><img src="<?=$public_r['newsurl']?>skin/img/loader.gif"></a>
	</div>	
	<? } else{ ?>
		<div class="clickmore">
		这个人很懒，一条内容都还没发布过 (┬＿┬)
	</div>
	<? } ?>
</div>
</div>
<input id="pageNo" type="hidden" value="1" />
<input id="pageCnt" type="hidden" value="<?=$totalpage=ceil($num/10);?>" />
<input id="userid" type="hidden" value="<?=$userid?>" />
<div id="footer"><?=$public_r['add_www_92game_net_by']?>
</div></div>
</body>
</html>