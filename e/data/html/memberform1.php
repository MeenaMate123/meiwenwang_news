<?php
if(!defined('InEmpireCMS'))
{exit();}
?><tr bgcolor='F7FDF0'><td align="right">作者笔名：</td><td><input name="truename" type="text" id="truename" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[truename]))?>">
</td></tr>
<tr><td align="right">性别：</td><td class="radio"><input name="sex" type="radio" value="1"<?=$addr[sex]=="1"||$ecmsfirstpost==1?' checked':''?>>男 &nbsp; &nbsp;<input name="sex" type="radio" value="2"<?=$addr[sex]=="2"?' checked':''?>>女</td></tr>
<tr bgcolor='F7FDF0'><td align="right">QQ号码：</td><td><input name="oicq" type="text" id="oicq" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[oicq]))?>">
</td></tr>
<tr><td align="right">手机：</td><td><input name="phone" type="text" id="phone" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[phone]))?>">
</td></tr>
<tr bgcolor='F7FDF0'><td align="right">交友宣言：</td><td>
<input name="saytext" type="text" id="saytext" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[saytext]))?>" size="">
</td></tr>