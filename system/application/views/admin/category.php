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
<title>栏目</title>
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">栏目列表</div></div></li>
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
         <div class="tab_content">
          <div class="clearfix">
           <div class="topbtn1"><ul class="btnbg">
		   <?php if(get_cookie('adminid')==1){ ?>
		   <li><input type="button" value="添加新栏目" onclick='location.href="<?php echo base_url(); ?>index.php/admin/classify/classify_add"' class="btn" /></li>
		   <?php } ?>
		   </ul></div>
           <div class="topbtn2"><!--<input type="text" value="输入关键字..." class="search_txt" /><input type="submit" value="筛选" class="search_btn" />-->温馨提示：点击栏目进入文章管理！</div>
          </div> 
<table class="maintable" width="100%" border="0" cellspacing="0" cellpadding="0">
<thead>
  <tr>
    <th width="*" class="thename">栏目名称</th>
    <th width="100px">类型</th>
    <th width="40px">ID</th>
    <th width="80px">排序</th>
    <th width="120px">操作</th>
  </tr>
</thead>
<tbody>
  <?php $this->classify_list->display_list(0,0); ?>
</tbody>
<tfoot>
<tr>
<td colspan="7">
</td>
</tr>
</tfoot>
</table>

          
         </div>
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
<script language="javascript">
		$("document").ready(function(){	
		$("input[name='categorynum']").blur(function(){
					var ida=$(this).attr("id");
					var idnum=$(this).val();
					
					
					
						$.get("<?php echo base_url(); ?>index.php/admin/classify/update_num/"+ida+'/'+idnum, function(data){
							
						});
					})
					
		})	
</script>
</body>
</html>
