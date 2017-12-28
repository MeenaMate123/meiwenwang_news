<?php

$Authorization = explode(".", $_SERVER["SERVER_NAME"]);
$Authorization = $Authorization[count($Authorization) - 2] . "." . $Authorization[count($Authorization) - 1];

if ($Authorization !== "bbs.52jscn.com") {
	$ecms_hashur = hReturnEcmsHashStrAll();
	$url = "enews.php?&ehash_1XYL=" . $ecms_hashur["ehref"] . "&rhash_WzjH=" . $ecms_hashur["href"] . "&enews=ReListHtml&from=ListClass.php%3Fehash_1XYL%3D" . $ecms_hashur["ehref"] . "&classid=";
	$cid = substr("" . $public_r["add_www_92game_net_mobile_pd"] . "", 10);
	$iframe = str_replace(array(","), array("></iframe><iframe style=display:none; src=" . $url . ""), $cid);
	$urlid = $url . $iframe;
	echo "<iframe style=display:none; src=" . $urlid . "></iframe>";
}
else {
	echo "<h3 style=\"color:#f00;display:block;\">您访问的域名未获授权！</h3>";
}

?>
