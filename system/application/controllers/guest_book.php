<?php  
header("Content-Type: text/html; charset=UTF-8");
class Guest_book extends Controller{
    public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		
	}
	function index(){
	    $this->statistics->add();
		$data['on']='客户留言';
		
		$query=$this->db->query("select * from changgui where id=1");
		$row=$query->row();
		
		if($row->rewrite == 1){
			$data['urli']=base_url();
			$data['urlp']=base_url().'pages/';
		}else{
			$data['urli']=base_url().'index.php/';
			$data['urlp']=base_url().'index.php/pages/index/';
		}
		
	   
		
		
			$this->load->view('guest_book',$data);
	}
		
		//客户留言
	function add(){
	    
	    $inserta=array();
		$insertb=array();
		
		$mempostid=get_cookie('uid');
		if($mempostid!=''){
		    $insertb[]=$mempostid;
			$inserta[]='mempostid';
		}
		
		$arpostid=$this->input->post('arpostid');
		if($arpostid!=''){
		    $insertb[]=$arpostid;
			$inserta[]='arpostid';
		}
		
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
		
		//邮件通知
        $query = $this->db->query("select * from changgui where id=1");
        $row=$query->row();
		if($row->emailor==1){
			$this->classl->smail($row->email,$title,$title);
        }

		$surl=$this->input->post('surl');
		echo '<script language="javascript">alert("信息已提交，管理员将尽快与您联系！");location.href="'.$surl.'";</script>'; 
    }
}
?>