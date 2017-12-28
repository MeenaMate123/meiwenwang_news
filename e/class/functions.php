<?php
//BY:bbs.52jscn.com QQ:278869155
function EcmsReturnAdminStyle()
{
	global $public_r;
	$adminstyle = (int) getcvar('loginadminstyleid', 1);

	if (!strstr($public_r['adminstyle'], ',' . $adminstyle . ',')) {
		$adminstyle = ($public_r['defadminstyle'] ? $public_r['defadminstyle'] : 1);
	}

	return $adminstyle;
}

function AdminReturnClassLink($classid)
{
	global $class_r;
	global $editor;
	global $fun_r;
	global $ecmscheck;
	global $ecms_hashur;
	$addcheck = '';

	if ($ecmscheck) {
		$addcheck = '&ecmscheck=1';
	}

	if ($editor == 1) {
		$addurl = '../';
	}

	if (empty($class_r[$classid][featherclass])) {
		$class_r[$classid][featherclass] = '|';
	}

	$r = explode('|', $class_r[$classid][featherclass] . $classid . '|');
	$string = '<a href="' . $addurl . 'ListAllInfo.php?tbname=' . $class_r[$classid][tbname] . $addcheck . $ecms_hashur['ehref'] . '">' . $fun_r['AdminInfo'] . '</a>';
	$count = count($r) - 1;
	$i = 1;

	for (; $i < $count; $i++) {
		$curl = ($class_r[$r[$i]][islast] ? 'ListNews.php?classid=' . $r[$i] . $addcheck . $ecms_hashur['ehref'] : 'ListAllInfo.php?tbname=' . $class_r[$r[$i]][tbname] . '&classid=' . $r[$i] . $addcheck . $ecms_hashur['ehref']);
		$string .= '&nbsp;>&nbsp;<a href="' . $addurl . $curl . '">' . $class_r[$r[$i]][classname] . '</a>';
	}

	return $string;
}

function AddCheckViewCode()
{
	$code = 'if(!defined(\'InEmpireCMS\'))' . "\r\n" . '{' . "\r\n" . '	exit();' . "\r\n" . '}';
	return $code;
}

function AddCheckViewTempCode()
{
	$code = '<?php' . "\r\n" . 'if(!defined(\'InEmpireCMS\'))' . "\r\n" . '{' . "\r\n" . '	exit();' . "\r\n" . '}' . "\r\n" . '?>';
	return $code;
}

function page2($num, $line, $page_line, $start, $page, $search)
{
	global $fun_r;

	if ($num <= $line) {
		return '<span class="epages"><a title="' . $fun_r['admintrecord'] . '">&nbsp;<b>' . $num . '</b> </a>&nbsp;&nbsp;</span>';
	}

	$search = RepPostStr($search, 1);
	$url = eReturnSelfPage(0) . '?page';
	$snum = 2;
	$totalpage = ceil($num / $line);
	$firststr = '<a title="' . $fun_r['admintrecord'] . '">&nbsp;<b>' . $num . '</b> </a>&nbsp;&nbsp;';

	if ($page != 0) {
		$toppage = '<a href="' . $url . '=0' . $search . '">' . $fun_r['adminstartpage'] . '</a>&nbsp;';
		$pagepr = $page - 1;
		$prepage = '<a href="' . $url . '=' . $pagepr . $search . '">' . $fun_r['adminpripage'] . '</a>';
	}

	if ($page != $totalpage - 1) {
		$pagenex = $page + 1;
		$nextpage = '&nbsp;<a href="' . $url . '=' . $pagenex . $search . '">' . $fun_r['adminnextpage'] . '</a>';
		$lastpage = '&nbsp;<a href="' . $url . '=' . ($totalpage - 1) . $search . '">' . $fun_r['adminlastpage'] . '</a>';
	}

	$starti = (($page - $snum) < 0 ? 0 : $page - $snum);
	$no = 0;
	$i = $starti;

	for (; $no < $page_line; $i++) {
		$no++;

		if ($page == $i) {
			$is_1 = '<b>';
			$is_2 = '</b>';
		}
		else {
			$is_1 = '<a href="' . $url . '=' . $i . $search . '">';
			$is_2 = '</a>';
		}

		$pagenum = $i + 1;
		$returnstr .= '&nbsp;' . $is_1 . $pagenum . $is_2;
	}

	$returnstr = $firststr . $toppage . $prepage . $returnstr . $nextpage . $lastpage;
	return '<span class="epages">' . $returnstr . '</span>';
}

function postpage($num, $line, $page_line, $start, $page, $form)
{
	global $fun_r;

	if ($num <= $line) {
		return '';
	}

	$snum = 2;
	$totalpage = ceil($num / $line);
	$firststr = '<a title="' . $fun_r['admintrecord'] . '">&nbsp;<b>' . $num . '</b> </a>&nbsp;&nbsp;';

	if ($page != 0) {
		$toppage = '<a href="#ecms" onclick="javascript:GotoPostPage(0,0);">' . $fun_r['adminstartpage'] . '</a>&nbsp;';
		$pagepr = $page - 1;
		$prepage = '<a href="#ecms" onclick="javascript:GotoPostPage(' . $pagepr . ',0);">' . $fun_r['adminpripage'] . '</a>';
	}

	if ($page != $totalpage - 1) {
		$pagenex = $page + 1;
		$nextpage = '&nbsp;<a href="#ecms" onclick="javascript:GotoPostPage(' . $pagenex . ',0);">' . $fun_r['adminnextpage'] . '</a>';
		$lastpage = '&nbsp;<a href="#ecms" onclick="javascript:GotoPostPage(' . ($totalpage - 1) . ',0);">' . $fun_r['adminlastpage'] . '</a>';
	}

	$starti = (($page - $snum) < 0 ? 0 : $page - $snum);
	$no = 0;
	$i = $starti;

	for (; $no < $page_line; $i++) {
		$no++;

		if ($page == $i) {
			$is_1 = '<b>';
			$is_2 = '</b>';
		}
		else {
			$is_1 = '<a href="#ecms" onclick="javascript:GotoPostPage(' . $i . ',0);">';
			$is_2 = '</a>';
		}

		$pagenum = $i + 1;
		$returnstr .= '&nbsp;' . $is_1 . $pagenum . $is_2;
	}

	$returnstr = $firststr . $toppage . $prepage . $returnstr . $nextpage . $lastpage;
	$returnstr .= '<script>' . "\r\n" . '	function GotoPostPage(page,start){' . "\r\n" . '		' . $form . '.page.value=page;' . "\r\n" . '		' . $form . '.start.value=start;' . "\r\n" . '		' . $form . '.submit();' . "\r\n" . '	}' . "\r\n" . '	</script>';
	return $returnstr;
}

function GetModTable($mid)
{
	global $empire;
	global $dbtbpre;
	$r = $empire->fetch1('select tid,tbname from ' . $dbtbpre . 'enewsmod where mid=\'' . $mid . '\'');
	return $r;
}

function CreateZtPath($ztpath)
{
	$createpath = ECMS_PATH . $ztpath;
	$mk = DoMkdir($createpath);
	$createfilepath = $createpath . '/uploadfile';
	$mk1 = DoMkdir($createfilepath);
}

function CreateClassPath($classpath)
{
	$createpath = ECMS_PATH . $classpath;
	$mk = DoMkdir($createpath);
	$createfilepath = ECMS_PATH . 'd/file/' . $classpath;
	$mk1 = DoMkdir($createfilepath);
}

function CreateInfoTypePath($tpath)
{
	$createpath = ECMS_PATH . $tpath;
	$mk = DoMkdir($createpath);
}

function DelListEnews()
{
	$file = ECMS_PATH . 'e/data/fc/ListEnews.php';
	DelFiletext($file);
	$file1 = ECMS_PATH . 'e/data/fc/ListClass0.php';
	DelFiletext($file1);
	$file2 = ECMS_PATH . 'e/data/fc/ListClass1.php';
	DelFiletext($file2);
}

function DelOneTempTmpfile($classid)
{
	$file = ECMS_PATH . 'e/data/tmp/dt_temp' . $classid . '.php';

	if (file_exists($file)) {
		DelFiletext($file);
	}
}

function RepPhpAspJspcode($string)
{
	global $public_r;

	if (!$public_r[candocode]) {
		$string = str_replace('<\\', '&lt;\\', $string);
		$string = str_replace('<?', '&lt;?', $string);
		$string = str_replace('<%', '&lt;%', $string);

		if (@stristr($string, ' language')) {
			$string = preg_replace(array('!<script!i', '!</script>!i'), array('&lt;script', '&lt;/script&gt;'), $string);
		}
	}

	return $string;
}

function RepPhpAspJspcodeText($string)
{
	$string = str_replace('<\\', '&lt;\\', $string);
	$string = str_replace('<?', '&lt;?', $string);
	$string = str_replace('<%', '&lt;%', $string);

	if (@stristr($string, ' language')) {
		$string = preg_replace(array('!<script!i', '!</script>!i'), array('&lt;script', '&lt;/script&gt;'), $string);
	}

	$string = str_replace('<!--code.start-->', '&lt;!--code.start--&gt;', $string);
	$string = str_replace('<!--code.end-->', '&lt;!--code.end--&gt;', $string);
	return $string;
}

function RepFilenameQz($qz, $ecms = 0)
{
	if (empty($ecms)) {
		$qz = str_replace('/', '', $qz);
		$qz = str_replace('\\', '', $qz);
	}

	$qz = str_replace('#', '', $qz);
	$qz = str_replace('&', '', $qz);
	$qz = str_replace(':', '', $qz);
	$qz = str_replace(';', '', $qz);
	$qz = str_replace('<', '', $qz);
	$qz = str_replace('>', '', $qz);
	$qz = str_replace('?', '', $qz);
	$qz = str_replace('*', '', $qz);
	$qz = str_replace('%', '', $qz);
	$qz = str_replace('|', '', $qz);
	$qz = str_replace('"', '', $qz);
	$qz = str_replace('\'', '', $qz);
	$qz = str_replace('.', '', $qz);
	return $qz;
}

function RepPathStr($path)
{
	$path = str_replace('\\', '', $path);
	$path = str_replace('/', '', $path);
	return $path;
}

function ReturnCheckDoRep()
{
	global $empire;
	global $dbtbpre;
	$befrom = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'enewsbefrom');
	$writer = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'enewswriter');
	$words = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'enewswords');
	$key = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'enewskey');
	$str = ',' . $befrom . ',' . $writer . ',' . $words . ',' . $key . ',';
	return $str;
}

function ReturnCheckDoRepStr()
{
	global $public_r;
	return explode(',', $public_r[checkdorepstr]);
}

function GetPathname($classname)
{
	$c = explode('/', $classname);
	$count = count($c) - 1;
	$cr[0] = $c[$count];
	$len = strlen($cr[0]);
	$cr[1] = substr($classname, 0, strlen($classname) - $len);
	return $cr;
}

function ChangeEnewsData($userid, $username)
{
	CheckLevel($userid, $username, $classid, 'changedata');
	GetConfig(1);
	GetClass();
	GetMemberLevel();
	GetSearchAllTb();
	insert_dolog('');
	printerror('ChangeDataSuccess', 'history.go(-1)');
}

function ReturnPathFile($filename)
{
	$fr = explode('/', $filename);
	$count = count($fr) - 1;
	return $fr[$count];
}

function sys_ReturnBqClassUrl($r)
{
	global $public_r;

	if ($r[wburl]) {
		$classurl = $r[wburl];
	}
	else if ($r['listdt']) {
		$rewriter = eReturnRewriteClassUrl($r['classid'], 1);
		$classurl = $rewriter['pageurl'];
	}
	else if ($r['classurl']) {
		$classurl = $r['classurl'];
	}
	else {
		$classurl = $public_r['newsurl'] . $r['classpath'] . '/';
	}

	return $classurl;
}

function sys_ReturnBqZtUrl($r)
{
	global $public_r;

	if ($r['zturl']) {
		$zturl = $r['zturl'];
	}
	else {
		$zturl = $public_r['newsurl'] . $r['ztpath'] . '/';
	}

	return $zturl;
}

function TogTwoArray($r, $ra)
{
	$returnr = array_merge($r, $ra);
	return $returnr;
}

function DownLoadFile($file, $filepath, $ecms = 0)
{
	if (empty($file)) {
		printerror('FileNotExist', 'history.go(-1)');
	}

	if (!file_exists($filepath)) {
		printerror('FileNotExist', '');
	}

	$filesize = @filesize($filepath);
	Header('Content-type: application/octet-stream');
	Header('Accept-Ranges: bytes');
	Header('Accept-Length: ' . $filesize);
	Header('Content-Disposition: attachment; filename=' . $file);
	echo ReadFiletext($filepath);

	if ($ecms == 1) {
		DelFiletext($filepath);
	}
}

function DownLoadFileText($filetext, $filename)
{
	if (empty($filetext) || empty($filename)) {
		return '';
	}

	$filesize = strlen($filetext);
	Header('Content-type: application/octet-stream');
	Header('Accept-Ranges: bytes');
	Header('Accept-Length: ' . $filesize);
	Header('Content-Disposition: attachment; filename=' . $filename);
	echo $filetext;
}

function GetFcfiletext($file)
{
	$str1 = 'document.write("';
	$str2 = '");';
	$text = ReadFiletext($file);
	$text = stripSlashes(str_replace($str2, '', str_replace($str1, '', $text)));
	return $text;
}

function CheckTempGroup($gid)
{
	global $empire;
	global $dbtbpre;

	if (empty($gid)) {
		$gid = GetDoTempGid();
	}

	$gid = (int) $gid;
	$r = $empire->fetch1('select gid,gname from ' . $dbtbpre . 'enewstempgroup where gid=\'' . $gid . '\'');

	if (empty($r['gid'])) {
		printerror('ErrorUrl', '');
	}

	return $r['gname'];
}

function ReturnFormHidden($vname, $value)
{
	$value = ehtmlspecialchars(ClearAddsData($value));
	return '<input type=hidden name="' . $vname . '" value="' . $value . '">';
}

function TranmoreIsOpen($ecms = 'addinfo')
{
	$open = 0;
	$file = 'ecmseditor/tranmore/tranmore.php';

	if ($ecms == 'addinfo') {
		$file = 'ecmseditor/tranmore/tranmore.php';
	}
	else if ($ecms == 'editor') {
		$file = '../../tranmore/tranmore.php';
	}
	else if ($ecms == 'filemain') {
		$file = 'tranmore/tranmore.php';
	}

	if (file_exists($file)) {
		$open = 1;
	}

	return $open;
}

function ReplaceKey($newstext, $classid = 0)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $class_r;
	if (empty($newstext) || ($class_r[$classid]['keycid'] == -1)) {
		return $newstext;
	}

	$where = '';

	if (!empty($class_r[$classid]['keycid'])) {
		$where = ' where cid=\'' . $class_r[$classid]['keycid'] . '\'';
	}

	$sql = $empire->query('select keyname,keyurl from ' . $dbtbpre . 'enewskey' . $where);

	while ($r = $empire->fetch($sql)) {
		if (STR_IREPLACE) {
			$newstext = (empty($public_r[repkeynum]) ? str_ireplace($r[keyname], '<a href=' . $r[keyurl] . ' target=_blank class=infotextkey>' . $r[keyname] . '</a>', $newstext) : preg_replace('/' . $r[keyname] . '/i', '<a href=' . $r[keyurl] . ' target=_blank class=infotextkey>' . $r[keyname] . '</a>', $newstext, $public_r[repkeynum]));
		}
		else {
			$newstext = (empty($public_r[repkeynum]) ? str_replace($r[keyname], '<a href=' . $r[keyurl] . ' target=_blank class=infotextkey>' . $r[keyname] . '</a>', $newstext) : preg_replace('/' . $r[keyname] . '/i', '<a href=' . $r[keyurl] . ' target=_blank class=infotextkey>' . $r[keyname] . '</a>', $newstext, $public_r[repkeynum]));
		}
	}

	return $newstext;
}

function ReplaceWord($newstext)
{
	global $empire;
	global $dbtbpre;

	if (empty($newstext)) {
		return $newstext;
	}

	$sql = $empire->query('select newword,oldword from ' . $dbtbpre . 'enewswords');

	while ($r = $empire->fetch($sql)) {
		$newstext = str_replace($r[oldword], $r[newword], $newstext);
	}

	return $newstext;
}

function DoReplaceKeyAndWord($newstext, $dokey, $classid = 0)
{
	global $public_r;
	$docheckrep = returncheckdorepstr();
	if (($public_r['dorepword'] == 1) && $docheckrep[3]) {
		$newstext = replaceword($newstext);
	}

	if (($public_r['dorepkey'] == 1) && $docheckrep[4] && !empty($dokey)) {
		$newstext = replacekey($newstext, $classid);
	}

	return $newstext;
}

function RenameListfile($classid, $lencord, $num, $type, $newtype, $classpath)
{
	$page = ceil($num / $lencord);
	$j = 1;

	for (; $j <= $page; $j++) {
		if ($j == 1) {
			$listfile = ECMS_PATH . $classpath . '/index';
		}
		else {
			$listfile = ECMS_PATH . $classpath . '/index_' . $j;
		}

		@rename($listfile . $type, $listfile . $newtype);
	}
}

function TitleFont($titlefont, $titlecolor = '')
{
	$add = $titlecolor . ',';

	if ($titlecolor == 'no') {
		$add = '';
	}

	if ($titlefont[b]) {
		$add .= 'b|';
	}

	if ($titlefont[i]) {
		$add .= 'i|';
	}

	if ($titlefont[s]) {
		$add .= 's|';
	}

	if ($add == ',') {
		$add = '';
	}

	return $add;
}

function AddInfoToZt($ztid, $zcid, $classid, $id, $newstime, $isgood = 0, $ecms = 0)
{
	global $empire;
	global $dbtbpre;
	global $class_r;

	if ($ecms == 1) {
		$infor = $empire->fetch1('select zid,ztid,cid from ' . $dbtbpre . 'enewsztinfo where ztid=\'' . $ztid . '\' and classid=\'' . $classid . '\' and id=\'' . $id . '\' limit 1');

		if ($infor['ztid']) {
			if ($infor['cid'] != $zcid) {
				$empire->query('update ' . $dbtbpre . 'enewsztinfo set cid=\'' . $zcid . '\',newstime=\'' . $newstime . '\' where zid=\'' . $infor['zid'] . '\' limit 1');
			}
		}
		else {
			$mid = $class_r[$classid]['modid'];
			$empire->query('insert into ' . $dbtbpre . 'enewsztinfo(ztid,cid,classid,id,newstime,mid,isgood) values(\'' . $ztid . '\',\'' . $zcid . '\',\'' . $classid . '\',\'' . $id . '\',\'' . $newstime . '\',\'' . $mid . '\',\'' . $isgood . '\');');
		}
	}
	else {
		$mid = $class_r[$classid]['modid'];
		$empire->query('insert into ' . $dbtbpre . 'enewsztinfo(ztid,cid,classid,id,newstime,mid,isgood) values(\'' . $ztid . '\',\'' . $zcid . '\',\'' . $classid . '\',\'' . $id . '\',\'' . $newstime . '\',\'' . $mid . '\',\'' . $isgood . '\');');
	}
}

function AddMoreInfoToZt($ztid, $zcid, $tbname, $where, $ecms = 0)
{
	global $empire;
	global $dbtbpre;
	global $class_r;

	if (empty($where)) {
		return '';
	}

	$sql = $empire->query('select id,classid,newstime from ' . $dbtbpre . 'ecms_' . $tbname . ($ecms == 0 ? '' : '_index') . ' where ' . $where);

	while ($r = $empire->fetch($sql)) {
		$zinfor = $empire->fetch1('select zid,ztid,cid from ' . $dbtbpre . 'enewsztinfo where ztid=\'' . $ztid . '\' and classid=\'' . $r['classid'] . '\' and id=\'' . $r['id'] . '\' limit 1');

		if ($zinfor['ztid']) {
			if ($zinfor['cid'] != $zcid) {
				$empire->query('update ' . $dbtbpre . 'enewsztinfo set cid=\'' . $zcid . '\' where zid=\'' . $zinfor['zid'] . '\' limit 1');
			}
		}
		else {
			$mid = $class_r[$r[classid]]['modid'];
			$empire->query('insert into ' . $dbtbpre . 'enewsztinfo(ztid,cid,classid,id,newstime,mid,isgood) values(\'' . $ztid . '\',\'' . $zcid . '\',\'' . $r['classid'] . '\',\'' . $r['id'] . '\',\'' . $r['newstime'] . '\',\'' . $mid . '\',\'0\');');
		}
	}
}

function InsertZtInfo($ztids, $zcids, $oldztids, $oldzcids, $classid, $id, $newstime)
{
	global $empire;
	global $dbtbpre;
	global $class_r;

	if ($zcids == $oldzcids) {
		return '';
	}

	$haveztids = '';
	$dh = '';

	if ($zcids) {
		$r = explode(',', $zcids);
		$count = count($r);
		$i = 0;

		for (; $i < $count; $i++) {
			$cid = (int) $r[$i];

			if (!$cid) {
				continue;
			}

			if ($cid < 0) {
				$thisztid = abs($cid);
				$cid = 0;
			}
			else {
				$zcr = $empire->fetch1('select ztid from ' . $dbtbpre . 'enewszttype where cid=\'' . $cid . '\' limit 1');

				if (!$zcr['ztid']) {
					continue;
				}

				$thisztid = $zcr['ztid'];
			}

			addinfotozt($thisztid, $cid, $classid, $id, $newstime, 0, 1);
			$haveztids .= $dh . $thisztid;
			$dh = ',';
		}
	}

	if ($oldztids) {
		$dr = explode(',', $oldztids);
		$dcount = count($dr);
		$di = 0;

		for (; $di < $dcount; $di++) {
			$dztid = (int) $dr[$di];
			if (!$dztid || strstr(',' . $haveztids . ',', ',' . $dztid . ',')) {
				continue;
			}

			$empire->query('delete from ' . $dbtbpre . 'enewsztinfo where ztid=\'' . $dztid . '\' and classid=\'' . $classid . '\' and id=\'' . $id . '\'');
		}
	}
}

function DelZtInfo($where)
{
	global $empire;
	global $dbtbpre;
	global $class_r;

	if (!$where) {
		return '';
	}

	$empire->query('delete from ' . $dbtbpre . 'enewsztinfo where ' . $where);
}

function InfoInsertToWorkflow($id, $classid, $wfid, $userid, $username)
{
	global $empire;
	global $dbtbpre;
	global $class_r;
	$wfitemr = $empire->fetch1('select tid,tno,groupid,userclass,username,tstatus from ' . $dbtbpre . 'enewsworkflowitem where wfid=\'' . $wfid . '\' order by tno limit 1');
	$empire->query('insert into ' . $dbtbpre . 'enewswfinfo(id,classid,wfid,tid,groupid,userclass,username,checknum,tstatus,checktno) values(\'' . $id . '\',\'' . $classid . '\',\'' . $wfid . '\',\'' . $wfitemr['tid'] . '\',\'' . $wfitemr['groupid'] . '\',\'' . $wfitemr['userclass'] . '\',\'' . $wfitemr['username'] . '\',1,\'' . $wfitemr['tstatus'] . '\',0);');
	InsertWfLog($classid, $id, $wfid, 0, $username, '', 1, 0);
}

function InfoUpdateToWorkflow($id, $classid, $wfid, $userid, $username)
{
	global $empire;
	global $dbtbpre;
	global $class_r;
	$wfinfor = $empire->fetch1('select checknum,wfid,tid,checktno from ' . $dbtbpre . 'enewswfinfo where id=\'' . $id . '\' and classid=\'' . $classid . '\' limit 1');

	if ($wfinfor[checktno] != '101') {
		return '';
	}

	if ($wfinfor[tid]) {
		$ywfitemr = $empire->fetch1('select tno from ' . $dbtbpre . 'enewsworkflowitem where tid=\'' . $wfinfor['tid'] . '\'');
		$wfitemr = $empire->fetch1('select tid,tno,groupid,userclass,username,tstatus from ' . $dbtbpre . 'enewsworkflowitem where wfid=\'' . $wfinfor['wfid'] . '\' and tno>' . $ywfitemr['tno'] . ' order by tno limit 1');
	}
	else {
		$wfitemr = $empire->fetch1('select tid,tno,groupid,userclass,username,tstatus from ' . $dbtbpre . 'enewsworkflowitem where wfid=\'' . $wfinfor['wfid'] . '\' order by tno limit 1');
	}

	$empire->query('update ' . $dbtbpre . 'enewswfinfo set tid=\'' . $wfitemr['tid'] . '\',groupid=\'' . $wfitemr['groupid'] . '\',userclass=\'' . $wfitemr['userclass'] . '\',username=\'' . $wfitemr['username'] . '\',checknum=checknum+1,tstatus=\'' . $wfitemr['tstatus'] . '\',checktno=\'0\' where id=\'' . $id . '\' and classid=\'' . $classid . '\' limit 1');
	InsertWfLog($classid, $id, $wfinfor[wfid], 0, $username, '', $wfinfor[checknum], 0);
}

function InsertWfLog($classid, $id, $wfid, $tid, $username, $checktext, $checknum, $checktype)
{
	global $empire;
	global $dbtbpre;
	global $class_r;
	global $lur;
	$checktime = time();
	$checktext = RepPostStr($checktext);
	$empire->query('insert into ' . $dbtbpre . 'enewswfinfolog(id,classid,wfid,tid,username,checktime,checktext,checknum,checktype) values(\'' . $id . '\',\'' . $classid . '\',\'' . $wfid . '\',\'' . $tid . '\',\'' . $username . '\',\'' . $checktime . '\',\'' . $checktext . '\',\'' . $checknum . '\',\'' . $checktype . '\');');
}

function eInsertTags($tags, $classid, $id, $newstime)
{
	global $empire;
	global $dbtbpre;
	global $class_r;

	if (!trim($tags)) {
		return '';
	}

	$tags = RepPostVar($tags);
	$classid = (int) $classid;
	$id = (int) $id;
	$mid = (int) $class_r[$classid][modid];
	$tr = explode(',', $tags);
	$count = count($tr);
	$i = 0;

	for (; $i < $count; $i++) {
		$tagname = $tr[$i];

		if (empty($tagname)) {
			continue;
		}

		$r = $empire->fetch1('select tagid from ' . $dbtbpre . 'enewstags where tagname=\'' . $tagname . '\' limit 1');

		if ($r[tagid]) {
			$datar = $empire->fetch1('select tagid,classid,newstime from ' . $dbtbpre . 'enewstagsdata where tagid=\'' . $r['tagid'] . '\' and id=\'' . $id . '\' and mid=\'' . $mid . '\' limit 1');

			if ($datar[tagid]) {
				if (($datar[classid] != $classid) || ($datar[newstime] != $newstime)) {
					$empire->query('update ' . $dbtbpre . 'enewstagsdata set classid=\'' . $classid . '\',newstime=\'' . $newstime . '\' where tagid=\'' . $r['tagid'] . '\' and id=\'' . $id . '\' and mid=\'' . $mid . '\' limit 1');
				}
			}
			else {
				$empire->query('update ' . $dbtbpre . 'enewstags set num=num+1 where tagid=\'' . $r['tagid'] . '\'');
				$empire->query('insert into ' . $dbtbpre . 'enewstagsdata(tagid,classid,id,newstime,mid) values(\'' . $r['tagid'] . '\',\'' . $classid . '\',\'' . $id . '\',\'' . $newstime . '\',\'' . $mid . '\');');
			}
		}
		else {
			$empire->query('insert into ' . $dbtbpre . 'enewstags(tagname,num,isgood,cid) values(\'' . $tagname . '\',1,0,0);');
			$tagid = $empire->lastid();
			$empire->query('insert into ' . $dbtbpre . 'enewstagsdata(tagid,classid,id,newstime,mid) values(\'' . $tagid . '\',\'' . $classid . '\',\'' . $id . '\',\'' . $newstime . '\',\'' . $mid . '\');');
		}
	}
}

function eReturnInfoTags($classid, $id, $mid)
{
	global $empire;
	global $dbtbpre;
	global $class_r;
	if (!$mid || !$id) {
		return '';
	}

	$tags = '';
	$dh = '';
	$sql = $empire->query('select tagid from ' . $dbtbpre . 'enewstagsdata where id=\'' . $id . '\' and mid=\'' . $mid . '\' order by tagid');

	while ($r = $empire->fetch($sql)) {
		$tr = $empire->fetch1('select tagname from ' . $dbtbpre . 'enewstags where tagid=\'' . $r['tagid'] . '\'');
		$tags .= $dh . $tr[tagname];
		$dh = ',';
	}

	return $tags;
}

function MoveCheckInfoData($tbname, $checked, $stb, $where)
{
	global $empire;
	global $dbtbpre;

	if (empty($checked)) {
		$ytbname = $dbtbpre . 'ecms_' . $tbname . '_check';
		$ydatatbname = $dbtbpre . 'ecms_' . $tbname . '_check_data';
		$ntbname = $dbtbpre . 'ecms_' . $tbname;
		$ndatatbname = $dbtbpre . 'ecms_' . $tbname . '_data_' . $stb;
	}
	else {
		$ytbname = $dbtbpre . 'ecms_' . $tbname;
		$ydatatbname = $dbtbpre . 'ecms_' . $tbname . '_data_' . $stb;
		$ntbname = $dbtbpre . 'ecms_' . $tbname . '_check';
		$ndatatbname = $dbtbpre . 'ecms_' . $tbname . '_check_data';
	}

	$empire->query('replace into ' . $ntbname . ' select * from ' . $ytbname . ' where ' . $where);
	$empire->query('replace into ' . $ndatatbname . ' select * from ' . $ydatatbname . ' where ' . $where);
	$empire->query('delete from ' . $ytbname . ' where ' . $where);
	$empire->query('delete from ' . $ydatatbname . ' where ' . $where);
}

function UpdateAllDataTbField($tbname, $update, $where, $upcheck = 1, $updoc = 1)
{
	global $empire;
	global $dbtbpre;
	$tbr = $empire->fetch1('select datatbs from ' . $dbtbpre . 'enewstable where tbname=\'' . $tbname . '\' limit 1');

	if ($tbr['datatbs']) {
		$dtbr = explode(',', $tbr['datatbs']);
		$count = count($dtbr);
		$i = 1;

		for (; $i < ($count - 1); $i++) {
			$empire->query('update ' . $dbtbpre . 'ecms_' . $tbname . '_data_' . $dtbr[$i] . ' set ' . $update . $where);
		}
	}

	if ($upcheck == 1) {
		$empire->query('update ' . $dbtbpre . 'ecms_' . $tbname . '_check_data set ' . $update . $where);
	}

	if ($updoc == 1) {
		$empire->query('update ' . $dbtbpre . 'ecms_' . $tbname . '_doc_data set ' . $update . $where);
	}
}

function DelAllDataTbInfo($tbname, $where, $delcheck = 1, $deldoc = 1)
{
	global $empire;
	global $dbtbpre;

	if (empty($where)) {
		return '';
	}

	$tbr = $empire->fetch1('select datatbs from ' . $dbtbpre . 'enewstable where tbname=\'' . $tbname . '\' limit 1');

	if ($tbr['datatbs']) {
		$dtbr = explode(',', $tbr['datatbs']);
		$count = count($dtbr);
		$i = 1;

		for (; $i < ($count - 1); $i++) {
			$empire->query('delete from ' . $dbtbpre . 'ecms_' . $tbname . '_data_' . $dtbr[$i] . ' where ' . $where);
		}
	}

	if ($delcheck == 1) {
		$empire->query('delete from ' . $dbtbpre . 'ecms_' . $tbname . '_check_data where ' . $where);
	}

	if ($deldoc == 1) {
		$empire->query('delete from ' . $dbtbpre . 'ecms_' . $tbname . '_doc_data where ' . $where);
	}
}

function ReturnInfoFilename($classid, $id, $filenameqz)
{
	global $class_r;

	if ($class_r[$classid][filename] == 1) {
		$filename = $class_r[$classid][filename_qz] . time() . $id;
	}
	else if ($class_r[$classid][filename] == 2) {
		$filename = $class_r[$classid][filename_qz] . md5(uniqid(microtime()));
	}
	else if ($class_r[$classid][filename] == 3) {
		$filename = $class_r[$classid][filename_qz] . $id . '/index';
	}
	else if ($class_r[$classid][filename] == 4) {
		$filename = $class_r[$classid][filename_qz] . date('Ymd') . $id;
	}
	else if ($class_r[$classid][filename] == 5) {
		$filename = $class_r[$classid][filename_qz] . ReturnInfoPubid($classid, $id);
	}
	else {
		$filename = $class_r[$classid][filename_qz] . $id;
	}

	$filename = $filenameqz . $filename;
	return $filename;
}

function DelFileOtherTable($where, $tb = 'other')
{
	global $empire;
	global $dbtbpre;
	global $public_r;

	if (empty($where)) {
		return '';
	}

	$filesql = $empire->query('select filename,path,modtype,fpath from ' . $dbtbpre . 'enewsfile_' . $tb . ' where ' . $where);

	while ($filer = $empire->fetch($filesql)) {
		DoDelFile($filer);
	}

	$empire->query('delete from ' . $dbtbpre . 'enewsfile_' . $tb . ' where ' . $where);
}

function DelFileAllTable($where)
{
	global $empire;
	global $dbtbpre;
	global $public_r;

	if (empty($where)) {
		return '';
	}

	if ($public_r['filedatatbs']) {
		$dtbr = explode(',', $public_r['filedatatbs']);
		$count = count($dtbr);
		$i = 1;

		for (; $i < ($count - 1); $i++) {
			$filesql = $empire->query('select filename,path,classid,fpath from ' . $dbtbpre . 'enewsfile_' . $dtbr[$i] . ' where ' . $where);

			while ($filer = $empire->fetch($filesql)) {
				DoDelFile($filer);
			}

			$empire->query('delete from ' . $dbtbpre . 'enewsfile_' . $dtbr[$i] . ' where ' . $where);
		}
	}
}

function DelPlAllTable($where)
{
	global $empire;
	global $dbtbpre;
	global $public_r;

	if (empty($where)) {
		return '';
	}

	if ($public_r['pldatatbs']) {
		$pldtbr = explode(',', $public_r['pldatatbs']);
		$count = count($pldtbr) - 1;
		$i = 1;

		for (; $i < $count; $i++) {
			$empire->query('delete from ' . $dbtbpre . 'enewspl_' . $pldtbr[$i] . ' where ' . $where);
		}
	}
}

function UpdateTheFile($id, $checkpass, $classid, $fstb = 1)
{
	global $empire;
	global $dbtbpre;
	if (empty($id) || empty($checkpass)) {
		return '';
	}

	$id = (int) $id;
	$checkpass = (int) $checkpass;
	$classid = (int) $classid;
	$pubid = ReturnInfoPubid($classid, $id);
	$sql = $empire->query('update ' . $dbtbpre . 'enewsfile_' . $fstb . ' set pubid=\'' . $pubid . '\',classid=\'' . $classid . '\',id=\'' . $id . '\',cjid=0 where cjid=\'' . $checkpass . '\'');
}

function UpdateTheFileEdit($classid, $id, $fstb = 1)
{
	global $empire;
	global $dbtbpre;
	$pubid = ReturnInfoPubid($classid, $id);
	$sql = $empire->query('update ' . $dbtbpre . 'enewsfile_' . $fstb . ' set pubid=\'' . $pubid . '\',cjid=0 where id=\'' . $id . '\' and classid=\'' . $classid . '\'');
}

function GetInfoTranFstb($classid, $id, $fstb)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $class_r;

	if ($id) {
		$classid = (int) $classid;
		$id = (int) $id;
		if (!$classid || !$class_r[$classid]['tbname']) {
			return $public_r['filedeftb'];
		}

		$index_r = $empire->fetch1('select id,classid,checked from ' . $dbtbpre . 'ecms_' . $class_r[$classid]['tbname'] . '_index where id=\'' . $id . '\' limit 1');

		if (!$index_r['id']) {
			return $public_r['filedeftb'];
		}

		$infotb = ReturnInfoMainTbname($class_r[$classid]['tbname'], $index_r['checked']);
		$infor = $empire->fetch1('select fstb from ' . $infotb . ' where id=\'' . $id . '\' limit 1');
		$fstb = $infor['fstb'];
	}
	else if ($fstb) {
		$fstb = eReturnFileStb($fstb);
	}
	else {
		$fstb = $public_r['filedeftb'];
	}

	$fstb = (int) $fstb;
	return $fstb;
}

function UpdateTheIspic($classid, $id, $checked)
{
	global $empire;
	global $dbtbpre;
	global $class_r;
	$infotb = (empty($checked) ? $dbtbpre . 'ecms_' . $class_r[$classid][tbname] . '_check' : $dbtbpre . 'ecms_' . $class_r[$classid][tbname]);
	$r = $empire->fetch1('select titlepic,ispic from ' . $infotb . ' where id=\'' . $id . '\' limit 1');
	$ispic = ($r['titlepic'] ? 1 : 0);

	if ($ispic != $r['ispic']) {
		$empire->query('update ' . $infotb . ' set ispic=\'' . $ispic . '\' where id=\'' . $id . '\'');
	}
}

