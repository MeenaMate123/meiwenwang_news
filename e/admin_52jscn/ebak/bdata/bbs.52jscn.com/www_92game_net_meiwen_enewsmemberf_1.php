<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewsmemberf`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewsmemberf` (
  `fid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `f` varchar(30) NOT NULL DEFAULT '',
  `fname` varchar(30) NOT NULL DEFAULT '',
  `fform` varchar(20) NOT NULL DEFAULT '',
  `fhtml` mediumtext NOT NULL,
  `fzs` varchar(255) NOT NULL DEFAULT '',
  `myorder` smallint(6) NOT NULL DEFAULT '0',
  `ftype` varchar(30) NOT NULL DEFAULT '',
  `flen` varchar(20) NOT NULL DEFAULT '',
  `fvalue` text NOT NULL,
  `fformsize` varchar(12) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewsmemberf` values('1','truename','笔名昵称','text','<input name=\\\\\"truename\\\\\" type=\\\\\"text\\\\\" id=\\\\\"truename\\\\\" value=\\\\\"<?=\$ecmsfirstpost==1?\\\\\"\\\\\":htmlspecialchars(stripSlashes(\$addr[truename]))?>\\\\\">\r\n','','1','VARCHAR','20','','');");
E_D("replace into `www_92game_net_meiwen_enewsmemberf` values('2','oicq','QQ号码','text','<input name=\\\\\"oicq\\\\\" type=\\\\\"text\\\\\" id=\\\\\"oicq\\\\\" value=\\\\\"<?=\$ecmsfirstpost==1?\\\\\"\\\\\":htmlspecialchars(stripSlashes(\$addr[oicq]))?>\\\\\">\r\n','','3','VARCHAR','25','','');");
E_D("replace into `www_92game_net_meiwen_enewsmemberf` values('5','phone','手机','text','<input name=\\\\\"phone\\\\\" type=\\\\\"text\\\\\" id=\\\\\"phone\\\\\" value=\\\\\"<?=\$ecmsfirstpost==1?\\\\\"\\\\\":htmlspecialchars(stripSlashes(\$addr[phone]))?>\\\\\">\r\n','','4','VARCHAR','30','','');");
E_D("replace into `www_92game_net_meiwen_enewsmemberf` values('14','sex','性别','radio','<input name=\\\\\"sex\\\\\" type=\\\\\"radio\\\\\" value=\\\\\"1\\\\\"<?=\$addr[sex]==\\\\\"1\\\\\"||\$ecmsfirstpost==1?\\\\'' checked\\\\'':\\\\''\\\\''?>>男 &nbsp; &nbsp;<input name=\\\\\"sex\\\\\" type=\\\\\"radio\\\\\" value=\\\\\"2\\\\\"<?=\$addr[sex]==\\\\\"2\\\\\"?\\\\'' checked\\\\'':\\\\''\\\\''?>>女','','2','INT','1','1:default|2','');");
E_D("replace into `www_92game_net_meiwen_enewsmemberf` values('10','saytext','简介','text','\r\n<input name=\\\\\"saytext\\\\\" type=\\\\\"text\\\\\" id=\\\\\"saytext\\\\\" value=\\\\\"<?=\$ecmsfirstpost==1?\\\\\"\\\\\":ehtmlspecialchars(stripSlashes(\$addr[saytext]))?>\\\\\" size=\\\\\"\\\\\">\r\n','','5','TEXT','','','');");
E_D("replace into `www_92game_net_meiwen_enewsmemberf` values('13','userpic','会员头像','img','<input type=\\\\\"file\\\\\" name=\\\\\"userpicfile\\\\\">','','0','VARCHAR','200','','');");

@include("../../inc/footer.php");
?>