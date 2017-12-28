<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?><tr><td width="10%" align="right">标题：</td><td><input name="title" type="text" style="width:400px;height:25px;font-size:16px;"  value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'title',stripSlashes($r[title]))?>"><span style="color:#F00"> *</span>	</td></tr>
<tr bgcolor='F7FDF0'><td align="right">标签：</td><td><input name="keyboard" type="text" size=42 value="<?=stripSlashes($r[keyboard])?>">
<font color="#666666">(多个请用&quot;,&quot;隔开)</font></td></tr>
<tr><td align="right">本文作者：</td><td  class="radio"><input name="writer" type="text" id="writer" value="<?=$ecmsfirstpost==1?"":DoReqValue($mid,'writer',stripSlashes($r[writer]))?>" style="width:150px;height:25px;font-size:16px;border:1px solid #ddd;" >
&nbsp;&nbsp;&nbsp;&nbsp;来源：&nbsp;&nbsp;<input name="befrom" type="radio" value="原创"<?=$r[befrom]=="原创"?' checked':''?>>原创&nbsp;&nbsp;&nbsp;&nbsp;<input name="befrom" type="radio" value="转载"<?=$r[befrom]=="转载"?' checked':''?>>转载 <span style="color:#90A500"> ( 转载作品请在内容结尾注明作者信息 )</span><span style="color:#F00"> *</span></td></tr>
<tr bgcolor='F7FDF0'><td align="right">内容配图：</td><td><input type="file" name="titlepicfile" style="width:300px;height:25px;"></td></tr>
<tr><td align="right">内容正文：<br><span id="counter">0</span>/9999&nbsp;&nbsp;&nbsp;&nbsp;</td><td><textarea id="newstext" name="newstext" cols="50" rows="5" onkeydown="countChar('newstext','counter');" onkeyup="document.getElementById('smalltext').value=this.value" style="width:90%;height:400px;font-size:16px;color:#333;" ><?=$ecmsfirstpost==1?"":DoReqValue($mid,'newstext',stripSlashes($r[newstext]))?></textarea></td></tr>
<div style="display:none;"><textarea name="smalltext" cols="80" rows="3" id="smalltext"><?=$ecmsfirstpost==1?"":DoReqValue($mid,'smalltext',stripSlashes($r[smalltext]))?></textarea>
</div>