function GetFpicToTpic($classid, $id, $num = 1, $getfirsttitlespic = 0, $swidth = 0, $sheight = 0, $fstb = 1)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $class_r;
	$pubid = ReturnInfoPubid($classid, $id);
	$num = (int) $num;
	$num = $num - 1;
	$picr = $empire->fetch1('select fileid,filename,path,id,classid,no,fpath from ' . $dbtbpre . 'enewsfile_' . $fstb . ' where pubid=\'' . $pubid . '\' and type=1 order by fileid limit ' . $num . ',1');
	$firsttitlepic = '';

	if ($picr['fileid']) {
		$rpath = ($picr['path'] ? $picr['path'] . '/' : $picr['path']);
		$fspath = ReturnFileSavePath($picr[classid], $picr[fpath]);
		if (($getfirsttitlespic == 1) && $swidth && $sheight) {
			$path = eReturnEcmsMainPortPath() . $fspath['filepath'] . $rpath;
			$yname = $path . $picr[filename];
			$filetype = GetFiletype($picr[filename]);
			$insertfile = substr($picr[filename], 0, strlen($picr[filename]) - strlen($filetype)) . time();
			$name = $path . 'small' . $insertfile;
			$sfiler = GetMySmallImg($classid, $picr[no], $insertfile, $picr[path], $yname, $swidth, $sheight, $name, $id, $add['filepass'], $userid, $username, 0, $fstb);
			$firsttitlepic = $fspath['fileurl'] . $rpath . 'small' . $insertfile . $sfiler['filetype'];
		}
		else {
			$firsttitlepic = $fspath['fileurl'] . $rpath . $picr[filename];
		}
	}

	return $firsttitlepic;
}

function UpdateImgNexturl($classid, $id, $checked = 1)
{
	global $empire;
	global $dbtbpre;
	global $class_r;
	global $public_r;
	global $emod_r;
	$mid = $class_r[$classid][modid];
	$tbname = $class_r[$classid][tbname];
	$pf = $emod_r[$mid]['pagef'];
	$stf = $emod_r[$mid]['savetxtf'];

	if (!$pf) {
		return '';
	}

	$infotbname = ($checked ? $dbtbpre . 'ecms_' . $tbname : $dbtbpre . 'ecms_' . $tbname . '_check');
	$tbdataf = (strstr($emod_r[$mid]['tbdataf'], ',' . $pf . ',') ? 1 : 0);

	if ($tbdataf) {
		$r = $empire->fetch1('select id,classid,titleurl,groupid,newspath,filename,stb from ' . $infotbname . ' where id=\'' . $id . '\'');
		$infodatatbname = ($checked ? $dbtbpre . 'ecms_' . $tbname . '_data_' . $r[stb] : $dbtbpre . 'ecms_' . $tbname . '_check_data');
		$finfor = $empire->fetch1('select ' . $pf . ' from ' . $infodatatbname . ' where id=\'' . $id . '\'');
		$r[$pf] = $finfor[$pf];
	}
	else {
		$r = $empire->fetch1('select id,classid,titleurl,groupid,newspath,filename,' . $pf . ' from ' . $infotbname . ' where id=\'' . $id . '\'');
	}

	if ($stf && ($stf == $pf)) {
		$newstextfile = $r[$stf];
		$r[$stf] = GetTxtFieldText($r[$stf]);
	}

	if (!$r[$pf]) {
		return '';
	}

	$newstext = RepNewstextImgLink($r[$pf], $r);

	if (empty($newstext)) {
		return '';
	}

	if ($stf && ($stf == $pf)) {
		EditTxtFieldText($newstextfile, $newstext);
		return '';
	}

	if ($tbdataf) {
		$empire->query('update ' . $infodatatbname . ' set ' . $pf . '=\'' . $newstext . '\' where id=\'' . $id . '\'');
	}
	else {
		$empire->query('update ' . $infotbname . ' set ' . $pf . '=\'' . $newstext . '\' where id=\'' . $id . '\'');
	}
}

function RepNewstextImgLink($newstext, $add)
{
	global $public_r;
	$expage = '[!--empirenews.page--]';
	if (!stristr($newstext, $expage) || !stristr($newstext, '<img ')) {
		return '';
	}

	$newstext = stripSlashes($newstext);
	$repurl = '[!--empirecms.rep.nextpageurl--]';
	$newstext = DoRepImgLink($newstext, $repurl);
	$nr = explode($expage, $newstext);
	$count = count($nr);
	$urlqzr = ReturnInfoPageQz($add);
	$lastpageurl = $public_r['newsurl'] . 'e/public/ClassUrl/?classid=' . $add['classid'];
	$new_newstext = '';
	$addexpage = '';
	$i = 0;

	for (; $i < $count; $i++) {
		$thispagetext = $nr[$i];

		if (stristr($thispagetext, '<img ')) {
			if ($i == $count - 1) {
				$newurl = $lastpageurl;
			}
			else if ($urlqzr['nametype'] == 1) {
				$newurl = eReturnRewritePageLink($urlqzr, $i + 1);
			}
			else {
				$newurl = $urlqzr['titleurl'] . '_' . ($i + 2) . $urlqzr['filetype'];
			}

			$thispagetext = str_replace($repurl, $newurl, $thispagetext);
		}

		$new_newstext .= $addexpage . $thispagetext;
		$addexpage = $expage;
	}

	return addslashes($new_newstext);
}

function GetKeyid($keyboard, $classid, $id, $link_num)
{
	global $empire;
	global $public_r;
	global $class_r;
	global $fun_r;
	global $dbtbpre;
	global $eyh_r;
	global $etable_r;

	if ($keyboard) {
		if (empty($link_num)) {
			return '';
		}

		$keyboard = RepDyh($keyboard);
		$r = explode(',', $keyboard);
		$i = 0;

		for (; $i < count($r); $i++) {
			if ($i == 0) {
				$or = '';
			}
			else {
				$or = ' or ';
			}

			$repadd .= $or . '[!--f--!]' . ' like \'%' . $r[$i] . '%\'';
		}

		if ($public_r['newslink'] == 1) {
			$add = '(' . str_replace('[!--f--!]', 'keyboard', $repadd) . ')';
		}
		else if ($public_r['newslink'] == 2) {
			$add = '(' . str_replace('[!--f--!]', 'keyboard', $repadd) . ' or ' . str_replace('[!--f--!]', 'title', $repadd) . ')';
		}
		else {
			$add = '(' . str_replace('[!--f--!]', 'title', $repadd) . ')';
		}

		if (!empty($class_r[$classid][modid])) {
			$mr = $empire->fetch1('select sonclass from ' . $dbtbpre . 'enewsmod where mid=\'' . $class_r[$classid][modid] . '\'');
			$where = ' and (' . ReturnClass($mr[sonclass]) . ')';
		}

		$tbname = $class_r[$classid][tbname];
		$yhvar = 'otherlink';
		$yhid = $etable_r[$tbname][yhid];
		$yhadd = '';

		if ($yhid) {
			$yhadd = ReturnYhSql($yhid, $yhvar, 1);
		}

		$keyid = '';
		$first = 0;
		$key_sql = $empire->query('select id from ' . $dbtbpre . 'ecms_' . $class_r[$classid][tbname] . ' where ' . $yhadd . $add . $where . ' and id<>' . $id . ' order by newstime desc limit ' . $link_num);

		while ($link_r = $empire->fetch($key_sql)) {
			if (empty($first)) {
				$dh = '';
				$first = 1;
			}
			else {
				$dh = ',';
			}

			$keyid .= $dh . $link_r[id];
		}
	}
	else {
		$keyid = '';
	}

	return $keyid;
}

function DelInfoSaveTxtfile($mid, $tbname, $where)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $class_r;
	global $emod_r;

	if (empty($where)) {
		return '';
	}

	$savetxtf = $emod_r[$mid]['savetxtf'];

	if ($savetxtf) {
		$txtsql = $empire->query('select ' . $savetxtf . ' from ' . $dbtbpre . 'ecms_' . $tbname . ' where ' . $where);

		while ($txtr = $empire->fetch($txtsql)) {
			$newstextfile = $txtr[$savetxtf];
			DelTxtFieldText($newstextfile);
		}

		$txtsql = $empire->query('select ' . $savetxtf . ' from ' . $dbtbpre . 'ecms_' . $tbname . '_check where ' . $where);

		while ($txtr = $empire->fetch($txtsql)) {
			$newstextfile = $txtr[$savetxtf];
			DelTxtFieldText($newstextfile);
		}

		$txtsql = $empire->query('select ' . $savetxtf . ' from ' . $dbtbpre . 'ecms_' . $tbname . '_doc where ' . $where);

		while ($txtr = $empire->fetch($txtsql)) {
			$newstextfile = $txtr[$savetxtf];
			DelTxtFieldText($newstextfile);
		}
	}
}

function DelSingleInfoOtherData($classid, $id, $r, $delfile = 0, $delpl = 0)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $class_r;
	global $emod_r;
	$pubid = ReturnInfoPubid($classid, $id);
	$empire->query('delete from ' . $dbtbpre . 'enewswfinfo where id=\'' . $id . '\' and classid=\'' . $classid . '\'');
	$empire->query('delete from ' . $dbtbpre . 'enewswfinfolog where id=\'' . $id . '\' and classid=\'' . $classid . '\'');
	$empire->query('delete from ' . $dbtbpre . 'enewsinfovote where pubid=\'' . $pubid . '\'');
	$empire->query('delete from ' . $dbtbpre . 'enewsdiggips where id=\'' . $id . '\' and classid=\'' . $classid . '\'');
	$empire->query('delete from ' . $dbtbpre . 'enewsztinfo where id=\'' . $id . '\' and classid=\'' . $classid . '\'');

	if ($delfile == 0) {
		DelNewsTheFile($id, $classid, $r['fstb'], $delpl, $r['restb']);
	}
}

function DelMoreInfoOtherData($classid, $delfile = 0, $delpl = 0)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $class_r;
	global $emod_r;
	$empire->query('delete from ' . $dbtbpre . 'enewswfinfo where classid=\'' . $classid . '\'');
	$empire->query('delete from ' . $dbtbpre . 'enewswfinfolog where classid=\'' . $classid . '\'');
	$empire->query('delete from ' . $dbtbpre . 'enewsinfovote where classid=\'' . $classid . '\'');
	$empire->query('delete from ' . $dbtbpre . 'enewsdiggips where classid=\'' . $classid . '\'');
	$empire->query('delete from ' . $dbtbpre . 'enewsztinfo where classid=\'' . $classid . '\'');

	if ($delfile == 0) {
		delfilealltable('classid=\'' . $classid . '\'');
	}

	if ($delpl == 0) {
		delplalltable('classid=\'' . $classid . '\'');
	}
}

function UpdateSingleInfoOtherData($classid, $id, $to_classid, $r, $updatefile = 0, $updatepl = 0)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $class_r;
	global $emod_r;
	$pubid = ReturnInfoPubid($classid, $id);
	$empire->query('update ' . $dbtbpre . 'enewswfinfo set classid=\'' . $to_classid . '\' where id=\'' . $id . '\' and classid=\'' . $classid . '\'');
	$empire->query('update ' . $dbtbpre . 'enewswfinfolog set classid=\'' . $to_classid . '\' where id=\'' . $id . '\' and classid=\'' . $classid . '\'');
	$empire->query('update ' . $dbtbpre . 'enewsinfovote set classid=\'' . $to_classid . '\' where pubid=\'' . $pubid . '\'');
	$empire->query('update ' . $dbtbpre . 'enewsdiggips set classid=\'' . $to_classid . '\' where id=\'' . $id . '\' and classid=\'' . $classid . '\'');
	$empire->query('update ' . $dbtbpre . 'enewsztinfo set classid=\'' . $to_classid . '\' where id=\'' . $id . '\' and classid=\'' . $classid . '\'');

	if ($updatefile == 0) {
		$empire->query('update ' . $dbtbpre . 'enewsfile_' . $r['fstb'] . ' set classid=\'' . $to_classid . '\' where pubid=\'' . $pubid . '\'');
	}

	if ($updatepl == 0) {
		$empire->query('update ' . $dbtbpre . 'enewspl_' . $r['restb'] . ' set classid=\'' . $to_classid . '\' where pubid=\'' . $pubid . '\'');
	}
}

function UpdateMoreInfoOtherData($classid, $to_classid, $updatefile = 0, $updatepl = 0)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $class_r;
	global $emod_r;
	$empire->query('update ' . $dbtbpre . 'enewswfinfo set classid=\'' . $to_classid . '\' where classid=\'' . $classid . '\'');
	$empire->query('update ' . $dbtbpre . 'enewswfinfolog set classid=\'' . $to_classid . '\' where classid=\'' . $classid . '\'');
	$empire->query('update ' . $dbtbpre . 'enewsinfovote set classid=\'' . $to_classid . '\' where classid=\'' . $classid . '\'');
	$empire->query('update ' . $dbtbpre . 'enewsdiggips set classid=\'' . $to_classid . '\' where classid=\'' . $classid . '\'');
	$empire->query('update ' . $dbtbpre . 'enewsztinfo set classid=\'' . $to_classid . '\' where classid=\'' . $classid . '\'');

	if ($updatefile == 0) {
		if ($public_r['filedatatbs']) {
			$dtbr = explode(',', $public_r['filedatatbs']);
			$count = count($dtbr);
			$i = 1;

			for (; $i < ($count - 1); $i++) {
				$empire->query('update ' . $dbtbpre . 'enewsfile_' . $dtbr[$i] . ' set classid=\'' . $to_classid . '\' where classid=\'' . $classid . '\'');
			}
		}
	}

	if ($updatepl == 0) {
		if ($public_r['pldatatbs']) {
			$pldtbr = explode(',', $public_r['pldatatbs']);
			$count = count($pldtbr) - 1;
			$i = 1;

			for (; $i < $count; $i++) {
				$empire->query('update ' . $dbtbpre . 'enewspl_' . $pldtbr[$i] . ' set classid=\'' . $to_classid . '\' where classid=\'' . $classid . '\'');
			}
		}
	}
}

function DelNewsTheFile($id, $classid, $fstb = '1', $delpl = 0, $restb = '1')
{
	global $empire;
	global $dbtbpre;

	if (empty($id)) {
		return '';
	}

	$pubid = ReturnInfoPubid($classid, $id);
	$i = 0;
	$sql = $empire->query('select classid,filename,path,fpath from ' . $dbtbpre . 'enewsfile_' . $fstb . ' where pubid=\'' . $pubid . '\'');

	while ($r = $empire->fetch($sql)) {
		$i = 1;
		DoDelFile($r);
	}

	if ($i) {
		$empire->query('delete from ' . $dbtbpre . 'enewsfile_' . $fstb . ' where pubid=\'' . $pubid . '\'');
	}

	if ($delpl == 0) {
		$empire->query('delete from ' . $dbtbpre . 'enewspl_' . $restb . ' where pubid=\'' . $pubid . '\'');
	}
}

function DelNewsFile($filename, $newspath, $classid, $newstext, $groupid = 0)
{
	global $class_r;
	global $addgethtmlpath;

	if ($groupid) {
		$filetype = '.php';
	}
	else {
		$filetype = $class_r[$classid][filetype];
	}

	if (empty($newspath)) {
		$mynewspath = '';
	}
	else {
		$mynewspath = $newspath . '/';
	}

	$iclasspath = ReturnSaveInfoPath($classid, $id);
	$r = explode('[!--empirenews.page--]', $newstext);
	$i = 1;

	for (; $i <= count($r); $i++) {
		if (strstr($filename, '/')) {
			DelPath(eReturnTrueEcmsPath() . $iclasspath . $mynewspath . ReturnInfoSPath($filename));
		}
		else {
			if ($i == 1) {
				$file = eReturnTrueEcmsPath() . $iclasspath . $mynewspath . $filename . $filetype;
			}
			else {
				$file = eReturnTrueEcmsPath() . $iclasspath . $mynewspath . $filename . '_' . $i . $filetype;
			}

			DelFiletext($file);
		}
	}
}

function DelZtcFile($cid)
{
	global $empire;
	global $dbtbpre;
	global $class_zr;
	$cr = $empire->fetch1('select ztid,islist,maxnum,tnum,ttype from ' . $dbtbpre . 'enewszttype where cid=\'' . $cid . '\'');

	if (!$cr['ztid']) {
		return '';
	}

	$filetype = $cr['ttype'];
	$doclasspath = ReturnSaveZtPath($cr['ztid'], 0);
	$dopath = ECMS_PATH . $doclasspath . '/';

	if ($cr['islist'] != 1) {
		$file = $dopath . 'type' . $cid . $filetype;
		DelFiletext($file);
		return '';
	}

	$num = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'enewsztinfo where cid=\'' . $cid . '\'');
	$totalpage = ceil($num / $cr['tnum']);
	$i = 1;

	for (; $i <= $totalpage; $i++) {
		if ($i == 1) {
			$file = $dopath . 'type' . $cid . $filetype;
		}
		else {
			$file = $dopath . 'type' . $cid . '_' . $i . $filetype;
		}

		DelFiletext($file);
	}
}

function RepImg($text, $copyflash)
{
	global $ecms_config;
	$exp1 = '[--copyimg--]';
	$exp2 = '[/--copyimg--]';

	if ($ecms_config['sets']['saveurlimgclearurl'] == 1) {
		$zz2 = '/\\<(a|A) (.*?)(href|Href)=(\'|"|\\\\"|)(.+?)><(img|IMG) (.*?)(src|SRC)=(\'|"|\\\\"|)(.+?)(\\.jpg|\\.JPG|\\.gif|\\.GIF|\\.png|\\.PNG|\\.bmp|\\.BMP|\\.jpeg|\\.JPEG)(.*?)><\\/(a|A)>/is';
		$text = preg_replace($zz2, '<\\6 \\7\\8=\\9\\10\\11\\12>', $text);
	}

	$zz1 = '/\\<(img|IMG) (.*?)(src|SRC)=(\'|"|\\\\"|)(.+?)(\\.jpg|\\.JPG|\\.gif|\\.GIF|\\.png|\\.PNG|\\.bmp|\\.BMP|\\.jpeg|\\.JPEG)(.*?)>/is';
	$text = preg_replace($zz1, '<\\1 \\2\\3=\\4' . $exp1 . '\\5\\6' . $exp2 . '\\7>', $text);
	return $text;
}

function RepFlash($text, $copyflash)
{
	$exp1 = '[--copyimg--]';
	$exp2 = '[/--copyimg--]';
	$zz2 = '/\\<(embed|EMBED) (.*?)(src|SRC)=(\'|"|\\\\"|)(.+?)(\\.swf|\\.SWF)(.*?)>(.*?)<\\/(embed|EMBED)>/is';
	$text = preg_replace($zz2, '', $text);
	$zz3 = '/\\<(param|PARAM) (name|NAME)="(Src|src|SRC)" (.*?)(value|VALUE)=(\'|"|\\\\"|)(.+?)(\\.swf|\\.SWF)(.*?)>/is';
	$text = preg_replace($zz3, '', $text);
	$zz1 = '/\\<(param|PARAM) (.*?)(name|NAME)="(movie|MOVIE)" (.*?)(value|VALUE)=(\'|"|\\\\"|)(.+?)(\\.swf|.SWF)(\\.*?)>/is';
	$text = preg_replace($zz1, '<\\1 \\2\\3="\\4" \\5\\6=\\7' . $exp1 . '\\8\\9' . $exp2 . '\\10>', $text);
	return $text;
}

function DoRepImgLink($text, $newurl)
{
	$zz2 = '/\\<(a|A) (.*?)(href|Href)=(\'|"|\\\\"|)(.+?)><(img|IMG) (.*?)(src|SRC)=(\'|"|\\\\"|)(.*?)><\\/(a|A)>/is';
	$text = preg_replace($zz2, '<\\6 \\7\\8=\\9\\10>', $text);
	$zz1 = '/\\<(img|IMG) (.*?)(src|SRC)=(\'|"|\\\\"|)(.*?)>/is';
	$text = preg_replace($zz1, '<a href="' . $newurl . '"><\\1 \\2\\3=\\4\\5></a>', $text);
	return $text;
}

function CopyImg($text, $copyimg, $copyflash, $classid, $qz, $username, $theid, $cjid, $mark, $fstb = 1)
{
	global $empire;
	global $public_r;
	global $cjnewsurl;
	global $navtheid;
	global $dbtbpre;

	if (empty($text)) {
		return '';
	}

	$navtheid = (int) $navtheid;
	$fstb = (int) $fstb;

	if ($copyimg) {
		$text = repimg($text, $copyflash);
	}

	if ($copyflash) {
		$text = repflash($text, $copyflash);
	}

	$exp1 = '[--copyimg--]';
	$exp2 = '[/--copyimg--]';
	$r = explode($exp1, $text);
	$i = 1;

	for (; $i < count($r); $i++) {
		$r1 = explode($exp2, $r[$i]);
		if (strstr($r1[0], 'http://') || strstr($r1[0], 'https://')) {
			$dourl = $r1[0];
		}
		else {
			if (!strstr($r1[0], '/') && $cjnewsurl) {
				$fileqz_r = GetPageurlQz($cjnewsurl);
				$fileqz = $fileqz_r['selfqz'];
				$dourl = $fileqz . $r1[0];
			}
			else {
				$dourl = $qz . $r1[0];
			}
		}

		$return_r = DoTranUrl($dourl, $classid);
		$text = str_replace($exp1 . $r1[0] . $exp2, $return_r[url], $text);

		if ($return_r[tran]) {
			$return_r[filesize] = (int) $return_r[filesize];
			$classid = (int) $classid;
			$return_r[type] = (int) $return_r[type];
			$theid = (int) $theid;
			$cjid = (int) $cjid;
			eInsertFileTable($return_r[filename], $return_r[filesize], $return_r[filepath], $username, $classid, '[URL]' . $return_r[filename], $return_r[type], $theid, $cjid, $public_r[fpath], 0, 0, $fstb);
			if ($mark && ($return_r[type] == 1)) {
				GetMyMarkImg($return_r['yname']);
			}
		}
	}

	return $text;
}

function GetMySmallImg($classid, $no, $insertfile, $filepath, $yname, $maxwidth, $maxheight, $name, $id, $cjid, $userid, $username, $modtype = 0, $fstb = 1)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $efileftp_fr;

	if (empty($yname)) {
		return '';
	}

	$no = '[s]' . $no;
	$maxwidth = (int) $maxwidth;
	$maxheight = (int) $maxheight;
	$filer = ResizeImage($yname, $name, $maxwidth, $maxheight, $public_r['spickill']);

	if ($filer['file']) {
		$insertfile = 'small' . $insertfile . $filer['filetype'];
		$filesize = @filesize($filer['file']);
		$pubid = 0;
		if ($id && !$cjid) {
			$pubid = ReturnInfoPubid($classid, $id);
		}

		$filesize = (int) $filesize;
		$classid = (int) $classid;
		$id = (int) $id;
		$cjid = (int) $cjid;
		eInsertFileTable($insertfile, $filesize, $filepath, $username, $classid, $no, 1, $id, $cjid, $public_r[fpath], $pubid, $modtype, $fstb);

		if ($public_r['openfileserver']) {
			$efileftp_fr[] = $name . $filer['filetype'];
		}
	}

	return $filer;
}

function GetMyMarkImg($groundImage)
{
	global $public_r;

	if (empty($groundImage)) {
		return '';
	}

	imageWaterMark($groundImage, $public_r['markpos'], $public_r['markimg'], $public_r['marktext'], $public_r['markfontsize'], $public_r['markfontcolor'], $public_r['markfont'], $public_r['markpct'], $public_r['jpgquality']);
}

function ReturnVote($votename, $votenum, $delvid, $vid, $enews = 0)
{
	global $empire;
	global $dbtbpre;
	$f_exp = '::::::';
	$r_exp = "\r\n";
	$returnstr = '';

	if (empty($enews)) {
		$i = 0;

		for (; $i < count($votename); $i++) {
			$name = str_replace($f_exp, '', $votename[$i]);
			$name = str_replace($r_exp, '', $name);
			$num = str_replace($f_exp, '', $votenum[$i]);
			$num = str_replace($r_exp, '', $num);

			if ($name) {
				if (empty($num)) {
					$num = 0;
				}

				$returnstr .= $name . $f_exp . $num . $r_exp;
			}
		}
	}
	else {
		$i = 0;

		for (; $i < count($votename); $i++) {
			$del = 0;
			$j = 0;

			for (; $j < count($delvid); $j++) {
				if ($delvid[$j] == $vid[$i]) {
					$del = 1;
				}
			}

			if ($del) {
				continue;
			}

			$name = str_replace($f_exp, '', $votename[$i]);
			$name = str_replace($r_exp, '', $name);
			$num = str_replace($f_exp, '', $votenum[$i]);
			$num = str_replace($r_exp, '', $num);

			if ($name) {
				if (empty($num)) {
					$num = 0;
				}

				$returnstr .= $name . $f_exp . $num . $r_exp;
			}
		}
	}

	$returnstr = substr($returnstr, 0, strlen($returnstr) - 2);
	return $returnstr;
}

function ShowClass_AddClass($adminclass, $obclassid, $bclassid, $exp, $modid, $enews = 0, $addminfocid = '')
{
	global $empire;
	global $dbtbpre;
	global $public_r;

	if (empty($bclassid)) {
		$bclassid = 0;
		$exp = '|-';

		if ($enews == 2) {
			$modr = $empire->fetch1('select sonclass from ' . $dbtbpre . 'enewsmod where mid=\'' . $modid . '\'');
			$addminfocid = $modr['sonclass'];
		}
	}
	else {
		$exp = '&nbsp;&nbsp;' . $exp;
	}

	$sql = $empire->query('select classid,classname,bclassid,islast,openadd,modid,sonclass from ' . $dbtbpre . 'enewsclass where bclassid=\'' . $bclassid . '\' and wburl=\'\' order by myorder,classid');
	$returnstr = '';

	while ($r = $empire->fetch($sql)) {
		if ($enews == 2) {
			if ($r[openadd]) {
				continue;
			}

			if (CheckHaveInClassid($r, $addminfocid) == 0) {
				continue;
			}
		}

		if ($r[islast]) {
			if (empty($enews) || ($enews == 2) || ($enews == 3) || ($enews == 4)) {
				$color = ' style=\'background:' . $public_r['chclasscolor'] . '\'';
			}

			if ($enews == 2) {
				if ($modid) {
					if ($r[modid] != $modid) {
						continue;
					}
				}
			}

			if ($enews == 4) {
				if ($r[modid] != $modid) {
					continue;
				}
			}
		}
		else {
			$color = '';
		}

		if ($r[classid] == $obclassid) {
			$select = ' selected';
		}
		else {
			$select = '';
		}

		if ($enews == 3) {
			$c = explode('|' . $r[classid] . '|', $adminclass);

			if (1 < count($c)) {
				$select = ' selected';
			}
			else {
				$select = '';
			}
		}

		$returnstr .= '<option value=' . $r[classid] . $select . $color . '>' . $exp . $r[classname] . '</option>';

		if (empty($r[islast])) {
			$returnstr .= ShowClass_AddClass($adminclass, $obclassid, $r[classid], $exp, $modid, $enews, $addminfocid);
		}
	}

	return $returnstr;
}

function SetDisplayClass($open)
{
	$time = time() + (365 * 24 * 3600);
	$set = esetcookie('displayclass', $open, $time, 1);
	echo '<script>self.location.href=\'ListClass.php' . hReturnEcmsHashStrHref2(1) . '\';</script>';
	exit();
}

function DelPath($DelPath)
{
	if (($DelPath == '../../') || ($DelPath == '../../d/file/')) {
		return '';
	}

	$wm_chief = new del_path();
	$wm_chief_ok = $wm_chief->wm_chief_delpath($DelPath);
	return $wm_chief_ok;
}

function CopyPath($oldpath, $newpath)
{
	$wm_chief = new copy_path();
	$wm_chief_ok = $wm_chief->wm_chief_copypath($oldpath, $newpath);
	return $wm_chief_ok;
}

function MovePath($oldpath, $newpath)
{
	copypath($oldpath, $newpath);
	delpath($oldpath);
}

function RepInfoZZ($text, $exp, $enews = 0)
{
	$text = str_replace('.', '\\.', $text);
	$text = str_replace('(', '\\(', $text);
	$text = str_replace(')', '\\)', $text);
	$text = str_replace('?', '\\?', $text);
	$text = str_replace('*', '(.*?)', $text);
	$text = str_replace('[!--' . $exp . '--]', '(.*?)', $text);
	$text = str_replace('/', '\\/', $text);
	$text = str_replace('-', '\\-', $text);
	$text = str_replace('|', '\\|', $text);
	$text = str_replace('+', '\\+', $text);
	$text = str_replace('^', '\\^', $text);
	$text = str_replace('{', '\\{', $text);
	$text = str_replace('}', '\\}', $text);
	$text = str_replace('[', '\\[', $text);
	$text = str_replace(']', '\\]', $text);
	$text = str_replace('$', '\\$', $text);
	$text = '/' . $text . '/is';
	return $text;
}

function GetPageurlQz($self)
{
	$sr = explode('/', $self);
	$count = count($sr) - 1;
	$sfile = $sr[$count];
	$r[selfqz] = substr($self, 0, strlen($self) - strlen($sfile));
	$sr1 = explode('http://', $self);
	$sr2 = explode('/', $sr1[1]);
	$r[domain] = 'http://' . $sr2[0];
	return $r;
}

function RepDyh($text)
{
	$text = addslashes(stripSlashes($text));
	return $text;
}

function AddNumZero($no, $endno)
{
	$len = strlen($endno);
	$forlen = $len - strlen($no);
	$i = 1;

	for (; $i <= $forlen; $i++) {
		$no = '0' . $no;
	}

	return $no;
}

function AutoDoPage($mybody, $spsize)
{
	$sptag = '[!--empirenews.page--]';

	if (strlen($mybody) < $spsize) {
		return $mybody;
	}

	$bds = explode('<', $mybody);
	$npageBody = '';
	$istable = 0;
	$mybody = '';

	foreach ($bds as $i => $k) {
		if ($i == 0) {
			$npageBody .= $bds[$i];
			continue;
		}

		$bds[$i] = '<' . $bds[$i];

		if (6 < strlen($bds[$i])) {
			$tname = substr($bds[$i], 1, 5);

			if (strtolower($tname) == 'table') {
				$istable++;
			}
			else if (strtolower($tname) == '/tabl') {
				$istable--;
			}

			if (0 < $istable) {
				$npageBody .= $bds[$i];
				continue;
			}
			else {
				$npageBody .= $bds[$i];
			}
		}
		else {
			$npageBody .= $bds[$i];
		}

		if ($spsize < strlen($npageBody)) {
			$mybody .= $npageBody . $sptag;
			$npageBody = '';
		}
	}

	if ($npageBody != '') {
		$mybody .= $npageBody;
	}

	return $mybody;
}

function GetListtempMid($tempid)
{
	global $empire;
	$r = $empire->fetch1('select modid from ' . GetTemptb('enewslisttemp') . ' where tempid=\'' . $tempid . '\'');
	return $r[modid];
}

function RepTemplateJsUrl($temp, $classid, $enews = 0)
{
	global $public_r;
	global $class_r;
	global $class_zr;
	$allpath = '[!--news.url--]d/js/js/';
	$temp = str_replace('[!--hotnews--]', '<script src=\'' . $allpath . 'hotnews.js\'></script>', $temp);
	$temp = str_replace('[!--newnews--]', '<script src=\'' . $allpath . 'newnews.js\'></script>', $temp);
	$temp = str_replace('[!--goodnews--]', '<script src=\'' . $allpath . 'goodnews.js\'></script>', $temp);
	$temp = str_replace('[!--hotplnews--]', '<script src=\'' . $allpath . 'hotplnews.js\'></script>', $temp);
	$temp = str_replace('[!--firstnews--]', '<script src=\'' . $allpath . 'firstnews.js\'></script>', $temp);

	if (!empty($classid)) {
		$path = ($enews == 1 ? '[!--news.url--]d/js/class/zt[!--self.classid--]_' : '[!--news.url--]d/js/class/class[!--self.classid--]_');
		$temp = str_replace('[!--self.hotnews--]', '<script src=\'' . $path . 'hotnews.js\'></script>', $temp);
		$temp = str_replace('[!--self.newnews--]', '<script src=\'' . $path . 'newnews.js\'></script>', $temp);
		$temp = str_replace('[!--self.goodnews--]', '<script src=\'' . $path . 'goodnews.js\'></script>', $temp);
		$temp = str_replace('[!--self.hotplnews--]', '<script src=\'' . $path . 'hotplnews.js\'></script>', $temp);
		$temp = str_replace('[!--self.firstnews--]', '<script src=\'' . $path . 'firstnews.js\'></script>', $temp);
	}

	return $temp;
}

function ReplaceTempvar($temp)
{
	global $empire;

	if (empty($temp)) {
		return $temp;
	}

	$sql = $empire->query('select myvar,varvalue from ' . GetTemptb('enewstempvar') . ' where isclose=0 order by myorder desc,varid');

	while ($r = $empire->fetch($sql)) {
		$temp = str_replace('[!--temp.' . $r[myvar] . '--]', $r[varvalue], $temp);
	}

	return $temp;
}

function Class_ReplaceSvars($temp, $url, $classid, $title, $key, $des, $classimg, $add, $enews = 0)
{
	global $public_r;
	global $class_r;
	global $class_zr;
	$temp = str_replace('[!--class.menu--]', $public_r['classnavs'], $temp);
	$temp = str_replace('[!--pagetitle--]', $title, $temp);
	$temp = str_replace('[!--pagekey--]', $key, $temp);
	$temp = str_replace('[!--pagedes--]', $des, $temp);
	$temp = str_replace('[!--class.intro--]', $des, $temp);
	$temp = str_replace('[!--class.keywords--]', $key, $temp);
	$temp = str_replace('[!--class.classimg--]', $classimg, $temp);
	$temp = str_replace('[!--self.classid--]', $classid, $temp);

	if ($enews == 0) {
		$temp = str_replace('[!--class.name--]', $class_r[$classid]['classname'], $temp);
		$bclassid = $class_r[$classid]['bclassid'];
		$temp = str_replace('[!--bclass.id--]', $bclassid, $temp);
		$temp = str_replace('[!--bclass.name--]', $class_r[$bclassid]['classname'], $temp);
		$path = $public_r['newsurl'] . 'd/js/class/class' . $classid . '_';
	}
	else {
		$temp = str_replace('[!--class.name--]', $class_zr[$classid]['ztname'], $temp);
		$path = $public_r['newsurl'] . 'd/js/class/zt' . $classid . '_';
	}

	$allpath = $public_r[newsurl] . 'd/js/js/';
	$temp = str_replace('[!--hotnews--]', '<script src=\'' . $allpath . 'hotnews.js\'></script>', $temp);
	$temp = str_replace('[!--self.hotnews--]', '<script src=\'' . $path . 'hotnews.js\'></script>', $temp);
	$temp = str_replace('[!--newnews--]', '<script src=\'' . $allpath . 'newnews.js\'></script>', $temp);
	$temp = str_replace('[!--self.newnews--]', '<script src=\'' . $path . 'newnews.js\'></script>', $temp);
	$temp = str_replace('[!--goodnews--]', '<script src=\'' . $allpath . 'goodnews.js\'></script>', $temp);
	$temp = str_replace('[!--self.goodnews--]', '<script src=\'' . $path . 'goodnews.js\'></script>', $temp);
	$temp = str_replace('[!--hotplnews--]', '<script src=\'' . $allpath . 'hotplnews.js\'></script>', $temp);
	$temp = str_replace('[!--self.hotplnews--]', '<script src=\'' . $path . 'hotplnews.js\'></script>', $temp);
	$temp = str_replace('[!--firstnews--]', '<script src=\'' . $allpath . 'firstnews.js\'></script>', $temp);
	$temp = str_replace('[!--self.firstnews--]', '<script src=\'' . $path . 'firstnews.js\'></script>', $temp);
	$temp = str_replace('[!--news.url--]', $public_r['newsurl'], $temp);
	return $temp;
}

function Info_ReplaceSvars($temp, $url, $classid, $title, $key, $des)
{
	global $public_r;
	global $class_r;
	$temp = str_replace('[!--class.menu--]', $public_r['classnavs'], $temp);
	$temp = str_replace('[!--newsnav--]', '<?=$grurl?>', $temp);
	$temp = str_replace('[!--pagetitle--]', '<?=$grpagetitle?>', $temp);
	$temp = str_replace('[!--pagekey--]', '<?=$ecms_gr[keyboard]?>', $temp);
	$temp = str_replace('[!--pagedes--]', '<?=$grpagetitle?>', $temp);
	$temp = str_replace('[!--self.classid--]', '<?=$ecms_gr[classid]?>', $temp);
	$bclassid = $class_r[$classid]['bclassid'];
	$temp = str_replace('[!--bclass.id--]', '<?=$grbclassid?>', $temp);
	$temp = str_replace('[!--bclass.name--]', '<?=$class_r[$grbclassid][classname]?>', $temp);
	$temp = str_replace('[!--news.url--]', $public_r['newsurl'], $temp);
	return $temp;
}

function DtInfo_ReplaceSvars($temp, $url, $classid, $title, $key, $des)
{
	global $public_r;
	global $class_r;
	$temp = str_replace('[!--class.menu--]', $public_r['classnavs'], $temp);
	$temp = str_replace('[!--newsnav--]', $url, $temp);
	$temp = str_replace('[!--pagetitle--]', $title, $temp);
	$temp = str_replace('[!--pagekey--]', $key, $temp);
	$temp = str_replace('[!--pagedes--]', $des, $temp);
	$temp = str_replace('[!--self.classid--]', $classid, $temp);
	$bclassid = $class_r[$classid]['bclassid'];
	$temp = str_replace('[!--bclass.id--]', $bclassid, $temp);
	$temp = str_replace('[!--bclass.name--]', $class_r[$bclassid]['classname'], $temp);
	$temp = str_replace('[!--news.url--]', $public_r['newsurl'], $temp);
	return $temp;
}

