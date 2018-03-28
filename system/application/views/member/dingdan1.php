<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<!-- saved from url=(0038)http://www.haotm.cn/index.aspx -->
<HTML xmlns="http://www.w3.org/1999/xhtml"><HEAD> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>信息提示</title>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/overhtml.css"/>
<link media="screen" rel="stylesheet" href="<?php echo $url; ?>member/css/colorbox.css" />
<script src="<?php echo $url; ?>member/js/jquery-1.4.2.min.js"></script>
<script src="<?php echo $url; ?>member/js/jquery.colorbox-min.js"></script>

</head>
<body>
<form id="diandan1form">
<div id="overwarp">
<div class="cart_table">

<div class="o_write">

<h1>收货人信息</h1>

<div class="middle">

<div id="addressListPanel"></div>

<div id="consignee_addr">

<table cellspacing="0" border="0" width="100%">

<tbody><tr>
    <td align="right" width="85" valign="middle"><font color="red">*</font>收货人姓名：</td>
    <td align="left" valign="middle">
        <input name="name" type="text" maxlength="20" class="txt">&nbsp;<span style="color: red;" id="namenotice"></span>
    </td>
</tr>

<tr>
    <td align="right" valign="middle"><font color="red">*</font>收货地址：</td>
    <td align="left" valign="middle">
        <span id="consignee_arae"><select name="province" id="consignee_province"><option value="-22">请选择</option>
        <option value="北京">北京</option>
        <option value="上海">上海</option>
        <option value="天津">天津</option>
        <option value="重庆">重庆</option>
        <option value="河北">河北</option>
        <option value="山西">山西</option>
        <option value="河南">河南</option>
        <option value="辽宁">辽宁</option>
        <option value="吉林">吉林</option>
        <option value="黑龙江">黑龙江</option>
        <option value="内蒙古">内蒙古</option>
        <option value="江苏">江苏</option>
        <option value="山东">山东</option>
        <option value="安徽">安徽</option>
        <option value="浙江">浙江</option>
        <option value="福建">福建</option>
        <option value="湖北">湖北</option>
        <option value="湖南">湖南</option>
        <option selected="" value="广东">广东</option>
        <option value="广西">广西</option>
        <option value="江西">江西</option>
        <option value="四川">四川</option>
        <option value="海南">海南</option>
        <option value="贵州">贵州</option>
        <option value="云南">云南</option>
        <option value="西藏">西藏</option>
        <option value="陕西">陕西</option>
        <option value="甘肃">甘肃</option>
        <option value="青海">青海</option>
        <option value="宁夏">宁夏</option>
        <option value="新疆">新疆</option>
        <option value="台湾">台湾</option>
        <option value="香港">香港</option>
        <option value="澳门">澳门</option>
        <option value="钓鱼岛">钓鱼岛</option></select>
        <input name="address" type="text" style="margin-left: 2px; width: 327px;" maxlength="50" class="txt">&nbsp;
        <br /><span style="color: red;" id="provincenotice"></span>
        </span>
    </td>
</tr>

<tr>
    <td align="right" valign="middle"><font color="red">*</font>手机号码：</td>
    <td align="left" valign="middle">
        <input name="mobilephone" type="text" class="txt" id="consignee_message"> &nbsp;或者 固定电话： <input name="telephone" type="text" class="txt" id="consignee_phone">&nbsp;<font color="#000000">用于接收发货通知短信及送货前确认</font>
        <br /><span style="color: red;" id="phonenotice"></span>
    </td>
</tr>


<tr>
    <td align="right" valign="middle">电子邮件：</td>
    <td align="left" valign="middle">
        <input name="email" type="text" class="txt" id="consignee_email"> &nbsp;<font color="#000000">用来接收订单提醒邮件，便于您及时了解订单状态</font>
    </td>
</tr>


<tr>
    <td align="right" valign="middle">邮政编码：</td>
    <td align="left" valign="middle">
         <input name="post" type="text" style="width: 77px;" class="txt" id="consignee_postcode">&nbsp;<font color="#000000" style="margin-left: 53px;">有助于快速确定送货地址</font>
     </td>
</tr>





</tbody></table>
    
</div>

