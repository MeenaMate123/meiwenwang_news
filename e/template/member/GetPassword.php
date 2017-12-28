<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='找回用户登录密码';
require(ECMS_PATH.'e/template/member/head.php');
?>
<div class="container">
<div class="container-bd">
<div class="login_con">
  <div class="login_con_center">
    <div class="register_con">
      <div class="registered_center">
        <div class="register_center_left">
          <h2>找回用户登录密码</h2> 
       <form name="GetPassForm" method="POST" action="../doaction.php">
	    <input name="enews" type="hidden" id="enews" value="SendPassword">
            <table width="0" border="0" cellpadding="0" cellspacing="0"  class="register_center_table">
              <tr>
                <td class="register_center_text">登录帐号：</td>
                <td class="register_center_content"><div class="register_center_input">
                    <input type="text" class="input" name="username" id="username" />
                  </div></td>
                <td class="register_judgment"></td>
              </tr>
              <tr>
                <td class="register_center_text">注册邮箱：</td>
                <td class="register_center_content"><div class="register_center_input">
                    <input class="input" type="text" id="email" name="email" />
                  </div></td>
                <td class="register_judgment"><span class="correct" id="emailTip"></span></td>
              </tr>
				   <tr>
                <td class="register_center_text">验 证 码：</td>
                <td class="register_center_content"><div class="register_center_input register_center_validation">
                    <input type="text" class="input" id="code" name="key"  />
                  </div>
                  <img width="120px" height="36px" style="cursor: pointer;vertical-align:top;" src="../../ShowKey/?v=getpassword" name="getpasswordKeyImg" id="getpasswordKeyImg" onclick="getpasswordKeyImg.src='../../ShowKey/?v=getpassword&t='+Math.random()" /></td>
              </tr> 
			  	 <tr><td colspan="2">&nbsp;</td></tr> 
              <tr>
                <td class="register_center_text">&nbsp;</td>
                <td class="register_center_content"><input type="submit" class="login_input_send" value="提交找回" ></td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </form>
        </div>
        <div class="register_center_right">
          <h2>我记起来了</h2>
          <div class="register_right_qq reg_body_btn"><a href="<?=$public_r['newsurl']?>e/member/login/" class="link web_login">登录</a></div>
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