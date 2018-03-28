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
<title>设置信息</title>
<style type="text/css">
.title_text { width:45px;}
</style>

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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">设置信息</div></div></li>
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
         <div class="tab_content">
		 <?php if(get_cookie('adminid')==1){ ?>
          <div class="clearfix">
           <div class="topbtn1"><ul class="btnbg"><li><input type="button" value="编辑字段" onclick='location.href="<?php echo base_url(); ?>index.php/admin/setting/field_update"' class="btn" /></li></ul></div>
           <div class="topbtn2">温馨提示：添加自定义字段添加需要的设置字段！</div>
          </div>  
		  <?php }; ?>
         <div id="main" >
                <form class="setting" method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/admin/setting/settingpro">
				
				<div id="kuozhang" class="clearfix">
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>网站标题</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="text" style="width:350px;" class="text" name="weititle" value="<?php echo $xs->weititle; ?>">
					   </span>
				   </p>
				</div>
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>网站关键词</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="text" style="width:350px;" class="text" name="keywords" value="<?php echo $xs->keywords; ?>">
					   </span>
				   </p>
				</div>
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>网站描述</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <textarea rows="5" style="width:350px;" name="description" class="words"><?php echo $xs->description; ?></textarea>
					   </span>
				   </p>
				</div>
				<?php $query = $this->db->query("select * from changgui where id=1");
                      $row=$query->row(); ?>
				<?php if($row->pmessageor==1){ ?>
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>用户账户（短息）</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="text" style="width:350px;" class="text" name="userid" value="<?php echo $xs->userid; ?>">
					   </span>
				   </p>
				</div>
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>用户密码（短息）</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="text" style="width:350px;" class="text" name="userpassword" value="<?php echo $xs->userpassword; ?>">
					   </span>
				   </p>
				</div>
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>接收手机号码（短息）</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="text" style="width:350px;" class="text" name="pnumber" value="<?php echo $xs->pnumber; ?>">
					   </span>
				   </p>
				</div>
				<?php } ?>
				
				
				<?php $query = $this->db->query("select * from changgui where id=1");
                      $row=$query->row(); ?>
				<?php if($row->emailor==1){ ?>
				
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>邮箱地址（邮件设置）</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="text" style="width:350px;" class="text" name="hmail" value="<?php echo $xs->hmail; ?>">
					   </span>
				   </p>
				</div>
				
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>SMTP（邮件设置）</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="text" style="width:350px;" class="text" name="host" value="<?php echo $xs->host; ?>">
					   </span>
				   </p>
				</div>
				
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>邮箱用户（邮件设置）</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="text" style="width:350px;" class="text" name="user" value="<?php echo $xs->user; ?>">
					   </span>
				   </p>
				</div>
				
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>邮箱密码（邮件设置）</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="password" style="width:350px;" class="text" name="pass" value="<?php echo $xs->pass; ?>">
					   </span>
				   </p>
				</div>
				
				<div class="setting_hr clearfix">
				   <p class="clearfix">
				       <span class="title_text1"><label>接收邮箱（邮件设置）</label></span>
				   </p>
				   <p class="clearfix">
				       <span class="title_in">
				           <input type="text" style="width:350px;" class="text" name="email" value="<?php echo $xs->email; ?>">
					   </span>
				   </p>
				</div>
				<?php } ?>
				
				
				
				<?php foreach($setting_meta as $li){ ?>
		  
				  <?php 
				  switch($li['type']){
					case 0:
				  ?>
					<p class="clearfix"><span class="title_text1"><label><?php echo $li['title']; ?></label></span></p>
				   <p class="clearfix"><span class="title_in"><input class="title_in" type="text" style="width:350px;"  name="<?php echo $li['fetch']; ?>" value="<?php echo $setting->$li['fetch']; ?>"/></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $this->classl->setting(\''.$li['fetch'].'\'); ?>');} ?></span></p>
				  <?php 
					 break;
					 case 1:
				  ?>
					<p class="clearfix"><span class="title_text1"><label><?php echo $li['title']; ?></label></span></p>
				   <p class="clearfix"><span class="title_in"><textarea rows="5" style="width:350px;" name="<?php echo $li['fetch']; ?>" class="words"><?php echo $setting->$li['fetch']; ?></textarea></span><span class="tips"><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $this->classl->setting(\''.$li['fetch'].'\'); ?>');} ?></span></p>
				  <?php 
					 break;
					 case 2:
				  ?>
					<input name="<?php echo $li['fetch']; ?>" type="hidden" value="<?php echo $setting->$li['fetch']; ?>">
				  <p class="clearfix"><span class="title_text1"><label><?php echo $li['title']; ?></label></span></p>
				   <p class="clearfix"><?php if($setting->$li['fetch']==''){echo '<img src="'.base_url().'image.php?file=none.jpg&width='.$li['width'].'&height='.$li['height'].'">';}else{echo '<img  src="'.base_url().'image.php?file='.$setting->$li['fetch'].'&width='.$li['width'].'&height='.$li['height'].'">';} ?><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" /></span><span><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $this->classl->setting(\''.$li['fetch'].'\'); ?>');} ?></span></p>
				  <?php 
					 break;
					 case 3:
				  ?>
				  <input name="<?php echo $li['fetch']; ?>" type="hidden" value="<?php echo $setting->$li['fetch']; ?>">
				  <p class="clearfix"><span class="title_text1"><label><?php echo $li['title']; ?></label></span></p>
				   <p class="clearfix"><span class="title_in"><input type="file" name="<?php echo $li['fetch']; ?>" style="margin-left:2px;width:100px;" />
				  <?php if(($setting->$li['fetch'])!=''){echo ($setting->$li['fetch']).' <a target="brank" href="'.base_url().'uploads/'.($setting->$li['fetch']).'">点击下载</a>';}else{echo '无文件';} ?>
				  </span> <span><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $this->classl->setting(\''.$li['fetch'].'\'); ?>');} ?></span></p>
				  <?php 
					 break;
					 case 4:
				  ?>
				  
				  
				  
				  <p>
					<div class="editor"><span class="title_text1"><?php echo $li['title']; ?></span></p>
				   <p class="clearfix"><textarea id="<?php echo $li['fetch']; ?>" name="<?php echo $li['fetch']; ?>" cols="100%" rows="8" style="width:100%;height:300px;"><?php echo $setting->$li['fetch']; ?></textarea></div>
				   <span><?php if(get_cookie('adminid')==1){echo htmlentities('<?php echo $this->classl->setting(\''.$li['fetch'].'\'); ?>');} ?></span>
					<script> KE.show({ id : '<?php echo $li['fetch']; ?>' });</script>
					</p>
				  <?php 
					break;
					}
				  } ?>
				
				
				
				
				
					
				</div>
					
					
				<div class="clearfix subimtbg"><ul class="btnbg1"><li><input type="submit" value="保存设置" name="B1"  class="btn1" /></li></ul></div>
                </form>
            
        </div>

          <div class="bottom_info clearfix" id="close1">
          <div class="bottom_info2">
          <div class="bottom_info_img"><img src="<?php echo $url ?>images/info_tishi.png" width="16" height="15" alt="info_img" /></div>
          <p>排序规则：优先以排序编号逆向排序，次以栏目ID正向排序。</p>
          <p>栏目级别：通过点击前面的展开合拢小图标进行栏目多级别的操作，更直观地看到自己的栏目状况。</p>
          <span onclick="info_close1()"></span>
          <div class="bottom_info1"></div>
          </div>
         </div><!--.bottom_info-->
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
<script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
