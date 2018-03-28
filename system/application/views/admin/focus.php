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
<title>焦点视图</title>
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">焦点视图</div></div></li>
        <!--<li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">栏目属性</div></div></li>
        <li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">添加新的栏目</div></div></li>-->
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
         <?php if(get_cookie('adminid')==1){ ?>
          <p>
              焦点图盒子ID:<input style="width:80px;" type="text" name="idname" value="<?php echo $idname; ?>"/>&nbsp;
              风格名称:
			  <select style="width:120px;" name="pattern" id="pattern">
			      <option value="mF_51xflash" <?php if($pattern=='mF_51xflash'){ echo 'selected="selected"'; } ?>>mF_51xflash</option>
				  <option value="mF_classicHB" <?php if($pattern=='mF_classicHB'){ echo 'selected="selected"'; } ?>>mF_classicHB</option>
				  <option value="mF_classicHC" <?php if($pattern=='mF_classicHC'){ echo 'selected="selected"'; } ?>>mF_classicHC</option>
				  <option value="mF_expo2010" <?php if($pattern=='mF_expo2010'){ echo 'selected="selected"'; } ?>>mF_expo2010</option>
				  <option value="mF_fscreen_tb" <?php if($pattern=='mF_fscreen_tb'){ echo 'selected="selected"'; } ?>>mF_fscreen_tb</option>
				  <option value="mF_games_tb" <?php if($pattern=='mF_games_tb'){ echo 'selected="selected"'; } ?>>mF_games_tb</option>
				  <option value="mF_kiki" <?php if($pattern=='mF_kiki'){ echo 'selected="selected"'; } ?>>mF_kiki</option>
				  <option value="mF_ladyQ" <?php if($pattern=='mF_ladyQ'){ echo 'selected="selected"'; } ?>>mF_ladyQ</option>
				  <option value="mF_liquid" <?php if($pattern=='mF_liquid'){ echo 'selected="selected"'; } ?>>mF_liquid</option>
				  <option value="mF_liuzg" <?php if($pattern=='mF_liuzg'){ echo 'selected="selected"'; } ?>>mF_liuzg</option>
				  <option value="mF_pconline" <?php if($pattern=='mF_pconline'){ echo 'selected="selected"'; } ?>>mF_pconline</option>
				  <option value="mF_peijianmall" <?php if($pattern=='mF_peijianmall'){ echo 'selected="selected"'; } ?>>mF_peijianmall</option>
				  <option value="mF_pithy_tb" <?php if($pattern=='mF_pithy_tb'){ echo 'selected="selected"'; } ?>>mF_pithy_tb</option>
				  <option value="mF_qiyi" <?php if($pattern=='mF_qiyi'){ echo 'selected="selected"'; } ?>>mF_qiyi</option>
				  <option value="mF_quwan" <?php if($pattern=='mF_quwan'){ echo 'selected="selected"'; } ?>>mF_quwan</option>
				  <option value="mF_rapoo" <?php if($pattern=='mF_rapoo'){ echo 'selected="selected"'; } ?>>mF_rapoo</option>
				  <option value="mF_slide3D" <?php if($pattern=='mF_slide3D'){ echo 'selected="selected"'; } ?>>mF_slide3D</option>
				  <option value="mF_sohusports" <?php if($pattern=='mF_sohusports'){ echo 'selected="selected"'; } ?>>mF_sohusports</option>
				  <option value="mF_taobao2010" <?php if($pattern=='mF_taobao2010'){ echo 'selected="selected"'; } ?>>mF_taobao2010</option>
				  <option value="mF_taobaomall" <?php if($pattern=='mF_taobaomall'){ echo 'selected="selected"'; } ?>>mF_taobaomall</option>
				  <option value="mF_tbhuabao" <?php if($pattern=='mF_tbhuabao'){ echo 'selected="selected"'; } ?>>mF_tbhuabao</option>
				  <option value="mF_YSlider" <?php if($pattern=='mF_YSlider'){ echo 'selected="selected"'; } ?>>mF_YSlider</option>
			  </select>&nbsp;
              时间间隔:<select style="width:40px;" name="time" id="time">
			      <option value="1" <?php if($time=='1'){ echo 'selected="selected"'; } ?>>1</option>
				  <option value="2" <?php if($time=='2'){ echo 'selected="selected"'; } ?>>2</option>
				  <option value="3" <?php if($time=='3'){ echo 'selected="selected"'; } ?>>3</option>
				  <option value="4" <?php if($time=='4'){ echo 'selected="selected"'; } ?>>4</option>
				  <option value="5" <?php if($time=='5'){ echo 'selected="selected"'; } ?>>5</option>
				  <option value="6" <?php if($time=='6'){ echo 'selected="selected"'; } ?>>6</option>
				  <option value="7" <?php if($time=='7'){ echo 'selected="selected"'; } ?>>7</option>
				  <option value="8" <?php if($time=='8'){ echo 'selected="selected"'; } ?>>8</option>
				  
			  </select>&nbsp;
              切换模式:<select style="width:100px;" name="trigger" id="trigger">
			      <option value="click" <?php if($trigger=='click'){ echo 'selected="selected"'; } ?>>click</option>
				  <option value="mouseover" <?php if($trigger=='mouseover'){ echo 'selected="selected"'; } ?>>mouseover</option>  
			  </select><br />
          </p>
          <p>    
              主图区宽度:<input style="width:80px;" type="text" name="width" value="<?php echo $width; ?>"/>&nbsp;
              主图区高度:<input style="width:80px;" type="text" name="height" value="<?php echo $height; ?>"/>&nbsp;
          </p>
          <?php } ?>
          
          <div class="topcontent1 clearfix">
          
          <!--文章标题-->
		  <p class="clearfix">
		      <span class="title_in" style="width:120px; text-align:center;">标题&nbsp;</span>
			  <span class="title_in" style="width:120px; text-align:center;">说明&nbsp;</span>
			  <span class="title_in" style="width:120px; text-align:center;">连接&nbsp;</span>
			  <span class="title_in" style="width:120px; text-align:center;">图片</span>
		  </p>
		  <span id="contenting">
		  <?php foreach($memberfield as $item){ ?>
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/admin/focus/edit">
          <p class="clearfix">
		      <span class="title_in"><input style="width:120px;" type="text" name="title" value="<?php echo $item['title']; ?>"/>&nbsp;</span>
			  <span class="title_in"><input style="width:120px;" type="text" name="describe" value="<?php echo $item['describe']; ?>"/>&nbsp;</span>
			  <span class="title_in"><input style="width:120px;" type="text" name="link" value="<?php echo $item['link']; ?>"/>&nbsp;</span>
              <span class="title_in"><img width="130" height="130" src="<?php echo base_url(); ?>photo/<?php echo $item['image']; ?>"/><br /></span>&nbsp;&nbsp;<span class="uppointer" style="cursor:pointer;" id="<?php echo $item['id']; ?>">&uarr;</span>&nbsp;<span class="downpointer" style="cursor:pointer;" id="<?php echo $item['id']; ?>">&darr;</span> &nbsp; <button type="submit" class="edit" style="cursor:pointer;" id="<?php echo $item['id']; ?>">修改</button> &nbsp; <span class="del" style="cursor:pointer;" id="<?php echo $item['id']; ?>">删除</span>
          </p>
          <input type="hidden" name="id" value="<?php echo $item['id']; ?>"/>
          <input type="hidden" name="num" value="<?php echo $item['num']; ?>"/>
          </form>
		  <?php } ?>
		  </span>
		  
		  <div style="height:30px;"></div>
		  
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url();?>index.php/admin/focus/add">
          <p class="clearfix">
		      
		      <span class="title_in"><input style="width:120px;" type="text" name="title"/>&nbsp;</span>
			  <span class="title_in"><input style="width:120px;" type="text" name="describe"/>&nbsp;</span>
			  <span class="title_in"><input style="width:120px;" type="text" name="link"/>&nbsp;</span>
              <span class="title_in"><input style="width:120px;" type="file" name="userfile[]"/></span>&nbsp;
		   
			   <input type="submit" name="submita" value="确认添加" />
		  </p>
          </form>
		  
          </div> <!--.topcontent1-->
          <div class="topcontent2">
         

          
          </div> <!--.topcontent2-->
          <div class="bottom_info clearfix" id="close1">
          <div class="bottom_info2">
          <div class="bottom_info_img"><img src="<?php echo $url ?>images/info_tishi.png" width="16" height="15" alt="info_img" /></div>
          <p>图片大小：请把图片先调制成 宽：<?php echo $width; ?>  高：<?php echo $height; ?>，再作上传。</p>
          <p>栏目级别：通过点击前面的展开合拢小图标进行栏目多级别的操作，更直观地看到自己的栏目状况。</p>
          <span onclick="info_close1()"></span>
          <div class="bottom_info1"></div>
          </div>						
         </div><!--.bottom_info-->
         </div><!--.tab_content-->
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
<script type="text/javascript">
    
