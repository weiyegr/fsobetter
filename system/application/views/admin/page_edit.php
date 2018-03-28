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
	var xi;
	var imagesarr = new Array();
	<?php foreach($image_list as $li)
	{
	echo 'xi=imagesarr.push("'.$li['filename'].'");
	$("#kuozhang").append("<span id=\'ta\' style=\'margin-right:10px;margin-botton:10px;\'><img src=\''.base_url().'uploads/'.$li['filename'].'\' widt=\'20\' height=\'20\'>&nbsp;&nbsp;<a><img class=\'a\' id=\'"+(xi-1)+"\' src=\''.$url.'images/delete.png\' width=\'8\' height=\'8\' /></a></span>");';
	} ?>
	$("input[name='imagesarr']").val(imagesarr);
	$("#uploadify").uploadify({
		'uploader'       : '<?php echo base_url(); ?>ajax_upload/scripts/uploadify.swf',
		'script'         : '<?php echo base_url(); ?>index.php/admin/home/upload/<?php echo $archive->id; ?>',
		'cancelImg'      : '<?php echo base_url(); ?>ajax_upload/cancel.png',
		'folder'         : '<?php echo base_url(); ?>uploads',
		'queueID'        : 'fileQueue',
		'auto'           : true,
		'multi'          : true,
		'onComplete'     : function (event, queueID, fileObj, response, data) { 
		xi=imagesarr.push(fileObj.name);
		$("#kuozhang").append("<span id='ta' style='margin-right:10px;margin-botton:10px;'><img src='<?php echo base_url(); ?>uploads/"+fileObj.name+"' widt='20' height='20'>&nbsp;&nbsp;<a><img class='a' id='"+(xi-1)+"' src='<?php echo $url; ?>images/delete.png' width='8' height='8' /></a></span>");
		$("input[name='imagesarr']").val(imagesarr);
            $(function(){
				$(".a").click(function(){
				    var ida=$(this).attr("id");
					$.get("<?php echo base_url(); ?>index.php/admin/home/dellet/<?php echo $archive->id; ?>/"+imagesarr[ida], function(data){});
					delete imagesarr[ida];
					$(this).parent().parent().remove();
					$("input[name='imagesarr']").val(imagesarr);
				})
			})
			
        } 
	});
	 $(function(){
				$(".a").click(function(){
				    var ida=$(this).attr("id");
					$.get("<?php echo base_url(); ?>index.php/admin/home/dellet/<?php echo $archive->id; ?>/"+imagesarr[ida], function(data){});
					delete imagesarr[ida];
					$(this).parent().parent().remove();
					$("input[name='imagesarr']").val(imagesarr);
				})
			})
	
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
		  <form id="page" name="page" class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/home/update/" enctype="multipart/form-data">
		  
		  <input type="hidden"  name="id" value="<?php echo $archive->id; ?>"/>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">标题：</label></span><span class="title_in"><input class="title_in" type="text"  name="title" value="<?php echo $archive->title; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->title; ?>');} ?></span></p>
		  
		  <?php foreach($type_meta as $li){ ?>
		  
		  <?php 
		  switch($li['type']){
            case 0:
		  ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><input class="title_in" type="text"  name="<?php echo $li['fetch']; ?>" value="<?php echo $archive->$li['fetch']; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->'.$li['fetch'].'; ?>');} ?></span></p>
		  <?php 
		     break;
			 case 1:
          ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><textarea rows="5" name="<?php echo $li['fetch']; ?>" class="words"><?php echo $archive->$li['fetch']; ?></textarea></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->'.$li['fetch'].'; ?>');} ?></span></p>
		  <?php 
		     break;
			 case 2:
          ?>
		    <input name="<?php echo $li['fetch']; ?>" type="hidden" value="<?php echo $archive->$li['fetch']; ?>">
		  <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><?php if($archive->$li['fetch']==''){echo '<img src="'.base_url().'uploads/none.jpg" width="100" height="100">';}else{echo '<img  src="'.base_url().'uploads/100.100.'.$archive->$li['fetch'].'" width="100" height="100">';} ?><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" /></span><span><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->'.$li['fetch'].'; ?>');} ?></span></p>
		  <?php 
		     break;
			 case 3:
          ?>
		  <input name="<?php echo $li['fetch']; ?>" type="hidden" value="<?php echo $archive->$li['fetch']; ?>">
		  <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" />
		  <?php if(($archive->$li['fetch'])!=''){echo ($archive->$li['fetch']).' <a target="brank" href="'.base_url().'uploads/'.($archive->$li['fetch']).'">点击下载</a>';}else{echo '无文件';} ?>
		  </span> <span><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->'.$li['fetch'].'; ?>');} ?></span></p>
		  <?php 
		     break;
			 case 4:
          ?>
		  
		  
		  
		  <p>
		    <div class="editor"><span class="title_text"><?php echo $li['title']; ?>：</span><br /><textarea id="<?php echo $li['fetch']; ?>" name="<?php echo $li['fetch']; ?>" cols="100%" rows="8" style="width:100%;height:300px;"><?php echo $archive->$li['fetch']; ?></textarea></div>
			 <span><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->'.$li['fetch'].'; ?>');} ?></span>
		    <script> KE.show({ id : '<?php echo $li['fetch']; ?>' });</script>
			</p>
		  <?php 
		    break;
			case 5:
			?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in">
			<select name="<?php echo $li['fetch']; ?>">	
			        <?php foreach(explode(';',$li['selectlist']) as $lis){ ?>
				      <option value="<?php echo end(explode(',',$lis)); ?>" <?php if($archive->$li['fetch']==end(explode(',',$lis))){ echo 'selected="selected"';} ?>><?php echo reset(explode(',',$lis)); ?></option>
					<?php } ?>
            </select>
			</span><span><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->'.$li['fetch'].'; ?>');} ?></span></p>
		  <?php 
			}
          } ?>
		  
		  
          <div class="clearfix" style="margin-left:300px; margin-top:10px;"><ul class="btnbg"><li><input type="submit" value="确认修改" class="btn" /></li></ul></div>
          </div> <!--.topcontent1-->
          <div class="topcontent2">
          <div class="tip">以下是选填信息，不填则系统自动完成</div>
          <!--附件信息-->
		  <?php if($imagelist==1){ ?>
          <div class="att">图片库 <span>点击展开与关闭</span></div>
          <div class="att_bottom clearfix">
           <div class="attinfo">
            <div class="att_txt">
              <!--=========================================================================-->
              <!--文章标题-->
              <div id="fileQueue"></div>
                    <input type="file" name="uploadify" id="uploadify" />
                    <p>&nbsp;</p><?php if(get_cookie('adminid')==1){ ?>&lt;?php echo $archive_i; ?&gt;<?php } ?>
                    <p id="kuozhang"></p>
              <!--=========================================================================-->
            </div>
           </div>
          </div> <!--.att_bottom-->
		  <?php } ?>
          <!--附件信息-->
          <div class="att">自定义信息 <span>点击展开与关闭</span></div>
          <div class="att_bottom clearfix">
           <div class="attinfo">
            <div class="att_txt">
              <!--=========================================================================-->
              <!--文章标题-->
			  
			  
          <p class="clearfix"><span class="title_text"><label for="title">页面关键词：</label></span><span class="title_in"><input class="title_in" style="width:294px;" type="text" name="keywords" value="<?php echo $archive->keywords; ?>"/></span><span class="tips"></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">页面描述：</label></span><span class="title_in"><textarea rows="5" name="description" class="words"><?php echo $archive->description; ?></textarea></span><span class="tips"></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">发布时间：</label></span><span class="title_in"><input class="title_in" style="width:100px;" type="text" name="addtime" value="<?php echo $archive->addtime; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->addtime; ?>');} ?></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">修改时间：</label></span><span class="title_in"><input class="title_in" style="width:100px;" type="text" name="edittime" value="<?php echo $archive->edittime; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->edittime; ?>');} ?></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">排序：</label></span><span class="title_in"><input class="title_in" style="width:30px;" type="text" name="num" value="<?php echo $archive->num; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->num; ?>');} ?></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">缩略url：</label></span><span class="title_in"><input style="width:150px;" class="title_in" style="width:150px;" type="text" name="short" value="<?php echo $archive->short; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $archive->short; ?>');} ?></span></p>
		  <input name="parentid" type="hidden" value="<?php echo $id; ?>" />
		  
		  
              <!--=========================================================================-->
            </div>
           </div>
          </div> <!--.att_bottom-->
          </div> <!--.topcontent2-->
          <div class="bottom_info clearfix" id="close1">
          <div class="bottom_info2">
		  <?php if(get_cookie('adminid')==1){ echo '<p> 地址：'.htmlentities('<?php echo base_url(); ?>').'index.php/category/post/'.$archive->short.'</p>'; } ?>
		  <?php if(get_cookie('adminid')==1){ echo '<p> 图片库返回数组：'.htmlentities('<?php foreach($this->classl->imagelist($id) as $li){} ?>').'</p>'; } ?>
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
