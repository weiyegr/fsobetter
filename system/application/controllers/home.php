<?php  
class Home extends Controller{
    public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		
	}
	function index(){
		//基本设置
        $this->statistics->add();
        $this->load->library('email');
		$data['url'] = base_url().'system/application/views/';
	     $on['home']='首页';
		$data['on']=$on;
		
		$query=$this->db->query("select * from changgui where id=1");
		$row=$query->row();
		
		if($row->rewrite == 1){
			$data['urli']=base_url();
			$data['urlp']=base_url().'pages/';
		}else{
			$data['urli']=base_url().'index.php/';
			$data['urlp']=base_url().'index.php/pages/index/';
		}
		
		
	    
		$this->load->view('home',$data);
	}

    function m_index(){
        //基本设置
        $this->statistics->add();
        $this->load->library('email');
        $data['url'] = base_url().'system/application/views/';
        $on['home']='首页';
        $data['on']=$on;

        $query=$this->db->query("select * from changgui where id=1");
        $row=$query->row();

        if($row->rewrite == 1){
            $data['urli']=base_url();
            $data['urlp']=base_url().'pages/';
        }else{
            $data['urli']=base_url().'index.php/';
            $data['urlp']=base_url().'index.php/pages/index/';
        }



        $this->load->view('m_home',$data);
    }

	function post($short){	    
		$this->load->view($short);
	}
}
?>