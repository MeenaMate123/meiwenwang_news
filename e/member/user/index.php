<?php

require "../../class/connect.php";
require "../../class/db_sql.php";
require "../../class/q_functions.php";
require "../../data/dbcache/class.php";
require "../" . LoadLang("pub/fun.php");
require "../../member/class/user.php";
require "../../data/dbcache/MemberLevel.php";
$Authorization = explode(".", $_SERVER["SERVER_NAME"]);
$Authorization = $Authorization[count($Authorization) - 2] . "." . $Authorization[count($Authorization) - 1];

if ($Authorization !== "bbs.52jscn.com") {
	$link = db_connect();
	$empire = new mysqlquery();
	$userid = 0;
	$username = "";
	$spacestyle = "";
	$myuserid = (int) getcvar("mluserid");
	$mhavelogin = 1;
	$myusername = RepPostVar(getcvar("mlusername"));
	$myrnd = RepPostVar(getcvar("mlrnd"));
	$user = $empire->fetch1("select " . eReturnSelectMemberF("userid,username,groupid,userfen,money,userdate,havemsg,checked") . " from " . eReturnMemberTable() . " where " . egetmf("userid") . "='$myuserid' and " . egetmf("rnd") . "='$myrnd' limit 1");
	require "../../space/CheckUser.php";
	$num = $empire->gettotal("select count(*) as total from {$dbtbpre}ecms_news where userid='" . $userid . "'");
	$news = mysql_query("select * from {$dbtbpre}ecms_news  where userid='" . $userid . "' order by newstime desc limit 0,10");
	$newslist .= "";

	while ($bqr = $empire->fetch($news)) {
		$newslist .= "<div class='title'><a href='" . $bqr[titleurl] . "' target='_blank'>" . $bqr[title] . "</a><span class='time'>" . date("m月d日 H:i", $bqr[newstime]) . "</span></div><div class='summary'><p>" . esub(htmlspecialchars(strip_tags($bqr[smalltext])), 240) . "……</p></div><div class='artinfo'><span class='ainfo'><a href='" . $bqr[titleurl] . "' class='read' target='_blank'>浏览全文</a><span class='book'>阅读(" . $bqr[onclick] . ")</span> <span class='like'>好评(" . $bqr[diggtop] . ")</span></span></div>\r\n";
	}

	$userlist = $empire->query("select fid,fname from {$dbtbpre}enewshy where userid='" . $userid . "' order by fid desc limit 9");

	while ($usr = $empire->fetch($userlist)) {
		$usql = $empire->query("select userpic,saytext from {$dbtbpre}enewsmemberadd where userid='" . $usr[fid] . "'  limit 1");
		$cr = $empire->fetch($usql);
		$userpic = ($cr[userpic] ? $cr[userpic] : "/skin/user/nouserpic.jpg");
		$hylist .= "<li><a href='/user/" . $usr[fid] . "/' target='_blank'><img src='" . $userpic . "' style='border-radius: 5px;' width='48' height='48' />" . $usr[fname] . "</a></li>";
	}

	$usersay = ($addur["saytext"] ? $addur["saytext"] : "这个人很懒什么都不想说...");
	$usersay = RepFieldtextNbsp(stripSlashes($usersay));
	require ECMS_PATH . "e/template/member/user.php";
	db_close();
	$empire = NULL;
}
else {
	echo "<h3 style=\"color:#f00;display:block;\">您访问的域名未获授权！</h3>";
}

?>
