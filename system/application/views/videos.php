<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Videos - O'better</title>
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
	</head>
	<body>
		<div id="container">
			<div id="header">
				<h1><a href="<?php echo base_url(); ?>" title="O'better"><img src="<?php echo base_url(); ?>sb/styles/standard/images/obetter-logo.png" alt="O'better" /></a></h1>
				
				<?php $this->load->view('header'); ?>
			</div>
			<div id="content" class="clearfix">
				
				
				
				
				<div class="recordDetail">
	
		<h1>视频</h1>
		
		
		<style type="text/css">
.videosTable td
{
padding: 20px;
}</style>
<table border="0" cellpadding="1" cellspacing="20" class="videosTable" style="width: 100%; text-align: center;">
	<tbody>
	    <?php foreach($posts as $li){ ?>
		<tr>
			<td>
				<embed src="<?php echo $li['videoad']; ?>" type="application/x-shockwave-flash" width="560" height="315" quality="high" /><br /></td>
		</tr>
		<?php } ?>
		
	</tbody>
</table>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
	
</div>
				
				
				
				
				
				


				
	
				
				
				
			</div>
			<?php $this->load->view('footer'); ?>
		</div>		
		
	</body>
</html>