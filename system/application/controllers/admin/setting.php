<?php
class Setting extends Controller{
	function index(){
		$data['classa']=5;
		$query = $this->db->query("select * from setting_meta");
		$data['setting_meta']=$query->result_array();
		$querya = $this->db->query("select * from setting where id=1");
		$data['setting']=$querya->row();
		$data['url'] = base_url().'system/application/views/admin/';
		$querya = $this->db->query("select * from changgui where id=1");
		$data['xs']=$querya->row();
		$this->load->view('admin/setting',$data);
	}
	
	function field_update(){

        $data['classa']=5;
		
		$query = $this->db->query("select * from setting_meta");
		$data['setting_meta']=$query->result_array();	
		
		$data['url']=base_url().'system/application/views/admin/';
		$this->load->view('admin/setting_field',$data);
	}
	
	function add_meta(){
	   
		$title=$this->input->post('title');
		$fetch=$this->input->post('fetch');
		$type=$this->input->post('type');
		$width=$this->input->post('width');
		$height=$this->input->post('height');
		if($width==''){$width=0;}
		if($height==''){$height=0;}
		
		echo "$title!='' and $fetch!='' and $type!=''";
	    if($title!='' and $fetch!='' and $type!=''){
	    $sql = "INSERT INTO setting_meta (`title`,`fetch`,`type`,`width`,`height`) 
        VALUES ('".$title."','".$fetch."','".$type."','".$width."','".$height."')";
        $this->db->query($sql);
		
		    $query = $this->db->query("select * from setting");
		    $field=$query->list_fields();
			if(!in_array($fetch,$field)){
			    $query = $this->db->query("alter table setting add $fetch text default NULL;");	
			}
		}
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/setting/field_update";</script>';
		
	}
	
	function del_meta($id=''){
	    if($id==''){echo 'ÎÞÐ§µØÖ·£¡';exit();}
		$query = $this->db->query("select * from setting_meta where id='".$id."'");
		$setting_meta=$query->row();
		$fetch=$setting_meta->fetch;
		if($setting_meta->type==2 or $setting_meta->type==3){
			$query = $this->db->query("select * from setting");
			$type=$query->result_array();
			foreach($type as $li){
			    unlink('uploads/'.$li[$fetch]);
			}
		}
		
	    $this->db->where('id', $id);
        $this->db->delete('setting_meta');
		
		    $query = $this->db->query("select * from setting_meta where fetch='".$fetch);
		    $field=$query->num_rows();
			if($field == 1){
			    $query = $this->db->query("alter message setting drop column $fetch");
			}
		
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/setting/field_update";</script>';
		
	}
	
	function settingpro(){

		$userid=$this->input->post('userid');
		$userpassword=$this->input->post('userpassword');
		$pnumber=$this->input->post('pnumber');
		$email=$this->input->post('email');
		$hmail=$this->input->post('hmail');
		$host=$this->input->post('host');
		$user=$this->input->post('user');
		$pass=$this->input->post('pass');
		$weititle=$this->input->post('weititle');
		$keywords=$this->input->post('keywords');
		$description=$this->input->post('description');
		$data = array('userid' => $userid, 'userpassword' => $userpassword, 'pnumber' => $pnumber, 'email' => $email, 'hmail' => $hmail, 'host' => $host, 'user' => $user, 'pass' => $pass, 'weititle' => $weititle, 'keywords' => $keywords, 'description' => $description);
		$this->db->where('id',1);
        $this->db->update('changgui', $data); 
		
		$insertb=array();
		    $query = $this->db->query("select * from setting where id='1'");
		    $row=$query->row();
		    $query = $this->db->query("select * from setting_meta");
			$setting_meta=$query->result_array();
			
			foreach($setting_meta as $li){
			    if($li['type']==2 or $li['type']==3){
				    $file=$_FILES[$li['fetch']];
                    $$li['fetch']=$this->classl->doupload($file);
					if($$li['fetch']!=''){
					    unlink('uploads/'.($row->$li['fetch']));
						$insertb[$li['fetch']]=$$li['fetch'];
						//$inserta[]=$li['fetch'];
					}
				}else if($li['type']==4){
				    $$li['fetch']=$this->input->post($li['fetch']);
					if($$li['fetch']!=''){
						$insertb[$li['fetch']]=$$li['fetch'];
						//$inserta[]=$li['fetch'];
					}
				
				}else{
					$$li['fetch']=$this->input->post($li['fetch']);
					if($$li['fetch']!=''){
						$insertb[$li['fetch']]=$$li['fetch'];
						//$inserta[]=$li['fetch'];
					}
				}
			}
			
			$data = $insertb;
			if(count($data)!=0){
			$this->db->where('id', '1');
			$this->db->update('setting', $data);
			}
			 
			echo '<script language="javascript">location.href="'.base_url().'index.php/admin/setting";</script>';
            
		
	}
}
?>