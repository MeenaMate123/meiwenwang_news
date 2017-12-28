<?php
$password='www.ikaimi.com';	//这个密码是登陆验证用的.您需要在火车头发布模块里设置和这里一样的密码
if($password!=$_GET['pw']) exit('验证密码错误'); 
require("locoyAPI.php");
?>