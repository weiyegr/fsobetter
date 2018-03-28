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
<title>查看订单</title>
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
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">查看订单</div></div></li>
        <!--<li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">栏目属性</div></div></li>
        <li class="TabbedPanelsTab" tabindex="0"><div class="left"><div class="right">添加新的栏目</div></div></li>-->
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
          <div class="topcontent1 clearfix">
          <!--文章标题-->
		  <form id="page" name="page" class="category" method="post" action="<?php echo base_url(); ?>index.php/admin/order/edit/">
          <p class="clearfix"><span class="title_text"><label for="title">订单号：</label></span><span class="title_in"><input id="orderid" readonly="" type="text" name="orderid" value="<?php echo $order->orderid; ?>"/></span><span class="tips"></span></p>

		  <p class="clearfix"><span class="title_text"><label for="title">会员名：</label></span><span class="title_in"><input id="uid" readonly="" type="text" name="uid" value="<?php echo $order->uid; ?>"/></span><span class="tips"></span></p>
          
          <p class="clearfix"><span class="title_text"><label for="title">收货人：</label></span><span class="title_in"><input id="name" readonly="" type="text" name="name" value="<?php echo $order->name; ?>"/></span><span class="tips"></span></p>
		  
          <p class="clearfix"><span class="title_text"><label for="title">收货地址：</label></span><span class="title_in"><input id="address" readonly="" type="text" name="address" value="<?php echo $order->address; ?>"/></span><span class="tips"></span></p>
		  
          <p class="clearfix"><span class="title_text"><label for="title">手机号码：</label></span><span class="title_in"><input id="mobilephone" readonly="" type="text" name="mobilephone" value="<?php echo $order->mobilephone; ?>"/></span><span class="tips"></span></p>
		  
          <p class="clearfix"><span class="title_text"><label for="title">电话号码：</label></span><span class="title_in"><input id="telephone" readonly="" type="text" name="telephone" value="<?php echo $order->telephone; ?>"/></span><span class="tips"></span></p>
		  
          <p class="clearfix"><span class="title_text"><label for="title">电子邮箱：</label></span><span class="title_in"><input id="email" readonly="" type="text" name="email" value="<?php echo $order->email; ?>"/></span><span class="tips"></span></p>
		  
          <p class="clearfix"><span class="title_text"><label for="title">支付方式：</label></span><span class="title_in"><input id="payment" readonly="" type="text" name="payment" value="<?php echo $order->payment; ?>"/></span><span class="tips"></span></p>
		  
          
          <?php
		  $i=0;
		  foreach($orderfield as $list){
		  $keyword=$list['keyword'];
		  ?>
		  <p class="clearfix"><span class="title_text"><label for="title"><?php echo $list['title']; ?>：</label></span><span class="title_in">
		  <?php if($list['type']=='1'){ ?>
		      <input id="uid" readonly="" type="text" name="order[<?php echo $i; ?>][value]" value="<?php foreach($ordermeta as $lista){if($keyword==$lista['meta_key']){echo $lista['meta_value'];}} ?>"/>
		  <?php }else if($list['type']=='2'){ ?>
		      <textarea rows="5" readonly="" name="order[<?php echo $i; ?>][value]" class="words"> <?php foreach($ordermeta as $lista){if($keyword==$lista['meta_key']){echo $lista['meta_value'];}} ?></textarea>
		  <?php }else if($list['type']=='3'){ ?>
		      <select name="order[<?php echo $i; ?>][value]"><?php foreach(explode(';',$list['property']) as $list){ ?><option value="<?php echo reset(explode(',',$list)); ?>" <?php foreach($ordermeta as $lista){if($keyword==$lista['meta_key']){if($lista['meta_value']==reset(explode(',',$list))){ echo 'selected';}}} ?>><?php echo end(explode(',',$list)); ?></option><?php } ?></select>
		  <?php } ?>
		  </span><span class="tips"></span></p>
		  <input name="order[<?php echo $i; ?>][id]" type="hidden" value="<?php foreach($ordermeta as $lista){if($keyword==$lista['meta_key']){echo $lista['id'];}} ?>" />
          <input name="order[<?php echo $i; ?>][keyword]" type="hidden" value="<?php echo $list['keyword']; ?>" />
          <input name="order[<?php echo $i; ?>][title]" type="hidden" value="<?php echo $list['title']; ?>" />
		  <?php   $i++; } ?>
          
          
          <p class="clearfix"><span class="title_text"><label for="title">运费：</label></span><span class="title_in"><input id="freight" readonly="" type="text" name="freight" value="<?php echo $order->freight; ?>"/></span><span class="tips"></span></p>
		  
          <p class="clearfix"><span class="title_text"><label for="title">备注：</label></span><span class="title_in"><input id="remark" readonly="" type="text" name="remark" value="<?php echo $order->remark; ?>"/></span><span class="tips"></span></p>
		  
          <p class="clearfix"><span class="title_text"><label for="title">总额：</label></span><span class="title_in"><input id="tatalaccount" readonly="" type="text" name="tatalaccount" value="<?php echo $order->tatalaccount; ?>"/></span><span class="tips"></span></p>
		  
          <p class="clearfix"><span class="title_text"><label for="title">交易状态：</label></span><span class="title_in">
          <select name="state">
              <option <?php if($order->state=='等待买家付款'){echo 'selected="selected"';} ?> value="等待买家付款">等待买家付款</option>
              <option <?php if($order->state=='等待发货'){echo 'selected="selected"';} ?> value="等待发货">等待发货</option>
              <option <?php if($order->state=='完成订单'){echo 'selected="selected"';} ?> value="完成订单">完成订单</option>
          </select>
          </span><span class="tips"></span></p>
          <h1 align="center">订购产品</h1>
		  <table style="margin-left: 50px;margin-top: 30px; margin-bottom: 30px; width: 80%; ">
          <th width="70">产品图片</th>
          <th width="100">编号</th>
          <th width="*">名称</th>
          <th width="100">单价</th>
          <th width="100">数量</th>
          <?php 
              $queryp = $this->db->query("select * from myorder where parentid='".$order->id."'");
              $listp=$queryp->result_array();
              foreach($listp as $item){
          ?>
          <tr>
              <td>
              
              <a href="<?php echo base_url().'index.php/category/post/'.$item['categoryname'].'/'.$item['short']; ?>" target="_blank">
                  <img width="50" height="50" src="<?php echo base_url();?>uploads/<?php echo $item['image']; ?>">
              </a>
              
              </td>
              <td>
                  <?php echo $item['productcode']; ?>
              </td>
              <td>
                  <?php echo $item['productname']; ?>
              </td>
              <td>
                  <?php echo $item['productprice']; ?>
              </td>
              <td>
                  <?php echo $item['productquantity']; ?>
              </td>
          </tr>
          <?php } ?>
          </table>
          
          
          
          
          <input id="id" type="hidden" name="id" value="<?php echo $order->id; ?>"/>
		  



          <div class="clearfix" style="padding-left:50px;"><ul class="btnbg"><li><input type="submit" value="确认修改" class="btn" /></li></ul></div>
		  </form>
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
<script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
