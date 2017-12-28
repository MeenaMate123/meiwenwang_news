<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewstask`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewstask` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `taskname` varchar(60) NOT NULL DEFAULT '',
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `isopen` tinyint(1) NOT NULL DEFAULT '0',
  `filename` varchar(60) NOT NULL DEFAULT '',
  `lastdo` int(10) unsigned NOT NULL DEFAULT '0',
  `doweek` char(1) NOT NULL DEFAULT '0',
  `doday` char(2) NOT NULL DEFAULT '0',
  `dohour` char(2) NOT NULL DEFAULT '0',
  `dominute` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewstask` values('1','每1小时刷新手机版栏目','0','1','mobilelist.php','0','*','*','*',',59,');");
E_D("replace into `www_92game_net_meiwen_enewstask` values('2','清空日访问量','0','1','del.rclick.php','0','*','*','23',',');");
E_D("replace into `www_92game_net_meiwen_enewstask` values('3','清空周访问量','0','1','del.zclick.php','0','1','*','*',',');");
E_D("replace into `www_92game_net_meiwen_enewstask` values('4','清空月访问量','0','1','del.yclick.php','0','*','1','*',',');");

@include("../../inc/footer.php");
?>