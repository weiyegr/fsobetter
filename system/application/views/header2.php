<SCRIPT type=text/javascript>
    function IsPC() {
        var userAgentInfo = navigator.userAgent;
        var Agents = ["Android", "iPhone",
            "SymbianOS", "Windows Phone",
            "iPad", "iPod"];
        var flag = true;
        for (var v = 0; v < Agents.length; v++) {
            if (userAgentInfo.indexOf(Agents[v]) > 0) {
                flag = false;
                break;
            }
        }
        return flag;
    }
    if(!IsPC()){
        window.location.href="<?php echo base_url();?>index.php/home/m_index";
    }
    function formSubmit()
    {
        document.getElementById("myForm").submit()
    }
</SCRIPT>
<header class="header">
    <div class="header-container">
        <div class="header-div pull-left">
            <a class="header-logo">
                <img src="<?php echo $url; ?>images/obt.png" style="height: 55px;width:auto;"/>
            </a>
            <button class="am-show-sm-only am-collapsed font f-btn" data-am-collapse="{target: '.header-nav'}">&#xe68b;</button>
        </div>


        <nav>
            <ul class="header-nav am-collapse">
                <li<?php if(array_key_exists('home',$on)){echo ' class="on"';} ?>><a href="<?php echo base_url(); ?>">Home</a></li>
                <li<?php if(array_key_exists('aboutus',$on)){echo ' class="on"';} ?>><a href="<?php $this->classl->xxpage('aboutus'); ?>">About us</a></li>
                <li<?php if(array_key_exists('products',$on)){echo ' class="on"';} ?>><a href="<?php $this->classl->flpage('products'); ?>">Products</a></li>
                <li<?php if(array_key_exists('news',$on)){echo ' class="on"';} ?>><a href="<?php $this->classl->flpage('news'); ?>">News</a></li>
                <li<?php if(array_key_exists('usage',$on)){echo ' class="on"';} ?>><a href="<?php $this->classl->flpage('usage'); ?>">Product usage</a></li>
                <li<?php if(array_key_exists('contactus',$on)){echo ' class="on"';} ?>><a href="<?php $this->classl->xxpage('contactus'); ?>">Contact us</a></li>
            </ul>
            <form action="<?php echo base_url(); ?>index.php/category/index/products" method="post" id="myForm">
            <div class="header-serch  am-hide-md-down" >

                <input type="text" name="searchtxt" value="" />
                <em class="font" onclick="formSubmit()">&#xe632;</em>

            </div>
            </form>
        </nav>


    </div>
</header>
<div class="com-banner">
    <img src="<?php echo base_url(); ?>sitebuilder/banner13/bannerimages/10/plus_100_homepage_v2.jpg"/>
</div>