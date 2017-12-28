<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='查看消息';
require(ECMS_PATH.'e/template/member/head.user.php');
?>
<div class="wrapper lineT">
  <div class="mainBox">
    <div class="main">
   <?php require(ECMS_PATH.'e/template/member/left.user.php'); ?>
<div class="dedeMain">
        <div class="location">
		  <span class="fLeft">查看站内短信</span>
		  <span class="fRight mR10 titPublish icon">
		  <a href='/e/member/msg/AddMsg/?enews=AddMsg'>发送消息</a></span>
		  </div>
        <div class="titleTabBar bgGreen lineTB">
 <div class="fLeft">	
 <ul>
              <li  class="select"><a href="#">查看信息</a></li>
            <li><a href="/e/member/msg/AddMsg/?enews=AddMsg">写新消息</a></li>
            <li><a href="/e/member/msg/">收件箱</a></li>
          </ul>
 </div>	    
        </div>
        <div class="mL10 mR10 mTB10 minhg">
		 <table cellspacing="1" class="list">
                 <form name="form1" method="post" action="../../doaction.php">
            <tr class="header"> 
              <td height="23" colspan="2">
                <?=stripSlashes($r[title])?>              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td width="19%" height="25">发送者：</td>
              <td width="81%" height="25"><a href="/user/<?=$r[from_userid]?>/"> 
                <?=$r[from_username]?>
                </a></td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25">发送时间：</td>
              <td height="25">
                <?=$r[msgtime]?>              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" valign="top">内容：</td>
              <td height="25"> 
                <?=nl2br(stripSlashes($r[msgtext]))?>              </td>
            </tr>
            <tr bgcolor="#FFFFFF"> 
              <td height="25" valign="top">&nbsp;</td>
              <td height="25">[<a href="#ecms" onclick="javascript:history.go(-1);"><strong>返回</strong></a>] 
                [<a href="../AddMsg/?enews=AddMsg&re=1&mid=<?=$mid?>"><strong>回复</strong></a>] 
                [<a href="../AddMsg/?enews=AddMsg&mid=<?=$mid?>"><strong>转发</strong></a>] 
                [<a href="../../doaction.php?enews=DelMsg&mid=<?=$mid?>" onclick="return confirm('确认要删除?');"><strong>删除</strong></a>]</td>
            </tr>
          </form>
        </table>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>