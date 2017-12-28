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
<title>[!--pagetitle--]</title>
<meta name="keywords" content="[!--pagekey--]" />
<meta name="description" content="[!--pagedes--]" />
<script src="http://siteapp.baidu.com/static/webappservice/uaredirect.js" type="text/javascript"></script>
<script type="text/javascript">uaredirect("<?=$public_r['add_www_92game_net_phone']?>");</script>
<link rel="stylesheet" type="text/css" href="[!--news.url--]skin/css/style.css" />
<script type="text/javascript" src="[!--news.url--]skin/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="[!--news.url--]skin/js/global.js"></script>
</head>
<body>
<div id="header">
<div id="toolbar"><div class="tool">
     <div class="left fl"><a href="<?=$public_r['add_www_92game_net_phone']?>" target="_blank">手机访问</a><a href="[!--news.url--]new" target="_blank">最新100</a><a href="[!--news.url--]pic" target="_blank">美图心语</a><a href="[!--news.url--]sitemap.html" target="_blank">MAP</a><a href="[!--news.url--]tag.html" target="_blank">TAG</a></div>
	 <div class="right fr"><script>hello()</script>
	 欢迎访问<?=$public_r['add_www_92game_net_name']?>！
	 <a class="ico-25 fr" href="[!--news.url--]zm.php">保存到桌面</a></div>
</div></div>
<div class="head">
	 <div class="logo fl"><a href="[!--news.url--]"><img src="[!--news.url--]skin/img/logo.png" width="280" height="60" alt="[!--pagetitle--]"/></a></div>
	 <div class="left fr">
	 <div class="serach fl">
	 <form class="search-form" id="search_form" action="[!--news.url--]e/search/" method="post" name="searchform" onsubmit="if(document.getElementById('searchword').value=='请输入搜索内容')return false;">
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
	 <a class="i-marks"  href="javascript:vod(0);" title="加入收藏夹" onclick="favorites('<?=$public_r['add_www_92game_net_name']?>','[!--news.url--]')" ></a>
	 <a class="tougao_btn fr i-write" href="[!--news.url--]e/DoInfo/ChangeClass.php?mid=1" title="在线投稿" target="_blank">在线投稿</a>
	 </div>
	 </div><div class="cl"></div>
</div>
</div>
<div class="nav"><ul>
     <li><a class="ico-01" href="[!--news.url--]" target="_self">首页</a></li>
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
	 <li><a class="iconew" href="[!--news.url--]new">最近更新</a></li></ul>
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
<script type="text/javascript" src="[!--news.url--]skin/js/index.js"></script>
<div class="container">
<div class="container-bd">
<div class="main-wrap">
     <div class="slide fl">
         <div id="slideBox" class="slideBox">
         <div class="hd"><ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',6,18,1,'firsttitle=1');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?><li></li><?php
}
}
?>	
		 </ul></div>
         <div class="bd"><ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',6,18,1,'firsttitle=1');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="350" height="290" alt="<?=$bqr['title']?>"/>
		 <div class="text"><div class="bt"><span class="pa"><?=$bqr['title']?></span><span class="clear"></span></div>
		 <div class="btxt"><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),120)?>...</div></div></a></li>
		 <?php
}
}
?>	 
</ul></div>
         </div><script type="text/javascript">jQuery(".slideBox").slide( { mainCell:".bd ul",effect:"left",autoPlay:true} );</script>
     </div>
     <div class="new fl">
	 	 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',1,18,0,'firsttitle=2');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
         <div class="top"><h2><a class="ico-02" href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></h2><p><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),120)?>...</p>
</div>
 <?php
}
}
?>
         <div class="box">
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',7,18,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span>[<a href="<?=$bqsr[classurl]?>" target="_blank"><?=$bqsr[classname]?></a>]</span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		  <?php
}
}
?>
</ul></div>
	 </div>
     <div class="Ruser">
     <div class="user_login" id="show_userinfo"></div>
	 <script type="text/javascript" src="[!--news.url--]e/member/ajaxlog/?loadjs=1"></script>
         <div class="notice">
		 <div class="title"><h3><a href="<?=$public_r['newsurl'].$class_r[69]['classpath']?>">网站公告</a></h3><span><a href="[!--news.url--]about/contact.html" target="_blank">联系我们</a></span></div>
		 <ul class="box">
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(69,4,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<li class="ico-06" ><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
<?php
}
}
?>
</ul>
		 </div>
     </div>
	 <div class ="cl"></div>
