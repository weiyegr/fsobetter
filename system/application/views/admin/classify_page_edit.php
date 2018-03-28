<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/main.css"/>
<link href="<?php echo base_url(); ?>ajax_upload/css/default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>ajax_upload/css/uploadify.css" rel="stylesheet" type="text/css" />
<script charset="utf-8" src="<?php echo base_url(); ?>system/plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ajax_upload/scripts/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>ajax_upload/scripts/jquery.uploadify.v2.1.0.min.js"></script>
<!--[if IE 6]>
    <script type="text/javascript" src="<?php echo $url; ?>js/DD_png-min.js"></script>
	<script type="text/javascript">
	DD_belatedPNG.fix('.nav,.txt,.main,.close,.main_bottom,.main_title,img');
	</script>
<![endif]-->
<title>编辑文章</title>
<script type="text/javascript">
$(document).ready(function() {
	var ida=0;
	$("#uploadify").uploadify({
		'uploader'       : '<?php echo base_url(); ?>ajax_upload/scripts/uploadify.swf',
		'script'         : '<?php echo base_url(); ?>ajax_upload/scripts/uploadify.php',
		'cancelImg'      : '<?php echo base_url(); ?>ajax_upload/cancel.png',
		'folder'         : '<?php echo base_url(); ?>photo',
		'queueID'        : 'fileQueue',
		'auto'           : true,
		'multi'          : true,
		'onComplete'     : function (event, queueID, fileObj, response, data) { 
		$("#kuozhang").append("<span id='ta' style='margin-right:10px;margin-botton:10px;'><input style='background-color:#CCCCCC;' name='images["+ida+"][name]' id='images["+ida+"][name]' type='text' value='"+fileObj.name+"' />&nbsp;&nbsp;<a><img class='a' src='<?php echo $url; ?>img/delete.png' width='8' height='8' /></a></span>");	 
        $(function(){
			$(".a").click(function(){
			$(this).parent().parent().remove();
			})
			})
			ida=ida+1;
        } 
	});
	
});
</script>
</head>

