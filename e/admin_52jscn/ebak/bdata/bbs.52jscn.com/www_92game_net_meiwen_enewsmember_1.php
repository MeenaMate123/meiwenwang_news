<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewsmember`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewsmember` (
  `userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `rnd` char(20) NOT NULL DEFAULT '',
  `email` char(50) NOT NULL DEFAULT '',
  `registertime` int(10) unsigned NOT NULL DEFAULT '0',
  `groupid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `userfen` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `userdate` int(10) unsigned NOT NULL DEFAULT '0',
  `money` float(11,2) NOT NULL DEFAULT '0.00',
  `zgroupid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `havemsg` tinyint(1) NOT NULL DEFAULT '0',
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `salt` char(8) NOT NULL DEFAULT '',
  `userkey` char(12) NOT NULL DEFAULT '',
  `qqopenid` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  KEY `groupid` (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewsmember` values('1','succi','6586b2a61fb1eaed6c1425ea2d0a33a6','RAg5H5710G36M3VVDlpS','succi@qq.com','1435774970','1','80','0','0.00','0','0','1','ilIWCQ','UhpG7UUMpJIT',NULL);");
E_D("replace into `www_92game_net_meiwen_enewsmember` values('2','ikaimi','882519d827c28106da392e2092939165','M6j9MXahygK7ie415FS8','75250078@qq.com','1435775000','1','50','0','0.00','0','0','1','DdR5dq','v3pS2QUYc9nf',NULL);");
E_D("replace into `www_92game_net_meiwen_enewsmember` values('3','itban','6fa0d2caa5048ed535a9e1a2763cf6c1','PIsvko8NM1XsYWUD3P2c','ikaimi@qq.com','1435939896','1','0','0','0.00','0','0','1','NuhQmZ','RgdxSKol9eEL',NULL);");
E_D("replace into `www_92game_net_meiwen_enewsmember` values('4','05532','aa441c1d001f9f33282ab463a5ae8806','OFuEHsaxgKa4RDrbP9Qd','487878913@qq.com','1435940633','1','0','0','0.00','0','0','1','WU2iTq','IUsUSU57s0of',NULL);");

@include("../../inc/footer.php");
?>