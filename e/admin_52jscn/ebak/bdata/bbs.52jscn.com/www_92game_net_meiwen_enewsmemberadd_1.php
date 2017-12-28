<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewsmemberadd`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewsmemberadd` (
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `truename` varchar(20) NOT NULL DEFAULT '',
  `oicq` varchar(25) NOT NULL DEFAULT '',
  `phone` varchar(30) NOT NULL DEFAULT '',
  `spacestyleid` smallint(6) NOT NULL DEFAULT '0',
  `saytext` text NOT NULL,
  `userpic` varchar(200) NOT NULL DEFAULT '',
  `spacename` varchar(255) NOT NULL DEFAULT '',
  `spacegg` text NOT NULL,
  `viewstats` int(11) NOT NULL DEFAULT '0',
  `regip` varchar(20) NOT NULL DEFAULT '',
  `lasttime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastip` varchar(20) NOT NULL DEFAULT '',
  `loginnum` int(10) unsigned NOT NULL DEFAULT '0',
  `regipport` varchar(6) NOT NULL DEFAULT '',
  `lastipport` varchar(6) NOT NULL DEFAULT '',
  `sex` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewsmemberadd` values('1','succi','','','1','简介简介简介简介','/d/file/p/20150704/686005e53684b83cb46f91001316efb3.png','','','7','127.0.0.1','1436047169','127.0.0.1','26','59971','52556','2');");
E_D("replace into `www_92game_net_meiwen_enewsmemberadd` values('2','','','','1','','/d/file/p/20150702/51887bbce9b3ecd4a70e0e00dace64f8.jpg','','','4','127.0.0.1','1435951305','127.0.0.1','10','59990','60116','0');");
E_D("replace into `www_92game_net_meiwen_enewsmemberadd` values('3','itban','','','1','','','','','1','127.0.0.1','1435939896','127.0.0.1','1','52441','52441','1');");
E_D("replace into `www_92game_net_meiwen_enewsmemberadd` values('4','05532','','','1','','','','','5','127.0.0.1','1436046426','127.0.0.1','2','52602','52602','1');");

@include("../../inc/footer.php");
?>