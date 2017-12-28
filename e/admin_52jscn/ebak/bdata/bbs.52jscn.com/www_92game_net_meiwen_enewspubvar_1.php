<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewspubvar`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewspubvar` (
  `varid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `myvar` varchar(60) NOT NULL DEFAULT '',
  `varname` varchar(20) NOT NULL DEFAULT '',
  `varvalue` text NOT NULL,
  `varsay` varchar(255) NOT NULL DEFAULT '',
  `myorder` smallint(5) unsigned NOT NULL DEFAULT '0',
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `tocache` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`varid`),
  UNIQUE KEY `varname` (`varname`),
  KEY `classid` (`classid`),
  KEY `tocache` (`tocache`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('1','www_92game_net_phone','手机版域名','http://m.demo.52jscn.com/','http://开头，用/结尾','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('2','www_92game_net_name','网站简称','美文网','','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('3','www_92game_net_qq','QQ在线客服','278869155','','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('4','www_92game_net_xlwb','新浪微博URL','http://替换为你的微博网址','','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('5','www_92game_net_txwb','腾讯微博URL','http://替换为你的微博网址','','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('6','www_92game_net_qqkj','QQ空间URL','http://替换为你的QQ空间网址','','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('7','www_92game_net_ltxt','友情链接说明','链接合作要求：美文，文章，小说，文学等内容相关类网站（联系QQ：8888888）','','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('8','www_92game_net_domain','网站主域名','demo.52jscn.com','不含http://开头，不带/结尾','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('9','www_92game_net_by','版权信息','Copyright &copy; 2014-2015 <a href=''http://www.meiwen.com.cn'' title=''05532美图'' target=''_blank''>05532.com</a> All Rights Reserved. \r\n <a href=''http://www.miibeian.gov.cn/'' target=''_blank''>粤ICP备15019708号-4</a>','内容不含\" 双引号 \"','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('10','www_92game_net_mp3','会员空间音乐盒','http://www.xiami.com/widget/23989705_1771389941,2052971,146291,2118501,136063,388365,359,_229_300_94DCAC_86c89c_1/multiPlayer.swf','填写音乐盒URL','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('11','www_92game_net_mobile_pd','手机版频道栏目静态','\$classid==1,2,3,4,5,6,7,8,9','多个栏目用,隔开。参考\$classid==1,2,3,4,5,6','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('12','www_92game_net_cy_id','畅言评论ID','cyrIiB2Xt','','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('13','www_92game_net_cy_key','畅言评论KEY','89d2e1e34e8a801f5cc5478bfccd44c4','修改后点击刷新自定义单页','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('14','www_92game_net_qqid','QQ登录ID','214744','','0','0','1');");
E_D("replace into `www_92game_net_meiwen_enewspubvar` values('15','www_92game_net_qqkey','QQ登录KEY','8410e36088908df41bddf36e41f5a2b4','','0','0','1');");

@include("../../inc/footer.php");
?>