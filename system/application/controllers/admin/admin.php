<?php 
class Admin extends Controller{
	function index($searchtxt='',$offset=0){
		$this->load->helper('url');
		$this->load->database();
		$data['offset']=$offset;
		$data['classa']=6;
		if($this->input->post('searchtxt')!=''){$searchtxt=$this->input->post('searchtxt');}
		if($this->input->post('searchtxt')=='输入关键字...'){$searchtxt='';}
		if($searchtxt=='0'){$searchtxt='';}
		$this->load->library('session');
		$limit = 10;
		if(get_cookie('adminid')==0){
		    $queryaa = $this->db->query("select * from admin where admin_id=0 and user like '%".$searchtxt."%' order by id");
		    $query = $this->db->query("select * from admin where admin_id=0 and user like '%".$searchtxt."%' order by id limit $offset,$limit");
		}else{
			$queryaa = $this->db->query("select * from admin where user like '%".$searchtxt."%' order by id");
			$query = $this->db->query("select * from admin where user like '%".$searchtxt."%' order by id limit $offset,$limit");
		}
		if($searchtxt==''){$searchtxt='0';}
		$data['list']=$query->result_array();
		$data['rows']=$query->num_rows();
		
		$this->load->library('pagination');
		
		$total = $queryaa->num_rows();
		$data['num']=$total;
		$config['first_link']='首页';
		$config['last_link']='末页';
		$config['next_link']='下页';
		$config['prev_link']='上页';
		$config['uri_segment'] = 5;
		$config['base_url'] = base_url().'index.php/admin/message/index/'.$searchtxt.'/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		
		$this->pagination->initialize($config);  
		
		$data['createlinks'] = $this->pagination->create_links();
		
		$data['url'] = base_url().'system/application/views/admin/';
		$this->load->view('admin/admin',$data);	
	}
	function update_admin($id){
		$this->load->helper('url');
	    $query = $this->db->query("select * from admin where id='".$id."'");
		$data['admin']=$query->row();
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=6;
        $this->load->view('admin/admin_edit',$data);
	}
	function update(){
		$this->load->helper('url');
		$this->load->database();
	    $user=$this->input->post('user');
	    if($this->input->post('password')!='')
	    {
	    $passworda=$this->input->post('password');
	    $password=md5($passworda);
	    }
	    $admin_id=$this->input->post('admin_id');
	    $ad_id=$this->input->post('ad_id');
	    $id=$this->input->post('id');
	    $data = array('user' => $user, 'password' => $password, 'admin_id' => $admin_id, 'ad_id' => $ad_id);
	    $this->db->where('id', $id);
        $this->db->update('admin', $data); 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/admin/";</script>
		<?php 

	}
	function remove($id){
		$this->load->helper('url');
		$this->load->database();
		$this->db->where('id', $id);
        $this->db->delete('admin'); 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/admin/";</script>
		<?php 
        
	}
	function add_admin(){
		$this->load->helper('url');
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=6;
        $this->load->view('admin/admin_add',$data);
	}
	function add(){
		$this->load->helper('url');
		$this->load->database();
		$user=$this->input->post('user');
		$ad_id=$this->input->post('ad_id');
	    $passworda=$this->input->post('password');
	    $password=md5($passworda);
	    $admin_id=$this->input->post('admin_id');
	    $sql = "INSERT INTO admin (user, password, admin_id, ad_id) 
        VALUES ('".$user."', '".$password."', '".$admin_id."', '".$ad_id."')";
        $this->db->query($sql);
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/admin/";</script>
		<?php 
        
	}
	function setting(){
			$do=$this->input->post('do');
			$id=$this->input->post('id');
			if($do=='delete')
			{
				foreach($id as $item)
				{  
	                $this->db->where('id', $item);
                    $this->db->delete('admin');
                    
                
			   }
		
		 }
		 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/admin/";</script>
		<?php 
		
	  }
}
?>