<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewsmemberpub`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewsmemberpub` (
  `userid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `todayinfodate` char(10) NOT NULL DEFAULT '',
  `todayaddinfo` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `todaydate` char(10) NOT NULL DEFAULT '',
  `todaydown` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `authstr` char(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewsmemberpub` values('2','','0','','0','1435943169||1||H25tLxoFGFf0');");

@include("../../inc/footer.php");
?>