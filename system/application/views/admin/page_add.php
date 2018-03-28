<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/main.css"/>
<script charset="utf-8" src="<?php echo base_url(); ?>system/plugins/kindeditor/kindeditor.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<!--[if IE 6]><img src="C:/Users/weiyegr/AppData/Roaming/Tencent/QQ/Temp/}F~MZRZOO}KS3F2GLCF(I9M.png" />
    <script type="text/javascript" src="<?php echo $url; ?>js/DD_png-min.js"></script>
	<script type="text/javascript">
	DD_belatedPNG.fix('.nav,.txt,.main,.close,.main_bottom,.main_title,img');
	</script>
<![endif]-->
<title>添加文章</title>
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">添加文章</div></div></li>
        <!--<li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">栏目属性</div></div></li>
        <li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">添加新的栏目</div></div></li>-->
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
          <div class="topcontent1 clearfix">
          <!--文章标题-->
		  <form id="page" name="page" class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/home/add/" enctype="multipart/form-data">
		  
		  <p class="clearfix"><span class="title_text"><label for="title">标题：</label></span><span class="title_in"><input class="title_in" type="text"  name="title"/></span><span class="tips"></span></p>
		  
		  <?php foreach($type_meta as $li){ ?>
		  <?php 
		  switch($li['type']){
            case 0:
			//文本框
		  ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><input class="title_in" type="text"  name="<?php echo $li['fetch']; ?>"/></span><span class="tips"></span></p>
		  <?php 
		     break;
			 case 1:
			 //文本域
          ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><textarea rows="5" name="<?php echo $li['fetch']; ?>" class="words"></textarea></span><span class="tips"></span></p>
		  <?php 
		     break;
			 case 2:
          ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" /></span><span></span></p>
		  <?php 
		     break;
			 case 3:
          ?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" /></span><span></span></p>
		  <?php 
		     break;
			 case 4:
          ?>
		  
		    
		    <p>
		    <div class="editor"><span class="title_text"><?php echo $li['title']; ?>：</span><br /><textarea id="<?php echo $li['fetch']; ?>" name="<?php echo $li['fetch']; ?>" cols="100%" rows="8" style="width:100%;height:300px;"></textarea></div>
		    <script> KE.show({ id : '<?php echo $li['fetch']; ?>' });</script>
			</p>
		  <?php 
		    break;
			case 5:
			?>
		    <p class="clearfix"><span class="title_text"><label for="title"><?php echo $li['title']; ?>：</label></span><span class="title_in">
			
			<select name="<?php echo $li['fetch']; ?>">	
			        <?php foreach(explode(';',$li['selectlist']) as $lis){ ?>
				      <option value="<?php echo end(explode(',',$lis)); ?>"><?php echo reset(explode(',',$lis)); ?></option>
					<?php } ?>
            </select>
			</span><span></span></p>
		  <?php 
			}
          } ?>
		  
		  
          <div class="clearfix" style="padding-left:50px;"><ul class="btnbg"><li><input type="submit" value="确认添加" class="btn" /></li></ul></div>
          </div> <!--.topcontent1-->
          <div class="topcontent2">
          <div class="tip">以下是选填信息，不填则系统自动完成</div>
          
          <!--附件信息-->
          <div class="att">自定义信息 <span>点击展开与关闭</span></div>
          <div class="att_bottom clearfix">
           <div class="attinfo">
            <div class="att_txt">
              <!--=========================================================================-->
              <!--文章标题-->
          <p class="clearfix"><span class="title_text"><label for="title">页面关键词：</label></span><span class="title_in"><input class="title_in" style="width:294px;" type="text" name="keywords" value=""/></span><span class="tips"></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">页面描述：</label></span><span class="title_in"><textarea rows="5" name="description" class="words"></textarea></span><span class="tips"></span></p>
		  
		  
		  <p class="clearfix"><span class="title_text"><label for="title">发布时间：</label></span><span class="title_in"><input class="title_in" style="width:100px;" type="text" name="addtime" value="<?php echo date("Y-m-d"); ?>"/></span><span class="tips"></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">修改时间：</label></span><span class="title_in"><input class="title_in" style="width:100px;" type="text" name="edittime" value="<?php echo date("Y-m-d"); ?>"/></span><span class="tips"></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">排序：</label></span><span class="title_in"><input class="title_in" style="width:30px;" type="text" name="num" value="0"/></span><span class="tips"></span></p>
		  
		  <p class="clearfix"><span class="title_text"><label for="title">缩略url：</label></span><span class="title_in"><input style="width:150px;" class="title_in" style="width:150px;" type="text" name="short" readonly="readonly"/></span><span class="tips"></span></p>
		  <input name="parentid" type="hidden" value="<?php echo $id; ?>" />
		  
		  
              <!--=========================================================================-->
            </div>
           </div>
          </div> <!--.att_bottom-->
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

<script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
