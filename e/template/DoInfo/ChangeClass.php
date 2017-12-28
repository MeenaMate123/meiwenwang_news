<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='增加信息';
require(ECMS_PATH.'e/template/member/head.user.php');
?>
<div class="wrapper lineT">
  <div class="mainBox">
    <div class="main">
   <?php require(ECMS_PATH.'e/template/member/left.user.php'); ?>
<div class="dedeMain">
    <div class="location">请选择您要投稿分类</div>
        <div class="titleTabBar bgGreen lineTB">
        </div>
        <?php
            $bclass=$empire->query("select classid,classname from  {$dbtbpre}enewsclass where bclassid='0' and openadd='0' order by myorder ASC");   
            while($br=$empire->fetch($bclass)) {
	        echo "<div class='tgmap'><h2>".$br[classname]."</h2><ul>";
            $class=$empire->query("select classid,classname from  {$dbtbpre}enewsclass where bclassid='".$br['classid']."' and openadd='0'  order by myorder ASC");   
            while($cr=$empire->fetch($class)) 
	        {
             echo "<li><a href='".$public_r['newsurl']."e/DoInfo/AddInfo.php?mid=".$mid."&enews=MAddInfo&classid=".$cr[classid]."'>".$cr[classname]."</a></li>";
	        }
            echo "</ul></div>";
         }
        ?> 
      </div>   
	 <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>