function ReplaceStemp($temptext, $class, $url, $classid, $title, $key, $des, $repvar = 1)
{
	global $public_r;

	if ($repvar == 1) {
		$temptext = replacetempvar($temptext);
	}

	$temptext = str_replace('[!--class.menu--]', $public_r['classnavs'], $temptext);
	$temptext = str_replace('[!--class--]', $class, $temptext);
	$temptext = str_replace('[!--pagetitle--]', $title, $temptext);
	$temptext = str_replace('[!--pagekey--]', $key, $temptext);
	$temptext = str_replace('[!--pagedes--]', $des, $temptext);
	$temptext = str_replace('[!--self.classid--]', $classid, $temptext);
	$temptext = str_replace('[!--hotnews--]', '<script src=\'' . $public_r[newsurl] . 'd/js/js/hotnews.js\'></script>', $temptext);
	$temptext = str_replace('[!--newnews--]', '<script src=\'' . $public_r[newsurl] . 'd/js/js/newnews.js\'></script>', $temptext);
	$temptext = str_replace('[!--goodnews--]', '<script src=\'' . $public_r[newsurl] . 'd/js/js/goodnews.js\'></script>', $temptext);
	$temptext = str_replace('[!--hotplnews--]', '<script src=\'' . $public_r[newsurl] . 'd/js/js/hotplnews.js\'></script>', $temptext);
	$temptext = str_replace('[!--url--]', $url, $temptext);
	$temptext = str_replace('[!--newsnav--]', $url, $temptext);
	$temptext = str_replace('[!--news.url--]', $public_r[newsurl], $temptext);
	$temptext = str_replace('[!--newsurl--]', $public_r[newsurl], $temptext);
	return $temptext;
}

function AddCheckClassLevel($classid, $groupid, $classpath)
{
	$classpath = ReturnSaveClassPath($classid);
	$pr = explode('/', $classpath);
	$pcount = count($pr);
	$i = 0;

	for (; $i < $pcount; $i++) {
		$include .= '../';
	}

	$include1 = $include;
	$include .= 'e/class/CheckClassLevel.php';
	$addlevel = '<?php' . "\r\n" . '	define(\'empirecms\',\'wm_chief\');' . "\r\n" . '	$check_groupid="' . $groupid . '";' . "\r\n" . '	$check_classid=' . $classid . ';' . "\r\n" . '	$check_path="' . $include1 . '";' . "\r\n" . '	require("' . $include . '");' . "\r\n" . '	?>';
	return $addlevel;
}

function ReClassBdInfo($classid)
{
	global $empire;
	global $dbtbpre;
	$cr = $empire->fetch1('select classid,bdinfoid from ' . $dbtbpre . 'enewsclass where classid=\'' . $classid . '\'');
	if (!$cr['classid'] || !$cr['bdinfoid']) {
		return '';
	}

	$infor = explode(',', $cr['bdinfoid']);
	$infofile = GetInfoFilename(intval($infor[0]), intval($infor[1]));
	$classtext = '';

	if ($infofile) {
		$classtext = ReadFiletext($infofile);
	}

	$classfile = eReturnTrueEcmsPath() . ReturnSaveClassPath($classid, 1);
	WriteFiletext_n($classfile, $classtext);
}

function DoSpReFile($r, $spid = 0)
{
	global $empire;
	global $dbtbpre;

	if ($spid) {
		$r = $empire->fetch1('select varname,refile,spfile,spfileline,spfilesub from ' . $dbtbpre . 'enewssp where spid=\'' . $spid . '\' limit 1');
	}

	if (!$r['refile']) {
		return '';
	}

	ob_start();
	sys_eShowSpInfo($r['varname'], $r['spfileline'], $r['spfilesub']);
	$string = ob_get_contents();
	ob_end_clean();
	$filename = ECMS_PATH . $r['spfile'];
	WriteFiletext($filename, $string);
}

function NewsBq($classid, $indextext, $enews = 0, $doing = 0)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $emod_r;
	global $class_r;
	global $class_zr;
	global $fun_r;
	global $navclassid;
	global $navinfor;
	global $class_tr;
	global $level_r;
	global $etable_r;
	$indextext = stripSlashes($indextext);
	$indextext = replacetempvar($indextext);
	$classlevel = '';

	if ($enews == 0) {
		if ($class_r[$classid]['listdt'] || $class_r[$classid]['wburl'] || strstr($public_r['nreclass'], ',' . $classid . ',') || InfoIsInTable($class_r[$classid]['tbname'])) {
			return '';
		}

		$GLOBALS['navclassid'] = $classid;
		$url = ReturnClassLink($classid);
		$cf = ($doing == 1 ? ',classpath,classtype,classname' : '');
		$cr = $empire->fetch1('select classpagekey,intro,classimg,cgroupid' . $cf . ' from ' . $dbtbpre . 'enewsclass where classid=\'' . $classid . '\'');

		if (!empty($cf)) {
			$class_r[$classid][classpath] = $cr[classpath];
			$class_r[$classid][classtype] = $cr[classtype];
			$class_r[$classid][classname] = $cr[classname];
		}

		if ($cr['cgroupid']) {
			$classlevel = addcheckclasslevel($classid, $cr['cgroupid'], '');
		}

		$pagetitle = ehtmlspecialchars($class_r[$classid][classname]);
		$pagekey = ehtmlspecialchars($cr['classpagekey']);
		$pagedes = ehtmlspecialchars($cr['intro']);
		$classimg = $cr['classimg'];
		$onclick = '<script src=' . $public_r[newsurl] . 'e/public/onclick/?enews=doclass&classid=' . $classid . '></script>';
		$truefile = eReturnTrueEcmsPath() . ReturnSaveClassPath($classid, 1);
		$file = ECMS_PATH . 'e/data/tmp/class' . $classid . '.php';
		$indextext = str_replace('[!--newsnav--]', $url, $indextext);
		$indextext = class_replacesvars($indextext, $url, $classid, $pagetitle, $pagekey, $pagedes, $classimg, $add, 0);
	}
	else if ($enews == 3) {
		$GLOBALS['navclassid'] = $classid;
		$url = ReturnZtLink($classid);
		$cf = ($doing == 1 ? ',ztpath,zttype,ztname' : '');
		$cr = $empire->fetch1('select ztpagekey,intro,ztimg' . $cf . ' from ' . $dbtbpre . 'enewszt where ztid=\'' . $classid . '\'');

		if (!empty($cf)) {
			$class_zr[$classid][ztpath] = $cr[ztpath];
			$class_zr[$classid][zttype] = $cr[zttype];
			$class_zr[$classid][ztname] = $cr[ztname];
		}

		$pagetitle = ehtmlspecialchars($class_zr[$classid][ztname]);
		$pagekey = ehtmlspecialchars($cr['ztpagekey']);
		$pagedes = ehtmlspecialchars($cr['intro']);
		$classimg = $cr['ztimg'];
		$onclick = '<script src=' . $public_r[newsurl] . 'e/public/onclick/?enews=dozt&ztid=' . $classid . '></script>';
		$truefile = ECMS_PATH . ReturnSaveZtPath($classid, 1);
		$file = ECMS_PATH . 'e/data/tmp/zt' . $classid . '.php';
		$indextext = str_replace('[!--newsnav--]', $url, $indextext);
		$indextext = class_replacesvars($indextext, $url, $classid, $pagetitle, $pagekey, $pagedes, $classimg, $add, 1);
	}
	else if ($enews == 4) {
		$cr = $empire->fetch1('select ztid,cname,ttype from ' . $dbtbpre . 'enewszttype where cid=\'' . $classid . '\'');
		$GLOBALS['navclassid'] = $classid;
		$GLOBALS['navinfor']['ecmsbid'] = $cr['ztid'];
		$url = ReturnZtLink($cr['ztid']);
		$pagetitle = ehtmlspecialchars($cr['cname']);
		$pagekey = ehtmlspecialchars($cr['cname']);
		$pagedes = ehtmlspecialchars($cr['cname']);
		$onclick = '<script src=' . $public_r[newsurl] . 'e/public/onclick/?enews=dozt&ztid=' . $cr['ztid'] . '></script>';
		$truefile = ECMS_PATH . ReturnSaveZtPath($cr['ztid'], 0) . '/type' . $classid . $cr['ttype'];
		$file = ECMS_PATH . 'e/data/tmp/ztc' . $classid . '.php';
		$indextext = str_replace('[!--newsnav--]', $url, $indextext);
		$indextext = class_replacesvars($indextext, $url, $classid, $pagetitle, $pagekey, $pagedes, $classimg, $add, 1);
	}
	else if ($enews == 1) {
		$pr = $empire->fetch1('select sitekey,siteintro,indexpagedt from ' . $dbtbpre . 'enewspublic limit 1');
		if ($pr['indexpagedt'] || (Moreport_ReturnMustDt() && !defined('ECMS_SELFPATH'))) {
			return '';
		}

		$pagetitle = ehtmlspecialchars($public_r['sitename']);
		$pagekey = ehtmlspecialchars($pr['sitekey']);
		$pagedes = ehtmlspecialchars($pr['siteintro']);
		$url = '<a href="' . ReturnSiteIndexUrl() . '">' . $fun_r['index'] . '</a>';
		$onclick = '';
		$truefile = eReturnTrueEcmsPath() . ReturnSaveIndexFile();
		$file = ECMS_PATH . 'e/data/tmp/index.php';
		$indextext = ReplaceSvars($indextext, $url, 0, $pagetitle, $pagekey, $pagedes, $add, 0);
	}
	else if ($enews == 10) {
		if ($class_r[$classid]['listdt'] || $class_r[$classid]['wburl'] || strstr($public_r['nreclass'], ',' . $classid . ',')) {
			return '';
		}

		$GLOBALS['navclassid'] = $classid;
		$pagetitle = htmlspecialchars($class_r[$classid][classname]);
		$url = ReturnClassLink($classid);
		$cf = ($doing == 1 ? ',classpath,classtype,classname' : '');
		$cr = $empire->fetch1('select classpagekey,intro,classimg,cgroupid' . $cf . ' from ' . $dbtbpre . 'enewsclass where classid=\'' . $classid . '\'');
		$truefile = ECMS_PATH . '/mobile/list/' . $classid . $class_r[$classid][classtype];
		$file = ECMS_PATH . 'e/data/tmp/class.mobile' . $classid . '.php';
		$indextext = str_replace('[!--newsnav--]', $url, $indextext);
		$indextext = class_replacesvars($indextext, $url, $classid, $pagetitle, $pagekey, $pagedes, $classimg, $add, 0);
	}

	$indextext = str_replace('[!--page.stats--]', $onclick, $indextext);
	$indextext = DoRepEcmsLoopBq($indextext);
	$indextext = RepBq($indextext);
	WriteFiletext($file, addcheckviewtempcode() . $indextext);
	ob_start();
	include $file;
	$string = ob_get_contents();
	ob_end_clean();
	$string = RepExeCode($string);
	WriteFiletext($truefile, $classlevel . $string);
	return $string;
}

function InfoNewsBq($classid, $indextext)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $emod_r;
	global $class_r;
	global $class_zr;
	global $fun_r;
	global $navclassid;
	global $navinfor;
	global $class_tr;
	global $level_r;
	global $etable_r;

	if (!defined('EmpireCMSAdmin')) {
		$_GET['reallinfotime'] = 0;
	}

	if ($_GET['reallinfotime']) {
		$classid .= '_all';
	}

	$file = ECMS_PATH . 'e/data/tmp/temp' . $classid . '.php';
	if ($_GET['reallinfotime'] && file_exists($file)) {
		$filetime = filemtime($file);

		if ($_GET['reallinfotime'] <= $filetime) {
			ob_start();
			include $file;
			$string = ob_get_contents();
			ob_end_clean();
			$string = RepExeCode($string);
			return $string;
		}
	}

	$indextext = stripSlashes($indextext);
	$indextext = replacetempvar($indextext);
	$indextext = DoRepEcmsLoopBq($indextext);
	$indextext = RepBq($indextext);
	WriteFiletext($file, addcheckviewtempcode() . $indextext);
	ob_start();
	include $file;
	$string = ob_get_contents();
	ob_end_clean();
	$string = RepExeCode($string);
	return $string;
}

function GetInfoNewsBq($classid, $newstemp_r, $ecms_gr, $docheckrep)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $emod_r;
	global $class_r;
	global $class_zr;
	global $fun_r;
	global $navclassid;
	global $navinfor;
	global $class_tr;
	global $level_r;
	global $etable_r;

	if (!defined('EmpireCMSAdmin')) {
		$_GET['reallinfotime'] = 0;
	}

	if ($_GET['reallinfotime']) {
		$file = ECMS_PATH . 'e/data/tmp/tempnews' . $newstemp_r['tempid'] . '_all.php';
	}
	else {
		$file = ECMS_PATH . 'e/data/tmp/tempnews' . $newstemp_r['tempid'] . '.php';
	}

	$grurl = ReturnClassLink($ecms_gr['classid']);
	$grpagetitle = ehtmlspecialchars($ecms_gr['title']);
	$grbclassid = $class_r[$ecms_gr['classid']]['bclassid'];
	$grtitleurl = sys_ReturnBqTitleLink($ecms_gr);
	$grclassurl = sys_ReturnBqClassname($ecms_gr, 9);
	if ($_GET['reallinfotime'] && file_exists($file)) {
		$filetime = filemtime($file);

		if ($_GET['reallinfotime'] <= $filetime) {
			ob_start();
			include $file;
			$string = ob_get_contents();
			ob_end_clean();
			$string = RepExeCode($string);
			return $string;
		}
	}

	$formatdate = $newstemp_r['showdate'];
	$newstemp_r['temptext'] = stripSlashes($newstemp_r['temptext']);
	$newstemp_r['temptext'] = replacetempvar($newstemp_r['temptext']);
	$newstemp_r['temptext'] = DoRepEcmsLoopBq($newstemp_r['temptext']);
	$newstemp_r['temptext'] = RepBq($newstemp_r['temptext']);
	$indextext = GetHtmlRepVar($newstemp_r, $ecms_gr['classid']);
	WriteFiletext($file, addcheckviewtempcode() . $indextext);
	ob_start();
	include $file;
	$string = ob_get_contents();
	ob_end_clean();
	$string = RepExeCode($string);
	return $string;
}

function DtNewsBq($classid, $indextext, $ecms = 0)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	global $emod_r;
	global $class_r;
	global $class_zr;
	global $fun_r;
	global $navclassid;
	global $navinfor;
	global $class_tr;
	global $level_r;
	global $etable_r;
	$cachetime = ($ecms == 1 ? $public_r['dtncachetime'] : $public_r['dtcachetime']);
	$file = ECMS_PATH . 'e/data/tmp/dt_temp' . $classid . '.php';
	if ($cachetime && file_exists($file)) {
		$filetime = filemtime($file);

		if ((time() - ($cachetime * 60)) <= $filetime) {
			ob_start();
			include $file;
			$string = ob_get_contents();
			ob_end_clean();
			$string = RepExeCode($string);
			return $string;
		}
	}

	$indextext = stripSlashes($indextext);
	$indextext = replacetempvar($indextext);
	$indextext = DoRepEcmsLoopBq($indextext);
	$indextext = RepBq($indextext);
	WriteFiletext($file, addcheckviewtempcode() . $indextext);
	ob_start();
	include $file;
	$string = ob_get_contents();
	ob_end_clean();
	$string = RepExeCode($string);
	return $string;
}

function RepExeCode($string)
{
	global $public_r;

	if ($public_r[candocode]) {
		$string = str_replace('<!--code.start-->', '<', $string);
		$string = str_replace('<!--code.end-->', '>', $string);
	}

	return $string;
}

function ClearRepDoECode($string)
{
	$string = str_replace('<!--code.start-->', '&lt;!--code.start--&gt;', $string);
	$string = str_replace('<!--code.end-->', '&lt;!--code.end--&gt;', $string);
	return $string;
}

function RepBq($indextext)
{
	global $empire;
	global $dbtbpre;
	$sql = $empire->query('select bq,funname from ' . $dbtbpre . 'enewsbq where isclose=0 order by bqid');

	while ($r = $empire->fetch($sql)) {
		$preg_str = '/\\[' . $r[bq] . '\\](.+?)\\[\\/' . $r[bq] . '\\]/is';
		$indextext = preg_replace($preg_str, '<? @' . $r[funname] . '(\\1);?>', $indextext);
	}

	return $indextext;
}

function DoRepEcmsLoopBq($temp)
{
	$yzz = '/\\[e:loop={(.+?)}\\](.+?)\\[\\/e:loop\\]/is';
	$xzz = '<?php' . "\r\n" . '$bqno=0;' . "\r\n" . '$ecms_bq_sql=sys_ReturnEcmsLoopBq(\\1);' . "\r\n" . 'if($ecms_bq_sql){' . "\r\n" . 'while($bqr=$empire->fetch($ecms_bq_sql)){' . "\r\n" . '$bqsr=sys_ReturnEcmsLoopStext($bqr);' . "\r\n" . '$bqno++;' . "\r\n" . '?>\\2<?php' . "\r\n" . '}' . "\r\n" . '}' . "\r\n" . '?>';
	$temp = preg_replace($yzz, $xzz, $temp);
	$temp = DoRepEcmsIndexLoopBq($temp);
	return $temp;
}

function DoRepEcmsIndexLoopBq($temp)
{
	$yzz = '/\\[e:indexloop={(.+?)}\\](.+?)\\[\\/e:indexloop\\]/is';
	$xzz = '<?php' . "\r\n" . '$bqno=0;' . "\r\n" . '$ecms_bq_sql=sys_ReturnEcmsIndexLoopBq(\\1);' . "\r\n" . 'if($ecms_bq_sql){' . "\r\n" . 'while($indexbqr=$empire->fetch($ecms_bq_sql)){' . "\r\n" . 'if(empty($class_r[$indexbqr[\'classid\']][\'tbname\'])){continue;}' . "\r\n" . '$bqr=$empire->fetch1("select * from {$dbtbpre}ecms_".$class_r[$indexbqr[\'classid\']][\'tbname\']." where id=\'$indexbqr[id]\'");' . "\r\n" . '$bqsr=sys_ReturnEcmsLoopStext($bqr);' . "\r\n" . '$bqno++;' . "\r\n" . '?>\\2<?php' . "\r\n" . '}' . "\r\n" . '}' . "\r\n" . '?>';
	return preg_replace($yzz, $xzz, $temp);
}

function NotinfoListHtml($path, $list_r, $classlevel)
{
	global $fun_r;
	$word = $fun_r['HaveNotListInfo'];
	$pagetext = $list_r[0] . $word . $list_r[2];
	$pagetext = str_replace('[!--show.page--]', '', $pagetext);
	$pagetext = str_replace('[!--show.listpage--]', '', $pagetext);
	$pagetext = str_replace('[!--list.pageno--]', '', $pagetext);
	WriteFiletext($path, $classlevel . $pagetext);
}

function ListHtml($classid, $fields, $enews = 0, $userlistr = '')
{
	global $empire;
	global $dbtbpre;
	global $emod_r;
	global $public_r;
	global $class_r;
	global $class_zr;
	global $fun_r;
	global $class_tr;
	global $level_r;
	global $etable_r;
	if ((($enews == 0) || ($enews == 3)) && ($class_r[$classid]['listdt'] || $class_r[$classid]['wburl'] || strstr($public_r['nreclass'], ',' . $classid . ','))) {
		return '';
	}

	$GLOBALS['navclassid'] = $classid;
	$doclass = 'index';
	$classlevel = '';
	$yhvar = 'qlist';

	if ($enews == 0) {
		if (InfoIsInTable($class_r[$classid][tbname])) {
			return '';
		}

		$selfclassid = $classid;
		$doenews = 0;
		$cr = $empire->fetch1('select classpagekey,intro,classimg,cgroupid,repagenum,bdinfoid from ' . $dbtbpre . 'enewsclass where classid=\'' . $classid . '\'');

		if (!empty($cr['bdinfoid'])) {
			reclassbdinfo($classid);
			return '';
		}

		$mid = $class_r[$classid][modid];

		if ($cr['cgroupid']) {
			$classlevel = addcheckclasslevel($classid, $cr['cgroupid'], '');
		}

		$pagetitle = ehtmlspecialchars($class_r[$classid][classname]);
		$pagekey = ehtmlspecialchars($cr['classpagekey']);
		$pagedes = ehtmlspecialchars($cr['intro']);
		$classimg = $cr['classimg'];
		$url = ReturnClassLink($classid);
		$haveclass = 0;

		if (empty($class_r[$classid][reorder])) {
			$addorder = 'newstime desc';
		}
		else {
			$addorder = $class_r[$classid][reorder];
		}

		$pagefunr = eReturnRewriteLink('classpage', $classid, 0);
		$pagefunr['repagenum'] = $cr['repagenum'];
		$totalrepage = $cr['repagenum'] * $class_r[$classid][lencord];

		if ($totalrepage) {
			$limit = ' limit ' . $totalrepage;
		}

		if ($class_r[$classid][maxnum]) {
			if ($class_r[$classid][maxnum] < $totalrepage) {
				$limit = ' limit ' . $class_r[$classid][maxnum];
			}

			$limitnum = $class_r[$classid][maxnum];
		}

		$yhid = $class_r[$classid][yhid];

		if ($yhid) {
			$yhadd = ReturnYhSql($yhid, $yhvar, 1);
		}

		$query = 'select ' . ReturnSqlListF($mid) . ' from ' . $dbtbpre . 'ecms_' . $class_r[$classid][tbname] . ' where ' . $yhadd . 'classid=\'' . $classid . '\' order by ' . ReturnSetTopSql('list') . $addorder . $limit;
		$totalquery = 'select count(*) as total from ' . $dbtbpre . 'ecms_' . $class_r[$classid][tbname] . ' where ' . $yhadd . 'classid=\'' . $classid . '\'';
		$doclasspath = ReturnSaveClassPath($classid, 0);
		$dopath = eReturnTrueEcmsPath() . $doclasspath . '/';

		if (empty($class_r[$classid][classurl])) {
			$dolink = $public_r[newsurl] . $doclasspath . '/';
		}
		else {
			$dolink = $class_r[$classid][classurl] . '/';
		}

		$dotype = $class_r[$classid][classtype];
		$classname = $class_r[$classid][classname];
		$lencord = $class_r[$classid][lencord];
		$onclick = '<script src=\'' . $public_r[newsurl] . 'e/public/onclick/?enews=doclass&classid=' . $classid . '\'></script>';
		$listtempid = $class_r[$classid][listtempid];
	}
	else if ($enews == 5) {
		$mid = $class_tr[$classid]['mid'];
		$tbname = $emod_r[$mid]['tbname'];

		if (InfoIsInTable($tbname)) {
			return '';
		}

		$selfclassid = $classid;
		$doenews = 1;
		$cr = $empire->fetch1('select tnum,listtempid,maxnum,reorder,timg,intro,pagekey,listdt,repagenum from ' . $dbtbpre . 'enewsinfotype where typeid=\'' . $classid . '\'');
		$pagetitle = ehtmlspecialchars($class_tr[$classid]['tname']);
		$pagekey = ehtmlspecialchars($cr['pagekey']);
		$pagedes = ehtmlspecialchars($cr['intro']);
		$classimg = $cr['timg'];
		$url = ReturnInfoTypeLink($classid);
		$haveclass = 1;

		if ($cr['listdt']) {
			return '';
		}

		if (empty($cr['reorder'])) {
			$addorder = 'newstime desc';
		}
		else {
			$addorder = $cr['reorder'];
		}

		$pagefunr = eReturnRewriteLink('ttpage', $classid, 0);
		$pagefunr['repagenum'] = $cr['repagenum'];
		$totalrepage = $cr['repagenum'] * $cr['tnum'];

		if ($totalrepage) {
			$limit = ' limit ' . $totalrepage;
		}

		if ($cr['maxnum']) {
			if ($cr['maxnum'] < $totalrepage) {
				$limit = ' limit ' . $cr['maxnum'];
			}

			$limitnum = $cr['maxnum'];
		}

		$yhid = $class_tr[$classid]['yhid'];

		if ($yhid) {
			$yhadd = ReturnYhSql($yhid, $yhvar, 1);
		}

		$query = 'select ' . ReturnSqlListF($mid) . ' from ' . $dbtbpre . 'ecms_' . $tbname . ' where ' . $yhadd . 'ttid=\'' . $classid . '\' order by ' . $addorder . $limit;
		$totalquery = 'select count(*) as total from ' . $dbtbpre . 'ecms_' . $tbname . ' where ' . $yhadd . 'ttid=\'' . $classid . '\'';
		$doclasspath = ReturnSaveInfoTypePath($classid, 0);
		$dopath = eReturnTrueEcmsPath() . $doclasspath . '/';
		$dolink = $public_r[newsurl] . $doclasspath . '/';
		$dotype = $class_tr[$classid]['ttype'];
		$classname = $class_tr[$classid]['tname'];
		$lencord = $cr['tnum'];
		$onclick = '';
		$listtempid = $cr['listtempid'];
	}
	else if ($enews == 3) {
		if (InfoIsInTable($class_r[$classid][tbname])) {
			return '';
		}

		$selfclassid = $classid;
		$doenews = 0;
		$cr = $empire->fetch1('select classpagekey,intro,classimg,cgroupid,repagenum from ' . $dbtbpre . 'enewsclass where classid=\'' . $classid . '\'');
		$mid = $class_r[$classid][modid];

		if ($cr['cgroupid']) {
			$classlevel = addcheckclasslevel($classid, $cr['cgroupid'], '');
		}

		$pagetitle = ehtmlspecialchars($class_r[$classid][classname]);
		$pagekey = ehtmlspecialchars($cr['classpagekey']);
		$pagedes = ehtmlspecialchars($cr['intro']);
		$classimg = $cr['classimg'];
		$url = ReturnClassLink($classid);
		$haveclass = 1;

		if (empty($class_r[$classid][reorder])) {
			$addorder = 'newstime desc';
		}
		else {
			$addorder = $class_r[$classid][reorder];
		}

		$pagefunr = eReturnRewriteLink('classpage', $classid, 0);
		$pagefunr['repagenum'] = $cr['repagenum'];
		$totalrepage = $cr['repagenum'] * $class_r[$classid][lencord];

		if ($totalrepage) {
			$limit = ' limit ' . $totalrepage;
		}

		if ($class_r[$classid][maxnum]) {
			if ($class_r[$classid][maxnum] < $totalrepage) {
				$limit = ' limit ' . $class_r[$classid][maxnum];
			}

			$limitnum = $class_r[$classid][maxnum];
		}

		$whereclass = ReturnClass($class_r[$classid][sonclass]);
		$yhid = $class_r[$classid][yhid];

		if ($yhid) {
			$yhadd = ReturnYhSql($yhid, $yhvar, 1);
		}

		$query = 'select ' . ReturnSqlListF($mid) . ' from ' . $dbtbpre . 'ecms_' . $class_r[$classid][tbname] . ' where ' . $yhadd . '(' . $whereclass . ') order by ' . ReturnSetTopSql('list') . $addorder . $limit;
		$totalquery = 'select count(*) as total from ' . $dbtbpre . 'ecms_' . $class_r[$classid][tbname] . ' where ' . $yhadd . '(' . $whereclass . ')';
		$doclasspath = ReturnSaveClassPath($classid, 0);
		$dopath = eReturnTrueEcmsPath() . $doclasspath . '/';

		if (empty($class_r[$classid][classurl])) {
			$dolink = $public_r[newsurl] . $doclasspath . '/';
		}
		else {
			$dolink = $class_r[$classid][classurl] . '/';
		}

		$dotype = $class_r[$classid][classtype];
		$classname = $class_r[$classid][classname];
		$lencord = $class_r[$classid][lencord];
		$onclick = '<script src=\'' . $public_r[newsurl] . 'e/public/onclick/?enews=doclass&classid=' . $classid . '\'></script>';
		$listtempid = $class_r[$classid][listtempid];
	}
	else if ($enews == 4) {
		$selfclassid = 0;
		$doenews = 1;
		$userlistr['listsql'] = RepSqlTbpre($userlistr['listsql']);
		$userlistr['totalsql'] = RepSqlTbpre($userlistr['totalsql']);
		$pagetitle = ehtmlspecialchars($userlistr['pagetitle']);
		$pagekey = ehtmlspecialchars($userlistr['pagekeywords']);
		$pagedes = ehtmlspecialchars($userlistr['pagedescription']);
		$haveclass = 1;

		if ($userlistr['maxnum']) {
			$limit = ' limit ' . $userlistr['maxnum'];
			$limitnum = $userlistr['maxnum'];
		}

		$query = stripSlashes($userlistr['listsql']) . $limit;
		$totalquery = stripSlashes($userlistr['totalsql']);
		$dopath = $userlistr['addpath'] . $userlistr['filepath'];
		$dolink = $public_r[newsurl] . str_replace($userlistr['addpath'] . '../../', '', $dopath);
		$dotype = $userlistr['filetype'];
		$classname = $userlistr['pagetitle'];
		$lencord = $userlistr['lencord'];
		$onclick = '';
		$url = ReturnUserPLink($pagetitle, $dolink);
		$listtempid = $userlistr['listtempid'];
	}

	if (empty($lencord)) {
		$lencord = 25;
	}

	$listtemp_r = GetListTemp($listtempid);
	$listtemp = $listtemp_r[temptext];
	$subnews = $listtemp_r[subnews];
	$subtitle = $listtemp_r[subtitle];
	$docode = $listtemp_r[docode];
	$listvar = str_replace('[!--news.url--]', $public_r[newsurl], $listtemp_r[listvar]);
	$rownum = $listtemp_r[rownum];
	$formatdate = $listtemp_r[showdate];

	if (empty($rownum)) {
		$rownum = 1;
	}

	if (empty($mid)) {
		$mid = $listtemp_r[modid];
	}

	$field = ReturnReplaceListF($mid);
	$pagefunr['dofile'] = $dofile;
	if (!empty($public_r['listpagefun']) || !empty($public_r['listpagelistfun'])) {
		if (strstr($listtemp, '[!--show.page--]')) {
			$thefun = $public_r['listpagefun'];
			$bereplistpage = '[!--show.page--]';
		}
		else {
			$thefun = $public_r['listpagelistfun'];
			$bereplistpage = '[!--show.listpage--]';
		}
	}
	else {
		$thefun = 'sys_ShowListPage';
		$bereplistpage = '[!--show.page--]';
	}

	$listtemp = str_replace('[!--newsnav--]', $url, $listtemp);
	$listtemp = class_replacesvars($listtemp, $url, $selfclassid, $pagetitle, $pagekey, $pagedes, $classimg, $add, $doenews);
	$listtemp = str_replace('[!--page.stats--]', $onclick, $listtemp);
	$no = 1;
	$ok = 0;
	$changerow = 1;
	$num = $empire->gettotal($totalquery);
	if ($limitnum && ($limitnum < $num)) {
		$num = $limitnum;
	}

	$page = ceil($num / $lencord);
	$list_exp = '[!--empirenews.listtemp--]';
	$list_r = explode($list_exp, $listtemp);

	if (empty($num)) {
		$noinfopath = $dopath . 'index' . $dotype;
		notinfolisthtml($noinfopath, $list_r, $classlevel);
		return '';
	}

	$sql = $empire->query($query);
	$listtext = $list_r[1];

	while ($k = $empire->fetch($sql)) {
		$repvar = ReplaceListVars($no, $listvar, $subnews, $subtitle, $formatdate, $url, $haveclass, $k, $field, $docode);
		$listtext = str_replace('<!--list.var' . $changerow . '-->', $repvar, $listtext);
		$changerow += 1;

		if ($rownum < $changerow) {
			$changerow = 1;
			$string .= $listtext;
			$listtext = $list_r[1];
		}

		if ((($no % $lencord) == 0) || ((($num % $lencord) != 0) && ($num == $no))) {
			$ok += 1;
			$pagenum = ceil($no / $lencord);

			if ($pagenum == 1) {
				$path = $dopath . 'index' . $dotype;
			}
			else {
				$path = $dopath . 'index_' . $ok . $dotype;
			}

			$returnpager = $thefun($num, $pagenum, $dolink, $dotype, $page, $lencord, $ok, $myoptions, $pagefunr);
			$showpage = $returnpager['showpage'];
			$myoptions = $returnpager['option'];
			$list1 = str_replace($bereplistpage, $showpage, $list_r[0]);
			$list2 = str_replace($bereplistpage, $showpage, $list_r[2]);
			if (($changerow <= $rownum) && ($listtext != $list_r[1])) {
				$string .= $listtext;
			}

			$listtext = $list_r[1];
			$changerow = 1;
			$string = $list1 . $string . $list2;
			$string = str_replace('[!--list.pageno--]', $pagenum == 1 ? '' : $pagenum, $string);
			WriteFiletext($path, $classlevel . $string);
			$string = '';
		}

		$no++;
	}

	if (($enews == 0) & ($mid == 1)) {
		$no = 1;
		$ok = 0;
		$listtempid = 5;
		$listtemp_r = GetListTemp($listtempid);
		$listtemp = $listtemp_r[temptext];
		$listtemp = class_replacesvars($listtemp, $url, $selfclassid, $pagetitle, $pagekey, $pagedes, $classimg, $add, $doenews);
		$list_exp = '[!--empirenews.listtemp--]';
		$list_r = explode($list_exp, $listtemp);
		$LMmobilepath = eReturnTrueEcmsPath() . 'mobile/list/';
		$sql = $empire->query($query);
		$listtext = $list_r[1];

		while ($k = $empire->fetch($sql)) {
			if ((($no % $lencord) == 0) || ((($num % $lencord) != 0) && ($num == $no))) {
				$ok += 1;
				$mobilepath = $LMmobilepath . $classid . $dotype;
				$list1 = str_replace($bereplistpage, $showpage, $list_r[0]);
				$list2 = str_replace($bereplistpage, $showpage, $list_r[2]);
				$string = $list1 . $string . $list2;
				WriteFiletext($mobilepath, $classlevel . $string);
				$string = '';
			}

			$no++;
		}
	}

	$empire->free($sql);
}

