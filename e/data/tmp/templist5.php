<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="must-revalidate,no-cache,no-transform">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<link rel="shortcut icon" href="http://<?=$public_r['add_www_92game_net_domain']?>/favicon.ico" type="image/x-icon" />
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="application-name" content="<?=$public_r['add_www_92game_net_name']?>">
<title><?=ReturnClassAddField(0,'titleseo')?> [!--pagetitle--]-<?=$public_r['add_www_92game_net_name']?></title>
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--pagedes--]" />
<meta http-equiv="Cache-Control" content="must-revalidate,no-cache" />
<link href="/skin/css.css" rel="stylesheet" type="text/css"/>
<script src="/skin/jquery.js" type="text/javascript"></script>
</head>
<body class="bg">
<div id="tipswindows"></div>
<div id="pubilc-menu">
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select classname,classid from [!db.pre!]enewsclass where bclassid='0' and showclass='0' order by myorder ASC",100,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<dl>
<dt><a href="/list/<?=$bqr[classid]?>.html"><?=$bqr[classname]?></a></dt>
    <dd>
	<?php
    $dh=$empire->query("select classname,classid from  {$dbtbpre}enewsclass where bclassid='".$bqr['classid']."' and showclass='0' order by myorder ASC");   
    while($dhr=$empire->fetch($dh)) 
	{
	echo '<a href="/list/'.$dhr[classid].'.html">'.$dhr[classname].'</a>';
	}
	?> 
</dd>
</dl>
 <?php
}
}
?>
<div class="public-menu-go-top"><a href="javascript:;"></a></div>
</div>
<header>
    <a href="/" class="logo"><img width="200px" src="/skin/logo.png"></a>
    <a href="#" id="icon-menu"></a>
</header>
<nav>
<a href='/'>首页</a>
<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select classname,classid from [!db.pre!]enewsclass where bclassid='0' and showclass='0' order by myorder ASC  limit 9",100,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<a href="/list/<?=$bqr[classid]?>.html"><?=esub($bqr[classname],4)?></a>
<?if($bqno==4){echo '</nav><nav>';}?>
<?php
}
}
?>
</nav>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/[!--self.classid--].html">[!--class.name--]</a></span>
	<span class="fr"></span>
	</dt>
	<div class="aff"><? @sys_GetAd(9);?></div>
    <dd class="list">
	<ul id="list">
		<? @sys_GetEcmsInfo('selfinfo',20,0,0,0,14,0);?>
    </ul>
    </dd>
<div class="page">
	<a href="javascript:getMoreSortAppInfo()" id="more">点击加载更多内容&nbsp;&nbsp;&darr;</a>
	<a id="noMore" style="display:none">全部加载完了</a>
	<a id="loading" style="display:none"><img src="/skin/loader.gif"></a>
</div>
</dl>
<input id="pageNo" type="hidden" value="1" />
<input id="pageCnt" type="hidden" value="<?php $num=$empire->gettotal("select count(*) as total from {$dbtbpre}ecms_news where classid='".$GLOBALS[navclassid]."'"); echo $totalpage=ceil($num/20);?>" /> 
<input id="classid" type="hidden" value="[!--self.classid--],0" />
<input id="line" type="hidden" value="20" />
<script type="text/javascript" src="/skin/list.js"></script>
<footer>
    <div class="meiwen">
        <a href="http://<?=$public_r['add_www_92game_net_domain']?>/?url=m">电脑版</a>
		<a href="/#one1" onclick="setTab('one',1)">最近更新</a>
        <a href="/#one2" onclick="setTab('one',2)">推荐阅读</a>
        <a href="#">返回头部</a>
    </div>
    <div class="copyright">
	<?=$public_r['add_www_92game_net_by']?>
    </div>
</footer>
<span style='display:none;'>#第三方统计代码</span>
</body>
</html>