<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='我的文档';
require(ECMS_PATH.'e/template/member/head.user.php');
?>
<div class="wrapper lineT">
  <div class="mainBox">
    <div class="main">
   <?php require(ECMS_PATH.'e/template/member/left.user.php'); ?>
<div class="dedeMain">
        <div class="location">
		  <span class="fLeft">已发布文档</span>
		  <span class="fRight mR10 titPublish icon">
		  <a href='<?=$public_r['newsurl']?>e/DoInfo/ChangeClass.php?mid=<?=$mid?>'>发表新文档</a></span>
		  </div>
        <div class="titleTabBar bgGreen lineTB">
 <div class="fLeft">	
  <ul> 
<li<?=$indexchecked==0?' class="select"':''?>><a href="?mid=<?=$mid?>&ecmscheck=1">待审核</a></li>
<li<?=$indexchecked==1?' class="select"':''?> ><a href="?mid=<?=$mid?>">已发布</a></li>
</ul>
 </div>	  
<div class="fRight" style="padding:5px 10px 0px 0px;"> 
<form name="searchinfo" method="GET" action="ListInfo.php">
<input class="text" name="keyboard" type="text" id="keyboard" value="<?=$keyboard?>" style='width:150px;height:16px;'>
		   <input name="show" type="hidden" id="show" value="title">
          <button class="button2" type="submit">搜索</button>
          <input name="sear" type="hidden" id="sear" value="1">
          <input name="mid" type="hidden" value="<?=$mid?>">
		  <input name="ecmscheck" type="hidden" id="ecmscheck" value="<?=$ecmscheck?>">
</form>
	 </div>	  
        </div>
        <div class="mL10 mR10 mTB10 minhg">
          <table cellspacing="1" class="list">
            <thead>
              <tr>
                <th >文章标题</th>
                <th width="10%">归属</th>
                <th width="10%">状态 </th>
                <th width="8%">阅读 </th>
                <th width="10%">时间 </th>
                <th width="10%">操作</th>
              </tr>
            </thead>
            <tbody>
		<?php
        while($r=$empire->fetch($sql))
	   {
		//状态
		$st='';
		if($r[istop])//置顶
		{
			$st.="<font color=red>[顶".$r[istop]."]</font> ";
		}
		if($r[isgood])//推荐
		{
			$st.="<font color=red>[".$ignamer[$r[isgood]-1]."]</font> ";
		}
		if($r[firsttitle])//头条
		{
			$st.="<font color=red>[".$ftnamer[$r[firsttitle]-1]."]</font> ";
		}
		//时间
		$newstime=date("Y-m-d",$r[newstime]);
		$oldtitle=$r[title];
		$r[title]=stripSlashes(sub($r[title],0,38,false));
		$r[title]=DoTitleFont($r[titlefont],$r[title]);
		if($indexchecked==0)
		{
			$checked='<font color=red>审核中</font>';
			$titleurl='href="javascript:alert(\'内容待审核，请耐心等待！\');"';//链接
		}
		else
		{
			$checked='<font color=green>已通过</font>';
			$titleurl='href="'.sys_ReturnBqTitleLink($r).'" target="_blank"';//链接
		}
		$plnum=$r[plnum];//评论个数
		//标题图片
		$showtitlepic="";
		if($r[titlepic])
		{$showtitlepic="<a href='".$r[titlepic]."' title='预览标题图片' target=_blank><img src='".$public_r['newsurl']."skin/user/img/gif.gif' border=0></a>";}
		//栏目
		$classname=$class_r[$r[classid]][classname];
		$classurl=sys_ReturnBqClassname($r,9);
		$bclassid=$class_r[$r[classid]][bclassid];
		$br['classid']=$bclassid;
		$bclassurl=sys_ReturnBqClassname($br,9);
		$bclassname=$class_r[$bclassid][classname];
	?>
	  <tr>
              <td><span class="listac icon17 fLeft"></span>
			  <a <?=$titleurl?>><?=$r[title]?></a> <?=$st?><?=$showtitlepic?></td>
              <td align="center"><a href='<?=$classurl?>' target='_blank'>[<?=$classname?>]</a></td>
              <td align="center"><font color='blue'><?=$checked?></font></td>
              <td align="center" style="font: 15px/30px Georgia,serif;"><?=$r[onclick]?></td>
              <td style="font: 15px/30px Georgia,serif;"><?=$newstime?></td>
              <td align="center"><a href="AddInfo.php?enews=MEditInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?><?=$addecmscheck?>" onclick="return confirm('修改后需要重新审核!');">修改</a> | <a href="ecms.php?enews=MDelInfo&classid=<?=$r[classid]?>&id=<?=$r[id]?>&mid=<?=$mid?><?=$addecmscheck?>" onclick="return confirm('确认要删除?');">删除</a></td>
            </tr>
     <? } ?>
  </tbody>           
            <tfoot>
              <tr>
                <td colspan="6"><div class="pages mTB10 fRight"><?=$returnpage?></div>
                  <div class="clear"></div></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>