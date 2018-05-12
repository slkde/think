<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wamp64\www\think\public/../application/pyadminurl\view\login\login.html";i:1525961146;}*/ ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/static/Admin/Login/css/style.css" tppabs="css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="/static/Admin/Login/js/jquery.js"></script>
<script src="/static/Admin/Login/js/verificationNumbers.js" ></script>
<script src="/static/Admin/Login/js/Particleground.js" ></script>
<script src="/static/Admin/Login/js/login.js" ></script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong><?php echo config('WEB_NAME'); ?></strong>
  <em>Management System</em>
 </dt>
 <dd class="user_icon">
  <input type="text"  name = "username" placeholder="账号" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" name ="password" placeholder="密码" class="login_txtbx"/>
 </dd>
 <dd class="val_icon">
  <div class="checkcode">
    <input type="text" id="J_codetext" name = "captcha" placeholder="验证码" maxlength="4" class="login_txtbx" >
  </div>
      <img id='captcha' src="<?php echo url('Login/captcha'); ?>" alt="captcha"  style="float:right;"/>
 </dd>
 <dd>
  <input type="button" value="立即登陆" class="submit_btn"/>
 </dd>
 <dd>
  <p>Copyright ©2016-2017 北京翼晰科技有限公司 </p>
  <p>京ICP备16046753号</p>
 </dd>
</dl>
</body>
</html>
