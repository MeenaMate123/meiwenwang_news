<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewsuserlist`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewsuserlist` (
  `listid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `listname` varchar(60) NOT NULL DEFAULT '',
  `pagetitle` varchar(120) NOT NULL DEFAULT '',
  `filepath` varchar(120) NOT NULL DEFAULT '',
  `filetype` varchar(12) NOT NULL DEFAULT '',
  `totalsql` text NOT NULL,
  `listsql` text NOT NULL,
  `maxnum` int(11) NOT NULL DEFAULT '0',
  `lencord` int(11) NOT NULL DEFAULT '0',
  `listtempid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `pagekeywords` varchar(255) NOT NULL DEFAULT '',
  `pagedescription` varchar(255) NOT NULL DEFAULT '',
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`listid`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewsuserlist` values('1','最新100条','最新100条美文_最新图文_图文列表_美图看看_','../../new/','.html','select count(*) as total from [!db.pre!]ecms_news','select * from [!db.pre!]ecms_news  order by id desc','100','20','3','美图心语,最新图文,图文列表,美图看看,图文并茂','本栏目为您提供全站最新图文资讯第一时间供让读者浏览欣赏，一张图片，一句话，一个故事搭配小清新美图。','0');");
E_D("replace into `www_92game_net_meiwen_enewsuserlist` values('2','美图心语','美图心语_最新图文_图文列表_美图看看_','../../pic/','.html','select count(*) as total from [!db.pre!]ecms_news  where titlepic!=''''','select * from [!db.pre!]ecms_news where titlepic!='''' order by id desc','160','32','2','美图心语,最新图文,图文列表,美图看看,图文并茂','本栏目为您提供全站最新图文资讯第一时间供让读者浏览欣赏，一张图片，一句话，一个故事搭配小清新美图。','0');");

@include("../../inc/footer.php");
?>