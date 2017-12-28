<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='消息列表';
require(ECMS_PATH.'e/template/member/head.user.php');
?>
<div class="wrapper lineT">
  <div class="mainBox">
    <div class="main">
   <?php require(ECMS_PATH.'e/template/member/left.user.php'); ?>
<div class="dedeMain">
        <div class="location">
		  <span class="fLeft">我收到的短消息</span>
		  <span class="fRight mR10 titPublish icon">
		  <a href='/e/member/msg/AddMsg/?enews=AddMsg'>发送消息</a></span>
		  </div>
        <div class="titleTabBar bgGreen lineTB">
 <div class="fLeft">	
 <ul>
            <li><a href="/e/member/msg/AddMsg/?enews=AddMsg">写新消息</a></li>
            <li  class="select"><a href="#">收件箱</a></li>
          </ul>
 </div>	    
        </div>
        <div class="mL10 mR10 mTB10 minhg">
		 <table cellspacing="1" class="list">
          <form name="listmsg" method="post" action="../doaction.php" onsubmit="return confirm('确认要删除?');">
		     <thead>
              <tr>
                <th width="10%">选择</th>
                <th>标题</th>
                <th width="10%">发送者</th>
                <th width="8%">发送时间</th>
                <th width="10%">操作</th>
              </tr>
            </thead>
			   <tbody> 
            <?php
			while($r=$empire->fetch($sql))
			{
				$img="haveread";
				if(!$r[haveread])
				{
					$img="nohaveread";
			    }
				$font="";
				if(!$r[haveread])
				{
					$font=" style=color:red";
			    }
				//后台管理员
				if($r['isadmin'])
				{
					$from_username="<a title='后台管理员'><b>".$r[from_username]."</b></a>";
				}
				else
				{
					$from_username="<a href='/user/".$r[from_userid]."/' target='_blank'>".$r[from_username]."</a>";
				}
				//系统信息
				if($r['issys'])
				{
					$from_username="<b>系统消息</b>";
					$r[title]="<b>".$r[title]."</b>";
				}
			?>
            <tr>
			 <td align="center"><input name="mid[]" type="checkbox" id="mid[]2" value="<?=$r[mid]?>"></td>
              <td><img src="../../data/images/<?=$img?>.gif" border=0>  <a href="ViewMsg/?mid=<?=$r[mid]?>"<?=$font?>>&nbsp;&nbsp;<?=stripSlashes($r[title])?></a></td>
              <td align="center"><?=$from_username?></td>
              <td style="font: 15px/30px Georgia,serif;"><?=$r[msgtime]?></td>
              <td align="center">[<a href="../doaction.php?enews=DelMsg&mid=<?=$r[mid]?>" onclick="return confirm('确认要删除?');">删除</a>]</td>
            </tr>
            <?php
			}
			?>
			 <tr bgcolor="#FFFFFF"> 
              <td><div align="center"><input type=checkbox name=chkall value=on onclick=CheckAll(this.form)></div></td>
              <td colspan="4"><input type="submit" name="Submit2" value="删除选中"> &nbsp;&nbsp;&nbsp;&nbsp;
                <input name="enews" type="hidden" value="DelMsg_all">
				说明：<img src="../../data/images/nohaveread.gif" width="14" height="11"> 
                  代表未阅读消息，<img src="../../data/images/haveread.gif" width="15" height="12"> 
                  代表已阅读消息.
				</td>
            </tr>
		    </tbody>           
            <tfoot>
            <tr>
                <td colspan="5"><div class="pages mTB10 fRight"> <?=$returnpage?>  </div>
                  <div class="clear"></div></td>
              </tr>
            </tfoot>
			 </form>
        </table>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<script>
function CheckAll(form)
  {
  for (var i=0;i<form.elements.length;i++)
    {
    var e = form.elements[i];
    if (e.name != 'chkall')
       e.checked = form.chkall.checked;
    }
  }
</script> 
<?php require(ECMS_PATH.'e/template/member/foot.user.php'); ?>