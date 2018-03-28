 <?php $query = $this->db->query("select * from changgui where id=1");
      $row=$query->row(); ?>
<?php
if(isset($login)){}else{
  if(get_cookie('username', TRUE)==''&&get_cookie('password', TRUE)==''){ 
  	
 ?>
	  <script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/login/";</script>
	  <?php 
echo "您无限访问该页";
exit(); }}
    $username=get_cookie('username');
    $password=get_cookie('password');
	$id=get_cookie('id');
  ?>
  
  
  <div id="top">
   <div id="title"><img src="<?php echo $url; ?>images/logo.png" width="240" height="46" alt="Logo" /></div>
   <!--
   <div class="select">
    <div class="main" onclick="show_li()" onmouseout="hide_li()"></div>
    <ul id="main_show" class="main_li" onmousemove="show_li()" onmouseout="hide_li()">
     <li><a href="#" class="addpost">添加新文章</a></li>
     <li><a href="#" class="addlist">添加新栏目</a></li>
     <li><a href="#" class="addlink">添加新链接</a></li>
     <li><a href="#" class="setinfos">修改系统设置</a></li>
    </ul>
   </div>
   -->
   <div class="set">
   <p class="welcome">欢迎您， <?php echo $username; ?> !  <span><a href="<?php echo base_url(); ?>index.php/admin/admin/update_admin/<?php echo $id; ?>">修改个人资料</a> | <a href="<?php echo base_url(); ?>index.php/admin/out">登出</a></span></p>
   <div class="clear"></div>
   <p class="info"><a href="<?php echo base_url(); ?>" target="_blank">浏览网站</a> | <a href="">帮助</a> | <a href="#">联系我们</a></p>
   </div>
   <div class="clear"></div>
  </div>
  