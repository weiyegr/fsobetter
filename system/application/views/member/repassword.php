<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0038)http://www.haotm.cn/index.aspx -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>会员密码修改</title>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/overhtml.css"/>
<style>
html {
	overflow-y:hidden;
}
</style>
<script language="javascript">

    $("document").ready(function(){
        $("input[name='password']").blur(function(){
	            $.get("<?php echo base_url();?>index.php/member/check_password/"+$("input[name='password']").val(),function(data){
                    if(data!='')alert(data);
	            })
        })

        $("input[name='sendto']").click(function(){
        	$.get("<?php echo base_url();?>index.php/member/check_password/"+$("input[name='password']").val(),function(data){
                if(data==''){
            
		            $.post("<?php echo base_url();?>index.php/member/edit_password",$("#passwordform").serialize(),function(data){
		                alert(data);
		                if(data!='新密码与确认新密码必须填写一致')
		                history.go(0);
		                
		            })
                }else{
                	alert(data);
                }
        	})
        })
        
    })

</script>
</head>
<body>
<div id="overwarp">
<form id="passwordform" method="post">
<ul class="overform">
<li class="clearfix">
<label class="overformtitle">旧密码</label>
<div class="overformdiv"><input type="text" name="password" class="txt" /></div>
<span class="ccc">如果修改密码，这项必填</span>
</li>
<li class="clearfix">
<label class="overformtitle">新密码</label>
<div class="overformdiv"><input type="text" name="newpassword" class="txt" /></div>
<span class="ccc">留空则不修改</span>
</li>
<li class="clearfix">
<label class="overformtitle">新密码确认</label>
<div class="overformdiv"><input type="text" name="newrepassword" class="txt" /></div>
<span class="ccc">留空则不修改</span>
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