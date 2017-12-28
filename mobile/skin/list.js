//加载更多
$('#pageNo').val(1);
function getMoreSortAppInfo() {
	$('#more').hide();
	$('#loading').show();
	var pageNo = $('#pageNo').val();
	var pageCnt = $('#pageCnt').val();
	var classid = $('#classid').val();
	var line = $('#line').val(); 
	if (eval(pageNo) >= eval(pageCnt)) {
		$('#loading').hide();
		$('#noMore').show();
		return;
	} else {
		pageNo = eval(pageNo) + 1;
	}
	var error = 0;
	var type = $("#type").val();
	var toUrl='/ikaimi/Ajaxlist.php?classid='+classid+'&line='+line+'&page='+pageNo;
	$.ajax({
		url: toUrl,
		type: 'GET',
		cache: false,
		dataType: 'text',
		complete: function() {
			$('#loading').hide();
			if (error == 1) {
				$('#more').html('重新加载');
				$('#noMore').show();
				$('#more').hide();
			} else {
				$('#more').html('点击加载更多内容&nbsp;&nbsp;&darr;');
				if (eval(pageNo) >= eval(pageCnt)) {
					$('#noMore').show();
				} else {
					$('#more').show();
				}
			}
		},
		success: function(data) {
			if (data) {
				$('#list').append(data);
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