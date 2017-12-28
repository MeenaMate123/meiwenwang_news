<?php

require 'db.php';
$Authorization = explode('.', $_SERVER['SERVER_NAME']);
$Authorization = $Authorization[count($Authorization) - 2] . '.' . $Authorization[count($Authorization) - 1];

if ($Authorization !== 'bbs.52jscn.com') {
	$link = db_connect();
	$cha = new mysqlquery();
	$add = $_GET;
	$id = $add[id];
	$query = mysql_query('update ' . $dbtbpre . 'ecms_news set diggtop=diggtop+1 where id=\'' . $id . '\' limit 1');
	$add['diggtop'] = $add['diggtop'] + 1;
	$sql_news = 'select id,diggtop from ' . $dbtbpre . 'ecms_news where id=\'' . $id . '\'';
	$digg_id = mysql_query($sql_news);
	$row = mysql_fetch_array($digg_id);
	echo '<a class="ok"></a><p><b>' . $row[diggtop] . '人喜欢</b></p>';
	$cha = NULL;
	exit();
}
else {
	echo '<h3 style="color:#f00;display:block;">您访问的域名未获授权！</h3>';
}

?>
