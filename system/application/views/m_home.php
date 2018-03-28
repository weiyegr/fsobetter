<!DOCTYPE html>
<!-- saved from url=(0066)http://www.17sucai.com/preview/390547/2017-01-11/Mobile/index.html -->
<html class=" js touch cssanimations csstransitions" style="font-size: 50px;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>佛山光威（欧贝特）照明科技有限公司</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="<?php echo $url; ?>images/common.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>images/page.css">
    <script>
        window.onload = function(){
            var deviceWidth = document.documentElement.clientWidth;
            document.documentElement.style.fontSize=100*document.documentElement.clientWidth/750+'px';
        }
    </script>

    <!-- 解决ie9以下浏览器对HTML5新元素的兼容性问题 -->
    <!--[if lt IE 9]>
    <script src="<?php echo $url; ?>images/html5shiv.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="box">
    <?php $this->load->view('m_header'); ?>
    <div class="clear"></div>
    <div class="cont">
        <div class="about1">
            <h3>
                <span>关于我们</span>
                <span>About us</span>
            </h3>
            <!--<div class="img_one"><img src="<?php echo $url; ?>images/index-img1.jpg"></div>-->
            <div class="company">
                <!--<h4>某某有限公司</h4>-->
                <p>&nbsp;</p>
                <p>佛山光威（欧贝特）照明科技有限公司位于佛山里水甘蕉工业园区，是一家集研究、开发、生产和销售汽车、摩托车及各种照明灯泡于一体的高科技企业。</p>

                <p>我们拥有实力强大的研发部门,经验丰富的工程师,近年来,公司一直致力于各种机动车照明技术的研究与开发,高功率LED前大灯照明技术取得了新的突破和升级。我们的产品通过了CQC、CE、CB、TUV、GS等专业证书认证,公司采用美国高质量的材料组件,德国先进的照明技术,并且进行严格的时效试验,集成测试，我们将免费更换有缺陷的产品。</p>

                <p>多品种、长寿命、高效率为我们产品提供了可靠的质量保证。稳定的质量,满意的服务和合理的价格让我们的客户遍布全球。</p>
            </div>
        </div>
        <div class="news">
            <h3>
                <span>产品展示</span>
                <span>Products</span>
            </h3>
            <div class="main_center1">
                <ul>
                    <?php $i=0;foreach($this->classl->listingarr(1) as $li){ ?>
                    <li<?php if($i==0){echo ' class="selected"';} ?>><?php echo $li['title']; ?></li>
                    <?php $i++;} ?>
                </ul>
                <div class="clear"></div>
                <div class="box1">
                    <?php $i=0;foreach($this->classl->listingarr(1) as $li){ ?>
                    <div<?php if($i!=0){echo ' class="hide"';} ?>>
                        <ol>
                            <?php foreach($this->classl->li(3,$li['id']) as $li2){ ?>
                            <li><a href="<?php echo base_url();?>index.php/mcategory/detail/<?php echo $li2['short']; ?>"><div class="ol_left" width="120" height="120" style="width:140px;overflow:hidden;"><img src="<?php echo base_url(); ?>uploads/140.140.<?php echo $li2['image']; ?>" width="auto" height="120" style="margin:0 auto;"/></div><div class="ol_left" style="    width: 16em;"><p><?php echo $li2['title']; ?></p><p><?php echo $li2['shuoming']; ?></p></div></a></li>
                            <?php } ?>



                        </ol>
                    </div>
                    <?php $i++;} ?>

                </div>
            </div>
        </div>
        <!--
        <div class="product">
            <h3>
                <span>产品信息</span>
                <span>Product</span>
            </h3>
            <div id="owl-demo" class="owl-carousel owl-theme" style="opacity: 1; display: block;">
                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 6000px; left: 0px; display: block;"><div class="owl-item" style="width: 375px;"><div class="item"><img class="lazyOwl" alt="源码之家 - www.mycodes.net" src="owl1.jpg" style="display: block;"></div></div><div class="owl-item loading" style="width: 375px;"><div class="item"><img class="lazyOwl" data-src="images/owl2.jpg" alt="源码之家 - www.mycodes.net" style="display: none;"></div></div><div class="owl-item loading" style="width: 375px;"><div class="item"><img class="lazyOwl" data-src="images/owl3.jpg" alt="源码之家 - www.mycodes.net" style="display: none;"></div></div><div class="owl-item loading" style="width: 375px;"><div class="item"><img class="lazyOwl" data-src="images/owl4.jpg" alt="源码之家 - www.mycodes.net" style="display: none;"></div></div><div class="owl-item loading" style="width: 375px;"><div class="item"><img class="lazyOwl" data-src="images/owl5.jpg" alt="源码之家 - www.mycodes.net" style="display: none;"></div></div><div class="owl-item loading" style="width: 375px;"><div class="item"><img class="lazyOwl" data-src="images/owl6.jpg" alt="源码之家 - www.mycodes.net" style="display: none;"></div></div><div class="owl-item loading" style="width: 375px;"><div class="item"><img class="lazyOwl" data-src="images/owl7.jpg" alt="源码之家 - www.mycodes.net" style="display: none;"></div></div><div class="owl-item loading" style="width: 375px;"><div class="item"><img class="lazyOwl" data-src="images/owl8.jpg" alt="源码之家 - www.mycodes.net" style="display: none;"></div></div></div></div>







                <div class="owl-controls"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev">上一张</div><div class="owl-next">下一张</div></div></div></div>
        </div>
    </div>-->
    <div class="clear"></div>
    <?php $this->load->view("m_footer"); ?>
</div>
<!-- 导航   -->
<script type="text/javascript" src="<?php echo $url; ?>images/jquery1.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>images/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>images/jquery.dlmenu.js"></script>
<script type="text/javascript">
    $(function(){
        $( '#dl-menu' ).dlmenu();
    });
</script>
<!-- banner -->
<script src="<?php echo $url; ?>images/TouchSlide.1.1.js"></script>

<script type="text/javascript">
    TouchSlide({
        slideCell: "#focus",
        titCell: ".hd ul", //开启自动分页 autoPage: true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".bd ul",
        effect: "leftLoop",
        autoPlay: true,//自动播放
        autoPage: true, //自动分页

        switchLoad: "_src" //切换加载，真实图片路径为"_src";
    });
    // 切换
    $(function(){
        $('.main_center1 ul li').mouseover(function(){
            $(this).addClass('selected').siblings().removeClass('selected');
            var $a=$(this).index();//获取序列号
            $('.box1>div').eq($a).show().siblings().hide();
        })
    })
</script>
<script type="text/javascript">
    $(".search").click(
        function(){
            $(".search-in-box").slideToggle(300);
        }
    )
</script>
<!-- 无缝滚动 -->
<!-- <script src="js/jquery.cxscroll.js"></script>
<script>
$("#pic_list_1").cxScroll();
</script> -->
<script src="<?php echo $url; ?>images/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            items : 4,
            lazyLoad : true,
            navigation : true
        });

    });
</script>


</body></html>