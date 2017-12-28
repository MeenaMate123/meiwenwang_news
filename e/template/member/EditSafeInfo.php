<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='修改密码安全';
require(ECMS_PATH.'e/template/member/head.user.php');
?>
<div class="wrapper lineT">
  <div class="mainBox">
    <div class="main">
   <?php require(ECMS_PATH.'e/template/member/left.user.php'); ?>
      <div class="dedeMain">
        <div class="location">设置个人资料</div>
        <div class="titleTabBar bgGreen lineTB">
          <ul>
            <li><a href="/e/member/EditInfo/">基本资料</a></li>
            <li class="select"><a href="/e/member/EditInfo/EditSafeInfo.php">密码/邮箱</a></li>
          </ul>
        </div>
<form name=userinfoform method=post enctype="multipart/form-data" action=../doaction.php>
<input type=hidden name=enews value=EditSafeInfo>
 <table cellspacing="1" class="submit">
<tbody>
    <tr> 
      <td width="15%" align="right" style="color:#f00;">原密码：</td>
      <td> <input name='oldpassword' type='password' id='oldpassword'>
        <span style="color:#f00;">(修改密码或邮箱时需要密码验证)</span></td>
    </tr>
    <tr bgcolor='F7FDF0'> 
      <td align="right">新密码：</td>
      <td> <input name='password' type='password' id='password'>
        <span>(不想修改请留空)</span></td>
    </tr>
    <tr> 
      <td align="right">确认新密码：</td>
      <td> <input name='repassword' type='password' id='repassword'>
        <span>(不想修改请留空)</span></td>
    </tr>
    <tr bgcolor='F7FDF0'> 
      <td align="right">邮箱：</td>
      <td> <input name='email' type='text' id='email' value='<?=$user[email]?>'>
        <span>(不可留空)</span>
      </td>
    </tr>
 </tbody>
 <tfoot>
              <tr>
                <td height="45">&nbsp;</td>
                <td height="45"><button class="button3" type="submit" id="btnSubmit">更 改</button></td>
              </tr>
</tfoot>
</table>
</form>
 </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>