function ListHtmlIndex($classid, $fields, $enews = 0, $userlistr = '')
{
	global $empire;
	global $dbtbpre;
	global $emod_r;
	global $public_r;
	global $class_r;
	global $class_zr;
	global $fun_r;
	global $class_tr;
	global $level_r;
	global $etable_r;
	$GLOBALS['navclassid'] = $classid;
	$dofile = 'index';
	$classlevel = '';
	$yhvar = 'qlist';
	$mid = 0;

	if ($enews == 0) {
		$selfclassid = $classid;
		$doenews = 1;
		$cr = $empire->fetch1('select ztpagekey,intro,ztimg,classtempid from ' . $dbtbpre . 'enewszt where ztid=\'' . $classid . '\'');
		$pagetitle = ehtmlspecialchars($class_zr[$classid][ztname]);
		$pagekey = ehtmlspecialchars($cr['ztpagekey']);
		$pagedes = ehtmlspecialchars($cr['intro']);
		$classimg = $cr['ztimg'];
		$url = ReturnZtLink($classid);
		$haveclass = 1;

		if ($class_zr[$classid][islist] != 1) {
			$classtemp = ($class_zr[$classid][islist] == 2 ? GetZtText($classid) : GetClassTemp($cr['classtempid']));
			newsbq($classid, $classtemp, 3, 0);
			return '';
		}

		if (empty($class_zr[$classid][reorder])) {
			$addorder = 'newstime desc';
		}
		else {
			$addorder = $class_zr[$classid][reorder];
		}

		if ($class_zr[$classid][maxnum]) {
			$limit = ' limit ' . $class_zr[$classid][maxnum];
			$limitnum = $class_zr[$classid][maxnum];
		}

		$yhid = $class_zr[$classid][yhid];

		if ($yhid) {
			$yhadd = ReturnYhSql($yhid, $yhvar, 1);
		}

		$query = 'select ztid,cid,classid,id,isgood from ' . $dbtbpre . 'enewsztinfo where ' . $yhadd . 'ztid=\'' . $classid . '\' order by ' . $addorder . $limit;
		$totalquery = 'select count(*) as total from ' . $dbtbpre . 'enewsztinfo where ' . $yhadd . 'ztid=\'' . $classid . '\'';
		$doclasspath = ReturnSaveZtPath($classid, 0);
		$dopath = ECMS_PATH . $doclasspath . '/';

		if (empty($class_zr[$classid][zturl])) {
			$dolink = $public_r[newsurl] . $doclasspath . '/';
		}
		else {
			$dolink = $class_zr[$classid][zturl] . '/';
		}

		$dotype = $class_zr[$classid][zttype];
		$classname = $class_zr[$classid][ztname];
		$lencord = $class_zr[$classid][ztnum];
		$onclick = '<script src=\'' . $public_r[newsurl] . 'e/public/onclick/?enews=dozt&ztid=' . $classid . '\'></script>';
		$listtempid = $class_zr[$classid][listtempid];
	}
	else if ($enews == 1) {
		$selfclassid = $classid;
		$doenews = 1;
		$cr = $empire->fetch1('select ztid,cname,islist,listtempid,maxnum,tnum,reorder,ttype from ' . $dbtbpre . 'enewszttype where cid=\'' . $classid . '\'');
		$GLOBALS['navinfor']['ecmsbid'] = $cr['ztid'];
		$pagetitle = ehtmlspecialchars($cr['cname']);
		$pagekey = ehtmlspecialchars($cr['cname']);
		$pagedes = ehtmlspecialchars($cr['cname']);
		$url = ReturnZtLink($cr['ztid']);
		$haveclass = 1;

		if ($cr['islist'] != 1) {
			$classtemp = GetZtcText($classid);
			newsbq($classid, $classtemp, 4, 0);
			return '';
		}

		if (empty($cr['reorder'])) {
			$addorder = 'newstime desc';
		}
		else {
			$addorder = $cr['reorder'];
		}

		if ($cr['maxnum']) {
			$limit = ' limit ' . $cr['maxnum'];
			$limitnum = $cr['maxnum'];
		}

		$ztid = $cr['ztid'];
		$yhid = $class_zr[$ztid][yhid];

		if ($yhid) {
			$yhadd = ReturnYhSql($yhid, $yhvar, 1);
		}

		$query = 'select ztid,cid,classid,id,isgood from ' . $dbtbpre . 'enewsztinfo where ' . $yhadd . 'cid=\'' . $classid . '\' order by ' . $addorder . $limit;
		$totalquery = 'select count(*) as total from ' . $dbtbpre . 'enewsztinfo where ' . $yhadd . 'cid=\'' . $classid . '\'';
		$doclasspath = ReturnSaveZtPath($ztid, 0);
		$dopath = ECMS_PATH . $doclasspath . '/';

		if (empty($class_zr[$ztid][zturl])) {
			$dolink = $public_r[newsurl] . $doclasspath . '/';
		}
		else {
			$dolink = $class_zr[$ztid][zturl] . '/';
		}

		$dofile = 'type' . $classid;
		$dotype = $cr['ttype'];
		$classname = $cr['cname'];
		$lencord = $cr['tnum'];
		$onclick = '<script src=\'' . $public_r[newsurl] . 'e/public/onclick/?enews=dozt&ztid=' . $ztid . '\'></script>';
		$listtempid = $cr['listtempid'];
	}
	else if ($enews == 4) {
		$selfclassid = 0;
		$doenews = 1;
		$userlistr['listsql'] = RepSqlTbpre($userlistr['listsql']);
		$userlistr['totalsql'] = RepSqlTbpre($userlistr['totalsql']);
		$pagetitle = ehtmlspecialchars($userlistr['pagetitle']);
		$pagekey = ehtmlspecialchars($userlistr['pagekeywords']);
		$pagedes = ehtmlspecialchars($userlistr['pagedescription']);
		$haveclass = 1;

		if ($userlistr['maxnum']) {
			$limit = ' limit ' . $userlistr['maxnum'];
			$limitnum = $userlistr['maxnum'];
		}

		$query = stripSlashes($userlistr['listsql']) . $limit;
		$totalquery = stripSlashes($userlistr['totalsql']);
		$dopath = $userlistr['addpath'] . $userlistr['filepath'];
		$dolink = $public_r[newsurl] . str_replace($userlistr['addpath'] . '../../', '', $dopath);
		$dotype = $userlistr['filetype'];
		$classname = $userlistr['pagetitle'];
		$lencord = $userlistr['lencord'];
		$onclick = '';
		$url = ReturnUserPLink($pagetitle, $dolink);
		$listtempid = $userlistr['listtempid'];
	}

	if (empty($lencord)) {
		$lencord = 25;
	}

	$listtemp_r = GetListTemp($listtempid);
	$listtemp = $listtemp_r[temptext];
	$subnews = $listtemp_r[subnews];
	$subtitle = $listtemp_r[subtitle];
	$docode = $listtemp_r[docode];
	$listvar = str_replace('[!--news.url--]', $public_r[newsurl], $listtemp_r[listvar]);
	$rownum = $listtemp_r[rownum];
	$formatdate = $listtemp_r[showdate];

	if (empty($rownum)) {
		$rownum = 1;
	}

	if (empty($mid)) {
		$mid = $listtemp_r[modid];
	}

	$field = ReturnReplaceListF($mid);
	$pagefunr['dofile'] = $dofile;
	if (!empty($public_r['listpagefun']) || !empty($public_r['listpagelistfun'])) {
		if (strstr($listtemp, '[!--show.page--]')) {
			$thefun = $public_r['listpagefun'];
			$bereplistpage = '[!--show.page--]';
		}
		else {
			$thefun = $public_r['listpagelistfun'];
			$bereplistpage = '[!--show.listpage--]';
		}
	}
	else {
		$thefun = 'sys_ShowListPage';
		$bereplistpage = '[!--show.page--]';
	}

	$listtemp = str_replace('[!--newsnav--]', $url, $listtemp);
	$listtemp = class_replacesvars($listtemp, $url, $selfclassid, $pagetitle, $pagekey, $pagedes, $classimg, $add, $doenews);
	$listtemp = str_replace('[!--page.stats--]', $onclick, $listtemp);
	$no = 1;
	$ok = 0;
	$changerow = 1;
	$num = $empire->gettotal($totalquery);
	if ($limitnum && ($limitnum < $num)) {
		$num = $limitnum;
	}

	$page = ceil($num / $lencord);
	$list_exp = '[!--empirenews.listtemp--]';
	$list_r = explode($list_exp, $listtemp);

	if (empty($num)) {
		$noinfopath = $dopath . $dofile . $dotype;
		notinfolisthtml($noinfopath, $list_r, $classlevel);
		return '';
	}

	$sql = $empire->query($query);
	$listtext = $list_r[1];

	while ($k = $empire->fetch($sql)) {
		if (empty($class_r[$k[classid]][tbname])) {
			$no++;
			continue;
		}

		$infor = $empire->fetch1('select * from ' . $dbtbpre . 'ecms_' . $class_r[$k[classid]][tbname] . ' where id=\'' . $k['id'] . '\' limit 1');

		if (empty($infor['id'])) {
			$no++;
			continue;
		}

		$repvar = ReplaceListVars($no, $listvar, $subnews, $subtitle, $formatdate, $url, $haveclass, $infor, $field, $docode);
		$listtext = str_replace('<!--list.var' . $changerow . '-->', $repvar, $listtext);
		$changerow += 1;

		if ($rownum < $changerow) {
			$changerow = 1;
			$string .= $listtext;
			$listtext = $list_r[1];
		}

		if ((($no % $lencord) == 0) || ((($num % $lencord) != 0) && ($num == $no))) {
			$ok += 1;
			$pagenum = ceil($no / $lencord);

			if ($pagenum == 1) {
				$path = $dopath . $dofile . $dotype;
			}
			else {
				$path = $dopath . $dofile . '_' . $ok . $dotype;
			}

			$returnpager = $thefun($num, $pagenum, $dolink, $dotype, $page, $lencord, $ok, $myoptions, $pagefunr);
			$showpage = $returnpager['showpage'];
			$myoptions = $returnpager['option'];
			$list1 = str_replace($bereplistpage, $showpage, $list_r[0]);
			$list2 = str_replace($bereplistpage, $showpage, $list_r[2]);
			if (($changerow <= $rownum) && ($listtext != $list_r[1])) {
				$string .= $listtext;
			}

			$listtext = $list_r[1];
			$changerow = 1;
			$string = $list1 . $string . $list2;
			$string = str_replace('[!--list.pageno--]', $pagenum == 1 ? '' : $pagenum, $string);
			WriteFiletext($path, $classlevel . $string);
			$string = '';
		}

		$no++;
	}

	$empire->free($sql);
}

function ReturnListpageStr($pagenum, $page, $lencord, $num, $pagelink, $options)
{
	global $public_r;
	$temp = $public_r['listpagetemp'];
	$temp = str_replace('[!--thispage--]', $pagenum, $temp);
	$temp = str_replace('[!--pagenum--]', $page, $temp);
	$temp = str_replace('[!--lencord--]', $lencord, $temp);
	$temp = str_replace('[!--num--]', $num, $temp);
	$temp = str_replace('[!--pagelink--]', $pagelink, $temp);
	$temp = str_replace('[!--options--]', $options, $temp);
	return $temp;
}

function DoGetHtml($classid, $id)
{
	global $empire;
	global $class_r;
	global $public_r;
	global $dbtbpre;
	$classid = intval($classid);
	$id = intval($id);
	$tbname = $class_r[$classid][tbname];
	if (!$id || !$classid || !$tbname) {
		echo '<script>self.location.href=\'' . $public_r['newsurl'] . '\';</script>';
		exit();
	}

	$r = $empire->fetch1('select * from ' . $dbtbpre . 'ecms_' . $tbname . ' where id=\'' . $id . '\'');
	if (!$r['id'] || ($classid != $r['classid'])) {
		echo '<script>self.location.href=\'' . $public_r['newsurl'] . '\';</script>';
		exit();
	}

	$titleurl = sys_ReturnBqAutoTitleLink($r);

	if (!empty($r[havehtml])) {
		return $titleurl;
	}

	GetHtml($r['classid'], $r['id'], $r, 1);
	return $titleurl;
}

function GetHtmlRepVar($tempr, $classid)
{
	global $public_r;
	global $class_r;
	global $class_zr;
	global $fun_r;
	global $empire;
	global $dbtbpre;
	global $emod_r;
	global $class_tr;
	global $level_r;
	global $etable_r;
	$mid = $class_r[$classid]['modid'];
	$tbname = $class_r[$classid][tbname];
	$newstemptext = $tempr[temptext];
	$formatdate = $tempr[showdate];
	$expage = '[!--empirenews.page--]';
	$pf = $emod_r[$mid]['pagef'];
	$tempf = $emod_r[$mid]['tempf'];
	$fr = explode(',', $tempf);
	$fcount = count($fr) - 1;
	$newstempstr = $newstemptext;
	$newstempstr = str_replace('[!--class.menu--]', $public_r['classnavs'], $newstempstr);
	$newstempstr = str_replace('[!--newsnav--]', '<?=$grurl?>', $newstempstr);
	$newstempstr = str_replace('[!--pagetitle--]', '<?=$grpagetitle?>', $newstempstr);
	$newstempstr = str_replace('[!--pagekey--]', '<?=$ecms_gr[keyboard]?>', $newstempstr);
	$newstempstr = str_replace('[!--pagedes--]', '<?=$grpagetitle?>', $newstempstr);
	$newstempstr = str_replace('[!--self.classid--]', '<?=$ecms_gr[classid]?>', $newstempstr);
	$newstempstr = str_replace('[!--bclass.id--]', '<?=$grbclassid?>', $newstempstr);
	$newstempstr = str_replace('[!--bclass.name--]', '<?=$class_r[$grbclassid][classname]?>', $newstempstr);
	$newstempstr = str_replace('[!--news.url--]', $public_r['newsurl'], $newstempstr);
	$i = 1;

	for (; $i < $fcount; $i++) {
		$f = $fr[$i];
		$value = '$ecms_gr[' . $f . ']';

		if ($f == $pf) {
			$value = 'strstr(' . $value . ',\'' . $expage . '\')?\'[!--' . $f . '--]\':' . $value;
		}
		else if ($f == 'downpath') {
			$value = 'ReturnDownSoftHtml($ecms_gr)';
		}
		else if ($f == 'onlinepath') {
			$value = 'ReturnOnlinepathHtml($ecms_gr)';
		}
		else if ($f == 'morepic') {
			$value = 'ReturnMorepicpathHtml($ecms_gr)';
		}
		else if ($f == 'newstime') {
			$value = 'date(\'' . $formatdate . '\',' . $value . ')';
		}
		else if ($f == 'befrom') {
			$value = '$docheckrep[1]?ReplaceBefrom(' . $value . '):' . $value;
		}
		else if ($f == 'writer') {
			$value = '$docheckrep[2]?ReplaceWriter(' . $value . '):' . $value;
		}
		else if ($f == 'titlepic') {
			$value = 'empty(' . $value . ')?$public_r[newsurl].\'e/data/images/notimg.gif\':' . $value;
		}
		else if ($f == 'title') {
		}
		else if (!strstr($emod_r[$mid]['editorf'], ',' . $f . ',')) {
			if (strstr($emod_r[$mid]['tobrf'], ',' . $f . ',')) {
				$value = 'nl2br(' . $value . ')';
			}

			if (!strstr($emod_r[$mid]['dohtmlf'], ',' . $f . ',')) {
				$value = 'RepFieldtextNbsp(ehtmlspecialchars(' . $value . '))';
			}
		}

		$newstempstr = str_replace('[!--' . $f . '--]', '<?=' . $value . '?>', $newstempstr);
	}

	$newstempstr = str_replace('[!--id--]', '<?=$ecms_gr[id]?>', $newstempstr);
	$newstempstr = str_replace('[!--classid--]', '<?=$ecms_gr[classid]?>', $newstempstr);
	$newstempstr = str_replace('[!--class.name--]', '<?=$class_r[$ecms_gr[classid]][classname]?>', $newstempstr);
	$newstempstr = str_replace('[!--ttid--]', '<?=$ecms_gr[ttid]?>', $newstempstr);
	$newstempstr = str_replace('[!--tt.name--]', '<?=$class_tr[$ecms_gr[ttid]][tname]?>', $newstempstr);
	$newstempstr = str_replace('[!--tt.url--]', '<?=sys_ReturnBqInfoTypeUrl($ecms_gr[ttid])?>', $newstempstr);
	$newstempstr = str_replace('[!--onclick--]', '<?=$ecms_gr[onclick]?>', $newstempstr);
	$newstempstr = str_replace('[!--userfen--]', '<?=$ecms_gr[userfen]?>', $newstempstr);
	$newstempstr = str_replace('[!--username--]', '<?=$ecms_gr[username]?>', $newstempstr);
	$newstempstr = str_replace('[!--linkusername--]', '<?=$ecms_gr[ismember]==1&&$ecms_gr[userid]?\'<a href="\'.$public_r[newsurl].\'e/space/?userid=\'.$ecms_gr[userid].\'" target=_blank>\'.$ecms_gr[username].\'</a>\':$ecms_gr[username]?>', $newstempstr);
	$newstempstr = str_replace('[!--userid--]', '<?=$ecms_gr[userid]?>', $newstempstr);
	$keyboardtext = '<?=GetKeyboard($ecms_gr[keyboard],$ecms_gr[keyid],$ecms_gr[classid],$ecms_gr[id],$class_r[$ecms_gr[classid]][link_num])?>';
	$newstempstr = str_replace('[!--other.link--]', $keyboardtext, $newstempstr);
	$newstempstr = str_replace('[!--plnum--]', '<?=$ecms_gr[plnum]?>', $newstempstr);
	$newstempstr = str_replace('[!--totaldown--]', '<?=$ecms_gr[totaldown]?>', $newstempstr);
	$newstempstr = str_replace('[!--keyboard--]', '<?=$ecms_gr[keyboard]?>', $newstempstr);
	$newstempstr = str_replace('[!--titleurl--]', '<?=$grtitleurl?>', $newstempstr);
	$onclick = '<?=\'<script src="\'.$public_r[newsurl].\'e/public/onclick/?enews=donews&classid=\'.$ecms_gr[classid].\'&id=\'.$ecms_gr[id].\'"></script>\'?>';
	$newstempstr = str_replace('[!--page.stats--]', $onclick, $newstempstr);
	$newstempstr = str_replace('[!--class.url--]', '<?=$grclassurl?>', $newstempstr);

	if (strstr($newstemptext, '[!--info.next--]')) {
		$infonext = '<?php' . "\r\n" . '	$next_r=$empire->fetch1("select isurl,titleurl,classid,id,title from {$dbtbpre}ecms_".$class_r[$ecms_gr[classid]][tbname]." where id>$ecms_gr[id] and classid=\'$ecms_gr[classid]\' order by id limit 1");' . "\r\n" . '	if(empty($next_r[id]))' . "\r\n" . '	{$infonext="<a href=\'".$grclassurl."\'>' . $fun_r['HaveNoNextLink'] . '</a>";}' . "\r\n" . '	else' . "\r\n" . '	{' . "\r\n" . '		$nexttitleurl=sys_ReturnBqTitleLink($next_r);' . "\r\n" . '		$infonext="<a href=\'".$nexttitleurl."\'>".$next_r[title]."</a>";' . "\r\n" . '	}' . "\r\n" . '	echo $infonext;' . "\r\n" . '	?>';
		$newstempstr = str_replace('[!--info.next--]', $infonext, $newstempstr);
	}

	if (strstr($newstemptext, '[!--info.pre--]')) {
		$infopre = '<?php' . "\r\n" . '	$next_r=$empire->fetch1("select isurl,titleurl,classid,id,title from {$dbtbpre}ecms_".$class_r[$ecms_gr[classid]][tbname]." where id<$ecms_gr[id] and classid=\'$ecms_gr[classid]\' order by id desc limit 1");' . "\r\n" . '	if(empty($next_r[id]))' . "\r\n" . '	{$infonext="<a href=\'".$grclassurl."\'>' . $fun_r['HaveNoNextLink'] . '</a>";}' . "\r\n" . '	else' . "\r\n" . '	{' . "\r\n" . '		$nexttitleurl=sys_ReturnBqTitleLink($next_r);' . "\r\n" . '		$infonext="<a href=\'".$nexttitleurl."\'>".$next_r[title]."</a>";' . "\r\n" . '	}' . "\r\n" . '	echo $infonext;' . "\r\n" . '	?>';
		$newstempstr = str_replace('[!--info.pre--]', $infopre, $newstempstr);
	}

	if (strstr($newstemptext, '[!--info.vote--]')) {
		$newstempstr = str_replace('[!--info.vote--]', '<?=sys_GetInfoVote($ecms_gr[classid],$ecms_gr[id])?>', $newstempstr);
	}

	return $newstempstr;
}

function GetHtml($classid, $id, $add, $ecms = 0, $doall = 0)
{
	global $public_r;
	global $class_r;
	global $class_zr;
	global $fun_r;
	global $empire;
	global $dbtbpre;
	global $emod_r;
	global $class_tr;
	global $level_r;
	global $etable_r;
	$mid = $class_r[$classid]['modid'];
	$tbname = $class_r[$classid][tbname];

	if (InfoIsInTable($tbname)) {
		return '';
	}

	if ($ecms == 0) {
		$add = $empire->fetch1('select ' . ReturnSqlTextF($mid, 1) . ' from ' . $dbtbpre . 'ecms_' . $tbname . ' where id=\'' . $id . '\' limit 1');
	}

	$add['id'] = $id;
	$add['classid'] = $classid;

	if ($add['isurl']) {
		return '';
	}

	if (empty($doall)) {
		if (!$add['stb'] || ($class_r[$add[classid]][showdt] == 2) || strstr($public_r['nreinfo'], ',' . $add['classid'] . ',')) {
			return '';
		}
	}

	$addr = $empire->fetch1('select ' . ReturnSqlFtextF($mid) . ' from ' . $dbtbpre . 'ecms_' . $tbname . '_data_' . $add[stb] . ' where id=\'' . $add['id'] . '\' limit 1');
	$add = array_merge($add, $addr);
	$iclasspath = ReturnSaveInfoPath($add[classid], $add[id]);
	$doclasspath = eReturnTrueEcmsPath() . $iclasspath;
	$createinfopath = $doclasspath;
	$newspath = '';

	if ($add[newspath]) {
		$createpath = $doclasspath . $add[newspath];

		if (!file_exists($createpath)) {
			$r[newspath] = FormatPath($add[classid], $add[newspath], 1);
		}

		$createinfopath .= $add[newspath] . '/';
		$newspath = $add[newspath] . '/';
	}

	if ($class_r[$add[classid]][filename] == 3) {
		$createinfopath .= ReturnInfoSPath($add['filename']);
		DoMkdir($createinfopath);
		$fn3 = 1;
	}

	if ($emod_r[$mid]['savetxtf']) {
		$stf = $emod_r[$mid]['savetxtf'];

		if ($add[$stf]) {
			$add[$stf] = GetTxtFieldText($add[$stf]);
		}
	}

	$GLOBALS['navclassid'] = $add[classid];
	$GLOBALS['navinfor'] = $add;
	$add[newstempid] = $add[newstempid] ? $add[newstempid] : $class_r[$add[classid]][newstempid];
	$newstemp_r = $empire->fetch1('select temptext,showdate from ' . GetTemptb('enewsnewstemp') . ' where tempid=\'' . $add['newstempid'] . '\' limit 1');
	$newstemp_r['tempid'] = $add['newstempid'];

	if ($public_r['opennotcj']) {
		$newstemp_r['temptext'] = ReturnNotcj($newstemp_r['temptext']);
	}

	$newstemptext = $newstemp_r[temptext];
	$formatdate = $newstemp_r[showdate];
	if ($add[groupid] || $class_r[$add[classid]]['cgtoinfo']) {
		if (empty($add[newspath])) {
			$include = '';
		}
		else {
			$pr = explode('/', $add[newspath]);
			$i = 0;

			for (; $i < count($pr); $i++) {
				$include .= '../';
			}
		}

		if ($fn3 == 1) {
			$include .= '../';
		}

		$pr = explode('/', $iclasspath);
		$pcount = count($pr);
		$i = 0;

		for (; $i < ($pcount - 1); $i++) {
			$include .= '../';
		}

		$include1 = $include;
		$include .= 'e/class/CheckLevel.php';
		$filetype = '.php';
		$addlevel = '<?php' . "\r\n" . '		define(\'empirecms\',\'wm_chief\');' . "\r\n" . '		$check_tbname=\'' . $class_r[$add[classid]][tbname] . '\';' . "\r\n" . '		$check_infoid=' . $add[id] . ';' . "\r\n" . '		$check_classid=' . $add[classid] . ';' . "\r\n" . '		$check_path="' . $include1 . '";' . "\r\n" . '		require("' . $include . '");' . "\r\n" . '		?>';
	}
	else {
		$filetype = $class_r[$add[classid]][filetype];
		$addlevel = '';
	}

	if ($class_r[$add[classid]][classurl] && ($class_r[$add[classid]][ipath] == '')) {
		$dolink = $class_r[$add[classid]][classurl] . '/' . $newspath;
	}
	else {
		$dolink = $public_r[newsurl] . $iclasspath . $newspath;
	}

	$docheckrep = returncheckdorepstr();

	if ($add[newstext]) {
		if (empty($public_r['dorepword']) && $docheckrep[3]) {
			$add[newstext] = replaceword($add[newstext]);
		}

		if (empty($public_r['dorepkey']) && $docheckrep[4] && !empty($add[dokey])) {
			$add[newstext] = replacekey($add['newstext'], $add['classid']);
		}

		if ($public_r['opencopytext']) {
			$add[newstext] = AddNotCopyRndStr($add[newstext]);
		}
	}

	$newstemptext = getinfonewsbq($classid, $newstemp_r, $add, $docheckrep);
	$expage = '[!--empirenews.page--]';
	$pf = $emod_r[$mid]['pagef'];
	$newstempstr = $newstemptext;
	if ($pf && strstr($add[$pf], $expage)) {
		$n_r = explode($expage, $add[$pf]);
		$thispagenum = count($n_r);
		$thefun = ($public_r['textpagefun'] ? $public_r['textpagefun'] : 'sys_ShowTextPage');

		if (strstr($newstemptext, '[!--title.select--]')) {
			$dotitleselect = sys_ShowTextPageSelect($thispagenum, $dolink, $add, $filetype, $n_r);
		}

		$j = 1;

		for (; $j <= $thispagenum; $j++) {
			$string = $newstempstr;
			$truepage = '';
			$titleselect = '';

			if ($thispagenum == $j) {
				$thisnextlink = $dolink . $add[filename] . $filetype;
			}
			else {
				$thisj = $j + 1;
				$thisnextlink = $dolink . $add[filename] . '_' . $thisj . $filetype;
			}

			$k = $j - 1;

			if ($j == 1) {
				$file = $doclasspath . $newspath . $add[filename] . $filetype;
				$ptitle = $add[title];
			}
			else {
				$file = $doclasspath . $newspath . $add[filename] . '_' . $j . $filetype;
				$ti_r = explode('[/!--empirenews.page--]', $n_r[$k]);

				if (2 <= count($ti_r)) {
					$ptitle = $ti_r[0];
					$n_r[$k] = $ti_r[1];
				}
				else {
					$ptitle = $add[title] . '(' . $j . ')';
				}
			}

			if ($thispagenum != 1) {
				$truepage = $thefun($thispagenum, $j, $dolink, $add, $filetype, '');
				$titleselect = str_replace('?' . $j . '">', '?' . $j . '" selected>', $dotitleselect);
			}

			$newstext = $n_r[$k];

			if (!strstr($emod_r[$mid]['editorf'], ',' . $pf . ',')) {
				if (strstr($emod_r[$mid]['tobrf'], ',' . $pf . ',')) {
					$newstext = nl2br($newstext);
				}

				if (!strstr($emod_r[$mid]['dohtmlf'], ',' . $pf . ',')) {
					$newstext = ehtmlspecialchars($newstext);
					$newstext = RepFieldtextNbsp($newstext);
				}
			}

			$string = str_replace('[!--' . $pf . '--]', $newstext, $string);
			$string = str_replace('[!--p.title--]', strip_tags($ptitle), $string);
			$string = str_replace('[!--next.page--]', $thisnextlink, $string);
			$string = str_replace('[!--page.url--]', $truepage, $string);
			$string = str_replace('[!--title.select--]', $titleselect, $string);
			WriteFiletext($file, $addlevel . $string);
		}
	}
	else {
		$file = $doclasspath . $newspath . $add[filename] . $filetype;
		$string = $newstempstr;
		$string = str_replace('[!--p.title--]', $add[title], $string);
		$string = str_replace('[!--next.page--]', '', $string);
		$string = str_replace('[!--page.url--]', '', $string);
		$string = str_replace('[!--title.select--]', '', $string);
		WriteFiletext($file, $addlevel . $string);
	}

	if ($mid == 1) {
		$newstemp_r_mobile = $empire->fetch1('select temptext,showdate from ' . GetTemptb('enewsnewstemp') . ' where tempid=2 limit 1');
		$imobilepath = 'mobile/show/';
		$domobilepath = eReturnTrueEcmsPath() . $imobilepath;
		$newstemptext_mobile = getinfonewsbq($classid, $newstemp_r_mobile, $add, $docheckrep);
		$string_mobile = $newstemptext_mobile;
		$file_mobile = $domobilepath . $newspath . $add[id] . $filetype;
		WriteFiletext($file_mobile, $addlevel . $string_mobile);
	}

	if (empty($doall) && empty($add['havehtml'])) {
		$empire->query('update ' . $dbtbpre . 'ecms_' . $class_r[$add[classid]][tbname] . '_index set havehtml=1 where id=\'' . $add['id'] . '\' limit 1');
		$empire->query('update ' . $dbtbpre . 'ecms_' . $class_r[$add[classid]][tbname] . ' set havehtml=1 where id=\'' . $add['id'] . '\' limit 1');
	}
}

function ReturnNotcj($string)
{
	global $notcj_r;
	global $notcjnum;

	if (empty($notcjnum)) {
		$rep = '';
	}
	else {
		$i = rand(1, $notcjnum);
		$rep = $notcj_r[$i];
	}

	$cjword = '<!--ecms.*-->';
	$string = str_replace($cjword, $rep, $string);
	return $string;
}

function GetKeyboard($keyboard, $keyid, $classid, $id, $link_num)
{
	global $empire;
	global $public_r;
	global $class_r;
	global $fun_r;
	global $dbtbpre;
	if ($keyid && $link_num) {
		$add = 'id in (' . $keyid . ')';
		$tr = $empire->fetch1('select otherlinktemp,otherlinktempsub,otherlinktempdate from ' . GetTemptb('enewspubtemp') . ' limit 1');
		$temp_r = explode('[!--empirenews.listtemp--]', $tr[otherlinktemp]);
		$key_sql = $empire->query('select id,newstime,title,isurl,titleurl,classid,titlepic from ' . $dbtbpre . 'ecms_' . $class_r[$classid][tbname] . ' where ' . $add . ' order by newstime desc limit ' . $link_num);

		while ($link_r = $empire->fetch($key_sql)) {
			$keyboardtext .= RepOtherTemp($temp_r[1], $link_r, $tr);
		}

		$keyboardtext = $temp_r[0] . $keyboardtext . $temp_r[2];
	}
	else {
		$keyboardtext = $fun_r['NotLinkNews'];
	}

	return $keyboardtext;
}

function RepOtherTemp($temptext, $r, $tr)
{
	global $public_r;
	global $class_r;
	$title = sub($r[title], 0, $tr['otherlinktempsub'], false);
	$r['newstime'] = date($tr['otherlinktempdate'], $r['newstime']);
	$titlelink = sys_ReturnBqTitleLink($r);
	$temptext = str_replace('[!--title--]', $title, $temptext);
	$temptext = str_replace('[!--oldtitle--]', $r[title], $temptext);
	$temptext = str_replace('[!--titleurl--]', $titlelink, $temptext);
	$temptext = str_replace('[!--newstime--]', $r[newstime], $temptext);

	if (empty($r[titlepic])) {
		$titlepic = $public_r[newsurl] . 'e/data/images/notimg.gif';
	}
	else {
		$titlepic = $r[titlepic];
	}

	$temptext = str_replace('[!--titlepic--]', $titlepic, $temptext);
	return $temptext;
}

function ReturnDownSoftHtml($add)
{
	global $class_r;
	global $public_r;
	global $fun_r;
	global $level_r;

	if (empty($add[downpath])) {
		return '';
	}

	$down_num = ($class_r[$add[classid]][down_num] ? $class_r[$add[classid]][down_num] : 1);
	$ydownsofttemp = $public_r[downsofttemp];
	$ydownsofttemp = str_replace('[!--classid--]', $add[classid], $ydownsofttemp);
	$ydownsofttemp = str_replace('[!--id--]', $add[id], $ydownsofttemp);
	$ydownsofttemp = str_replace('[!--title--]', $add[title], $ydownsofttemp);
	$ydownsofttemp = str_replace('[!--news.url--]', $public_r[newsurl], $ydownsofttemp);
	$all_downpath = '';
	$path_r = explode("\r\n", $add[downpath]);
	$count = count($path_r);
	$pj = 0;

	for (; $pj < $count; $pj++) {
		$p = $pj + 1;

		if (($p % $down_num) == 0) {
			$ok = '<br>';
		}
		else {
			$ok = '';
		}

		if ($count == $p) {
			$ok = '';
		}

		if ((($pj % $down_num) == 0) || ($pj == 0)) {
			$nbsp = '';
		}
		else {
			$nbsp = '&nbsp;&nbsp;';
		}

		$showdown_r = explode('::::::', $path_r[$pj]);

		if (count($showdown_r) < 2) {
			$showdown_r[0] = $fun_r['DownPath'] . $p;
		}

		$downsofttemp = RepDownOnlinePathTemp($add, $ydownsofttemp, $pj, $showdown_r, 0);
		$all_downpath .= $nbsp . stripSlashes($downsofttemp) . $ok;
	}

	$value = $all_downpath;
	return $value;
}

function RepDownOnlinePathTemp($add, $downsofttemp, $pj, $showdown_r, $ecms)
{
	global $public_r;
	global $level_r;
	global $fun_r;

	if ($ecms == 0) {
		$downurl = $public_r[newsurl] . 'e/DownSys/DownSoft/?classid=' . $add['classid'] . '&id=' . $add['id'] . '&pathid=' . $pj;
	}
	else {
		$downurl = $public_r[newsurl] . 'e/DownSys/play/?classid=' . $add['classid'] . '&id=' . $add['id'] . '&pathid=' . $pj;
	}

	$downsofttemp = str_replace('[!--down.url--]', $downurl, $downsofttemp);
	$downsofttemp = str_replace('[!--down.name--]', $showdown_r[0], $downsofttemp);
	$downsofttemp = str_replace('[!--pathid--]', $pj, $downsofttemp);
	$downsofttemp = str_replace('[!--fen--]', $showdown_r[3], $downsofttemp);
	$group = ($showdown_r[2] ? $level_r[$showdown_r[2]][groupname] : $fun_r['hguest']);
	$downsofttemp = str_replace('[!--group--]', $group, $downsofttemp);

	if (strstr($downsofttemp, '[!--true.down.url--]')) {
		$durl = stripSlashes($showdown_r[1]);
		$durlr = ReturnDownQzPath($durl, $showdown_r[4]);
		$durl = $durlr['repath'];
		$downsofttemp = str_replace('[!--true.down.url--]', $durl, $downsofttemp);
	}

	return $downsofttemp;
}

function ReturnOnlinepathHtml($add)
{
	global $class_r;
	global $public_r;
	global $fun_r;
	global $level_r;

	if (empty($add[onlinepath])) {
		return '';
	}

	$down_num = ($class_r[$add[classid]][online_num] ? $class_r[$add[classid]][online_num] : 1);
	$yonlinemovietemp = $public_r[onlinemovietemp];
	$yonlinemovietemp = str_replace('[!--classid--]', $add[classid], $yonlinemovietemp);
	$yonlinemovietemp = str_replace('[!--id--]', $add[id], $yonlinemovietemp);
	$yonlinemovietemp = str_replace('[!--title--]', $add[title], $yonlinemovietemp);
	$yonlinemovietemp = str_replace('[!--news.url--]', $public_r[newsurl], $yonlinemovietemp);
	$all_downpath = '';
	$path_r = explode("\r\n", $add[onlinepath]);
	$count = count($path_r);
	$pj = 0;

	for (; $pj < $count; $pj++) {
		$p = $pj + 1;

		if (($p % $down_num) == 0) {
			$ok = '<br>';
		}
		else {
			$ok = '';
		}

		if ($count == $p) {
			$ok = '';
		}

		if ((($pj % $down_num) == 0) || ($pj == 0)) {
			$nbsp = '';
		}
		else {
			$nbsp = '&nbsp;&nbsp;';
		}

		$showdown_r = explode('::::::', $path_r[$pj]);

		if (count($showdown_r) < 2) {
			$showdown_r[0] = $p;
		}

		$downsofttemp = repdownonlinepathtemp($add, $yonlinemovietemp, $pj, $showdown_r, 1);
		$all_downpath .= $nbsp . stripSlashes($downsofttemp) . $ok;
	}

	$value = $all_downpath;
	return $value;
}

function ReturnMorepicpathHtml($add)
{
	global $public_r;
	global $fun_r;

	if (empty($add[morepic])) {
		return '';
	}

	$line = ($add[num] ? $add[num] : 1);
	$picpath = '';
	$path_r = explode("\r\n", $add[morepic]);
	$pj = 0;

	for (; $pj < count($path_r); $pj++) {
		$p = $pj + 1;
		if (((($p - 1) % $line) == 0) || ($p == 1)) {
			$picpath .= '<tr>';
		}

		$showdown_r = explode('::::::', $path_r[$pj]);
		$name = '';

		if (!empty($showdown_r[2])) {
			$name = '<br><span style=\'line-height=18pt\'>' . $showdown_r[2] . '</span>';
		}

		$width = ($add[width] ? ' width=\'' . $add[width] . '\'' : '');
		$height = ($add[height] ? ' height=\'' . $add[height] . '\'' : '');
		$picpath .= '<td align=center><a href=\'' . $public_r[newsurl] . 'e/ViewImg/index.html?url=' . $showdown_r[1] . '\' target=_blank><img src=\'' . $showdown_r[0] . '\'' . $width . $height . ' border=0>' . $name . '</a></td>';

		if (($p % $line) == 0) {
			$picpath .= '</tr>';
		}
	}

	if ($p != 0) {
		$table = '<table width=\'100%\' border=0 cellpadding=4 cellspacing=4>';
		$table1 = '</table>';
		$ys = $line - ($p % $line);
		$dotr = 0;
		$j = 0;

		for (; $ys != $line; $j++) {
			$dotr = 1;
			$picpath .= '<td></td>';
		}

		if ($dotr == 1) {
			$picpath .= '</tr>';
		}
	}

	$value = $table . $picpath . $table1;
	return $value;
}

function GetNewsJs($classid, $line, $sub, $showdate, $enews = 0, $tempr)
{
	global $empire;
	global $public_r;
	global $class_r;
	global $class_tr;
	global $emod_r;
	global $etable_r;
	global $dbtbpre;
	global $eyh_r;

	if (empty($line)) {
		$line = 10;
	}

	if (empty($sub)) {
		$sub = 26;
	}

	if (($enews == 0) || ($enews == 1) || ($enews == 2) || ($enews == 9) || ($enews == 12) || ($enews == 15)) {
		$where = ($class_r[$classid][islast] ? 'classid=\'' . $classid . '\'' : ReturnClass($class_r[$classid][sonclass]));
		$tbname = $class_r[$classid][tbname];
		$mid = $class_r[$classid][modid];
		$yhid = $class_r[$classid][yhid];
	}
	else {
		if (($enews == 25) || ($enews == 26) || ($enews == 27) || ($enews == 28) || ($enews == 29) || ($enews == 30)) {
			$where = 'ttid=\'' . $classid . '\'';
			$mid = $class_tr[$classid][mid];
			$tbname = $emod_r[$mid][tbname];
			$yhid = $class_tr[$classid][yhid];
		}
	}

	$allpath = ECMS_PATH . 'd/js/js/';
	$ttpath = ECMS_PATH . 'd/js/class/tt' . $classid . '_';
	$classpath = ECMS_PATH . 'd/js/class/class' . $classid . '_';
	$query = '';
	$qand = ' and ';

	if ($enews == 0) {
		$query = ' where ' . $where;
		$order = 'newstime';
		$newsjs = $classpath . 'newnews.js';
		$yhvar = 'bqnew';
	}
	else if ($enews == 1) {
		$query = ' where ' . $where;
		$order = 'onclick';
		$newsjs = $classpath . 'hotnews.js';
		$yhvar = 'bqhot';
	}
	else if ($enews == 2) {
		$query = ' where ' . $where . ' and isgood>0';
		$order = 'newstime';
		$newsjs = $classpath . 'goodnews.js';
		$yhvar = 'bqgood';
	}
	else if ($enews == 9) {
		$query = ' where ' . $where;
		$order = 'plnum';
		$newsjs = $classpath . 'hotplnews.js';
		$yhvar = 'bqpl';
	}
	else if ($enews == 12) {
		$query = ' where ' . $where . ' and firsttitle>0';
		$order = 'newstime';
		$newsjs = $classpath . 'firstnews.js';
		$yhvar = 'bqfirst';
	}
	else if ($enews == 3) {
		$qand = ' where ';
		$tbname = $public_r['tbname'];
		$order = 'newstime';
		$newsjs = $allpath . 'newnews.js';
		$mid = $etable_r[$tbname][mid];
		$yhvar = 'bqnew';
		$yhid = $etable_r[$tbname][yhid];
	}
	else if ($enews == 4) {
		$qand = ' where ';
		$tbname = $public_r['tbname'];
		$order = 'onclick';
		$newsjs = $allpath . 'hotnews.js';
		$mid = $etable_r[$tbname][mid];
		$yhvar = 'bqhot';
		$yhid = $etable_r[$tbname][yhid];
	}
	else if ($enews == 5) {
		$tbname = $public_r['tbname'];
		$query = ' where isgood>0';
		$order = 'newstime';
		$newsjs = $allpath . 'goodnews.js';
		$mid = $etable_r[$tbname][mid];
		$yhvar = 'bqgood';
		$yhid = $etable_r[$tbname][yhid];
	}
	else if ($enews == 10) {
		$qand = ' where ';
		$tbname = $public_r['tbname'];
		$order = 'plnum';
		$newsjs = $allpath . 'hotplnews.js';
		$mid = $etable_r[$tbname][mid];
		$yhvar = 'bqpl';
		$yhid = $etable_r[$tbname][yhid];
	}
	else if ($enews == 13) {
		$tbname = $public_r['tbname'];
		$query = ' where firsttitle>0';
		$order = 'newstime';
		$newsjs = $allpath . 'firstnews.js';
		$mid = $etable_r[$tbname][mid];
		$yhvar = 'bqfirst';
		$yhid = $etable_r[$tbname][yhid];
	}
	else if ($enews == 25) {
		$query = ' where ' . $where;
		$order = 'newstime';
		$newsjs = $ttpath . 'newnews.js';
		$yhvar = 'bqnew';
	}
	else if ($enews == 26) {
		$query = ' where ' . $where;
		$order = 'onclick';
		$newsjs = $ttpath . 'hotnews.js';
		$yhvar = 'bqhot';
	}
	else if ($enews == 27) {
		$query = ' where ' . $where . ' and isgood>0';
		$order = 'newstime';
		$newsjs = $ttpath . 'goodnews.js';
		$yhvar = 'bqgood';
	}
	else if ($enews == 28) {
		$query = ' where ' . $where;
		$order = 'plnum';
		$newsjs = $ttpath . 'hotplnews.js';
		$yhvar = 'bqpl';
	}
	else if ($enews == 29) {
		$query = ' where ' . $where . ' and firsttitle>0';
		$order = 'newstime';
		$newsjs = $ttpath . 'firstnews.js';
		$yhvar = 'bqfirst';
	}

	$ret_r = ReturnReplaceListF($tempr[modid]);
	$yhadd = '';

	if (!empty($eyh_r[$yhid]['dojs'])) {
		$yhadd = ReturnYhSql($yhid, $yhvar);

		if (!empty($yhadd)) {
			$query .= $qand . $yhadd;
			$qand = ' and ';
		}
	}

	$query = 'select ' . ReturnSqlListF($mid) . ' from ' . $dbtbpre . 'ecms_' . $tbname . $query . ' order by ' . ReturnSetTopSql('js') . $order . ' desc limit ' . $line;
	$sql = $empire->query($query);
	$tempr[temptext] = str_replace('[!--news.url--]', $public_r[newsurl], $tempr[temptext]);
	$temp_r = explode('[!--empirenews.listtemp--]', $tempr[temptext]);
	$no = 1;

	while ($r = $empire->fetch($sql)) {
		$r[oldtitle] = $r[title];
		$repvar = ReplaceListVars($no, $temp_r[1], $tempr[subnews], $tempr[subtitle], $tempr[showdate], $url, 0, $r, $ret_r);
		$allnew .= $repvar;
		$no++;
	}

	$allnew = 'document.write("' . addslashes(stripSlashes(str_replace("\r\n", '', $temp_r[0] . $allnew . $temp_r[2]))) . '");';
	WriteFiletext_n($newsjs, $allnew);
}

