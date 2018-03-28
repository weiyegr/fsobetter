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
<title>订单管理</title>
</head>

<body>
<form class="setting" method="post" action="<?php echo base_url(); ?>index.php/admin/order/setting/">
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">订单帐号</div></div></li>
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
         <div class="tab_content">
          <div class="clearfix">
		  
           <div class="topbtn1">
		       <ul class="btnbg">
			       
			   </ul>
		   </div>
           <div class="topbtn2"><input type="text" value="输入关键字..." class="search_txt" name="searchtxt" /><input type="submit" value="筛选" class="search_btn" /></div>
		  </form>
          </div> 
          <div>
          </div>
          
<table class="maintable" width="100%" border="0" cellspacing="0" cellpadding="0">
<thead>
  <tr>
    <th width="35px"><input type="checkbox" style="margin:-6px 2px 0 10px" onclick="checkAll(this)" /></th>
    <th width="50px">编号</th>
    <th width="*">订单号</th>
    <th width="*">收货人</th>
    <th width="*">总额</th>
    <th width="*">状态</th>
     <th width="120px">操作</th>
  </tr>
</thead>
<tbody>
            <?php $iii=0; foreach($list as $item){ ?>
			<tr>
			<td><input type="checkbox" style="margin-left:10px" name="id[]" value="<?php echo $item['id']; ?>" /></td>
			<td><?php echo $offset+$iii; ?></td>
			<td><a href="<?php echo base_url(); ?>index.php/admin/order/edit_view/<?php echo $item['id']; ?>"<?php if($item['isread']=='0'){ echo ' style="color:red;font-weight:bold;"'; }?>><?php echo $item['orderid']; ?></a></td>
			<td><?php echo $item['name']; ?></td>
            <td><?php echo $item['tatalaccount']; ?></td>
            <td><?php if($item['state']!='完成订单'){echo '<span style="color: red;font-weight: bold;">';} ?><?php echo $item['state']; ?><?php if($item['state']!='完成订单'){echo '</span>';} ?></td>
			<td><a href="<?php echo base_url(); ?>index.php/admin/order/edit_view/<?php echo $item['id']; ?>"><img title="查看" src="<?php echo $url; ?>images/post_edit.png" /></a> <a href="<?php echo base_url(); ?>index.php/admin/order/remove/<?php echo $item['id']; ?>" onclick="return confirm('确认要删除?此操作不可恢复!此操作将连同关联附件一同删除!');"><img title="删除" src="<?php echo $url; ?>images/post_del.png" /></a></td>
			</tr>
			<?php $iii++; } ?>
  
</tbody>
<tfoot>
<tr>
<td colspan="7">
<!--分页-->
  <div class="page">
          <select name="do" onchange="showCategory(this.value)">
                            <option value="delete">&#9758; 删除</option>
                        </select>
						<span id="categories" style="display:none">
						<select name="cid">
						    <option value="0">请选择</option>
							<volist id="vo" name="categories">
							<option value=""></option>
							</volist>
						</select>
						</span>
          <input type="submit" value="应用" class="search_btn setup" />
          <span style="float: right;"><?php echo $createlinks; ?></span>
         </div>
		 
</td>
</tr>
</tfoot>
</table>
          
         <div class="bottom_info clearfix" id="close1">
          <div class="bottom_info2">
          
          
          <div class="bottom_info_img"><img src="<?php echo $url ?>images/info_tishi.png" width="16" height="15" alt="info_img" /></div>
          <?php if(get_cookie('adminid')==1){ ?><p> 标签：&lt;?php echo $addorder; ?&gt;</p><?php } ?>
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
 </form>
<script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
