<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Compac L.E.D - Products - O'better</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>sb/styles/standard/css/layout.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>sb/styles/standard/css/print.css" type="text/css" media="print" />
		<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>sb/styles/standard/css/ie-layout.css" />
		<![endif]-->	
		<script type="text/javascript" src="<?php echo base_url(); ?>sb/styles/standard/script/jquery.js"></script>
		
				<script type="text/javascript">
					var session_url = 'usertracker_public=3646p9a7gobao9fphoge9k10d0'
				</script>
				<script type="text/javascript" src="<?php echo base_url(); ?>sb/modules/core/javascript/ajax.js"></script>
				<script type="text/javascript" src="<?php echo base_url(); ?>sb/modules/core/script.js"></script>
				

	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1><a href="<?php echo base_url(); ?>" title="O'better"><img src="<?php echo base_url(); ?>sb/styles/standard/images/obetter-logo.png" alt="O'better" /></a></h1>
				
				<?php $this->load->view('header'); ?>
			</div>
			<div id="content" class="clearfix">
				
				
				
				
				<div class="category_parent"><div class="parent_menu">
<ul id="sub_nav">
    <?php foreach($this->classl->listingarr(1) as $li){ ?>
	<li class="off" id="driving-light-harness"><a href="<?php echo $li['url']; ?>"><?php echo $li['title']; ?></a></li>
	<?php } ?>
</li>

</ul>
</div><img src="<?php echo base_url(); ?>sitebuilder/banner13/bannerimages/10/plus_100_homepage_v2.jpg" width="900" height="282" alt="Compac L.E.D" /></div>

<?php foreach($posts as $li){ ?>
<div class="product_list driving-fog-lamps">
<div class="product_list_image"><img src="<?php echo base_url(); ?>uploads/140.140.<?php echo $li['image']; ?>" alt="" /></div>
<div class="product_list_link"><a href="<?php $this->classl->xxpage($li['short']); ?>">More Info</a></div>
<div class="product_list_content">Part No./Description<h2><?php echo $li['title']; ?></h2>
<h3><?php echo $li['shuoming']; ?></h3>
<div class="product_list_short"><strong>71821</strong></div>
</div>
</div>
<?php } ?>
				
			</div>
			<?php $this->load->view('footer'); ?>
		</div>		
		
	</body>
</html>