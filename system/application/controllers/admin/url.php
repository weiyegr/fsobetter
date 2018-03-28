<?php 
class Url extends Controller{
	function index($searchtxt='',$offset=0){
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->database();
		if($this->input->post('searchtxt')!=''){$searchtxt=$this->input->post('searchtxt');}
		if($this->input->post('searchtxt')=='输入关键字...'){$searchtxt='';}
		if($searchtxt=='0'){$searchtxt='';}
		$data['offset']=$offset;
		$data['classa']=4;
		$limit = 10;
		$data['url'] = base_url().'system/application/views/admin/';
		$queryaa = $this->db->query("select * from link where title like '%".$searchtxt."%' order by num");
		$query = $this->db->query("select * from link where title like '%".$searchtxt."%' order by num limit $offset,$limit");
		if($searchtxt==''){$searchtxt='0';}
		$data['rows']=$query->num_rows();
		$data['list']=$query->result_array();
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
		
		$this->load->view('admin/link',$data);
		
	}
	function update_url($id){
	    $query = $this->db->query("select * from link where id='".$id."'");
		$data['link']=$query->row();
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=4;
        $this->load->view('admin/link_edit',$data);
	}
	function update(){
	    $insertb=array();
		$title=$this->input->post('title');
		if($title!=''){
		    $insertb['title']=$title;
		}
	    $url=$this->input->post('url');
		if($url!=''){
		    $insertb['url']=$url;
		}
	    $num=$this->input->post('num');
		if($num!=''){
		    $insertb['num']=$num;
		}
	    $file=$_FILES['image'];
        $image=$this->classl->doupload($file);
		if($image!=''){
		    $insertb['image']=$image;
		}
	    $id=$this->input->post('id');
	   
		
	    $data = $insertb;
	    $this->db->where('id', $id);
        $this->db->update('link', $data); 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/url";</script>
		<?php
        
	}
	function add_url(){
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=4;
        $this->load->view("admin/link_add",$data);
	}
	function add(){
		$title=$this->input->post('title');
	    $url=$this->input->post('url');
	    $num=$this->input->post('num');
	    $file=$_FILES['image'];
        $image=$this->classl->doupload($file);
              	
	    $sql = "INSERT INTO link (title,url,num,image) 
        VALUES ('".$title."', '".$url."', '".$num."', '".$image."')";
        $this->db->query($sql);
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/url";</script>
		<?php
        
	}
	
	function remove($id){
	    $query = $this->db->query("select * from link where id='".$id."'");
		$link=$query->row();
		unlink('uploads/'.$row->image);
		$this->db->where('id', $id);
        $this->db->delete('link'); 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/url";</script>
		<?php
        
	}
	
	function setting(){
			$do=$this->input->post('do');
			$id=$this->input->post('id');
			if($do=='delete')
			{
				foreach($id as $item)
				{  
				    $query = $this->db->query("select * from link where id='".$item."'");
					$link=$query->row();
					unlink('uploads/'.$row->image);
	                $this->db->where('id', $item);
                    $this->db->delete('link');
                    
                
			   }
		
            }
		 
		 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/url";</script>
		<?php
	  }
	
}
?>