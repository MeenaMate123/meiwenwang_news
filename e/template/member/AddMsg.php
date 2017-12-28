<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='发送消息';
require(ECMS_PATH.'e/template/member/head.user.php');
?>
<div class="wrapper lineT">
  <div class="mainBox">
    <div class="main">
   <?php require(ECMS_PATH.'e/template/member/left.user.php'); ?>
<div class="dedeMain">
        <div class="location">
		  <span class="fLeft">发送站内短信</span>
		  <span class="fRight mR10 titPublish icon">
		  <a href='/e/member/msg/AddMsg/?enews=AddMsg'>发送消息</a></span>
		  </div>
        <div class="titleTabBar bgGreen lineTB">
 <div class="fLeft">	
 <ul>
            <li  class="select"><a href="#">写新消息</a></li>
            <li><a href="/e/member/msg/">收件箱</a></li>
          </ul>
 </div>	    
        </div>
        <div class="mL10 mR10 mTB10 minhg">
		 <table cellspacing="1" class="list">
         <form action="../../doaction.php" method="post" name="sendmsg" id="sendmsg">
		  <tbody>
            <tr class="header"> 
              <td height="23" colspan="2">发送消息</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td width="21%" height="25">标题</td>
              <td width="79%" height="25"><input name="title" type="text" id="title2" value="<?=ehtmlspecialchars(stripSlashes($title))?>" size="43">
                *</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25">接收者</td>
              <td height="25"><input name="to_username" type="text" id="to_username2" value="<?=$username?>">
                [<a href="javascript:void(openWin('../../friend/change/?fm=sendmsg&f=to_username', 250, 360));">选择好友</a>] 
                *</td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" valign="top">内容</td>
              <td><textarea name="msgtext" style="width:600px;height:270px;" id="textarea"><?=ehtmlspecialchars(stripSlashes($msgtext))?></textarea>
                *</td>
            </tr>
              <tr>
			  <td width="21%" height="25"></td>
                <td><button class="button3" type="submit">发 送</button></td>
              </tr>
             </tbody>
          </form>
        </table>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<script language="javascript"> 
      function openWin(u, w, h) { 
            var l = (screen.width - w) / 2; 
            var t = (screen.height - h) / 2; 
            var s = 'width=' + w + ', height=' + h + ', top=' + t + ', left=' + l; 
            s += ', toolbar=no, scrollbars=no, menubar=no, location=no, resizable=no'; 
            open(u, 'oWin', s); 
      } 
</script> 
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>