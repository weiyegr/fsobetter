<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/main.css"/>
<!--[if IE 6]>
    <script type="text/javascript" src="<?php echo $url; ?>js/DD_png-min.js"></script>
	<script type="text/javascript">
	DD_belatedPNG.fix('.nav,.txt,.main,.close,.main_bottom,.main_title,img');
	</script>
<![endif]-->
<title>留言字段</title>
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">留言字段</div></div></li>
        <!--<li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">栏目属性</div></div></li>
        <li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">添加新的栏目</div></div></li>-->
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
          <div class="topcontent1 clearfix">
          <!--文章标题-->
		  
		  <form class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/message/add_meta" enctype="multipart/form-data">
			  <span class="title_in">标题<input style="width:50px;" type="text" name="title"/></span>
			  <span class="title_in">字段名<input style="width:50px;" type="text" name="fetch"/></span>
			  
			  <span class="title_in">
			  类型<select name="type">
				      <option value="0">文本框</option>
					  <option value="1">文本域</option>
					  <option value="2">图片</option>
					  <option value="3">文件</option>
					  <option value="4">文章</option>
					  
					  
				  </select>&nbsp;
			  </span>
			  <span class="title_in">图片宽度<input style="width:40px;" type="text" name="width" value="100"/>&nbsp;</span>
			  <span class="title_in">图片高度<input style="width:40px;" type="text" name="height" value="100"/>&nbsp;</span>
			  
		   
			   <input type="submit" value="确认添加" />
			   </form>
		  
		    <?php foreach($message_meta as $li){ ?>
			  <p style="font-size:14px;">
			  <?php echo '[<a href="'.base_url().'index.php/admin/message/del_meta/'.$li['id'].'">删除</a>]'; ?> 标题:<?php echo $li['title']; ?> 字段名:<?php echo $li['fetch']; ?> 类型:
			  <?php 
			  switch($li['type']){
				case 0:
				  echo '文本框';
				  break;  
				case 1:
				  echo '文本域';
				  break;  
				case 2:
				  echo '图片';
				  break;  
				case 3:
				  echo '文件';
				  break;  
				case 4:
				  echo '文章';
				  break;  
				}
			  ?> 宽度：<?php echo $li['width']; ?> 高度：<?php echo $li['height']; ?>
			  </p>
			  <?php } ?>
		  
          
          
		  
          </div> <!--.topcontent1-->
          <div class="topcontent2">
         

          
          </div> <!--.topcontent2-->
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
<script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
