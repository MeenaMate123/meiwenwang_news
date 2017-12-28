<?php
if(!defined('InEmpireCMS'))
{exit();}
?><table width='100%' align='center' cellpadding=3 cellspacing=1 bgcolor='#DBEAF5'><tr><td width='25%' height=25 bgcolor='ffffff'>公司名称</td><td bgcolor='ffffff'>[!--company--](*)</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>联系人</td><td bgcolor='ffffff'><input name="truename" type="text" id="truename" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[truename]))?>">
(*)</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>联系电话</td><td bgcolor='ffffff'>[!--mycall--](*)</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>传真</td><td bgcolor='ffffff'>[!--fax--]</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>手机</td><td bgcolor='ffffff'><input name="phone" type="text" id="phone" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[phone]))?>">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>QQ号码</td><td bgcolor='ffffff'><input name="oicq" type="text" id="oicq" value="<?=$ecmsfirstpost==1?"":htmlspecialchars(stripSlashes($addr[oicq]))?>">
</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>MSN</td><td bgcolor='ffffff'>[!--msn--]</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>网址</td><td bgcolor='ffffff'>[!--homepage--]</td></tr>
<tr><td width='16%' height=25 bgcolor='ffffff'>会员头像</td><td bgcolor='ffffff'><input type="file" name="userpicfile"></td></tr>
<tr><td width='16%' height=25 bgcolor='ffffff'>联系地址</td><td bgcolor='ffffff'>[!--address--]&nbsp;邮编: [!--zip--]</td></tr><tr><td width='16%' height=25 bgcolor='ffffff'>公司介绍</td><td bgcolor='ffffff'>
<input name="saytext" type="text" id="saytext" value="<?=$ecmsfirstpost==1?"":ehtmlspecialchars(stripSlashes($addr[saytext]))?>" size="">
</td></tr></table>