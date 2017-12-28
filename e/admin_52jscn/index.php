<?php
define('EmpireCMSAdmin','1');
define('EmpireCMSAPage','login');
define('EmpireCMSNFPage','1');
require("../class/connect.php");
require("../class/functions.php");
//风格
$loginadminstyleid=EcmsReturnAdminStyle();
//变量处理
$empirecmskey1='';
$empirecmskey2='';
$empirecmskey3='';
$empirecmskey4='';
$empirecmskey5='';
if($_POST['empirecmskey1']&&$_POST['empirecmskey2']&&$_POST['empirecmskey3']&&$_POST['empirecmskey4']&&$_POST['empirecmskey5'])
{
	$empirecmskey1=RepPostVar($_POST['empirecmskey1']);
	$empirecmskey2=RepPostVar($_POST['empirecmskey2']);
	$empirecmskey3=RepPostVar($_POST['empirecmskey3']);
	$empirecmskey4=RepPostVar($_POST['empirecmskey4']);
	$empirecmskey5=RepPostVar($_POST['empirecmskey5']);
	$ecertkeyrndstr=$empirecmskey1.'#!#'.$empirecmskey2.'#!#'.$empirecmskey3.'#!#'.$empirecmskey4.'#!#'.$empirecmskey5;
	esetcookie('ecertkeyrnds',$ecertkeyrndstr,0);
}
elseif(getcvar('ecertkeyrnds'))
{
	$certr=explode('#!#',getcvar('ecertkeyrnds'));
	$empirecmskey1=RepPostVar($certr[0]);
	$empirecmskey2=RepPostVar($certr[1]);
	$empirecmskey3=RepPostVar($certr[2]);
	$empirecmskey4=RepPostVar($certr[3]);
	$empirecmskey5=RepPostVar($certr[4]);
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
<META content="IE=11.0000" http-equiv="X-UA-Compatible">
<META http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<meta name="generator" content="mshtml 11.00.9600.17496">
<title>帝国网站管理系统</title> 
<script src="skin/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="skin/login.js" type="text/javascript"></script>
<link rel="stylesheet" href="skin/style.css" type="text/css">
<base onmouseover="window.status='QQ:75250060';return true">
</head>
<body onLoad="document.login.username.focus();">
<div class="top_div"></div>
<div class="login">
<div class="logo">
<div class="tou"></div>
<div class="initial_left_hand" id="left_hand"></div>
<div class="initial_right_hand" id="right_hand"></div>
</div>
  <form name="login" id="login" method="post" action="ecmsadmin.php" onSubmit="return CheckLogin(document.login);">
    <input type="hidden" name="enews" value="login">
<div class="log">
 <label>管理员</label><input class="ipt"  name="username" type="text" id="username"> 
</div>
<div class="other">
 <label>密　码</label><input class="ipt" name="password" type="password" id="password">   
</div>
  <?php
		  if($ecms_config['esafe']['loginauth'])
		  {
  ?>
<div class="other">
 <label>认证码</label><input  class="ipt"  name="loginauth" type="password" id="loginauth" />  
</div>
  <?php
		  }
		  if(empty($public_r['adminloginkey']))
		  {
 ?> 
<div class="other">
 <label>验证码</label><input  class="ipt w150" name="key" type="text" style="text-transform: uppercase;" name="validate"/><img src="ShowKey.php" name="KeyImg" id="KeyImg" align="bottom" onClick="KeyImg.src='ShowKey.php?'+Math.random()" alt="看不清楚,点击刷新">
</div>
 <?php
		  }
 ?>
<div class="other">
<label>提　问</label>   
<select class="ipt w160" name="equestion" id="equestion" onChange="if(this.options[this.selectedIndex].value==0){showanswer.style.display='none';}else{showanswer.style.display='';}">
                <option value="0">无安全提问</option>
                <option value="1">母亲的名字</option>
                <option value="2">爷爷的名字</option>
                <option value="3">父亲出生的城市</option>
                <option value="4">您其中一位老师的名字</option>
                <option value="5">您个人计算机的型号</option>
                <option value="6">您最喜欢的餐馆名称</option>
                <option value="7">驾驶执照的最后四位数字</option>
 </select>
</div>
<div class="other" id="showanswer">
          <label>答　案</label> <input class="ipt w150" name="eanswer" type="text" id="eanswer">
</div>
<div class="bottom">
<div class="cz">
<span class="fl"><a  href="javascript:void(0)" onClick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">忘记密码?</a></span> 
 <span class="fr"><input  type="submit" name="sm1" onClick="this.form.submit();" value="登录"/></span>     
</div> 
</div>
		    <input name="empirecmskey1" type="hidden" id="empirecmskey1" value="<?php echo $empirecmskey1;?>">
              <input name="empirecmskey2" type="hidden" id="empirecmskey2" value="<?php echo $empirecmskey2;?>">
              <input name="empirecmskey3" type="hidden" id="empirecmskey3" value="<?php echo $empirecmskey3;?>">
              <input name="empirecmskey4" type="hidden" id="empirecmskey4" value="<?php echo $empirecmskey4;?>">
              <input name="empirecmskey5" type="hidden" id="empirecmskey5" value="<?php echo $empirecmskey5;?>">
    </form>
 </div>
 	  <center id="footer">Copyright  2008-2015 bbs.52jscn.com 版权所有</center>
	  	  <div id="light" class="help">
		  <div class="help_box">
<div class="help_content">
<b>提示您：</b><br />
如果您的管理员帐号不能登陆或者其他异常情况，<br />请与我们联系！<br />
官网售后：<a href="http://bbs.52jscn.com"  target=_blank>bbs.52jscn.com</a>
<a href="javascript:void(0)" class="close" onClick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">close</a>
</div>
</div>
</div>
<div id="fade" class="black_overlay">
</div>
<script>
if(document.login.equestion.value==0)
{
	showanswer.style.display='none';
}
</script>
</body>
</html>