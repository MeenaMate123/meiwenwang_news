<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='重设新密码';
require(ECMS_PATH.'e/template/member/head.php');
?>
<div class="container">
<div class="container-bd">
<div class="login_con">
  <div class="login_con_center">
    <div class="register_con">
      <div class="registered_center">
        <div class="register_center_left">
          <h2>重设“<?=$username?>”登录密码</h2> 
       <form name="GetPassForm" method="POST" action="../doaction.php">
	    <input name="enews" type="hidden" id="enews" value="DoGetPassword">
        <input name="id" type="hidden" id="id" value="<?=$r[id]?>">
        <input name="tt" type="hidden" id="tt" value="<?=$r[tt]?>">
        <input name="cc" type="hidden" id="cc" value="<?=$r[cc]?>">
            <table width="0" border="0" cellpadding="0" cellspacing="0"  class="register_center_table">
              <tr>
                <td class="register_center_text">创建密码：</td>
                <td class="register_center_content"><div class="register_center_input">
                    <input class="input" type="password" id="password" name="password"/>
                  </div></td>
				  <td class="register_judgment" ><span class="correct">英文、数字、符号，区别大小写</span></td>
              </tr>
              <tr>
                <td class="register_center_text">重复密码：</td>
                <td class="register_center_content"><div class="register_center_input">
                    <input  class="input" type="password" name="repassword" id="repassword"/>
                  </div></td>
                <td class="register_judgment" ><span class="correct">确认新密码，请牢记！</span></td>
              </tr>
			  	 <tr><td colspan="2">&nbsp;</td></tr> 
              <tr>
                <td class="register_center_text">&nbsp;</td>
                <td class="register_center_content">
				<input type="submit" class="login_input_send" value="确认修改" ></td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </form>
        </div>
        <div class="register_center_right">
		 <? if(!$public_r['regkey_ok']){?>
		  <h2>一键快捷登录</h2>
		 <div class="register_right_qq reg_body_btn" style="border-bottom:0px;">
		  <a href="<?=$public_r['newsurl']?>e/member/qq_api/enews.php?enews=qzonelogin" rel="nofollow" target="_blank"> <img title="只需一步 快速登录" alt="使用QQ账号快速登录" src="<?=$public_r['newsurl']?>skin/user/qq_login.gif"> </a>
		  <br /><a style="float:left;" href="/e/member/register/index.php?tobind=0&groupid=1" class="forget fr">注册新帐号</a>
		  </div>
		      <? } ?>	
        </div>
      </div>
      <div class="registered_bottom"> </div>
    </div>
  </div>
</div>
</div><div class="c1 container-bottom"></div></div>
<div class="footer">
<?=$public_r['add_www_92game_net_by']?>
</div>
</body>
</html>