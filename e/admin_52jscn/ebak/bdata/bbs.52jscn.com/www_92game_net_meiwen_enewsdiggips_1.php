<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewsdiggips`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewsdiggips` (
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `ips` mediumtext NOT NULL,
  KEY `classid` (`classid`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3021',',127.0.0.1,');");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3020',',127.0.0.1,');");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3022',',127.0.0.1,');");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3023',',127.0.0.1,');");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3015',',127.0.0.1,');");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3001',',127.0.0.1,');");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3002',',127.0.0.1,');");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3010',',127.0.0.1,');");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3011',',127.0.0.1,');");
E_D("replace into `www_92game_net_meiwen_enewsdiggips` values('10','3012',',127.0.0.1,');");

@include("../../inc/footer.php");
?>