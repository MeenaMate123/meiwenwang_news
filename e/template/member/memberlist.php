<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
//配置查询自定义字段列表,逗号开头，多个用逗号格开，格式“ui.字段名”
$useraddf=',ui.userpic';
//分页SQL
$query='select '.eReturnSelectMemberF('userid,username,email,registertime,groupid','u.').$useraddf.' from '.eReturnMemberTable().' u'.$add." order by u.".egetmf('userid')." desc limit $offset,$line";
$sql=$empire->query($query);
//导航
$public_diyr['pagetitle']='会员列表';
require(ECMS_PATH.'e/template/member/head.user.php');
?>
<div class="wrapper lineT">
  <div class="mainBox">
    <div class="main">
   <?php require(ECMS_PATH.'e/template/member/left.user.php'); ?>
   <div class="dedeMain">
        <div class="location">站内会员</div>
        <div class="titleTabBar bgGreen lineTB">
          <ul>
            <li><a href="/e/member/friend/">我的好友</a></li>
            <li class="select"><a href="#">查找好友</a></li>
            <li><a href="/e/member/friend/add/?fcid=<?=$cid?>">添加好友</a></li>
          </ul>
        </div>
     <div class="mTB10 mL10 mR10 minhg">
          <div class="titleBar bgGrass lineB mB10">
             <div class="fLeft"><strong>找到会员(<?=$num?>)位</strong> </div>
			 <div class="fRight titSecondary white" style="margin:4px 10px 0px 0px;"> 
		<form name="memberform" method="get" action="/e/member/list/">
		 <input type="hidden" name="sear" value="1">
		 <input type="hidden" name="groupid" value="">
          <input name="keyboard" type="text" id="keyboard" class="text" value=""  style="width:150px;height:16px;">
          <button class="button2 mL10" type="submit">搜索</button> 
		 </form>
			</div>
		</div>
		<form name=favaform method=post action="../doaction.php" onsubmit="return confirm('确认要操作?');">
         <input type=hidden value=hy name=enews> 
          <?php
			while($r=$empire->fetch($sql))
			{
			//注册时间
			$registertime=eReturnMemberRegtime($r['registertime'],"Y-m-d H:i:s");
		 	//用户组
			$groupname=$level_r[$r['groupid']]['groupname'];
			$saytext=$r[saytext]?$r[saytext]:'这个人很懒什么都不想说...';
			$userpic=$r['userpic']?$r['userpic']:'/skin/user/nouserpic.jpg';
			?>
            <div class="item search">
            <div class="itemHead" >
              <div class="fLeft"> 
			  <span class="itemHeadTitle yellow"> 
			  <a href='/user/<?=$r['userid']?>/' target='_blank'>
			  <img class="lineBorder mR10" align="top" src='<?=$userpic?>' width='32' height='32'/></a>
			  <a href='/user/<?=$r['userid']?>/' target='_blank'><?=$r['username']?></a>
			  </span>
			  <span class="itemTip mL10">(<?=$saytext?>)</span>
			  </div>
              <div class="fRight">
			  <a href="/user/<?=$r['userid']?>/" target="_blank">[ Ta的主页 ]</a>&nbsp;&nbsp; 
			  <a href="/e/member/msg/AddMsg/?username=<?=$r['username']?>">[ 短信留言 ]</a>&nbsp;&nbsp; 
              <a href="/e/member/friend/add/?fname=<?=$r['username']?>">[ 加好友 ]</a>		  
			  </div>
            </div>
          </div>
          <hr class="dotted" />
		  <?php } ?>
		  <div>
            <div class="pages fRight"><div class="pagelistbox">  <?=$returnpage?></div></div>
            <div class="clear"></div>
          </div>
		     </form>
        </div>
      </div>
 <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>