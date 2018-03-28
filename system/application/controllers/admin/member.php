<?php
class Member extends Controller{
    function index($searchtxt='',$offset=0){
	    $data['offset']=$offset;
		$data['classa']=8;
		if($this->input->post('searchtxt')!=''){$searchtxt=$this->input->post('searchtxt');}
		if($this->input->post('searchtxt')=='输入关键字...'){$searchtxt='';}
		if($searchtxt=='0'){$searchtxt='';}
		$limit = 10;

			$queryaa = $this->db->query("select * from member where username like '%".$searchtxt."%' order by uid desc");
			$query = $this->db->query("select * from member where username like '%".$searchtxt."%' order by uid desc limit $offset,$limit");
        if($searchtxt==''){$searchtxt='0';}
		$list=$query->result_array();
		$data['rows']=$query->num_rows();

		$this->load->library('pagination');

		$total = $queryaa->num_rows();
		$data['num']=$total;
		$config['first_link']='首页';
		$config['last_link']='末页';
		$config['next_link']='下页';
		$config['prev_link']='上页';
		$config['uri_segment'] = 5;
		$config['base_url'] = base_url().'index.php/admin/member/index/'.$searchtxt.'/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;


		$this->pagination->initialize($config);

		$data['createlinks'] = $this->pagination->create_links();
		
		
		
		$data['list']=$list;

		
		

		$data['url'] = base_url().'system/application/views/admin/';
		$this->load->view('admin/member',$data);
	}

	
	
	function field_update(){

        $data['classa']=8;
		
		$query = $this->db->query("select * from member_meta");
		$data['member_meta']=$query->result_array();	
		
		$data['url']=base_url().'system/application/views/admin/';
		$this->load->view('admin/member_field',$data);
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
	    $sql = "INSERT INTO member_meta (`title`,`fetch`,`type`,`width`,`height`) 
        VALUES ('".$title."','".$fetch."','".$type."','".$width."','".$height."')";
        $this->db->query($sql);
		
		    $query = $this->db->query("select * from member");
		    $field=$query->list_fields();
			if(!in_array($fetch,$field)){
			    $query = $this->db->query("alter table member add $fetch text default NULL;");	
			}
		}
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/member/field_update";</script>';
		
	}
	
	function del_meta($id=''){
	    if($id==''){echo '无效地址！';exit();}
		$query = $this->db->query("select * from member_meta where id='".$id."'");
		$member_meta=$query->row();
		$fetch=$member_meta->fetch;
		if($message_meta->type==2 or $member_meta->type==3){
			$query = $this->db->query("select * from member");
			$type=$query->result_array();
			foreach($type as $li){
			    unlink('uploads/'.$li[$fetch]);
			}
		}
		
	    $this->db->where('id', $id);
        $this->db->delete('member_meta');
		
		
		    $query = $this->db->query("select * from member_meta where fetch='".$fetch);
		    $field=$query->num_rows();
			if($field == 1){
			    $query = $this->db->query("alter table member drop column $fetch");
			}
		
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/member/field_update";</script>';
		
	}
	
	

	function add_view(){
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=8;

		$query = $this->db->query("select * from member_meta");
		$data['member_meta']=$query->result_array();

        $this->load->view('admin/member_add',$data);
	}

	function add(){

		
	    header("Content-Type:text/html;charset=utf-8"); 
		$inserta=array();
		$insertb=array();
		$username=$this->input->post('username');	
		if($username!=''){
		    $insertb[]=$username;
			$inserta[]='username';
		}
	    $password=$this->input->post('password');
		if($password!=''){
		    $insertb[]=$password;
			$inserta[]='password';
		}
		
		
		
		
		//自定义字段处理
		    $query = $this->db->query("select * from member_meta");
			$member_meta=$query->result_array();
			
			foreach($member_meta as $li){
			    if($li['type']==2 or $li['type']==3){
				    $file=$_FILES[$li['fetch']];
                    $$li['fetch']=$this->classl->doupload($file);
					if($$li['fetch']!=''){
						$insertb[]=$$li['fetch'];
						$inserta[]=$li['fetch'];
					}
				}else{
					$$li['fetch']=$this->input->post($li['fetch']);
					if($$li['fetch']!=''){
						$insertb[]=$$li['fetch'];
						$inserta[]=$li['fetch'];
					}
				}
			}
		
		
		    $inserta1=implode(',',$inserta);
			$insertb1=implode('\',\'',$insertb);
			$sql = "INSERT INTO member ($inserta1) 
        VALUES ('$insertb1')";
        $this->db->query($sql);

		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/member/";</script>
		<?php
	}

	function edit_view($id){
	    if($id==''){echo '无效地址！';exit();}
		$data['classa']=8;
		$query = $this->db->query("select * from member where uid='".$id."'");
		$member=$query->row();
		$data['member']=$member;
		
		$query = $this->db->query("select * from member_meta");
		$data['member_meta']=$query->result_array();
		$data['id']=$id;
		$data['url'] = base_url().'system/application/views/admin/';
        $this->load->view('admin/member_edit',$data);
	}

	function edit(){
	    header("Content-Type:text/html;charset=utf-8"); 
		//$inserta=array();
		$insertb=array();
		$uid=$this->input->post('uid');
		$id=$uid;

		$username=$this->input->post('username');
		if($username!=''){
		    $insertb['username']=$username;
			//$inserta[]='title';
		}
		$password=$this->input->post('password');
		if($password!=''){
		    $insertb['password']=$password;
			//$inserta[]='title';
		}
		
		
		//自定义字段处理
		
		
			$query = $this->db->query("select * from member where uid='".$id."'");
		    $row=$query->row();
			$query = $this->db->query("select * from member_meta");
			$member_meta=$query->result_array();
			
			foreach($member_meta as $li){
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
						$insertb[$li['fetch']]=htmlspecialchars($$li['fetch']);
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
	    $this->db->where('uid', $id);
        $this->db->update('member', $data);

		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/member/edit_view/'.$id.'";</script>';

	}


	function remove($id){
		$this->db->where('uid', $id);
        $this->db->delete('member');
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/member/";</script>
		<?php
	}

	function setting(){
			$do=$this->input->post('do');
			$id=$this->input->post('id');
			if($do=='delete')
			{
				foreach($id as $item)
				{  
	                $this->db->where('uid', $item);
                    $this->db->delete('member');
                    
                
			    }
		
	 	    }
        ?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/member";</script>
		<?php
   }


}
?>