<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewsmemberform`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewsmemberform` (
  `fid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(60) NOT NULL DEFAULT '',
  `ftemp` mediumtext NOT NULL,
  `fzs` varchar(255) NOT NULL DEFAULT '',
  `enter` text NOT NULL,
  `mustenter` text NOT NULL,
  `filef` varchar(255) NOT NULL DEFAULT '',
  `imgf` varchar(255) NOT NULL DEFAULT '0',
  `tobrf` text NOT NULL,
  `viewenter` text NOT NULL,
  `searchvar` varchar(255) NOT NULL DEFAULT '',
  `canaddf` text NOT NULL,
  `caneditf` text NOT NULL,
  `checkboxf` text NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewsmemberform` values('1','个人注册表单','<tr bgcolor=\\\\''F7FDF0\\\\''><td align=\\\\\"right\\\\\">作者笔名：</td><td>[!--truename--]</td></tr>\r\n<tr><td align=\\\\\"right\\\\\">性别：</td><td class=\\\\\"radio\\\\\">[!--sex--]</td></tr>\r\n<tr bgcolor=\\\\''F7FDF0\\\\''><td align=\\\\\"right\\\\\">QQ号码：</td><td>[!--oicq--]</td></tr>\r\n<tr><td align=\\\\\"right\\\\\">手机：</td><td>[!--phone--]</td></tr>\r\n<tr bgcolor=\\\\''F7FDF0\\\\''><td align=\\\\\"right\\\\\">交友宣言：</td><td>[!--saytext--]</td></tr>','','会员头像<!--field--->userpic<!--record-->作者笔名<!--field--->truename<!--record-->性别<!--field--->sex<!--record-->QQ号码<!--field--->oicq<!--record-->手机<!--field--->phone<!--record-->简介<!--field--->saytext<!--record-->','',',',',userpic,',',','会员头像<!--field--->userpic<!--record-->作者笔名<!--field--->truename<!--record-->性别<!--field--->sex<!--record-->QQ号码<!--field--->oicq<!--record-->手机<!--field--->phone<!--record-->简介<!--field--->saytext<!--record-->','',',userpic,truename,sex,oicq,phone,saytext,',',userpic,truename,sex,oicq,phone,saytext,',',');");
E_D("replace into `www_92game_net_meiwen_enewsmemberform` values('2','企员注册表单','<table width=''100%'' align=''center'' cellpadding=3 cellspacing=1 bgcolor=''#DBEAF5''><tr><td width=''25%'' height=25 bgcolor=''ffffff''>公司名称</td><td bgcolor=''ffffff''>[!--company--](*)</td></tr><tr><td width=''16%'' height=25 bgcolor=''ffffff''>联系人</td><td bgcolor=''ffffff''>[!--truename--](*)</td></tr><tr><td width=''16%'' height=25 bgcolor=''ffffff''>联系电话</td><td bgcolor=''ffffff''>[!--mycall--](*)</td></tr><tr><td width=''16%'' height=25 bgcolor=''ffffff''>传真</td><td bgcolor=''ffffff''>[!--fax--]</td></tr><tr><td width=''16%'' height=25 bgcolor=''ffffff''>手机</td><td bgcolor=''ffffff''>[!--phone--]</td></tr><tr><td width=''16%'' height=25 bgcolor=''ffffff''>QQ号码</td><td bgcolor=''ffffff''>[!--oicq--]</td></tr><tr><td width=''16%'' height=25 bgcolor=''ffffff''>MSN</td><td bgcolor=''ffffff''>[!--msn--]</td></tr><tr><td width=''16%'' height=25 bgcolor=''ffffff''>网址</td><td bgcolor=''ffffff''>[!--homepage--]</td></tr>\r\n<tr><td width=''16%'' height=25 bgcolor=''ffffff''>会员头像</td><td bgcolor=''ffffff''>[!--userpic--]</td></tr>\r\n<tr><td width=''16%'' height=25 bgcolor=''ffffff''>联系地址</td><td bgcolor=''ffffff''>[!--address--]&nbsp;邮编: [!--zip--]</td></tr><tr><td width=''16%'' height=25 bgcolor=''ffffff''>公司介绍</td><td bgcolor=''ffffff''>[!--saytext--]</td></tr></table>','','会员头像<!--field--->userpic<!--record-->联系人<!--field--->truename<!--record-->性别<!--field--->sex<!--record-->QQ号码<!--field--->oicq<!--record-->手机<!--field--->phone<!--record-->公司介绍<!--field--->saytext<!--record-->','',',',',userpic,',',saytext,','会员头像<!--field--->userpic<!--record-->联系人<!--field--->truename<!--record-->性别<!--field--->sex<!--record-->QQ号码<!--field--->oicq<!--record-->手机<!--field--->phone<!--record-->公司介绍<!--field--->saytext<!--record-->',',truename,',',userpic,truename,sex,oicq,phone,saytext,',',userpic,truename,sex,oicq,phone,saytext,',',');");

@include("../../inc/footer.php");
?>