</div><!-- //main-wrap -->
<? @sys_GetAd(1);?>
    <div class="main-wrap">
	  <div class="main-left">
		 <div class="title">
		 <span><? @sys_ShowClassByTemp(1,1,0,8);?></span>
		 <h3 class="ico-07"><a href="<?=$public_r['newsurl'].$class_r[1]['classpath']?>"><?=$class_r[1]['classname']?></a></h3></div>
		 <div class="category">
		 <div class="item">
		 <div class="top">
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(1,1,0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="120" height="90" title="<?=$bqr['title']?>" alt="<?=$bqr['title']?>"/></a>
		 <h4><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></h4><p><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),60)?>...</p>
		 <?php
}
}
?>
		 </div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(1,8,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class="time"><?=date('m-d',$bqr[newstime])?> </span><span class="list">[<a href="<?=$bqsr[classurl]?>"  class="item-color"><?=$bqsr[classname]?></a>]</span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		  <?php
}
}
?>
		 </ul></div>
		 <div class="item">
		 <div class="top">	
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(1,'1,1',0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="120" height="90" title="<?=$bqr['title']?>" alt="<?=$bqr['title']?>"/></a>
		 <h4><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></h4><p><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),60)?>...</p>
		 <?php
}
}
?>
		 </div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(1,'8,8',0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class="time"><?=date('m-d',$bqr[newstime])?> </span><span class="list">[<a href="<?=$bqsr[classurl]?>"  class="item-color"><?=$bqsr[classname]?></a>]</span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		  <?php
}
}
?>
		 </ul>
		 </div></div>
      </div>
	<div class="main-right">
	<div class="ranking">
		 <div class="title"><h3>今日热门</h3></div>
		 <ul>
		  <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',12,18,0,'','rclick DESC');
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
</ul></div>
	</div>
	</div>
    <div class="main-wrap">
	  <div class="member-left">
	     <div class="title"><h3 class="ico-07">驻站作者</h3><span style="padding-right:10px;">怎么在这出现？上传头像 / 最近登陆时间排序</span></div>
		 <div class="member">
		 <div class="info">
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select a.userid,a.username,b.userpic from [!db.pre!]enewsmember a,[!db.pre!]enewsmemberadd b where a.userid=b.userid and userpic!="" order by lasttime desc limit 18',10,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>        
<li><a href="[!--news.url--]user/<?=$bqr[userid]?>" target="_blank"><img src="<?=$bqr[userpic]?>" alt="<?=$bqr[username]?>" width="60" height="60" /><h5><?=$bqr[username]?></h5></a></li>
<?php
}
}
?>
		
		 </div></div>
	  </div>
      <div class="member-right">
		 <div class="scores">
		 <div class="title"><h3>积分总榜</h3></div>
		 <ul>  
		   <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select a.sex,b.userid,b.username,b.userfen from [!db.pre!]enewsmemberadd a,[!db.pre!]enewsmember b where a.userid=b.userid order by userfen desc limit 7',10,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>  
		 <li class='ico-sex<?=$bqr[sex]?>'>
		 <span><?=$bqr[userfen]?><i class="ico-10"></i></span><a href="[!--news.url--]user/<?=$bqr[userid]?>" title="<?=$bqr[username]?>" target='_blank'><?=$bqr[username]?></a></li>
		 <?php
}
}
?>	
		 </ul>
		 </div></div>
	</div>