$("document").ready(function(){	
		
		$("input[name='idname']").blur(function(){
		    var namea=$("input[name='idname']").val();
			
				$.get("<?php echo base_url(); ?>index.php/admin/focus/change/"+namea+'/', function(data){})
			
		
		})
        
        $("#pattern").change(function(){
		    var namea=$("#pattern").val();
			
				$.get("<?php echo base_url(); ?>index.php/admin/focus/change1/"+namea+'/', function(data){})
			
		
		})
        
        $("#time").blur(function(){
		    var namea=$("#time").val();
			
				$.get("<?php echo base_url(); ?>index.php/admin/focus/change2/"+namea+'/', function(data){})
			
		
		})
        
        $("#trigger").blur(function(){
		    var namea=$("#trigger").val();
			
				$.get("<?php echo base_url(); ?>index.php/admin/focus/change3/"+namea+'/', function(data){})
			
		
		})
        
        $("input[name='width']").blur(function(){
		    var namea=$("input[name='width']").val();
			
				$.get("<?php echo base_url(); ?>index.php/admin/focus/change4/"+namea+'/', function(data){})
			
		
		})
        
        $("input[name='height']").blur(function(){
		    var namea=$("input[name='height']").val();
			
				$.get("<?php echo base_url(); ?>index.php/admin/focus/change5/"+namea+'/', function(data){})
			
		
		})
		
        
        
        
        
        $(".del").click(function(){
		    var ida=$(this).attr("id");
			if(confirm('确认要删除?此操作不可恢复!此操作将连同关联字段的记录一同删除!')){
				$.get("<?php echo base_url(); ?>index.php/admin/focus/del/"+ida+'/', function(data){
					var idb='#'+ida;
					$(idb).parent().remove().remove();
				})
			}
		
		})
		
		
		
		$(".uppointer").click(function(){
		    var ida=$(this).attr("id");
			var idb=$(this).parent().parent().prev().children().children(".uppointer").attr("id");
			if(idb != undefined){
				$.get("<?php echo base_url(); ?>index.php/admin/focus/move/"+ida+'/'+idb+'/', function(data){})
				}
			
		    $(this).parent().parent().after($(this).parent().parent().prev());
		})
		
		$(".downpointer").click(function(){
		    var ida=$(this).attr("id");
			var idb=$(this).parent().parent().next().children().children(".uppointer").attr("id");
			if(idb != undefined){
				$.get("<?php echo base_url(); ?>index.php/admin/focus/move/"+ida+'/'+idb+'/', function(data){})
				}
			
			$(this).parent().parent().next().after($(this).parent().parent());
		
		})
		
					
})


</script>
<script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
