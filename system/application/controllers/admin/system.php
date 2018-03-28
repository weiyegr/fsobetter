<?php
class System extends Controller{
	function index(){
		header("content-Type: text/html; charset=Utf-8"); 
		$this->load->helper('url');
		$data['classa']=7;
		// $query = $this->db->query("select * from base_set where id=1");
		// $row=$query->row();
		$querya = $this->db->query("select * from changgui where id=1");
		$data['xs']=$querya->row();
        
		$result=$this->db->query("select * from headlink where parentid='0'");
        $data['slist'] = $result->result_array();
        
        $result=$this->db->query("select * from type");
        $data['tlist'] = $result->result_array();
        
        $result=$this->db->query("select * from language");
        $data['langu'] = $result->result_array();
		
		$data['url'] = base_url().'system/application/views/admin/';
		$this->load->view('admin/system',$data);
	}
	function system_pro(){


			$message=$this->input->post('message');
			$pmessage=$this->input->post('pmessage');
			$link=$this->input->post('link');
			$language=$this->input->post('language');
            $focus=$this->input->post('focus');
            $member=$this->input->post('member');
            $order=$this->input->post('order');
			$setting=$this->input->post('setting');
			$rewrite=$this->input->post('rewrite');
			$email=$this->input->post('email');
			$tongji=$this->input->post('tongji');
			$data = array('baseor' => $setting, 'messageor' => $message, 'linkor' => $link,'rewrite'=>$rewrite,'focusor'=>$focus,'orderor'=>$order,'memberor'=>$member, 'pmessageor' => $pmessage, 'emailor' => $email, 'tongji' => $tongji);
			$this->db->where('id',1);
            $this->db->update('changgui', $data); 

            $this->db->where('qqqw', 0);
		    $this->db->delete('headlink');
		    
		    
		        $systeml=$this->input->post('systeml');
        
                foreach($systeml as $li){
		
		        $data = array(
                   'link_title' => $li['title'],
                   'link_url' => $li['address'],
                   'link_id' => $li['title_id'],
			       'link_class' => $li['titleclass'],
		           'link_type' => $li['titletype'],
		           'parentid' => $li['parentid'],
		           'item_id' => $li['titleid'],
		           'ontype' => $li['ontype'],
		           'qqqw' => 0
                );

            $this->db->insert('headlink', $data); 
        	
                }
                
		    $this->db->where('pd', 0);
		    $this->db->delete('language');
		    
	foreach($language as $li){
		
		        $data = array(
                   'language' => $li['title'],
                   'keyword' => $li['shot'],
                   
		           'pd' => 0
                );

            $this->db->insert('language', $data); 
        	
                }

            ?>
		    <script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/system/";</script>
		    <?php
            
		}

}
?>