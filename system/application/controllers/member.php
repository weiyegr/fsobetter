<?php
class Member extends Controller{
	   public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
	}
	
	function index(){
		$data['url'] = base_url().'system/application/views/';
		
	}
	
    function reg_view(){
		$data['url'] = base_url().'system/application/views/member/';
		$querya = $this->db->query("select * from member_field order by num");
	    $data['memberfield']=$querya->result_array(); //zhousou.com
		$this->load->view('member/register',$data);	
	}
	
	function reg(){	
		$username=trim($this->input->post('username'));   
		$password=trim($this->input->post('password'));
		if($username!='' and $password!=''){	
		  $query = $this->db->query("select * from member where username='".$username."'");
		  if($query->num_rows()==0){
		    $sql = "INSERT INTO member (username, password)
	        VALUES ('".$username."', '".$password."')";
	        $this->db->query($sql);
	
			$query = $this->db->query("select * from member order by uid desc"); 
			$post=$query->row();
	
			$member=$this->input->post('member');
	
			foreach($member as $list){
			    $sql = "INSERT INTO member_meta (post_id, meta_title,meta_key,meta_value)
				VALUES ('".$post->uid."', '".$list['title']."', '".$list['keyword']."', '".$list['value']."')";
				$this->db->query($sql);
			}
			echo '注册成功';
		  }else{
		      echo '用户名已存在请换用其他用户名';	
		  }
		}else{
			echo '用户名和密码不能为空';
		}
		
	}
    
    function jumpinfo_view(){
		$data['url'] = base_url().'system/application/views/member/';
		$this->load->view('member/jumpinfo',$data);
		
	}

    function login_view(){
		$data['url'] = base_url().'system/application/views/member/';
		$this->load->view('member/login',$data);
		
	}
	
	function login(){
		$password=trim($this->input->post('password'));
		$username=trim($this->input->post('username'));
		if($username!='' and $password!=''){
			$query = $this->db->query("select * from member where username='".$username."' and password='".$password."'");
			if($query->num_rows() != 0){
				$row = $query->row();
				
				if($this->input->post('remember')==1){
				$this->load->helper('cookie');
				set_cookie('uname',$username, 604800); 
				set_cookie('uid',$row->uid, 604800);	
				}else{
				$this->load->helper('cookie');
				set_cookie('uname',$username, 0); 
				set_cookie('uid',$row->uid, 0);
	                    
				}
                echo '登陆成功';
			}
		    else
		    {
			    echo "登陆失败";
			}
		}else{
			echo '用户名和密码不能为空';
		}
		
		
	}
	
	function out(){
		delete_cookie('uname');
		delete_cookie('uid');
		
		echo '<script language="javascript">alert("成功退出");window.parent.location.reload();</script>';
		
	}
	
    function edit_view(){
    	if(get_cookie('uid')==''){echo '请先登陆';exit();}
		    $query = $this->db->query("select * from member where uid='".get_cookie('uid')."'");
			$data['member']=$query->row();
	
			$query = $this->db->query("select * from member_meta where post_id='".get_cookie('uid')."'");
			$data['membermeta']=$query->result_array();
	
	
			$query = $this->db->query("select * from member_field order by num");
			$data['memberfield']=$query->result_array();
	
			$data['url'] = base_url().'system/application/views/member/';
	        $this->load->view('member/userinfo',$data);
    	
	}
	
	function edit(){
		$uid=$this->input->post('uid');
        $member=$this->input->post('member');

		foreach($member as $list){
		    $data = array('meta_value' => $list['value']);
			$this->db->where('id', $list['id']);
			$this->db->update('member_meta', $data);
			if($list['id']==''){
				$sql = "INSERT INTO member_meta (post_id, meta_title,meta_key,meta_value)
			VALUES ('".$uid."', '".$list['title']."', '".$list['keyword']."', '".$list['value']."')";
			$this->db->query($sql);
			}
		}
		
		echo "操作成功";
		
	}
	
	function repassword_view(){
	    if(!get_cookie('uid')){echo '请先登陆';exit();}
		$data['url'] = base_url().'system/application/views/member/';
	    $this->load->view('member/repassword',$data);
	}
	
    function check_password($password){
    	$query = $this->db->query("select * from member where uid='".get_cookie('uid')."'");
	    $passwordrow=$query->row();
	    if($passwordrow->password != $password){echo '密码不正确';}
	}
	
    function edit_password(){
    	$newpassword=$this->input->post('newpassword');
    	$newrepassword=$this->input->post('newrepassword');
    	if($newpassword==$newrepassword){
		    $data = array('password' => $newpassword);
		    $this->db->where('uid', get_cookie('uid'));
		    $this->db->update('member', $data);
		    delete_cookie('uname');
		    delete_cookie('uid');
		    echo '密码已修改为:'.$newpassword;
    	}else{
    		echo '新密码与确认新密码必须填写一致';
    	}
	}
	
	
} 
?>