<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewssearch`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewssearch` (
  `searchid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `keyboard` varchar(255) NOT NULL DEFAULT '',
  `searchtime` int(10) unsigned NOT NULL DEFAULT '0',
  `searchclass` varchar(255) NOT NULL DEFAULT '',
  `result_num` int(10) unsigned NOT NULL DEFAULT '0',
  `searchip` varchar(20) NOT NULL DEFAULT '',
  `classid` varchar(255) NOT NULL DEFAULT '',
  `onclick` int(10) unsigned NOT NULL DEFAULT '0',
  `orderby` varchar(30) NOT NULL DEFAULT '0',
  `myorder` tinyint(1) NOT NULL DEFAULT '0',
  `checkpass` varchar(32) NOT NULL DEFAULT '',
  `tbname` varchar(60) NOT NULL DEFAULT '',
  `tempid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `iskey` tinyint(1) NOT NULL DEFAULT '0',
  `andsql` text NOT NULL,
  `trueclassid` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`searchid`),
  KEY `checkpass` (`checkpass`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewssearch` values('1','美文','1435910806','title,keyboard','398','127.0.0.1','','5','newstime','0','9ce20b2c732ab5297f5c34abddbe8560','news','1','0',' and ((title LIKE ''%美文%'') or (keyboard LIKE ''%美文%''))','0');");
E_D("replace into `www_92game_net_meiwen_enewssearch` values('2','旧时光里的牵念','1435910779','title,keyboard','1','127.0.0.1','','1','newstime','0','a1c5e3095e46c224ff06857819c5417a','news','1','0',' and ((title LIKE ''%旧时光里的牵念%'') or (keyboard LIKE ''%旧时光里的牵念%''))','0');");

@include("../../inc/footer.php");
?>