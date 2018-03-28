<?php
class Focus extends Controller{
    
	function index(){

        $data['classa']=10;
		
		$query = $this->db->query("select * from focus_list order by num");
		$data['memberfield']=$query->result_array();
        $query = $this->db->query("select * from focus where id = '1'");
		$post=$query->row();
        $data['idname']=$post->idname;
        $data['pattern']=$post->pattern;
        $data['time']=$post->time;
        $data['trigger']=$post->trigger;
        $data['width']=$post->width;
        $data['height']=$post->height;
        
		$data['url']=base_url().'system/application/views/admin/';
		$this->load->view('admin/focus',$data);
	}
	
	function add(){
        
        $title=$this->input->post('title');
        $describe=$this->input->post('describe');
        $link=$this->input->post('link');
        
	    $query = $this->db->query("select * from focus_list order by num desc");
		if($query->num_rows() != 0){
			$post=$query->row();
			$numa=$post->num;
			$num=$numa+1;
		}else{
		    $num=0;
		}
        
        
        // 上传图片开始
              $this->load->library('upload');
              $userfile_data = $_FILES['userfile'];
              $a= $this->upload->do_upload_ex("userfile",$userfile_data,true,"/photo/","/photo/",false);
              $image=$a[0];
        

		
		
		$sql = "INSERT INTO focus_list (`title`,`describe`,`link`,`image`,`num`)
		VALUES ('".$title."','".$describe."', '".$link."', '".$image."','".$num."')";
		$this->db->query($sql);
        
        
        
        echo '<script language="javascript">location.href="'.base_url().'index.php/admin/focus/";</script>';
        
		
		
		
	}
	
	function del($id){
		
		$query = $this->db->query("select * from focus_list where id = '".$id."'");
		$post=$query->row();
		unlink('photo/'.$post->image);
		$this->db->where('id', $id);
        $this->db->delete('focus_list');
		
	}
	
	function edit(){
	    $title=$this->input->post('title');
        $describe=$this->input->post('describe');
        $link=$this->input->post('link');
        $num=$this->input->post('num');
        $id=$this->input->post('id');

        $query = $this->db->query("select * from focus_list where id = '".$id."'");
		$post=$query->row();
		if($usera['name'][0]!=''){unlink('photo/'.$post->image);$image=$a[0];}else{$image=$post->image;}
        
	        $data = array('title' => $title,'describe' => $describe,'link' => $link,'num' => $num,'image' => $image);
			$this->db->where('id', $id);
			$this->db->update('focus_list', $data);
       
            
        echo '<script language="javascript">location.href="'.base_url().'index.php/admin/focus/";</script>';
        	
	}
	
	function move($ida,$idb){
		$query = $this->db->query("select * from focus_list where id = '".$ida."'");
		$post=$query->row();
		$numa=$post->num;
		$query = $this->db->query("select * from focus_list where id = '".$idb."'");
		$post=$query->row();
		$numb=$post->num;
		
		echo $numa.'   '.$numb;
		
		$data = array('num' => $numb);
	    $this->db->where('id', $ida);
        $this->db->update('focus_list', $data);
		
		$data = array('num' => $numa);
	    $this->db->where('id', $idb);
        $this->db->update('focus_list', $data);
	}

	function change($value){
		$data = array('idname' => $value);
	    $this->db->where('id', 1);
        $this->db->update('focus', $data);
	}

	function change1($value){
		$data = array('pattern' => $value);
	    $this->db->where('id', 1);
        $this->db->update('focus', $data);
	}
    
    function change2($value){
		$data = array('time' => $value);
	    $this->db->where('id', 1);
        $this->db->update('focus', $data);
	}
    
    function change3($value){
		$data = array('trigger' => $value);
	    $this->db->where('id', 1);
        $this->db->update('focus', $data);
	}
    
    function change4($value){
		$data = array('width' => $value);
	    $this->db->where('id', 1);
        $this->db->update('focus', $data);
	}
    
    function change5($value){
		$data = array('height' => $value);
	    $this->db->where('id', 1);
        $this->db->update('focus', $data);
	}



	function edit_view($id){
	    $query = $this->db->query("select * from member where uid='".$id."'");
		$data['member']=$query->row();

		$query = $this->db->query("select * from member_meta where post_id='".$id."'");
		$data['membermeta']=$query->result_array();


		$query = $this->db->query("select * from member_field order by num");
		$data['memberfield']=$query->result_array();

		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=8;
        $this->load->view('admin/member_edit',$data);
	}


	function remove($id){
		$this->db->where('uid', $id);
        $this->db->delete('member');
		$this->db->where('post_id', $id);
        $this->db->delete('member_meta');
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