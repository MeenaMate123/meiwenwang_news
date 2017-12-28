<?php
@include("../../inc/header.php");

/*
		SoftName : EmpireBak
		Author   : wm_chief
		Copyright: Powered by www.phome.net
*/

E_D("DROP TABLE IF EXISTS `www_92game_net_meiwen_enewspage`;");
E_C("CREATE TABLE `www_92game_net_meiwen_enewspage` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL DEFAULT '',
  `pagetext` mediumtext NOT NULL,
  `path` varchar(255) NOT NULL DEFAULT '',
  `classid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `pagetitle` varchar(120) NOT NULL DEFAULT '',
  `pagekeywords` varchar(255) NOT NULL DEFAULT '',
  `pagedescription` varchar(255) NOT NULL DEFAULT '',
  `tempid` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8");
E_D("replace into `www_92game_net_meiwen_enewspage` values('1','关于我们',' <p style=\\\\\"text-align:center\\\\\">\r\n	<img height=\\\\\"130\\\\\" src=\\\\\"/skin/img/aboutus_logo.png\\\\\"  /></p>\r\n<p>\r\n	<strong>网站简介</strong></p>\r\n<p>\r\n	本站LOGO结合了本站域名以及网站名称本站进行设计，采用自然界中常见的颜色<span style=\\\\\"color:#98CC08;\\\\\">绿色</span>，绿色是植物的颜色，在中国文化中有生命的含义，也是春季的象征；绿色不仅仅是由树木、花草构成的风景，绿色还代表和平、宁静、自然、环保、生命、成长、生机、希望、青春....</p>\r\n<p>\r\n	本站创办于2015年元月，属非商业无盈利性本站站。是一个以爱情、情感、心情、人生为主题的本站站，专业提供在线阅读欣赏，包括原创美文、伤感日志、情感故事、心情随笔、散文、诗歌、经典语句以及人生感悟、美文摘抄之类的精美文章。</p>\r\n<p>\r\n	在这里你可以欣赏到许多优美的散文，伤感的日志，经典的语句等网友原创经典美文；同时你也可以注册成为驻站作者，发表文章，书写日记，述说自己的心情故事等。</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>网站宗旨</strong></p>\r\n<p>\r\n	本站，是一个用语言和文字编织起来的美文网站，用自己的文字谱写着生活的点点滴滴，用文字让读者了解更多真实的情感和世间道理。</p>\r\n<p>\r\n	喜欢文字的人，喜欢把一份情怀寄托在那一段段的文字里，有点清高、有点孤傲，有点狂妄、有点忧郁；喜欢文字的人，很感性联想丰富，洞察力强，热爱生活；有时有很理性表面上很难接近、很矜持；可一旦你走进他们的世界，打开他们的心扉，你会看到一个真实而纯真、善良而孤独的心。</p>\r\n<p>\r\n	只是希望我们的文字可以打动更多的人，让人们享受文字的魅力，从文章中学会享受生活。这就是本站一直追逐着的信仰。请相信你就是一道风景线，我们鼓励每个人在这里发表作品。</p>\r\n<p>\r\n	分享是我们的追求，带给读者快乐是我们的使命。</p>\r\n<p>\r\n	本站，致力创造一个纯净唯美的本站站，为更多爱好书写文字，分享文字的网友提供一个学习，交流和展示才华的平台。请相信你就是一道风景线，我们鼓励每个人在这里发表作品。</p>\r\n<p>\r\n	&nbsp;</p>','../../about/aboutus.html','0','','','','1');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('2','服务条款','<p>\r\n	<strong>服务简介</strong><img align=\\\\\"right\\\\\" alt=\\\\\"服务条款\\\\\" height=\\\\\"275\\\\\" src=\\\\\"/skin/img/service.gif\\\\\" style=\\\\\"margin-left:10px;border: 1px solid #DDD;padding: 2px;\\\\\" title=\\\\\"免责条款\\\\\" width=\\\\\"290\\\\\" /></p>\r\n<p>\r\n	本站通过国际互联网为用户提供美文及文章浏览、图片浏览、网上留言和阅读点评等服务。</p>\r\n<p>\r\n	用户同意：</p>\r\n<p>\r\n	①向本站提供及时、详尽及准确的个人资料。</p>\r\n<p>\r\n	②不断更新注册资料，符合及时、详尽、准确的要求。所有原始键入的资料将引用为注册资料。</p>\r\n<p>\r\n	③用户同意遵守《中华人民共和国保守国家秘密法》、《中华人民共和国计算机信息系统安全保护条例》、《计算机软件保护条例》等有关计算机及互联网规定的法律和法规、实施办法。在任何情况下，本站合理地认为用户的行为可能违反上述法律、法规，本站可以在任何时候，不经事先通知终止向该用户提供服务。用户应了解国际互联网的无国界性，应特别注意遵守当地所有有关的法律和法规。</p>\r\n<p>\r\n	<strong>服务条款</strong></p>\r\n<p>\r\n	本网站用户服务的所有权和运作权归本站拥有。本站所提供的服务将按照有关章程、服务条款和操作规则严格执行。</p>\r\n<p>\r\n	访问者在接受本网站服务之前，请务必仔细阅读本条款并同意本声明。访问者访问本网站的行为以及通过各类方式利用本网站的行为，都将被视作是对本声明全部内容的无异议的认可。</p>\r\n<p>\r\n	⑴ 向本站投稿请自觉遵守相关法律，对于不合符法律条款的文章一律不予通过。</p>\r\n<p>\r\n	⑵ 郑重提醒访问者：请在转载、投稿或者复制有关作品时，务必尊重该作品的版权、著作权。</p>\r\n<p>\r\n	⑶ 若您发现有您未署名的作品，请与我们联系，我们会在第一时间加上您的署名或作相关处理。</p>\r\n<p>\r\n	⑷ 本网站用户原创的作品，本网站及作者共同享有版权，其他网站及传统媒体如需使用，须取得本网站的书面授权，未经授权严禁转载或用于其它商业用途。</p>\r\n<p>\r\n	⑸ 本网站作品版权归原创作者所有，仅代表作者本人的观点，不代表本网站的观点和看法，与本网站立场无关，相关责任由原创作者自负。</p>\r\n<p>\r\n	⑹ 未经本网站和作者同意，其他任何机构不得以任何形式侵犯其作品著作权，包括但不限于：擅自复制、链接、非法使用或转载，或以任何方式建立作品镜像。</p>\r\n<p>\r\n	⑺ 本站开通了匿名投稿及精品文章推荐功能，如果您是文章的原作者而我们没有注明或者注明有误，请与我们联系处理。</p>\r\n<p>\r\n	⑻ 本网站部分内容来自互联网，如无意中侵犯了您的权益，请与我们联系，本网站将在规定时间内给予删除等相关处理。</p>\r\n<p>\r\n	⑼ 在本站投稿的文章，本站具有最终解释权。</p>\r\n<p>\r\n	⑽ 如果您需要转载本站的文章信息等，请注明来源本站，并链接指向具体文章。</p>\r\n<p>\r\n	<strong>解释权</strong></p>\r\n<p>\r\n	本服务条款协议的解释权归本站所有。如果其中有任何条款与国家的有关法律相抵触，则以国家法律的明文规定为准。</p>\r\n<br />','../../about/service.html','0','','','','1');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('3','联系方式','<p>\r\n	站长企鹅：396920288<img align=\\\\\"right\\\\\" alt=\\\\\"微信公众账号\\\\\" height=\\\\\"280\\\\\" src=\\\\\"/skin/img/weixin.gif\\\\\" style=\\\\\"border: 1px solid #DDD;padding: 2px;\\\\\" title=\\\\\"扫一扫添加微信公众号\\\\\" width=\\\\\"280\\\\\" /></p>\r\n<p>\r\n	微信公号：meiwen_com_cn</p>\r\n<p>\r\n	服务邮箱：service@meiwen.com.cn</p>\r\n<p>\r\n	作者QQ群：91988895</p>\r\n<p>\r\n	联系电话：136****5137</p>\r\n<p>\r\n	认证空间：http://shanwu.qzone.qq.com/</p>\r\n<p>\r\n	腾讯微博：http://t.qq.com/yulu-fang<br />\r\n	&nbsp;</p>','../../about/contact.html','0','','','','1');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('4','投稿指南','<p>\r\n	<strong style=\\\\\"font-size:18px;color:#66cccc;\\\\\">第一步：注册成为本站会员</strong></p>\r\n<p>\r\n	<strong style=\\\\\"font-size:16px;\\\\\">方式1：直接使用QQ账号登录</strong></p>\r\n<p>\r\n	本站提供了QQ账号登录方式，快捷方便，只要您有QQ号码，就能一键登录本站。</p>\r\n<p>\r\n	①打开网站首页，点击右侧会员中心登录框下面的用QQ账号登录按钮跳至qq登录官方授权网站；</p>\r\n<p>\r\n	②如果您已登录QQ，请选择快捷登录；如果您没登录QQ，请输入您的QQ号及QQ密码并确定；</p>\r\n<p>\r\n	③第一次登录需确认注册信息，确认后页面跳转至会员中心，完成操作。</p>\r\n<p>\r\n	<strong style=\\\\\"font-size:16px;\\\\\">方式2：注册会员账号登录</strong></p>\r\n<p>\r\n	①打开网站首页，点击第一屏右侧会员中心登录框右上仿的注册按钮，则页面跳至注册页面；</p>\r\n<p>\r\n	②按要求完成注册页面信息，注：本站系统开启邮件审核机制，所以务必填写正确邮箱进行注册。</p>\r\n<br />\r\n<p>\r\n	<strong style=\\\\\"font-size:18px;color:#66cccc;\\\\\">第二步：登录会员中心进行文章发布</strong></p>\r\n<p>\r\n	<strong style=\\\\\"font-size:16px;\\\\\">登录会员中心</strong></p>\r\n<p>\r\n	① 直接使用QQ账号登录一键登录会员中心，快捷方便；</p>\r\n<p>\r\n	②打开网站首页或会员中心 登录页，输入用户信息后登录。</p>\r\n<p>\r\n	<strong style=\\\\\"font-size:16px;\\\\\">文章发布指南</strong></p>\r\n<p>\r\n	① 成功登录后进入会员中心首页，点击左侧或导航发表文章链接，即可进行文章发布；</p>\r\n<p>\r\n	②进入会员中心首页，点击左侧已发布文章管理，对已发表文章进行相关操作。</p>\r\n<br />\r\n<p>\r\n	<strong style=\\\\\"font-size:18px;color:#66cccc;\\\\\">第三步：投稿成功等待文章审核</strong></p>\r\n<p>\r\n	①请耐心等待，所有文章会在24小时内被审核，节假日会延长至48小时；</p>\r\n<p>\r\n	②进入会员中心，点击左侧导航的文章管理即可查看文章是否通过审核。<br />\r\n	<br />\r\n	&nbsp;</p>','../../about/tougao.html','0','','','','2');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('5','投稿说明','<br />\r\n<p>\r\n	<strong style=\\\\\"font-size:18px;color:#66cccc;\\\\\">本站发表文章会被永久保存吗？</strong></p>\r\n<p>\r\n	①当然，我们会永久保存会员的每一篇作品，如果一定要给时间一个期限，我们希望是一万年；</p>\r\n<p>\r\n	②除不可抗拒的因素，造成文章丢失或者数据库崩溃等因素，我们将尽最大的能力去挽回损失。</p>\r\n<br />\r\n<p>\r\n	<strong style=\\\\\"font-size:18px;color:#66cccc;\\\\\">如何选择文章分类？</strong></p>\r\n<p>\r\n	①本站提供了很多可以投稿的栏目分类，可以根据您文章的性质选择相应的分类；</p>\r\n<p>\r\n	②出于对作者及读者负责的态度，编辑会根据文章的质量、性质等，适当的调整作者所选分类。</p>\r\n<br />\r\n<p>\r\n	<strong style=\\\\\"font-size:18px;color:#66cccc;\\\\\">发表文章有稿费吗？</strong></p>\r\n<p>\r\n	①本站属非商业性公益网站，自2015年初创办至今暂不设稿费；</p>\r\n<p>\r\n	②传统媒体如需使用本站作者作品，需依法给作者支付稿酬，并注明由本站推荐。</p>\r\n<br />\r\n<p>\r\n	<strong style=\\\\\"font-size:18px;color:#66cccc;\\\\\">在本站发表投稿文章被转载？</strong></p>\r\n<p>\r\n	在目前中国的版权体制下，文章在网络上被其他网站转载是个非常普遍的现象，几乎所有网站都遇到过； 有些朋友会很乐意作品被分享，有机会让更多的人欣赏；有些朋友会更在意自己的权益，希望自己的权益得到法律的保护；</p>\r\n<p>\r\n	本站会力所能及的帮助我们的会员进行维权服务，为此我们建议：</p>\r\n<p>\r\n	①建议您在投稿前先把作品发送到自己的邮箱，通过邮箱记录作品发送时间，作为首发的证据；</p>\r\n<p>\r\n	②本站可以提供您的发稿时间、发稿作者等证明作为辅助证据；</p>\r\n<p>\r\n	③如有需要，本站可以从多方面协助您维权；</p>\r\n<p>\r\n	④同时我们建议您：如果您的文章准备要出版或者在杂志上发表，建议您不要发表到网络上去。</p>\r\n<p>\r\n	⑤在本站站上发布文章/进行投稿，视为已知晓以上内容。</p>\r\n<br />\r\n<p>\r\n	<strong style=\\\\\"font-size:18px;color:#66cccc;\\\\\">未通过审核的文章怎么处理？</strong></p>\r\n<p>\r\n	①不良信息、广告以及其他一些与本站主题无关的文章，会直接作删除处理；</p>\r\n<p>\r\n	②质量低、篇幅过短（诗歌除外）、未完待续的文章，会进行退稿处理；为保障其他用户权益，此类文章短时间内即会作删除处理；</p>\r\n<p>\r\n	③温馨提示：请发表文章前一定做好文章的备份工作。</p>\r\n<br />\r\n<p>\r\n	<strong style=\\\\\"font-size:18px;color:#66cccc;\\\\\">怎样修改或删除已发表文章？</strong></p>\r\n<p>\r\n	①对于还未审核或者已被退稿的文章，可以直接进入已发布文章管理进行文章修改或删除操作；</p>\r\n<p>\r\n	②对于已经通过审核，且审核时间超过1天的文章，我们做了保护限制，此时用户不能直接修改或删除自己的文章；</p>\r\n<p>\r\n	③遇到特殊情况需要修改或删除的，可通过发邮件或者联系客服等方式联系我们的编辑，说明原因由我们为你处理。<br />\r\n	<br />\r\n	&nbsp;</p>','../../about/shuoming.html','0','','','','2');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('6','审核标准','  <br />\r\n<p>\r\n	本站鼓励每个人在这里发表作品；对于用心创作的作品，一般情况下都能通过审核；</p>\r\n<p>\r\n	<strong style=\\\\\"font-size:16px;color:#66cccc;\\\\\">出现以下几种情况的文章，则可能不被通过审核：</strong></p>\r\n<p>\r\n	①文章不合法，涉及政治、色情等；文章具有广告性质，带广告网址等；</p>\r\n<p>\r\n	②文章正文篇幅过短的文章（诗歌除外）、无意义的文章；</p>\r\n<p>\r\n	③格式杂乱、标点符号不规范的文章；请尽量不要使用繁体；（欢迎使用自动排版工具）</p>\r\n<p>\r\n	④不符合网站主题的文章或相对应投稿栏目的文章内容；</p>\r\n<p>\r\n	⑤本站已经存在的文章；虽然本站开放优秀文章推荐功能，但原创文章更容易通过审核；</p>\r\n<p>\r\n	⑥其他：未完待续的文章、短篇小说转载或者长篇连载小说涉及版权等。</p>\r\n<p>\r\n	⑦在普通文章审核标准的基础之上，文章全部内容都进行伪原创或原创处理。</p>\r\n<p>\r\n	请仔细阅读我们的投稿指南及投稿说明，如果您想进一步了解网上怎么投稿，可以<a href=\\\\\"/about/contact.html\\\\\" style=\\\\\"color:#92B4BF;\\\\\">联系我们</a>，务必说明缘由，方便我们会第一时间为您解答困惑。</p>\r\n<p>\r\n	&nbsp;</p>','../../about/shenhe.html','0','','','','2');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('7','网站地图','','../../sitemap.html','0','','','','3');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('8','TAG标签','','../../tag.html','0','','','','4');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('9','友情链接','','../../about/link.html','0','','','','5');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('10','百度新闻','','../../baidunews.xml','0','','','','6');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('11','排版工具','','../../about/paiban.html','0','','','','7');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('12','手机版首页','<!DOCTYPE html>\r\n<head>\r\n<meta http-equiv=\\\\\"Content-Type\\\\\" content=\\\\\"text/html; charset=utf-8\\\\\">\r\n<meta http-equiv=\\\\\"Cache-Control\\\\\" content=\\\\\"must-revalidate,no-cache,no-transform\\\\\">\r\n<meta content=\\\\\"width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no\\\\\" name=\\\\\"viewport\\\\\">\r\n<link rel=\\\\\"shortcut icon\\\\\" href=\\\\\"http://<?=\$public_r[\\\\''add_www_92game_net_domain\\\\'']?>/favicon.ico\\\\\" type=\\\\\"image/x-icon\\\\\" />\r\n<meta name=\\\\\"apple-mobile-web-app-capable\\\\\" content=\\\\\"no\\\\\">\r\n<meta name=\\\\\"apple-mobile-web-app-status-bar-style\\\\\" content=\\\\\"black\\\\\">\r\n<meta name=\\\\\"application-name\\\\\" content=\\\\\"<?=\$public_r[\\\\''add_www_92game_net_name\\\\'']?>\\\\\">\r\n<title>[!--pagetitle--]</title>\r\n<meta name=\\\\\"keywords\\\\\" content=\\\\\"[!--pagekeywords--]\\\\\" />\r\n<meta name=\\\\\"description\\\\\" content=\\\\\"[!--pagedescription--]\\\\\" />\r\n<meta http-equiv=\\\\\"Cache-Control\\\\\" content=\\\\\"must-revalidate,no-cache\\\\\" />\r\n<link href=\\\\\"/skin/css.css\\\\\" rel=\\\\\"stylesheet\\\\\" type=\\\\\"text/css\\\\\"/>\r\n<script src=\\\\\"/skin/jquery.js\\\\\" type=\\\\\"text/javascript\\\\\"></script>\r\n<script src=\\\\\"/skin/swipeSlide.min.js\\\\\" type=\\\\\"text/javascript\\\\\"></script>\r\n</head>\r\n<body class=\\\\\"bg\\\\\">\r\n[!--temp.m.header--]\r\n<div class=\\\\\"bwslide\\\\\" id=\\\\\"slide3\\\\\">\r\n    <ul>\r\n	[e:loop={\\\\''news\\\\'',3,18,1,\\\\''firsttitle=1\\\\'',\\\\''newstime DESC\\\\''}]\r\n	<li><a href=\\\\''/show/<?=\$bqr[\\\\''id\\\\'']?>.html\\\\''><img src=\\\\''<?=\$bqr[\\\\''titlepic\\\\'']?>\\\\'' alt=\\\\''<?=\$bqr[\\\\''title\\\\'']?>\\\\''></a></li>\r\n	[/e:loop]\r\n	</ul>\r\n    <div id=\\\\''dot_main\\\\''></div>\r\n	<div class=\\\\\"dot\\\\\">[e:loop={\\\\''news\\\\'',3,18,1,\\\\''firsttitle=1\\\\'',\\\\''newstime DESC\\\\''}]<span></span>[/e:loop]</div>\r\n	<div class=\\\\\"dot_title\\\\\"></div> \r\n</div>\r\n<script type=\\\\\"text/javascript\\\\\">\r\n\$(\\\\''#slide3\\\\'').swipeSlide({\r\ncontinuousScroll: true,speed: 3000,transitionType: \\\\''cubic-bezier(0.22, 0.69, 0.72, 0.88)\\\\''}, \r\nfunction(i) {\r\n\$(\\\\''.dot\\\\'').children().eq(i).addClass(\\\\''cur\\\\'').siblings().removeClass(\\\\''cur\\\\'');link=\$(\\\\''#slide3 li\\\\'').eq(i).find(\\\\\"a\\\\\").attr(\\\\\"href\\\\\");\$(\\\\\".dot_title\\\\\").text(\$(\\\\''#slide3 li\\\\'').eq(i).find(\\\\\"img\\\\\").attr(\\\\\"alt\\\\\"));});\r\n</script>\r\n<div class=\\\\\"meiwen_tab\\\\\" id=\\\\\"meiwen_tab\\\\\">\r\n	<div class=\\\\\"menu\\\\\">\r\n	<ul>\r\n	<span id=\\\\\"one1\\\\\" onclick=\\\\\"setTab(\\\\''one\\\\'',1)\\\\\">今日更新</span>\r\n	<span id=\\\\\"one2\\\\\" onclick=\\\\\"setTab(\\\\''one\\\\'',2)\\\\\">推荐阅读</span>\r\n	<span id=\\\\\"one3\\\\\" onclick=\\\\\"setTab(\\\\''one\\\\'',3)\\\\\">本周热门</span>\r\n	</ul></div>\r\n	<div class=\\\\\"menudiv\\\\\">\r\n		<div id=\\\\\"con_one_1\\\\\">\r\n        <dd class=\\\\\"indexlist\\\\\">\r\n		<ul>\r\n		[ecmsinfo]\\\\''news\\\\'',10,0,0,18,14,0,\\\\''\\\\'',\\\\''newstime DESC\\\\''[/ecmsinfo]\r\n		</ul></dd>\r\n		</div>\r\n		<div id=\\\\\"con_one_2\\\\\" style=\\\\\"display:none;\\\\\">\r\n        <dd class=\\\\\"indexlist\\\\\">\r\n		<ul>\r\n		[ecmsinfo]\\\\''news\\\\'',10,0,0,18,14,0,\\\\''\\\\'',\\\\''diggtop DESC\\\\''[/ecmsinfo]\r\n		</ul></dd>\r\n		</div>\r\n		<div id=\\\\\"con_one_3\\\\\" style=\\\\\"display:none;\\\\\">\r\n        <dd class=\\\\\"indexlist\\\\\"><ul>\r\n		[ecmsinfo]\\\\''news\\\\'',10,0,0,18,14,0,\\\\''\\\\'',\\\\''zclick DESC\\\\''[/ecmsinfo]\r\n		</ul></dd>\r\n		</div>\r\n	</div>\r\n</div>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">\r\n	<span class=\\\\\"fl\\\\\"><a href=\\\\\"/list/1.html\\\\\"><?=\$class_r[1][\\\\''classname\\\\'']?></a></span>\r\n	<span class=\\\\\"fr\\\\\">[showclasstemp]1,13,0,3[/showclasstemp]</span>\r\n	</dt>\r\n     <dd class=\\\\\"list\\\\\">\r\n        <ul>[ecmsinfo]1,8,0,0,0,14,0[/ecmsinfo]</ul>\r\n    </dd>\r\n</dl>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">\r\n	<span class=\\\\\"fl\\\\\"><a href=\\\\\"/list/2.html\\\\\"><?=\$class_r[2][\\\\''classname\\\\'']?></a></span>\r\n	<span class=\\\\\"fr\\\\\">[showclasstemp]2,13,0,3[/showclasstemp]</span>\r\n	</dt>\r\n     <dd class=\\\\\"list\\\\\">\r\n        <ul>[ecmsinfo]2,8,0,0,0,14,0[/ecmsinfo]</ul>\r\n    </dd>\r\n</dl>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">\r\n	<span class=\\\\\"fl\\\\\"><a href=\\\\\"/list/3.html\\\\\"><?=\$class_r[3][\\\\''classname\\\\'']?></a></span>\r\n	<span class=\\\\\"fr\\\\\">[showclasstemp]3,13,0,3[/showclasstemp]</span>\r\n	</dt>\r\n     <dd class=\\\\\"list\\\\\">\r\n        <ul>[ecmsinfo]3,8,0,0,0,14,0[/ecmsinfo]</ul>\r\n    </dd>\r\n</dl>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">\r\n	<span class=\\\\\"fl\\\\\"><a href=\\\\\"/list/4.html\\\\\"><?=\$class_r[4][\\\\''classname\\\\'']?></a></span>\r\n	<span class=\\\\\"fr\\\\\">[showclasstemp]4,13,0,3[/showclasstemp]</span>\r\n	</dt>\r\n      <dd class=\\\\\"list\\\\\">\r\n        <ul>[ecmsinfo]4,8,0,0,0,14,0[/ecmsinfo]</ul>\r\n    </dd>\r\n</dl>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">\r\n	<span class=\\\\\"fl\\\\\"><a href=\\\\\"/list/5.html\\\\\"><?=\$class_r[5][\\\\''classname\\\\'']?></a></span>\r\n	<span class=\\\\\"fr\\\\\">[showclasstemp]5,13,0,3[/showclasstemp]</span>\r\n	</dt>\r\n     <dd class=\\\\\"list\\\\\">\r\n        <ul>[ecmsinfo]5,8,0,0,0,14,0[/ecmsinfo]</ul>\r\n    </dd>\r\n</dl>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">\r\n	<span class=\\\\\"fl\\\\\"><a href=\\\\\"/list/6.html\\\\\"><?=\$class_r[6][\\\\''classname\\\\'']?></a></span>\r\n	<span class=\\\\\"fr\\\\\">[showclasstemp]6,13,0,3[/showclasstemp]</span>\r\n	</dt>\r\n     <dd class=\\\\\"list\\\\\">\r\n        <ul>[ecmsinfo]6,8,0,0,0,14,0[/ecmsinfo]</ul>\r\n    </dd>\r\n</dl>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">\r\n	<span class=\\\\\"fl\\\\\"><a href=\\\\\"/list/7.html\\\\\"><?=\$class_r[7][\\\\''classname\\\\'']?></a></span>\r\n	<span class=\\\\\"fr\\\\\">[showclasstemp]7,13,0,3[/showclasstemp]</span>\r\n	</dt>\r\n     <dd class=\\\\\"list\\\\\">\r\n        <ul>[ecmsinfo]7,8,0,0,0,14,0[/ecmsinfo]</ul>\r\n    </dd>\r\n</dl>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">\r\n	<span class=\\\\\"fl\\\\\"><a href=\\\\\"/list/8.html\\\\\"><?=\$class_r[8][\\\\''classname\\\\'']?></a></span>\r\n	<span class=\\\\\"fr\\\\\">[showclasstemp]8,13,0,3[/showclasstemp]</span>\r\n	</dt>\r\n     <dd class=\\\\\"list\\\\\">\r\n        <ul>[ecmsinfo]8,8,0,0,0,14,0[/ecmsinfo]</ul>\r\n    </dd>\r\n</dl>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">\r\n	<span class=\\\\\"fl\\\\\"><a href=\\\\\"/list/9.html\\\\\"><?=\$class_r[9][\\\\''classname\\\\'']?></a></span>\r\n	<span class=\\\\\"fr\\\\\">[showclasstemp]9,13,0,3[/showclasstemp]</span>\r\n	</dt>\r\n     <dd class=\\\\\"list\\\\\">\r\n        <ul>[ecmsinfo]9,8,0,0,0,14,0[/ecmsinfo]</ul>\r\n    </dd>\r\n</dl>\r\n<dl class=\\\\\"article-list\\\\\">\r\n    <dt class=\\\\\"title\\\\\">美图心语</dt>\r\n    <dd class=\\\\\"pic\\\\\">\r\n	[e:loop={\\\\''news\\\\'',9,18,1}]\r\n        <ul><li><a href=\\\\''/show/<?=\$bqr[\\\\''id\\\\'']?>.html\\\\'' class=\\\\''m\\\\''><img src=\\\\''<?=\$bqr[\\\\''titlepic\\\\'']?>\\\\'' width=\\\\''500px\\\\'' height=\\\\''330px\\\\''><span><p><?=\$bqr[\\\\''title\\\\'']?></p></span></a></li>\r\n		[/e:loop]\r\n		</ul>\r\n    </dd>\r\n	<div class=\\\\\"aff\\\\\">[phomead]9[/phomead]</div>\r\n</dl>\r\n[!--temp.m.footer--]','../../mobile/index.html','0','美文阅读网_伤感情感美文_散文诗歌大全_手机版','美文网,美文欣赏,美文摘抄,经典美文,美文阅读网','美文阅读网是一个用语言和文字编织起来的文学网站，用自己的文字谱写着生活的点点滴滴，用文字让读者了解更多真实的情感和世间道理——足不出户，阅尽天下美文！','0');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('13','畅言评论JS-电脑版','//畅言评论插件\r\n(function(){\r\n    var appid = \\\\''<?=\$public_r[add_www_92game_net_cy_id]?>\\\\'',\r\n    conf = \\\\''prod_<?=\$public_r[add_www_92game_net_cy_key]?>\\\\'';\r\n    var doc = document,\r\n    s = doc.createElement(\\\\''script\\\\''),\r\n    h = doc.getElementsByTagName(\\\\''head\\\\'')[0] || doc.head || doc.documentElement;\r\n    s.type = \\\\''text/javascript\\\\'';\r\n    s.charset = \\\\''utf-8\\\\'';\r\n    s.src =  \\\\''http://assets.changyan.sohu.com/upload/changyan.js?conf=\\\\''+ conf +\\\\''&appid=\\\\'' + appid;\r\n    h.insertBefore(s,h.firstChild);\r\n    window.SCS_NO_IFRAME = true;\r\n  })()\r\ndocument.writeln(\\\\\"<script type=\\\\''text/javascript\\\\'' charset=\\\\''utf-8\\\\'' src=\\\\''http://assets.changyan.sohu.com/upload/plugins/plugins.count.js\\\\''></script>\\\\\");\r\n','../../skin/js/pl.js','0','','','','0');");
E_D("replace into `www_92game_net_meiwen_enewspage` values('14','畅言评论JS-手机版','//畅言评论插件\r\n(function(){\r\n    var expire_time = parseInt((new Date()).getTime()/(5*60*1000));\r\n    var head = document.head || document.getElementsByTagName(\\\\\"head\\\\\")[0] || document.documentElement;\r\n    var script_version = document.createElement(\\\\\"script\\\\\"),script_cyan = document.createElement(\\\\\"script\\\\\");\r\n    script_version.type = script_cyan.type = \\\\\"text/javascript\\\\\";\r\n    script_version.charset = script_cyan.charset = \\\\\"utf-8\\\\\";\r\n    script_version.onload = function(){\r\n        script_cyan.id = \\\\''changyan_mobile_js\\\\'';\r\n        script_cyan.src = \\\\''http://changyan.itc.cn/upload/mobile/wap-js/changyan_mobile.js?client_id=<?=\$public_r[add_www_92game_net_cy_id]?>&\\\\''\r\n                        + \\\\''conf=prod_<?=\$public_r[add_www_92game_net_cy_key]?>&version=\\\\'' + cyan_resource_version;\r\n        head.insertBefore(script_cyan, head.firstChild);\r\n    };\r\n    script_version.src = \\\\''http://changyan.sohu.com/upload/mobile/wap-js/version.js?_=\\\\''+expire_time;\r\n    head.insertBefore(script_version, head.firstChild);\r\n})();\r\n','../../mobile/skin/pl.js','0','','','','0');");

@include("../../inc/footer.php");
?>