function ReUserjs($jsr, $addpath)
{
	global $empire;
	global $public_r;
	DoFileMkDir($addpath . $jsr['jsfilename']);
	$jstemptext = GetTheJstemp($jsr[jstempid]);
	$ret_r = ReturnReplaceListF($jstemptext[modid]);
	$jstemptext[temptext] = str_replace('[!--news.url--]', $public_r[newsurl], $jstemptext[temptext]);
	$temp_r = explode('[!--empirenews.listtemp--]', $jstemptext[temptext]);
	$query = $jsr[jssql];
	$query = RepSqlTbpre($query);
	$sql = $empire->query($query);
	$no = 1;

	while ($r = $empire->fetch($sql)) {
		$r[oldtitle] = $r[title];
		$repvar = ReplaceListVars($no, $temp_r[1], $jstemptext[subnews], $jstemptext[subtitle], $jstemptext[showdate], $url, 0, $r, $ret_r);
		$allnew .= $repvar;
		$no++;
	}

	$allnew = 'document.write("' . addslashes(stripSlashes(str_replace("\r\n", '', $temp_r[0] . $allnew . $temp_r[2]))) . '");';
	WriteFiletext_n($addpath . $jsr['jsfilename'], $allnew);
}

function ReListHtml($classid, $enews = 0)
{
	global $empire;
	global $class_r;
	global $public_r;
	global $dbtbpre;
	$classid = (int) $classid;

	if (!$classid) {
		printerror('NotChangeReClassid', 'history.go(-1)');
	}

	$r = $empire->fetch1('select classtempid,islist from ' . $dbtbpre . 'enewsclass where classid=\'' . $classid . '\'');

	if ($class_r[$classid][islast]) {
		listhtml($classid, $ret_r, 0);
	}
	else if ($r[islist] == 1) {
		listhtml($classid, $ret_r, 3);
	}
	else if ($r[islist] == 3) {
		reclassbdinfo($classid);
	}
	else {
		$classtemp = ($r[islist] == 2 ? GetClassText($classid) : GetClassTemp($r['classtempid']));
		newsbq($classid, $classtemp, 0, 0);

		if (str_replace(array(','), array('||' . $classid . '=='), $public_r['add_www_92game_net_mobile_pd'])) {
			$classtemp = GetClassTemp(2);
			newsbq($classid, $classtemp, 10, 0);
		}
	}

	if ($enews == 1) {
		return '';
	}

	insert_dolog('');
	printerror('ReClassidSuccess', 'history.go(-1)');
}

function GetPageTemp($tempid)
{
	global $empire;
	$r = $empire->fetch1('select temptext from ' . GetTemptb('enewspagetemp') . ' where tempid=\'' . $tempid . '\'');
	return $r['temptext'];
}

function RepUserpageVar($pagetext, $title, $pagetitle, $pagekeywords, $pagedescription, $pagestr, $id)
{
	$pagestr = str_replace('[!--pagetext--]', $pagetext, $pagestr);
	$pagestr = str_replace('[!--pagetitle--]', $pagetitle, $pagestr);
	$pagestr = str_replace('[!--pagekeywords--]', $pagekeywords, $pagestr);
	$pagestr = str_replace('[!--pagedescription--]', $pagedescription, $pagestr);
	$pagestr = str_replace('[!--pageid--]', $id, $pagestr);
	$pagestr = str_replace('[!--pagename--]', $title, $pagestr);
	return $pagestr;
}

function ReUserpage($id, $pagetext, $path, $title = '', $pagetitle, $pagekeywords, $pagedescription, $tempid = 0)
{
	global $public_r;

	if (empty($path)) {
		return '';
	}

	DoFileMkDir($path);

	if (empty($pagetitle)) {
		$pagetitle = $title;
	}

	if ($tempid) {
		$pagestr = getpagetemp($tempid);
	}
	else {
		$pagestr = $pagetext;
	}

	$pagestr = infonewsbq('page' . $id, $pagestr);
	$pagestr = repuserpagevar($pagetext, $title, $pagetitle, $pagekeywords, $pagedescription, $pagestr, $id);
	$pagestr = str_replace('[!--news.url--]', $public_r['newsurl'], $pagestr);
	WriteFiletext($path, $pagestr);
}

function ReUserlist($listr, $addpath)
{
	$listr['addpath'] = $addpath;
	DoFileMkDir($listr['addpath'] . $listr['filepath']);
	listhtml($classid, $field, 4, $listr);
}

function GetSearch($mid = 0)
{
	global $empire;
	global $public_r;
	global $fun_r;
	global $dbtbpre;
	$tr = $empire->fetch1('select searchtemp,searchjstemp,searchjstemp1 from ' . GetTemptb('enewspubtemp') . ' limit 1');
	$fcfile = eReturnTrueEcmsPath() . 'e/data/fc/ListEnews.php';
	$fcjsfile = eReturnTrueEcmsPath() . 'e/data/fc/cmsclass.js';
	if (file_exists($fcjsfile) && file_exists($fcfile)) {
		$options = getfcfiletext($fcjsfile);
	}
	else {
		$options = showclass_addclass('', 'n', 0, '|-', 0, 1);
	}

	$functions = 'function search_check(obj){if(obj.keyboard.value.length==0){alert(\'' . $fun_r['EmptyKey'] . '\');return false;}return true;}';
	$searchjstemp = replacestemp($tr[searchjstemp], $options, $url, 0, '', '', '');
	$text2 = $functions . 'document.write("' . $searchjstemp . '");';
	$searchjstemp1 = replacestemp($tr[searchjstemp1], $options, $url, 0, '', '', '');
	$text3 .= $functions . 'document.write("' . $searchjstemp1 . '");';
	$url = '<a href=\'' . ReturnSiteIndexUrl() . '\'>' . $fun_r['index'] . '</a>&nbsp;>&nbsp;<a href=\'../search/\'>' . $fun_r['adsearch'] . '</a>&nbsp;>';
	$dbsearchtemp = replacestemp($tr[searchtemp], $options, $url, 0, $fun_r['adsearch'], $fun_r['adsearch'], $fun_r['adsearch'], 1);
	$text4 = $dbsearchtemp;

	if ($mid) {
		$options1 = showclass_addclass('', 'n', 0, '|-', $mid, 2);
		$addnews_class = 'document.write("' . addslashes($options1) . '");';
		$filename3 = eReturnTrueEcmsPath() . 'd/js/js/addinfo' . $mid . '.js';
		WriteFiletext_n($filename3, $addnews_class);
	}

	$filename = eReturnTrueEcmsPath() . 'd/js/js/search_news1.js';
	WriteFiletext_n($filename, $text2);
	$filename1 = eReturnTrueEcmsPath() . 'd/js/js/search_news2.js';
	WriteFiletext_n($filename1, $text3);
	$filename2 = eReturnTrueEcmsPath() . 'search/index' . $public_r[searchtype];
	WriteFiletext($filename2, $text4);
}

function RepSearchRtemp($temptext, $url)
{
	global $public_r;
	$temptext = str_replace('[!--hotnews--]', '<script src=' . $public_r[newsurl] . 'd/js/js/hotnews.js></script>', $temptext);
	$temptext = str_replace('[!--newnews--]', '<script src=' . $public_r[newsurl] . 'd/js/js/newnews.js></script>', $temptext);
	$temptext = str_replace('[!--goodnews--]', '<script src=' . $public_r[newsurl] . 'd/js/js/goodnews.js></script>', $temptext);
	$temptext = str_replace('[!--hotplnews--]', '<script src=' . $public_r[newsurl] . 'd/js/js/hotplnews.js></script>', $temptext);
	$temptext = str_replace('[!--listpage--]', '<?=$listpage?>', $temptext);
	$temptext = str_replace('[!--keyboard--]', '<?=$keyboard?>', $temptext);
	$temptext = str_replace('[!--num--]', '<?=$num?>', $temptext);
	$temptext = str_replace('[!--url--]', $url, $temptext);
	$temptext = str_replace('[!--newsurl--]', $public_r[newsurl], $temptext);
	return $temptext;
}

function GetPlTempPage($pltempid = 0)
{
	global $empire;
	global $public_r;
	global $fun_r;
	global $dbtbpre;
	$pl_t_filename = eReturnTrueEcmsPath() . 'e/data/template/pltemp.txt';
	$yplfiletemp = ReadFiletext($pl_t_filename);
	$yplfiletemp = str_replace('\\', '\\\\', $yplfiletemp);
	$url = '<a href=\'' . ReturnSiteIndexUrl() . '\'>' . $fun_r['index'] . '</a>&nbsp;>&nbsp;[!--title--]&nbsp;>&nbsp;' . $fun_r['newspl'] . '&nbsp;>';
	$pagetitle = '<?=$pagetitle?> ' . $fun_r['newspl'];
	$pagekey = $pagetitle;
	$pagedes = $pagetitle;
	$pr = $empire->fetch1('select plf from ' . $dbtbpre . 'enewspl_set limit 1');
	$tobrf = ',';
	$plfsql = $empire->query('select f from ' . $dbtbpre . 'enewsplf where ftype=\'VARCHAR\' or ftype=\'TEXT\' or ftype=\'MEDIUMTEXT\' or ftype=\'LONGTEXT\'');

	while ($plfr = $empire->fetch($plfsql)) {
		$tobrf .= $plfr[f] . ',';
	}

	$pr['pltobrf'] = $tobrf;
	$where = ($pltempid ? ' where tempid=\'' . $pltempid . '\'' : '');
	$ptsql = $empire->query('select tempid,temptext from ' . GetTemptb('enewspltemp') . $where);

	while ($ptr = $empire->fetch($ptsql)) {
		$plfiletemp = $yplfiletemp;
		$pl_filename = eReturnTrueEcmsPath() . 'e/data/filecache/template/pl' . $ptr[tempid] . '.php';
		$pltemp = $ptr['temptext'];
		$pltemp = ReplaceSvars($pltemp, $url, 0, $pagetitle, $pagekey, $pagedes, $add, 1);
		$pltemp = repsearchrtemp($pltemp, $url);
		$pltemp = str_replace('[!--title--]', '<?=$title?>', $pltemp);
		$pltemp = str_replace('[!--titleurl--]', '<?=$titleurl?>', $pltemp);
		$pltemp = str_replace('[!--id--]', '<?=$id?>', $pltemp);
		$pltemp = str_replace('[!--classid--]', '<?=$classid?>', $pltemp);
		$pltemp = str_replace('[!--plnum--]', '<?=$num?>', $pltemp);
		$pltemp = str_replace('[!--pinfopfen--]', '<?=$pinfopfen?>', $pltemp);
		$pltemp = str_replace('[!--infopfennum--]', '<?=$infopfennum?>', $pltemp);
		$pltemp = str_replace('[!--key.url--]', $public_r[newsurl] . 'e/ShowKey/?v=pl', $pltemp);
		$pltemp = str_replace('[!--lusername--]', '<?=$lusername?>', $pltemp);
		$pltemp = str_replace('[!--lpassword--]', '<?=$lpassword?>', $pltemp);
		$listtemp_r = explode('[!--empirenews.listtemp--]', $pltemp);
		$plfiletemp = str_replace('<!--empire.listtemp.top-->', $listtemp_r[0], $plfiletemp);
		$plfiletemp = str_replace('<!--empire.listtemp.footer-->', $listtemp_r[2], $plfiletemp);
		$listtemp_center = str_replace('[!--plid--]', '<?=$r[plid]?>', $listtemp_r[1]);
		$listtemp_center = str_replace('[!--pltext--]', '<?=$saytext?>', $listtemp_center);
		$listtemp_center = str_replace('[!--pltime--]', '<?=$saytime?>', $listtemp_center);
		$listtemp_center = str_replace('[!--plip--]', '<?=$sayip?>', $listtemp_center);
		$listtemp_center = str_replace('[!--username--]', '<?=$plusername?>', $listtemp_center);
		$listtemp_center = str_replace('[!--userid--]', '<?=$r[userid]?>', $listtemp_center);
		$listtemp_center = str_replace('[!--includelink--]', '<?=$includelink?>', $listtemp_center);
		$listtemp_center = str_replace('[!--zcnum--]', '<?=$r[zcnum]?>', $listtemp_center);
		$listtemp_center = str_replace('[!--fdnum--]', '<?=$r[fdnum]?>', $listtemp_center);
		$listtemp_center = ReplacePlListVars($listtemp_center, $r, $pr, 0);
		$plfiletemp = str_replace('<!--empire.listtemp.center-->', $listtemp_center, $plfiletemp);
		WriteFiletext($pl_filename, $plfiletemp);
	}
}

function ReplacePlListVars($temp, $r, $pr, $ecms = 0)
{
	$fr = explode(',', $pr['plf']);
	$count = count($fr) - 1;
	$i = 1;

	for (; $i < $count; $i++) {
		$f = $fr[$i];

		if ($ecms == 1) {
			if (strstr($pr['pltobrf'], ',' . $f . ',')) {
				$temp = str_replace('[!--' . $f . '--]', '<?=addslashes(stripSlashes(str_replace("\\r\\n","",$r[' . $f . '])))?>', $temp);
			}
			else {
				$temp = str_replace('[!--' . $f . '--]', '<?=$r[' . $f . ']?>', $temp);
			}
		}
		else if (strstr($pr['pltobrf'], ',' . $f . ',')) {
			$temp = str_replace('[!--' . $f . '--]', '<?=stripSlashes($r[' . $f . '])?>', $temp);
		}
		else {
			$temp = str_replace('[!--' . $f . '--]', '<?=$r[' . $f . ']?>', $temp);
		}
	}

	return $temp;
}

function GetPlJsPage()
{
	global $empire;
	global $public_r;
	global $fun_r;
	global $dbtbpre;
	$pl_t_filename = eReturnTrueEcmsPath() . 'e/data/template/pljstemp.txt';
	$pl_filename = eReturnTrueEcmsPath() . 'e/pl/more/index.php';
	$pltemp = ReadFiletext($pl_t_filename);
	$pr = $empire->fetch1('select plf from ' . $dbtbpre . 'enewspl_set limit 1');
	$tobrf = ',';
	$plfsql = $empire->query('select f from ' . $dbtbpre . 'enewsplf where ftype=\'VARCHAR\' or ftype=\'TEXT\' or ftype=\'MEDIUMTEXT\' or ftype=\'LONGTEXT\'');

	while ($plfr = $empire->fetch($plfsql)) {
		$tobrf .= $plfr[f] . ',';
	}

	$pr['pltobrf'] = $tobrf;
	$pl_r = $empire->fetch1('select pljstemp from ' . GetTemptb('enewspubtemp') . ' limit 1');
	$pljstemp = str_replace("\r\n", '', $pl_r['pljstemp']);
	$pljstemp = addslashes(stripSlashes($pljstemp));
	$pljstemp = str_replace('[!--id--]', '<?=$id?>', $pljstemp);
	$pljstemp = str_replace('[!--classid--]', '<?=$classid?>', $pljstemp);
	$pljstemp = str_replace('[!--news.url--]', $public_r[newsurl], $pljstemp);
	$listtemp_r = explode('[!--empirenews.listtemp--]', $pljstemp);
	$pltemp = str_replace('<!--empire.listtemp.top-->', $listtemp_r[0], $pltemp);
	$pltemp = str_replace('<!--empire.listtemp.footer-->', $listtemp_r[2], $pltemp);
	$listtemp_center = str_replace('[!--plid--]', '<?=$r[plid]?>', $listtemp_r[1]);
	$listtemp_center = str_replace('[!--pltext--]', '<?=$saytext?>', $listtemp_center);
	$listtemp_center = str_replace('[!--pltime--]', '<?=$saytime?>', $listtemp_center);
	$listtemp_center = str_replace('[!--plip--]', '<?=$sayip?>', $listtemp_center);
	$listtemp_center = str_replace('[!--username--]', '<?=$plusername?>', $listtemp_center);
	$listtemp_center = str_replace('[!--userid--]', '<?=$r[userid]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--zcnum--]', '<?=$r[zcnum]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--fdnum--]', '<?=$r[fdnum]?>', $listtemp_center);
	$listtemp_center = replacepllistvars($listtemp_center, $r, $pr, 1);
	$pltemp = str_replace('<!--empire.listtemp.center-->', $listtemp_center, $pltemp);
	WriteFiletext_n($pl_filename, $pltemp);
}

function ReGbooktemp()
{
	global $empire;
	global $public_r;
	global $fun_r;
	global $dbtbpre;
	$tfile = eReturnTrueEcmsPath() . 'e/data/template/gbooktemp.txt';
	$file = eReturnTrueEcmsPath() . 'e/tool/gbook/index.php';
	$gbtemp = ReadFiletext($tfile);
	$pr = $empire->fetch1('select gbooktemp from ' . GetTemptb('enewspubtemp') . ' limit 1');
	$url = '<?=$url?>';
	$pagetitle = '<?=$bname?>';
	$pr['gbooktemp'] = ReplaceSvars($pr['gbooktemp'], $url, 0, $pagetitle, $pagetitle, $pagetitle, $add, 1);
	$pr['gbooktemp'] = repsearchrtemp($pr['gbooktemp'], $url);
	$pr['gbooktemp'] = str_replace('[!--bname--]', '<?=$bname?>', $pr['gbooktemp']);
	$pr['gbooktemp'] = str_replace('[!--bid--]', '<?=$bid?>', $pr['gbooktemp']);
	$listtemp_r = explode('[!--empirenews.listtemp--]', $pr['gbooktemp']);
	$gbtemp = str_replace('<!--empire.listtemp.top-->', $listtemp_r[0], $gbtemp);
	$gbtemp = str_replace('<!--empire.listtemp.footer-->', $listtemp_r[2], $gbtemp);
	$restart = '' . "\r\n" . '<?' . "\r\n" . 'if($r[retext])' . "\r\n" . '{' . "\r\n" . '?>' . "\r\n" . '';
	$endstart = '' . "\r\n" . '<?' . "\r\n" . '}' . "\r\n" . '?>';
	$listtemp_center = str_replace('[!--start.regbook--]', $restart, $listtemp_r[1]);
	$listtemp_center = str_replace('[!--end.regbook--]', $endstart, $listtemp_center);
	$listtemp_center = str_replace('[!--lyid--]', '<?=$r[lyid]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--name--]', '<?=$r[name]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--email--]', '<?=$r[email]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--mycall--]', '<?=$r[mycall]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--lytime--]', '<?=$r[lytime]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--lytext--]', '<?=$r[lytext]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--retext--]', '<?=$r[retext]?>', $listtemp_center);
	$gbtemp = str_replace('<!--empire.listtemp.center-->', $listtemp_center, $gbtemp);
	WriteFiletext($file, $gbtemp);
}

function ReCptemp()
{
	global $empire;
	global $public_r;
	global $dbtbpre;
	global $fun_r;
	$pr = $empire->fetch1('select cptemp from ' . GetTemptb('enewspubtemp') . ' limit 1');
	$url = '<?=$url?>';
	$pagetitle = '<?=defined(\'empirecms\')?$public_diyr[pagetitle]:\'' . $fun_r['membercp'] . '\'?>';
	$temptext = ReplaceSvars($pr['cptemp'], $url, 0, $pagetitle, $pagetitle, $pagetitle, $add, 1);
	$r = explode('[!--empirenews.template--]', $temptext);
	$file1 = eReturnTrueEcmsPath() . 'e/data/template/cp_1.php';
	WriteFiletext($file1, addcheckviewtempcode() . $r[0]);
	$file2 = eReturnTrueEcmsPath() . 'e/data/template/cp_2.php';
	WriteFiletext($file2, addcheckviewtempcode() . $r[1]);
}

function ReLoginIframe()
{
	global $empire;
	global $public_r;
	global $dbtbpre;
	$tfile = eReturnTrueEcmsPath() . 'e/data/template/loginiframetemp.txt';
	$loginiframetemp = ReadFiletext($tfile);
	$pr = $empire->fetch1('select loginiframe,loginjstemp from ' . GetTemptb('enewspubtemp') . ' limit 1');
	$temptext = str_replace('[!--news.url--]', $public_r['newsurl'], $pr['loginiframe']);
	$temptext = str_replace('[!--userid--]', '<?=$myuserid?>', $temptext);
	$temptext = str_replace('[!--username--]', '<?=$myusername?>', $temptext);
	$temptext = str_replace('[!--groupname--]', '<?=$groupname?>', $temptext);
	$temptext = str_replace('[!--money--]', '<?=$money?>', $temptext);
	$temptext = str_replace('[!--userdate--]', '<?=$userdate?>', $temptext);
	$temptext = str_replace('[!--havemsg--]', '<?=$havemsg?>', $temptext);
	$temptext = str_replace('[!--userfen--]', '<?=$userfen?>', $temptext);
	$r = explode('[!--empirenews.template--]', $temptext);
	$text = str_replace('<!--login-->', $r[0], $loginiframetemp);
	$text = str_replace('<!--loginin-->', $r[1], $text);
	$file = eReturnTrueEcmsPath() . 'e/member/iframe/index.php';
	WriteFiletext($file, $text);
	$temptext = str_replace('[!--news.url--]', $public_r['newsurl'], $pr['loginjstemp']);
	$temptext = str_replace('[!--userid--]', '<?=$myuserid?>', $temptext);
	$temptext = str_replace('[!--username--]', '<?=$myusername?>', $temptext);
	$temptext = str_replace('[!--groupname--]', '<?=$groupname?>', $temptext);
	$temptext = str_replace('[!--money--]', '<?=$money?>', $temptext);
	$temptext = str_replace('[!--userdate--]', '<?=$userdate?>', $temptext);
	$temptext = str_replace('[!--havemsg--]', '<?=$havemsg?>', $temptext);
	$temptext = str_replace('[!--userfen--]', '<?=$userfen?>', $temptext);
	$r = explode('[!--empirenews.template--]', $temptext);
	$login = 'document.write("' . addslashes(stripSlashes(str_replace("\r\n", '', $r[0]))) . '");';
	$loginin = 'document.write("' . addslashes(stripSlashes(str_replace("\r\n", '', $r[1]))) . '");';
	$text = str_replace('<!--login-->', $login, $loginiframetemp);
	$text = str_replace('<!--loginin-->', $loginin, $text);
	$file = eReturnTrueEcmsPath() . 'e/member/login/loginjs.php';
	WriteFiletext_n($file, $text);
}

function ReturnVoteTemp($tempid, $enews = 0)
{
	global $empire;
	$r = $empire->fetch1('select temptext from ' . GetTemptb('enewsvotetemp') . ' where tempid=\'' . $tempid . '\'');

	if ($enews) {
		$r[temptext] = str_replace("\r\n", '', $r[temptext]);
	}

	return $r[temptext];
}

function RepVoteTempAllvar($temptext, $r)
{
	global $public_r;
	$action = $public_r['newsurl'] . 'e/enews/index.php';
	$temptext = str_replace('[!--vote.action--]', $action, $temptext);
	$temptext = str_replace('[!--title--]', $r[title], $temptext);
	$viewurl = $public_r[newsurl] . 'e/tool/vote/?voteid=' . $r[voteid];
	$temptext = str_replace('[!--vote.view--]', $viewurl, $temptext);
	$temptext = str_replace('[!--width--]', $r[width], $temptext);
	$temptext = str_replace('[!--height--]', $r[height], $temptext);
	$temptext = str_replace('[!--voteid--]', $r[voteid], $temptext);
	$temptext = str_replace('[!--id--]', $r[id], $temptext);
	$temptext = str_replace('[!--classid--]', $r[classid], $temptext);
	$temptext = str_replace('[!--news.url--]', $public_r[newsurl], $temptext);
	return $temptext;
}

function RepVoteTempListvar($temptext, $votebox, $votename)
{
	$temptext = str_replace('[!--vote.box--]', $votebox, $temptext);
	$temptext = str_replace('[!--vote.name--]', $votename, $temptext);
	return $temptext;
}

function GetPrintPage($printtempid = 0)
{
	global $empire;
	global $dbtbpre;
	global $fun_r;
	global $public_r;
	$file = eReturnTrueEcmsPath() . 'e/data/template/printtemp.txt';
	$string = ReadFiletext($file);
	$url = '<?=$url?>';
	$pagetitle = '<?=ehtmlspecialchars($r[title])?> ' . $fun_r['PrintPage'];
	$where = ($printtempid ? ' where tempid=\'' . $printtempid . '\'' : '');
	$ptsql = $empire->query('select tempid,temptext,showdate,modid from ' . GetTemptb('enewsprinttemp') . $where);

	while ($ptr = $empire->fetch($ptsql)) {
		$ptr[temptext] = ReplaceSvars($ptr[temptext], $url, 0, $pagetitle, $pagetitle, $pagetitle, $add, 1);
		$printtemp = RepPrintTempV($ptr);
		$printtemp = str_replace('<!--empire.print-->', $printtemp, $string);
		$truefile = eReturnTrueEcmsPath() . 'e/data/filecache/template/print' . $ptr[tempid] . '.php';
		WriteFiletext($truefile, $printtemp);
	}
}

function RepPrintTempV($tr)
{
	global $empire;
	global $dbtbpre;
	global $fun_r;
	global $public_r;
	global $emod_r;
	$temptext = $tr['temptext'];
	$mid = $tr['modid'];
	$tempf = $emod_r[$mid]['tempf'];
	$fr = explode(',', $tempf);
	$fcount = count($fr) - 1;
	$i = 1;

	for (; $i < $fcount; $i++) {
		$f = $fr[$i];
		$value = 'stripSlashes($r[' . $f . '])';

		if ($f == 'newstime') {
			$value = 'date(\'' . $tr[showdate] . '\',$r[' . $f . '])';
		}
		else if ($f == 'title') {
		}
		else if (!strstr($emod_r[$mid]['editorf'], ',' . $f . ',')) {
			if (strstr($emod_r[$mid]['tobrf'], ',' . $f . ',')) {
				$value = 'nl2br(' . $value . ')';
			}

			if (!strstr($emod_r[$mid]['dohtmlf'], ',' . $f . ',')) {
				$value = 'RepFieldtextNbsp(ehtmlspecialchars(' . $value . '))';
			}
		}

		$temptext = str_replace('[!--' . $f . '--]', '<?=' . $value . '?>', $temptext);
	}

	$temptext = str_replace('[!--id--]', '<?=$r[id]?>', $temptext);
	$temptext = str_replace('[!--classid--]', '<?=$r[classid]?>', $temptext);
	$temptext = str_replace('[!--keyboard--]', '<?=$r[keyboard]?>', $temptext);
	$temptext = str_replace('[!--class.name--]', '<?=$class_r[$classid][classname]?>', $temptext);
	$temptext = str_replace('[!--bclass.id--]', '<?=$bclassid?>', $temptext);
	$temptext = str_replace('[!--bclass.name--]', '<?=$class_r[$bclassid][classname]?>', $temptext);
	$temptext = str_replace('[!--ttid--]', '<?=$r[ttid]?>', $temptext);
	$temptext = str_replace('[!--tt.name--]', '<?=$class_tr[$r[ttid]][tname]?>', $temptext);
	$temptext = str_replace('[!--tt.url--]', '<?=sys_ReturnBqInfoTypeUrl($r[ttid])?>', $temptext);
	$temptext = str_replace('[!--userfen--]', '<?=$r[userfen]?>', $temptext);
	$temptext = str_replace('[!--onclick--]', '<?=$r[onclick]?>', $temptext);
	$temptext = str_replace('[!--totaldown--]', '<?=$r[totaldown]?>', $temptext);
	$temptext = str_replace('[!--plnum--]', '<?=$r[plnum]?>', $temptext);
	$temptext = str_replace('[!--userid--]', '<?=$r[userid]?>', $temptext);
	$temptext = str_replace('[!--username--]', '<?=$r[username]?>', $temptext);
	$temptext = str_replace('[!--titlelink--]', '<?=$titleurl?>', $temptext);
	$temptext = str_replace('[!--titleurl--]', '<?=$titleurl?>', $temptext);
	$temptext = str_replace('[!--url--]', '<?=$url?>', $temptext);
	return $temptext;
}

function GetDownloadPage()
{
	global $empire;
	global $public_r;
	global $dbtbpre;
	global $fun_r;
	$pr = $empire->fetch1('select downpagetemp from ' . GetTemptb('enewspubtemp') . ' limit 1');
	$temptext = $pr['downpagetemp'];
	$url = '<a href=\'' . ReturnSiteIndexUrl() . '\'>' . $fun_r['index'] . '</a>&nbsp;>&nbsp;<a href=\'<?=$titleurl?>\'><?=$r[title]?></a>&nbsp;>&nbsp;<?=$thisdownname?>';
	$pagetitle = '<?=ehtmlspecialchars($r[title])?> - <?=ehtmlspecialchars($thisdownname)?>';
	$temptext = ReplaceSvars($temptext, $url, '<?=$r[classid]?>', $pagetitle, $pagetitle, $pagetitle, $add, 1);
	$temptext = str_replace('[!--classid--]', '<?=$r[classid]?>', $temptext);
	$temptext = str_replace('[!--class.name--]', '<?=$classname?>', $temptext);
	$temptext = str_replace('[!--bclass.id--]', '<?=$bclassid?>', $temptext);
	$temptext = str_replace('[!--bclass.name--]', '<?=$bclassname?>', $temptext);
	$temptext = str_replace('[!--down.url--]', '<?=$url?>', $temptext);
	$temptext = str_replace('[!--true.down.url--]', '<?=$trueurl?>', $temptext);
	$temptext = str_replace('[!--down.name--]', '<?=$thisdownname?>', $temptext);
	$temptext = str_replace('[!--fen--]', '<?=$fen?>', $temptext);
	$temptext = str_replace('[!--group--]', '<?=$downuser?>', $temptext);
	$temptext = str_replace('[!--id--]', '<?=$r[id]?>', $temptext);
	$temptext = str_replace('[!--titleurl--]', '<?=$titleurl?>', $temptext);
	$temptext = str_replace('[!--title--]', '<?=$r[title]?>', $temptext);
	$temptext = str_replace('[!--newstime--]', '<?=$newstime?>', $temptext);
	$temptext = str_replace('[!--titlepic--]', '<?=$titlepic?>', $temptext);
	$temptext = str_replace('[!--keyboard--]', '<?=$r[keyboard]?>', $temptext);
	$temptext = str_replace('[!--userid--]', '<?=$r[userid]?>', $temptext);
	$temptext = str_replace('[!--username--]', '<?=$r[username]?>', $temptext);
	$temptext = str_replace('[!--pathid--]', '<?=$pathid?>', $temptext);
	$temptext = str_replace('[!--totaldown--]', '<?=$r[totaldown]?>', $temptext);
	$temptext = str_replace('[!--onclick--]', '<?=$r[onclick]?>', $temptext);
	$file = eReturnTrueEcmsPath() . 'e/data/template/downpagetemp.php';
	WriteFiletext($file, addcheckviewtempcode() . $temptext);
}

function ReSchAlltemp()
{
	global $empire;
	global $public_r;
	global $fun_r;
	global $dbtbpre;
	$tfile = eReturnTrueEcmsPath() . 'e/data/template/schalltemp.txt';
	$file = eReturnTrueEcmsPath() . 'e/sch/index.php';
	$temp = ReadFiletext($tfile);
	$pr = $empire->fetch1('select schalltemp,schallsubnum,schalldate from ' . GetTemptb('enewspubtemp') . ' limit 1');
	$url = '<?=$url?>';
	$pagetitle = $fun_r['SearchAllNav'];
	$pr['schalltemp'] = ReplaceSvars($pr['schalltemp'], $url, 0, $pagetitle, $pagetitle, $pagetitle, $add, 1);
	$temp = str_replace('<!--empire.listtemp.subnum-->', $pr['schallsubnum'], $temp);
	$temp = str_replace('<!--empire.listtemp.formatdate-->', $pr['schalldate'], $temp);
	$pr['schalltemp'] = str_replace('[!--keyboard--]', '<?=$keyboard?>', $pr['schalltemp']);
	$pr['schalltemp'] = str_replace('[!--num--]', '<?=$num?>', $pr['schalltemp']);
	$pr['schalltemp'] = str_replace('[!--listpage--]', '<?=$listpage?>', $pr['schalltemp']);
	$listtemp_r = explode('[!--empirenews.listtemp--]', $pr['schalltemp']);
	$temp = str_replace('<!--empire.listtemp.top-->', $listtemp_r[0], $temp);
	$temp = str_replace('<!--empire.listtemp.footer-->', $listtemp_r[2], $temp);
	$listtemp_center = str_replace('[!--no.num--]', '<?=$no?>', $listtemp_r[1]);
	$listtemp_center = str_replace('[!--titleurl--]', '<?=$titleurl?>', $listtemp_center);
	$listtemp_center = str_replace('[!--id--]', '<?=$r[id]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--classid--]', '<?=$r[classid]?>', $listtemp_center);
	$listtemp_center = str_replace('[!--titlepic--]', '<?=$titlepic?>', $listtemp_center);
	$listtemp_center = str_replace('[!--newstime--]', '<?=$newstime?>', $listtemp_center);
	$listtemp_center = str_replace('[!--title--]', '<?=$title?>', $listtemp_center);
	$listtemp_center = str_replace('[!--smalltext--]', '<?=$smalltext?>', $listtemp_center);
	$temp = str_replace('<!--empire.listtemp.center-->', $listtemp_center, $temp);
	WriteFiletext($file, $temp);
}

function ReturnLeftLevel($groupid)
{
	global $empire;
	global $dbtbpre;

	if (empty($groupid)) {
		return '';
	}

	$groupid = (int) $groupid;
	$r = $empire->fetch1('select * from ' . $dbtbpre . 'enewsgroup where groupid=\'' . $groupid . '\'');
	return $r;
}

function DoEmpireCMSAdminPassword($password, $salt, $salt2)
{
	$pw = md5($salt2 . 'E!m^p-i(r#e.C:M?S' . md5(md5($password) . $salt) . 'd)i.g^o-d' . $salt);
	return $pw;
}

function CheckLevel($userid, $username, $classid, $enews)
{
	global $empire;
	global $dbtbpre;
	$userid = (int) $userid;
	$r = $empire->fetch1('select groupid,adminclass from ' . $dbtbpre . 'enewsuser where userid=\'' . $userid . '\' limit 1');

	if ($enews == 'news') {
		$gr = $empire->fetch1('select doall,doselfinfo,doaddinfo,doeditinfo,dodelinfo,docheckinfo,dogoodinfo,dodocinfo,domoveinfo,domustcheck,docheckedit from ' . $dbtbpre . 'enewsgroup where groupid=\'' . $r['groupid'] . '\'');

		if (empty($gr[doall])) {
			$e_r = explode('|' . $classid . '|', $r[adminclass]);

			if (count($e_r) != 2) {
				printerror('NotNewsLevel', 'history.go(-1)');
			}
		}

		$gr['add_adminclass'] = $r['adminclass'];
		return $gr;
	}
	else {
		$gr = $empire->fetch1('select * from ' . $dbtbpre . 'enewsgroup where groupid=\'' . $r['groupid'] . '\'');
		$enews = 'do' . $enews;

		if (empty($gr[$enews])) {
			printerror('NotLevel', 'history.go(-1)');
		}

		$gr['add_adminclass'] = $r['adminclass'];
		return $gr;
	}
}

