<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0038)http://www.haotm.cn/index.aspx -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>会员信息修改</title>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/overhtml.css"/>
<style>
html {
	overflow-y:hidden;
}
</style>
<script language="javascript">

    $("document").ready(function(){
        $("input[name='sendto']").click(function(){
	            $.post("<?php echo base_url();?>index.php/member/edit",$("#editform").serialize(),function(data){
	                alert(data);
	                window.parent.location.reload();
	            })
        })
    })

</script>
</head>
<body>
<div id="overwarp">
<form id="editform" method="post">
<ul class="overform">
<li class="clearfix">
<label class="overformtitle">用户名</label>
<div class="overformdiv">
<input type="text" readonly="" name="username" class="txt" value="<?php echo $member->username; ?>" />
<input id="uid" type="hidden" name="uid" value="<?php echo $member->uid; ?>"/>
</div>
<span class="ccc"></span>
</li>
<?php
  $i=0;
  foreach($memberfield as $list){
  $keyword=$list['keyword'];
?>
<li class="clearfix">
<label class="overformtitle"><?php echo $list['title']; ?></label>
<div class="overformdiv">

  <?php if($list['type']=='1'){ ?>
      <input id="password" class="txt" type="text" name="member[<?php echo $i; ?>][value]" value="<?php foreach($membermeta as $lista){if($keyword==$lista['meta_key']){echo $lista['meta_value'];}} ?>"/>
  <?php }else if($list['type']=='2'){ ?>
      <textarea class="txt" style="height:60px;" rows="5" name="member[<?php echo $i; ?>][value]" class="words"><?php foreach($membermeta as $lista){if($keyword==$lista['meta_key']){echo $lista['meta_value'];}} ?></textarea>
  <?php }else if($list['type']=='3'){ ?>
      <select class="txt" name="member[<?php echo $i; ?>][value]"><?php foreach(explode(';',$list['property']) as $list){ ?><option value="<?php echo reset(explode(',',$list)); ?>" <?php foreach($membermeta as $lista){if($keyword==$lista['meta_key']){if($lista['meta_value']==reset(explode(',',$list))){ echo 'selected';}}} ?>><?php echo end(explode(',',$list)); ?></option><?php } ?></select>
  <?php } ?>

</div>
<span class="ccc"></span>
</li>
  <input name="member[<?php echo $i; ?>][id]" type="hidden" value="<?php foreach($membermeta as $lista){if($keyword==$lista['meta_key']){echo $lista['id'];}} ?>" />
  <input name="member[<?php echo $i; ?>][keyword]" type="hidden" value="<?php echo $list['keyword']; ?>" />
  <input name="member[<?php echo $i; ?>][title]" type="hidden" value="<?php echo $list['title']; ?>" />
  <?php   $i++; } ?>
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