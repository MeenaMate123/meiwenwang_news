<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$muserid=(int)getcvar('mluserid');
if(!$muserid)
 {
	Header("Location:/e/member/login/");

}
if($muserid)
{
	$mhavelogin=1;
	//数据
	$username=RepPostVar(getcvar('mlusername'));
	$myrnd=RepPostVar(getcvar('mlrnd'));
}
$addr=$empire->fetch1("select * from {$dbtbpre}enewsmemberadd where userid='$user[userid]' limit 1");
$userpic=$addr['userpic']?$addr['userpic']:'/skin/user/nouserpic.jpg';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" >
<meta http-equiv="Cache-Control" content="no-transform " />
<title><?=$public_diyr['pagetitle']?> - <?=$public_r['sitename']?></title>
<link href="/skin/user/user.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/skin/js/jquery-1.7.1.min.js"></script>
</head>
<body>
<div class="header mB10">
  <div class="wrapper">
    <div class="logo fLeft"><a href="/e/member/cp/"><img src="/skin/user/img/member.gif" alt="会员中心" /></a> </div>
    <div class="fRight">
      <div class="topBar">
        <ul class="userMenu green">
        <li><a href="/" title="网站主页">网站主页</a></li>
          <li><a href="/user/<?=$user[userid]?>/" title="我的主页">我的主页</a></li>
          <li><a href="/e/member/doaction.php?enews=exit" title="注销退出">[注销]</a></li>
        </ul>
        <span>
        <script type="text/javascript">
           	var now=(new Date()).getHours();
			if(now>0&&now<=6){
				document.write("午夜好，");
			}else if(now>6&&now<=11){
				document.write("早上好，");
			}else if(now>11&&now<=14){
				document.write("中午好，");
			}else if(now>14&&now<=18){
				document.write("下午好，");
			}else{
				document.write("晚上好，");
			}
			</script>
        <i><?=$username?></i></span> </div>
      <div class="clear"></div>
      <div class="navMenu">
        <ul class="heaNav white">
          <li class="home"><a href="/e/member/cp/" title="会员中心首页">首页</a></li>
		  <li class="middle"><a href="/e/DoInfo/ListInfo.php?mid=1" title="我发表的文章">文章</a></li>
		  <li class="middle"><a href="/e/member/EditInfo/" title="详细资料">资料</a></li>
		  <li class="middle"><a href="/e/member/friend/" title="我的好友">好友</a></li>
          <li class="more"><a href="/e/member/msg/" title="我的短信息">短消息</a></li>
        </ul>
        <div class="clear"></div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>