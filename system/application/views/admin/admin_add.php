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
<title>添加管理员</title>
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">添加管理员</div></div></li>
        <!--<li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">栏目属性</div></div></li>
        <li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">添加新的栏目</div></div></li>-->
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
          <div class="topcontent1 clearfix">
          <!--文章标题-->
		  <form id="page" name="page" class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/admin/add/" enctype="multipart/form-data">
          <p class="clearfix"><span class="title_text"><label for="title">帐号名称：</label></span><span class="title_in"><input id="posttitle" type="text" name="user" value="在此输入标题..."/></span><span class="tips"></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">管理级别：</label></span><span class="title_in"><select id="category_id" class="optioninput" name="ad_id" class="select">
                        <option value="0">操作员</option>
							<option value="1">管理员</option>
                        </select></span><span class="tips"></span></p>
		  
		  <?php if(get_cookie('adminid')==1){ ?>			
		  <p class="clearfix"><span class="title_text"><label for="title">管理类型：</label></span><span class="title_in"><select id="category_id" class="optioninput" name="admin_id" class="select">
                        <option value="0">管理</option>
							<option value="1">制作</option>
                        </select></span><span class="tips"></span></p>
		  <?php }else{ ?>
		  <input type="hidden" name="admin_id" value="0"/>
		  <?php } ?>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">用户密码：</label></span><span class="title_in"><input id="posttitle" type="password" name="password"/></span><span class="tips"></span></p>
		  
		  
          
          <div class="clearfix" style="padding-left:50px;"><ul class="btnbg"><li><input type="submit" value="确认添加" class="btn" /></li></ul></div>
		  </form>
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
