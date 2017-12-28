<?php

require '../../class/connect.php';
require '../../class/db_sql.php';
require '../class/user.php';
require '../../data/dbcache/MemberLevel.php';
require '../' . LoadLang('pub/fun.php');
$Authorization = explode('.', $_SERVER['SERVER_NAME']);
$Authorization = $Authorization[count($Authorization) - 2] . '.' . $Authorization[count($Authorization) - 1];

if ($Authorization !== 'bbs.52jscn.com') {
	$link = db_connect();
	$empire = new mysqlquery();
	$enews = $_POST['enews'];

	if (empty($enews)) {
		$enews = $_GET['enews'];
	}

	eCheckCloseMods('member');
	$tobind = (int) $_POST['tobind'];
	if ($tobind && (($enews == 'login') || ($enews == 'register'))) {
		eCheckCloseMods('mconnect');
		eCheckCloseMemberConnect();
		session_start();
		include '../memberconnect/memberconnectfun.php';
	}

	if (($enews == 'login') || ($enews == 'exit')) {
		function qlogin($add)
		{
			global $empire;
			global $dbtbpre;
			global $public_r;
			global $ecms_config;

			if ($ecms_config['member']['loginurl']) {
				exit();
			}

			$dopr = 1;

			if ($_POST['prtype']) {
				$dopr = 9;
			}

			$username = trim($add['username']);
			$password = trim($add['password']);
			if (!$username || !$password) {
				return 'emptyLogin';
			}

			$tobind = (int) $add['tobind'];

			if (chemail($username)) {
				$r = $empire->fetch1('select username from ' . $dbtbpre . 'enewsmember where email=\'' . $username . '\'');
				$username = $r['username'];
			}
			else {
				$username = RepPostVar($username);
			}

			$password = RepPostVar($password);
			$num = 0;
			$r = $empire->fetch1('select ' . eReturnSelectMemberF('*') . ' from ' . eReturnMemberTable() . ' where ' . egetmf('username')  . '=\'' . $username . '\' limit 1');

			if (!$r['userid']) {
				return 'failuserid';
				exit();
			}

			if (!eDoCkMemberPw($password, $r['password'], $r['salt'])) {
				return 'failpassword';
				exit();
			}

			if ($r['checked'] == 0) {
				if ($public_r['regacttype'] == 1) {
					return 'failcheck';
					exit();
				}
				else {
					return 'failcheck';
					exit();
				}
			}

			if ($tobind) {
				MemberConnect_BindUser($r['userid']);
			}

			$rnd = make_password(20);

			if (empty($r['groupid'])) {
				$r['groupid'] = eReturnMemberDefGroupid();
			}

			$r['groupid'] = (int) $r['groupid'];
			$lasttime = time();
			$lastip = egetip();
			$usql = $empire->query('update ' . eReturnMemberTable() . ' set ' . egetmf('rnd') . '=\'' . $rnd . '\',' . egetmf('groupid') . '=\'' . $r['groupid'] . '\' where ' . egetmf('userid') . '=\'' . $r['userid'] . '\'');
			$empire->query('update ' . $dbtbpre . 'enewsmemberadd set lasttime=\'' . $lasttime . '\',lastip=\'' . $lastip . '\',loginnum=loginnum+1 where userid=\'' . $r['userid'] . '\'');
			$lifetime = (int) $add['lifetime'];
			$logincookie = 0;

			if ($lifetime) {
				$logincookie = time() + $lifetime;
			}

			$set1 = esetcookie('mlusername', $username, $logincookie);
			$set2 = esetcookie('mluserid', $r['userid'], $logincookie);
			$set3 = esetcookie('mlgroupid', $r['groupid'], $logincookie);
			$set4 = esetcookie('mlrnd', $rnd, $logincookie);
			qGetLoginAuthstr($r['userid'], $username, $rnd, $r['groupid'], $logincookie);
			AddLoginCookie($r);
			$location = '../member/cp/';
			$returnurl = getcvar('returnurl');

			if ($returnurl) {
				$location = $returnurl;
			}

			if (strstr($_SERVER['HTTP_REFERER'], 'e/member/iframe')) {
				$location = '../member/iframe/';
			}

			if (strstr($location, 'enews=exit') || strstr($location, 'e/member/register') || strstr($_SERVER['HTTP_REFERER'], 'e/member/register')) {
				$location = '../member/cp/';
				$_POST['ecmsfrom'] = '';
			}

			ecmsEmptyShowKey($keyvname);
			$set6 = esetcookie('returnurl', '');
			if ($set1 && $set2) {
				DoEpassport('login', $r['userid'], $username, $password, $r['salt'], $r['email'], $r['groupid'], $r['registertime']);
				$location = DoingReturnUrl($location, $_POST['ecmsfrom']);
				return $check = array('status' => 'loginsucess', 'mluserid' => $r['userid'], 'username' => $username, 'rnd' => $rnd);
			}
			else {
				printerror('NotCookie', 'history.go(-1)', $dopr);
			}
		}
		function qloginout($userid, $username, $rnd)
		{
			global $empire;
			global $public_r;
			global $ecms_config;
			$user_r = islogin();

			if ($ecms_config['member']['quiturl']) {
				Header('Location:' . $ecms_config['member']['quiturl']);
				exit();
			}

			EmptyEcmsCookie();
			$dopr = 1;

			if ($_GET['prtype']) {
				$dopr = 9;
			}

			$gotourl = '../../';

			if (strstr($_SERVER['HTTP_REFERER'], 'e/member/iframe')) {
				$gotourl = $public_r['newsurl'] . 'e/member/iframe/';
			}

			DoEpassport('logout', $user_r['userid'], $user_r['username'], '', '', '', '', '');
			$gotourl = DoingReturnUrl($gotourl, $_GET['ecmsfrom']);
			return 'exitsuccess';
		}
	}

	if ($enews == 'login') {
		$check = qlogin($_POST);
	}

	if ($enews == 'exit') {
		echo qloginout($myuserid, $myusername, $myrnd);
	}

	if ($check[status] != 'loginsucess') {
		echo $check;
	}
	else {
		$showinfo = 1;
	}

	if (!defined('InEmpireCMS')) {
		exit();
	}

	eCheckCloseMods('member');
	$myuserid = (int) $check['mluserid'];

	if (!$myuserid) {
		$myuserid = getcvar('mluserid');
	}

	$mhavelogin = 0;

	if ($myuserid) {
		$mhavelogin = 1;
		$myusername = $check[username];
		$myrnd = RepPostVar(getcvar('mlrnd'));

		if (is_array($check)) {
		}
		else {
			$myusername = RepPostVar(getcvar('mlusername'));
			$check['rnd'] = RepPostVar(getcvar('mlrnd'));
			$check[mluserid] = $myuserid;
			$mhavelogin = 2;
		}

		$r = $empire->fetch1('select ' . eReturnSelectMemberF('userid,username,groupid,userfen,money,userdate,havemsg,checked') . ' from ' . eReturnMemberTable() . ' where ' . egetmf('userid') . '=\'' . $check['mluserid'] . '\' and ' . egetmf('rnd') . '=\'' . $check['rnd'] . '\' limit 1');
		if (empty($r[userid]) || ($r[checked] == 0)) {
			EmptyEcmsCookie();
			$mhavelogin = 0;
		}

		if (empty($r[groupid])) {
			$groupid = eReturnMemberDefGroupid();
		}
		else {
			$groupid = $r[groupid];
		}

		$groupname = $level_r[$groupid]['groupname'];
		$userfen = $r[userfen];
		$money = $r[money];
		$userdate = 0;

		if ($r[userdate]) {
			$userdate = $r[userdate] - time();

			if ($userdate <= 0) {
				$userdate = 0;
			}
			else {
				$userdate = round($userdate / (24 * 3600));
			}
		}

		$havemsg = '';

		if ($r[havemsg]) {
			$havemsg = '<i><a href=\'' . $public_r['newsurl'] . 'e/member/msg/\' target=_blank title=您有新的信息><img src=/skin/img/pm.gif></a></i>';
		}

		$m = $empire->fetch1('select userpic from ' . $dbtbpre . 'enewsmemberadd where userid=\'' . $myuserid . '\' limit 1');
		$userpic = ($m['userpic'] ? $m['userpic'] : $public_r[newsurl] . 'skin/user/nouserpic.jpg');
		db_close();
	$empire = NULL;
	}

	$loginfo = "<div class='userinfo'><div class='title'><h3>会员中心</h3></div><dl class='loginafter'><dt><a href='" . $public_r["newsurl"] . "user/" . $myuserid . "/'><img src='" . $userpic . "' height='58' width='58'></a></dt><dd><p><a href='" . $public_r["newsurl"] . "user/" . $myuserid . "/'><span>" . $myusername . "</span></a>" . $havemsg . "</p> <p class='gfen'><em>积分：" . $userfen . "点</em></p></dd></dl><ul class='userlink'><li><a href='" . $public_r["newsurl"] . "e/member/cp/'target='_blank'>会员中心</a></li><li><a href='" . $public_r["newsurl"] . "e/member/EditInfo/'target='_blank'>个人资料</a></li><li><a href='" . $public_r["newsurl"] . "e/member/EditInfo/EditSafeInfo.php' target='_blank'>密码安全</a></li><li><a href='" . $public_r["newsurl"] . "e/DoInfo/ChangeClass.php?mid=1' target='_blank'>发布文章</a></li><li><a href='" . $public_r["newsurl"] . "e/DoInfo/ListInfo.php?mid=1' target='_blank'>我的文章</a></li><li><a href='javascript:void(0);' id='logout' onclick='LogOut()' target='_self'>退出登录</a></li></ul></div>";
	$notlogin = "<div class=\'title\'><h3>会员登录</h3><span><a href=\'e/member/register/index.php?tobind=0&groupid=1\' target=\'_blank\'>注册投稿</a></span></div><div class=\'form_head\' id=\'login\'><li><span class=\'ico-04\'>账号</span><input class=\'ipt-txt\' name=\'logusername\' id=\'logusername\' type=\'text\' onfocus=if(this.value==\'注册帐号或邮箱\')value=\'\'; value=\'注册帐号或邮箱\' placeholder=\'注册帐号或邮箱\' /></li><li><span class=\'ico-05\'>密码</span><input name=\'logpassword\' placeholder=\'输入密码\' type=\'password\'  value=\'\' id=\'logpassword\' class=\'ipt-txt\'/></li></div><div class=\'errmsg\' id=\'errmsg\'></div><div class=\'form_bottom\'><button type=\'submit\' class=\'login_btn\' id=\'login-sub\'>登 录</button><input style=\'display:none;\' type=\'checkbox\' id=\'keeplogin\' checked/><a class=\'login-qqbtn\' onclick=MM_openBrWindow(\'/e/member/qq_api/enews.php?enews=qzonelogin\',\'\',\'width=550,height=380\') href=\'javascript:void(0);\' border=\'0\' height=\'380\' width=\'550\'  target=\'_self\' title=\'只需一步 快速登录\'></a></div>";

	if ($showinfo == 1) {
		echo $loginfo;
	}

	if ((int) $_GET["loadjs"]) {
		if ($mhavelogin == 2) {
			echo "show_userinfo.innerHTML=\"" . $loginfo . "\";";
		}
		else {
			echo "show_userinfo.innerHTML=\"" . $notlogin . "\";";
		}

		echo "var WebUrl=\"";
		echo $public_r["newsurl"];
		echo "\";\r\n$(\"#login-sub\").live('click',function(){\r\n\t$('#errmsg').hide();\r\n\tvar user=$(\"#logusername\").val();   //获取用户名输入框的值\r\n\tvar pass=$(\"#logpassword\").val();   //获取密码输入框的值\r\n\tif(document.getElementById(\"keeplogin\").checked==true){\r\n\tvar lifetime=315360000;\r\n\t}\r\n\tif(user==\"\"){\r\n\t\t$('#errmsg').show().html(\"用户名不能为空！\");\r\n\t\t$(\"#username\").focus();\r\n\t\treturn false\r\n\t};\r\n\tif(user==\"输入用户名\"){\r\n\t\t$('#errmsg').show().html(\"用户名不能为空！\");\r\n\t\t$(\"#username\").focus();\r\n\t\treturn false\r\n\t};\r\n\tif(pass==\"\"){\r\n\t\t$('#errmsg').show().html(\"密码不能为空！\");\r\n\t\t$(\"#password\").focus();\r\n\t\treturn false\r\n\t};\r\n\t$.ajax({\r\n\t\ttype:\"POST\",url:WebUrl+\"e/member/AjaxLog/\",dataType:\"html\",data:{\r\n\t\t\t'username':user,'password':pass,enews:'login','lifetime':lifetime                      //提交字段\r\n\t\t}\r\n\t\t,beforeSend:function(){\r\n\t\t\t$('#errmsg').show().html('正在登陆...')\r\n\t\t}\r\n\t\t,success:function(data){\r\n\t\t\tif(data=='failuserid'){\r\n\t\t\t\t$('#errmsg').show().html('用户名错误！')\r\n\t\t\t}\r\n\t\t\telse if(data=='failpassword'){\r\n\t\t\t\t$('#errmsg').show().html('密码错误！')\r\n\t\t\t}\r\n\t\t\telse if(data=='failcheck'){\r\n\t\t\t\t$('#errmsg').show().html('你的账号还没有激活，<a href='+WebUrl+'e/member/register/regsend.php target=_blank>重发激活邮件！</a>')\r\n\t\t\t}\r\n\t\t\telse{\r\n\t\t\t\t$(\"#errmsg\").hide();\r\n\t\t\t\t$('#show_userinfo').show().html(data);\r\n\t\t\t\t$(\"#ikaimi_bg\").fadeOut(0);\r\n\t\t\t\t$(\"#ikaimi_login\").hide();\r\n\t\t\t\t$('#shortinfo').html('";
		echo $shortinfo;
		echo "')\r\n\r\n\t\t\t}\r\n\t\t}\r\n\t})\r\n});\r\nfunction LogOut(){\r\n\t$.post(WebUrl+\"e/member/AjaxLog/?enews=exit\",function(msg){\r\n\t\tif(msg=='exitsuccess'){\r\n\t\t\t$(\"#show_userinfo\").html('";
		echo $notlogin;
		echo "');\r\n\t\t\t$('#shortinfo').html(\"";
		echo $notlogin;
		echo "\");\r\n\r\n\t\t}\r\n\t})\r\n}\r\nfunction MM_openBrWindow(theURL,winName,features) {window.open(theURL,winName,features);}\r\n";
	}
}
else {
	echo "<h3 style=\"color:#f00;display:block;\">您访问的域名未获授权！</h3>";
}

?>