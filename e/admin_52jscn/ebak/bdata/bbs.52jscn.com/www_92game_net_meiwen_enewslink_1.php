<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewslink`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewslink` (
  `lid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `lname` varchar(100) NOT NULL DEFAULT '',
  `lpic` varchar(255) NOT NULL DEFAULT '',
  `lurl` varchar(255) NOT NULL DEFAULT '',
  `ltime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `onclick` int(11) NOT NULL DEFAULT '0',
  `width` varchar(10) NOT NULL DEFAULT '',
  `height` varchar(10) NOT NULL DEFAULT '',
  `target` varchar(10) NOT NULL DEFAULT '',
  `myorder` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(60) NOT NULL DEFAULT '',
  `lsay` text NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT '0',
  `ltype` smallint(6) NOT NULL DEFAULT '0',
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`lid`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewslink` values('1','05532性感美女','','http://www.05532.com/','2015-07-02 04:14:51','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `www_92game_net_meiwen_enewslink` values('2','IT头版头条','','http://www.itban.cn/','2015-07-02 04:15:09','0','88','31','_blank','0','','','1','0','1');");
E_D("replace into `www_92game_net_meiwen_enewslink` values('3','开米儿童网','','http://www.ikaimi.com/','2015-07-02 04:21:50','0','88','31','_blank','0','','','1','0','1');");

@include("../../inc/footer.php");
?>