function CheckDoLevel($lur, $groupid, $userclass, $username, $ecms = 0)
{
	$ret = 0;

	if (strstr($groupid, ',' . $lur[groupid] . ',')) {
		$ret = 1;
	}
	else if (strstr($userclass, ',' . $lur[classid] . ',')) {
		$ret = 1;
	}
	else if (stristr($username, ',' . $lur[username] . ',')) {
		$ret = 1;
	}

	if (($ecms == 0) && ($ret == 0)) {
		printerror('NotLevel', 'history.go(-1)');
	}

	return $ret;
}

function CheckAndUsernamesLevel($level, $id, $userid, $username, $groupid)
{
	global $empire;
	global $dbtbpre;
	$id = (int) $id;

	if (!$id) {
		printerror('ErrorUrl', 'history.go(-1)');
	}

	if ($level == 'dozt') {
		$getquery = 'select ztid,usernames from ' . $dbtbpre . 'enewszt where ztid=\'' . $id . '\'';
		$id_field = 'ztid';
		$users_field = 'usernames';
	}
	else {
		printerror('ErrorUrl', 'history.go(-1)');
	}

	$getr = $empire->fetch1($getquery);

	if (!$getr[$id_field]) {
		printerror('ErrorUrl', 'history.go(-1)');
	}

	$gr = $empire->fetch1('select groupid,' . $level . ' from ' . $dbtbpre . 'enewsgroup where groupid=\'' . $groupid . '\'');

	if (!$gr['groupid']) {
		printerror('NotLevel', 'history.go(-1)');
	}

	if ($gr[$level]) {
		return 2;
	}

	if (!stristr(',' . $getr[$users_field] . ',', ',' . $username . ',')) {
		printerror('NotLevel', 'history.go(-1)');
	}

	return 1;
}

function is_login($uid = 0, $uname = '', $urnd = '')
{
	global $empire;
	global $public_r;
	global $dbtbpre;
	$userid = ($uid ? $uid : getcvar('loginuserid', 1));
	$username = ($uname ? $uname : getcvar('loginusername', 1));
	$rnd = ($urnd ? $urnd : getcvar('loginrnd', 1));
	$userid = (int) $userid;
	$username = RepPostVar($username);
	$rnd = RepPostVar($rnd);
	if (!$userid || !$username || !$rnd) {
		printerror('NotLogin', 'index.php');
	}

	$groupid = (int) getcvar('loginlevel', 1);
	$adminstyle = (int) getcvar('loginadminstyleid', 1);

	if (!strstr($public_r['adminstyle'], ',' . $adminstyle . ',')) {
		$adminstyle = ($public_r['defadminstyle'] ? $public_r['defadminstyle'] : 1);
	}

	$truelogintime = (int) getcvar('truelogintime', 1);
	$cdbdata = 0;
	$cdbdata = (getcvar('ecmsdodbdata', 1) ? 1 : 0);
	DoChECookieRnd($userid, $username, $rnd, '', $cdbdata, $groupid, $adminstyle, $truelogintime);
	$adminr = $empire->fetch1('select userid,groupid,classid,userprikey,uprnd from ' . $dbtbpre . 'enewsuser where userid=\'' . $userid . '\' and username=\'' . $username . '\' and rnd=\'' . $rnd . '\' and checked=0 limit 1');

	if (!$adminr['userid']) {
		printerror('SingleUser', 'index.php');
	}

	DoECheckAndAuthRnd($userid, $username, $rnd, $adminr['userprikey'], $cdbdata, $groupid, $adminstyle, $truelogintime);
	$logintime = getcvar('logintime', 1);

	if ($logintime) {
		if (($public_r['exittime'] * 60) < (time() - $logintime)) {
			esetcookie('loginrnd', '', 0, 1);
			printerror('LoginTime', 'index.php');
		}

		esetcookie('logintime', time(), 0, 1);
	}

	if (getcvar('eloginlic', 1) != 'empirecmslic') {
		printerror('NotLogin', 'index.php');
	}

	$ur[userid] = $userid;
	$ur[username] = $username;
	$ur[rnd] = $rnd;
	$ur[groupid] = $adminr[groupid];
	$ur[adminstyleid] = (int) $adminstyle;
	$ur[classid] = $adminr[classid];
	return $ur;
}

function is_login_ebak($userid, $username, $rnd)
{
	global $empire;
	global $public_r;
	$userid = (int) $userid;
	$username = RepPostVar($username);
	$dodbdata = getcvar('ecmsdodbdata', 1);
	if (!$userid || !$username) {
		printerror('NotLogin', 'index.php');
	}

	if ($dodbdata != 'empirecms') {
		printerror('NotLogin', 'index.php');
	}

	$rnd = RepPostVar($rnd);
	$cdbdata = ($dodbdata ? 1 : 0);
	$groupid = (int) getcvar('loginlevel', 1);
	$adminstyle = (int) getcvar('loginadminstyleid', 1);
	$truelogintime = (int) getcvar('truelogintime', 1);
	DoChECookieRnd($userid, $username, $rnd, '', $cdbdata, $groupid, $adminstyle, $truelogintime);
	$logintime = getcvar('logintime', 1);

	if ($logintime) {
		if (($public_r['exittime'] * 60) < (time() - $logintime)) {
			esetcookie('loginrnd', '', 0, 1);
			printerror('LoginTime', 'index.php');
		}

		esetcookie('logintime', time(), 0, 1);
	}

	$ur[userid] = $userid;
	$ur[username] = $username;
	$ur[rnd] = $rnd;
	$ur[groupid] = $groupid;
	$ur[adminstyleid] = $adminstyle;
	$ur[classid] = 0;
	return $ur;
}

function is_login_other($userid, $username, $rnd)
{
	global $empire;
	global $public_r;
	global $dbtbpre;
	$userid = (int) $userid;
	$username = RepPostVar($username);
	$rnd = RepPostVar($rnd);
	if (!$userid || !$username || !$rnd) {
		printerror('NotLogin', 'index.php');
	}

	$adminstyle = 1;
	$adminr = $empire->fetch1('select userid,groupid,classid,userprikey from ' . $dbtbpre . 'enewsuser where userid=\'' . $userid . '\' and username=\'' . $username . '\' and rnd=\'' . $rnd . '\' and checked=0 limit 1');

	if (!$adminr['userid']) {
		printerror('NotLogin', 'index.php');
	}

	$ur[userid] = $userid;
	$ur[username] = $username;
	$ur[rnd] = $rnd;
	$ur[groupid] = $adminr[groupid];
	$ur[adminstyleid] = (int) $adminstyle;
	$ur[classid] = $adminr[classid];
	return $ur;
}

function DoECreateOtherRnd($userid, $username, $rnd, $ckoi = 0)
{
	global $ecms_config;
	$ip = ($ecms_config['esafe']['ckhloginip'] == 0 ? '127.0.0.1' : egetip());
	$otherinfo = ($ckoi == 1 ? DoECkOtherInfo() : 'empire.cms');
	$r['otherrndtime'] = time();
	$r['otherrndtwo'] = make_password(12);
	$r['otherrndpass'] = md5(md5($rnd . '-empirecms.2002!check.other-' . $ecms_config['cks']['ckrndtwo']) . '-' . $ip . 'empire.cms' . '-' . $otherinfo . '-' . $userid . '-' . $r['otherrndtime'] . '-' . $username . 'db.check.rnd' . '-' . $rnd . '-phome' . $r['otherrndtwo']);
	return $r;
}

function DoECheckOtherRnd($userid, $username, $rnd, $loginecmsotherpass, $loginecmsothertime, $loginecmsotherrndtwo, $ckoi = 0, $outtime = 1800)
{
	global $ecms_config;
	if (!$loginecmsotherpass || !$loginecmsothertime) {
		printerror('NotLogin', 'index.php');
	}

	$loginecmsothertime = (int) $loginecmsothertime;
	$todaytime = time();
	if ((($loginecmsothertime + $outtime) < $todaytime) || ($todaytime < $loginecmsothertime)) {
		printerror('NotLogin', 'index.php');
	}

	$ip = ($ecms_config['esafe']['ckhloginip'] == 0 ? '127.0.0.1' : egetip());
	$otherinfo = ($ckoi == 1 ? DoECkOtherInfo() : 'empire.cms');
	$ecmsckpass = md5(md5($rnd . '-empirecms.2002!check.other-' . $ecms_config['cks']['ckrndtwo']) . '-' . $ip . 'empire.cms' . '-' . $otherinfo . '-' . $userid . '-' . $loginecmsothertime . '-' . $username . 'db.check.rnd' . '-' . $rnd . '-phome' . $loginecmsotherrndtwo);

	if ($ecmsckpass != $loginecmsotherpass) {
		printerror('NotLogin', 'index.php');
	}
}

function DoESessionRnd()
{
	global $ecms_config;

	if (empty($ecms_config['esafe']['ckhsession'])) {
		return '';
	}

	$sessval = make_password(27);
	$_SESSION['ecmsckhspass'] = $sessval;
	return $sessval;
}

function ReESessionRnd()
{
	global $ecms_config;

	if (empty($ecms_config['esafe']['ckhsession'])) {
		return '';
	}

	return $_SESSION['ecmsckhspass'];
}

function DelESessionRnd()
{
	global $ecms_config;

	if (empty($ecms_config['esafe']['ckhsession'])) {
		return '';
	}

	unset($_SESSION['ecmsckhspass']);
	session_destroy();
}

function DoECkOtherInfo()
{
	$otherinfo = $_SERVER['HTTP_USER_AGENT'];
	return $otherinfo;
}

function DoECookieRnd($userid, $username, $rnd, $userkey, $dbdata, $groupid, $adminstyle, $truelogintime)
{
	global $ecms_config;
	$ip = ($ecms_config['esafe']['ckhloginip'] == 0 ? '127.0.0.1' : egetip());
	$otherinfo = doeckotherinfo();
	$sessval = doesessionrnd();
	$ecmsckpass = md5(md5($rnd . $ecms_config['esafe']['ecookiernd']) . '-' . $ip . '-' . $otherinfo . '-' . $userid . '-' . $username . '-' . $dbdata . $rnd . $groupid . '-' . $adminstyle . $sessval);
	esetcookie('loginecmsckpass', $ecmsckpass, 0, 1);
	DoECreatFileRnd($userid, $username, $rnd, $dbdata, $groupid, $adminstyle, $truelogintime, $ip, $sessval);
	DoECreatAndAuthRnd($userid, $username, $rnd, $userkey, $dbdata, $groupid, $adminstyle, $truelogintime, $ip, $sessval);
}

function DoChECookieRnd($userid, $username, $rnd, $userkey, $dbdata, $groupid, $adminstyle, $truelogintime)
{
	global $ecms_config;
	$ip = ($ecms_config['esafe']['ckhloginip'] == 0 ? '127.0.0.1' : egetip());
	$otherinfo = doeckotherinfo();
	$sessval = reesessionrnd();
	$ecmsckpass = md5(md5($rnd . $ecms_config['esafe']['ecookiernd']) . '-' . $ip . '-' . $otherinfo . '-' . $userid . '-' . $username . '-' . $dbdata . $rnd . $groupid . '-' . $adminstyle . $sessval);

	if ($ecmsckpass != getcvar('loginecmsckpass', 1)) {
		printerror('NotLogin', 'index.php');
	}

	DoECheckFileRnd($userid, $username, $rnd, $dbdata, $groupid, $adminstyle, $truelogintime, $ip, $sessval);
	hCheckEcmsEHash();
}

function DelECookieRnd()
{
	esetcookie('loginecmsckpass', '', 0, 1);
}

function hReturnAdminLoginFileInfo($userid, $username, $rnd, $dbdata, $groupid, $adminstyle, $truelogintime, $ip, $sessval)
{
	$adminlogins = '';
	$ernd = make_password(27);
	$erndtwo = make_password(20);
	$erndadd = make_password(32);
	$ehash = make_password(20);
	$ehashname = 'ehash_' . make_password(4);
	$rhash = make_password(12);
	$rhashname = 'rhash_' . make_password(4);
	$userid = (int) $userid;
	$dbdata = (int) $dbdata;
	$defhash = $ehashname . '=' . $ehash . '||' . $rhashname . '=' . $rhash . '||' . $ernd . '||' . $erndtwo;
	define('EmpireCMSHDefHash', $defhash);
	$adminlogins .= '<?php' . "\r\n" . '$ecms_adminloginr=array();' . "\r\n" . '$ecms_adminloginr=Array(\'userid\'=>\'' . $userid . '\',' . "\r\n" . '\'ernd\'=>\'' . addslashes($ernd) . '\',' . "\r\n" . '\'erndtwo\'=>\'' . addslashes($erndtwo) . '\',' . "\r\n" . '\'erndadd\'=>\'' . addslashes($erndadd) . '\',' . "\r\n" . '\'ehash\'=>\'' . addslashes($ehash) . '\',' . "\r\n" . '\'ehashname\'=>\'' . addslashes($ehashname) . '\',' . "\r\n" . '\'rhash\'=>\'' . addslashes($rhash) . '\',' . "\r\n" . '\'rhashname\'=>\'' . addslashes($rhashname) . '\',' . "\r\n" . '\'edbdata\'=>\'' . $dbdata . '\');' . "\r\n" . '?>';
	esetcookie('loginecmsckfrnd', $ernd, 0, 1);
	return $adminlogins;
}

function hCheckAadminLoginFileInfo()
{
	global $ecms_config;
	global $ecms_adminloginr;
	if (!$ecms_adminloginr['ernd'] || ($ecms_adminloginr['ernd'] != getcvar('loginecmsckfrnd', 1))) {
		printerror('NotLogin', 'index.php');
	}
}

function DelECookieAdminLoginFileInfo()
{
	esetcookie('loginecmsckfrnd', '', 0, 1);
}

function hCheckEcmsRHash()
{
	global $ecms_config;
	global $ecms_adminloginr;

	if ($ecms_config['esafe']['ckhash'] == 2) {
		return '';
	}

	$rhashvar = $ecms_adminloginr['rhashname'];
	$rhash = $ecms_adminloginr['rhash'];
	if ($_GET[$rhashvar] && ($_GET[$rhashvar] == $rhash)) {
	}
	else {
		if ($_POST[$rhashvar] && ($_POST[$rhashvar] == $rhash)) {
		}
		else {
			printerror('FailHash', 'history.go(-1)');
		}
	}
}

function hCheckEcmsEHash()
{
	global $ecms_config;
	global $ecms_adminloginr;

	if ($ecms_config['esafe']['ckhash'] == 2) {
		return '';
	}

	if ($ecms_config['esafe']['ckhash'] == 1) {
		return '';
	}

	$ehashvar = $ecms_adminloginr['ehashname'];
	$ehash = $ecms_adminloginr['ehash'];
	if ($_GET[$ehashvar] && ($_GET[$ehashvar] == $ehash)) {
	}
	else {
		if ($_POST[$ehashvar] && ($_POST[$ehashvar] == $ehash)) {
		}
		else {
			printerror('FailHash', 'history.go(-1)');
		}
	}
}

function hReturnEcmsHashStrAll()
{
	global $ecms_config;
	global $ecms_adminloginr;
	$rhashvar = $ecms_adminloginr['rhashname'];
	$rhash = $ecms_adminloginr['rhash'];
	$ehashvar = $ecms_adminloginr['ehashname'];
	$ehash = $ecms_adminloginr['ehash'];

	if ($ecms_config['esafe']['ckhash'] == 2) {
		$hashhrefr['href'] = '';
		$hashhrefr['whhref'] = '';
		$hashhrefr['form'] = '';
		$hashhrefr['ehref'] = '';
		$hashhrefr['whehref'] = '';
		$hashhrefr['eform'] = '';
	}
	else if ($ecms_config['esafe']['ckhash'] == 1) {
		$hashhrefr['href'] = '&' . $rhashvar . '=' . $rhash;
		$hashhrefr['whhref'] = '?' . $rhashvar . '=' . $rhash;
		$hashhrefr['form'] = '<input type=hidden name=' . $rhashvar . ' value=' . $rhash . '>';
		$hashhrefr['ehref'] = '';
		$hashhrefr['whehref'] = '';
		$hashhrefr['eform'] = '';
	}
	else {
		$hashhrefr['href'] = '&' . $ehashvar . '=' . $ehash . '&' . $rhashvar . '=' . $rhash;
		$hashhrefr['whhref'] = '?' . $ehashvar . '=' . $ehash . '&' . $rhashvar . '=' . $rhash;
		$hashhrefr['form'] = '<input type=hidden name=' . $ehashvar . ' value=' . $ehash . '><input type=hidden name=' . $rhashvar . ' value=' . $rhash . '>';
		$hashhrefr['ehref'] = '&' . $ehashvar . '=' . $ehash;
		$hashhrefr['whehref'] = '?' . $ehashvar . '=' . $ehash;
		$hashhrefr['eform'] = '<input type=hidden name=' . $ehashvar . ' value=' . $ehash . '>';
	}

	return $hashhrefr;
}

function hReturnEcmsHashStrHref($wh = 0)
{
	$hashhrefr = hreturnecmshashstrall();
	return $wh ? $hashhrefr['whhref'] : $hashhrefr['href'];
}

function hReturnEcmsHashStrHref2($wh = 0)
{
	$hashhrefr = hreturnecmshashstrall();
	return $wh ? $hashhrefr['whehref'] : $hashhrefr['ehref'];
}

function hReturnEcmsHashStrForm($wh = 0)
{
	$hashhrefr = hreturnecmshashstrall();
	return $hashhrefr['form'];
}

function hReturnEcmsHashStrForm2($wh = 0)
{
	$hashhrefr = hreturnecmshashstrall();
	return $hashhrefr['eform'];
}

function hReturnEcmsHashStrDef($wh = 0, $ecms = 'ehref')
{
	if ($ecms_config['esafe']['ckhash'] == 2) {
		return '';
	}

	$str = '';
	$fh = ($wh ? '?' : '&');
	$hr = explode('||', EmpireCMSHDefHash);

	if ($ecms == 'href') {
		if ($ecms_config['esafe']['ckhash'] == 1) {
			$str = $fh . $hr[1];
		}
		else {
			$str = $fh . $hr[0] . '&' . $hr[1];
		}
	}
	else if ($ecms == 'ehref') {
		$str = $fh . $hr[0];
	}

	return $str;
}

function hReturnEcmsHashErndDef($ecms = 0)
{
	$str = '';
	$hr = explode('||', EmpireCMSHDefHash);

	if ($ecms == 0) {
		$str = $hr[2];
	}
	else {
		$str = $hr[3];
	}

	return $str;
}

function DoECreatFileRnd($userid, $username, $rnd, $dbdata, $groupid, $adminstyle, $truelogintime, $ip, $sessval)
{
	global $ecms_config;
	$file = ECMS_PATH . 'e/data/adminlogin/user' . $userid . '_' . md5(md5($username . '-empirecms!check.file' . $truelogintime . '-' . $rnd . $ecms_config['esafe']['ecookiernd']) . '-' . $ip . '-' . $userid . '-' . $rnd . $adminstyle . '-' . $groupid . '-' . $dbdata . $sessval) . '.php';
	$filetext = hreturnadminloginfileinfo($userid, $username, $rnd, $dbdata, $groupid, $adminstyle, $truelogintime, $ip, $sessval);
	WriteFiletext_n($file, $filetext);
}

function DoECheckFileRnd($userid, $username, $rnd, $dbdata, $groupid, $adminstyle, $truelogintime, $ip, $sessval)
{
	global $ecms_config;
	global $ecms_adminloginr;
	$file = ECMS_PATH . 'e/data/adminlogin/user' . $userid . '_' . md5(md5($username . '-empirecms!check.file' . $truelogintime . '-' . $rnd . $ecms_config['esafe']['ecookiernd']) . '-' . $ip . '-' . $userid . '-' . $rnd . $adminstyle . '-' . $groupid . '-' . $dbdata . $sessval) . '.php';

	if (!file_exists($file)) {
		printerror('NotLogin', 'index.php');
	}

	include $file;
	hcheckaadminloginfileinfo();
}

function DoEDelFileRnd($userid)
{
	$path = ECMS_PATH . 'e/data/adminlogin/';
	$hand = @opendir($path);

	while ($file = @readdir($hand)) {
		if (($file == '.') || ($file == '..')) {
			continue;
		}

		if (strstr($file, 'user' . $userid . '_')) {
			DelFiletext($path . $file);
		}
	}
}

function DoECreatAndAuthRnd($userid, $username, $rnd, $userkey, $dbdata, $groupid, $adminstyle, $truelogintime, $ip, $sessval)
{
	global $empire;
	global $dbtbpre;
	global $ecms_config;
	$andauth = md5(md5($rnd . '-' . $username . '-empirecms!check.andauth' . $truelogintime . '-' . $ecms_config['esafe']['ecookiernd'] . $userkey) . $sessval . '-' . $ip . '-' . $userid . $rnd . '-' . $adminstyle . '-' . $groupid . $username . '-' . $dbdata);
	DoEDelAndAuthRnd($userid);
	$empire->query('replace into ' . $dbtbpre . 'enewsuserloginck(userid,andauth) values(\'' . $userid . '\',\'' . $andauth . '\');');
}

function DoECheckAndAuthRnd($userid, $username, $rnd, $userkey, $dbdata, $groupid, $adminstyle, $truelogintime)
{
	global $empire;
	global $dbtbpre;
	global $ecms_config;
	$anduser_r = $empire->fetch1('select andauth from ' . $dbtbpre . 'enewsuserloginck where userid=\'' . $userid . '\'');

	if (!$anduser_r['andauth']) {
		printerror('NotLogin', 'index.php');
	}

	$ip = ($ecms_config['esafe']['ckhloginip'] == 0 ? '127.0.0.1' : egetip());
	$sessval = reesessionrnd();
	$ckandauth = md5(md5($rnd . '-' . $username . '-empirecms!check.andauth' . $truelogintime . '-' . $ecms_config['esafe']['ecookiernd'] . $userkey) . $sessval . '-' . $ip . '-' . $userid . $rnd . '-' . $adminstyle . '-' . $groupid . $username . '-' . $dbdata);

	if ($anduser_r['andauth'] != $ckandauth) {
		printerror('NotLogin', 'index.php');
	}
}

function DoEDelAndAuthRnd($userid)
{
	global $empire;
	global $dbtbpre;
	$empire->query('delete from ' . $dbtbpre . 'enewsuserloginck where userid=\'' . $userid . '\'');
}

function insert_dolog($doing, $pubid = 0)
{
	global $empire;
	global $enews;
	global $phome;
	global $logininid;
	global $loginin;
	global $ecms_config;
	global $dbtbpre;

	if ($ecms_config['esafe']['thedolog']) {
		return '';
	}

	if (empty($doing)) {
		$doing = '---';
	}

	$doing = addslashes(stripSlashes($doing));
	$logip = egetip();
	$ipport = egetipport();
	$logtime = date('Y-m-d H:i:s');

	if (empty($enews)) {
		$enews = $phome;
	}

	$enews = RepPostVar($enews);
	$pubid = RepPostVar($pubid);
	$loginin = RepPostVar($loginin);
	$sql = $empire->query('insert into ' . $dbtbpre . 'enewsdolog(username,logip,logtime,enews,doing,pubid,ipport) values(\'' . $loginin . '\',\'' . $logip . '\',\'' . $logtime . '\',\'' . $enews . '\',\'' . $doing . '\',\'' . $pubid . '\',\'' . $ipport . '\');');
}

function ReturnHLoginQuestionStr($userid, $username, $question, $answer)
{
	$pass = md5(md5('-#20empire27#-' . $question . '-empirecms-' . $userid . '-www.phome.net-' . $answer . '-wm-') . '-dg2002-' . $answer . '-wm_chief-' . $userid . '-wangmeng-');
	return $pass;
}

function FtpRTruePath($ftppath, $path)
{
	$truepath = $ftppath . '/' . $path;
	return $truepath;
}

function FtpChPath($e, $r)
{
	$path = $r[ftppath] . '/e/ftp';
	$e->fChdir($path);
	return '';
}

function FtpTranPath($ftpid, $ldir, $hdir)
{
	$r = ReturnFtpInfo($ftpid);
	$e = new EmpireCMSFTP();
	$e->fconnect($r[ftphost], $r[ftpport], $r[ftpusername], $r[ftppassword], $r[ftppath], $r[ftpssl], $r[ftppasv], $r[ftpmode], $r[ftpouttime]);
	ftpchpath($e, $r);
	$e->ftp_copy($ldir, $hdir);
	$e->fExit();
}

function FtpDelPath($ftpid, $dir)
{
	$r = ReturnFtpInfo($ftpid);
	$e = new EmpireCMSFTP();
	$e->fconnect($r[ftphost], $r[ftpport], $r[ftpusername], $r[ftppassword], $r[ftppath], $r[ftpssl], $r[ftppasv], $r[ftpmode], $r[ftpouttime]);
	ftpchpath($e, $r);
	$e->ftp_rmAll($dir);
	$e->fExit();
}

function FtpDelFile($ftpid, $fr)
{
	$r = ReturnFtpInfo($ftpid);
	$e = new EmpireCMSFTP();
	$e->fconnect($r[ftphost], $r[ftpport], $r[ftpusername], $r[ftppassword], $r[ftppath], $r[ftpssl], $r[ftppasv], $r[ftpmode], $r[ftpouttime]);
	ftpchpath($e, $r);
	$e->fMoreDelFile($fr);
	$e->fExit();
}

function FtpTranFile($ftpid, $fr, $fr1)
{
	$r = ReturnFtpInfo($ftpid);
	$e = new EmpireCMSFTP();
	$e->fconnect($r[ftphost], $r[ftpport], $r[ftpusername], $r[ftppassword], $r[ftppath], $r[ftpssl], $r[ftppasv], $r[ftpmode], $r[ftpouttime]);
	ftpchpath($e, $r);
	$e->fMoreTranFile($fr1, $fr);
	$e->fExit();
}

function FtpMkdir($ftpid, $pr, $mod)
{
	$r = ReturnFtpInfo($ftpid);
	$e = new EmpireCMSFTP();
	$e->fconnect($r[ftphost], $r[ftpport], $r[ftpusername], $r[ftppassword], $r[ftppath], $r[ftpssl], $r[ftppasv], $r[ftpmode], $r[ftpouttime]);
	ftpchpath($e, $r);
	$i = 0;

	for (; $i < count($pr); $i++) {
		if (stristr($pr[$i], ECMS_PATH)) {
			$pr[$i] = ftprtruepath($r[ftppath], str_replace(ECMS_PATH, '', $pr[$i]));
		}

		if (!$e->fChdir($pr[$i])) {
			$e->fMkdir($pr[$i]);

			if ($mod) {
				$e->fChmoddir($mod, $pr[$i]);
			}
		}
	}

	$e->fExit();
}

function ReturnFtpInfo($ftpid)
{
	global $empire;
	global $dbtbpre;
	$r = $empire->fetch1('select * from ' . $dbtbpre . 'enewspublic limit 1');
	return $r;
}

function AddPostUrlData($postdata, $userid, $username)
{
	global $empire;
	global $fun_r;
	global $dbtbpre;
	$count = count($postdata);

	if (empty($count)) {
		printerror('NotPostData', 'history.go(-1)');
	}

	checklevel($userid, $username, $classid, 'postdata');
	$e = '!!!';
	$rnd = md5(uniqid(microtime()));
	$i = 0;

	for (; $i < $count; $i++) {
		$r = explode($e, $postdata[$i]);
		$r[1] = (int) $r[1];
		$r[0] = AddAddsData($r[0]);
		$sql = $empire->query('insert into ' . $dbtbpre . 'enewspostdata(rnd,postdata,ispath) values(\'' . $rnd . '\',\'' . $r[0] . '\',\'' . $r[1] . '\');');
	}

	$line = (int) $_POST['line'];

	if ($line == 0) {
		$line = 10;
	}

	echo $fun_r[AddPostDataSuccess] . '<script>self.location.href=\'enews.php?enews=PostUrlData&start=0&line=' . $line . '&rnd=' . $rnd . hreturnecmshashstrhref(0) . '\';</script>';
	exit();
}

function PostUrlData($start, $rnd, $userid, $username)
{
	global $empire;
	global $fun_r;
	global $dbtbpre;
	global $incftp;
	$rnd = RepPostVar($rnd);

	if (empty($rnd)) {
		printerror('FailCX', 'history.go(-1)');
	}

	checklevel($userid, $username, $classid, 'postdata');

	if (empty($incftp)) {
		@include ECMS_PATH . 'e/class/ftp.php';
	}

	$pr = returnftpinfo($ftpid);
	$e = new EmpireCMSFTP();
	$e->fconnect($pr[ftphost], $pr[ftpport], $pr[ftpusername], $pr[ftppassword], $pr[ftppath], $pr[ftpssl], $pr[ftppasv], $pr[ftpmode], $pr[ftpouttime]);
	ftpchpath($e, $pr);
	$line = (int) $_GET['line'];
	$start = (int) $start;
	$b = 0;
	$sql = $empire->query('select postid,postdata,ispath from ' . $dbtbpre . 'enewspostdata where rnd=\'' . $rnd . '\' and postid>' . $start . ' order by postid limit ' . $line);

	while ($r = $empire->fetch($sql)) {
		$b = 1;
		$newstart = $r[postid];

		if ($r[ispath]) {
			$fr = explode(',', $r[postdata]);
			$i = 0;

			for (; $i < count($fr); $i++) {
				$e->fTranFile(ftprtruepath($pr[ftppath], $fr[$i]), ECMS_PATH . $fr[$i]);
			}
		}
		else {
			$e->ftp_copy(ECMS_PATH . $r[postdata], ftprtruepath($pr[ftppath], $r[postdata]));
		}
	}

	$e->fExit();

	if (empty($b)) {
		$sql = $empire->query('delete from ' . $dbtbpre . 'enewspostdata where rnd=\'' . $rnd . '\'');
		insert_dolog('');
		printerror('PostDataSuccess', 'PostUrlData.php' . hreturnecmshashstrhref2(1));
	}

	echo $fun_r[OnePostDataSuccess] . '<script>self.location.href=\'enews.php?enews=PostUrlData&start=' . $newstart . '&line=' . $line . '&rnd=' . $rnd . hreturnecmshashstrhref(0) . '\';</script>';
	exit();
}

function CheckFtpConnect($ftphost, $ftpport, $ftpusername, $ftppassword, $ftppath, $ftpssl = 0, $pasv = 0, $tranmode = 0, $timeout = 0)
{
	if (!defined('InEmpireCMSFtp')) {
		include ECMS_PATH . 'e/class/ftp.php';
	}

	$eftp = new EmpireCMSFTP();
	$result = $eftp->fconnect($ftphost, $ftpport, $ftpusername, $ftppassword, $ftppath, $ftpssl, $pasv, $tranmode, $timeout, 1);

	if ($result == 'HostFail') {
		printerror('FtpHostFail', '', 8);
	}
	else if ($result == 'UserFail') {
		printerror('FtpUserFail', '', 8);
	}
	else if ($result == 'PathFail') {
		printerror('FtpPathFail', '', 8);
	}
	else {
		printerror('FtpConnectSuccess', '', 8);
	}

	$eftp->fExit();
}

function CopyEcmsTb($otb, $tb)
{
	global $empire;
	$usql = $empire->query('SET SQL_QUOTE_SHOW_CREATE=1;');
	$r = $empire->fetch1('SHOW CREATE TABLE `' . $otb . '`;');
	$create = str_replace('"', '\\"', $r[1]);
	$create = str_replace($otb, $tb, $create);
	$empire->query($create);
}

function SetCreateTable($sql, $dbcharset)
{
	global $ecms_config;
	$type = strtoupper(preg_replace('/^\\s*CREATE TABLE\\s+.+\\s+\\(.+?\\).*(ENGINE|TYPE)\\s*=\\s*([a-z]+?).*$/isU', '\\2', $sql));
	$type = (in_array($type, array('MYISAM', 'HEAP')) ? $type : 'MYISAM');
	return preg_replace('/^\\s*(CREATE TABLE\\s+.+\\s+\\(.+?\\)).*$/isU', '\\1', $sql) . (('4.1' <= $ecms_config['db']['dbver']) && $dbcharset ? ' ENGINE=' . $type . ' DEFAULT CHARSET=' . $dbcharset : ' TYPE=' . $type);
}

function TogSaveTxtF($ecms = 0)
{
	global $empire;
	global $dbtbpre;
	$savesql = $empire->query('select f,tbname from ' . $dbtbpre . 'enewsf where savetxt=1');
	$savef = ',';

	while ($saver = $empire->fetch($savesql)) {
		$savef .= $saver[tbname] . '.' . $saver[f] . ',';
	}

	$empire->query('update ' . $dbtbpre . 'enewspublic set savetxtf=\'' . $savef . '\' limit 1');

	if ($ecms == 0) {
		GetConfig();
	}
}

function ReturnMFileF($enter, $tbname, $tid, $fform = 'file')
{
	global $empire;
	$record = '<!--record-->';
	$field = '<!--field--->';

	if ($tid) {
		$a = ' and tid=\'' . $tid . '\'';
	}

	$f = ',';
	$sql = $empire->query('select f from ' . $tbname . ' where fform=\'' . $fform . '\'' . $a);

	while ($r = $empire->fetch($sql)) {
		if (strstr($enter, $field . $r[f] . $record)) {
			$f .= $r[f] . ',';
		}
	}

	return $f;
}

function DoFFun($mid, $f, $value, $isadd = 1, $isq = 0)
{
	global $empire;
	global $dbtbpre;
	global $emod_r;

	if ($isq == 1) {
		$dofun = ($isadd == 1 ? $emod_r[$mid]['qadddofunf'] : $emod_r[$mid]['qeditdofunf']);
	}
	else {
		$dofun = ($isadd == 1 ? $emod_r[$mid]['adddofunf'] : $emod_r[$mid]['editdofunf']);
	}

	if (!strstr($dofun, '||' . $f . '!#!')) {
		return $value;
	}

	$dfr = explode('||' . $f . '!#!', $dofun);
	$dfr1 = explode('||', $dfr[1]);
	$r = explode('##', $dfr1[0]);

	if ($r[0]) {
		$fun = $r[0];
		$value = $fun($mid, $f, $isadd, $isq, $value, $r[1]);
	}

	return $value;
}

function ChGetFname($mid, $f)
{
	global $empire;
	global $dbtbpre;
	global $emod_r;
	$r = $empire->fetch1('select fname from ' . $dbtbpre . 'enewsf where f=\'' . $f . '\' and tid=\'' . $emod_r[$mid]['tid'] . '\' limit 1');
	return $r[fname] ? $r[fname] : $f;
}

function ChMustAddF($mid, $f, $value)
{
	global $empire;
	global $dbtbpre;
	global $emod_r;

	if (strstr($emod_r[$mid]['mustqenterf'], ',' . $f . ',')) {
		if (!trim($value)) {
			$GLOBALS['msgmustf'] = chgetfname($mid, $f);
			printerror('EmptyMustF', 'history.go(-1)');
		}
	}
}

function ChIsOnlyAddF($mid, $id, $f, $value, $isq = 0)
{
	global $empire;
	global $dbtbpre;
	global $emod_r;
	$mid = (int) $mid;

	if (strstr($emod_r[$mid]['onlyf'], ',' . $f . ',')) {
		$id = (int) $id;
		$and = '';

		if ($id) {
			$and = ' and id<>' . $id;
		}

		$value = RepPostStr($value);
		$num = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'ecms_' . $emod_r[$mid]['tbname'] . ' where ' . $f . '=\'' . addslashes($value) . '\'' . $and . ' limit 1');

		if (empty($num)) {
			$num = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'ecms_' . $emod_r[$mid]['tbname'] . '_check where ' . $f . '=\'' . addslashes($value) . '\'' . $and . ' limit 1');
		}

		if ($num) {
			$GLOBALS['msgisonlyf'] = chgetfname($mid, $f);

			if ($isq == 1) {
				printerror('ReIsOnlyF', 'history.go(-1)', 1);
			}
			else {
				printerror('ReIsOnlyF', 'history.go(-1)');
			}
		}
	}
}

function SameDataAddF($id, $classid, $mid, $f, $value)
{
	global $empire;
	global $public_r;
	global $dbtbpre;
	global $emod_r;
	global $emod_pubr;

	if (strstr($emod_pubr['linkfields'], ',' . $emod_r[$mid]['tbname'] . '.' . $f . '|')) {
		$index_r = $empire->fetch1('select checked from ' . $dbtbpre . 'ecms_' . $emod_r[$mid]['tbname'] . '_index where id=\'' . $id . '\' limit 1');
		$infotb = (empty($index_r['checked']) ? $dbtbpre . 'ecms_' . $emod_r[$mid]['tbname'] . '_check' : $dbtbpre . 'ecms_' . $emod_r[$mid]['tbname']);
		$value = addslashes($value);
		$r = $empire->fetch1('select ' . $f . ' from ' . $infotb . ' where id=\'' . $id . '\' limit 1');

		if ($r[$f] != $value) {
			$tbr = ReturnSameDataTb($emod_r[$mid]['tbname'], $f);
			$ltbname = $tbr[0];
			$lf = $tbr[1];
			if ($ltbname && $lf) {
				$empire->query('update ' . $dbtbpre . 'ecms_' . $ltbname . ' set ' . $lf . '=\'' . $value . '\' where ' . $lf . '=\'' . $r[$f] . '\'');
			}
		}
	}
}

