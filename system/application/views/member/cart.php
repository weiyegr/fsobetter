<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0038)http://www.haotm.cn/index.aspx -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>信息提示</title>
<script src="<?php echo $url; ?>js/main.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/overhtml.css"/>
<link media="screen" rel="stylesheet" href="<?php echo $url; ?>member/css/colorbox.css" />
<script src="<?php echo $url; ?>member/js/jquery-1.4.2.min.js"></script>
<script src="<?php echo $url; ?>member/js/jquery.colorbox-min.js"></script>
</head>
<body>
<div id="overwarp">
<div class="cart_table">
<div id="productList">
    
<table cellspacing="0" cellpadding="0" width="100%" id="CartTb" class="Table">
 <tbody><tr class="align_Center Thead">
    <td width="11%" style="height: 30px;">商品编号</td>
    <td>商品名称</td>
    <td width="12%">单价</td>
    <td width="11%">商品数量</td>
    <td width="11%">删除商品</td>
 </tr>
 
<?php $totala=0; foreach($this->cart->contents() as $items){ ?>
<tr class="align_Center">
   <td style="padding: 5px 0pt;"><?php echo $items['options']['code']; ?></td>
   <td class="align_Left">
       <div class="p-img">
           <a href="<?php echo base_url().'index.php/category/post/'.$items['options']['categoryname'].'/'.$items['options']['short']; ?>" target="_blank">
               <img src="<?php echo base_url();?>uploads/<?php echo $items['options']['image']; ?>">
           </a>
       </div>
       <span>
           <a onclick="this.blur();" href="<?php echo base_url().'index.php/category/post/'.$items['options']['categoryname'].'/'.$items['options']['short']; ?>" target="_blank"><?php echo $items['name']; ?></a>
       </span>
   </td>
   <td><?php echo $items['price']; ?></td>
   <td>
       <a style="margin-right: 2px;" title="减一">
           <img class="reduce" border="none" src="<?php echo $url; ?>images/bag_close.gif" style="display: inline;">
       </a>
       <input type="text" value="<?php echo $items['qty']; ?>" style="width: 30px;" maxlength="4" name="<?php echo $items['rowid']; ?>" class="btn_cha_311292">
       <a style="margin-left: 2px;" title="加一">
           <img class="add" border="none" src="<?php echo $url; ?>images/bag_open.gif" style="display: inline;">
       </a>
   </td>
   <td><a class="del" id="<?php echo $items['rowid']; ?>" href="#none">删除</a></td>
</tr>

<?php } ?>

 <tr>
    <td style="height: 30px;" colspan="7" class="align_Right Tfoot"><span style="font-size: 14px;"><b>商品总金额(不含运费)：<span id="cartBottom_price" class="price">￥<span id="allprice">0.00</span></span>元</b></span></td>
 </tr>
</tbody></table>

    </div>

<ul style="margin-bottom: 0px;" class="cart_op">
			<li id="clearcart" style="cursor: pointer;" class="li2"><a>清空购物车</a></li>
			<li class="li3">
			<div id="submit_info">
			</div>
			<div style="text-align: right;" id="submit_btn">
			
			<a style="cursor: pointer;" id="continueBuyBtn">继续购物</a>
	       
            <a style="cursor: pointer;" id="gotoOrderInfo" class='example7' href="<?php echo base_url();?>index.php/myorder/dingdan1_view" title="结算中心">去结算</a>
	        
			
			</div>
			<div id="submit_error" style="padding-right: 9px; text-align: right; border: 1px solid rgb(255, 255, 255);"></div>
			<input type="button" value="提交" onclick="runOrderInfo_server(this);" style="display: none;" id="BtnRunOrder_server">
			
			</li>
		</ul>
    
    </div>
</div>
</body>
</html>


<script type="text/javascript">
    
$("document").ready(function(){
    $.get("<?php echo base_url(); ?>index.php/myorder/price", function(data){$("#allprice").html(parseFloat(data).toFixed(2));})
    $(".del").click(function(){
		    var ida=$(this).attr("id");
			if(confirm('确认要删除?此操作不可恢复!')){
				$.get("<?php echo base_url(); ?>index.php/myorder/remove/"+ida+'/', function(data){
					var idb='#'+ida;
					$(idb).parent().parent().remove();
				})
			}
		
    })
    
    $(".btn_cha_311292").blur(function(){
        var quval=$(this).attr("name");
        var quval2=$("input[name="+quval+"]").val();
        $.get("<?php echo base_url(); ?>index.php/myorder/adjust/"+quval+'/'+quval2, function(data){
            $.get("<?php echo base_url(); ?>index.php/myorder/price", function(data){$("#allprice").html(parseFloat(data).toFixed(2));})
        })
    })
    
    $(".reduce").click(function(){
        var quval=$(this).parent().next().attr("name");
        var quval1=$("input[name="+quval+"]").val();
        if(quval1 != 1){
        $("input[name="+quval+"]").val($("input[name="+quval+"]").val()-1);
        var quval2=$("input[name="+quval+"]").val();
            $.get("<?php echo base_url(); ?>index.php/myorder/adjust/"+quval+'/'+quval2, function(data){
                $.get("<?php echo base_url(); ?>index.php/myorder/price", function(data){$("#allprice").html(parseFloat(data).toFixed(2));})
            })
        }
    })
    
    $(".add").click(function(){
        var quval=$(this).parent().prev().attr("name");
        $("input[name="+quval+"]").val(parseInt($("input[name="+quval+"]").val())+1);
        var quval2=$("input[name="+quval+"]").val();
        $.get("<?php echo base_url(); ?>index.php/myorder/adjust/"+quval+'/'+quval2, function(data){
            $.get("<?php echo base_url(); ?>index.php/myorder/price", function(data){$("#allprice").html(parseFloat(data).toFixed(2));})
        })
    })
    
    $("#clearcart").click(function(){
        $.get("<?php echo base_url(); ?>index.php/myorder/emptya", function(data){
            alert("购物车已清空");
            history.go(0);
        })
    })
    
    $("#continueBuyBtn").click(function(){
            history.go(0);
    })
    
})
</script>