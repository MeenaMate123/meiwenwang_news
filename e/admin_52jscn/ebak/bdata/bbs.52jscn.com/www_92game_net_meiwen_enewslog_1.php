<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewslog`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewslog` (
  `loginid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `logintime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `loginip` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(30) NOT NULL DEFAULT '',
  `loginauth` tinyint(1) NOT NULL DEFAULT '0',
  `ipport` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`loginid`),
  KEY `status` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewslog` values('1','admin','2015-07-01 17:24:22','127.0.0.1','1','','0','56784');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('2','admin','2015-07-01 20:56:50','127.0.0.1','1','','0','49684');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('3','admin','2015-07-02 14:15:22','127.0.0.1','1','','0','49520');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('4','admin','2015-07-02 22:15:29','127.0.0.1','1','','0','50610');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('5','admin','2015-07-03 15:54:45','127.0.0.1','1','','0','51464');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('6','admin','2015-07-03 21:37:05','127.0.0.1','1','','0','49424');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('7','admin','2015-07-04 15:58:01','127.0.0.1','1','','0','49955');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('8','admin','2015-07-04 21:51:59','127.0.0.1','1','','0','50525');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('9','admin','2015-07-05 23:05:23','127.0.0.1','1','','0','49672');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('10','admin','2015-07-06 14:17:05','127.0.0.1','1','','0','49419');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('11','admin','2015-07-06 21:57:52','127.0.0.1','1','','0','49578');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('12','admin','2015-07-07 05:08:23','127.0.0.1','1','','0','55896');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('13','admin','2015-07-07 05:25:26','127.0.0.1','1','','0','56615');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('14','admin','2017-01-06 21:27:34','127.0.0.1','1','','0','1987');");
E_D("replace into `www_92game_net_meiwen_enewslog` values('15','admin','2017-01-06 21:44:39','127.0.0.1','1','','0','1987');");

@include("../../inc/footer.php");
?>