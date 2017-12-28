<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']=$word;
require(ECMS_PATH.'e/template/member/head.user.php');
?>
<script src="<?=$public_r['newsurl']?>e/data/html/setday.js"></script>
<script>
function bs(){
	var f=document.add
	if(f.title.value.length==0){alert("标题还没写");f.title.focus();return false;}
	if(f.classid.value==0){alert("请选择栏目");f.classid.focus();return false;}
}
function foreColor(){
  if(!Error())	return;
  var arr = showModalDialog("<?=$public_r['newsurl']?>e/data/html/selcolor.html", "", "dialogWidth:18.5em; dialogHeight:17.5em; status:0");
  if (arr != null) document.add.titlecolor.value=arr;
  else document.add.titlecolor.focus();
}
function FieldChangeColor(obj){
  if(!Error())	return;
  var arr = showModalDialog("<?=$public_r['newsurl']?>e/data/html/selcolor.html", "", "dialogWidth:18.5em; dialogHeight:17.5em; status:0");
  if (arr != null) obj.value=arr;
  else obj.focus();
}
</script>
<script src="<?=$public_r['newsurl']?>e/data/html/postinfo.js"></script>
<div class="wrapper lineT">
  <div class="mainBox">
    <div class="main">
   <?php require(ECMS_PATH.'e/template/member/left.user.php'); ?>
<div class="dedeMain">
    <div class="location"><?=$word?></div>
        <div class="titleTabBar bgGreen lineTB"><h3>当前投稿的栏目： <?=$postclass?></h3></div>      
<form name="add" method="POST" enctype="multipart/form-data" action="ecms.php" onsubmit="return EmpireCMSQInfoPostFun(document.add,'<?=$mid?>');">
<input type=hidden value="<?=$enews?>" name=enews> 
<input type=hidden value="<?=$classid?>" name=classid> 
<input name=id type=hidden id="id" value="<?=$id?>">
<input type=hidden value="<?=$filepass?>" name=filepass> 
<input name=mid type=hidden id="mid" value="<?=$mid?>">
<input type=hidden name=ecmsfrom value="ListInfo.php?mid=<?=$mid?>&ecmscheck=1">
  <table width="100%"  cellspacing="1" class="submit">
   <tbody>
  <?php
  @include($modfile);
  $showkey
  ?>
 </tbody>
   <tfoot>
              <tr>
                <td height="45">&nbsp;</td>
                <td height="45">&nbsp;
				<button class="button3" type="submit" id="btnSubmit" <?if($mid==1){?>onclick="format('newstext')"<?}?>>提 交</button>
				<?if($mid==1){?>
				<script src="<?=$public_r['newsurl']?>skin/user/PB.js"></script>
				<span style="font-size:16px;color:#54AE58;">(<b>友情提示</b>：请使用回车健换行，提交时系统自动排版)</span>
				<?}?>
				</td>
              </tr>
            </tfoot>
  </table>
</form>
      </div>   
	 <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>