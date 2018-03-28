<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Products - O'better</title>
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
					var session_url = 'usertracker_public=vlsh8q9lj59a687u1e6ovmo7l2'
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
				
				<div class="searchContent">
				<h2></h2>
				
				
				
						<div class="search_form clearfix">
			<form name="search" action="<?php echo base_url(); ?>index.php/category/search/products" method="post">
				<fieldset>
					<legend>请输入搜索关键词.</legend>
					<label>关键词: </label><input type="text" name="searchtxt" class="mainsearch" />
					<button type="submit" name="runSearch">搜索</button>
				</fieldset>
			</form>
		</div>
						<p class="search_returned">返回 2 记录:</p>
				<ul class="search_list">
				            <?php foreach($posts as $li){ ?>
												<li>
								<a href="<?php $this->classl->xxpage($li['short']); ?>"><?php echo $li['title']; ?></a>
							</li>
							<?php } ?>
								
											</ul>
			
				
				
				</div>
				
				
				


				
	
				
				
				
			</div>
			<?php $this->load->view('footer'); ?>
		</div>		
		
	</body>
</html>