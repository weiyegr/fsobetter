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
<title>文章</title>
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">文章列表</div></div></li>
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
         <div class="tab_content">
          <div class="clearfix">
		  <form class="setting" method="post" action="<?php echo base_url(); ?>index.php/admin/home/main/<?php echo $id; ?>/">
           <div class="topbtn1"><ul class="btnbg"><li><input type="button" value="添加新文章" onclick='location.href="<?php echo base_url(); ?>index.php/admin/home/carticle_add/<?php echo $id; ?>"' class="btn" /></li></ul></div>
           <div class="topbtn2"><input type="text" value="输入关键字..." class="search_txt" name="searchtxt" /><input type="submit" value="筛选" class="search_btn" /></div></form>
          </div> 
          <div>
          </div>
          
<table class="maintable" width="100%" border="0" cellspacing="0" cellpadding="0">
<form class="setting" method="post" action="<?php echo base_url(); ?>index.php/admin/home/setting/">
<input type="hidden" name="cid" value="<?php echo $id; ?>" />
<thead>
  <tr>
    <th width="35px"><input name="" type="checkbox" value="" onclick="checkAll(this)" /></th>
    <th width="35px">编号</th>
    <th width="*">文章标题</th>
    <th width="100px">栏目类型</th>
    <th width="80px">排序</th>
    
    <th width="120px">操作</th>
  </tr>
</thead>
<tbody>
  <?php $iii=0;  foreach($list as $item){ ?>
  <tr>
    <td><input type="checkbox" style="margin-left:10px" name="id[]" value="<?php echo $item['id']; ?>" /></td>
    <td><?php echo $offset+$iii; ?></td>
    <td class="thetitle"><a href="<?php echo base_url(); ?>index.php/admin/home/update_carticle/<?php echo $item['id']; ?>" ><?php echo $item['title']; ?></a></td>    
    <td><a href="<?php echo base_url(); ?>index.php/admin/home/main/<?php echo $item['parentid']; ?>">
							    <?php 
								$query = $this->db->query("select * from type where id=".$item['parentid']);
			                    $row=$query->row();
                                echo $row->title;
								?>
			   </a></td>
    <td><input type="text" name="pagenum" id="<?php echo $item['id']; ?>" value="<?php echo $item['num']; ?>" class="sort" /></td>
    <td class="editcol"><a href="<?php echo base_url(); ?>index.php/admin/home/update_carticle/<?php echo $item['id']; ?>" title="编辑"><img src="<?php echo $url; ?>images/post_edit.png" /></a><a href="<?php echo base_url(); ?>index.php/admin/home/remove/<?php echo $id; ?>/<?php echo $item['id']; ?>" title="删除" onclick="return confirm('确认要删除?此操作不可恢复!此操作将连同关联附件一同删除!');"><img src="<?php echo $url; ?>images/post_del.png" /></a></td>
  </tr>
  <?php $iii++; } ?>
  
</tbody>
<tfoot>
<tr>
<td colspan="7">
<!--分页-->
  <div class="page">
          <select name="do" onchange="showCategory(this.value)">
                            <option value="">批量动作</option>
                            <option value="delete">&#9758; 删除</option>
                        </select>
						
          <input type="submit" value="应用" class="search_btn setup" />
          <span style="float: right;"><?php echo $createlinks; ?></span>
         </div>
		 </form>
</td>
</tr>
</tfoot>
</table>
          
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
       <!-- <div class="TabbedPanelsContent">
         <div class="tab_content">内容 2</div>
        </div>
        <div class="TabbedPanelsContent">
         <div class="tab_content">内容 2</div>
        </div>-->
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
		$("input[name='pagenum']").blur(function(){
					var ida=$(this).attr("id");
					var idnum=$(this).val();
					
					
					
						$.get("<?php echo base_url(); ?>index.php/admin/home/update_num/"+ida+'/'+idnum, function(data){
							
						});
					})
					
		})	
</script>
</body>
</html>
