<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewshy`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewshy` (
  `fid` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0',
  `fname` varchar(30) NOT NULL DEFAULT '',
  `cid` int(11) NOT NULL DEFAULT '0',
  `fsay` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`),
  KEY `userid` (`userid`),
  KEY `cid` (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewshy` values('1','2','succi','0','');");
E_D("replace into `www_92game_net_meiwen_enewshy` values('2','1','ikaimi','0','');");
E_D("replace into `www_92game_net_meiwen_enewshy` values('3','1','05532','0','');");

@include("../../inc/footer.php");
?>