function ReturnSameDataTb($tbname, $f)
{
	global $public_r;
	global $emod_pubr;
	$expr = explode(',' . $tbname . '.' . $f . '|', $emod_pubr['linkfields']);
	$expr1 = explode('|', $expr[0]);
	$count = count($expr1) - 1;
	$tbr = explode('.', $expr1[$count]);
	return $tbr;
}

function doReturnAddTempf($temp)
{
	$record = '<!--record-->';
	$field = '<!--field--->';
	$r = explode($record, $temp);
	$count = count($r);
	$str = ',';
	$i = 0;

	for (; $i < ($count - 1); $i++) {
		$r1 = explode($field, $r[$i]);
		$str .= $r1[1] . ',';
	}

	if ($str == ',,') {
		$str = ',';
	}

	return $str;
}

function DoFieldMoreValue($f, $add, $ecms = 0)
{
	$rvarname = $f . '_1';
	$count = count($add[$rvarname]);

	if (empty($count)) {
		return '';
	}

	$mvnumvar = 'mvnum_' . $f;
	$mvmustvar = 'mvmust_' . $f;
	$mvidvarname = $f . '_mvid';
	$mvid = $add[$mvidvarname];
	$mvdelidvarname = $f . '_mvdelid';
	$mvdelid = $add[$mvdelidvarname];
	$mvnum = (int) $add[$mvnumvar];
	if (($mvnum < 1) || (50 < $mvnum)) {
		$mvnum = 1;
	}

	$mvmust = (int) $add[$mvmustvar];

	if ($mvmust < 1) {
		$mvmust = 0;
	}

	if ($ecms == 1) {
		$delcount = count($mvdelid);
	}

	$rexp = '||||||';
	$fexp = '::::::';
	$rstr = '';
	$rstrexp = '';
	$i = 0;

	for (; $i < $count; $i++) {
		if ($ecms == 1) {
			$del = 0;
			$d = 0;

			for (; $d < $delcount; $d++) {
				if ($mvdelid[$d] == $mvid[$i]) {
					$del = 1;
					break;
				}
			}

			if ($del) {
				continue;
			}
		}

		$fstr = '';
		$fstrexp = '';
		$fstrempty = 0;
		$j = 0;

		for (; $j < $mvnum; $j++) {
			$k = $j + 1;
			$fsvarname = $f . '_' . $k;
			$fsval = $add[$fsvarname][$i];
			$fsval = str_replace($rexp, '', $fsval);
			$fsval = str_replace($fexp, '', $fsval);

			if (CheckValEmpty($fsval)) {
				if ($k == $mvmust) {
					break;
					$fstrempty = 1;
				}
			}

			$fstr .= $fstrexp . $fsval;
			$fstrexp = $fexp;
		}

		if (empty($fstr) || $fstrempty) {
			continue;
		}

		$rstr .= $rstrexp . $fstr;
		$rstrexp = $rexp;
	}

	return $rstr;
}

function ReturnMoreValueAddF($add, $r, $mid, $f, $ecms = 0)
{
	global $public_r;
	global $emod_r;
	$val = $r;

	if (strstr($emod_r[$mid]['morevaluef'], '|' . $f . ',')) {
		$varname = $f . '_1';

		if (is_array($add[$varname])) {
			$val = dofieldmorevalue($f, $add, $ecms);
		}
		else {
			$val = '';
		}
	}

	return $val;
}

function ReturnCheckboxAddF($r, $mid, $f)
{
	global $public_r;
	global $emod_r;
	$val = $r;
	if (is_array($r) && strstr($emod_r[$mid]['checkboxf'], ',' . $f . ',')) {
		$val = '';
		$count = count($r);
		$i = 0;

		for (; $i < $count; $i++) {
			$val .= $r[$i] . '|';
		}

		if ($val) {
			$val = '|' . $val;
		}
	}

	return $val;
}

function ReturnAddF($add, $modid, $userid, $username, $do = 0, $rdata = 0, $ch = 0)
{
	global $empire;
	global $public_r;
	global $dbtbpre;
	global $emod_r;
	if (($do == 0) || ($do == 1)) {
		if ($add['mark'] || $add['getfirsttitlespic'] || $add['mcreatespic']) {
			include_once ECMS_PATH . 'e/class/gd.php';
		}
	}

	$ret_r['tb'] = $emod_r[$modid]['deftb'];
	$pagef = $emod_r[$modid]['pagef'];
	$r = explode(',', $emod_r[$modid][enter]);
	$count = count($r) - 1;

	if (empty($do)) {
		$i = 1;

		for (; $i < $count; $i++) {
			$f = $r[$i];
			if (($f == 'special.field') || !strstr($emod_r[$modid]['canaddf'], ',' . $f . ',')) {
				continue;
			}

			$add[$f] = returncheckboxaddf($add[$f], $modid, $f);
			$add[$f] = returnmorevalueaddf($add, $add[$f], $modid, $f, $do);
			$value = repphpaspjspcodetext($add[$f]);

			if ($f == 'newstime') {
				$value = (empty($value) ? time() : to_time($value));
			}
			else if ($f == 'morepic') {
				$value = ReturnMorepicpath($add['msmallpic'], $add['mbigpic'], $add['mpicname'], $add['mdelpicid'], $add['mpicid'], $add, $add['mpicurl_qz'], 0, 0, $public_r['filedeftb']);
			}
			else if ($f == 'downpath') {
				$value = ReturnDownpath($add['downname'], $add['downpath'], $add['delpathid'], $add['pathid'], $add['downuser'], $add['fen'], $add['thedownqz'], $add, $add['foruser'], $add['downurl_qz'], 0);
			}
			else if ($f == 'onlinepath') {
				$value = ReturnDownpath($add['odownname'], $add['odownpath'], $add['odelpathid'], $add['opathid'], $add['odownuser'], $add['ofen'], $add['othedownqz'], $add, $add['oforuser'], $add['onlineurl_qz'], 0);
			}
			else if ($f == 'smalltext') {
				if (!trim($value)) {
					$value = SubSmalltextVal($add[newstext], $public_r[smalltextlen]);
				}
			}
			else if ($f == 'infoip') {
				$value = egetip();
			}
			else if ($f == 'infoipport') {
				$value = egetipport();
			}
			else if ($f == 'infozm') {
				$value = ($value ? $value : GetInfoZm($add[title]));
			}

			$value = doffun($modid, $f, $value, 1, 0);
			$modispagef = ($pagef == $f ? 1 : 0);
			$value = RepTempvarPostStrT($value, $modispagef);

			if ($pagef != $f) {
				$value = RepTempvarPostStr($value);
			}

			if (($ch == 1) && empty($add['titleurl'])) {
				chmustaddf($modid, $f, $value);
				chisonlyaddf($modid, 0, $f, $value, 0);
			}

			$value = hRepPostStr2($value);

			if ($f == 'newstext') {
				$value = addslashes(copyimg(stripSlashes($value), $add[copyimg], $add[copyflash], $add[classid], $add[qz_url], $username, $add['id'], $add['filepass'], $add['mark'], $public_r['filedeftb']));
				$value = doreplacekeyandword($value, $add['dokey'], $add['classid']);
				if ($add[autopage] && !strstr($value, '[!--empirenews.page--]')) {
					if (empty($add[autosize])) {
						$add[autosize] = 5000;
					}

					$value = autodopage($value, $add[autosize]);
				}
			}

			if ($emod_r[$modid]['savetxtf'] && ($f == $emod_r[$modid]['savetxtf'])) {
				$thetxtfile = GetFileMd5();
				$truevalue = MkDirTxtFile(date('Y/md'), $thetxtfile);
				EditTxtFieldText($truevalue, $value);
				$value = $truevalue;
			}

			if (strstr($emod_r[$modid]['tbdataf'], ',' . $f . ',')) {
				$ret_r['datafields'] .= ',' . $f;
				$ret_r['datavalues'] .= ',\'' . addslashes($value) . '\'';
			}
			else {
				$ret_r['fields'] .= ',' . $f;
				$ret_r['values'] .= ',\'' . addslashes($value) . '\'';
			}
		}
	}
	else if ($do == 1) {
		$i = 1;

		for (; $i < $count; $i++) {
			$f = $r[$i];
			if (($f == 'special.field') || !strstr($emod_r[$modid]['caneditf'], ',' . $f . ',')) {
				continue;
			}

			$add[$f] = returncheckboxaddf($add[$f], $modid, $f);
			$add[$f] = returnmorevalueaddf($add, $add[$f], $modid, $f, $do);
			$value = repphpaspjspcodetext($add[$f]);

			if ($f == 'newstime') {
				$value = (empty($value) ? time() : to_time($value));
			}
			else if ($f == 'morepic') {
				$value = ReturnMorepicpath($add['msmallpic'], $add['mbigpic'], $add['mpicname'], $add['mdelpicid'], $add['mpicid'], $add, $add['mpicurl_qz'], 1, 0, intval($add['fstb']));
			}
			else if ($f == 'downpath') {
				$value = ReturnDownpath($add['downname'], $add['downpath'], $add['delpathid'], $add['pathid'], $add['downuser'], $add['fen'], $add['thedownqz'], $add, $add['foruser'], $add['downurl_qz'], 1);
			}
			else if ($f == 'onlinepath') {
				$value = ReturnDownpath($add['odownname'], $add['odownpath'], $add['odelpathid'], $add['opathid'], $add['odownuser'], $add['ofen'], $add['othedownqz'], $add, $add['oforuser'], $add['onlineurl_qz'], 1);
			}
			else if ($f == 'smalltext') {
				if (!trim($value)) {
					$value = SubSmalltextVal($add[newstext], $public_r[smalltextlen]);
				}
			}
			else if ($f == 'infozm') {
				$value = ($value ? $value : GetInfoZm($add[title]));
			}

			$value = doffun($modid, $f, $value, 0, 0);
			$modispagef = ($pagef == $f ? 1 : 0);
			$value = RepTempvarPostStrT($value, $modispagef);

			if ($pagef != $f) {
				$value = RepTempvarPostStr($value);
			}

			if (($ch == 1) && empty($add['titleurl'])) {
				chmustaddf($modid, $f, $value);
				chisonlyaddf($modid, $add[id], $f, $value, 0);
			}

			$value = hRepPostStr2($value);
			samedataaddf($add[id], $add[classid], $modid, $f, $value);

			if ($f == 'newstext') {
				$value = addslashes(copyimg(stripSlashes($value), $add[copyimg], $add[copyflash], $add[classid], $add[qz_url], $username, $add['id'], $add['filepass'], $add['mark'], intval($add['fstb'])));
				if ($add[autopage] && !strstr($value, '[!--empirenews.page--]')) {
					if (empty($add[autosize])) {
						$add[autosize] = 5000;
					}

					$value = autodopage($value, $add[autosize]);
				}
			}

			if ($emod_r[$modid]['savetxtf'] && ($f == $emod_r[$modid]['savetxtf'])) {
				$newstexttxt_r = explode('/', $add[newstext_url]);
				$thetxtfile = $newstexttxt_r[2];
				$truevalue = MkDirTxtFile($newstexttxt_r[0] . '/' . $newstexttxt_r[1], $thetxtfile);
				EditTxtFieldText($truevalue, $value);
				$value = $truevalue;
			}

			if (strstr($emod_r[$modid]['tbdataf'], ',' . $f . ',')) {
				$ret_r['datafields'] .= ',' . $f;
				$ret_r['datavalues'] .= ',' . $f . '=\'' . addslashes($value) . '\'';
			}
			else {
				$ret_r['fields'] .= ',' . $f;
				$ret_r['values'] .= ',' . $f . '=\'' . addslashes($value) . '\'';
			}
		}
	}
	else if ($do == 8) {
		$i = 1;

		for (; $i < $count; $i++) {
			$f = $r[$i];

			if ($f == 'special.field') {
				continue;
			}

			$value = $add[$f];
			if ($emod_r[$modid]['savetxtf'] && ($f == $emod_r[$modid]['savetxtf'])) {
				$newstexttxt_r = explode('/', $add[newstext_url]);
				$thetxtfile = $newstexttxt_r[2];
				$truevalue = MkDirTxtFile($newstexttxt_r[0] . '/' . $newstexttxt_r[1], $thetxtfile);
				EditTxtFieldText($truevalue, $value);
				$value = $truevalue;
			}

			if (strstr($emod_r[$modid]['tbdataf'], ',' . $f . ',')) {
				$ret_r['datafields'] .= ',' . $f;
				$ret_r['datavalues'] .= ',' . $f . '=\'' . StripAddsData($value) . '\'';
			}
			else {
				$ret_r['fields'] .= ',' . $f;
				$ret_r['values'] .= ',' . $f . '=\'' . StripAddsData($value) . '\'';
			}
		}
	}
	else if ($do == 9) {
		$i = 1;

		for (; $i < $count; $i++) {
			$f = $r[$i];

			if ($f == 'special.field') {
				continue;
			}

			$value = $add[$f];
			if ($emod_r[$modid]['savetxtf'] && ($f == $emod_r[$modid]['savetxtf'])) {
				$thetxtfile = GetFileMd5();
				$truevalue = MkDirTxtFile(date('Y/md'), $thetxtfile);
				EditTxtFieldText($truevalue, $value);
				$value = $truevalue;
			}

			if (strstr($emod_r[$modid]['tbdataf'], ',' . $f . ',')) {
				$ret_r['datafields'] .= ',' . $f;
				$ret_r['datavalues'] .= ',\'' . StripAddsData($value) . '\'';
			}
			else {
				$ret_r['fields'] .= ',' . $f;
				$ret_r['values'] .= ',\'' . StripAddsData($value) . '\'';
			}
		}
	}
	else if ($do == 10) {
		$i = 1;

		for (; $i < $count; $i++) {
			$f = $r[$i];

			if ($f == 'special.field') {
				continue;
			}

			$value = $add[$f];

			if (strstr($emod_r[$modid]['tbdataf'], ',' . $f . ',')) {
				$ret_r['datafields'] .= ',' . $f;
				$ret_r['datavalues'] .= ',\'' . StripAddsData($value) . '\'';
			}
			else {
				$ret_r['fields'] .= ',' . $f;
				$ret_r['values'] .= ',\'' . StripAddsData($value) . '\'';
			}
		}
	}

	return $ret_r;
}

function ReturnAddCj($add, $cj, $do = 0)
{
	global $empire;
	$record = '<!--record-->';
	$field = '<!--field--->';
	$record_r = explode($record, $cj);
	$i = 0;

	for (; $i < (count($record_r) - 1); $i++) {
		$field_r = explode($field, $record_r[$i]);

		if (empty($do)) {
			$f1 = 'zz_' . $field_r[1];
			$f2 = 'z_' . $field_r[1];
			$f3 = 'qz_' . $field_r[1];
			$f4 = 'save_' . $field_r[1];
			$ret_r[0] .= ',' . $f1 . ',' . $f2 . ',' . $f3 . ',' . $f4;
			$ret_r[1] .= ',\'' . eaddslashes2($add[$f1]) . '\',\'' . eaddslashes2($add[$f2]) . '\',\'' . eaddslashes2($add[$f3]) . '\',\'' . $add[$f4] . '\'';
		}
		else {
			$f1 = 'zz_' . $field_r[1];
			$f2 = 'z_' . $field_r[1];
			$f3 = 'qz_' . $field_r[1];
			$f4 = 'save_' . $field_r[1];
			$ret_r[0] .= ',' . $f1 . '=\'' . eaddslashes2($add[$f1]) . '\',' . $f2 . '=\'' . eaddslashes2($add[$f2]) . '\',' . $f3 . '=\'' . eaddslashes2($add[$f3]) . '\',' . $f4 . '=\'' . $add[$f4] . '\'';
		}
	}

	return $ret_r;
}

function SaveMorepicFile($varname, $msavepic, $i, $picurl, $picname, $classid, $id, $add, $modtype = 0, $fstb = 1)
{
	global $public_r;
	global $empire;
	global $loginin;
	global $dbtbpre;
	global $ecms_config;

	if ($varname == 'mbigpfile') {
		$addname = '[b]';
	}

	$type = 1;
	$r[url] = $picurl;

	if ($_FILES[$varname]['name'][$i]) {
		$filetype = GetFiletype($_FILES[$varname]['name'][$i]);

		if (CheckSaveTranFiletype($filetype)) {
			return $r;
		}

		if (!strstr($public_r['filetype'], '|' . $filetype . '|')) {
			return $r;
		}

		if (!strstr($ecms_config['sets']['tranpicturetype'], ',' . $filetype . ',')) {
			return $r;
		}

		if (($public_r['filesize'] * 1024) < $_FILES[$varname]['size'][$i]) {
			return $r;
		}

		$r = DoTranFile($_FILES[$varname]['tmp_name'][$i], $_FILES[$varname]['name'][$i], $_FILES[$varname]['type'][$i], $_FILES[$varname]['size'][$i], $classid);
		$r[filesize] = (int) $r[filesize];
		$classid = (int) $classid;

		if (empty($picname)) {
			$picname = $r[filename];
		}
		else {
			$picname = $addname . $picname;
		}

		$picname = RepPostStr($picname);
		$id = (int) $id;
		$cjid = 0;

		if (!$id) {
			$cjid = (int) $add['filepass'];
		}

		eInsertFileTable($r[filename], $r[filesize], $r[filepath], $loginin, $classid, $picname, $type, $id, $cjid, $public_r[fpath], 0, 0, $fstb);
		return $r;
	}
	else {
		if (empty($msavepic)) {
			return $r;
		}

		if (empty($picurl)) {
			return $r;
		}

		$filetype = GetFiletype($picurl);

		if (CheckSaveTranFiletype($filetype)) {
			return $r;
		}

		if (!strstr($public_r['filetype'], '|' . $filetype . '|')) {
			return $r;
		}

		if (!strstr($ecms_config['sets']['tranpicturetype'], ',' . $filetype . ',')) {
			return $r;
		}

		$r = DoTranUrl($picurl, $classid);

		if ($r['tran']) {
			$r[filesize] = (int) $r[filesize];
			$classid = (int) $classid;
			$r[type] = (int) $r[type];

			if (empty($picname)) {
				$picname = $r[filename];
			}
			else {
				$picname = $addname . $picname;
			}

			$picname = RepPostStr($picname);
			$id = (int) $id;
			$cjid = 0;

			if (!$id) {
				$cjid = (int) $add['filepass'];
			}

			eInsertFileTable($r[filename], $r[filesize], $r[filepath], $loginin, $classid, $picname, $type, $id, $cjid, $public_r[fpath], 0, 0, $fstb);
			return $r;
		}

		return $r;
	}
}

function LoadInSaveMorepicFile($morepic, $msavepic, $classid, $id, $add, $modtype = 0, $fstb = 1)
{
	if (empty($morepic) || !$msavepic) {
		return $morepic;
	}

	$f_exp = '::::::';
	$r_exp = "\r\n";
	$returnstr = '';
	$r = explode($r_exp, $morepic);
	$countr = count($r);
	$i = 0;

	for (; $i < $countr; $i++) {
		$r1 = explode($f_exp, $r[$i]);
		$smpr = savemorepicfile('msmallpfile', $msavepic, 0, $r1[0], $r1[2], $classid, $id, $add, $modtype, $fstb);
		$spic = $smpr[url];

		if ($r1[0] != $r1[1]) {
			$bmpr = savemorepicfile('mbigpfile', $msavepic, 0, $r1[1], $r1[2], $classid, $id, $add, $modtype, $fstb);
			$bpic = $bmpr[url];
		}
		else {
			$bpic = $spic;
		}

		if ($spic) {
			$returnstr .= $spic . $f_exp . $bpic . $f_exp . $r1[2] . $r_exp;
		}
	}

	$returnstr = substr($returnstr, 0, strlen($returnstr) - 2);
	return $returnstr;
}

function ReturnMorepicpath($smallpic, $bigpic, $picname, $delpicid, $picid, $add, $downurl, $down = 0, $modtype = 0, $fstb = 1)
{
	global $loginin;
	global $logininid;
	$f_exp = '::::::';
	$r_exp = "\r\n";
	$returnstr = '';
	$downurl = str_replace($f_exp, '', $downurl);
	$downurl = str_replace($r_exp, '', $downurl);
	$add[msavepic] = (int) $add[msavepic];
	$add[classid] = (int) $add[classid];
	$add[id] = (int) $add[id];
	$add[filepass] = (int) $add[filepass];
	$modtype = (int) $modtype;
	$fstb = (int) $fstb;
	$logininid = (int) $logininid;
	$loginin = RepPostVar($loginin);

	if (empty($down)) {
		$i = 0;

		for (; $i < count($smallpic); $i++) {
			$name = str_replace($f_exp, '', $picname[$i]);
			$name = str_replace($r_exp, '', $name);
			$spic = str_replace($f_exp, '', $smallpic[$i]);
			$spic = str_replace($r_exp, '', $spic);
			$spic = ($spic ? $downurl . $spic : '');
			$smpr = savemorepicfile('msmallpfile', $add[msavepic], $i, $spic, $name, $add[classid], $add[id], $add, $modtype, $fstb);
			$spic = $smpr[url];
			if (empty($bigpic[$i]) && !$_FILES['mbigpfile']['name'][$i]) {
				$bpic = $spic;
			}
			else {
				$bpic = str_replace($f_exp, '', $bigpic[$i]);
				$bpic = str_replace($r_exp, '', $bpic);
				$bpic = ($bpic ? $downurl . $bpic : '');
				$bmpr = savemorepicfile('mbigpfile', $add[msavepic], $i, $bpic, $name, $add[classid], $add[id], $add, $modtype, $fstb);
				$bpic = $bmpr[url];
				if (empty($spic) && $bpic && $bmpr[tran] && $add[mcreatespic]) {
					$picno = '[b]' . ($name ? $name : $bmpr[filename]);
					$sfiler = getmysmallimg($add['classid'], $picno, $bmpr[insertfile], $bmpr[filepath], $bmpr[yname], $add[mcreatespicwidth], $add[mcreatespicheight], $bmpr[name], $add['filepass'], $add['filepass'], $logininid, $loginin, $modtype, $fstb);
					$spic = str_replace('/' . $bmpr[filename], '/small' . $bmpr[insertfile] . $sfiler['filetype'], $bmpr[url]);
				}
			}

			if (empty($spic)) {
				$spic = $bpic;
			}

			if ($spic) {
				$returnstr .= $spic . $f_exp . $bpic . $f_exp . $name . $r_exp;
			}
		}
	}
	else {
		$i = 0;

		for (; $i < count($smallpic); $i++) {
			$del = 0;
			$j = 0;

			for (; $j < count($delpicid); $j++) {
				if ($delpicid[$j] == $picid[$i]) {
					$del = 1;
				}
			}

			if ($del) {
				continue;
			}

			$name = str_replace($f_exp, '', $picname[$i]);
			$name = str_replace($r_exp, '', $name);
			$spic = str_replace($f_exp, '', $smallpic[$i]);
			$spic = str_replace($r_exp, '', $spic);
			$spic = ($spic ? $downurl . $spic : '');
			$smpr = savemorepicfile('msmallpfile', $add[msavepic], $i, $spic, $name, $add[classid], $add[id], $add, $modtype, $fstb);
			$spic = $smpr[url];
			if (empty($bigpic[$i]) && !$_FILES['mbigpfile']['name'][$i]) {
				$bpic = $spic;
			}
			else {
				$bpic = str_replace($f_exp, '', $bigpic[$i]);
				$bpic = str_replace($r_exp, '', $bpic);
				$bpic = ($bpic ? $downurl . $bpic : '');
				$bmpr = savemorepicfile('mbigpfile', $add[msavepic], $i, $bpic, $name, $add[classid], $add[id], $add, $modtype, $fstb);
				$bpic = $bmpr[url];
				if (empty($spic) && $bpic && $bmpr[tran] && $add[mcreatespic]) {
					$picno = '[b]' . ($name ? $name : $bmpr[filename]);
					$sfiler = getmysmallimg($add['classid'], $picno, $bmpr[insertfile], $bmpr[filepath], $bmpr[yname], $add[mcreatespicwidth], $add[mcreatespicheight], $bmpr[name], $add['filepass'], $add['filepass'], $logininid, $loginin, $modtype, $fstb);
					$spic = str_replace('/' . $bmpr[filename], '/small' . $bmpr[insertfile] . $sfiler['filetype'], $bmpr[url]);
				}
			}

			if (empty($spic)) {
				$spic = $bpic;
			}

			if ($spic) {
				$returnstr .= $spic . $f_exp . $bpic . $f_exp . $name . $r_exp;
			}
		}
	}

	$returnstr = substr($returnstr, 0, strlen($returnstr) - 2);
	return $returnstr;
}

function ReturnDownpath($downname, $downpath, $delpathid, $pathid, $downuser, $fen, $thedownqz, $add, $foruser, $downurl, $down = 0)
{
	$f_exp = '::::::';
	$r_exp = "\r\n";
	$returnstr = '';
	$downurl = str_replace($f_exp, '', $downurl);
	$downurl = str_replace($r_exp, '', $downurl);

	if (empty($down)) {
		$i = 0;

		for (; $i < count($downname); $i++) {
			$name = str_replace($f_exp, '', $downname[$i]);
			$name = str_replace($r_exp, '', $name);
			$path = str_replace($f_exp, '', $downpath[$i]);
			$path = str_replace($r_exp, '', $path);

			if ($add[doforuser]) {
				if (empty($foruser)) {
					$foruser = 0;
				}

				$fuser = $foruser;
			}
			else if (empty($downuser[$i])) {
				$fuser = 0;
			}
			else {
				$fuser = $downuser[$i];
			}

			if ($add[dodownfen]) {
				if (empty($add[downfen])) {
					$add[downfen] = 0;
				}

				$ffen = $add[downfen];
			}
			else if (empty($fen[$i])) {
				$ffen = 0;
			}
			else {
				$ffen = $fen[$i];
			}

			$downqz = $thedownqz[$i];
			if ($path && $name) {
				$returnstr .= $name . $f_exp . $downurl . $path . $f_exp . $fuser . $f_exp . $ffen . $f_exp . $downqz . $r_exp;
			}
		}
	}
	else {
		$i = 0;

		for (; $i < count($downname); $i++) {
			$del = 0;
			$j = 0;

			for (; $j < count($delpathid); $j++) {
				if ($delpathid[$j] == $pathid[$i]) {
					$del = 1;
				}
			}

			if ($del) {
				continue;
			}

			$name = str_replace($f_exp, '', $downname[$i]);
			$name = str_replace($r_exp, '', $name);
			$path = str_replace($f_exp, '', $downpath[$i]);
			$path = str_replace($r_exp, '', $path);

			if ($add[doforuser]) {
				if (empty($foruser)) {
					$foruser = 0;
				}

				$fuser = $foruser;
			}
			else if (empty($downuser[$i])) {
				$fuser = 0;
			}
			else {
				$fuser = $downuser[$i];
			}

			if ($add[dodownfen]) {
				if (empty($add[downfen])) {
					$add[downfen] = 0;
				}

				$ffen = $add[downfen];
			}
			else if (empty($fen[$i])) {
				$ffen = 0;
			}
			else {
				$ffen = $fen[$i];
			}

			$downqz = $thedownqz[$i];
			if ($path && $name) {
				$returnstr .= $name . $f_exp . $downurl . $path . $f_exp . $fuser . $f_exp . $ffen . $f_exp . $downqz . $r_exp;
			}
		}
	}

	$returnstr = substr($returnstr, 0, strlen($returnstr) - 2);
	return $returnstr;
}

function GetClassNavCache($line, $navfh)
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	$limit = '';

	if ($line) {
		$limit = ' limit ' . $line;
	}

	$navs = '';
	$fh = '';
	$sql = $empire->query('select classid,classname,wburl,listdt,classurl,classpath from ' . $dbtbpre . 'enewsclass where bclassid=0 and showclass=0 order by myorder,classid' . $limit);

	while ($r = $empire->fetch($sql)) {
		$classurl = sys_returnbqclassurl($r);

		if ($navs) {
			$fh = $navfh;
		}

		$navs .= $fh . '<a href="' . $classurl . '">' . $r[classname] . '</a>';
	}

	return $navs;
}

function GetConfig($domod = 0)
{
	$filename = eReturnTrueEcmsPath() . 'e/config/config.php';
	$exp = '//-------EmpireCMS.Public.Cache-------';
	$text = ReadFiletext($filename);
	$r = explode($exp, $text);

	if ($r[0] == '') {
		return false;
	}

	$r[1] = GetPubCache();

	if ($domod == 1) {
		$r[2] = GetModCache();
	}

	$setting = $r[0] . $exp . $r[1] . $exp . $r[2] . $exp . $r[3];
	WriteFiletext_n($filename, $setting);
}

