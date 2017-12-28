<?php
if(!defined('InEmpireCMS'))
{
	exit();
}
$public_diyr['pagetitle']='会员登录';
require(ECMS_PATH.'e/template/member/head.php');
?>
<div class="container">
<div class="container-bd">
<div class="login_con">
  <div class="login_con_center">
    <div class="login_account boxshadow">
      <div class="login_account_left">
        <ul class="login_account_con">
          <li> <span class="adv_ico1"></span>
            <div class="login_account_advertising">
              <h2>清新会员界面</h2>
              <p class="login_account_text">加入我们带给你不一样的阅读体验</p>
            </div>
          </li>
          <li> <span class="adv_ico2"></span>
            <div class="login_account_advertising">
              <h2>会员积分特权</h2>
              <p class="login_account_text">加入会员有机会得到更多的人气哟</p>
            </div>
          </li>
          <li> <span class="adv_ico3"></span>
            <div class="login_account_advertising">
              <h2>关注了解我们</h2>
              <p class="login_account_text">足不出户阅尽天下美文</p>
            </div>
          </li>
        </ul>
      </div>
      <div class="login_account_right "> 
        <div class="login_account_center" style="border-left:1px #ccc dashed" id="show_userinfo"></div>
      </div>
    </div>
  </div>
</div>
</div>
 <script type="text/javascript" src="<?=$public_r['newsurl']?>e/member/ajaxlog/login.php?loadjs=1"></script>
<div class="c1 container-bottom"></div>
</div>
<div class="footer">
<?=$public_r['add_www_92game_net_by']?>
</div>
</body>
</html>