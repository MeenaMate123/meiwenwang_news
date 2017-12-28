<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<meta http-equiv="Cache-Control" content="no-transform " />
<title><?=$grpagetitle?>-<?=$class_r[$ecms_gr[classid]][classname]?>-<?=$public_r['add_www_92game_net_name']?></title>
<meta name="keywords" content="<?=$ecms_gr[keyboard]?>" />
<meta name="description" content="<?=esub(htmlspecialchars(strip_tags($navinfor[smalltext])),240)?>" />
<script src="http://siteapp.baidu.com/static/webappservice/uaredirect.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("<?=$public_r['add_www_92game_net_phone']?>show/<?=$ecms_gr[id]?>.html");</script>
<link rel="stylesheet" type="text/css" href="http://demo.52jscn.com/skin/css/style.css" />
<script type="text/javascript" src="http://demo.52jscn.com/skin/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="http://demo.52jscn.com/skin/js/global.js"></script>
</head>
<body>
<div id="header">
<div id="toolbar"><div class="tool">
     <div class="left fl"><a href="<?=$public_r['add_www_92game_net_phone']?>" target="_blank">手机访问</a><a href="http://demo.52jscn.com/new" target="_blank">最新100</a><a href="http://demo.52jscn.com/pic" target="_blank">美图心语</a><a href="http://demo.52jscn.com/sitemap.html" target="_blank">MAP</a><a href="http://demo.52jscn.com/tag.html" target="_blank">TAG</a></div>
	 <div class="right fr"><script>hello()</script>
	 欢迎访问<?=$public_r['add_www_92game_net_name']?>！
	 <a class="ico-25 fr" href="http://demo.52jscn.com/zm.php">保存到桌面</a></div>
</div></div>
<div class="head">
	 <div class="logo fl"><a href="http://demo.52jscn.com/"><img src="http://demo.52jscn.com/skin/img/logo.png" width="280" height="60" alt="<?=$grpagetitle?>"/></a></div>
	 <div class="left fr">
	 <div class="serach fl">
	 <form class="search-form" id="search_form" action="http://demo.52jscn.com/e/search/" method="post" name="searchform" onsubmit="if(document.getElementById('searchword').value=='请输入搜索内容')return false;">
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
	 <a class="i-marks"  href="javascript:vod(0);" title="加入收藏夹" onclick="favorites('<?=$public_r['add_www_92game_net_name']?>','http://demo.52jscn.com/')" ></a>
	 <a class="tougao_btn fr i-write" href="http://demo.52jscn.com/e/DoInfo/ChangeClass.php?mid=1" title="在线投稿" target="_blank">在线投稿</a>
	 </div>
	 </div><div class="cl"></div>
</div>
</div>
<div class="nav"><ul>
     <li><a class="ico-01" href="http://demo.52jscn.com/" target="_self">首页</a></li>
	 	<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select classpath,classname,classid,bclassid from [!db.pre!]enewsclass where bclassid='0' order by myorder ASC limit 0,9",100,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
      <li><a href='<?=$public_r['newsurl'].$bqr['classpath']?>'><?=$bqsr[classname]?></a></li>
	   <?php
}
}
?>
	 <li><a class="iconew" href="http://demo.52jscn.com/new">最近更新</a></li></ul>
</div>
<div class="subnav"><ul>
    	<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq("select classpath,classname,classid,bclassid from [!db.pre!]enewsclass where bclassid!='0' order by onclick DESC limit 0,22",100,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
      <li><a href='<?=$public_r['newsurl'].$bqr['classpath']?>'><?=$bqsr[classname]?></a></li>
	   <?php
}
}
?>
	 </ul>
