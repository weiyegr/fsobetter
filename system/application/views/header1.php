<!--

-->
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
</SCRIPT>
                
				
				<form action="<?php echo base_url(); ?>index.php/category/search/products" method="post">
					<fieldset>
						<input type="text" name="searchtxt" value="" /><button type="submit">搜索</button>
					</fieldset>
				</form>
				<!--<div style="float: right;margin: 49px 0 0;"><a style="color:white;" href="<?php echo base_url() ?>en/">English</a> 中文&nbsp;&nbsp;</div>-->
            <ul id="nav">
					<li class="home"><a href="<?php echo base_url(); ?>">Home</a>
					<li><a class="products">Products</a>
						<ul>
				<?php foreach($this->classl->listingarr(1) as $li){ ?>
				<li>
					<a href="<?php echo $li['url']; ?>" class="driving-fog-lamps"><?php echo $li['title']; ?></a>
									</li>
				<?php } ?>

				</ul>
					</li>
					<li><a href="<?php $this->classl->flpage('latest_release'); ?>" class="latestrelease">Latest Release</a></li>
					<li><a class="news">Media</a>
						<ul class="news_menu">
							<li><a href="<?php $this->classl->flpage('videos'); ?>">视频</a></li>
							
							<li><a href="<?php $this->classl->flpage('press_releases'); ?>">新闻稿</a></li>
							<li><a href="<?php $this->classl->bdpage(); ?>">订阅</a></li>
						</ul>
					</li>
					<li><a href="<?php $this->classl->xxpage('aboutus'); ?>" class="aboutus">About Us</a></li>
					<li><a href="<?php $this->classl->xxpage('contactus'); ?>" class="contactus">Contact Us</a></li>
				</ul>