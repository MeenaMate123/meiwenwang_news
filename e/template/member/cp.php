<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='会员中心';
require(ECMS_PATH.'e/template/member/head.user.php');
//好友量
$haoyou="select count(*) as total from {$dbtbpre}enewshy where userid='$user[userid]'";
$hynum=$empire->gettotal($haoyou);
//文档量
$newsnum="select count(*) as total from {$dbtbpre}ecms_news where userid='$user[userid]'";
$wznum=$empire->gettotal($newsnum);
//是否有短消息
$msgnum="select count(*) as total from {$dbtbpre}enewsqmsg where to_username='$user[username]'";
$dxnum=$empire->gettotal($msgnum);
$havemsg="短消息 <span style='color:#E17D32;'>".$dxnum."</span> 条";
if($user[havemsg]){ $havemsg="<span style='color:#f00;'>您有新消息</span>  <img  src='/skin/img/pm.gif'>"; }
//交友宣言
$saytext=$addr['saytext']?$addr['saytext']:'您还未设置交友宣言，用一句话展现下自己吧！<a href=/e/member/EditInfo/>[立即设置]</a>';
//注册时间
$registertime=eReturnMemberRegtime($r['registertime'],"Y-m-d");
//最新文档
$news=$empire->query("select a.newstime,a.title,a.titleurl,b.userid,b.username from {$dbtbpre}ecms_news a,{$dbtbpre}enewsmember b where a.userid=b.userid order by newstime DESC limit 10"); 
//最新会员
$userlist=$empire->query("select a.userid,a.username,b.userpic from {$dbtbpre}enewsmember a,{$dbtbpre}enewsmemberadd b where a.userid=b.userid order by userid desc limit 12");  
?>
<div class="wrapper lineT">
  <div class="mainBox">
    <div class="main">
        <?php require(ECMS_PATH.'e/template/member/left.user.php'); ?>
      <div class="dedeCenter" id="personal">
        <!--个人信息 -->
        <div class="message">
         <div class="visualize fLeft">
          	 <img class="mB10" src="<?=$userpic?>" width="150" height="150" />
             <div class="clear"></div>
         </div>
         <div class="datum fLeft mT10">
             <h3 class="userName" style="color: #338815;"><?=$user[username]?><span class='corp'><em class='mL10'><?=$level_r[$r[groupid]][groupname]?></em></span>
              <em style="padding-left:10px;" ><a class="icon mySetting" style="color:#999999;" href="/e/member/EditInfo/">个人资料</a> | <a  style="color:#999999;" href="/e/member/EditInfo/EditSafeInfo.php">密码安全</a></em>
             </h3>
			<em style="color:#9DB981;height:25px;line-height:30px;"><?=$saytext?></em>
             <div class="userState mTB10" style="margin-top:5px; margin-bottom: 5px;">
		     <span class="fLeft" style="color:#999999;">你目前的身份是：<?=$level_r[$r[groupid]][groupname]?> ★ 会员积分：<?=$r[userfen]?> 分 ( 投稿可获得积分 )</span>
             <div class="clear"></div>
         </div>
             <ul class="entry">
              <li class='icon duanxiaoxi'><a href='/e/member/msg/'><?=$havemsg?></a></li>
			  <li class="icon shoucang"><a href="/e/DoInfo/ListInfo.php?mid=1" title="已发布的文章"> 发表了  <span style="color:#E17D32;"><?=$wznum;?></span> 篇文章</a> </li>
              <li class="icon haoyou"><a href="/e/member/friend/" title="我的好友">共有好友 <span style="color:#E17D32;"> <?=$hynum;?></span> 人</a></li>    
             </ul> 
            <div class="clear"></div>
         <!-- //系统提示 -->
             <div class='tip'>
             <div class='tipClose fRight'>隐藏提示</div>
             <div class='tipContent fLeft icon titTip1'>资料信息正常，你现在可以在本站 <a href='/e/tg'>[发表文章]</a> 书写心情日记...</div>
             <br class='clear' />
             </div>           </div>
         </div>
         <div class="titleBar bgGreen lineB">
             <h5 class="fLeft icon article_new ">最新文档</h5>
             <div class="clear"></div>
         </div>
         <div class="fangle">
             <dl class="artList mL10 mR10" style="padding:5px 0px 10px;">
			  <?php 
               while($bqr=$empire->fetch($news)) { 
	           echo "<dd><span class='ur'><a class='yellow' href='/user/".$bqr[userid]."/' target='_blank'>".$bqr[username]."</a> 于 ".date('m月d日 H:i',$bqr[newstime])." 发表了：<a href='".$bqr[titleurl]."' class='tit' target='_blank'>".$bqr[title]."</a></span></dd>";
	           } 
	           ?>        
			  </dl>
         </div>
         </div>
      <div class="clear"></div>
     </div>
     <div class="dedeRight">
     <!--信息统计 -->
         <div class="titleBar bgGaryImg" style="margin-top:0px;">
         <h5 class="fLeft icon icotongji">其他信息</h5>
         </div>
         <dl class="statistics overflow mL10 mR10">
             <dt>空间访问量：</dt>
             <dd><?=$addr[viewstats]?> </dd>
             <dt>注册时间：</dt>
             <dd><?=$registertime?></dd> 
			 <dt>帐户余额：</dt>
             <dd><?=$r[money]?> 元</dd>
			 <dt>剩余有效期：</dt>
             <dd><?=$userdate?> 天</dd>
             <dt>个人主页：</dt>
             <dd><a href="/user/<?=$user[userid]?>/" title="我的主页">点击进入</a></dd>
         </dl>
         <div class="clear"></div>
    <!--好友列表 -->
         <div class="titleBar bgGaryImg">
              <h5 class="fLeft icon titWhoSeeMe">欢迎新朋友</h5>
         </div>
         <ul class="picList textCenter">
		   <?php  
		   while($usr=$empire->fetch($userlist)) { 
		   $usr[userpic]=$usr['userpic']?$usr['userpic']:'/skin/user/nouserpic.jpg';
	       echo "<li><a href='/user/".$usr[userid]."/' target='_blank'><img src='".$usr[userpic]."' style='border-radius: 5px;' width='48' height='48' /></a></li>";
	        } 
			?>
 </ul>
         <div class="clear"></div>
         <hr />
     <!--好友搜索 -->
     <div class="buddySearch textCenter" style="padding:10px 0">
		 <form name="memberform" method="get" action="/e/member/list/">
		 <input type="hidden" name="sear" value="1">
		 <input type="hidden" name="groupid" value="">
          <input name="keyboard" type="text" id="keyboard" class="text" value="" style="width:100px;">
           <button class="button3" type="submit">搜会员</button>
		 </form>	 
     </div>
    </div>
    <div class="clear"></div>
</div>
</div>
<script language="javascript" type="text/javascript">
$("document").ready(function(){$(".tipClose").click(function(){$(this).parent(".tip").animate({ height: 'toggle', opacity: 'toggle' }, "hide");})  });
</script>
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>
