<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='修改资料信息';
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
            <li class="select"><a href="/e/member/EditInfo/">基本资料</a></li>
            <li><a href="/e/member/EditInfo/EditSafeInfo.php">密码/邮箱</a></li>
          </ul>
        </div>
<form name=userinfoform method=post enctype="multipart/form-data" class="mTB10 mL10 mR10"  action="../doaction.php">
<input type=hidden name=enews value=EditInfo>
 <table cellspacing="1" class="submit">
<tbody>
 <tr><td width="15%" align="right">会员头像：</td><td class="file"><!--[if !IE]><!--><div style="float:left;"><img style="width:100px;" src="<?=$userpic?>" id="userpicimg"></div><!--<![endif]--><input type="file" class="g-u" name="userpicfile" id="userpicfile" value="上传图片"></td></tr>
 <?php @include($formfile);?>
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
<!--图片上传即时预览只在非IE浏览器下有效--> 
<!--[if !IE]><!--> 
<style>table.submit tbody tr td input.g-u{width:65px;height:30px;padding:0px;border:0px;margin:50px 0px 0px 20px;}</style>
<script type="text/javascript"> 
$("#userpicfile").change(function(){
	var objUrl = getObjectURL(this.files[0]) ;
	console.log("objUrl = "+objUrl) ;
	if (objUrl) {
		$("#userpicimg").attr("src", objUrl) ;
	}
}) ;
//建立一個可存取到該file的url
function getObjectURL(file) {
	var url = null ; 
	if (window.createObjectURL!=undefined) { // basic
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { // mozilla(firefox)
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) { // webkit or chrome
		url = window.webkitURL.createObjectURL(file) ;
	}
	return url ;
}
</script>
<!--<![endif]-->
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>