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
<title><?=$public_diyr['pagetitle']?> - <?=$public_r['add_www_92game_net_name']?></title>
<link rel="stylesheet" type="text/css" href="<?=$public_r['newsurl']?>skin/css/style.css" />
<link href="<?=$public_r['newsurl']?>skin/user/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?=$public_r['newsurl']?>skin/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?=$public_r['newsurl']?>skin/js/global.js"></script>
</head>
<body>
<div id="header">
<div id="toolbar"><div class="tool">
     <div class="left fl"></div>
	 <div class="right fr"><script>hello()</script>
	 欢迎访问<?=$public_r['add_www_92game_net_name']?>！
	 <a class="ico-25 fr" href="<?=$public_r['newsurl']?>zm.php">保存到桌面</a></div>
</div></div>
<div class="head">
	 <div class="logo fl"><a href="<?=$public_r['newsurl']?>"><img src="<?=$public_r['newsurl']?>skin/img/logo.png" width="280" height="60" alt="[!--pagetitle--]"/></a></div>
	 <div class="left fr">
	 <div class="serach fl">
	 <form class="search-form" id="search_form" action="<?=$public_r['newsurl']?>e/search/" method="post" name="searchform" onsubmit="if(document.getElementById('searchword').value=='请输入搜索内容')return false;">
	 <input type="hidden" name="show" value="title,keyboard" />
	 <input type="hidden" name="tempid" value="1" />
	 <input type="text" name="keyboard" id="q" value="" style="color: rgb(153, 153, 153);" onwebkitspeechchange="jQuery(this).closest('form').submit();" x-webkit-speech=""   onclick="clearCname()" class="search_k fl">
	 <button type="submit" onClick="return dosearch($('#q').val());" class="search_s fl">搜索</button>
	 </form>
	 </div>
	 <div class="right fr">
	 <a class="s-weibo" href="<?=$public_r['add_www_92game_net_xlwb']?>" title="关注新浪微博" target="_blank"></a>
	 <a class="t-weibo" href="<?=$public_r['add_www_92game_net_txwb']?>" title="关注腾讯微博" target="_blank"></a>
	 <a class="i-qzone" href="<?=$public_r['add_www_92game_net_qqkj']?>" title="关注认证空间" target="_blank"></a>
	 <a class="i-marks"  href="javascript:vod(0);" title="加入收藏夹" onclick="favorites('<?=$public_r['add_www_92game_net_name']?>','<?=$public_r['newsurl']?>')" ></a>
	 <a class="tougao_btn fr i-write" href="<?=$public_r['newsurl']?>e/tg" title="在线投稿" target="_blank">在线投稿</a>
	 </div>
	 </div><div class="cl"></div>
</div>
</div>
<div class="nav">
<ul>
	 <?php
	 echo "<li><a href='".$public_r['newsurl']."' target='_blank'>首页</a></li>";
     $bclass=$empire->query("select classpath,classname from  {$dbtbpre}enewsclass where bclassid='0' order by myorder ASC limit 9");   
     while($bcr=$empire->fetch($bclass)) { 
	 echo "<li><a href='".$public_r['newsurl'].$bcr['classpath']."' target='_blank'>".$bcr[classname]."</a></li>";
	 } 
	 echo "<li><a href='".$public_r['newsurl']."new' target='_blank' class='iconew'>最近更新</a></li>";
	?> 
</ul>
</div>