<body>
 <div id="container">
 <!--标题-->
  <?php $this->load->view('admin/header'); ?>
  <!--内容-->
  <div id="content" class="clearfix">
  <!--导航条-->
   <?php $this->load->view('admin/left'); ?>
   <!--右边-->
   <div class="contetn_right">
    <div class="main">
     <div id="TabbedPanels1" class="TabbedPanels">
       <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">编辑文章</div></div></li>
        <!--<li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">栏目属性</div></div></li>
        <li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">添加新的栏目</div></div></li>-->
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
          <div class="topcontent1 clearfix">
          <!--文章标题-->
		  <form id="page" name="page" class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/classify/page_update/" enctype="multipart/form-data">
		  
		  <?php if($type->titleor==1){ 
		  if($article->title!=''){
		  ?>
		  
		 <?php $i=0; foreach(explode('<------language------>',$article->title) as $li){ ?>
          <p class="clearfix"><span class="title_text"><label for="title">页面标题(<?php echo reset(explode('<------content------>',$li)); ?>)：</label></span><span class="title_in"><input class="title_in" type="text" name="title[<?php echo $i; ?>][name]" value="<?php echo end(explode('<------content------>',$li)); ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_title; ?&gt;<?php } ?></span></p>
		  <?php $i++; } ?>
		  <?php }else{ ?>
		  <?php $i=0; foreach($language as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">页面标题(<?php echo $li['language'] ?>)：</label></span><span class="title_in"><input class="title_in" type="text" name="title[<?php echo $i; ?>][name]"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_title; ?&gt;<?php } ?></span></p>
		  <?php $i++; } ?>
		  <?php } } ?>
		  
		  
		  
		  <input name="id" type="hidden" value="<?php echo $article->id; ?>" />
		  
		  <?php if($type->codeor==1){ 
				if($article->code!=''){
				?>
			 <?php $i=0; foreach(explode('<------language------>',$article->code) as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">型号 (<?php echo reset(explode('<------content------>',$li)); ?>)：</label></span><span class="title_in"><input class="title_in" type="text" name="code[<?php echo $i; ?>][name]" value="<?php echo end(explode('<------content------>',$li)); ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_code; ?&gt;<?php } ?></span></p>
		  <?php $i++; }}else{ ?>
		  <?php $i=0; foreach($language as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">型号(<?php echo $li['language'] ?>)：</label></span><span class="title_in"><input class="title_in" type="text" name="code[<?php echo $i; ?>][name]"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_code; ?&gt;<?php } ?></span></p>
		  <?php $i++; } ?>
		  <?php }} ?>
		  
		  <?php if($type->writeror==1){ ?>
		  <?php if($article->writer!=''){ ?>
		  <?php $i=0; foreach(explode('<------language------>',$article->writer) as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">作者 (<?php echo reset(explode('<------content------>',$li)); ?>)：</label></span><span class="title_in"><input class="title_in" type="text" name="writer[<?php echo $i; ?>][name]" value="<?php echo end(explode('<------content------>',$li)); ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_writer; ?&gt;<?php } ?></span></p>
		  <?php $i++; } ?>
		  <?php }else{ ?>
		  <?php $i=0; foreach($language as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">作者(<?php echo $li['language'] ?>)：</label></span><span class="title_in"><input class="title_in" type="text" name="writer[<?php echo $i; ?>][name]"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_writer; ?&gt;<?php } ?></span></p>
		  <?php $i++; } ?>
		  <?php }} ?>
		  
		  <?php if($type->priceor==1){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">价格：</label></span><span class="title_in"><input class="title_in" style="width:60px;" type="text" name="price" value="<?php echo $article->price; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive-&gt;price; ?&gt;<?php } ?></span></p>
		  <?php } ?>
		  
		  
		  <?php if($type->imageor==1){ ?>
		  <p style="padding-left: 110px"><?php if($article->image==''){echo '<img src="'.base_url().'uploads/none.jpg"';}else{echo '<img width="150" height="150" src="'.base_url().'uploads/'.$article->image.'"';} ?></p>
		  <p class="clearfix"><span class="title_text"><label for="title">缩略图片：</label></span><span class="title_in"><input class="title_in" type="file" name="userfile[]" /><input name="image" type="hidden" value="<?php echo $article->image; ?></span><br /><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive-&gt;image; ?&gt;<?php } ?></span></p><input name="imagexs" type="hidden" value="1">
		  <?php  }else{ ?><input name="imagexs" type="hidden" value="0"><?php } ?>
		  
		  <?php if($type->textor==1){ 
		  if($article->text!=''){?>
		  <?php $i=0; foreach(explode('<------language------>',$article->text) as $li){ ?>
		  <div class="editor">
		  <p style="font-weight:700; margin:10px;">内容(<?php echo reset(explode('<------content------>',$li)); ?>):</p>
		  <textarea id="your_editor_id<?php echo $i; ?>" name="text[<?php echo $i; ?>][name]" cols="100%" rows="8" style="width:100%;height:300px;"><?php echo end(explode('<------content------>',$li)); ?></textarea></div><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_text; ?&gt;<?php } ?>
		  <script> KE.show({ id : 'your_editor_id<?php echo $i; ?>' });</script>
		  <?php $i++; }}else{ ?>
		  <?php $i=0; foreach($language as $li){ ?>
		  <div class="editor">
		  <p style="font-weight:700; margin:10px;">内容(<?php echo $li['language'] ?>):</p>
		  <textarea id="your_editor_id<?php echo $i; ?>" name="text[<?php echo $i; ?>][name]" cols="100%" rows="8" style="width:100%;height:300px;"></textarea></div><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_text; ?&gt;<?php } ?>
		  <script> KE.show({ id : 'your_editor_id<?php echo $i; ?>' });</script>
		  <?php $i++; } ?>
		  <?php } } ?>
		  
		  
          <div class="clearfix" style="margin-left:300px; margin-top:10px;"><ul class="btnbg"><li><input type="submit" value="确认修改" class="btn" /></li></ul></div>
          </div> <!--.topcontent1-->
          <div class="topcontent2">
          <div class="tip">以下是选填信息，不填则系统自动完成</div>
          <!--附件信息-->
          
           <!--.att_bottom-->
          <!--附件信息-->
          <div class="att">自定义信息 <span>点击展开与关闭</span></div>
          <div class="att_bottom clearfix">
           <div class="attinfo">
            <div class="att_txt">
              <!--=========================================================================-->
              <!--文章标题-->
          <p class="clearfix"><span class="title_text"><label for="title">缩略名称：</label></span><span class="title_in"><input style="width:150px;" class="title_in" style="width:150px;" type="text" name="short" value="<?php echo $article->short; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive-&gt;short; ?&gt;<?php } ?></span></p>
		  
		  
		  
		  <?php if($type->timeor==1){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">发布时间：</label></span><span class="title_in"><input class="title_in" style="width:100px;" type="text" name="time" value="<?php if($article->time!=''){ echo $article->time;}else{ echo date("Y-m-d");} ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive-&gt;time; ?&gt;<?php } ?></span></p>
		  <?php } ?>
		  
		  <?php if($type->numor==1){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">排序：</label></span><span class="title_in"><input class="title_in" style="width:30px;" type="text" name="num" value="<?php echo $article->num; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive-&gt;num; ?&gt;<?php } ?></span></p>
		  <?php } ?>
		  
		  <?php if($type->web_titleor==1){ 
		  if($article->web_title!=''){ ?>
		  
			  <?php $i=0; foreach(explode('<------language------>',$article->web_title) as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">网页标题(<?php echo reset(explode('<------content------>',$li)); ?>)：</label></span><span class="title_in"><input class="title_in" type="text" name="web_title[<?php echo $i; ?>][name]" value="<?php echo end(explode('<------content------>',$li)); ?>"></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_web_title; ?&gt;<?php } ?></span></p>
		  <?php $i++; } 
		  }else{ ?>
          <?php $i=0; foreach($language as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">网页标题(<?php echo $li['language'] ?>)：</label></span><span class="title_in"><input class="title_in" type="text" name="web_title[<?php echo $i; ?>][name]"></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_web_title; ?&gt;<?php } ?></span></p>
		  
		  <?php $i++; } ?>
		  <?php } } ?>
		  
		  <?php if($type->web_keywordor==1){ 
		  if($article->web_keyword!=''){?>
		  <?php $i=0; foreach(explode('<------language------>',$article->web_keyword) as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">关键词(<?php echo reset(explode('<------content------>',$li)); ?>)：</label></span><span class="title_in"><textarea rows="5" name="web_keyword[<?php echo $i; ?>][name]" class="words"><?php echo end(explode('<------content------>',$li)); ?></textarea></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_web_keyword; ?&gt;<?php } ?></span></p>
		  <?php $i++; } }else{ ?>
          <?php $i=0; foreach($language as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">关键词(<?php echo $li['language'] ?>)：</label></span><span class="title_in"><textarea rows="5" name="web_keyword[<?php echo $i; ?>][name]" class="words"></textarea></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_web_keyword; ?&gt;<?php } ?></span></p>
		  
		  <?php $i++; } ?>
		  <?php } } ?>
		  
		  <?php if($type->web_describeor==1){   
		  if($article->web_describe!=''){?>
		  <?php $i=0; foreach(explode('<------language------>',$article->web_describe) as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">描述(<?php echo reset(explode('<------content------>',$li)); ?>)：</label></span><span class="title_in"><textarea rows="5" class="words" name="web_describe[<?php echo $i; ?>][name]"><?php echo end(explode('<------content------>',$li)); ?></textarea></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_web_describe; ?&gt;<?php } ?></span></p>
		  <?php $i++; } }else{ ?>
          <?php $i=0; foreach($language as $li){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">描述(<?php echo $li['language'] ?>)：</label></span><span class="title_in"><textarea rows="5" class="words" name="web_describe[<?php echo $i; ?>][name]"></textarea></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive_web_describe; ?&gt;<?php } ?></span></p>
	      <?php $i++; } ?>
		  <?php } } ?>
		  <?php if($type->fileor==1){ ?>
		  <p class="clearfix"><span class="title_text"><label for="title">文件附件：</label></span><span class="title_in"><input class="title_in" type="file" name="userfile[]" /><input name="image" type="hidden" value="<?php echo $article->image; ?>"> <a href="<?php echo base_url(); ?>uploads/<?php echo $article->file; ?>">下载</a></span><span class="tips"><?php if(get_cookie('adminid')==1){ ?>标签：&lt;?php echo $archive-&gt;file; ?&gt;<?php } ?></span></p><input name="filexs" type="hidden" value="1">
		  <?php }else{ ?><input name="filexs" type="hidden" value="0"><?php } ?>
		  
		   
		  
		  
              <!--=========================================================================-->
            </div>
           </div>
          </div> <!--.att_bottom-->
          </div> <!--.topcontent2-->
          <div class="bottom_info clearfix" id="close1">
          <div class="bottom_info2">
		  <?php if(get_cookie('adminid')==1){ ?><p> 地址：<?php echo base_url(); ?>index.php/pages/index/<?php echo $article->short; ?></p><?php } ?>
          <div class="bottom_info_img"><img src="<?php echo $url ?>images/info_tishi.png" width="16" height="15" alt="info_img" /></div>
          <p>排序规则：优先以排序编号逆向排序，次以栏目ID正向排序。</p>
          <p>栏目级别：通过点击前面的展开合拢小图标进行栏目多级别的操作，更直观地看到自己的栏目状况。</p>
          <span onclick="info_close1()"></span>
          <div class="bottom_info1"></div>
          </div>
         </div><!--.bottom_info-->
         </div> <!--.tab_content-->
        </div>
      </div>
     </div>
     <div class="main_bottom"></div>
    </div>
   </div>
   </div>
   <!--版权-->
   <div id="footer" class="clearfix">
    <div class="footer_info">
     <p class="date">Copyright © 2002-2012 WEIYEGR. 版权所有</p>
     <p class="help"><a href="#">帮助</a> | <a href="#">联系我们</a></p>
    </div>
   </div>
 </div>

<script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
