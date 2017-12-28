<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<html>
<head>
<title><?=$public_r[add_www_92game_net_name]?>（<?=$public_r[add_www_92game_net_domain]?>）提示您！</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<base target='_self'/>
<style>
.ts_div{width:600px;overflow:hidden;margin:0 auto;margin-top:80px;border:1px solid #E9E9E9;border-radius:10px;}
.ts_border{border:7px solid #efefef;}
.ts_b2{background:#FBFBFB;border:1px solid #C2DEC6;padding:10px 20px 10px 20px;}
.ts_div h2{text-align:left;color:#2AA53B;border-bottom:1px dotted #ccc;padding-bottom:10px;font-size: 16px;font-family:"Microsoft Yahei";font-weight: 300;}
.ts_div p{line-height:70px;background:url(/skin/img/meiwen_prompt.png) no-repeat 0 center;margin:15px auto;font-size:16px;font-family:"Microsoft Yahei";font-weight: 300;text-align:left;text-indent:70px;}
.ts_b2 .ts_tz{margin:10px auto;text-align:right;color:#666;font-size:12px;height: 25px;margin-right: 10px;}
.ts_b2 .ts_tz .submit {background: none repeat scroll 0% 0% #72AE27;color: #FFF;border: 0px none;cursor: pointer;width: 70px;height: 28px;border-radius: 3px;font-size: 16px;font-family:"Microsoft Yahei";}
</style>
</head>
<body leftmargin='0' topmargin='0' bgcolor='#f7f7f7'>
<center>
<script>
      var pgo=0;
      function JumpUrl(){
        if(pgo==0){ location='<?=$gotourl?>'; pgo=1; }
      }
document.write("<div class='ts_div'>  <div class='ts_border'><div class='ts_b2'><h2><?=$public_r[add_www_92game_net_name]?>（<?=$public_r[add_www_92game_net_domain]?>）提示您！</h2>");
document.write("<p>");
document.write("<?=$error?>");
document.write("<div class='ts_tz'><a href='<?=$gotourl?>'><button class='submit'>确 定</button></a></div>");
setTimeout('JumpUrl()',2000);</script>
</center>
</body>
</html>