<? @sys_GetAd(2);?>
    <div class="main-wrap">
     <div class="main-left">
		 <div class="title">
		 <span><? @sys_ShowClassByTemp(3,1,0,8);?></span>
		 <h3 class="ico-07"><a href="<?=$public_r['newsurl'].$class_r[3]['classpath']?>"><?=$class_r[3]['classname']?></a></h3></div>
		 <div class="category">
		 <div class="item">
		 <div class="top">
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(3,1,0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="120" height="90" title="<?=$bqr['title']?>" alt="<?=$bqr['title']?>"/></a>
		 <h4><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></h4><p><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),60)?>...</p>
		 <?php
}
}
?>
		 </div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(3,8,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class="time"><?=date('m-d',$bqr[newstime])?> </span><span class="list">[<a href="<?=$bqsr[classurl]?>"  class="item-color"><?=$bqsr[classname]?></a>]</span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		  <?php
}
}
?>
		 </ul></div>
		 <div class="item">
		 <div class="top">	
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(3,'1,1',0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="120" height="90" title="<?=$bqr['title']?>" alt="<?=$bqr['title']?>"/></a>
		 <h4><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></h4><p><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),60)?>...</p>
		 <?php
}
}
?>
		 </div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(3,'8,8',0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class="time"><?=date('m-d',$bqr[newstime])?> </span><span class="list">[<a href="<?=$bqsr[classurl]?>"  class="item-color"><?=$bqsr[classname]?></a>]</span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		  <?php
}
}
?>
		 </ul>
		 </div></div>
      </div>
	  <div class="main-right">
	<div class="ranking">
		 <div class="title"><h3>周排行榜</h3></div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',12,18,0,'','zclick DESC');
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
</ul></div>
    </div>
	</div>
    <div class="main-wrap">
	  <div class="pic-title"><h3 class="ico-07">美图心语</h3><span style="padding-right:10px;">如果您有好的美文美图，不要忘了分享哦！ 阅读美文丶分享心情丶留住感动瞬间... <a href="[!--news.url--]pic" style="color:#26AA36;padding-left:5px" target="_blank">查看更多</a></span></div>
	  <div id="pic">
	     <div id="picbox" >
		 <table cellspacing="0" cellpadding="3" align="center" border="0">
		 <tr><td id="meiwen_pic1" valign="top">
		     <table width="180" height="140" border="0" cellpadding="2" cellspacing="0">
			 <tr>
			 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',5,18,1,'','onclick DESC');
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
			 <td><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><img src="<?=$bqr['titlepic']?>" width="180" height="140" alt="<?=$bqr['title']?>"/></a><p><?=$bqr['title']?></p>
			 </td>
			 	 <?php
}
}
?>
</tr></table>
		 </td>
        </tr>
		</table>
		</div>
      </div>
	</div>
	<div class="main-wrap">
	 <div class="main-left">
		 <div class="title">
		 <span><? @sys_ShowClassByTemp(7,1,0,8);?></span>
		 <h3 class="ico-07"><a href="<?=$public_r['newsurl'].$class_r[7]['classpath']?>"><?=$class_r[7]['classname']?></a></h3></div>
		 <div class="category">
		 <div class="item">
		 <div class="top">
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(7,1,0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="120" height="90" title="<?=$bqr['title']?>" alt="<?=$bqr['title']?>"/></a>
		 <h4><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></h4><p><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),60)?>...</p>
		 <?php
}
}
?>
		 </div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(7,8,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class="time"><?=date('m-d',$bqr[newstime])?> </span><span class="list">[<a href="<?=$bqsr[classurl]?>"  class="item-color"><?=$bqsr[classname]?></a>]</span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		  <?php
}
}
?>
		 </ul></div>
		 <div class="item">
		 <div class="top">	
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(7,'1,1',0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="120" height="90" title="<?=$bqr['title']?>" alt="<?=$bqr['title']?>"/></a>
		 <h4><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></h4><p><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),60)?>...</p>
		 <?php
}
}
?>
		 </div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(7,'8,8',0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class="time"><?=date('m-d',$bqr[newstime])?> </span><span class="list">[<a href="<?=$bqsr[classurl]?>"  class="item-color"><?=$bqsr[classname]?></a>]</span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		  <?php
}
}
?>
		 </ul>
		 </div></div>
      </div>
	<div class="main-right">
	<div class="ranking">
         <div class="title"><h3>月排行榜</h3></div>
	     <ul>		 
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',12,18,0,'','yclick DESC');
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
		 </ul></div>
	</div>
	</div>
	<div class="main-wrap">
	   <div class="diary-title">
	   <span>根据心情选择：<? @sys_ShowClassByTemp(4,1,0,0);?> </span>
	   <h3 class="ico-07"><a href="<?=$public_r['newsurl'].$class_r[4]['classpath']?>"><?=$class_r[4]['classname']?></a></h3></div>
	    <div class="diary">
	    <div class="one fl"><a href="<?=$public_r['newsurl'].$class_r[4]['classpath']?>" class="pic" target="_blank"></a>
		<div class="diary-list">
		<div class="title"><span><a href="<?=$public_r['newsurl'].$class_r[4]['classpath']?>" target="_blank">更多</a></span>伤感日记本</div>
		<ul class="box">
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(4,'0,7',0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li class='num'><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a><span class="time"><?=date('m-d',$bqr[newstime])?></span></li>
		  <?php
}
}
?>
		</ul></div></div>
		<div class="two fr"><a href="<?=$public_r['newsurl'].$class_r[4]['classpath']?>" class="pic" target="_blank"></a>
		<div class="diary-list">
		<div class="title"><span><a href="<?=$public_r['newsurl'].$class_r[4]['classpath']?>" target="_blank">更多</a></span>情感日记本</div>
		<ul class="box">
		<?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(4,'7,7',0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li class='num'><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a><span class="time"><?=date('m-d',$bqr[newstime])?></span></li>
		  <?php
}
}
?>
		</ul></div></div>
	    </div>
	</div>
