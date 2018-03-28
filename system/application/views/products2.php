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
    <div class="com-container">
        <div class="cms-g">
            <div class="am-hide-sm-only am-u-md-3 am-u-lg-3">
                <div class="com-nav-left">
                    <h1><i>PRODUCT</i></h1>
                    <ul>
                        <?php foreach($this->classl->listingarr(1) as $li){ ?>
                        <li<?php if(array_key_exists($li['short'],$on)){echo ' class="on"';} ?>><a href="<?php echo $li['url']; ?>"><?php echo $li['title']; ?></a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
            <div class="am-u-sm-12 am-u-md-9 am-u-lg-9">
                <div class="com-nav-title">
                    <a href="#doc-oc-demo1" class="font am-show-sm-only" data-am-offcanvas>&#xe68b;</a>
                    <span><?php echo end($on); ?></span>
                </div>

                <div class="product-list">
                    <?php foreach($posts as $li){ ?>
                    <div class="am-u-sm-6 am-u-md-4 am-u-lg-3">
                        <div class="product-list-item">                  
                            <div class="product-list-item-bj">
                                <a href="<?php $this->classl->xxpage($li['short']); ?>"><img src="<?php echo base_url(); ?>uploads/250.250.<?php echo $li['image']; ?>" /></a>
                            </div>
                            <div class="product-list-item-title">
                                <a href="<?php $this->classl->xxpage($li['short']); ?>" class="f-toe" style="text-align: center;"><?php echo $li['title']; ?></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <!--
                <div class="page-list">
                    <a href="#"><<</a>
                    <a href="#"><</a>
                    <a href="#" class="num">1</a>
                    <a href="#" class="num">2</a>
                    <a href="#" class="num">3</a>
                    <a href="#" class="on">4</a>
                    <a href="#" class="num">5</a>
                    <a href="#" class="num">6</a>
                    <a href="#">></a>
                    <a href="#">>></a>
                </div>
                -->
            </div>
        </div>
    </div>
    <div id="doc-oc-demo1" class="am-offcanvas">
        <div class="am-offcanvas-bar">
            <div class="am-offcanvas-content com-nav-left com-nav-left1">
                <ul>
                    <li class="on"><span><a href="#">LED T8灯管</a></span></li>
                    <li><span><a href="#">LED射灯</a></span></li>
                    <li><span><a href="#">LED软光灯</a></span></li>
                    <li><span><a href="#">LED泛光灯</a></span></li>
                    <li><span><a href="#">LED洗墙灯</a></span></li>
                </ul>
            </div>
        </div>
    </div>
    <?php $this->load->view('footer'); ?>
</body>
</html>