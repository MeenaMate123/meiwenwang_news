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
<title>[!--pagetitle--]</title>
<meta name="keywords" content="[!--pagekeywords--]" />
<meta name="description" content="[!--pagedescription--]" />
<meta http-equiv="Cache-Control" content="must-revalidate,no-cache" />
<link href="/skin/css.css" rel="stylesheet" type="text/css"/>
<script src="/skin/jquery.js" type="text/javascript"></script>
<script src="/skin/swipeSlide.min.js" type="text/javascript"></script>
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
<div class="bwslide" id="slide3">
    <ul>
	<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',3,18,1,'firsttitle=1','newstime DESC');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
	<li><a href='/show/<?=$bqr['id']?>.html'><img src='<?=$bqr['titlepic']?>' alt='<?=$bqr['title']?>'></a></li>
	<?php
}
}
?>
	</ul>
    <div id='dot_main'></div>
	<div class="dot"><?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',3,18,1,'firsttitle=1','newstime DESC');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?><span></span><?php
}
}
?></div>
	<div class="dot_title"></div> 
</div>
<script type="text/javascript">
$('#slide3').swipeSlide({
continuousScroll: true,speed: 3000,transitionType: 'cubic-bezier(0.22, 0.69, 0.72, 0.88)'}, 
function(i) {
$('.dot').children().eq(i).addClass('cur').siblings().removeClass('cur');link=$('#slide3 li').eq(i).find("a").attr("href");$(".dot_title").text($('#slide3 li').eq(i).find("img").attr("alt"));});
</script>
<div class="meiwen_tab" id="meiwen_tab">
	<div class="menu">
	<ul>
	<span id="one1" onclick="setTab('one',1)">今日更新</span>
	<span id="one2" onclick="setTab('one',2)">推荐阅读</span>
	<span id="one3" onclick="setTab('one',3)">本周热门</span>
	</ul></div>
	<div class="menudiv">
		<div id="con_one_1">
        <dd class="indexlist">
		<ul>
		<? @sys_GetEcmsInfo('news',10,0,0,18,14,0,'','newstime DESC');?>
		</ul></dd>
		</div>
		<div id="con_one_2" style="display:none;">
        <dd class="indexlist">
		<ul>
		<? @sys_GetEcmsInfo('news',10,0,0,18,14,0,'','diggtop DESC');?>
		</ul></dd>
		</div>
		<div id="con_one_3" style="display:none;">
        <dd class="indexlist"><ul>
		<? @sys_GetEcmsInfo('news',10,0,0,18,14,0,'','zclick DESC');?>
		</ul></dd>
		</div>
	</div>
</div>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/1.html"><?=$class_r[1]['classname']?></a></span>
	<span class="fr"><? @sys_ShowClassByTemp(1,13,0,3);?></span>
	</dt>
     <dd class="list">
        <ul><? @sys_GetEcmsInfo(1,8,0,0,0,14,0);?></ul>
    </dd>
</dl>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/2.html"><?=$class_r[2]['classname']?></a></span>
	<span class="fr"><? @sys_ShowClassByTemp(2,13,0,3);?></span>
	</dt>
     <dd class="list">
        <ul><? @sys_GetEcmsInfo(2,8,0,0,0,14,0);?></ul>
    </dd>
</dl>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/3.html"><?=$class_r[3]['classname']?></a></span>
	<span class="fr"><? @sys_ShowClassByTemp(3,13,0,3);?></span>
	</dt>
     <dd class="list">
        <ul><? @sys_GetEcmsInfo(3,8,0,0,0,14,0);?></ul>
    </dd>
</dl>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/4.html"><?=$class_r[4]['classname']?></a></span>
	<span class="fr"><? @sys_ShowClassByTemp(4,13,0,3);?></span>
	</dt>
      <dd class="list">
        <ul><? @sys_GetEcmsInfo(4,8,0,0,0,14,0);?></ul>
    </dd>
</dl>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/5.html"><?=$class_r[5]['classname']?></a></span>
	<span class="fr"><? @sys_ShowClassByTemp(5,13,0,3);?></span>
	</dt>
     <dd class="list">
        <ul><? @sys_GetEcmsInfo(5,8,0,0,0,14,0);?></ul>
    </dd>
</dl>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/6.html"><?=$class_r[6]['classname']?></a></span>
	<span class="fr"><? @sys_ShowClassByTemp(6,13,0,3);?></span>
	</dt>
     <dd class="list">
        <ul><? @sys_GetEcmsInfo(6,8,0,0,0,14,0);?></ul>
    </dd>
</dl>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/7.html"><?=$class_r[7]['classname']?></a></span>
	<span class="fr"><? @sys_ShowClassByTemp(7,13,0,3);?></span>
	</dt>
     <dd class="list">
        <ul><? @sys_GetEcmsInfo(7,8,0,0,0,14,0);?></ul>
    </dd>
</dl>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/8.html"><?=$class_r[8]['classname']?></a></span>
	<span class="fr"><? @sys_ShowClassByTemp(8,13,0,3);?></span>
	</dt>
     <dd class="list">
        <ul><? @sys_GetEcmsInfo(8,8,0,0,0,14,0);?></ul>
    </dd>
</dl>
<dl class="article-list">
    <dt class="title">
	<span class="fl"><a href="/list/9.html"><?=$class_r[9]['classname']?></a></span>
	<span class="fr"><? @sys_ShowClassByTemp(9,13,0,3);?></span>
	</dt>
     <dd class="list">
        <ul><? @sys_GetEcmsInfo(9,8,0,0,0,14,0);?></ul>
    </dd>
</dl>
<dl class="article-list">
    <dt class="title">美图心语</dt>
    <dd class="pic">
	<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',9,18,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
        <ul><li><a href='/show/<?=$bqr['id']?>.html' class='m'><img src='<?=$bqr['titlepic']?>' width='500px' height='330px'><span><p><?=$bqr['title']?></p></span></a></li>
		<?php
}
}
?>
		</ul>
    </dd>
	<div class="aff"><? @sys_GetAd(9);?></div>
</dl>
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