</div>

</div>

<div id="part_payTypeAndShipType">
<div class="o_write">
     <div id="updateInfo_payType"></div>
     <h1>支付及配送方式</h1>
     <div id="part_payType" class="middle">
         <table cellspacing="0" cellpadding="0" border="0" width="100%">
             <tbody><tr>
                <td style="width: 240px;"><div class="grouptitle">支付方式</div></td>
                <td style="border-bottom: 1px solid rgb(238, 238, 238);">备注</td>
             </tr>
         </tbody></table>
         
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody><tr>
   <td align="left" valign="top" style="width: 240px;">
        <input type="radio" value="支付宝" checked="" id="IdPaymentType4" name="IdPaymentType"><label for="IdPaymentType4" style="margin-left: 2px;">支付宝</label>
    </td>
    <td valign="top" class="gray">即时到帐，国内领先的独立第三方支付平台 </td>
</tr>
</tbody></table>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody><tr>
   <td align="left" valign="top" style="width: 240px;">
        <input type="radio" value="财付通" id="IdPaymentType3" name="IdPaymentType"><label for="IdPaymentType3" style="margin-left: 2px;">财付通</label>
    </td>
    <td valign="top" class="gray">即时到帐，腾讯公司创办的在线支付平台</td>
</tr>
</tbody></table>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody><tr>
   <td align="left" valign="top" style="width: 240px;">
        <input type="radio" value="网银在线" id="IdPaymentType5" name="IdPaymentType"><label for="IdPaymentType5" style="margin-left: 2px;">网银在线</label>
    </td>
    <td valign="top" class="gray">即时到帐，提供包括网上在线支付网关、MOTOpay信用卡无卡支付等</td>
</tr>
</tbody></table>

<table cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody><tr>
   <td align="left" valign="top" style="width: 240px;">
        <input type="radio" value="线下支付" id="IdPaymentType2" name="IdPaymentType"><label for="IdPaymentType2" style="margin-left: 2px;">线下支付</label>
    </td>
    <td valign="top" class="gray">当面付款后验货，支持现金、POS机刷卡、支票支付</td>
</tr>
</tbody></table>

      </div>
        
      <div style="margin-top: 8px;" id="part_shipType" class="middle">
          
<table cellspacing="0" cellpadding="0" border="0" align="enter" width="100%" id="ShipMentTab">
   <tbody><tr>
        <td height="24" align="left" width="130px" valign="top" style="border-bottom: 1px solid rgb(238, 238, 238);">
            <div class="grouptitle">配送方式</div>
        </td>
        <td align="left" width="155px" valign="top" style="border-bottom: 1px solid rgb(238, 238, 238);">运费</td>

        <td align="left" width="105px" valign="top" style="border-bottom: 1px solid rgb(238, 238, 238);">货物在途时间</td>
        <td align="left" valign="top" style="border-bottom: 1px solid rgb(238, 238, 238);">备注</td>
   </tr>
</tbody></table>

<table cellspacing="0" cellpadding="0" border="0" align="enter" width="100%" id="ShipMentTab">
   <tbody><tr>
        <td height="24" align="left" width="130px" valign="top">
        <input type="radio" value="0" checked="" name="IdShipmentType">
          <label for="IdShipmentType70" style="margin-left: 2px;">快递运输</label>
        </td>
        <td align="left" width="155px" valign="top">0.00元<span style="color: red;">(免运费)</span></td>
        <td align="left" width="105px" valign="top">1-2天</td>
        <td align="left" valign="top" class="gray">一般选用价格较低廉的快递公司，或邮局快包，中铁快运等。</td>
   </tr>
</tbody></table>

      </div>

</div>
</div>

<div id="part_remark">
<div class="o_write">
    <h1>订单备注  <span class="f12 fw100">声明：备注中有关收货人信息、支付方式、配送方式、发票信息等购买要求一律以上面的选择为准，备注无效。</span></h1>
    <div class="middle">
        <input name="remark" type="text" maxlength="15" class="txt" style="width: 300px;">   &nbsp;&nbsp;&nbsp;<font color="#cccccc">限15个字</font>
    </div>
    
</div>
</div>

