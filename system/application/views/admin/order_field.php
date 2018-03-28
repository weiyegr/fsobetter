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
<title>会员字段</title>
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">会员字段</div></div></li>
        <!--<li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">栏目属性</div></div></li>
        <li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">添加新的栏目</div></div></li>-->
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
          <div class="topcontent1 clearfix">
          <!--文章标题-->
		  <p class="clearfix">
		      <span class="title_in" style="width:120px; text-align:center;">字段&nbsp;</span>
			  <span class="title_in" style="width:100px; text-align:center;">类型&nbsp;</span>
			  <span class="title_in" style="width:120px; text-align:center;">标题&nbsp;</span>
			  <span class="title_in" style="width:120px; text-align:center;">参数</span>
		  </p>
		  <span id="contenting">
		  <?php foreach($orderfield as $item){ ?>
          <p class="clearfix">
		      <span class="title_in"><input style="width:120px;" type="text" name="keyword<?php echo $item['id']; ?>" value="<?php echo $item['keyword']; ?>"/>&nbsp;</span>
			  <span class="title_in">
			      <select id="type<?php echo $item['id']; ?>">		
				      <option value="1" <?php if($item['type']=='1'){ echo 'selected="selected"';} ?>>文本框</option>
					  <option value="2" <?php if($item['type']=='2'){ echo 'selected="selected"';} ?>>文本域</option>
					  <option value="3" <?php if($item['type']=='3'){ echo 'selected="selected"';} ?>>选择框</option>
				  </select>&nbsp;
			  </span>
			  <span class="title_in"><input style="width:120px;" type="text" name="title<?php echo $item['id']; ?>" value="<?php echo $item['title']; ?>"/>&nbsp;</span>
			  <span class="title_in"><input style="width:120px;" type="text" name="property<?php echo $item['id']; ?>" value="<?php echo $item['property']; ?>"/></span>&nbsp;&nbsp;<span class="uppointer" style="cursor:pointer;" id="<?php echo $item['id']; ?>">&uarr;</span>&nbsp;<span class="downpointer" style="cursor:pointer;" id="<?php echo $item['id']; ?>">&darr;</span> &nbsp; <span class="edit" style="cursor:pointer;" id="<?php echo $item['id']; ?>">修改</span> &nbsp; <span class="del" style="cursor:pointer;" id="<?php echo $item['id']; ?>">删除</span>
			  </p>
		  <?php } ?>
		  </span>
		  
		  <div style="height:30px;"></div>
		  
          
          <p class="clearfix">
		      
		      <span class="title_in"><input style="width:120px;" type="text" name="keyword"/>&nbsp;</span>
			  <span class="title_in">
			      <select id="type">
				      <option value="1">文本框</option>
					  <option value="2">文本域</option>
					  <option value="3">选择框</option>
				  </select>&nbsp;
			  </span>
			  <span class="title_in"><input style="width:120px;" type="text" name="title"/>&nbsp;</span>	
			  <span class="title_in"><input style="width:120px;" type="text" name="property"/></span>&nbsp;
		   
			   <input type="button" name="submita" value="确认添加" />
			  </p>
		  
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
<script type="text/javascript">
    
$("document").ready(function(){	
		$("input[name='submita']").click(function(){
					var keyword=$("input[name='keyword']").val();
					var type=$("#type").val();
					var title=$("input[name='title']").val();
					var property=$("input[name='property']").val();
					if(keyword !='' && type !='' && title !=''){
						if(property==''){property='@@@';}
					
						$.get("<?php echo base_url(); ?>index.php/admin/order/field_add/"+keyword+'/'+type+'/'+title+'/'+property+'/', function(data){
						    if(property=='@@@'){property='';}
						    if(type=='1'){type='<option value="1">文本框</option><option value="2">文本域</option><option value="3">选择框</option>';}
							else if(type=='2'){type='<option value="2">文本域</option><option value="1">文本框</option><option value="3">选择框</option>';}
							else if(type=='3'){type='<option value="3">选择框</option><option value="1">文本框</option><option value="2">文本域</option>';}
						
							$("#contenting").append('<p class="clearfix"><span class="title_in"><input style="width:120px;" type="text" name="keyword'+data+'" value="'+keyword+'"/>&nbsp;</span><span class="title_in"><select id="type'+data+'">'+type+'</select>&nbsp;</span><span class="title_in"><input style="width:120px;" type="text" name="title'+data+'" value="'+title+'"/>&nbsp;</span><span class="title_in"><input style="width:120px;" type="text" name="property'+data+'" value="'+property+'"/></span>&nbsp;&nbsp;<span class="uppointer" style="cursor:pointer;" id="'+data+'">&uarr;</span>&nbsp;<span class="downpointer" style="cursor:pointer;" id="'+data+'">&darr;</span> &nbsp; <span class="edit" style="cursor:pointer;" id="'+data+'">修改</span> &nbsp; <span class="del" style="cursor:pointer;" id="'+data+'">删除</span></p>');
						 
							
						});
					
					$("input[name='keyword']").val('');
					$("input[name='title']").val('');
					$("input[name='property']").val('');
					}else{
					    alert("字段和标题为必填");	
					}
					
		})
		
		$(".del").click(function(){
		    var ida=$(this).attr("id");
			if(confirm('确认要删除?此操作不可恢复!此操作将连同关联字段的记录一同删除!')){
				$.get("<?php echo base_url(); ?>index.php/admin/order/field_del/"+ida+'/', function(data){
					var idb='#'+ida;
					$(idb).parent().remove();
				})
			}
		
		})
		
		$(".edit").click(function(){
		    var ida=$(this).attr("id");
			var keyworda='keyword'+ida;
			var keyword=$("input[name="+keyworda+"]").val();
			var typea='#type'+ida;
			var type=$(typea).val();
			var titlea='title'+ida;
			var title=$("input[name="+titlea+"]").val();
			var propertya='property'+ida;
			var property=$("input[name="+propertya+"]").val();
			
			$.get("<?php echo base_url(); ?>index.php/admin/order/field_edit/"+ida+'/'+keyword+'/'+type+'/'+title+'/'+property+'/', function(data){
			    alert("已修改");
			})
		
		})
		
		$(".uppointer").click(function(){
		    var ida=$(this).attr("id");
			var idb=$(this).parent().prev().children(".uppointer").attr("id");
			if(idb != undefined){
				$.get("<?php echo base_url(); ?>index.php/admin/order/field_move/"+ida+'/'+idb+'/', function(data){})
				}
			
		    $(this).parent().after($(this).parent().prev());
		})
		
		$(".downpointer").click(function(){
		    var ida=$(this).attr("id");
			var idb=$(this).parent().next().children(".uppointer").attr("id");
			if(idb != undefined){
				$.get("<?php echo base_url(); ?>index.php/admin/order/field_move/"+ida+'/'+idb+'/', function(data){})
				}
			
			$(this).parent().next().after($(this).parent());
		
		})
		
					
})


</script>
<script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
