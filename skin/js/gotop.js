document.writeln("<div class=\"bottom_tools\"><div class=\"qr_tool\">二维码</div><a class=\"desktop\" href=\"/zm.php\" title=\"创建桌面快捷方式\"></a><a class=\"tougao\" href=\"/e/tg/\" title=\"在线投稿\"></a><a class=\"scrollUp\" href=\"javascript:;\" title=\"返回顶部\"></a><img class=\"weixin\" src=\"/skin/img/weixin.png\"></div>");
$(function() {
	var d = $('.bottom_tools');
	var f = $('.qr_tool');
	var g = $('.weixin');
	$(window).scroll(function() {
		var a = $(document).height();
		var b = $(window).scrollTop();
		var c = $(window).innerHeight();
		b > 50 ? $(".scrollUp").fadeIn(500).css("display", "block") : $(".scrollUp").fadeOut(500);
		d.css("bottom", a - b > c ? 20 : c + b + 20 - a)
	});
	$('.scrollUp').click(function(e) {
		e.preventDefault();
		$('html,body').animate({
			scrollTop: 0
		}, 1000)
	});
	f.hover(function() {
		g.fadeIn()
	}, function() {
		g.fadeOut()
	})
});
