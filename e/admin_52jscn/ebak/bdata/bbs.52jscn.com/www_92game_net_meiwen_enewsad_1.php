<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewsad`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewsad` (
  `adid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `picurl` varchar(255) NOT NULL DEFAULT '',
  `url` text NOT NULL,
  `pic_width` int(10) unsigned NOT NULL DEFAULT '0',
  `pic_height` int(10) unsigned NOT NULL DEFAULT '0',
  `onclick` int(10) unsigned NOT NULL DEFAULT '0',
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `adtype` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `title` varchar(100) NOT NULL DEFAULT '',
  `target` varchar(10) NOT NULL DEFAULT '',
  `alt` varchar(120) NOT NULL DEFAULT '',
  `starttime` date NOT NULL DEFAULT '0000-00-00',
  `endtime` date NOT NULL DEFAULT '0000-00-00',
  `adsay` varchar(255) NOT NULL DEFAULT '',
  `titlefont` varchar(14) NOT NULL DEFAULT '',
  `titlecolor` varchar(10) NOT NULL DEFAULT '',
  `htmlcode` text NOT NULL,
  `t` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `ylink` tinyint(1) NOT NULL DEFAULT '0',
  `reptext` text NOT NULL,
  PRIMARY KEY (`adid`),
  KEY `classid` (`classid`),
  KEY `t` (`t`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewsad` values('1','','','468','60','0','1','1','全站通栏960x90（1）','','','2015-07-02','0000-00-00','','','','<div class=\"ad-960\"><a href=\"http://www.05532.com/\" target=\"_blank\"><img src=\"/d/a/96090-5.gif\"  width=\"960\"></a></div>','2','0','<div class=\"ad-960\"></div>');");
E_D("replace into `www_92game_net_meiwen_enewsad` values('2','','','468','60','0','1','1','全站通栏960x90（2）','','','2015-07-02','0000-00-00','','','','<div class=\"ad-960\"><a href=\"http://www.05532.com/\" target=\"_blank\"><img src=\"/d/a/96090-3.gif\"  width=\"960\"></a></div>','2','0','<div class=\"ad-960\"></div>');");
E_D("replace into `www_92game_net_meiwen_enewsad` values('3','','','468','60','0','1','1','全站通栏960x90（3）','','','2015-07-02','0000-00-00','','','','<div class=\"ad-960\"><a href=\"http://www.05532.com/\" target=\"_blank\"><img src=\"/d/a/96090-2.gif\"  width=\"960\"></a></div>','2','0','<div class=\"ad-960\"></div>');");
E_D("replace into `www_92game_net_meiwen_enewsad` values('4','','','468','60','0','1','1','全站通栏960x90（4）','','','2015-07-02','0000-00-00','','','','<div class=\"ad-960\"></div>','2','0','<div class=\"ad-960\"></div>');");
E_D("replace into `www_92game_net_meiwen_enewsad` values('5','','','468','60','0','1','1','内页右侧250x250','','','2015-07-02','0000-00-00','','','','内页右侧250x250','2','0','');");
E_D("replace into `www_92game_net_meiwen_enewsad` values('6','','','468','60','0','1','1','内容页300x300','','','2015-07-02','0000-00-00','','','','内容页300x300','2','0','该文档有缩略图时不显示');");
E_D("replace into `www_92game_net_meiwen_enewsad` values('7','','','468','60','0','1','1','内容页680x60','','','2015-07-03','0000-00-00','','','','内容页680x60','2','0','');");
E_D("replace into `www_92game_net_meiwen_enewsad` values('8','','','468','60','0','1','1','全站预留漂浮广告','','','2015-07-03','0000-00-00','','','','','2','0','');");
E_D("replace into `www_92game_net_meiwen_enewsad` values('9','','','468','60','0','1','1','手机版通栏广告（1）','','','2015-07-06','0000-00-00','','','','<center>手机版通栏广告（ID：9）</center>','2','0','');");

@include("../../inc/footer.php");
?>