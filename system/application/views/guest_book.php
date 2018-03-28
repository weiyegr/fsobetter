<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Subscribe - O'better</title>
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
				
				
				
				
					<script type="text/javascript">
		function signup_error_check() {
			if (validate(document.my_form)) {
				var username = '';
				var check_username = 0;
				var password = '';
				var password1 = '';
				var check_password = 0;

				var first_name = '';
				var last_name = '';
				var email = '';
				var check_duplicate = 0;
				var check_email = 0;

				var user_id = '';

				var good_email = document.my_form.c_Email1.value.match(/\b(^(\S+@).+((\.com)|(\.net)|(\.edu)|(\.mil)|(\.gov)|(\.org)|(\..{2,2}))$)\b/gi);

				if (document.my_form.c_Username) {
					username = document.my_form.c_Username.value;
					check_username = 1;
				}

				if ((document.my_form.c_Password) && (document.my_form.c_Password1)) {
					password = document.my_form.c_Password.value;
					password1 = document.my_form.c_Password1.value;
					check_password = 1;
				}

				if ((document.my_form.c_FirstName) && (document.my_form.c_LastName) && (document.my_form.c_Email1)) {
					first_name = document.my_form.c_FirstName.value;
					last_name = document.my_form.c_LastName.value;
					email = document.my_form.c_Email1.value;
					check_duplicate = 1;
				}

				if (document.my_form.c_Serial) {
					user_id = document.my_form.c_Serial.value;
				}

				if (!good_email) {
				}

				
			}

			return false;
		}
	</script>
		<p class="message"><span style="font-size:13px;">注册接收电子邮件和邮寄的所有最新的产品，新闻稿及季节性O'better新闻信息。<br />
<br />
<i>提供您的电子邮件地址，表示您同意接收信息从O'better通过电子邮件</i>.&nbsp;</span></p>
	<form method="post" action="<?php echo base_url(); ?>index.php/guest_book/add" enctype="multipart/form-data" name="my_form" id="signup_form">
	<input type="hidden" name="addtime" value="<?php echo date("Y-m-d H:i:s"); ?>"/>
    <input type="hidden" name="surl" value="<?php echo base_url(); ?>"/>
		<fieldset>
			<legend>会员注册</legend>
			<input type="hidden" name="membership_id" value=""/>
			<input type="hidden" name="type_id" value=""/>
			<ol>
									<li class="clearfix" id="li_c_FirstName">
						<label for="c_FirstName" class="formFieldLabel required">* 名字</label>
					<input id="c_FirstName" type="text" class="input_large_off" onfocus="this.className='input_large_on';" onblur="this.className='input_large_off';" name="c_FirstName" value="" autocomplete='off' title="First Name"  />
		</li>
							<li class="clearfix" id="li_c_LastName">
						<label for="c_LastName" class="formFieldLabel required">* 姓</label>
					<input id="c_LastName" type="text" class="input_large_off" onfocus="this.className='input_large_on';" onblur="this.className='input_large_off';" name="c_LastName" value="" autocomplete='off' title="Surname"  />
		</li>
							<li class="clearfix" id="li_c_Email1">
						<label for="title" class="formFieldLabel required">* 电子邮件</label>
					<input id="title" type="text" class="input_large_off" onfocus="this.className='input_large_on';" onblur="this.className='input_large_off';" name="title" value="" autocomplete='off' title="Email Address|email"  onchange="if (document.getElementById('c_Username'))
					{
						document.getElementById('c_Username').value=this.value;
					}"/>
		</li>
							<li class="clearfix" id="li_c_Company">
						<label for="c_Company" class="formFieldLabel">组织</label>
					<input id="c_Company" type="text" class="input_large_off" onfocus="this.className='input_large_on';" onblur="this.className='input_large_off';" name="c_Company" value="" autocomplete='off' title=""  />
<input type="hidden" size="40" class="box2" name="last_company" value=""  />		</li>
							<li class="clearfix" id="li_c_State">
						<label for="c_State" class="formFieldLabel required">* 地址</label>
					<fieldset class="state"><ul><li><div id="c_StateField"><input id="c_State" name="c_State" class="select_large_off" title="State"  /></div></li></ul></fieldset>		</li>
							<li class="clearfix" id="li_c_SpareCheckbox2">
						<label for="c_SpareCheckbox2" class="formFieldLabel required">* 类别</label>
					<input type="hidden" name="c_SpareCheckbox2" value="" />
			<fieldset>
								<span><input type="checkbox" name="c_SpareCheckbox2[]" value="4WD Specialist" title="Industry"  />LED</span>
											<span><input type="checkbox" name="c_SpareCheckbox2[]" value="Auto Electrician" title="Industry"  />摩托灯泡</span>
										<span><input type="checkbox" name="c_SpareCheckbox2[]" value="Car Dealer" title="Industry"  />汽车灯泡</span>
											
								</fieldset><br />
								<li class="clearfix" id="li_c_SpareCheckbox9">
						<label for="c_SpareCheckbox9" class="formFieldLabel required">* 请给我发下列出版物</label>
					<input type="hidden" name="c_SpareCheckbox9" value="" />
			<fieldset>
								<span><input type="checkbox" name="c_SpareCheckbox9[]" value="O'better News" title="Please send me the following publications"  />O'better 新闻</span>
											<span><input type="checkbox" name="c_SpareCheckbox9[]" value="New Products" title="Please send me the following publications"  />新产品</span>
										<span><input type="checkbox" name="c_SpareCheckbox9[]" value="Press Releases" title="Please send me the following publications"  />新闻稿</span>
								</fieldset><br />
								
								</ol>
			<button type="submit" class="signup_button">提交</button>
		</fieldset>

	</form>
	
				
				
				
				
				
				


				
	
				
				
				
			</div>
			<?php $this->load->view('footer'); ?>
		</div>		
		
	</body>
</html>