<?php 
class Message extends Controller{
	function index($searchtxt='',$offset=0){
		$this->load->helper('url');
		if($this->input->post('searchtxt')!=''){$searchtxt=$this->input->post('searchtxt');}
		if($this->input->post('searchtxt')=='输入关键字...'){$searchtxt='';}
		if($searchtxt=='0'){$searchtxt='';}
		$data['offset']=$offset;
		$data['classa']=3;
		$limit = 10;
		$data['url'] = base_url().'system/application/views/admin/';
		$queryaa=$this->db->query("select * from message where title like '%".$searchtxt."%' order by id desc");
		$query=$this->db->query("select * from message where title like '%".$searchtxt."%' order by id desc limit $offset,$limit");
		if($searchtxt==''){$searchtxt='0';}
		$data['rows']=$query->num_rows();
		$data['message']=$query->result_array();
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
		
		$this->load->view('admin/message',$data);
	}
	
	function field_view(){

        $data['classa']=3;
		
		$query = $this->db->query("select * from message_meta");
		$data['message_meta']=$query->result_array();	
		
		$data['url']=base_url().'system/application/views/admin/';
		$this->load->view('admin/message_field',$data);
	}
	
	function field_update(){

        $data['classa']=3;
		
		$query = $this->db->query("select * from message_meta");
		$data['message_meta']=$query->result_array();	
		
		$data['url']=base_url().'system/application/views/admin/';
		$this->load->view('admin/message_field',$data);
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
	    $sql = "INSERT INTO message_meta (`title`,`fetch`,`type`,`width`,`height`) 
        VALUES ('".$title."','".$fetch."','".$type."','".$width."','".$height."')";
        $this->db->query($sql);
		
		    $query = $this->db->query("select * from message");
		    $field=$query->list_fields();
			if(!in_array($fetch,$field)){
			    $query = $this->db->query("alter table message add $fetch text default NULL;");	
			}
		}
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/message/field_update";</script>';
		
	}
	
	function del_meta($id=''){
	    if($id==''){echo '无效地址！';exit();}
		$query = $this->db->query("select * from message_meta where id='".$id."'");
		$message_meta=$query->row();
		$fetch=$message_meta->fetch;
		if($message_meta->type==2 or $message_meta->type==3){
			$query = $this->db->query("select * from message");
			$type=$query->result_array();
			foreach($type as $li){
			    unlink('uploads/'.$li[$fetch]);
			}
		}
		
	    $this->db->where('id', $id);
        $this->db->delete('message_meta');
		
			$query = $this->db->query("select * from message_meta where fetch='".$fetch);
		    $field=$query->num_rows();
			if($field == 1){
			    $query = $this->db->query("alter message type drop column $fetch");
			}
		
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/message/field_update";</script>';
		
	}
	
	function add_message(){
		//$id->parentid
		
		$data['classa']=3;
		$query = $this->db->query("select * from message_meta");
		$data['message_meta']=$query->result_array();
		$data['url'] = base_url().'system/application/views/admin/';
		$this->load->view('admin/message_add',$data);
	}
	
	function add(){
		header("Content-Type:text/html;charset=utf-8"); 
		$inserta=array();
		$insertb=array();
		
		$title=$this->input->post('title');
		if($title!=''){
		    $insertb[]=$title;
			$inserta[]='title';
		}

		$addtime=$this->input->post('addtime');
		if($addtime!=''){
		    $insertb[]=$addtime;
			$inserta[]='addtime';
		}
		
		
		
		//自定义字段处理
		    $query = $this->db->query("select * from message_meta");
			$message_meta=$query->result_array();
			
			foreach($message_meta as $li){
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
			$sql = "INSERT INTO message ($inserta1) 
        VALUES ('$insertb1')";
        $this->db->query($sql);
		
	    echo '<script language="javascript">location.href="'.base_url().'index.php/admin/message";</script>'; 
		
        
		
	}

	
	function update_message($id){
	
	    if($id==''){echo '无效地址！';exit();}
		
		$data = array('isread' => '1');
		$this->db->where('id',$id);
        $this->db->update('message', $data);
		$data['classa']=3;
		$query = $this->db->query("select * from message where id='".$id."'");
		$message=$query->row();
		$data['message']=$message;
		
		$query = $this->db->query("select * from message_meta");
		$data['message_meta']=$query->result_array();
		$data['id']=$id;
		$data['url'] = base_url().'system/application/views/admin/';
        $this->load->view('admin/message_edit',$data);
	}
	
	function update(){

	    header("Content-Type:text/html;charset=utf-8"); 
		//$inserta=array();
		$insertb=array();
		$id=$this->input->post('id');

		$title=$this->input->post('title');
		if($title!=''){
		    $insertb['title']=$title;
			//$inserta[]='title';
		}
		
		
		//自定义字段处理
		
		
			$query = $this->db->query("select * from message where id='".$id."'");
		    $row=$query->row();
			$query = $this->db->query("select * from message_meta");
			$message_meta=$query->result_array();
			
			foreach($message_meta as $li){
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
	    $this->db->where('id', $id);
        $this->db->update('message', $data);
	
        echo '<script language="javascript">location.href="'.base_url().'index.php/admin/message/update_message/'.$id.'";</script>'; 
      
        
	}
	
	function remove($id){
	    $query = $this->db->query("select * from message where id='".$id."'");
		$row=$query->row();
	    $query = $this->db->query("select * from message_meta");
		$message_meta=$query->result_array();
					
		foreach($message_meta as $li){
			if($li['type']==2 or $li['type']==3){
				unlink('uploads/'.$row->$li['fetch']);
			}
		}
		$this->db->where('id', $id);
        $this->db->delete('message'); 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/message/";</script>
		<?php
        
	}
	function setting(){
			$do=$this->input->post('do');
			$id=$this->input->post('id');
			if($do=='delete')
			{
				foreach($id as $item)
				{  
				    $query = $this->db->query("select * from message where id='".$item."'");
					$row=$query->row();
					$query = $this->db->query("select * from message_meta");
					$message_meta=$query->result_array();
								
					foreach($message_meta as $li){
						if($li['type']==2 or $li['type']==3){
							unlink('uploads/'.$row->$li['fetch']);
						}
					}
	                $this->db->where('id', $item);
                    $this->db->delete('message');
                    
                
			   }
		
		    }
		 
		 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/message/";</script>
		<?php
	}
}
?>