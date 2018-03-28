<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0038)http://www.haotm.cn/index.aspx -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>会员登录</title>
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>css/overhtml.css"/>
<script src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<style>
html {
	overflow-y:hidden;
}

</style>
<script language="javascript">
    $("document").ready(function(){
        $("input[name='sendto']").click(function(){
            $.post("<?php echo base_url();?>index.php/member/login",$("#loginform").serialize(),function(data){
                alert(data);
                if(data.replace(/(^\s*)|(\s*$)/g, "")=='登陆成功'){
                    window.parent.location.reload();
                }
            })
        })
    })
</script>
</head>
<body onload="">
<div id="overwarp">
<form id="loginform" method="post">
<ul class="overform">
<li class="clearfix">
<label class="overformtitle">用户名</label>
<div class="overformdiv"><input type="text" name="username" class="txt"/></div>
<span class="ccc">填写你的用户名</span>
</li>
<li class="clearfix">
<label class="overformtitle">密码</label>
<div class="overformdiv"><input type="password" name="password" class="txt"/></div>
<span class="ccc">填写你的登录密码</span>
</li>
<li class="clearfix">
<label class="overformtitle">&nbsp;</label>
<div class="overformdiv">
<input type="button" name="sendto" class="submittxt" value="提交" >
</div>
</li>
</ul>
</form>
</div>
</body>
</html>