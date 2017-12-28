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
<title><?=$grpagetitle?>-<?=$public_r['add_www_92game_net_name']?></title>
<meta name="keywords" content="<?=$ecms_gr[keyboard]?>" />
<meta name="description" content="<?=esub(htmlspecialchars(strip_tags($navinfor[smalltext])),240)?>" />
<meta http-equiv="Cache-Control" content="must-revalidate,no-cache" />
<link href="/skin/css.css" rel="stylesheet" type="text/css"/>
<script src="/skin/jquery.js" type="text/javascript"></script>
<script src="/skin/show.js" type="text/javascript"></script>
<script type="text/javascript">
var status0=''; 
var curfontsize=12; 
var curlineheight=16; 
function turnsmall(){if(curfontsize>10){ 
document.getElementById('art_content').style.fontSize=(--curfontsize)+'pt'; 
document.getElementById('art_content').style.lineHeight=(--curlineheight)+'pt'; }} 
function turnbig(){if(curfontsize<14){ 
document.getElementById('art_content').style.fontSize=(++curfontsize)+'pt'; 
document.getElementById('art_content').style.lineHeight=(++curlineheight)+'pt'; }}
</script>
</head>
<body class="bg-gary">
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
<div class="breadcrumb"><a href="/">首页</a><a href="/list/<?=$ecms_gr[classid]?>.html"><?=$class_r[$ecms_gr[classid]][classname]?></a><?=$grpagetitle?></div>
	<div class="clear"></div>
  <h1 class="article-title"><?=$grpagetitle?></h1>
  <div class="article-base-info">发表时间：<?=date('Y-m-d',$ecms_gr[newstime])?>&nbsp;&nbsp;热度：<script src="http://<?=$public_r['add_www_92game_net_domain']?>/e/public/ViewClick/?classid=<?=$ecms_gr[classid]?>&id=<?=$ecms_gr[id]?>&addclick=1&down=8"></script>℃
<a href="javascript:turnsmall()" class="turn small"></a><a href="javascript:turnbig()" class="turn big"></a></div>
  <div class="article-content" id="art_content">
  <?=str_replace(array("[!--empirenews.page--]"),array(""),$navinfor[newstext])?>
  </div>
  <div class="shareli"><strong>美文.分享</strong></div>
<div class="article-share">
  <script type="text/javascript">
if(navigator.userAgent.indexOf('UCBrowser') > -1) {
    var CONFIG = {};
        CONFIG['wx_share_link'] = '<?=$public_r['add_www_92game_net_domain_m']?>/photo/<?=$ecms_gr[id]?>.html',
        CONFIG['wx_share_title'] = '<?=$ecms_gr[title]?> 来自：<?=$public_r['add_www_92game_net_name']?>',
        CONFIG['wx_share_desc'] = '<?php if($navinfor[smalltext]){ echo ''.esub(htmlspecialchars(strip_tags($navinfor[smalltext])),130).''; } else { echo ''.$navinfor[title].'';} ?>',
        CONFIG['img_url'] = '';
document.writeln("<span class='ucshare'><a href='javascript:;' class='share-wxtimeline'></a><center id='digg<?=$ecms_gr[id]?>'><a class='good' href=javascript:Digg('digg',<?=$ecms_gr[id]?>);></a><p><script src='http://<?=$public_r['add_www_92game_net_domain']?>/e/public/ViewClick/?classid=<?=$ecms_gr[classid]?>&id=<?=$ecms_gr[id]?>&down=5'><"+"/script>人喜欢</p></center><a href='javascript:;' class='share-wxfriend'></a></span>");
document.writeln('<script type="text/javascript" src="/skin/wx_share.js"><'+'/script>')
}
 $(function () {
             $(".share a").live("click",function(){
                shardContent($(this),'http://<?=$public_r['add_www_92game_net_domain'].str_replace(array("".$public_r['newsurl'].""),array("/"),$navinfor[titleurl])?>','<?=$grpagetitle?>','<?=empty($ecms_gr[titlepic])?$public_r[newsurl].'e/data/images/notimg.gif':$ecms_gr[titlepic]?>','10');
                return false;
            });
 });
</script>
<span class="share">				
					<a href="javascript:;" class="shareWeibo" title="分享到新浪微博"></a>
					<center id='digg<?=$ecms_gr[id]?>'><a class="good" href="javascript:Digg('digg',<?=$ecms_gr[id]?>);"></a><p><script src='http://<?=$public_r['add_www_92game_net_domain']?>/e/public/ViewClick/?classid=<?=$ecms_gr[classid]?>&id=<?=$ecms_gr[id]?>&down=5'></script>人喜欢</p></center>
					<a href="javascript:;" class="shareQZone"  title="分享到QQ空间"></a>
</span>
</div>
<div class="clear"></div>
<div class="article-next-prev">
<?php
$newspre = $empire->fetch1("select * from {$dbtbpre}ecms_news where classid=$GLOBALS[navclassid] and id<$navinfor[id] order by id desc limit 1;");
$newsnext = $empire->fetch1("select * from {$dbtbpre}ecms_news where classid=$GLOBALS[navclassid] and id>$navinfor[id] order by id asc limit 1;");
if($newspre[id]){
        echo "<a href='/show/".$newspre[id].".html' class='fl'>上一篇</a>";
}else{
        echo "<a href='/list/".$GLOBALS[navclassid].".html' class='fl'>没有了</a>";
}
if($newsnext[id]){
        echo "<a href='/show/".$newsnext[id].".html' class='fr'>下一篇</a>";
}else{
        echo "<a href='/list/".$GLOBALS[navclassid].".html' class='fr'>没有了</a>";
}
?>
</div>
<div class="clear"></div>
<div  class="aff"><script type="text/javascript" src="http://<?=$public_r['add_www_92game_net_domain']?>/d/js/acmsd/thea9.js"></script></div>
<div class="clear"></div>
<div class="article-comment-box">
    <dd class="pinglun">
		<div id="SOHUCS" sid="<?=$ecms_gr[classid]?>_<?=$ecms_gr[id]?>"></div>
	</dd>
</div>
<div class="clear"></div>
<dl class="other-article-list">
    <dt>猜你喜欢</dt>
	<dd>
	<ul id="list">
	<? @sys_GetEcmsInfo('selfinfo',5,0,0,0,14,0,'','rand()');?>
	 </ul>
	</dd>
	<div class="page">
	<a href="javascript:getMoreSortAppInfo()" id="more">点击加载更多内容&nbsp;&nbsp;&darr;</a>
	<a id="noMore" style="display:none">全部加载完了</a>
	<a id="loading" style="display:none"><img src="/skin/loader.gif"></a>
</div>
</dl>
<input id="pageNo" type="hidden" value="1" />
<input id="pageCnt" type="hidden" value="5" /> 
<input id="classid" type="hidden" value="<?=$ecms_gr[classid]?>,0" />
<input id="line" type="hidden" value="5" />
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
  <script src="/skin/pl.js" type="text/javascript"></script>