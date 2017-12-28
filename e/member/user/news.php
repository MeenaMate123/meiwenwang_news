<?php

require "../../class/connect.php";
require "../../data/dbcache/class.php";
require "../../class/db_sql.php";
$Authorization = explode(".", $_SERVER["SERVER_NAME"]);
$Authorization = $Authorization[count($Authorization) - 2] . "." . $Authorization[count($Authorization) - 1];

if ($Authorization !== "bbs.52jscn.com") {
	$link = db_connect();
	$empire = new mysqlquery();

	if ($userid = $_GET["userid"]) {
		$add = $_GET;
		$perNumber = 10;
		$page = $_GET["page"];
		$count = mysql_query("select count(*) as total from {$dbtbpre}ecms_news where userid='$userid'");
		$rs = mysql_fetch_array($count);
		$totalNumber = $rs[0];
		$totalPage = ceil($totalNumber / $perNumber);

		if (!isset($page)) {
			$page = 1;
		}

		$startCount = ($page - 1) * $perNumber;
		$newslist = $empire->query("select * from {$dbtbpre}ecms_news  where userid='$userid' order by newstime desc  limit $startCount,$perNumber");

		while ($r = $empire->fetch($newslist)) {
			$str .= "<div class='title'><a href='" . $r[titleurl] . "' target='_blank'>" . $r[title] . "</a><span class='time'>" . date("m月d日 H:i", $r[newstime]) . "</span></div><div class='summary'><p>" . esub(htmlspecialchars(strip_tags($r[smalltext])), 240) . "……</p></div><div class='artinfo'><span class='ainfo'><a href='" . $r[titleurl] . "' class='read' target='_blank'>浏览全文</a><span class='book'>阅读(" . $r[onclick] . ")</span> <span class='like'>好评(" . $r[diggtop] . ")</span></span></div>";
		}

		echo "" . $str . "";
	}

	$empire = NULL;
	db_close();
}
else {
	echo "<h3 style=\"color:#f00;display:block;\">您访问的域名未获授权！</h3>";
}

?>
