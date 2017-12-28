<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']=$word;
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
            <li><a href="/e/member/list/">查找好友</a></li>
            <li class="select"><a href="#">添加好友</a></li>
          </ul>
        </div>
     <div class="mTB10 mL10 mR10 minhg">
		 <table cellspacing="1" class="list">
	        <form name="form1" method="post" action="../../doaction.php">
            <tr class="header"> 
              <td height="25" colspan="2"><?=$word?></td>
            </tr>
            <tr> 
              <td width="17%" height="25" bgcolor="#FFFFFF">用户名: </td>
              <td width="83%" bgcolor="#FFFFFF"><input name="fname" type="text" id="fname" value="<?=$fname?>">
                (*)</td>
            </tr>
            <!--tr> 
              <td height="25" bgcolor="#FFFFFF">所属分类：</td>
              <td bgcolor="#FFFFFF"><select name="cid">
                  <option value="0">不设置</option>
                  <?=$select?>
                </select>
                [<a href="../FriendClass/" target="_blank">管理分类</a>]</td>
            </tr-->
            <tr> 
              <td height="25" bgcolor="#FFFFFF">备注：</td>
              <td bgcolor="#FFFFFF"><input name="fsay" type="text" id="fname3" value="<?=stripSlashes($r[fsay])?>" size="38"></td>
            </tr>
			     <tr>
			  <td width="21%" height="25"></td>
                <td><button class="button3" type="submit">添 加</button></td>
              </tr>
			      <input name="enews" type="hidden" id="enews" value="<?=$enews?>">
                <input name="fid" type="hidden" id="fid" value="<?=$fid?>">
                <input name="fcid" type="hidden" id="fcid" value="<?=$fcid?>">
                <input name="oldfname" type="hidden" id="oldfname" value="<?=$r[fname]?>">
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