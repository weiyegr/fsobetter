<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/login.css"/>
<script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<!--[if IE 6]>
    <script type="text/javascript" src="<?php echo $url; ?>js/DD_png-min.js"></script>
	<script type="text/javascript">
	DD_belatedPNG.fix('.key,.user,.info p,.pwd,.btn,img');
	</script>
<![endif]-->
<title>后台管理</title>
</head>

<body>
 <div id="container">
 <!--标题-->
  <div class="title"> <img src="<?php echo $url; ?>images/loginlogo.png" width="600" height="66" alt="网站后台管理" /></div>
  <!--验证信息-->
  <div class="info">
   <?php  if($id==1): ?>
   <p><img src="<?php echo $url; ?>images/error.png" width="16" height="14" alt="error" />登陆失败：用户名或密码错误！ <a href="<?php echo base_url(); ?>index.php/admin/login/">重新登陆</a></p>
   <?php endif; ?>
  </div>
  <!--登录-->
  <div class="login">
   <div class="key"><img src="<?php echo $url; ?>images/key.png" width="150" height="172" alt="icon" /></div>
   <div class="txt">
   <form action="<?php echo base_url(); ?>index.php/admin/login/logining/" method="post">

    <p class="user"><label>帐户</label><span class="userimg"><img src="<?php echo $url; ?>images/userimg.png" width="18" height="18" alt="user" /></span><input name="username" type="text" class="user_txt" /></p>
    <p class="pwd"><label>密码</label><span class="typeimg"><img src="<?php echo $url; ?>images/typeimg.png" width="18" height="18" alt="type" /></span><input name="password" type="password" class="pwd_txt" /></p>
    <p class="sub">
    <span class="align-left"><input name="remember" type="checkbox" value="1" class="ck" /><label>保存这次登陆信息</label></span> 
    <span class="align-right"><input type="submit" name="submit" value="." class="btn"/></span> 
    </p>
    </form>
   </div>
  </div>
  <!--版权-->
  <div id="footer"></div>
 </div>
</body>
</html>