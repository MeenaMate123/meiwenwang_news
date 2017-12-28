<?php

$Authorization = explode(".", $_SERVER["SERVER_NAME"]);
$Authorization = $Authorization[count($Authorization) - 2] . "." . $Authorization[count($Authorization) - 1];

if ($Authorization !== "bbs.52jscn.com") {
	require_once "utils.php";
	require_once "../../class/connect.php";
	require_once "../../class/db_sql.php";
	require_once "../../member/class/user.php";
	require_once "../../data/dbcache/MemberLevel.php";
	require "../" . LoadLang("pub/fun.php");
	$link = db_connect();
	$empire = new mysqlquery();
	$editor = 1;
	$_SESSION["appid"] = $public_r["add_www_92game_net_qqid"];
	$_SESSION["appkey"] = $public_r["add_www_92game_net_qqkey"];
	$_SESSION["newsurl"] = "http://" . $public_r["add_www_92game_net_domain"] . "/";
	$_SESSION["callback"] = $_SESSION["newsurl"] . "e/ikaimi/qq_api/enews.php?enews=check_to_login";
	$_SESSION["groupid"] = 1;
	$enews = $_GET["enews"];

	if (empty($enews)) {
		$enews = $_POST["enews"];
	}

function connect2qzone_bind($reurl = '')
	{
		global $empire;
		global $dbtbpre;
		$user_r = connect2qzone_is_openid_exist($_SESSION['openid']);
 		if ($user_r[userid]) { 			ecms_memberlogin($user_r[userid]);
			echoJScloseWindow($reurl);
		} 		else { 			$qq_r = get_user_info($_SESSION['openid'], $_SESSION['appid'], $_SESSION['access_token']);
			$_SESSION['qqinfo'] = json_decode($qq_r);
			connect2qzone_register($reurl);
		} 	}
	function ecms_memberlogin($userid)
	{
		global $empire;
		global $user_tablename;
		global $public_r;
		global $user_groupid;
		global $user_username;
		global $user_userid;
		global $user_email;
		global $user_password;
		global $user_dopass;
		global $user_rnd;
		global $user_registertime;
		global $user_register;
		global $user_group;
		global $user_saltnum;
		global $user_salt;
		global $user_seting;
		global $forumgroupid;
		global $registerurl;
		global $dbtbpre;
		global $user_regcookietime;
		global $user_userfen;
		global $user_checked;
		global $level_r;
		$r = $empire->fetch1('select * from ' . $user_tablename . ' where userid=\'' . $userid . '\' limit 1');
		$rnd = make_password(20);
		$lasttime = time();
		$lastip = egetip();
		$usql = $empire->query('update ' . eReturnMemberTable() . ' set ' . egetmf('rnd'). '=\'' . $rnd . '\',' . egetmf('groupid') . '=\'' . $r['groupid'] . '\' where ' . egetmf('userid') . '=\'' . $r['userid'] . '\'');
		$empire->query('update ' . $dbtbpre . 'enewsmemberadd set lasttime=\'' . $lasttime . '\',lastip=\'' . $lastip . '\',loginnum=loginnum+1 where userid=\'' . $r['userid'] . '\'');
		$logincookie = time() + (86400 * 365);
		$set1 = esetcookie('mlusername', $r['username'], $logincookie);
		$set2 = esetcookie('mluserid', $r['userid'], $logincookie);
		$set3 = esetcookie('mlgroupid', $r['groupid'], $logincookie);
		$set4 = esetcookie('mlrnd', $rnd, $logincookie);
		qGetLoginAuthstr($r['userid'], $r['username'], $rnd, $r['groupid'], $logincookie);
		AddLoginCookie($r);
		if ($set1 && $set2 && $set3 && $set4) { 			$re = 1;
		} 		else { 			$re = 0;
		}  		return $re;
	}
	function connect2qzone_is_openid_exist($openid)
	{
		global $empire;
		global $dbtbpre;
		$r = $empire->fetch1('select userid from ' . $dbtbpre . 'enewsmember where qqopenid=\'' . $openid . '\' limit 1');
		return $r;
	}
	function echoJScloseWindow($reurl = '')
	{
		if (empty($reurl)) { 			echo '<script>opener.location.reload(); window.close();</script>';
		} 		else { 			echo '<script>opener.location.reload(); window.close();</script>';
		} 	}
	function check_re_username($username)
	{
		global $empire;
		global $user_tablename;
		global $public_r;
		global $user_groupid;
		global $user_username;
		global $user_userid;
		global $user_email;
		global $user_password;
		global $user_dopass;
		global $user_rnd;
		global $user_registertime;
		global $user_register;
		global $user_group;
		global $user_saltnum;
		global $user_salt;
		global $user_seting;
		global $forumgroupid;
		global $registerurl;
		global $dbtbpre;
		global $user_regcookietime;
		global $user_userfen;
		global $user_checked;
		global $level_r;
		$num = $empire->gettotal('select count(*) as total from ' . $user_tablename . ' where username=\'' . $username . '\' limit 1');
 		if ($num) { 			$i = 1;
 			for (; $i <= 100; $i++) { 				$username .= '_' . $i;
				$num = $empire->gettotal('select count(*) as total from ' . $user_tablename . ' where username=\'' . $username . '\' limit 1');
 				if (!$num) { 					break;
				} 			} 		}  		return $username;
	}
	function connect2qzone_register($reurl = '')
	{
		global $empire;
		global $dbtbpre;
		global $public_r;
		global $ecms_config;
 		if ($public_r['register_ok']) { 			printerror('CloseRegister', '', 1);
		}  		eCheckTimeCloseDo('reg');
		eCheckAccessDoIp('register');
 		if (!empty($ecms_config['member']['registerurl'])) { 			Header('Location:' . $ecms_config['member']['registerurl']);
			exit();
		}  		if (getcvar('mluserid')) { 			printerror('LoginToRegister', '', 1);
		}  		CheckCanPostUrl();
		$username = $_SESSION['qqinfo']->nickname;
		$username = RepPostVar($username);
		$password = $_SESSION['openid'];
		$truepassword = $_SESSION['openid'];
		$email = $_SESSION['openid'] . '@qq.com';
		$tobind = (int) $add['tobind'];
		$keyvname = 'checkregkey';
 		if ($public_r['regkey_ok']) { 			ecmsCheckShowKey($keyvname, $add['key'], 1);
		}  		$user_groupid = 1;
		$groupid = 1;
		$regip = egetip();
		toCheckCloseWord($username, $pr['regclosewords'], 'RegHaveCloseword');
		$username = RepPostStr($username);
		$username = check_re_username($username);
		$lasttime = time();
		$registertime = eReturnAddMemberRegtime();
		$rnd = make_password(20);
		$userkey = eReturnMemberUserKey();
		$truepassword = $password;
		$salt = eReturnMemberSalt();
		$password = eDoMemberPw($password, $salt);
		$checked = ReturnGroupChecked($groupid);
		if ($checked && ($public_r['regacttype'] == 1)) { 			$checked = 0;
		}  		require_once '../../member/class/member_modfun.php';
		$mr['add_filepass'] = ReturnTranFilepass();
		$fid = GetMemberFormId($groupid);
		$member_r = ReturnDoMemberF($fid, $add, $mr, 0, $username);
		$sql = $empire->query('insert into ' .eReturnMemberTable() . '(' . eReturnInsertMemberF('username,password,rnd,email,registertime,groupid,userfen,userdate,money,zgroupid,havemsg,checked,salt,userkey') . ',qqopenid) values(\'' . $username . '\',\'' . $password . '\',\'' . $rnd . '\',\'' . $email . '\',\'' . $registertime . '\',\'' . $groupid . '\',\'' . $public_r['reggetfen'] . '\',\'0\',\'0\',\'0\',\'0\',\'' . $checked . '\',\'' . $salt . '\',\'' . $userkey . '\',\'' . $_SESSION['openid'] . '\');');
		$userid = $empire->lastid();
		$addr = $empire->fetch1( 'select * from ' . $dbtbpre . 'enewsmemberadd where userid=\'' . $userid . '\'');
 		if (!$addr[userid]) { 			$spacestyleid = ReturnGroupSpaceStyleid($groupid);
			$sql1 = $empire->query('insert into ' . $dbtbpre . 'enewsmemberadd(userid,spacestyleid,regip,lasttime,lastip,loginnum' . $member_r[0] . ') values(\'' . $userid . '\',\'' . $spacestyleid . '\',\'' . $regip . '\',\'' . $lasttime . '\',\'' . $regip . '\',\'1\'' . $member_r[1] . ');');
		}  		UpdateTheFileOther(6, $userid, $mr['add_filepass'], 'member');
		ecmsEmptyShowKey($keyvname);
 		if ($tobind) { 			MemberConnect_BindUser($userid);
		}  		if ($sql) { 			if (($checked == 0) && ($public_r['regacttype'] == 1)) { 				include '../class/member_actfun.php';
				SendActUserEmail($userid, $username, $email);
			}  			if ($checked == 0) { 				$location = DoingReturnUrl('../../', $_POST['ecmsfrom']);
				printerror('RegisterSuccessCheck', $location, 1);
			}  			$logincookie = 0;
 			if ($ecms_config['member']['regcookietime']) { 				$logincookie = time() + $ecms_config['member']['regcookietime'];
			}  			$r = $empire->fetch1('select ' . eReturnSelectMemberF('*') . ' from ' . eReturnMemberTable() . ' where ' . egetmf('userid') . '=\'' . $userid . '\' limit 1');
			$set1 = esetcookie('mlusername', $username, $logincookie);
			$set2 = esetcookie('mluserid', $userid, $logincookie);
			$set3 = esetcookie('mlgroupid', $groupid, $logincookie);
			$set4 = esetcookie('mlrnd', $rnd, $logincookie);
			qGetLoginAuthstr($userid, $username, $rnd, $groupid, $logincookie);
			AddLoginCookie($r);
			$location = '../../memb../';
			$returnurl = getcvar('returnurl');
			if ($returnurl && !strstr($returnurl, 'e/member/iframe') && !strstr($returnurl, 'e/member/register') && !strstr($returnurl, 'enews=exit')) { 				$location = $returnurl;
			}  			$set5 = esetcookie('returnurl', '');
			echoJScloseWindow($reurl);
			exit();
		} 		else { 			printerror('DbError', $gotourl, 1);
		} 	}

	if ($enews == "qzonelogin") {
		$_SESSION["callback"] = $_SESSION["newsurl"] . "e/ikaimi/qq_api/enews.php?enews=qzonelogin_action&reurl=" . $_GET["reurl"];
		redirect_to_login($_SESSION["appid"], $_SESSION["appkey"], $_SESSION["callback"]);
	}
	else if ($enews == "qzonelogin_action") {
		$code = RepPostVar($_REQUEST["code"]);
		$token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=" . $_SESSION["appid"] . "&redirect_uri=" . urlencode($_SESSION["callback"]) . "&client_secret=" . $_SESSION["appkey"] . "&code=" . $code;
		$response = http_request($token_url);

		if (strpos($response, "callback") !== false) {
			$lpos = strpos($response, "(");
			$rpos = strrpos($response, ")");
			$response = substr($response, $lpos + 1, $rpos - $lpos - 1);
			$msg = json_decode($response);

			if (isset($msg->error)) {
				echo "<h3>error:</h3>" . $msg->error;
				echo "<h3>msg  :</h3>" . $msg->error_description;
				exit();
			}
		}

		$params = array();
		parse_str($response, $params);
		$params["access_token"] = RepPostVar($params["access_token"]);
		$_SESSION["access_token"] = $params["access_token"];
		$graph_url = "https://graph.qq.com/oauth2.0/me?access_token=" . $params["access_token"];
		$str = http_request($graph_url);

		if (strpos($str, "callback") !== false) {
			$lpos = strpos($str, "(");
			$rpos = strrpos($str, ")");
			$str = substr($str, $lpos + 1, $rpos - $lpos - 1);
		}

		$user = json_decode($str);

		if (isset($user->error)) {
			echo "<h3>error:</h3>" . $user->error;
			echo "<h3>msg  :</h3>" . $user->error_description;
			exit();
		}

		$openid = $user->openid;

		if (!trim($openid)) {
			exit("openid不对" . $openid);
		}

		$openid = RepPostVar($openid);
		$_SESSION["openid"] = $openid;
		connect2qzone_bind($_GET["reurl"]);
	}

	db_close();
	$empire = NULL;
}
else {
	echo "document.writeln('<h3 style=\"color:#f00;display:block;\">您访问的域名未获授权！</h3>');";
}

?>
