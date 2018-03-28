<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>O'better</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>sb/styles/homenew/style.css" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>sb/styles/homenew/css/layout.css" type="text/css" media="print" />	
		<link rel="stylesheet" href="<?php echo base_url(); ?>sb/styles/homenew/css/print.css" type="text/css" media="print" />	
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1>O'better</h1>
				<div id="logo"><a href="" title="O'better"><img src="<?php echo base_url(); ?>sb/styles/homenew/images/obetter-logo.png" alt="O'better" /></a></div>
				
				<?php $this->load->view('header'); ?>
			</div>
			<div id="banner">
				<ul id="bannerimage">								<li><a href="#" title="visit /documents/item/45" onclick="document.location='#';"><img   src="<?php echo base_url(); ?>sitebuilder/banner13/bannerimages/10/plus_100_homepage_v2.jpg" width="900" height="282" alt="O'better Plus 100 Performance Globes" /></a></li>																						
			<script type="text/javascript" src="<?php echo base_url(); ?>sb/modules/lib/jquery-ui/js/jquery-1.3.2.min.js"></script>
			<script type="text/javascript" src="<?php echo base_url(); ?>sb/modules/lib/jquery-ui/js/jquery.cycle.lite.min.js"></script>
			<script type="text/javascript">
			$('#bannerimage').cycle(
				{
					slideExpr: 'li',
					fx: 'fade',
					timeout: 8000,
					speed: 2000,
					pause: 1,
					requeueTimeout: 0
				});
			</script></ul>
			</div>
			<div id="content" class="clearfix">
				<div id="latestNewsProducts">
					<h2>
						<img src="<?php echo base_url(); ?>sb/styles/homenew/images/latest-news-banner.jpg" alt="O'better Latest News And Products" />
					</h2>
					<ul>
<?php foreach($this->classl->li(3,4) as $li){ ?>
	<li class="clearfix">
	
		<div class="left">
			<a href="<?php $this->classl->xxpage($li['short']); ?>" >
				<img src="<?php echo base_url(); ?>uploads/159.103.<?php echo $li['image']; ?>" width="159" height="103" alt="<?php echo $li['title']; ?>" />
			</a>
		</div>
	
	<div class="right small">
		<h3>
			<a href="<?php $this->classl->xxpage($li['short']); ?>" >
				<?php echo $li['title']; ?>
			</a>
		</h3>
		
			<p><?php echo $li['jianjie']; ?></p>

			<span class="more">
				<a href="<?php $this->classl->xxpage($li['short']); ?>" > > Read more </a></a>
			</span>
		
	</div>
</li>
<?php } ?>

					</ul>
				</div>
				<ul id="banners" class="clearfix">
					
	<li class="social clearfix" id="networkingYouTube">
		<a href="http://www.youtube.com/user/O'betterlighting" title="O'better YouTube">
			YouTube
		</a>
	</li>


	<li class="social clearfix" id="networkingFacebook">
		<a href="http://www.facebook.com/O'betteraustralia" title="O'better Facebook">
			Facebook
		</a>
	</li>


	<li class="social clearfix" id="networking">
		<a href="<?php $this->classl->bdpage(); ?>" title="Subscribe To O'better">
			Subscribe To O'better
		</a>
	</li>

													<li><a href="#" title="visit http://www.O'better.com.au/products/browse/performance-globes" onclick="document.location='<?php $this->classl->flpage('Automotive_lighting'); ?>';"><img   src="<?php echo base_url(); ?>sitebuilder/banner13/bannerimages/26/perf-globes-side-banner.jpg" width="305" height="170" alt="Performance Globes" /></a></li>							
													<li><a href="#" title="visit /products/globeChart" onclick="document.location='<?php $this->classl->flpage('Motorcycle_bulb'); ?>';"><img   src="<?php echo base_url(); ?>sitebuilder/banner13/bannerimages/20/globe-app-guide.jpg" width="305" height="170" alt="Globe Application Guide" /></a></li>							
				</ul>
				<div id="quickLinks" class="clearfix">
					<div class="viewport">
						<ul class="overview">
				<?php foreach($this->classl->listingarr(1) as $li){ ?>		
				<li>
					<a href="<?php echo $li['url']; ?>" class="driving-fog-lamps"><?php echo $li['title']; ?></a>
									<ul>
				    <?php foreach($this->classl->li(15,$li['id']) as $li1){ ?>		
					<li>
						<a href="<?php $this->classl->xxpage($li1['short']); ?>" class="driving-light-harness"><?php echo $li1['short']; ?></a>
										</li>
					<?php } ?>


				</ul>
								</li>
				<?php } ?>

				
				
				
						</ul>
						
					</div>
					<ul class="pager">
						<li class="left arrow">
							<a href="#" class="buttons prev">Left</a>
						</li>
					        <li class="pagenav">
							<a rel="0" class="pagenum" href="#">1</a>
						</li>
					         <li class="pagenav">
							<a rel="0" class="pagenum" href="#">2</a>
						</li>
					         <li class="pagenav">
							<a rel="0" class="pagenum" href="#">3</a>
						</li>
						 <li class="pagenav">
							<a rel="0" class="pagenum" href="#">4</a>
						</li>
					        <li class="right arrow">
							<a href="#" class="buttons next">right</a>
						</li>
					</ul>
				</div>
			</div>
			<?php $this->load->view('footer'); ?>
		</div>
		
				<script type="text/javascript">
					var session_url = 'usertracker_public=3646p9a7gobao9fphoge9k10d0'
				</script>
				<script type="text/javascript" src="<?php echo base_url(); ?>sb/modules/core/javascript/ajax.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>sb/modules/core/script.js"></script>
				
		
				<script type="text/javascript" src="<?php echo base_url(); ?>sb/modules/lib/jquery-ui/js/jquery-1.6.3.min.js"></script>
				
		<script type="text/javascript" src="<?php echo base_url(); ?>sb/styles/homenew/scripts/jquery.tinycarousel.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>sb/styles/homenew/scripts/site_specific.js"></script>
		<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-412825-18");
pageTracker._setDomainName(".O'better.com.au");
pageTracker._setAllowLinker(true);
pageTracker._trackPageview();
} catch(err) {}</script>
	</body>
</html>