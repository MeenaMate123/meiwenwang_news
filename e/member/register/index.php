<?php
require("../../class/connect.php");
require("../../class/db_sql.php");
require("../class/user.php");
require("../class/member_registerfun.php");
$link=db_connect();
$empire=new mysqlquery();
$editor=1;
//关闭
if($public_r[register_ok])
{
	printerror("CloseRegister","history.go(-1)",1);
}
//验证IP
eCheckAccessDoIp('register');
//转向注册
if(!empty($registerurl))
{
	Header("Location:$registerurl");
	exit();
}
//已经登陆不能注册
if(getcvar('mluserid'))
{
	printerror("LoginToRegister","history.go(-1)",1);
}
/*if(!empty($changeregisterurl)&&!$_GET['groupid'])
{
	Header("Location:$changeregisterurl");
	exit();
}*/
$m = $_GET['m'];
// 验证用户名
if($m == 'reg')
{
	$a = $_GET['a'];
	if ($a == 'checkname')
	{
		$username = addslashes($_GET['username']);
		$sql=$empire->fetch1("select username from {$dbtbpre}enewsmember where username='$username'");
		if(!$sql)
		{
                echo 1;
				exit();
		}
	}
	elseif($a == 'checkemail')
	{
		 $email = addslashes($_GET['email']);
		 $sql=$empire->fetch1("select email from {$dbtbpre}enewsmember where email='$email'");
		 if(!$sql)
		 {
			  echo 1;
			  exit();
		 }
	}
	elseif($a == 'checknickname')
	{
		 $nickname = addslashes($_GET['nickname']);
		 $sql=$empire->fetch1("select nickname from {$dbtbpre}enewsmemberadd where nickname='$nickname'");
		 if(!$sql)
		 {
			  echo 1;
			  exit();
		 }
	}
}
$pr=$empire->fetch1("select min_userlen,max_userlen,min_passlen,max_passlen,regretime,regclosewords,regemailonly from {$dbtbpre}enewspublic limit 1");
$groupid=(int)$_GET['groupid'];
$groupid=$groupid?$groupid:$user_groupid;
CheckMemberGroupCanReg($groupid);
$formid=GetMemberFormId($groupid);
if(empty($formid))
{
	printerror('ErrorUrl','',1);
}
$ecmsfirstpost=1;
$formfile='../../data/html/memberform'.$formid.'.php';
//导入模板
require(ECMS_PATH.'e/template/member/register.php');
db_close();
$empire=null;
?>