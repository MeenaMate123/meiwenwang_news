<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewssearchtemp`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewssearchtemp` (
  `tempid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `tempname` varchar(60) NOT NULL DEFAULT '',
  `temptext` mediumtext NOT NULL,
  `subnews` smallint(6) NOT NULL DEFAULT '0',
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  `listvar` text NOT NULL,
  `rownum` smallint(6) NOT NULL DEFAULT '0',
  `modid` smallint(6) NOT NULL DEFAULT '0',
  `showdate` varchar(50) NOT NULL DEFAULT '',
  `subtitle` smallint(6) NOT NULL DEFAULT '0',
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `docode` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tempid`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewssearchtemp` values('1','美文搜索','<!DOCTYPE html PUBLIC \\\\\"-//W3C//DTD XHTML 1.0 Transitional//EN\\\\\" \\\\\"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\\\\\">\r\n<html xmlns=\\\\\"http://www.w3.org/1999/xhtml\\\\\">\r\n<head>\r\n<meta http-equiv=\\\\\"Content-Type\\\\\" content=\\\\\"text/html; charset=utf-8\\\\\" />\r\n<meta name=\\\\\"renderer\\\\\" content=\\\\\"webkit\\\\\">\r\n<meta http-equiv=\\\\\"X-UA-Compatible\\\\\" content=\\\\\"IE=Edge,chrome=1\\\\\" >\r\n<meta http-equiv=\\\\\"Cache-Control\\\\\" content=\\\\\"no-transform \\\\\" />\r\n		<title>搜索“[!--keyboard--]” 的结果</title>\r\n		<link href=\\\\\"/skin/css/solist.css\\\\\" rel=\\\\\"stylesheet\\\\\" type=\\\\\"text/css\\\\\"/>\r\n	</head>\r\n<body>\r\n<div id=\\\\\"wrap\\\\\" style=\\\\\"position: relative;\\\\\">\r\n<div id=\\\\\"head\\\\\">    \r\n    <div class=\\\\\"s_nav\\\\\">\r\n        <a href=\\\\\"/\\\\\" class=\\\\\"s_logo\\\\\">\r\n            <img src=\\\\\"/skin/img/alogo.png\\\\\" border=\\\\\"0\\\\\" id=\\\\\"logo\\\\\">\r\n        </a>\r\n            </div>\r\n        <div style=\\\\\"float:left;margin-top:12px\\\\\" class=\\\\\"ns\\\\\">\r\n		 <div class=\\\\\"nav-container clearfix\\\\\"> </div>\r\n		<form id=\\\\\"search_form\\\\\"  action=\\\\\"/e/search/index.php\\\\\" method=\\\\\"post\\\\\">\r\n        <span class=\\\\\"s_ipt_wr\\\\\" ><input type=\\\\\"text\\\\\" name=\\\\\"keyboard\\\\\" id=\\\\\"q\\\\\" class=\\\\\"s_ipt\\\\\" value=\\\\\"[!--keyboard--]\\\\\"></span>\r\n        <span class=\\\\\"s_btn_wr\\\\\"><input type=\\\\\"submit\\\\\" value=\\\\\"搜一下\\\\\" class=\\\\\"s_btn\\\\\" ></span>\r\n		<span class=\\\\\"s_sy\\\\\"> <a href=\\\\\"/\\\\\" >返回首页 >></a></span>\r\n        <input type=\\\\\"hidden\\\\\" name=\\\\\"show\\\\\" value=\\\\\"title,keyboard\\\\\" />\r\n        <input type=\\\\\"hidden\\\\\" name=\\\\\"tempid\\\\\" value=\\\\\"1\\\\\" /> \r\n        </form>\r\n</div>\r\n</div>\r\n<div class=\\\\\"cb-center\\\\\">\r\n<h2>搜索 “<strong>[!--keyboard--]</strong>” 的结果</h2>\r\n<span>找到相关结果[!--ecms.num--]条</span>\r\n</div>\r\n<div class=\\\\\"aside\\\\\">	\r\n<div id=\\\\\"float\\\\\"><div class=\\\\\"a250\\\\\"><script src=\\\\\"[!--news.url--]d/js/acmsd/thea5.js\\\\\"></script> </div></div>\r\n</div>\r\n<script type=\\\\\"text/javascript\\\\\" src=\\\\\"[!--news.url--]skin/js/scrollad.js\\\\\"></script>\r\n<div id=\\\\\"container\\\\\" class=\\\\\"clearfix\\\\\">\r\n				<div class=\\\\\"content\\\\\">\r\n					<div class=\\\\\"content-main\\\\\">\r\n                    	[!--empirenews.listtemp--]\r\n						<!--list.var1-->\r\n						[!--empirenews.listtemp--]															\r\n</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n<div id=\\\\\"footer\\\\\" class=\\\\\"clearfix\\\\\">\r\n<div id=\\\\\"BottomBox\\\\\">\r\n		<form id=\\\\\"search_form\\\\\"  action=\\\\\"/e/search/index.php\\\\\" method=\\\\\"post\\\\\">\r\n        <span class=\\\\\"s_ipt_wr\\\\\" ><input type=\\\\\"text\\\\\" name=\\\\\"keyboard\\\\\" id=\\\\\"q\\\\\" class=\\\\\"s_ipt\\\\\" value=\\\\\"[!--keyboard--]\\\\\"></span>\r\n        <span class=\\\\\"s_btn_wr\\\\\"><input type=\\\\\"submit\\\\\" value=\\\\\"搜一下\\\\\" class=\\\\\"s_btn\\\\\" ></span>\r\n		<span class=\\\\\"s_sy\\\\\"> <a href=\\\\\"/\\\\\" >返回首页 >></a></span>\r\n        <input type=\\\\\"hidden\\\\\" name=\\\\\"show\\\\\" value=\\\\\"title,keyboard\\\\\" />\r\n        <input type=\\\\\"hidden\\\\\" name=\\\\\"tempid\\\\\" value=\\\\\"1\\\\\" /> \r\n        </form>\r\n</div>\r\n				<div class=\\\\\"clearfix\\\\\">\r\n				 <div class=\\\\\"pages\\\\\"><div class=\\\\\"plist\\\\\">[!--show.page--]</div></div>\r\n				<span class=\\\\\"support-text\\\\\">找到相关结果[!--ecms.num--]个</span>\r\n				</div>\r\n</div>\r\n</body>\r\n</html>','120','1','if(\$r[titlepic]) { \$pic=\\\\''<div class=\\\\\"img\\\\\"> <a href=\\\\\"[!--titleurl--]\\\\\" target=\\\\\"_blank\\\\\"><img src=\\\\\"[!--titlepic--]\\\\\"></a></div>\\\\'';} \r\n\$listtemp=\\\\''\r\n<div class=\\\\\"result f\\\\\">\r\n    <h3><a href=\\\\\"[!--titleurl--]\\\\\" target=\\\\\"_blank\\\\\">[!--title--]</a></h3>\r\n    <div class=\\\\\"c-content\\\\\">\\\\''.\$pic.\\\\''\r\n      <div class=\\\\\"text\\\\\">  [!--smalltext--]...\r\n         <p>http://\\\\''.\$public_r[\\\\''add_www_92game_net_domain\\\\''].str_replace(array(\\\\\"\\\\\".\$public_r[\\\\''newsurl\\\\''].\\\\\"\\\\\"),array(\\\\\"/\\\\\"),\$r[titleurl]).\\\\'' - [!--newstime--] <a href=\\\\\"[!--this.classlink--]\\\\\" target=\\\\\"_blank\\\\\">[[!--this.classname--]]</a></p>\r\n	</div>\r\n   </div>\r\n</div>\r\n\\\\'';','1','1','Y-m-d','0','0','1');");

@include("../../inc/footer.php");
?>