function GetPubCache()
{
	global $empire;
	global $dbtbpre;
	$pvstring = '';
	$pvsql = $empire->query('select myvar,varvalue from ' . $dbtbpre . 'enewspubvar where tocache=1');

	while ($pvr = $empire->fetch($pvsql)) {
		$pvstring .= ',\'add_' . $pvr['myvar'] . '\'=>\'' . addslashes($pvr['varvalue']) . '\'';
	}

	$r = $empire->fetch1('select * from ' . $dbtbpre . 'enewspublic limit 1');
	$tr = $empire->fetch1('select downsofttemp,onlinemovietemp,listpagetemp from ' . GetTemptb('enewspubtemp') . ' limit 1');
	$fsr = $empire->fetch1('select purl from ' . $dbtbpre . 'enewspostserver where ptype=1 limit 1');
	$plr = $empire->fetch1('select * from ' . $dbtbpre . 'enewspl_set limit 1');
	$memberconnectnum = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'enewsmember_connect_app where isclose=0');
	$GLOBALS['public_r']['newsurl'] = $r['newsurl'];
	$GLOBALS['public_r']['email'] = $r['email'];
	$r[filedeftb] = 1;
	$plr[pldeftb] = 1;
	$classnavs = getclassnavcache($r[classnavline], $r[classnavfh]);
	$checkdorepstr = returncheckdorep();
	$setting .= '' . "\r\n" . '' . "\r\n" . '//------------e_public' . "\r\n" . '$public_r=array(\'sitename\'=>\'' . addslashes($r[sitename]) . '\',' . "\r\n" . '\'newsurl\'=>\'' . addslashes($r[newsurl]) . '\',' . "\r\n" . '\'email\'=>\'' . addslashes($r[email]) . '\',' . "\r\n" . '\'filetype\'=>\'' . addslashes($r[filetype]) . '\',' . "\r\n" . '\'filesize\'=>' . $r[filesize] . ',' . "\r\n" . '\'relistnum\'=>' . $r[relistnum] . ',' . "\r\n" . '\'renewsnum\'=>' . $r[renewsnum] . ',' . "\r\n" . '\'min_keyboard\'=>' . $r[min_keyboard] . ',' . "\r\n" . '\'max_keyboard\'=>' . $r[max_keyboard] . ',' . "\r\n" . '\'search_num\'=>' . $r[search_num] . ',' . "\r\n" . '\'search_pagenum\'=>' . $r[search_pagenum] . ',' . "\r\n" . '\'newslink\'=>' . $r[newslink] . ',' . "\r\n" . '\'checked\'=>' . $r[checked] . ',' . "\r\n" . '\'searchtime\'=>' . $r[searchtime] . ',' . "\r\n" . '\'loginnum\'=>' . $r[loginnum] . ',' . "\r\n" . '\'logintime\'=>' . $r[logintime] . ',' . "\r\n" . '\'addnews_ok\'=>' . $r[addnews_ok] . ',' . "\r\n" . '\'register_ok\'=>' . $r[register_ok] . ',' . "\r\n" . '\'indextype\'=>\'' . addslashes($r[indextype]) . '\',' . "\r\n" . '\'goodlencord\'=>' . $r[goodlencord] . ',' . "\r\n" . '\'goodtype\'=>\'' . addslashes($r[goodtype]) . '\',' . "\r\n" . '\'searchtype\'=>\'' . addslashes($r[searchtype]) . '\',' . "\r\n" . '\'exittime\'=>' . $r[exittime] . ',' . "\r\n" . '\'smalltextlen\'=>' . $r[smalltextlen] . ',' . "\r\n" . '\'defaultgroupid\'=>' . $r[defaultgroupid] . ',' . "\r\n" . '\'fileurl\'=>\'' . addslashes($r[fileurl]) . '\',' . "\r\n" . '\'install\'=>' . $r[install] . ',' . "\r\n" . '\'phpmode\'=>' . $r[phpmode] . ',' . "\r\n" . '\'dorepnum\'=>' . $r[dorepnum] . ',' . "\r\n" . '\'loadtempnum\'=>' . $r[loadtempnum] . ',' . "\r\n" . '\'bakdbpath\'=>\'' . addslashes($r[bakdbpath]) . '\',' . "\r\n" . '\'bakdbzip\'=>\'' . addslashes($r[bakdbzip]) . '\',' . "\r\n" . '\'downpass\'=>\'' . addslashes($r[downpass]) . '\',' . "\r\n" . '\'filechmod\'=>' . $r[filechmod] . ',' . "\r\n" . '\'loginkey_ok\'=>' . $r[loginkey_ok] . ',' . "\r\n" . '\'tbname\'=>\'' . addslashes($r[tbname]) . '\',' . "\r\n" . '\'limittype\'=>' . $r[limittype] . ',' . "\r\n" . '\'redodown\'=>' . $r[redodown] . ',' . "\r\n" . '\'downsofttemp\'=>\'' . addslashes(stripSlashes($tr[downsofttemp])) . '\',' . "\r\n" . '\'onlinemovietemp\'=>\'' . addslashes(stripSlashes($tr[onlinemovietemp])) . '\',' . "\r\n" . '\'lctime\'=>' . $r[lctime] . ',' . "\r\n" . '\'candocode\'=>' . $r[candocode] . ',' . "\r\n" . '\'opennotcj\'=>' . $r[opennotcj] . ',' . "\r\n" . '\'listpagetemp\'=>\'' . addslashes(stripSlashes($tr[listpagetemp])) . '\',' . "\r\n" . '\'reuserpagenum\'=>' . $r[reuserpagenum] . ',' . "\r\n" . '\'revotejsnum\'=>' . $r[revotejsnum] . ',' . "\r\n" . '\'readjsnum\'=>' . $r[readjsnum] . ',' . "\r\n" . '\'qaddtran\'=>' . $r[qaddtran] . ',' . "\r\n" . '\'qaddtransize\'=>' . $r[qaddtransize] . ',' . "\r\n" . '\'ebakthisdb\'=>' . $r[ebakthisdb] . ',' . "\r\n" . '\'delnewsnum\'=>' . $r[delnewsnum] . ',' . "\r\n" . '\'markpos\'=>' . $r[markpos] . ',' . "\r\n" . '\'markimg\'=>\'' . addslashes($r[markimg]) . '\',' . "\r\n" . '\'marktext\'=>\'' . addslashes($r[marktext]) . '\',' . "\r\n" . '\'markfontsize\'=>\'' . addslashes($r[markfontsize]) . '\',' . "\r\n" . '\'markfontcolor\'=>\'' . addslashes($r[markfontcolor]) . '\',' . "\r\n" . '\'markfont\'=>\'' . addslashes($r[markfont]) . '\',' . "\r\n" . '\'adminloginkey\'=>' . $r[adminloginkey] . ',' . "\r\n" . '\'php_outtime\'=>' . $r[php_outtime] . ',' . "\r\n" . '\'listpagefun\'=>\'' . addslashes($r[listpagefun]) . '\',' . "\r\n" . '\'textpagefun\'=>\'' . addslashes($r[textpagefun]) . '\',' . "\r\n" . '\'adfile\'=>\'' . addslashes($r[adfile]) . '\',' . "\r\n" . '\'notsaveurl\'=>\'' . addslashes($r[notsaveurl]) . '\',' . "\r\n" . '\'rssnum\'=>' . $r[rssnum] . ',' . "\r\n" . '\'rsssub\'=>' . $r[rsssub] . ',' . "\r\n" . '\'savetxtf\'=>\'' . addslashes($r[savetxtf]) . '\',' . "\r\n" . '\'dorepdlevelnum\'=>' . $r[dorepdlevelnum] . ',' . "\r\n" . '\'listpagelistfun\'=>\'' . addslashes($r[listpagelistfun]) . '\',' . "\r\n" . '\'listpagelistnum\'=>' . $r[listpagelistnum] . ',' . "\r\n" . '\'infolinknum\'=>' . $r[infolinknum] . ',' . "\r\n" . '\'searchgroupid\'=>' . $r[searchgroupid] . ',' . "\r\n" . '\'opencopytext\'=>' . $r[opencopytext] . ',' . "\r\n" . '\'reuserjsnum\'=>' . $r[reuserjsnum] . ',' . "\r\n" . '\'reuserlistnum\'=>' . $r[reuserlistnum] . ',' . "\r\n" . '\'opentitleurl\'=>' . $r[opentitleurl] . ',' . "\r\n" . '\'searchtempvar\'=>' . $r[searchtempvar] . ',' . "\r\n" . '\'showinfolevel\'=>' . $r[showinfolevel] . ',' . "\r\n" . '\'navfh\'=>\'' . addslashes($r[navfh]) . '\',' . "\r\n" . '\'spicwidth\'=>' . $r[spicwidth] . ',' . "\r\n" . '\'spicheight\'=>' . $r[spicheight] . ',' . "\r\n" . '\'spickill\'=>' . $r[spickill] . ',' . "\r\n" . '\'jpgquality\'=>' . $r[jpgquality] . ',' . "\r\n" . '\'markpct\'=>' . $r[markpct] . ',' . "\r\n" . '\'redoview\'=>' . $r[redoview] . ',' . "\r\n" . '\'reggetfen\'=>' . $r[reggetfen] . ',' . "\r\n" . '\'regbooktime\'=>' . $r[regbooktime] . ',' . "\r\n" . '\'revotetime\'=>' . $r[revotetime] . ',' . "\r\n" . '\'fpath\'=>' . $r[fpath] . ',' . "\r\n" . '\'filepath\'=>\'' . addslashes($r[filepath]) . '\',' . "\r\n" . '\'nreclass\'=>\'' . addslashes($r[nreclass]) . '\',' . "\r\n" . '\'nreinfo\'=>\'' . addslashes($r[nreinfo]) . '\',' . "\r\n" . '\'nrejs\'=>\'' . addslashes($r[nrejs]) . '\',' . "\r\n" . '\'nottobq\'=>\'' . addslashes($r[nottobq]) . '\',' . "\r\n" . '\'defspacestyleid\'=>' . $r[defspacestyleid] . ',' . "\r\n" . '\'canposturl\'=>\'' . addslashes($r[canposturl]) . '\',' . "\r\n" . '\'openspace\'=>' . $r[openspace] . ',' . "\r\n" . '\'defadminstyle\'=>' . $r[defadminstyle] . ',' . "\r\n" . '\'realltime\'=>' . $r[realltime] . ',' . "\r\n" . '\'closeip\'=>\'' . addslashes($r[closeip]) . '\',' . "\r\n" . '\'openip\'=>\'' . addslashes($r[openip]) . '\',' . "\r\n" . '\'hopenip\'=>\'' . addslashes($r[hopenip]) . '\',' . "\r\n" . '\'textpagelistnum\'=>' . $r[textpagelistnum] . ',' . "\r\n" . '\'memberlistlevel\'=>' . $r[memberlistlevel] . ',' . "\r\n" . '\'ebakcanlistdb\'=>' . $r[ebakcanlistdb] . ',' . "\r\n" . '\'keytog\'=>' . $r[keytog] . ',' . "\r\n" . '\'keytime\'=>' . $r[keytime] . ',' . "\r\n" . '\'keyrnd\'=>\'' . addslashes($r[keyrnd]) . '\',' . "\r\n" . '\'checkdorepstr\'=>\'' . addslashes($checkdorepstr) . '\',' . "\r\n" . '\'regkey_ok\'=>' . $r[regkey_ok] . ',' . "\r\n" . '\'opengetdown\'=>' . $r[opengetdown] . ',' . "\r\n" . '\'gbkey_ok\'=>' . $r[gbkey_ok] . ',' . "\r\n" . '\'fbkey_ok\'=>' . $r[fbkey_ok] . ',' . "\r\n" . '\'newaddinfotime\'=>' . $r[newaddinfotime] . ',' . "\r\n" . '\'classnavs\'=>\'' . addslashes($classnavs) . '\',' . "\r\n" . '\'adminstyle\'=>\'' . addslashes($r[adminstyle]) . '\',' . "\r\n" . '\'docnewsnum\'=>' . $r[docnewsnum] . ',' . "\r\n" . '\'openschall\'=>' . $r[openschall] . ',' . "\r\n" . '\'schallfield\'=>' . $r[schallfield] . ',' . "\r\n" . '\'schallminlen\'=>' . $r[schallminlen] . ',' . "\r\n" . '\'schallmaxlen\'=>' . $r[schallmaxlen] . ',' . "\r\n" . '\'schallnum\'=>' . $r[schallnum] . ',' . "\r\n" . '\'schallpagenum\'=>' . $r[schallpagenum] . ',' . "\r\n" . '\'dtcanbq\'=>' . $r[dtcanbq] . ',' . "\r\n" . '\'dtcachetime\'=>' . $r[dtcachetime] . ',' . "\r\n" . '\'repkeynum\'=>' . $r[repkeynum] . ',' . "\r\n" . '\'regacttype\'=>' . $r[regacttype] . ',' . "\r\n" . '\'opengetpass\'=>' . $r[opengetpass] . ',' . "\r\n" . '\'hlistinfonum\'=>' . $r[hlistinfonum] . ',' . "\r\n" . '\'qlistinfonum\'=>' . $r[qlistinfonum] . ',' . "\r\n" . '\'dtncanbq\'=>' . $r[dtncanbq] . ',' . "\r\n" . '\'dtncachetime\'=>' . $r[dtncachetime] . ',' . "\r\n" . '\'readdinfotime\'=>' . $r[readdinfotime] . ',' . "\r\n" . '\'qeditinfotime\'=>' . $r[qeditinfotime] . ',' . "\r\n" . '\'onclicktype\'=>' . $r[onclicktype] . ',' . "\r\n" . '\'onclickfilesize\'=>' . $r[onclickfilesize] . ',' . "\r\n" . '\'onclickfiletime\'=>' . $r[onclickfiletime] . ',' . "\r\n" . '\'schalltime\'=>' . $r[schalltime] . ',' . "\r\n" . '\'defprinttempid\'=>' . $r[defprinttempid] . ',' . "\r\n" . '\'opentags\'=>' . $r[opentags] . ',' . "\r\n" . '\'tagstempid\'=>' . $r[tagstempid] . ',' . "\r\n" . '\'usetags\'=>\'' . addslashes($r[usetags]) . '\',' . "\r\n" . '\'chtags\'=>\'' . addslashes($r[chtags]) . '\',' . "\r\n" . '\'tagslistnum\'=>' . $r[tagslistnum] . ',' . "\r\n" . '\'closeqdt\'=>' . $r[closeqdt] . ',' . "\r\n" . '\'settop\'=>' . $r[settop] . ',' . "\r\n" . '\'qlistinfomod\'=>' . $r[qlistinfomod] . ',' . "\r\n" . '\'gb_num\'=>' . $r[gb_num] . ',' . "\r\n" . '\'member_num\'=>' . $r[member_num] . ',' . "\r\n" . '\'space_num\'=>' . $r[space_num] . ',' . "\r\n" . '\'infolday\'=>' . $r[infolday] . ',' . "\r\n" . '\'filelday\'=>' . $r[filelday] . ',' . "\r\n" . '\'dorepkey\'=>' . $r[dorepkey] . ',' . "\r\n" . '\'dorepword\'=>' . $r[dorepword] . ',' . "\r\n" . '\'onclickrnd\'=>\'' . addslashes($r[onclickrnd]) . '\',' . "\r\n" . '\'indexpagedt\'=>' . $r[indexpagedt] . ',' . "\r\n" . '\'keybgcolor\'=>\'' . addslashes($r[keybgcolor]) . '\',' . "\r\n" . '\'keyfontcolor\'=>\'' . addslashes($r[keyfontcolor]) . '\',' . "\r\n" . '\'keydistcolor\'=>\'' . addslashes($r[keydistcolor]) . '\',' . "\r\n" . '\'indexpageid\'=>' . $r[indexpageid] . ',' . "\r\n" . '\'closeqdtmsg\'=>\'' . addslashes($r[closeqdtmsg]) . '\',' . "\r\n" . '\'openfileserver\'=>' . $r[openfileserver] . ',' . "\r\n" . '\'fs_purl\'=>\'' . addslashes($fsr[purl]) . '\',' . "\r\n" . '\'closemods\'=>\'' . addslashes($r[closemods]) . '\',' . "\r\n" . '\'fieldandtop\'=>' . $r[fieldandtop] . ',' . "\r\n" . '\'fieldandclosetb\'=>\'' . addslashes($r[fieldandclosetb]) . '\',' . "\r\n" . '\'filedatatbs\'=>\'' . addslashes($r[filedatatbs]) . '\',' . "\r\n" . '\'filedeftb\'=>' . $r[filedeftb] . ',' . "\r\n" . '\'pldeftb\'=>' . $plr[pldeftb] . ',' . "\r\n" . '\'plurl\'=>\'' . addslashes($plr[plurl]) . '\',' . "\r\n" . '\'plkey_ok\'=>' . $plr[plkey_ok] . ',' . "\r\n" . '\'plface\'=>\'' . addslashes($plr[plface]) . '\',' . "\r\n" . '\'plf\'=>\'' . addslashes($plr[plf]) . '\',' . "\r\n" . '\'pldatatbs\'=>\'' . addslashes($plr[pldatatbs]) . '\',' . "\r\n" . '\'defpltempid\'=>' . $plr[defpltempid] . ',' . "\r\n" . '\'pl_num\'=>' . $plr[pl_num] . ',' . "\r\n" . '\'plgroupid\'=>' . $plr[plgroupid] . ',' . "\r\n" . '\'closelisttemp\'=>\'' . addslashes($r[closelisttemp]) . '\',' . "\r\n" . '\'chclasscolor\'=>\'' . addslashes($r[chclasscolor]) . '\',' . "\r\n" . '\'timeclose\'=>\'' . addslashes($r[timeclose]) . '\',' . "\r\n" . '\'timeclosedo\'=>\'' . addslashes($r[timeclosedo]) . '\',' . "\r\n" . '\'ipaddinfonum\'=>' . $r[ipaddinfonum] . ',' . "\r\n" . '\'ipaddinfotime\'=>' . $r[ipaddinfotime] . ',' . "\r\n" . '\'rewriteinfo\'=>\'' . addslashes($r[rewriteinfo]) . '\',' . "\r\n" . '\'rewriteclass\'=>\'' . addslashes($r[rewriteclass]) . '\',' . "\r\n" . '\'rewriteinfotype\'=>\'' . addslashes($r[rewriteinfotype]) . '\',' . "\r\n" . '\'rewritetags\'=>\'' . addslashes($r[rewritetags]) . '\',' . "\r\n" . '\'rewritepl\'=>\'' . addslashes($r[rewritepl]) . '\',' . "\r\n" . '\'memberconnectnum\'=>' . $memberconnectnum . ',' . "\r\n" . '\'closehmenu\'=>\'' . addslashes($r[closehmenu]) . '\',' . "\r\n" . '\'indexaddpage\'=>' . $r[indexaddpage] . ',' . "\r\n" . '\'modmemberedittran\'=>' . $r[modmemberedittran] . ',' . "\r\n" . '\'modinfoedittran\'=>' . $r[modinfoedittran] . ',' . "\r\n" . '\'deftempid\'=>' . $r[deftempid] . $pvstring . ');' . "\r\n" . '//------------e_public' . "\r\n" . '' . GetMoreportCache() . '' . "\r\n" . '' . "\r\n" . '';
	return $setting;
}

function GetModCache()
{
	global $empire;
	global $dbtbpre;
	$tablesql = $empire->query('select tbname,deftb,yhid,mid,intb from ' . $dbtbpre . 'enewstable');

	while ($tabler = $empire->fetch($tablesql)) {
		$tables .= '$etable_r[\'' . $tabler[tbname] . '\']=Array(\'deftb\'=>\'' . addslashes($tabler[deftb]) . '\',' . "\r\n" . '\'yhid\'=>' . $tabler[yhid] . ',' . "\r\n" . '\'intb\'=>' . $tabler[intb] . ',' . "\r\n" . '\'mid\'=>' . $tabler[mid] . ');' . "\r\n" . '';
	}

	$alllinkfields = '|';
	$modsql = $empire->query('select * from ' . $dbtbpre . 'enewsmod');

	while ($mr = $empire->fetch($modsql)) {
		$listtempf = doreturnaddtempf($mr['listtempvar']);
		$texttempf = doreturnaddtempf($mr['tempvar']);
		$enter = doreturnaddtempf($mr['enter']);
		$qenter = doreturnaddtempf($mr['qenter']);
		$cj = doreturnaddtempf($mr['cj']);
		$mainf = ',';
		$dataf = ',';
		$tobrf = ',';
		$dohtmlf = ',';
		$savetxtf = '';
		$pagef = '';
		$smalltextf = ',';
		$checkboxf = ',';
		$filef = ',';
		$imgf = ',';
		$flashf = ',';
		$onlyf = ',';
		$linkfields = '|';
		$morevaluef = '|';
		$editorf = ',';
		$ubbeditorf = ',';
		$adddofunf = '||';
		$editdofunf = '||';
		$qadddofunf = '||';
		$qeditdofunf = '||';
		$fsql = $empire->query('select * from ' . $dbtbpre . 'enewsf where tid=\'' . $mr['tid'] . '\'');

		while ($fr = $empire->fetch($fsql)) {
			if ($fr['tbdataf']) {
				$dataf .= $fr['f'] . ',';
			}
			else if ($fr['f'] != 'special.field') {
				$mainf .= $fr['f'] . ',';
			}

			if ($fr['tobr']) {
				$tobrf .= $fr['f'] . ',';
			}

			if ($fr['dohtml']) {
				$dohtmlf .= $fr['f'] . ',';
			}

			if ($fr['savetxt']) {
				$savetxtf = $fr['f'];
			}

			if ($fr['ispage']) {
				$pagef = $fr['f'];
			}

			if ($fr['issmalltext']) {
				$smalltextf .= $fr['f'] . ',';
			}

			if ($fr['fform'] == 'checkbox') {
				$checkboxf .= $fr['f'] . ',';
			}

			if ($fr['fform'] == 'file') {
				$filef .= $fr['f'] . ',';
			}

			if ($fr['fform'] == 'img') {
				$imgf .= $fr['f'] . ',';
			}

			if ($fr['fform'] == 'flash') {
				$flashf .= $fr['f'] . ',';
			}

			if ($fr['isonly']) {
				$onlyf .= $fr['f'] . ',';
			}

			if ((($fr['fform'] == 'linkfield') || ($fr['fform'] == 'linkfieldselect')) && $fr['samedata'] && $fr['linkfieldval']) {
				$linkfields .= $fr[f] . ',' . $fr[linkfieldtb] . '.' . $fr[linkfieldval] . '|';
				$alllinkfields .= $fr[tbname] . '.' . $fr[f] . ',' . $fr[linkfieldtb] . '.' . $fr[linkfieldval] . '|';
			}

			if ($fr['fform'] == 'morevaluefield') {
				$morevaluef .= $fr[f] . ',' . $fr[fmvnum] . '|';
			}

			if ($fr['fform'] == 'editor') {
				$editorf .= $fr['f'] . ',';
			}

			if ($fr['fform'] == 'ubbeditor') {
				$ubbeditorf .= $fr['f'] . ',';
			}

			if ($fr['adddofun']) {
				$adddofunf .= $fr[f] . '!#!' . $fr[adddofun] . '||';
			}

			if ($fr['editdofun']) {
				$editdofunf .= $fr[f] . '!#!' . $fr[editdofun] . '||';
			}

			if ($fr['qadddofun']) {
				$qadddofunf .= $fr[f] . '!#!' . $fr[qadddofun] . '||';
			}

			if ($fr['qeditdofun']) {
				$qeditdofunf .= $fr[f] . '!#!' . $fr[qeditdofun] . '||';
			}
		}

		$tr = $empire->fetch1('select * from ' . $dbtbpre . 'enewstable where tid=\'' . $mr['tid'] . '\'');
		$mods .= '$emod_r[' . $mr[mid] . ']=Array(\'mid\'=>' . $mr[mid] . ',' . "\r\n" . '\'mname\'=>\'' . addslashes($mr[mname]) . '\',' . "\r\n" . '\'qmname\'=>\'' . addslashes($mr[qmname]) . '\',' . "\r\n" . '\'defaulttb\'=>' . $tr[isdefault] . ',' . "\r\n" . '\'datatbs\'=>\'' . addslashes($tr[datatbs]) . '\',' . "\r\n" . '\'deftb\'=>\'' . addslashes($tr[deftb]) . '\',' . "\r\n" . '\'enter\'=>\'' . addslashes($enter) . '\',' . "\r\n" . '\'qenter\'=>\'' . addslashes($qenter) . '\',' . "\r\n" . '\'listtempf\'=>\'' . addslashes($listtempf) . '\',' . "\r\n" . '\'tempf\'=>\'' . addslashes($texttempf) . '\',' . "\r\n" . '\'mustqenterf\'=>\'' . addslashes($mr[mustqenterf]) . '\',' . "\r\n" . '\'listandf\'=>\'' . addslashes($mr[listandf]) . '\',' . "\r\n" . '\'setandf\'=>' . $mr[setandf] . ',' . "\r\n" . '\'searchvar\'=>\'' . addslashes($mr[searchvar]) . '\',' . "\r\n" . '\'cj\'=>\'' . addslashes($cj) . '\',' . "\r\n" . '\'canaddf\'=>\'' . addslashes($mr[canaddf]) . '\',' . "\r\n" . '\'caneditf\'=>\'' . addslashes($mr[caneditf]) . '\',' . "\r\n" . '\'tbmainf\'=>\'' . addslashes($mainf) . '\',' . "\r\n" . '\'tbdataf\'=>\'' . addslashes($dataf) . '\',' . "\r\n" . '\'tobrf\'=>\'' . addslashes($tobrf) . '\',' . "\r\n" . '\'dohtmlf\'=>\'' . addslashes($dohtmlf) . '\',' . "\r\n" . '\'checkboxf\'=>\'' . addslashes($checkboxf) . '\',' . "\r\n" . '\'savetxtf\'=>\'' . addslashes($savetxtf) . '\',' . "\r\n" . '\'editorf\'=>\'' . addslashes($editorf) . '\',' . "\r\n" . '\'ubbeditorf\'=>\'' . addslashes($ubbeditorf) . '\',' . "\r\n" . '\'pagef\'=>\'' . addslashes($pagef) . '\',' . "\r\n" . '\'smalltextf\'=>\'' . addslashes($smalltextf) . '\',' . "\r\n" . '\'filef\'=>\'' . addslashes($filef) . '\',' . "\r\n" . '\'imgf\'=>\'' . addslashes($imgf) . '\',' . "\r\n" . '\'flashf\'=>\'' . addslashes($flashf) . '\',' . "\r\n" . '\'linkfields\'=>\'' . addslashes($linkfields) . '\',' . "\r\n" . '\'morevaluef\'=>\'' . addslashes($morevaluef) . '\',' . "\r\n" . '\'onlyf\'=>\'' . addslashes($onlyf) . '\',' . "\r\n" . '\'adddofunf\'=>\'' . addslashes($adddofunf) . '\',' . "\r\n" . '\'editdofunf\'=>\'' . addslashes($editdofunf) . '\',' . "\r\n" . '\'qadddofunf\'=>\'' . addslashes($qadddofunf) . '\',' . "\r\n" . '\'qeditdofunf\'=>\'' . addslashes($qeditdofunf) . '\',' . "\r\n" . '\'definfovoteid\'=>' . $mr[definfovoteid] . ',' . "\r\n" . '\'orderf\'=>\'' . addslashes($mr[orderf]) . '\',' . "\r\n" . '\'sonclass\'=>\'' . addslashes($mr[sonclass]) . '\',' . "\r\n" . '\'tid\'=>' . $mr[tid] . ',' . "\r\n" . '\'tbname\'=>\'' . addslashes($mr[tbname]) . '\');' . "\r\n" . '';
	}

	$mods = '' . "\r\n" . '' . "\r\n" . '$emod_pubr=Array(\'linkfields\'=>\'' . addslashes($alllinkfields) . '\');' . "\r\n" . '' . "\r\n" . '$etable_r=array();' . "\r\n" . '' . $tables . '' . "\r\n" . '' . "\r\n" . '$emod_r=array();' . "\r\n" . '' . $mods . '' . "\r\n" . '' . "\r\n" . '';
	return $mods;
}

function GetMemberLevel()
{
	global $empire;
	global $dbtbpre;
	$file = eReturnTrueEcmsPath() . 'e/data/dbcache/MemberLevel.php';
	$sql = $empire->query('select * from ' . $dbtbpre . 'enewsmembergroup order by groupid');

	while ($r = $empire->fetch($sql)) {
		$levels .= '$level_r[' . $r[groupid] . ']=Array(\'groupid\'=>' . $r[groupid] . ',' . "\r\n" . '\'groupname\'=>\'' . addslashes($r[groupname]) . '\',' . "\r\n" . '\'level\'=>' . $r[level] . ',' . "\r\n" . '\'checked\'=>' . $r[checked] . ',' . "\r\n" . '\'favanum\'=>' . $r[favanum] . ',' . "\r\n" . '\'daydown\'=>' . $r[daydown] . ',' . "\r\n" . '\'msglen\'=>' . $r[msglen] . ',' . "\r\n" . '\'regchecked\'=>' . $r[regchecked] . ',' . "\r\n" . '\'spacestyleid\'=>' . $r[spacestyleid] . ',' . "\r\n" . '\'dayaddinfo\'=>' . $r[dayaddinfo] . ',' . "\r\n" . '\'infochecked\'=>' . $r[infochecked] . ',' . "\r\n" . '\'plchecked\'=>' . $r[plchecked] . ',' . "\r\n" . '\'msgnum\'=>' . $r[msgnum] . ');' . "\r\n" . '';
	}

	$levels = '<?php' . "\r\n" . '//level' . "\r\n" . '$level_r=array();' . "\r\n" . '' . $levels . '' . "\r\n" . '//level' . "\r\n" . '?>';
	WriteFiletext_n($file, $levels);
}

function GetYh()
{
	global $empire;
	global $dbtbpre;
	$sql = $empire->query('select * from ' . $dbtbpre . 'enewsyh');

	while ($r = $empire->fetch($sql)) {
		$yhs .= '$eyh_r[' . $r[id] . ']=Array(\'id\'=>' . $r[id] . ',' . "\r\n" . '\'hlist\'=>' . $r[hlist] . ',' . "\r\n" . '\'qlist\'=>' . $r[qlist] . ',' . "\r\n" . '\'bqnew\'=>' . $r[bqnew] . ',' . "\r\n" . '\'bqhot\'=>' . $r[bqhot] . ',' . "\r\n" . '\'bqpl\'=>' . $r[bqpl] . ',' . "\r\n" . '\'bqgood\'=>' . $r[bqgood] . ',' . "\r\n" . '\'bqfirst\'=>' . $r[bqfirst] . ',' . "\r\n" . '\'qmlist\'=>' . $r[qmlist] . ',' . "\r\n" . '\'dobq\'=>' . $r[dobq] . ',' . "\r\n" . '\'dojs\'=>' . $r[dojs] . ',' . "\r\n" . '\'dosbq\'=>' . $r[dosbq] . ',' . "\r\n" . '\'rehtml\'=>' . $r[rehtml] . ',' . "\r\n" . '\'otherlink\'=>' . $r[otherlink] . ',' . "\r\n" . '\'bqdown\'=>' . $r[bqdown] . ');' . "\r\n" . '';
	}

	$yhs = "\r\n" . $yhs . "\r\n";
	return $yhs;
}

function ReturnEmptyFCache($f, $val, $isint = 0)
{
	$str = '';

	if ($val) {
		if ($isint) {
			$str = '\'' . $f . '\'=>' . $val . ',';
		}
		else {
			$str = '\'' . $f . '\'=>\'' . addslashes($val) . '\',';
		}
	}

	return $str;
}

function GetClass()
{
	global $empire;
	global $dbtbpre;
	$fileqz = eReturnTrueEcmsPath() . 'e/data/dbcache/';
	$filename = $fileqz . 'class.php';
	$line = 250;
	$num = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'enewsclass');
	$sql = $empire->query('select * from ' . $dbtbpre . 'enewsclass');
	$no = 0;
	$p = 0;
	$l = '';
	$mod = '';
	$modstr = ',';

	while ($r = $empire->fetch($sql)) {
		$no++;
		$l = '';

		if ($r[wburl]) {
			$l = ',' . "\r\n" . '\'wburl\'=>\'' . addslashes($r[wburl]) . '\'';
		}
		else if ($r[islast]) {
			if (empty($mod[$r[modid]])) {
				$mod[$r[modid]] = '|';
			}

			$mod[$r[modid]] .= $r[classid] . '|';

			if (!strstr($modstr, ',' . $r[modid] . ',')) {
				$modstr .= $r[modid] . ',';
			}

			$l = ',' . "\r\n" . '\'lencord\'=>' . $r[lencord] . ',' . returnemptyfcache('link_num', $r[link_num], 1) . '' . "\r\n" . '\'newstempid\'=>' . $r[newstempid] . ',' . "\r\n" . '\'listtempid\'=>' . $r[listtempid] . ',' . returnemptyfcache('pltempid', $r[pltempid], 1) . "\r\n" . returnemptyfcache('newspath', $r[newspath], 0) . returnemptyfcache('filename', $r[filename], 1) . '' . "\r\n" . '\'filetype\'=>\'' . addslashes($r[filetype]) . '\',' . returnemptyfcache('ipath', $r[ipath], 0) . "\r\n" . returnemptyfcache('openpl', $r[openpl], 1) . returnemptyfcache('openadd', $r[openadd], 1) . "\r\n" . returnemptyfcache('groupid', $r[groupid], 0) . returnemptyfcache('filename_qz', $r[filename_qz], 0) . '' . "\r\n" . '\'checked\'=>' . $r[checked] . ',' . returnemptyfcache('wfid', $r[wfid], 1) . '' . "\r\n" . '\'bname\'=>\'' . addslashes($r[bname]) . '\',' . returnemptyfcache('cgtoinfo', $r[cgtoinfo], 1) . "\r\n" . returnemptyfcache('showdt', $r[showdt], 1) . returnemptyfcache('checkpl', $r[checkpl], 1) . returnemptyfcache('keycid', $r[keycid], 1) . '' . "\r\n" . '\'reorder\'=>\'' . addslashes($r[reorder]) . '\'';
		}
		else {
			if (($r[islist] == 1) && empty($r[islast])) {
				$l = ',' . "\r\n" . '\'lencord\'=>' . $r[lencord] . ',' . "\r\n" . '\'reorder\'=>\'' . addslashes($r[reorder]) . '\',' . "\r\n" . '\'listtempid\'=>' . $r[listtempid];
			}
			else if ($r[listtempid]) {
				$l = ',' . "\r\n" . '\'lencord\'=>' . $r[lencord] . ',' . "\r\n" . '\'reorder\'=>\'' . addslashes($r[reorder]) . '\',' . "\r\n" . '\'listtempid\'=>' . $r[listtempid];
			}
		}

		if ($r[dtlisttempid]) {
			$l .= ',' . "\r\n" . '\'dtlisttempid\'=>' . $r[dtlisttempid];
		}

		$classes .= '$class_r[' . $r[classid] . ']=Array(\'classid\'=>' . $r[classid] . ',' . "\r\n" . '\'bclassid\'=>' . $r[bclassid] . ',' . "\r\n" . '\'classname\'=>\'' . addslashes($r[classname]) . '\',' . "\r\n" . '\'sonclass\'=>\'' . addslashes($r[sonclass]) . '\',' . "\r\n" . '\'featherclass\'=>\'' . addslashes($r[featherclass]) . '\',' . "\r\n" . '\'islast\'=>' . $r[islast] . ',' . "\r\n" . '\'classpath\'=>\'' . addslashes($r[classpath]) . '\',' . returnemptyfcache('searchtempid', $r[searchtempid], 1) . '' . "\r\n" . '\'classtype\'=>\'' . addslashes($r[classtype]) . '\',' . returnemptyfcache('classurl', $r[classurl], 0) . "\r\n" . returnemptyfcache('maxnum', $r[maxnum], 1) . returnemptyfcache('yhid', $r[yhid], 1) . '' . "\r\n" . '\'down_num\'=>' . $r[down_num] . ',' . "\r\n" . '\'online_num\'=>' . $r[online_num] . ',' . "\r\n" . '\'islist\'=>' . $r[islist] . ',' . returnemptyfcache('listdt', $r[listdt], 1) . '' . "\r\n" . '\'tid\'=>' . $r[tid] . ',' . "\r\n" . '\'tbname\'=>\'' . addslashes($r[tbname]) . '\',' . "\r\n" . '\'modid\'=>' . $r[modid] . $l . ');' . "\r\n" . '';
		if ((($no % $line) == 0) || ((($num % $line) != 0) && ($num == $no))) {
			$p++;
			$file = 'class' . $p . '.php';
			$include .= 'require(ECMS_PATH.\'e/data/dbcache/' . $file . '\');' . "\r\n" . '';
			$classes = '<?php' . "\r\n" . '' . $classes . '?>';
			WriteFiletext_n($fileqz . $file, $classes);
			$classes = '';
		}
	}

	$zsql = $empire->query('select * from ' . $dbtbpre . 'enewszt');
	$zt = '';
	$zfile = $fileqz . 'ztclass.php';

	while ($zr = $empire->fetch($zsql)) {
		$zt .= '$class_zr[' . $zr[ztid] . ']=Array(\'ztid\'=>' . $zr[ztid] . ',' . "\r\n" . '\'ztname\'=>\'' . addslashes($zr[ztname]) . '\',' . "\r\n" . '\'ztnum\'=>' . $zr[ztnum] . ',' . "\r\n" . '\'listtempid\'=>' . $zr[listtempid] . ',' . "\r\n" . '\'ztpath\'=>\'' . addslashes($zr[ztpath]) . '\',' . returnemptyfcache('pltempid', $r[pltempid], 1) . '' . "\r\n" . '\'zttype\'=>\'' . addslashes($zr[zttype]) . '\',' . returnemptyfcache('zturl', $zr[zturl], 0) . '' . "\r\n" . '\'islist\'=>' . $zr[islist] . ',' . returnemptyfcache('maxnum', $zr[maxnum], 1) . '' . "\r\n" . '\'reorder\'=>\'' . addslashes($zr[reorder]) . '\',' . returnemptyfcache('yhid', $zr[yhid], 1) . '' . "\r\n" . '\'tbname\'=>\'' . addslashes($zr[tbname]) . '\');' . "\r\n" . '';
	}

	$zt = '<?php' . "\r\n" . '' . $zt . GetTitleTypeCache() . '?>';
	WriteFiletext_n($zfile, $zt);
	$include .= 'require(ECMS_PATH.\'e/data/dbcache/ztclass.php\');' . "\r\n" . '';
	$include = '<?php' . "\r\n" . '' . addcheckviewcode() . '' . "\r\n" . '$class_r=array();' . "\r\n" . '$class_zr=array();' . "\r\n" . '$class_tr=array();' . "\r\n" . '$eyh_r=array();' . "\r\n" . '' . $include . "\r\n" . getyh() . '' . "\r\n" . '?>';
	WriteFiletext_n($filename, $include);
	$er = explode(',', $modstr);
	$i = 1;

	for (; $i < (count($er) - 1); $i++) {
		$mid = $er[$i];
		$usql = $empire->query('update ' . $dbtbpre . 'enewsmod set sonclass=\'' . $mod[$mid] . '\' where mid=\'' . $mid . '\'');
	}
}

function GetTitleTypeCache()
{
	global $empire;
	global $dbtbpre;
	$sql = $empire->query('select typeid,tname,mid,yhid,tpath,tid,tbname,listdt,ttype from ' . $dbtbpre . 'enewsinfotype');

	while ($r = $empire->fetch($sql)) {
		$string .= '$class_tr[' . $r[typeid] . ']=Array(\'typeid\'=>' . $r[typeid] . ',' . "\r\n" . '\'tname\'=>\'' . addslashes($r[tname]) . '\',' . "\r\n" . '\'tpath\'=>\'' . addslashes($r[tpath]) . '\',' . "\r\n" . '\'ttype\'=>\'' . addslashes($r[ttype]) . '\',' . "\r\n" . '\'yhid\'=>' . $r[yhid] . ',' . "\r\n" . '\'listdt\'=>' . $r[listdt] . ',' . "\r\n" . '\'tbname\'=>\'' . addslashes($r[tbname]) . '\',' . "\r\n" . '\'mid\'=>' . $r[mid] . ');' . "\r\n" . '';
	}

	return $string;
}

function GetSearchAllTb()
{
	global $empire;
	global $dbtbpre;
	$file = eReturnTrueEcmsPath() . 'e/data/dbcache/SearchAllTb.php';
	$sql = $empire->query('select tbname,titlefield,smalltextfield from ' . $dbtbpre . 'enewssearchall_load');

	while ($r = $empire->fetch($sql)) {
		$tbs .= '$schalltb_r[\'' . $r[tbname] . '\']=Array(\'tbname\'=>\'' . addslashes($r[tbname]) . '\',' . "\r\n" . '\'titlefield\'=>\'' . addslashes($r[titlefield]) . '\',' . "\r\n" . '\'smalltextfield\'=>\'' . addslashes($r[smalltextfield]) . '\');' . "\r\n" . '';
	}

	$tbs = '<?php' . "\r\n" . '//tbs' . "\r\n" . '$schalltb_r=array();' . "\r\n" . '' . $tbs . '' . "\r\n" . '//tbs' . "\r\n" . '?>';
	WriteFiletext_n($file, $tbs);
}

function GetMoreportCache()
{
	global $empire;
	global $dbtbpre;
	$sql = $empire->query('select * from ' . $dbtbpre . 'enewsmoreport');
	$i = 0;

	while ($r = $empire->fetch($sql)) {
		$i++;
		$moreports .= '$emoreport_r[\'' . $r[pid] . '\']=Array(\'pid\'=>\'' . $r[pid] . '\',' . "\r\n" . '\'pname\'=>\'' . addslashes($r[pname]) . '\',' . "\r\n" . '\'purl\'=>\'' . addslashes($r[purl]) . '\',' . "\r\n" . '\'ppath\'=>\'' . addslashes($r[ppath]) . '\',' . "\r\n" . '\'postpass\'=>\'' . addslashes($r[postpass]) . '\',' . "\r\n" . '\'postfile\'=>\'' . addslashes($r[postfile]) . '\',' . "\r\n" . '\'tempgid\'=>\'' . addslashes($r[tempgid]) . '\',' . "\r\n" . '\'isclose\'=>\'' . addslashes($r[isclose]) . '\',' . "\r\n" . '\'closeadd\'=>\'' . addslashes($r[closeadd]) . '\',' . "\r\n" . '\'mustdt\'=>\'' . $r[mustdt] . '\');' . "\r\n" . '';
	}

	if (1 < $i) {
		$moreports = '' . "\r\n" . '//moreports' . "\r\n" . '$emoreport_r=array();' . "\r\n" . '' . $moreports . '' . "\r\n" . '//moreports' . "\r\n" . '';
	}
	else {
		$moreports = '' . "\r\n" . '//moreports' . "\r\n" . '$emoreport_r=array();' . "\r\n" . '//moreports' . "\r\n" . '';
	}

	return $moreports;
}

function Moreport_UpdateIsclose()
{
	global $empire;
	global $dbtbpre;
	global $public_r;
	$num = $empire->gettotal('select count(*) as total from ' . $dbtbpre . 'enewsmoreport where isclose=0');

	if (1 < $num) {
		$purl = addslashes($public_r['newsurl']);
		$ppath = addslashes(ReturnAbsEcmsPath());
		$postpass = make_password(60);
		$empire->query('update ' . $dbtbpre . 'enewsmoreport set purl=\'' . $purl . '\',ppath=\'' . $ppath . '\',postpass=\'' . $postpass . '\' where pid=1');
	}
	else {
		$postpass = make_password(60);
		$empire->query('update ' . $dbtbpre . 'enewsmoreport set purl=\'\',ppath=\'\',postpass=\'' . $postpass . '\' where pid=1');
	}

	return $num;
}

function Moreport_CheckAdminIsMain()
{
	global $ecms_config;

	if (1 < $ecms_config['sets']['selfmoreportid']) {
		printerror('NotMainMoreport', 'history.go(-1)');
	}
}

define('InEmpireCMSHfun', true);
$Authorization = explode('.', $_SERVER['SERVER_NAME']);
$Authorization = $Authorization[count($Authorization) - 2] . '.' . $Authorization[count($Authorization) - 1];

if ($Authorization !== 'bbs.52jscn.com') {
	function GetListTemp($tempid)
	{
		global $empire;
		$r = $empire->fetch1('select temptext,subnews,listvar,rownum,showdate,modid,subtitle,docode from ' . GetTemptb('enewslisttemp') . ' where tempid=\'' . $tempid . '\'');
		$r[temptext] = InfoNewsBq('list' . $tempid, $r[temptext]);
		return $r;
	}
	function GetClassTemp($tempid)
	{
		global $empire;
		$r = $empire->fetch1('select temptext from ' . GetTemptb('enewsclasstemp') . ' where tempid=\'' . $tempid . '\'');
		return $r['temptext'];
	}
	function GetClassText($classid)
	{
		global $empire;
		global $dbtbpre;
		$r = $empire->fetch1('select classtext from ' . $dbtbpre . 'enewsclassadd where classid=\'' . $classid . '\'');
		return $r['classtext'];
	}
	function GetZtText($ztid)
	{
		global $empire;
		global $dbtbpre;
		$r = $empire->fetch1('select classtext from ' . $dbtbpre . 'enewsztadd where ztid=\'' . $ztid . '\'');
		return $r['classtext'];
	}
	function GetZtcText($cid)
	{
		global $empire;
		global $dbtbpre;
		$r = $empire->fetch1('select classtext from ' . $dbtbpre . 'enewszttypeadd where cid=\'' . $cid . '\'');
		return $r['classtext'];
	}
	function GetIndextemp()
	{
		global $empire;
		global $dbtbpre;
		global $public_r;

		if ($public_r['indexpageid']) {
			$r = $empire->fetch1('select temptext from ' . $dbtbpre . 'enewsindexpage where tempid=\'' . $public_r['indexpageid'] . '\'');
			return $r['temptext'];
		}

		$r = $empire->fetch1('select indextemp from ' . GetTemptb('enewspubtemp') . ' limit 1');
		return $r['indextemp'];
	}
	function GetNewsTemp($newstempid)
	{
		global $empire;
		global $public_r;
		$r = $empire->fetch1('select temptext,showdate from ' . GetTemptb('enewsnewstemp') . ' where tempid=\'' . $newstempid . '\'');
		$r[temptext] = InfoNewsBq('news' . $newstempid, $r[temptext]);

		if ($public_r[opennotcj]) {
			$r[temptext] = ReturnNotcj($r[temptext]);
		}

		return $r;
	}
	function GetTheJstemp($tempid)
	{
		global $empire;
		$r = $empire->fetch1('select temptext,showdate,modid,subnews,subtitle from ' . GetTemptb('enewsjstemp') . ' where tempid=\'' . $tempid . '\'');
		return $r;
	}
}
else {
	echo '<h3 style="color:#f00;display:block;">您访问的域名未获授权！</h3>';
}

?>
