<?php
class Myorder extends Controller{
    public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('url');
		
		
	}
	
	function index(){
		$data['url'] = base_url().'system/application/views/';
		
	}
	
	function cart_view(){
		$data['url'] = base_url().'system/application/views/member/';
		$this->load->view('member/cart',$data);
		
	}
	
    function dingdan1_view(){
        $data['url'] = base_url().'system/application/views/member/';
        if($this->cart->total() > 0){
            
            if(get_cookie('uid')){
    		    $this->load->view('member/dingdan1',$data);
            }else{
    		    $data['title'] = '错误提示'; 
                $data['content'] = '您还没有登陆，请先登陆后再查看订单，感谢您的支持！<br>
    请登陆或继续浏览网站的产品！';
    		    $this->load->view('member/jumpinfo',$data);
		    }
            
		}else{
		    $data['title'] = '错误提示'; 
            $data['content'] = '您的购物车中没有任务产品，请先选择您想购买的产品，感谢您的支持！<br>
请继续浏览网站的产品！';
		    $this->load->view('member/jumpinfo',$data);
		}	
	}
    
    function dingdan_view(){
        $data['url'] = base_url().'system/application/views/member/';
        if(get_cookie('uid')){
            $query = $this->db->query("select * from myorder where parentid=0 and uid='".get_cookie('uname')."' order by id");
            $data['list']=$query->result_array();
    		$this->load->view('member/dingdan',$data);
		}else{
		    $data['title'] = '错误提示'; 
            $data['content'] = '您还没有登陆，请先登陆后再查看订单，感谢您的支持！<br>
请登陆或继续浏览网站的产品！';
		    $this->load->view('member/jumpinfo',$data);
		}	
	}
	
    function add($id,$querity,$price,$name,$image,$code,$categoryname,$short){
	    if($id!='' && $querity!='' && $price!='' && $name !='' && $image !='' && $code !='' && $categoryname !='' && $short !=''){
			$data = array(
							'id'      => $id,
							'qty'     => $querity,
							'price'   => $price,
							'name'    => $name,
							'options' => array('image' => $image,'code'=>$code,'categoryname'=>$categoryname,'short'=>$short)
						);
			$this->cart->insert($data);
		}
        
        $data['url'] = base_url().'system/application/views/member/';
        $this->load->view('member/cart',$data);
		
	}
    
    function adjust($rid,$qty){
        if($rid!='' && $qty!=''){	
			$data = array(
				   'rowid' => $rid,
				   'qty'   => $qty
				);

			$this->cart->update($data);
		}
    }
    
    function price(){
        $price=0;
        foreach($this->cart->contents() as $item){
            $price=$item['qty']*$item['price']+$price;
        }
        echo $price;
    }
	
    function edit(){
	    $rid=$this->input->post('rid');
	    $qty=$this->input->post('qty');
		if($rid!='' && $qty!=''){
			$data = array(
				   'rowid' => $rid,
				   'qty'   => $qty
				);

			$this->cart->update($data); 
		}
	}
	
    function remove($id){
        if($id!=''){
	    $data = array(
               'rowid' => $id,
               'qty'   => 0
            );
		}

        $this->cart->update($data); 
	}
	
    function emptya(){
	    $this->cart->destroy();
	}
    
    function orderadd(){
        $orderid=date("YmdHis").rand(100000,999999);	
        $username=get_cookie('uname');
        $name=$this->input->post('name');	
        $province=$this->input->post('province');
        $address=$province.$this->input->post('address');	
        $mobilephone=$this->input->post('mobilephone');	
        $telephone=$this->input->post('telephone'); 
        $email=$this->input->post('email');	
        $post=$this->input->post('post');	
        $payment=$this->input->post('IdPaymentType');	
        $freight=$this->input->post('freight');	
        $remark=$this->input->post('remark');	
	    $sql = "INSERT INTO myorder (orderid, uid, name, address, mobilephone, telephone, email, post, payment, freight, remark, productcode, productname, productprice, productquantity, categoryname, short, image, parentid,tatalaccount,state,isread)
        VALUES ('".$orderid."', '".$username."', '".$name."', '".$address."', '".$mobilephone."', '".$telephone."', '".$email."', '".$post."', '".$payment."', '".$freight."', '".$remark."','','','','','','','','0','".$this->cart->total()."','等待买家付款','0')";
        $this->db->query($sql);
        
        $query=$this->db->query("select * from myorder where orderid='".$orderid."'");
        $row=$query->row();
        $mid=$row->id;
        
        foreach($this->cart->contents() as $items){
            $sql = "INSERT INTO myorder (orderid, uid, name, address, mobilephone, telephone, email, post, payment, freight, remark, productcode, productname, productprice, productquantity, categoryname, short, image, parentid,tatalaccount,state)
            VALUES ('', '', '', '', '', '', '', '', '', '', '','".$items['options']['code']."','".$items['name']."','".$items['price']."','".$items['qty']."','".$items['options']['categoryname']."','".$items['options']['short']."','".$items['options']['image']."','".$mid."','".$this->cart->total()."','')";
            $this->db->query($sql);
            }
            $this->cart->destroy();
            
        //邮件接收设置
        $this->email->from('cms8du@yahoo.cn', 'cms8du');
        $this->email->to(''); 
        $this->email->subject("订单号:".$orderid);
        $this->email->message('Testing the email class.'); 
        //$this->email->send();
        
	}
    
	
}
?>