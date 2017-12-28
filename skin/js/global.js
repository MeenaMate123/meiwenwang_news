document.writeln("<script src=\"/skin/js/msgbox.js\"></script>");
//头部问候语
function hello() {
    today=new Date();
	var day; var date; var hello;
	hour=new Date().getHours()
	if(hour < 6)hello='凌晨好，'
	else if(hour < 9)hello='早上好，'
	else if(hour < 12)hello='上午好，'
	else if(hour < 14)hello='中午好，'
	else if(hour < 17)hello='下午好，'
	else if(hour < 19)hello='傍晚好，'
	else if(hour < 22)hello='晚上好，'
	else {hello='夜深了，'}
	var webUrl = webUrl;
	document.write(' '+hello);
}
//搜索提示
function dosearch(val) {
	String.prototype.trim = function() {
		return this.replace(/(^\s*)|(\s*$)/g, "");
	}
	var getkw = val.trim();
	if (getkw.length == 0) {
		alert('搜索内容不能为空！');
		return false;
	} else return true;
}
//复制提示
function clickautohide(qazKM1) {
	var lGbNWWsy2 = "";
	switch (qazKM1) {
	case 4:
		lGbNWWsy2 = "恭喜你，内容复制成功";
		break;
	}
	ZENG["msgbox"]["show"](lGbNWWsy2, qazKM1, 2000);
};
function copy() {
	clickautohide(4);
	setTimeout(function() {
		var f$Ayme1 = clipboardData["getData"]('text');
	}, 100);
};
//收藏提示
function favorites(a, b) {
	try {
		window.external.addFavorite(b, a)
	} catch (c) {
		try {
			window.sidebar.addPanel(a, b, "")
		} catch (d) {
			ZENG.msgbox.show("您的浏览器不支持一键收藏，请按Ctrl+D键")
		}
	}
};

