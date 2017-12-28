$(function(){
  var d="<div class='snow'>＊<div>"
  var snowSpeed = 100;//设置下雪的速度
	setInterval(function(){
		var f=$(document).width();
		var e=Math.random()*f-100;
		var o=0.3+Math.random();
		var fon=10+Math.random()*30;
		var l = e - 100 + 200 * Math.random();
		var k=2000 + 5000 * Math.random();
		$(d).clone().appendTo(".snowbg").css({
			left:e+"px",
			opacity:o,
			"font-size":fon,
		}).animate({
		  top:"400px",
			left:l+"px",
			opacity:0.1,
		},k,"linear",function(){$(this).remove()})
	},snowSpeed)
});
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
//加载更多
$('#pageNo').val(2);
function getMoreSortAppInfo() {
	$('#morenews').hide();
	$('#loading').show();
	var pageNo = $('#pageNo').val();
	var pageCnt = $('#pageCnt').val();
	var userid = $('#userid').val();
	if (eval(pageNo) >= eval(pageCnt)) {
		$('#loading').hide();
		$('#noMore').show();
		return;
	} else {
		pageNo = eval(pageNo) + 1;
	}
	var error = 0;
	var type = $("#type").val();
	var toUrl='/e/member/user/news.php?userid='+userid+'&page='+pageNo;
	$.ajax({
		url: toUrl,
		type: 'GET',
		cache: false,
		dataType: 'text',
		complete: function() {
			$('#loading').hide();
			if (error == 1) {
				$('#morenews').html('重新加载');
				$('#noMore').show();
				$('#morenews').hide();
			} else {
				$('#morenews').html('点击加载更多&nbsp;&nbsp;&darr;');
				if (eval(pageNo) >= eval(pageCnt)) {
					$('#noMore').show();
				} else {
					$('#morenews').show();
				}
			}
		},
		success: function(data) {
			if (data) {
				$('#content_list').append(data);
				$('#pageNo').val(pageNo);
			} else {
				error = 1;
			}
		},
		error: function() {
			error = 1;
		}
	});

}