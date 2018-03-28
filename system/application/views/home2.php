<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <title>O'better</title>
    ﻿<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="format-detection" content="telephone=no">
<meta name="renderer" content="webkit">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="alternate icon" type="image/png" href="images/favicon.png">
<link rel='icon' href='favicon.ico' type='image/x-ico' />
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" href="<?php echo $url; ?>css/default.min.css?t=227" />
<!--[if (gte IE 9)|!(IE)]><!-->
<script type="text/javascript" src="<?php echo $url; ?>lib/jquery/jquery.min.js"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]>
<script src="<?php echo $url; ?>js/jquery.min.js"></script>
<script src="<?php echo $url; ?>js/modernizr.js"></script>
<script src="<?php echo $url; ?>lib/amazeui/amazeui.ie8polyfill.min.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo $url; ?>lib/handlebars/handlebars.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>lib/iscroll/iscroll-probe.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>lib/amazeui/amazeui.min.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>lib/raty/jquery.raty.js"></script>
<script type="text/javascript" src="<?php echo $url; ?>js/main.min.js?t=1"></script>
</head>
<body>
<?php $this->load->view('header'); ?>

    <div class="index-nav">
        <div class="cms-g">
            <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
                <div class="index-nav-item">
                    <div class="index-nav-img">
                        <img src="<?php echo base_url(); ?>uploads/250.250.1381822154_images1_03.png" />
                    </div>
                    <div class="index-nav-info">
                        <h1>LED</h1>
                        <h2>Green environmental protection with superior quality</h2>
                        <em class="font"><a href="<?php $this->classl->flpage('LED'); ?>">Details&#xe72f;</a></em>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
                <div class="index-nav-item">
                    <div class="index-nav-img">
                        <img src="<?php echo base_url(); ?>uploads/250.250.1381809586_images_03.png" />
                    </div>
                    <div class="index-nav-info">
                        <h1>Motorcycle light bulb</h1>
                        <h2>Professional technology, high efficiency and durability</h2>
                        <em class="font"><a href="<?php $this->classl->flpage('Motorcycle_bulb'); ?>">Details&#xe72f;</a></em>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
                <div class="index-nav-item">
                    <div class="index-nav-img">
                        <img src="<?php echo base_url(); ?>uploads/250.250.1381819578_images_08.png" />
                    </div>
                    <div class="index-nav-info">
                        <h1>Automobile bulb</h1>
                        <h2>Leading science and technology, energy saving and high efficiency</h2>
                        <em class="font"><a href="<?php $this->classl->flpage('Automotive_lighting'); ?>">Details&#xe72f;</a></em>
                    </div>
                </div>
            </div>
            <div class="am-u-sm-6 am-u-md-6 am-u-lg-3">
                <div class="index-nav-item">
                    <div class="index-nav-img">
                        <img src="<?php echo base_url(); ?>sitebuilder/banner13/bannerimages/26/perf-globes-side-banner.jpg" />
                    </div>
                    <div class="index-nav-info">
                        <h1>All products</h1>
                        <h2>Leading science and technology, energy saving and high efficiency</h2>
                        <em class="font"><a href="<?php $this->classl->flpage('products'); ?>">Details&#xe72f;</a></em>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="index-content">
        <div class="cms-g">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                <div class="index-content-left">
                        <h1>Product Center</h1>
                        <div class="am-slider am-slider-default" data-am-flexslider id="demo-slider-0">
                            <ul class="am-slides">
                                <?php foreach($this->classl->li(2,7) as $li){ ?>
                                    <li><a href="<?php $this->classl->xxpage($li['short']); ?>" ><img src="<?php echo base_url(); ?>uploads/250.250.<?php echo $li['image']; ?>" /></a></li>
                                <?php } ?>
                                <?php foreach($this->classl->li(2,8) as $li){ ?>
                                    <li><a href="<?php $this->classl->xxpage($li['short']); ?>" ><img src="<?php echo base_url(); ?>uploads/250.250.<?php echo $li['image']; ?>" /></a></li>
                                <?php } ?>
                                <?php foreach($this->classl->li(2,9) as $li){ ?>
                                    <li><a href="<?php $this->classl->xxpage($li['short']); ?>" ><img src="<?php echo base_url(); ?>uploads/250.250.<?php echo $li['image']; ?>" /></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <!--<strong><a href="#">E27射灯是220V LED射灯的理想替代品。这款GU10 / E27射灯是高效的LED射灯产品，仅仅只消耗了5W的电压，真正意义降低的能源E27射灯是220V LED射灯的理想替代品。这款GU10 / E27射灯是高效的LED射灯产品，仅仅只消耗了5W的电压，真正意义降低的能源</a></strong>
                        <em><a href="<?php $this->classl->flpage('products'); ?>">详情介绍<i class="font">&#xe78d;</i></a></em>  -->
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                <div class="index-content-center">
                    <h1>News<a href="<?php $this->classl->flpage('news'); ?>">MORE<i class="font">&#xe78d;</i></a></h1>
                    <ul>
                        <?php foreach($this->classl->li(6,10) as $li){ ?>
                        <li><a href="<?php $this->classl->xxpage($li['short']); ?>"><span><?php echo $li['title']; ?> </span><em><?php echo $li['addtime']; ?></em></a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
                <div class="index-content-right">
                    <h1>Product usage<a href="<?php $this->classl->flpage('usage'); ?>">MORE<i class="font">&#xe78d;</i></a></h1>
                    <img src="<?php echo base_url(); ?>sitebuilder/banner13/bannerimages/20/globe-app-guide.jpg" style="width: 141px;border-radius: 16px;"/>
                    <ul>
                        <?php foreach($this->classl->li(5,11) as $li){ ?>
                            <li><a href="<?php $this->classl->xxpage($li['short']); ?>"><span><?php echo $li['title']; ?> </span></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('footer'); ?>
</body>
</html>