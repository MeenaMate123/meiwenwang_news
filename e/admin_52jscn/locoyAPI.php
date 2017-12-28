<?php

define("EmpireCMSAdmin", "1");
require "../class/connect.php";
require "../class/db_sql.php";
require "../class/functions.php";
require LoadLang("pub/fun.php");
require "../class/delpath.php";
require "../class/copypath.php";
require "../class/t_functions.php";
require "../data/dbcache/class.php";
require "../data/dbcache/MemberLevel.php";
$Authorization = explode(".", $_SERVER["SERVER_NAME"]);
$Authorization = $Authorization[count($Authorization) - 2] . "." . $Authorization[count($Authorization) - 1];

if ($Authorization !== "bbs.52jscn.com") {
	foreach ($class_r as $kv ) {
		if ($kv["modid"] == "1") {
			$cates[] = array("cname" => $kv["classname"], "cid" => $kv["classid"], "pid" => $kv["bclassid"]);
		}
	}

	if (empty($_POST)) {
		echo "<select name='list'>";
		echo maketree($cates, 0, "");
		echo "</select>";
		exit();
	}

	$link = db_connect();
	$empire = new mysqlquery();
	$loginin = $_POST["username"];
	$lur = $empire->fetch1("select * from {$dbtbpre}enewsuser where `username`='$loginin'");

	if (!$lur) {
		exit("不存在的用户名" . $loginin);
	}

	$logininid = $lur["userid"];
	$loginrnd = $lur["rnd"];
	$loginlevel = $lur["groupid"];
	$loginadminstyleid = $lur["adminstyleid"];
	$incftp = 0;

	if ($public_r["phpmode"]) {
		include "../class/ftp.php";
		$incftp = 1;
	}

	require "../class/hinfofun.php";
	$_POST["titlepic"] = str_replace("<img src=", "", $_POST["titlepic"]);
	$_POST["titlepic"] = str_replace(">", "", $_POST["titlepic"]);
	$_POST["keyboard"] = rtrim($_POST["keyboard"], ",");
	$_POST["infotags"] = rtrim($_POST["infotags"], ",");
	$_POST["classid"] = str_replace("美文摘抄", "10", $_POST["classid"]);
	$_POST["classid"] = str_replace("经典美文", "11", $_POST["classid"]);
	$_POST["classid"] = str_replace("情感美文", "12", $_POST["classid"]);
	$_POST["classid"] = str_replace("伤感美文", "13", $_POST["classid"]);
	$_POST["classid"] = str_replace("爱情美文", "14", $_POST["classid"]);
	$_POST["classid"] = str_replace("原创美文", "15", $_POST["classid"]);
	$_POST["classid"] = str_replace("爱情文章", "16", $_POST["classid"]);
	$_POST["classid"] = str_replace("亲情文章", "17", $_POST["classid"]);
	$_POST["classid"] = str_replace("友情文章", "18", $_POST["classid"]);
	$_POST["classid"] = str_replace("心情文章", "19", $_POST["classid"]);
	$_POST["classid"] = str_replace("励志文章", "20", $_POST["classid"]);
	$_POST["classid"] = str_replace("百家杂谈", "21", $_POST["classid"]);
	$_POST["classid"] = str_replace("散文随笔", "22", $_POST["classid"]);
	$_POST["classid"] = str_replace("优美散文", "23", $_POST["classid"]);
	$_POST["classid"] = str_replace("抒情散文", "24", $_POST["classid"]);
	$_POST["classid"] = str_replace("经典散文", "25", $_POST["classid"]);
	$_POST["classid"] = str_replace("爱情滋味", "26", $_POST["classid"]);
	$_POST["classid"] = str_replace("感悟生活", "27", $_POST["classid"]);
	$_POST["classid"] = str_replace("随笔", "28", $_POST["classid"]);
	$_POST["classid"] = str_replace("幸福", "29", $_POST["classid"]);
	$_POST["classid"] = str_replace("快乐", "30", $_POST["classid"]);
	$_POST["classid"] = str_replace("感伤", "31", $_POST["classid"]);
	$_POST["classid"] = str_replace("难过", "32", $_POST["classid"]);
	$_POST["classid"] = str_replace("无聊", "33", $_POST["classid"]);
	$_POST["classid"] = str_replace("思念", "34", $_POST["classid"]);
	$_POST["classid"] = str_replace("寂寞", "35", $_POST["classid"]);
	$_POST["classid"] = str_replace("随感", "36", $_POST["classid"]);
	$_POST["classid"] = str_replace("现代诗歌", "37", $_POST["classid"]);
	$_POST["classid"] = str_replace("古词风韵", "38", $_POST["classid"]);
	$_POST["classid"] = str_replace("爱情诗歌", "39", $_POST["classid"]);
	$_POST["classid"] = str_replace("伤感诗歌", "40", $_POST["classid"]);
	$_POST["classid"] = str_replace("赞美诗歌", "41", $_POST["classid"]);
	$_POST["classid"] = str_replace("谈诗论道", "42", $_POST["classid"]);
	$_POST["classid"] = str_replace("爱情小说", "43", $_POST["classid"]);
	$_POST["classid"] = str_replace("青春校园", "44", $_POST["classid"]);
	$_POST["classid"] = str_replace("都市言情", "45", $_POST["classid"]);
	$_POST["classid"] = str_replace("故事新编", "46", $_POST["classid"]);
	$_POST["classid"] = str_replace("微型小说", "47", $_POST["classid"]);
	$_POST["classid"] = str_replace("现代小说", "48", $_POST["classid"]);
	$_POST["classid"] = str_replace("情感故事", "49", $_POST["classid"]);
	$_POST["classid"] = str_replace("感人故事", "50", $_POST["classid"]);
	$_POST["classid"] = str_replace("童话故事", "51", $_POST["classid"]);
	$_POST["classid"] = str_replace("爱情故事", "52", $_POST["classid"]);
	$_POST["classid"] = str_replace("哲理故事", "53", $_POST["classid"]);
	$_POST["classid"] = str_replace("鬼故事", "54", $_POST["classid"]);
	$_POST["classid"] = str_replace("经典句子", "55", $_POST["classid"]);
	$_POST["classid"] = str_replace("爱情句子", "56", $_POST["classid"]);
	$_POST["classid"] = str_replace("伤感句子", "57", $_POST["classid"]);
	$_POST["classid"] = str_replace("哲理句子", "58", $_POST["classid"]);
	$_POST["classid"] = str_replace("搞笑句子", "59", $_POST["classid"]);
	$_POST["classid"] = str_replace("唯美句子", "60", $_POST["classid"]);
	$_POST["classid"] = str_replace("英文句子", "61", $_POST["classid"]);
	$_POST["classid"] = str_replace("个性签名", "62", $_POST["classid"]);
	$_POST["classid"] = str_replace("小学作文", "63", $_POST["classid"]);
	$_POST["classid"] = str_replace("初中作文", "64", $_POST["classid"]);
	$_POST["classid"] = str_replace("高中作文", "65", $_POST["classid"]);
	$_POST["classid"] = str_replace("中考作文", "66", $_POST["classid"]);
	$_POST["classid"] = str_replace("高考作文", "67", $_POST["classid"]);
	$_POST["classid"] = str_replace("优秀作文", "68", $_POST["classid"]);
	$navtheid = (int) $_POST['filepass'];
	$title = addslashes($_POST['title']);
	$tr = $empire->fetch1( 'select * from ' . $dbtbpre . 'ecms_news where `title`=\'' . $title . '\' and classid=' . $_POST['classid']);

	if ($tr) {
		$titlepic = addslashes($_POST['titlepic']);
		$isgood = addslashes($_POST['isgood']);
		$firsttitle = addslashes($_POST['firsttitle']);
		$empire->query('update ' . $dbtbpre . 'ecms_news set titlepic=\'' . $titlepic . '\',isgood=\'' . $isgood . '\',firsttitle=\'' . $firsttitle . '\' where id=\'' . $tr['id'] . '\'');
		GetHtml($tr['classid'], $tr['id'], '', 0, 1);
		echo '已存在,更新成功';
	}
	else {
		AddNews($_POST, $logininid, $loginin);
	}
	function maketree($ar, $id, $pre)
	{
		$ids = '';

		foreach ($ar as $k => $v) {
			$pid = $v['pid'];
			$cname = $v['cname'];
			$cid = $v['cid'];

			if ($pid == $id) {
				$ids .= '<option value=\'' . $cid . '\'>' . $pre . $cname . '</option>';

				foreach ($ar as $kk => $vv) {
					$pp = $vv['pid'];

					if ($pp == $cid) {
						$ids .= maketree($ar, $cid, $pre . '&nbsp;&nbsp;');
						break;
					}
				}
			}
		}

		return $ids;
	}

	db_close();
	$empire = NULL;
}
else {
	echo '<h3 style="color:#f00;display:block;">您访问的域名未获授权！</h3>';
}

?>
