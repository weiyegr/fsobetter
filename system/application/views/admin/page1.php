<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/main.css"/>
<script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<!--[if IE 6]>
    <script type="text/javascript" src="<?php echo $url; ?>js/DD_png-min.js"></script>
	<script type="text/javascript">
	DD_belatedPNG.fix('.nav,.txt,.main');
	</script>
<![endif]-->
<title>网站管理</title>
</head>

<body>
 <div id="container">
 <!--标题-->
<?php $this->load->view('admin/header'); ?>
  <!--内容-->
  <div id="content">
  <!--导航条-->
<?php $this->load->view('admin/left'); ?>
   <!--右边-->
   <div class="contetn_right">
    <div class="admin_info">您好：<span>admin</span> ，欢迎进入 8DUCMS 网站管理平台</div>
    <div class="info_txt" id="close"><p class="txt">目前，本网站共有<span>10</span>个栏目，<span>50</span>篇文章，您可以选择直接进入管理：<a href="#">文章管理</a> <span class="line">|</span> <a href="#">栏目管理</a></p><p class="close" onclick="info_close()"></p></div>
    <div class="main">
     <div class="main_title"><p>系统简单帮助</p></div>
     <div class="main_content">
      <div class="main_txt">
       <h4>栏目管理</h4>
       <p>1、增加栏目时最基本的设置填写栏目名称和选择栏目所属的内容模型，此外还需要注意文件保存目录的选项，内容模型是指栏目属于文章、图集、下载等类型或自定义的内容类型，文件保存目录在没有填写的情况下系统会自动使用栏目名称的拼音作为栏目目录；</p>
       <p>2、栏目属性：决定当前栏目是普通的多页列表还是单个封面页或跳转到其它网址的链接；</p>
       <p>3、栏目交叉：栏目交叉是指一个大栏目与另一个非下级的子栏目出现交叉的情况，相当于系统原来的副栏目功能，不过现在改在栏目里预先设置好。</p>
       <p>例如： 网站上有大栏目——智能手机、音乐手机，另外又有栏目——诺基亚->智能手机、诺基亚->音乐手机，这样顶级的大栏目就和另一个大栏目的子栏目形成了交叉，这样只需要在大栏目中指定交叉的栏目即可。 (注：会自动索引交叉栏目的内容，但不会索引交叉栏目下级栏目的内容，这种应用也适用于按地区划分资讯的站点。) </p>
	   <h4>内容管理</h4>
       <p>1、增加栏目时最基本的设置填写栏目名称和选择栏目所属的内容模型，此外还需要注意文件保存目录的选项，内容模型是指栏目属于文章、图集、下载等类型或自定义的内容类型，文件保存目录在没有填写的情况下系统会自动使用栏目名称的拼音作为栏目目录；</p>
       <p>2、栏目属性：决定当前栏目是普通的多页列表还是单个封面页或跳转到其它网址的链接；</p>
	   <h4>会员管理</h4>
       <p>1、增加栏目时最基本的设置填写栏目名称和选择栏目所属的内容模型，此外还需要注意文件保存目录的选项，内容模型是指栏目属于文章、图集、下载等类型或自定义的内容类型，文件保存目录在没有填写的情况下系统会自动使用栏目名称的拼音作为栏目目录；</p>
       <p>2、栏目属性：决定当前栏目是普通的多页列表还是单个封面页或跳转到其它网址的链接；</p>
      </div>
     </div>
     <div class="main_bottom">
     </div>
    </div>
   </div>
   <!--版权-->
   <div class="clear"></div>
   <div id="footer">
    <div class="line"></div>
    <div class="footer_info">
     <p class="date">Copyright © 2002-2012 WEIYEGR. 版权所有</p>
     <p class="help"><a href="#">帮助</a> | <a href="#">联系我们</a></p>
    </div>
   </div>
  </div>
 </div>
<script type="text/javascript">
function show_li(){
	document.getElementById("main_show").style.display="block";
}
function hide_li(){
	document.getElementById("main_show").style.display="none";
}
function info_close(){
	document.getElementById("close").style.display="none";
}
$(document).ready(function(){
	$(".first").click(function(){
		$(this).next(".second").toggle();
		})
});
function clicked(id)
	{
		for(i=1;i<11;i++)
		{
			if(i==id)
			{
				document.getElementById(i).className='cc';
			}
			else
			{
				document.getElementById(i).className='';
			}
			
		}
	}
function sclicked(id)
	{
		for(i=101;i<107;i++)
		{
			if(i==id)
			{
				document.getElementById(i).className='ss';
			}
			else
			{
				document.getElementById(i).className='';
			}
			
		}
	}
</script>
</body>
</html>
