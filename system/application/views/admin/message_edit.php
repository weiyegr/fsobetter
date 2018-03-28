<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/main.css"/>
<script charset="utf-8" src="<?php echo base_url(); ?>system/plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>

<!--[if IE 6]>
    <script type="text/javascript" src="<?php echo $url; ?>js/DD_png-min.js"></script>
	<script type="text/javascript">
	DD_belatedPNG.fix('.nav,.txt,.main,.close,.main_bottom,.main_title,img');
	</script>
<![endif]-->
<title>编辑留言</title>

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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">编辑留言</div></div></li>
        <!--<li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">栏目属性</div></div></li>
        <li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">添加新的栏目</div></div></li>-->
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
          <div class="topcontent1 clearfix">
          <!--文章标题-->
		  <form id="page" name="page" class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/message/update/" enctype="multipart/form-data">
		  
		  <input type="hidden"  name="id" value="<?php echo $message->id; ?>"/>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">标题：</label></span><span class="title_in"><input class="title_in" type="text"  name="title" value="<?php echo $message->title; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('title');} ?></span></p>
		  
		  <?php foreach($message_meta as $li){ ?>
		  
		  <?php 
		  switch($li['type']){
            case 0:
		  ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><input class="title_in" type="text"  name="<?php echo $li['fetch']; ?>" value="<?php echo $message->$li['fetch']; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities($li['fetch']);} ?></span></p>
		  <?php 
		     break;
			 case 1:
          ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><textarea rows="5" name="<?php echo $li['fetch']; ?>" class="words"><?php echo $message->$li['fetch']; ?></textarea></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities($li['fetch']);} ?></span></p>
		  <?php 
		     break;
			 case 2:
          ?>
		    <input name="<?php echo $li['fetch']; ?>" type="hidden" value="<?php echo $message->$li['fetch']; ?>">
		  <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><?php if($message->$li['fetch']==''){echo '<img src="'.base_url().'image.php?file=none.jpg&width='.$li['width'].'&height='.$li['height'].'">';}else{echo '<img  src="'.base_url().'image.php?file='.$message->$li['fetch'].'&width='.$li['width'].'&height='.$li['height'].'">';} ?><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" /></span><span><?php if(get_cookie('adminid')==1){echo htmlentities($li['fetch']);} ?></span></p>
		  <?php 
		     break;
			 case 3:
          ?>
		  <input name="<?php echo $li['fetch']; ?>" type="hidden" value="<?php echo $message->$li['fetch']; ?>">
		  <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" />
		  <?php if(($message->$li['fetch'])!=''){echo ($message->$li['fetch']).' <a target="brank" href="'.base_url().'uploads/'.($message->$li['fetch']).'">点击下载</a>';}else{echo '无文件';} ?>
		  </span> <span><?php if(get_cookie('adminid')==1){echo htmlentities($li['fetch']);} ?></span></p>
		  <?php 
		     break;
			 case 4:
          ?>
		  
		  
		  
		  <p>
		    <div class="editor"><span class="title_text"><?php echo $li['title']; ?>：</span><br /><textarea id="<?php echo $li['fetch']; ?>" name="<?php echo $li['fetch']; ?>" cols="100%" rows="8" style="width:100%;height:300px;"><?php echo $message->$li['fetch']; ?></textarea></div>
			 <span><?php if(get_cookie('adminid')==1){echo htmlentities($li['fetch']);} ?></span>
		    <script> KE.show({ id : '<?php echo $li['fetch']; ?>' });</script>
			</p>
		  <?php 
		    break;
			}
          } ?>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">留言时间：</label></span><span class="title_in"><input class="title_in" type="text"  name="addtime" value="<?php echo $message->addtime; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('addtime');} ?></span></p>
		  
          <div class="clearfix" style="margin-left:300px; margin-top:10px;"><ul class="btnbg"><li><input type="submit" value="确认修改" class="btn" /></li></ul></div>
          </div> <!--.topcontent1-->
          <div class="bottom_info clearfix" id="close1">
          <div class="bottom_info2">
		 
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