</div>
<script type="text/javascript" src="http://demo.52jscn.com/skin/js/show.js"></script>
<div class="container list_repeat">
<div class="container-bd list_top">
     <div class="main-wrap">
	 <div class="article-left">
	 <div class="title"><h3>当前位置</h3>：<?=$grurl?> > <a href="http://www.baidu.com/s?wd=<?=$ecms_gr[title]?>-<?=$public_r['add_www_92game_net_name']?>" target="_blank"><?=$ecms_gr[title]?></a></div>
	 <div class="list-item">
	 <div class="content">	 
	 <div class="_title"><h1<?php if($navinfor[firsttitle]!=='0') { echo " class='ico-00'"; }?>><?=$ecms_gr[title]?></h1></div>
	 <div class="info">
	 <span><i class="ico-19"></i>推荐人：<?=$docheckrep[2]?ReplaceWriter($ecms_gr[writer]):$ecms_gr[writer]?></span>
	 <span><i class="ico-20"></i>来源: <?=$docheckrep[1]?ReplaceBefrom($ecms_gr[befrom]):$ecms_gr[befrom]?></span>
	 <span><i class="ico-21"></i>时间: <?=date('Y-m-d H:i',$ecms_gr[newstime])?></span>
	 <span><i class="ico-22"></i>阅读: <script src="http://demo.52jscn.com/e/public/ViewClick/?classid=<?=$ecms_gr[classid]?>&id=<?=$ecms_gr[id]?>&addclick=1&down=8"></script>次</span>
	 <span><i class="ico-23"></i><a href="javascript:doZoom(18);">大</a> <a href="javascript:doZoom(16);">中</a> <a href="javascript:doZoom(14);">小</a></span>
	 </div><!-- info -->
	 <div class="article">
	 <div id="zoomtext" oncopy="copy();">
	 <?php if($navinfor[titlepic]) { ?>
	 <div class='acpic'><a href='<?=$grtitleurl?>' title='<?=$ecms_gr[title]?>' target='_blank'><img src='<?=empty($ecms_gr[titlepic])?$public_r[newsurl].'e/data/images/notimg.gif':$ecms_gr[titlepic]?>' alt='<?=$ecms_gr[title]?>' width='500px' height='330px'/></a></div>
	 <?php } else { ?>
	 <div class='ad-300'><script src="http://demo.52jscn.com/d/js/acmsd/thea6.js"></script></div>
	 <?php } ?>	 
	 <?=strstr($ecms_gr[newstext],'[!--empirenews.page--]')?'[!--newstext--]':$ecms_gr[newstext]?>
	 </div></div></div>
	 <div class="handover">
	 <div class="box">
	   <span class='prev'>
	 <?php
	$next_r=$empire->fetch1("select isurl,titleurl,classid,id,title from {$dbtbpre}ecms_".$class_r[$ecms_gr[classid]][tbname]." where id<$ecms_gr[id] and classid='$ecms_gr[classid]' order by id desc limit 1");
	if(empty($next_r[id]))
	{$infonext="<a href='".$grclassurl."'>返回列表</a>";}
	else
	{
		$nexttitleurl=sys_ReturnBqTitleLink($next_r);
		$infonext="<a href='".$nexttitleurl."'>".$next_r[title]."</a>";
	}
	echo $infonext;
	?>
	  </span>
	  <span class="zan">
              <a href="JavaScript:makeRequest('http://demo.52jscn.com/e/public/digg/?classid=<?=$ecms_gr[classid]?>&id=<?=$ecms_gr[id]?>&dotop=1&doajax=1&ajaxarea=diggnum','EchoReturnedText','GET','');" class="add"><em><b id="diggnum"><script src='http://demo.52jscn.com/e/public/ViewClick/?classid=<?=$ecms_gr[classid]?>&id=<?=$ecms_gr[id]?>&down=5'></script></b> 人喜欢</em></a>
      </span>
	    <span class='next'>
	 <?php
	$next_r=$empire->fetch1("select isurl,titleurl,classid,id,title from {$dbtbpre}ecms_".$class_r[$ecms_gr[classid]][tbname]." where id>$ecms_gr[id] and classid='$ecms_gr[classid]' order by id limit 1");
	if(empty($next_r[id]))
	{$infonext="<a href='".$grclassurl."'>返回列表</a>";}
	else
	{
		$nexttitleurl=sys_ReturnBqTitleLink($next_r);
		$infonext="<a href='".$nexttitleurl."'>".$next_r[title]."</a>";
	}
	echo $infonext;
	?>
	  </span></div>
	 </div>
	 	[!--page.url--]
	 <div class="article_tag">
	 <span class="tags ico-24">标签: <? $a="$navinfor[infotags]";
            $str=str_replace('，', ',', $a);
            $tag='';
            $t= explode(",", $str);
            
                    for($i=0;$i<count($t);$i++)
                    {
                            if($t[$i])
                            {
                                    $tagslink="http://demo.52jscn.com/tags-".urlencode($t[$i]).".html";
                                    $tag.="<a href='$tagslink' target='_blank'  class='tag'>".$t[$i]."</a> ";
                            }
            }
            echo $tag;
 ?></span> 
 <span class="mark">
	 <div class="likeitem">
	 <a class="like" href="javascript:vod(0);" title="收藏本文" onclick="favorites('<?=$ecms_gr[title]?>-<?=$public_r['add_www_92game_net_name']?>',location.href)"> <em class="dolike">收藏本文</em></a>
	 </div>
	 </span>
