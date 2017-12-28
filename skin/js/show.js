//百度分享
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
//AJAXDIGG
var http_request = false;
function makeRequest(url, functionName, httpType, sendData) {

	http_request = false;
	if (!httpType) httpType = "GET";

	if (window.XMLHttpRequest) { // Non-IE...
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType) {
			http_request.overrideMimeType('text/plain');
		}
	} else if (window.ActiveXObject) { // IE
		try {
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}

	if (!http_request) {
		//alert('Cannot send an XMLHTTP request');
		ZENG.msgbox.show("系统错误！");
		return false;
	}

	var changefunc="http_request.onreadystatechange = "+functionName;
	eval (changefunc);
	//http_request.onreadystatechange = alertContents;
	http_request.open(httpType, url, true);
	http_request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	http_request.send(sendData);
}

function getReturnedText () {
	if (http_request.readyState == 4) {
		if (http_request.status == 200) {
			var messagereturn = http_request.responseText;
			return messagereturn;
		} else {
			//alert('There was a problem with the request.');
			ZENG.msgbox.show("系统错误！");
		}
	}
}

function EchoReturnedText () {
	if (http_request.readyState == 4) {
		if (http_request.status == 200) {
			var messagereturn = http_request.responseText;
			if(messagereturn!='isfail')
			{
				var r;
				r=messagereturn.split('|');
				if(r.length!=1)
				{
					if(r[0]!='')
					{
						document.getElementById(r[1]).innerHTML=r[0];
					}
					if(r[2]!='')
					{
						//alert(r[2]);
						ZENG.msgbox.show("您已赞过本文！");
					
					}
				}
				else
				{
					document.getElementById('ajaxarea').innerHTML=messagereturn;
				}
			}
		} else {
			//alert('There was a problem with the request.');
			ZENG.msgbox.show("系统错误！");
		}
	}
}

;(function($) {
        $.extend({
            tipsBox: function(options) {
                options = $.extend({
                    obj: null,  
                    str: "+1", 
                    startSize: "12px",
                    endSize: "30px",   
                    interval: 600,  
                    color: "red",    
                    callback: function() {}
                }, options);
                $("body").append("<span class='jia1'>"+ options.str +"</span>");
                var box = $(".jia1");
                var left = options.obj.offset().left + options.obj.width() / 2;
                var top = options.obj.offset().top - options.obj.height();
                box.css({
                    "position": "absolute",
                    "left": left + "px",
                    "top": top + "px",
                    "z-index": 9999,
                    "font-size": options.startSize,
                    "line-height": options.endSize,
                    "color": options.color
                });
                box.animate({
                    "font-size": options.endSize,
                    "opacity": "0",
                    "top": top - parseInt(options.endSize) + "px"
                }, options.interval , function() {
                    box.remove();
                    options.callback();
                });
            }
        });
    })(jQuery);
	$(function() {
		$(".add").click(function() {
			$.tipsBox({
				obj: $(this),
				str: "+1",
                callback: function() {
                }
			});
		});
	});
//字体大小
function doZoom(size) {
	document.getElementById('zoomtext').style.fontSize = size + 'px';
};	
