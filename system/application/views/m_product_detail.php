<!DOCTYPE html>
<!-- saved from url=(0076)http://www.17sucai.com/preview/390547/2017-01-11/Mobile/product-details.html -->
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
        <div class="news">
            <h3>
                <span>产品详情</span>
                <span>Product</span>
            </h3>
            <div class="main_center2">

                <div class="box1 product_box">
                    <div class="pr_details">
                        <h4><?php echo $archive->title; ?></h4>
                        <div class="product"><img src="<?php echo base_url(); ?>uploads/<?php echo $archive->image; ?>"></div>
                        <div class="product_title">
                            <p class="title_p">产品详情</p>
                            <p class="p_txt"><?php echo $archive->shuoming; ?></p>
                            <p class="p_txt"><?php echo $archive->content1; ?></p>

                        </div>
                    </div>



                </div>
            </div>
            <div class="clear"></div>
            <?php $this->load->view('m_footer'); ?>
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
        <script type="text/javascript">
            $(".search").click(
                function(){
                    $(".search-in-box").slideToggle(300);
                }
            )
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

        </script>
        <!-- 无缝滚动 -->
        <script src="<?php echo $url; ?>images/jquery.cxscroll.js"></script>
        <script>
            $("#pic_list_1").cxScroll();
        </script>


    </div></div></body></html>