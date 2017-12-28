<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
?>
<script language="javascript" type="text/javascript">
window.onload=function (){setInterval("document.getElementById('time').innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",1000);}
</script>
<div class="wrapper footer">
  <div class="fLeft mL10"><?=$public_r['add_www_92game_net_by']?></div>
  <div class="fRight mR10" id="time"></div>
  <div class="clear"></div>
</div>
</body>
</html>