<? @sys_GetAd(3);?>
	<div class="main-wrap">
	   <div class="main-left">
		 <div class="title">
		 <span><? @sys_ShowClassByTemp(9,1,0,8);?></span>
		 <h3 class="ico-07"><a href="<?=$public_r['newsurl'].$class_r[9]['classpath']?>"><?=$class_r[9]['classname']?></a></h3></div>
		 <div class="category">
		 <div class="item">
		 <div class="top">
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(9,1,0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="120" height="90" title="<?=$bqr['title']?>" alt="<?=$bqr['title']?>"/></a>
		 <h4><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></h4><p><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),60)?>...</p>
		 <?php
}
}
?>
		 </div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(9,8,0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class="time"><?=date('m-d',$bqr[newstime])?> </span><span class="list">[<a href="<?=$bqsr[classurl]?>"  class="item-color"><?=$bqsr[classname]?></a>]</span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		  <?php
}
}
?>
		 </ul></div>
		 <div class="item">
		 <div class="top">	
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(9,'1,1',0,1);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <a href="<?=$bqsr['titleurl']?>"><img src="<?=$bqr['titlepic']?>" width="120" height="90" title="<?=$bqr['title']?>" alt="<?=$bqr['title']?>"/></a>
		 <h4><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></h4><p><?=esub(htmlspecialchars(strip_tags($bqr[smalltext])),60)?>...</p>
		 <?php
}
}
?>
		 </div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq(9,'8,8',0,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
		 <li><span class="time"><?=date('m-d',$bqr[newstime])?> </span><span class="list">[<a href="<?=$bqsr[classurl]?>"  class="item-color"><?=$bqsr[classname]?></a>]</span><a href="<?=$bqsr['titleurl']?>" title="<?=$bqr['title']?>"><?=$bqr['title']?></a></li>
		  <?php
}
}
?>
		 </ul>
		 </div></div>
      </div>
	<div class="main-right">
	<div class="ranking">
	     <div class="title"><h3>网友最喜欢</h3></div>
		 <ul>
	 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('news',12,18,0,'','diggtop DESC');
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
		 </ul></div>
	</div>
	</div>
<? @sys_GetAd(4);?>
	<div class="main-wrap">
         <div class="link-title"><h3 class="ico-07">友情链接</h3><span><?=$public_r['add_www_92game_net_ltxt']?><a href="[!--news.url--]about/link.html" style="color:#373;" target="_blank">更多链接</a></span></div>
		 <div class="friendlink"><div class="validation"><a href="javascript:;" rel="nofollow" onclick="union()"><img src="[!--news.url--]skin/img/an.png" width="124" height="47" title="安全联盟认证"></a></div>
		 <ul>
		 <?php
$bqno=0;
$ecms_bq_sql=sys_ReturnEcmsLoopBq('select lname,lurl from [!db.pre!]enewslink where checked=1 and classid=1  order by myorder',100,24,0);
if($ecms_bq_sql){
while($bqr=$empire->fetch($ecms_bq_sql)){
$bqsr=sys_ReturnEcmsLoopStext($bqr);
$bqno++;
?>
<li><a href="<?=$bqr[lurl]?>" title="<?=$bqr[lname]?>" target="_blank"><?=$bqr[lname]?></a></li>
<?php
}
}
?></ul></div>
	</div>
</div><div class="c1 container-bottom"></div>
</div>
	<script type="text/javascript" src="[!--news.url--]e/extend/html/"></script>
<script type="text/javascript" src="[!--news.url--]skin/js/gotop.js"></script>
<script type="text/javascript" src="[!--news.url--]d/js/acmsd/thea8.js"></script>
<div class="footer">
    <p class="p_1">
	<a href="[!--news.url--]about/aboutus.html" target="_blank">关于我们</a>|
	<a href="[!--news.url--]about/service.html" target="_blank">服务条款</a>|
	<a href="[!--news.url--]about/contact.html" target="_blank">联系我们</a>|
	<a href="[!--news.url--]about/link.html" target="_blank">友情链接</a>|
	<a href="[!--news.url--]baidunews.xml" target="_blank">RSS订阅</a>|
	<a href="[!--news.url--]sitemap.html" target="_blank">网站地图</a>|
	<a href="[!--news.url--]about/paiban.html" target="_blank"><b>排版工具</b></a>
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
</body>
</html>