<div id="part_cart">
<div class="o_show">
   <h1><span>商品清单</span> <a class='example6' href="<?php echo base_url();?>index.php/myorder/cart_view" title="购物车">返回修改购物车</a></h1>
   <div class="middle">
       <table cellspacing="0" cellpadding="0" width="100%" class="Table">
         <tbody><tr class="align_Center Thead">
            <td width="15%">商品编号</td>
            <td>商品名称</td>
            <td width="10%">单价</td>
            <td width="15%">商品数量</td>
         </tr>

<?php foreach($this->cart->contents() as $items){ ?>        
<tr class="align_Center">
   <td style="padding: 5px 0pt;"><?php echo $items['options']['code']; ?></td>
   <td class="align_Left"><a onclick="this.blur();" href="<?php echo base_url().'index.php/category/post/'.$items['options']['categoryname'].'/'.$items['options']['short']; ?>" target="_blank"><?php echo $items['name']; ?></a></td>
   <td><span class="price">￥<?php echo $items['price']; ?></span></td>
   <td><?php echo $items['qty']; ?></td>
</tr>

<?php } ?>

     </tbody></table>
   </div>
   <div class="footer"></div>
</div>

</div>

<div id="ware_info">
                  
                  <div style="background: none repeat scroll 0% 0% rgb(255, 255, 255); font-size: 14px; font-weight: bold; padding-left: 2px;">结算信息</div>
                  <h1></h1>
                  <div class="middle">
                    <!--订单信息-->
                    <ul id="part_info">
                      

<li style="padding-bottom: 5px;" class="info1">
    商品金额：<?php echo $this->cart->total(); ?>元 + 运费：0.00元
<br>
</li>

<li style="width: 100%; overflow: hidden;" class="info2">
     <table cellspacing="0" cellpadding="0" style="width: 100%;">
        <tbody><tr>
          <td style="text-align: right; font-size: 15px;"><b>应付总额：<font color="red"><?php echo $this->cart->total(); ?></font> 元</b>
          </td>
       </tr>
     </tbody></table></li>
                    </ul>
                    <!--订单信息结束-->
      <div style="clear: both;"></div>

                    </div>
                   </div>
                   
<div class="o_show submit"> 
                         <div><span id="submitWaitInfo"></span></div>
                        <div id="submit_error"></div>
                        <div id="submit_btn">
                          
                          <span id="ccPanel"></span>
                          <input type="button" style="margin-top: 2px; border: medium none; cursor: pointer; width: 160px; height: 53px; background: url(&quot;http://www.360buy.com/purchase/skin/images/submit.jpg&quot;) repeat scroll 0% 0% transparent;" id="submita"> 
                        </div>
                </div>           
    
    </div>
    

</div>
</form>
</body>
<script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<script language="javascript">
$("document").ready(function(){
  $("#submita").click(function(){
        if($("input[name='name']").val()==''){
            $("#namenotice").html("请填写收货人");
            $("input[name='name']").focus();
            return false;
        }else{
            $("#namenotice").html("");
        }
        
        if($("#consignee_province").val()=='-22'){
            $("#provincenotice").html("请选择省份");
            $("#consignee_province").focus();
            return false;
        }else{
            $("#provincenotice").html("");
        }
        
        if($("input[name='address']").val()==''){
            $("#provincenotice").html("请填写收货地址");
            $("input[name='name']").focus();
            return false;
        }else{
            $("#provincenotice").html("");
        }
        
        if($("input[name='mobilephone']").val()=='' && $("input[name='telephone']").val()==''){
            $("#phonenotice").html("请填写手机或电话其中一个号码");
            $("input[name='mobilephone']").focus();
            return false;
        }else{
            $("#phonenotice").html("");
        }
        
        
        $("document").ready(function(){
            $.post("<?php echo base_url();?>index.php/myorder/orderadd",$("#diandan1form").serialize(),function(data){})
        })
        
        $("#overwarp").html('<h3>成功提交订单</h3><p class="colorddd">您的订单已经成功提交，我们会尽快为您处理，感谢您的支持！</p><p class="colorddd">请继续浏览网站的其它内容！</p>');
    
  })
})
</script>
</html>
