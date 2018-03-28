<?php
class Order extends Controller{
    function index($searchtxt='',$offset=0){
	    $data['offset']=$offset;
		$data['classa']=9;
		if($this->input->post('searchtxt')!=''){$searchtxt=$this->input->post('searchtxt');}
		if($this->input->post('searchtxt')=='输入关键字...'){$searchtxt='';}
		if($searchtxt=='0'){$searchtxt='';}
		$limit = 10;

			$queryaa = $this->db->query("select * from myorder where parentid=0 and orderid like '%".$searchtxt."%' order by id desc");
			$query = $this->db->query("select * from myorder where parentid=0 and orderid like '%".$searchtxt."%' order by id desc limit $offset,$limit");
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
		$config['base_url'] = base_url().'index.php/admin/order/index/'.$searchtxt.'/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;


		$this->pagination->initialize($config);

		$data['createlinks'] = $this->pagination->create_links();
		
		foreach($list as $key => $li){
			$querya = $this->db->query("select * from myorder_meta where post_id='".$li['id']."'");
	        $metarows=$querya->num_rows();
	    if($metarows!=0)
	      {
		$metalist=$querya->result_array();
		    foreach($metalist as $mli){
		        $list[$key][$mli['meta_key']]=$mli['meta_value'];
		    }
	      }
		}
		
		$data['list']=$list;
		
		$query = $this->db->query("select * from myorder_field where type='1' or type='2' order by num limit 2");
		$data['field']=$query->result_array();
		
		

		$data['url'] = base_url().'system/application/views/admin/';
		$this->load->view('admin/order',$data);
	}

	function field_view(){

        $data['classa']=9;
		
		$query = $this->db->query("select * from myorder_field order by num");
		$data['orderfield']=$query->result_array();	
		
		$data['url']=base_url().'system/application/views/admin/';
		$this->load->view('admin/order_field',$data);
	}
	
	function field_add($keyword,$type,$title,$property){
	
	    $query = $this->db->query("select * from myorder_field order by num desc	");
		if($query->num_rows() != 0){
			$post=$query->row();
			$numa=$post->num;
			$num=$numa+1;
		}else{
		    $num=0;
		}
		
		if($property=='@@@'){$property='';}
		
		$sql = "INSERT INTO myorder_field (keyword,type,title,property,num)
		VALUES ('".$keyword."','".$type."', '".$title."', '".$property."','".$num."')";
		$this->db->query($sql);
		
		$query = $this->db->query("select * from myorder_field order by id desc");
		$post=$query->row();
		echo $post->id;

		
		
		
	}
	
	function field_del($id){
		
		$query = $this->db->query("select * from myorder_field where id = '".$id."'");
		$post=$query->row();
		
	    $this->db->where('meta_key', $post->keyword);
        $this->db->delete('myorder_meta');
		$this->db->where('id', $id);
        $this->db->delete('myorder_field');
		
	}
	
	function field_edit($ida,$keyword,$type,$title,$property){
	
	        $data = array('keyword' => $keyword,'type' => $type,'title' => $title,'property' => $property);
			$this->db->where('id', $ida);
			$this->db->update('myorder_field', $data);
        	
	}
	
	function field_move($ida,$idb){
		$query = $this->db->query("select * from myorder_field where id = '".$ida."'");
		$post=$query->row();
		$numa=$post->num;
		$query = $this->db->query("select * from myorder_field where id = '".$idb."'");
		$post=$query->row();
		$numb=$post->num;
		
		echo $numa.'   '.$numb;
		
		$data = array('num' => $numb);
	    $this->db->where('id', $ida);
        $this->db->update('myorder_field', $data);
		
		$data = array('num' => $numa);
	    $this->db->where('id', $idb);
        $this->db->update('myorder_field', $data);
	}

	function add_view(){
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=9;

		$query = $this->db->query("select * from myorder_field");
		$data['orderfield']=$query->result_array();

        $this->load->view('admin/order_add',$data);
	}

	function add(){

		$orderid=$this->input->post('orderid');	
	    $uid=$this->input->post('uid');
	    $sql = "INSERT INTO myorder (orderid, uid)
        VALUES ('".$orderid."', '".$uid."')";
        $this->db->query($sql);

		$query = $this->db->query("select * from myorder order by id desc");
		$post=$query->row();

		echo $post->id;


		$data['orderfield']=$query->result_array();

		$order=$this->input->post('order');

		foreach($order as $list){
		    $sql = "INSERT INTO myorder_meta (post_id, meta_title,meta_key,meta_value)
			VALUES ('".$post->id."', '".$list[title]."', '".$list[keyword]."', '".$list[value]."')";
			$this->db->query($sql);
		}

		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/order/";</script>
		<?php
	}

	function edit_view($id){
	    $data = array('isread' => '1');
		$this->db->where('id',$id);
        $this->db->update('myorder', $data);
		
	    $query = $this->db->query("select * from myorder where id='".$id."'");
		$data['order']=$query->row();

		$query = $this->db->query("select * from myorder_meta where post_id='".$id."'");
		$data['ordermeta']=$query->result_array();


		$query = $this->db->query("select * from myorder_field order by num");
		$data['orderfield']=$query->result_array();

		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=9;
        $this->load->view('admin/order_edit',$data);
	}

	function edit(){
	    $orderid=$this->input->post('orderid');
		$id=$this->input->post('id');
		$uid=$this->input->post('uid');
        $name=$this->input->post('name');
        $address=$this->input->post('address');
        $mobilephone=$this->input->post('mobilephone');
        $telephone=$this->input->post('telephone');
        $email=$this->input->post('email');
        $post=$this->input->post('post');
        $payment=$this->input->post('payment');
        $freight=$this->input->post('freight');
        $remark=$this->input->post('remark');
        $state=$this->input->post('state');
	    $data = array('orderid' => $orderid, 'uid' => $uid, 'name' => $name, 'address' => $address, 'mobilephone' => $mobilephone, 'telephone' => $telephone, 'email' => $email, 'post' => $post, 'payment' => $payment, 'freight' => $freight, 'remark' => $remark,'state' => $state);
	    $this->db->where('id', $id);
        $this->db->update('myorder', $data);

		$order=$this->input->post('order');

		foreach($order as $list){
		    $data = array('meta_value' => $list['value']);
			$this->db->where('id', $list['id']);
			$this->db->update('myorder_meta', $data);
			if($list['id']==''){
				$sql = "INSERT INTO myorder_meta (post_id, meta_title,meta_key,meta_value)
			VALUES ('".$id."', '".$list['title']."', '".$list['keyword']."', '".$list['value']."')";
			$this->db->query($sql);
			}
		}

		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/order/";</script>
		<?php

	}


	function remove($id){
		$this->db->where('id', $id);
        $this->db->delete('myorder');
		$this->db->where('post_id', $id);
        $this->db->delete('myorder_meta');
        $this->db->where('parentid', $id);
        $this->db->delete('myorder');
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/order/";</script>
		<?php
	}

	function setting(){
			$do=$this->input->post('do');
			$id=$this->input->post('id');
			if($do=='delete')
			{
				foreach($id as $item)
				{  
	                $this->db->where('id', $item);
                    $this->db->delete('myorder');
                    $this->db->where('parentid', $item);
                    $this->db->delete('myorder');
                    
                
			    }
		
	 	    }
        ?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/order";</script>
		<?php
   }


}
?>