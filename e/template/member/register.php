<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='注册会员';
require(ECMS_PATH.'e/template/member/head.php');
?>
<script type="text/javascript" src="<?=$public_r['newsurl']?>skin/user/reg.js"></script>
<div class="container">
<div class="container-bd">
<div class="login_con">
  <div class="login_con_center">
    <div class="register_con">
      <div class="registered_center">
        <div class="register_center_left">
          <h2>欢迎加入 <?=$public_r['add_www_92game_net_name']?></h2> 
      <form method="post" action="<?=$public_r['newsurl']?>e/member/doaction.php" id="myform">
	<input type="hidden" name="enews" value="register">
	<input type="hidden" name="siteid" value="1" />
	<input type="hidden" name="ecmsfrom" id="forward" value="<?php echo $_SERVER['HTTP_REFERER'];?>" />
            <table width="0" border="0" cellpadding="0" cellspacing="0"  class="register_center_table">
              <tr>
                <td class="register_center_text">登录帐号：</td>
                <td class="register_center_content"><div class="register_center_input">
                    <input type="text" class="input" id="username" name="username"/>
                  </div></td>
                <td class="register_judgment"><span class="onFocus" id="usernameTip"></span></td>
              </tr>
			   <tr>
                <td class="register_center_text">作者笔名：</td>
                <td class="register_center_content"><div class="register_center_input">
                    <input type="text" class="input" name="truename" id="truename"/>
                  </div></td>
                <td class="register_judgment"><span></span></td>
              </tr>
              <tr>
                <td class="register_center_text">创建密码：</td>
                <td class="register_center_content"><div class="register_center_input">
                    <input class="input" type="password" id="password" name="password"/>
                  </div></td>
				  <td class="register_judgment" ><span class="prompt_info" id="passwordTip"></span></td>
              </tr>
              <tr>
                <td class="register_center_text">重复密码：</td>
                <td class="register_center_content"><div class="register_center_input">
                    <input  class="input" type="password" name="repassword" id="repassword"/>
                  </div></td>
                <td class="register_judgment" ><span class="correct" id="repasswordTip"></span></td>
              </tr>
              <tr>
                <td class="register_center_text">Q Q 邮箱：</td>
                <td class="register_center_content"><div class="register_center_input">
                    <input class="input" type="text" id="email" name="email" />
                  </div></td>
                <td class="register_judgment"><span class="correct" id="emailTip"></span></td>
              </tr>
              <tr>
                <td class="register_center_text">你的性别：</td>
                <td class="register_center_content"><p>
				<input name="sex" id="sex" value="1" type="radio" checked> 男 <i class="ico-09" style="background-position: -2px -882px; padding: 0px 0px 0px 40px;"></i>
				<input name="sex" id="sex" value="2" type="radio"> 女 <i class="ico-03" style="background-position: 0px -908px;"></i></p>
                </td>
				<td class="register_judgment"></td>
              </tr>
                <? if($public_r['regkey_ok']){?>
				   <tr>
                <td class="register_center_text">验 证 码：</td>
                <td class="register_center_content"><div class="register_center_input register_center_validation">
                    <input type="text" class="input" id="code" name="key"  />
                  </div>
                  <img width="120px" height="36px" id='code_img' id="vdimgck" align="absmiddle" onClick="this.src=this.src+'?'" style="cursor: pointer;vertical-align:top;" alt="看不清？点击更换" src="../../ShowKey/?v=reg" border="0" /></td>
              </tr> 
	             <? } ?>	
			  <tr>
                <td class="register_center_text">&nbsp;</td>
                <td class="register_center_content"><p style="font-size:14px">
				<input type="checkbox" name="protocol" id="protocol" checked  />&nbsp; 我已看过并同意《<a href="<?=$public_r['newsurl']?>about/service.html" target="_blank">服务使用协议</a>》</p></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td class="register_center_text">&nbsp;</td>
                <td class="register_center_content"><input type="submit" id="btnSignCheck" class="login_input_buttom_right" value="" ></td>
                <td>&nbsp;</td>
              </tr>
            </table>
          </form>
        </div>
        <div class="register_center_right">
          <h2>已有<?=$public_r['add_www_92game_net_name']?>通行证</h2>
          <div class="register_right_qq reg_body_btn"><a href="<?=$public_r['newsurl']?>e/member/login/" class="link web_login">登录</a><br /><a style="float:left;" href="/e/member/GetPassword/" class="forget fr">忘记密码？</a><br /></div>
		   <? if(!$public_r['regkey_ok']){?>
		  <h2>一键快捷登录</h2>
		 <div class="register_right_qq reg_body_btn" style="border-bottom:0px;">
		  <a href="<?=$public_r['newsurl']?>e/member/qq_api/enews.php?enews=qzonelogin" rel="nofollow" target="_blank"> <img title="只需一步 快速登录" alt="使用QQ账号快速登录" src="<?=$public_r['newsurl']?>skin/user/qq_login.gif"> </a>
		  </div>
		      <? } ?>	
        </div>
      </div>
      <div class="registered_bottom"> </div>
    </div>
  </div>
</div>
</div><div class="c1 container-bottom"></div></div>
<script language="JavaScript">
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#username").formValidator({onshow:"<?=$pr['min_userlen']?>-<?=$pr['max_userlen']?>位中英文、数字、下横线组成"}).inputValidator({min:<?=$pr['min_userlen']?>,max:<?=$pr['max_userlen']?>,onerror:"<?=$pr['min_userlen']?>-<?=$pr['max_userlen']?>位中英文、数字、下横线组成"}).regexValidator({regexp:"ps_username",datatype:"enum",onerror:"用户名格式错误"}).ajaxValidator({
	    type : "get",
		url : "",
		data :"m=reg&a=checkname",
		datatype : "html",
		async:'false',
		success : function(data){
            if( data == "1" ) {
                return true;
			} else {
                return false;
			}
		},
		buttons: $("#dosubmit"),
		onerror : "禁止注册或用户已存在。",
		onwait : "请稍候..."
	});
	
	$("#password").formValidator({onshow:"<?=$pr['min_passlen']?>-<?=$pr['max_passlen']?>英文、数字、符号，区别大小写"}).inputValidator({min:<?=$pr['min_passlen']?>,max:<?=$pr['max_passlen']?>,onerror:"<?=$pr['min_passlen']?>-<?=$pr['max_passlen']?>英文、数字、符号，区别大小写"});
	$("#repassword").formValidator({onshow:"请输入确认密码",oncorrect:"密码输入一致"}).compareValidator({desid:"password",operateor:"=",onerror:"请输入两次密码不同。"});
	$("#email").formValidator({onshow:"常用的真实邮箱，密码取回时需要使用",oncorrect:"邮箱格式正确"}).inputValidator({min:5,max:32,onerror:"邮箱应该为5-32位之间"}).regexValidator({regexp:"email",datatype:"enum",onerror:"邮箱格式错误"}).ajaxValidator({
	    type : "get",
		url : "",
		data :"m=reg&a=checkemail",
		datatype : "html",
		async:'false',
		success : function(data){	
            if( data == "1" ) {
                return true;
			} else {
                return false;
			}
		},
		buttons: $("#dosubmit"),
		onerror : "禁止注册或邮箱已存在",
		onwait : "请稍候..."
	});
	});
</script>
<div class="footer">
<?=$public_r['add_www_92game_net_by']?>
</div>
</body>
</html>