function wxShareClass() {
	var a = document.createElement("script");
	a.type = "text/javascript";
	a.src = "http://res.wx.qq.com/open/js/jweixin-1.0.0.js";
	var b = this;
	a.onload = function() {
		wx.config({
			debug: false,
			appId: "wx908cca746ca90776",
			timestamp: 1431372403,
			nonceStr: "gYBlHFrX7gnEM2zx",
			signature: "b1e32986a9e0c988b5da1c348eff305e2efcabbc",
			jsApiList: ["onMenuShareAppMessage", "onMenuShareTimeline"]
		});
		wx.ready(function() {
			wx.onMenuShareTimeline({
				title: b.config.title,
				link: b.config.link,
				imgUrl: b.config.imgUrl
			});
			wx.onMenuShareAppMessage({
				title: b.config.title,
				desc: b.config.desc,
				link: b.config.link,
				imgUrl: b.config.imgUrl
			})
		})
	};
	document.body.appendChild(a)
}
wxShareClass.prototype.init = function(c, b, a, d) {
	this.config = {
		title: c,
		desc: b,
		link: a,
		imgUrl: d
	}
};
var wxShare = new wxShareClass();