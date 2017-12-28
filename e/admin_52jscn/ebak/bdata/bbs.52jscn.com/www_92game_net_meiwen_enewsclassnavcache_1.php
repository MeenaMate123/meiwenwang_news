<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewsclassnavcache`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewsclassnavcache` (
  `navtype` char(16) NOT NULL DEFAULT '',
  `userid` int(10) unsigned NOT NULL DEFAULT '0',
  `modid` smallint(5) unsigned NOT NULL DEFAULT '0',
  KEY `navtype` (`navtype`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewsclassnavcache` values('listclass','0','0');");
E_D("replace into `www_92game_net_meiwen_enewsclassnavcache` values('listenews','0','0');");
E_D("replace into `www_92game_net_meiwen_enewsclassnavcache` values('jsclass','0','0');");
E_D("replace into `www_92game_net_meiwen_enewsclassnavcache` values('modclass','0','1');");

@include("../../inc/footer.php");
?>