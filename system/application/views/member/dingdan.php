<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0038)http://www.haotm.cn/index.aspx -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>信息提示</title>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/overhtml.css"/>
</head>
<body>
<div id="overwarp">
<div class="cart_table">
<div id="productList">
    
    
<?php foreach($list as $items){ ?>
    
<table cellspacing="0" cellpadding="0" width="100%" id="CartTb" class="Table">
 <tbody>
 <tr>
    <td style="height: 30px;" colspan="7" class="align_Right Tfoot"><span style="font-size: 14px;"><b><?php echo $items['orderid']; ?> 订单：</b></span></td>
 </tr>
 <tr class="align_Center Thead">
    <td width="9%" style="height: 30px;">商品编号</td>
    <td>商品名称</td>
    <td width="14%">单价</td>
    <td width="12%">商品数量</td>
    <td width="15%">状态</td>
 </tr>

<?php 

$queryb = $this->db->query("select * from myorder where parentid='".$items['id']."' order by id");
$listb=$queryb->result_array();
$tatal=0;
foreach($listb as $itemb){
 ?>

<tr class="align_Center">
   <td style="padding: 5px 0pt;">311292</td>
   <td class="align_Left"><div class="p-img"><a href="<?php echo base_url().'index.php/category/post/'.$itemb['categoryname'].'/'.$itemb['short']; ?>" target="_blank"><img src="<?php echo base_url();?>uploads/<?php echo $itemb['image']; ?>"></a></div><span><a href="<?php echo base_url().'index.php/category/post/'.$itemb['categoryname'].'/'.$itemb['short']; ?>" target="_blank"><?php echo $itemb['productname'] ?></a></span></td>
   <td><?php echo $itemb['productprice']; ?></td>
   <td><a><?php echo $itemb['productquantity']; ?></a></td>
   <td><a><?php echo $items['state']; ?></a></td>
</tr>

<?php $tatal=$tatal+($itemb['productprice']*$itemb['productquantity']); } ?>

 <tr>
    <td style="height: 30px;" colspan="7" class="align_Right Tfoot"><span style="font-size: 14px;"><b>商品总金额(不含运费)：<span id="cartBottom_price" class="price">￥<?php echo $tatal; ?></span>元</b></span></td>
 </tr>
</tbody></table>
<?php } ?>

    </div>
    
    </div>
</div>
</body>
</html>