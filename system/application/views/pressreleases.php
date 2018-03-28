<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Press Releases - O'better</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta http-equiv="imagetoolbar" content="no" />
		<meta name="description" content="" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>sb/styles/pressreleases/css/layout.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>sb/styles/pressreleases/css/print.css" type="text/css" media="print" />
		<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>sb/styles/pressreleases/css/ie-layout.css" />
		<![endif]-->	
		<script type="text/javascript" src="<?php echo base_url(); ?>sb/styles/pressreleases/script/jquery.js"></script>
		
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
				<h1><a href="http://www.O'better.com.au" title="O'better"><img src="<?php echo base_url(); ?>sb/styles/pressreleases/images/obetter-logo.png" alt="O'better" /></a></h1>
				
				<?php $this->load->view('header'); ?>
			</div>
			<div id="content" class="clearfix">
				
				<div id="content_block" class="clearfix pressreleases">
					
					<table width="890" border="0" cellspacing="0" cellpadding="0">
						<tr height="27">
							<td align="left" valign="top" width="40" height="27"></td>
							<td align="left" valign="top" width="821" height="27"></td>
							<td align="left" valign="top" width="29" height="27"></td>
						</tr>
						<tr height="30">
							<td align="left" valign="top" width="40" height="30"></td>
							<td align="left" valign="top" width="821" height="30"><span class="headclass">新闻稿</span></td>
							<td align="left" valign="top" width="29" height="30"></td>
						</tr>
						
						<tr height="1">
							<td align="left" valign="top" width="40" height="1"></td>
							<td align="left" valign="top" bgcolor="#1c3f94" width="821" height="1"></td>
							<td align="left" valign="top" width="29" height="1"></td>
						</tr>
						<tr height="12">
							<td align="left" valign="top" width="40" height="12"></td>
							<td align="left" valign="top" width="821" height="12"></td>
							<td align="left" valign="top" width="29" height="12"></td>
						</tr>
						<tr>
							<td align="left" valign="top" width="40"></td>
							<td align="left" valign="top" width="821">
										<form id="my_form" action="/pressreleases" method="post">

			<table border="0" cellpadding="0" cellspacing="0" width="100%" class="knowledge_list_table">
			<?php foreach($posts as $li){ ?>
			<tr><td align="left" valign="top"><img src="<?php echo base_url(); ?>uploads/150.0.<?php echo $li['image']; ?>" width="159" height="103" /></td>
<td align="left" width="52"></td>
<td width="606" valign="top"><span class="subheadclass"><?php echo $li['addtime']; ?></span><p><span class="subheadclass"><a href="<?php $this->classl->xxpage($li['short']); ?>"><?php echo $li['title']; ?></a></span><br /><span class="txt2class"><p><?php echo $li['jianjie']; ?></p>
<a href="<?php $this->classl->xxpage($li['short']); ?>">read</a></span></p></td></tr>
<tr height="29">
	<td align="left" valign="top" width="160" height="29"></td>
	<td align="left" valign="top" width="52" height="29"></td>
	<td align="left" valign="top" width="606" height="29"></td>
</tr>
<?php } ?>
</table>		</form>
		<form name="page_form" action="/pressreleases" method="get"><input type="hidden" name="totalrecs" value="119" />
<input type="hidden" name="pageno" value="1" />
<div class = "page_numbers_box" align = "center"><?php echo $links; ?></div></form>
							</td>
						</tr>
					</table>
					
					
					
					
				</div>
				
			</div>
			<?php $this->load->view('footer'); ?>
		</div>		
	</body>
</html>