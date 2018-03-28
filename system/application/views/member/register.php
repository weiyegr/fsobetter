<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0038)http://www.haotm.cn/index.aspx -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>会员注册</title>
<script src="<?php echo $url; ?>js/main.js"></script>
<script src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/overhtml.css"/>
<style>
html {
	overflow-y:hidden;
}
</style>
<script language="javascript">
    $("document").ready(function(){
        $("input[name='sendto']").click(function(){
            if($("input[name='password']").val()==$("input[name='repassword']").val()){
	            $.post("<?php echo base_url();?>index.php/member/reg",$("#testform").serialize(),function(data){
	                alert(data);
	                if(data!='用户名已存在请换用其他用户名'){
	                    history.go(0);
	                }
	            })
            }else{
                alert('密码与确认密码必须一致');
            }
        })
    })
</script>
</head>
<body>
<div id="overwarp">
<form id="testform" method="post" action="/">
<ul class="overform">
<li class="clearfix">
<label class="overformtitle">用户名</label>
<div class="overformdiv"><input type="text" name="username" class="txt" value="" /></div>
<span class="must">*</span>
</li>
<li class="clearfix">
<label class="overformtitle">密码</label>
<div class="overformdiv"><input type="password" name="password" class="txt" value="" /></div>
<span class="must">*</span>
</li>
<li class="clearfix">
<label class="overformtitle">确认密码</label>
<div class="overformdiv"><input type="password" name="repassword" class="txt" value="" /></div>
<span class="must">*</span>
</li>
  <?php
  $i=0;
  foreach($memberfield as $list){
  $title=$list['title'];
  $keyword=$list['keyword'];
  ?>
	<li class="clearfix">
	<label class="overformtitle"><?php echo $title; ?></label>
	<div class="overformdiv">
	
	<?php if($list['type']=='1'){ ?>
        <input id="password" class="txt" type="text" name="member[<?php echo $i; ?>][value]"/>
    <?php }else if($list['type']=='2'){ ?>
        <textarea class="txt" style="height:60px;" rows="5" name="member[<?php echo $i; ?>][value]" class="words"></textarea>
    <?php }else if($list['type']=='3'){ ?>
        <select class="txt" name="member[<?php echo $i; ?>][value]"><?php foreach(explode(';',$list['property']) as $list){ ?><option value="<?php echo reset(explode(',',$list)); ?>"><?php echo end(explode(',',$list)); ?></option><?php } ?></select>
    <?php } ?>
	
	</div>
	<span class="ccc"></span>
	</li>
	<input name="member[<?php echo $i; ?>][keyword]" type="hidden" value="<?php echo $keyword; ?>" />
	<input name="member[<?php echo $i; ?>][title]" type="hidden" value="<?php echo $title; ?>" />
  <?php $i++; } ?>

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