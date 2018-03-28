<!DOCTYPE html>
<!-- saved from url=(0073)http://www.17sucai.com/preview/390547/2017-01-11/Mobile/product-list.html -->
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
                <span>产品展示</span>
                <span>product</span>
            </h3>
            <div class="main_center2">
                <ul>
                    <?php $i=0;foreach($this->classl->listingarr(1) as $li){ ?>
                        <li<?php if($i==0){echo ' class="selected"';} ?>><?php echo $li['title']; ?></li>
                    <?php $i++;} ?>
                </ul>
                <div class="clear"></div>
                <div class="box1 product_box box1_product">
                    <?php $i=0;foreach($this->classl->listingarr(1) as $li){ ?>
                    <div<?php if($i!=0){echo ' class="hide"';} ?>>
                        <?php foreach($this->classl->li(100,$li['id']) as $li2){ ?>
                        <dl>
                            <dt><a href="<?php echo base_url();?>index.php/mcategory/detail/<?php echo $li2['short']; ?>"><img src="<?php echo base_url(); ?>uploads/140.140.<?php echo $li2['image']; ?>"></a></dt>
                            <dd><a href="<?php echo base_url();?>index.php/mcategory/detail/<?php echo $li2['short']; ?>"><?php echo $li2['title']; ?></a></dd>
                            <!--<dd><a href="http://www.17sucai.com/preview/390547/2017-01-11/Mobile/product-list.html#" class="red">￥2000</a></dd>-->
                        </dl>
                        <?php } ?>

                    </div>
                    <?php $i++;} ?>

                </div>
                <!--
                <div class="page">
                    <a href="" class="one line">1</a>
                    <a href="" class="line">2</a>
                    <a href="" class="line">3</a>
                    <a href="" class="line">4</a>
                    <a href="http://www.17sucai.com/preview/390547/2017-01-11/Mobile/product-list.html#" class="line">...</a>
                    <a href="" class="wd line">上一页</a>
                    <a href="" class="wd line">下一页</a>
                    <a href="" class="wd line">尾页</a>
                </div>
                -->
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
        $('.main_center2 ul li').mouseover(function(){
            $(this).addClass('selected').siblings().removeClass('selected');
            var $a=$(this).index();//获取序列号
            $('.box1>div').eq($a).show().siblings().hide();
        })
    })
</script>
<!-- 无缝滚动 -->
<script src="<?php echo $url; ?>images/jquery.cxscroll.js"></script>
<script>
    $("#pic_list_1").cxScroll();
</script>
<script type="text/javascript">
    $(".search").click(
        function(){
            $(".search-in-box").slideToggle(300);
        }
    )
</script>

</body></html>