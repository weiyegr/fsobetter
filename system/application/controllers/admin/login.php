<?php 
class Login extends controller{
		function index($id=0){
		$this->load->helper('url');
		$data['url'] = base_url().'system/application/views/admin/';
		$data['login']=1;
		$data['id']=$id;
		$data['error_m']='';
		$this->load->view('admin/login',$data);
	}
	function logining(){
		$this->load->library('session');
		$this->load->helper('url');
		if(trim($this->input->post('submit')) != ''){
			
				$passworda=trim($this->input->post('password'));
				$password=md5($passworda);
				$username=$this->input->post('username');
				$query = $this->db->query("select * from admin where user='".trim($username)."' and password='".$password."'");
				if($query->num_rows() != 0){
					$row = $query->row();
					
					if($this->input->post('remember')==1){
					$this->load->helper('cookie');
					set_cookie('username',$username, 2592000); 
					set_cookie('password',$password, 2592000);
					set_cookie('adminid',$row->admin_id, 2592000);
					set_cookie('adid',$row->ad_id, 2592000);
					set_cookie('id',$row->id, 2592000);	
					}else{
					$this->load->helper('cookie');
					set_cookie('username',$username, 0); 
					set_cookie('password',$password, 0);
					set_cookie('adminid',$row->admin_id, 0);
					set_cookie('adid',$row->ad_id, 0);
					set_cookie('id',$row->id, 0);
                    
					}
					?>
		            <script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/home";</script>
		            <?php
					
			}else{
				$this->load->helper('url');
				?>
		        <script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/login/index/1";</script>
		        <?php
		        
			}
		}
	}
}
?>