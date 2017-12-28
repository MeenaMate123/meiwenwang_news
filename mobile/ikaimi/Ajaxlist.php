<?php
require 'db.php';
$Authorization = explode('.', $_SERVER['SERVER_NAME']);
$Authorization = $Authorization[count($Authorization) - 2] . '.' . $Authorization[count($Authorization) - 1];

if ($Authorization !== 'bbs.52jscn.com') {
	$link = db_connect();
	$empire = new mysqlquery();
	$add = $_GET;
	$classid = $add[classid];
	$line = $add[line];
	$perNumber = $line;
	$page = $_GET['page'];
	$count = mysql_query( 'select count(*) as total from ' . $dbtbpre . 'ecms_news where classid in (' . $classid . ')');
	$rs = mysql_fetch_array($count);
	$totalNumber = $rs[0];
	$totalPage = ceil($totalNumber / $perNumber);

	if (!isset($page)) {
		$page = 1;
	}

	$startCount = ($page - 1) * $perNumber;
	$query = mysql_query('select title,id from ' . $dbtbpre . 'ecms_news where classid in (' . $classid . ') order by newstime desc limit ' . $startCount . ',' . $perNumber);

	while ($row = $empire->fetch($query)) {
		echo '<li><a href="/show/' . $row['id'] . '.html">' . $row['title'] . '</a></li>';
	}

	$empire = NULL;
}
else {
	echo '<h3 style="color:#f00;display:block;">您访问的域名未获授权！</h3>';
}

?>
