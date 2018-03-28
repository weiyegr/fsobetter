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
<title>编辑目录</title>
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">编辑目录</div></div></li>
        <!--<li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">栏目属性</div></div></li>
        <li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">添加新的栏目</div></div></li>-->
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
          <div class="topcontent1 clearfix">
          <!--文章标题-->
		  <form class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/classify/update" enctype="multipart/form-data">
		  
		  <p class="clearfix"><span class="title_text"><label for="title">栏目名称：</label></span><span class="title_in"><input class="title_in" type="text"  name="title" value="<?php echo $type->title; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo 'title';} ?></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">缩略名称：</label></span><span class="title_in"><input style="width:150px;" type="text" name="short" value="<?php echo $type->short; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo 'short';} ?></span></p>
		  <?php if(get_cookie('adminid')==1){?>
		  <p class="clearfix"><span class="title_text"><label for="title">模板名称：</label></span><span class="title_in"><input style="width:150px;" type="text" name="viewhtml" value="<?php echo $type->viewhtml; ?>"/></span><span class="tips">viewhtml</span></p>
		  <?php } ?>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">栏目排序：</label></span><span class="title_in"><input style="width:30px;" class="title_in" type="text" name="num"  value="<?php echo $type->num; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo 'num';} ?></span></p>
		  
		  <?php foreach($type_image as $li){ ?>
		  
		  <?php 
		  switch($li['type']){
            case 0:
		  ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><input class="title_in" type="text"  name="<?php echo $li['fetch']; ?>" value="<?php echo $type->$li['fetch']; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo $li['fetch'];} ?></span></p>
		  <?php 
		     break;
			 case 1:
          ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><textarea rows="5" name="<?php echo $li['fetch']; ?>" class="words"><?php echo $type->$li['fetch']; ?></textarea></span><span class="tips"><?php if(get_cookie('adminid')==1){echo $li['fetch'];} ?></span></p>
		  <?php 
		     break;
			 case 2:
          ?>
		    <input name="<?php echo $li['fetch']; ?>" type="hidden" value="<?php echo $type->$li['fetch']; ?>">
		  <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span> <?php if($type->$li['fetch']==''){echo '<img src="'.base_url().'image.php?file=none.jpg&width='.$li['width'].'&height='.$li['height'].'">';}else{echo '<img  src="'.base_url().'image.php?file='.$type->$li['fetch'].'&width='.$li['width'].'&height='.$li['height'].'">';} ?><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" /></span> <span><?php if(get_cookie('adminid')==1){echo $li['fetch'];} ?></span></p>
		  <?php 
		     break;
			 case 3:
          ?>
		  <input name="<?php echo $li['fetch']; ?>" type="hidden" value="<?php echo $type->$li['fetch']; ?>">
		  <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" />
		  <?php if(($type->$li['fetch'])!=''){echo ($type->$li['fetch']).' <a target="brank" href="'.base_url().'uploads/'.($type->$li['fetch']).'">点击下载</a>';}else{echo '无文件';} ?>
		  </span> <span><?php if(get_cookie('adminid')==1){echo $li['fetch'];} ?></span></p>
		  <?php 
		     break;
			 case 4:
          ?>
		  
		  
		  
		  <p>
		    <div class="editor"><span class="title_text"><?php echo $li['title']; ?>：</span><br /><textarea id="<?php echo $li['fetch']; ?>" name="<?php echo $li['fetch']; ?>" cols="100%" rows="8" style="width:100%;height:300px;"><?php echo $type->$li['fetch']; ?></textarea></div>
			<span><?php if(get_cookie('adminid')==1){echo $li['fetch'];} ?></span>
		    <script> KE.show({ id : '<?php echo $li['fetch']; ?>' });</script>
			</p>
		  <?php 
		    break;
			}
          } ?>
		  </p>
		  <input name="parentid" type="hidden"  value="<?php echo $type->parentid; ?>" />
		  <input name="id" type="hidden"  value="<?php echo $type->id; ?>" />
		  
		  <?php if(get_cookie('adminid')==1 and $type->parentid==0){ ?>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">可添子类：</label></span><span class="title_in"><input style="width:150px;" type="text" name="status" value="<?php echo $type->status; ?>"/></span><span class="tips"></span></p>
		  
		  <p class="clearfix">
          <span class="title_text"><label for="title">栏目类型：</label></span>
          <span class="title_in radiotext"><input type="radio" name="type" value="0" <?php if($type->type==0){echo 'checked="checked"';} ?>  /><a> 分类</a><input type="radio" name="type" value="1" <?php if($type->type==1){echo 'checked="checked"';} ?>/><a> 页面</a></span>
          <span class="tips"></span>
          </p>
		  
		  <p class="clearfix">
          <span class="title_text"><label for="title">图片库：</label></span>
          <span class="title_in radiotext"><input type="radio" name="imagelist" value="0" <?php if($type->imagelist==0){echo 'checked="checked"';} ?> /><a> 不开启</a><input type="radio" name="imagelist" value="1" <?php if($type->imagelist==1){echo 'checked="checked"';} ?>/><a> 开启</a></span>
          <span class="tips"></span>
          </p>
		  
		  <?php } ?>
		  
		  
		  
		  
		  
		  
          <div class="clearfix" style="padding-left:50px;"><ul class="btnbg"><li><input type="submit" value="确认修改" class="btn" /></li></ul></div>
		  </form>
		  
          </div> <!--.topcontent1-->
          <div class="topcontent2">
		  <?php if(get_cookie('adminid')==1 and $parentid==0){ ?>
          <div class="tip">以下是选填信息，不填则系统自动完成</div>
          <!--附件信息-->
		  
          <div class="att">显示选项 <span>点击展开与关闭</span></div>
          <div class="att_bottom clearfix">
           <div class="attinfo">
            <div class="att_txt">
              <!--=========================================================================-->
              <!--文章标题-->
              <div class="title_div clearfix"><div class="title_p">
			  <form class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/classify/add_type_image" enctype="multipart/form-data">
			  <input name="id" type="hidden"  value="<?php echo $type->id; ?>" />
			  <span class="title_in">标题<input style="width:50px;" type="text" name="title"/></span>
			  <span class="title_in">字段名<input style="width:50px;" type="text" name="fetch"/></span>
			  
			  <span class="title_in">
			  类型<select name="type">
				      <option value="0">文本框</option>
					  <option value="1">文本域</option>
					  <option value="2">图片</option>
					  <option value="3">文件</option>
					  <option value="4">文章</option>
					  
					  
				  </select><select name="intf">
				      <option value="text">text</option>
					  <option value="int">int</option>
				  </select>&nbsp;
			  </span>
			  <span class="title_in">宽<input style="width:40px;" type="text" name="width" value="100"/>&nbsp;</span>
			  <span class="title_in">高<input style="width:40px;" type="text" name="height" value="100"/>&nbsp;</span>
			  
		   
			   <input type="submit" value="确认添加" />
			   </form>
			  <?php $i=0; foreach($type_image as $li){ ?>
			  <p style="font-size:14px;">
			  <?php echo '[<a href="'.base_url().'index.php/admin/classify/del_type_image/'.$li['id'].'/'.$li['postid'].'">删除</a>]'; ?> 标题:<?php echo $li['title']; ?> 字段名:<?php echo $li['fetch']; ?> 类型:
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
			  
          </div>
          </div>
			

            </div>
           </div>
          </div>
          <div class="att">扩展字段 <span>点击展开与关闭</span></div>
          <!--自定议信息-->
          <div class="att_bottom">
           <div class="attinfo">
            <div class="clear"></div>
            <div class="att_txt">
     		   
			   <form class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/classify/add_type_meta" enctype="multipart/form-data">
			  <input name="id" type="hidden"  value="<?php echo $type->id; ?>" />
			  <span class="title_in">标题<input style="width:40px;" type="text" name="title"/>&nbsp;</span>
			  <span class="title_in">字段名<input style="width:40px;" type="text" name="fetch"/>&nbsp;</span>
			  
			  <span class="title_in">
			  类型<select name="type">
				      <option value="0">文本框</option>
					  <option value="1">文本域</option>
					  <option value="2">图片</option>
					  <option value="3">文件</option>
					  <option value="4">文章</option>
					  <option value="5">下拉框</option>
					  
					  
				  </select><select name="intf">
				      <option value="text">text</option>
					  <option value="int">int</option>
				  </select>
				  
			  </span>
			  
			  
			  <span class="title_in">图<input style="width:50px;" type="text" name="sizeimg" value="100,100"/>&nbsp;</span>
			  <span class="title_in">下拉<input style="width:35px;" type="text" name="selectlist" value="100"/>&nbsp;</span>
			  <span class="title_in">排<input style="width:15px;" type="text" name="num" value="0"/>&nbsp;</span>
			  搜<input style="width:15px;" type="checkbox" name="search" value="1"/>
			  列<input style="width:15px;" type="checkbox" name="listtop" value="1"/>
			  
		   
			   <input type="submit" value="确认添加" />
			   </form>
			  <?php $i=0; foreach($type_meta as $li){ ?>
			  <p style="font-size:14px;">
			  <?php echo '[<a href="'.base_url().'index.php/admin/classify/del_type_meta/'.$li['id'].'/'.$li['postid'].'">删除</a>]'; ?> 标题:<?php echo $li['title']; ?> 字段名:<?php echo $li['fetch']; ?> 类型:
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
                case 5:
				  echo '下拉列表';
				  break; 				  
				}
			  ?> 搜索:
			  <?php 
			  switch($li['search']){
				case 0:
				  echo '否';
				  break;  
				case 1:
				  echo '是';
				  break;  
				}
			  ?> 列表显示:
			  <?php 
			  switch($li['listtop']){
				case 0:
				  echo '否';
				  break;  
				case 1:
				  echo '是';
				  break;  
				}
			  ?> 图：<?php echo $li['sizeimg']; ?> 排序：<?php echo $li['num']; ?>
			  </p>
			  <?php } ?>
			   <!--=========================================================================-->
            </div>
           </div>
          </div> <!--.att_bottom-->
          <!--附件信息-->
		  <?php } ?>
		  
         
          <div class="bottom_info clearfix" id="close1">
          <div class="bottom_info2">
		  <?php if(get_cookie('adminid')==1 and $type->type==0){ echo '<p> 地址：'.htmlentities('<?php echo base_url(); ?>').'index.php/category/index/'.$type->short.'</p>'; } ?>
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
