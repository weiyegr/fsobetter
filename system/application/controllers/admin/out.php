<?php 
class Out extends Controller{
	function index(){
		$this->load->helper('url');
		$this->load->library('session');
		delete_cookie('username');
		delete_cookie('password');
		delete_cookie('adminid');
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/login";</script>
		<?php
		
	}
}
?>