</div>
 <div class="a680"><script src="http://demo.52jscn.com/d/js/acmsd/thea7.js"></script> </div>
	 <div class="likepic">
	 <div class="top">
	 <h3>你可能也喜欢这些</h3>	
	 <span>	
	 	 <div class="bdsharebuttonbox"><a class="bds_qzone" title="分享到QQ空间" href="javascript:;" data-cmd="qzone"></a><a class="bds_tsina" title="分享到新浪微博" href="javascript:;" data-cmd="tsina"></a><a class="bds_tqq" title="分享到腾讯微博" href="javascript:;" data-cmd="tqq"></a><a class="bds_renren" title="分享到人人网" href="javascript:;" data-cmd="renren"></a><a class="bds_weixin" title="分享到微信" href="javascript:;" data-cmd="weixin"></a><a class="bds_more" href="javascript:;" data-cmd="more"></a></div>
	 </span>
	 </div>
	 <div class="photo">
	 <ul class="box">
	 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',8,0,1,'','rand()');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
	 <li><a href="<?=$bqsr['titleurl']?>"  title="<?=$bqr['title']?>" ><img src="<?=$bqr['titlepic']?>" width="150" height="120" alt="<?=$bqr['title']?>"/><span><?=$bqr['title']?></span></a></li>
	 <?php
}
}
?>
	 </ul>
	 </div>
	 </div>
	 <div id="pinglun">
	 <div class="box">
	<div id="SOHUCS" sid="<?=$ecms_gr[classid]?>_<?=$ecms_gr[id]?>"></div>
	 </div>
	 </div>
  <div class="cl"></div>
</div>
</div>
	 <div class="article-right">
		 <div class="right-item">
		 <div class="title"><h3>热点阅读</h3></div>
		 <div class="box">
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',12,0,0,'','onclick DESC');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class='a<?=$bqno?>'><?=$bqno?></span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		 <?php
}
}
?>
		 </div></div>
		 	<div class="right-item">
		 <div class="title"><h3>网友最爱</h3></div>
		 <div class="box">
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('selfinfo',12,0,0,'','diggtop DESC');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class='a<?=$bqno?>'><?=$bqno?></span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		 <?php
}
}
?>
		 </div></div>
		<div id="float">
		<div class="right-item">
		 <div class="title"><h3>赞助推荐</h3></div>
		 <div class="a250"><script src="http://demo.52jscn.com/d/js/acmsd/thea5.js"></script> </div>
		 </div>
		  </div>
     </div>
     </div>
  </div>
  <div class="c1 container-bottom"></div>
</div>
<script type="text/javascript" src="http://demo.52jscn.com/skin/js/scrollad.js"></script>
<script type="text/javascript" src="http://demo.52jscn.com/skin/js/gotop.js"></script>
<script type="text/javascript" src="http://demo.52jscn.com/d/js/acmsd/thea8.js"></script>
<div class="footer">
    <p class="p_1">
	<a href="http://demo.52jscn.com/about/aboutus.html" target="_blank">关于我们</a>|
	<a href="http://demo.52jscn.com/about/service.html" target="_blank">服务条款</a>|
	<a href="http://demo.52jscn.com/about/contact.html" target="_blank">联系我们</a>|
	<a href="http://demo.52jscn.com/about/link.html" target="_blank">友情链接</a>|
	<a href="http://demo.52jscn.com/baidunews.xml" target="_blank">RSS订阅</a>|
	<a href="http://demo.52jscn.com/sitemap.html" target="_blank">网站地图</a>|
	<a href="http://demo.52jscn.com/about/paiban.html" target="_blank"><b>排版工具</b></a>
</p>
<p class='p_2'>
<?=$public_r['add_www_92game_net_by']?>
</p>
<div class="footer_service">
<p class="p_2">本站所收录作品、热点评论等信息部分来源互联网，目的只是为了系统归纳学习和传递资讯</p>
<p class="p_2">所有作品版权归原创作者所有，与本站立场无关，如不慎侵犯了你的权益，请联系我们告知，我们将做删除处理！</p>
</div>
</div>
<div style="display:none;">
 #第三方统计代码(模版变量)
</div>
<script type="text/javascript" src="http://demo.52jscn.com/skin/js/pl.js"></script>
</body>
</html>