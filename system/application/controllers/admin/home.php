<?php 
class Home extends Controller{
	function main($id=0,$searchtxt='0',$offset=0){
	    
		if($this->input->post('searchtxt')!=''){$searchtxt=$this->input->post('searchtxt');}
		if($this->input->post('searchtxt')=='输入关键字...'){$searchtxt='';}
		if($searchtxt=='0'){$searchtxt='';}
		$data['offset']=$offset;
		$limit = 10;
		$this->db->limit($limit,$offset);
		
		$parentidarr=array($id);
		$rows=1;
		while($rows!=0){
		    $parentidlist=implode(",",$parentidarr);
			$query = $this->db->query("select * from type where parentid in(".$parentidlist.") and id not in (".$parentidlist.")");
			$rows=$query->num_rows();
			if($rows!=0){
				$row=$query->result_array();
				foreach($row as $li){
					$parentidarr[]=$li['id'];
				}
			}
			
		}
		$parentidlist=implode(",",$parentidarr);
		
		$queryaa = $this->db->query("select * from archive where parentid in(".$parentidlist.") and title like '%".$searchtxt."%' order by num");
		$query = $this->db->query("select * from archive where parentid in(".$parentidlist.") and title like '%".$searchtxt."%' order by num limit $offset,$limit");
		$data['list']=$query->result_array();
		if($searchtxt==''){$searchtxt='0';}
		
        $this->load->library('pagination');
		$total = $queryaa->num_rows();
		$data['num']=$total;
		$config['first_link']='第一页';
		$config['first_tag_open'] = '<div class="gotopage">';
		$config['first_tag_close'] = '</div>';
		$config['last_link']='最后一页';
		$config['last_tag_open'] = '<div class="gotopage">';
		$config['last_tag_close'] = '</div>';
		$config['next_link']='下页';
		$config['prev_link']='上页';
		$config['uri_segment'] = 6;
		$config['base_url'] = base_url().'index.php/admin/home/main/'.$id.'/'.$searchtxt.'/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		
		$this->pagination->initialize($config);  
		
		$data['createlinks'] = $this->pagination->create_links();
		$data['id']=$id;
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=1;
		$this->load->view('admin/page',$data);
	}
	function update_num($ida,$idnum){
	    $data = array('num' => $idnum);
	    $this->db->where('id', $ida);
        $this->db->update('archive', $data); 
	}
	function index(){
		$queryaa = $this->db->query("select * from archive order by num");
		$data['archivenums']=$queryaa->num_rows();
		$queryaa = $this->db->query("select * from type order by num");
		$data['typenums']=$queryaa->num_rows();
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=-1;
		
		$queryaa = $this->db->query("select * from statistics order by id desc");
		$data['statistics']=$queryaa->result_array();
		
        $this->load->view('admin/main',$data);
	}
	function upload($id){
		$name=$_FILES['Filedata']["name"];
		$tmp_name=$_FILES['Filedata']["tmp_name"];
		$type=$_FILES['Filedata']["type"];
		$size=$_FILES['Filedata']["size"];
		$uploadfile = $name;
		  
		$filestate='';

			if(move_uploaded_file($tmp_name,"uploads/".$uploadfile))
				$filestate=$uploadfile;
			else if (copy($tmp_name,$uploadfile))
				$filestate=$uploadfile;
	    $sql = "INSERT INTO image_list (postid,title,filename) 
        VALUES ('".$id."', '".$name."', '".$name."')";
        $this->db->query($sql);
		echo "1";
	}
	
	function dellet($id,$filename){
	    $query = $this->db->query("select * from image_list where filename='".$filename."' and postid='".$id."'");
		$image_list=$query->result_array();
		foreach($image_list as $li){
			$this->db->where('id', $li['id']);
			$this->db->delete('image_list');
		}
		
	}
	
	function update_carticle($id){
	
	    if($id==''){echo '无效地址！';exit();}
		$data['classa']=1;
		
		$query = $this->db->query("select * from archive where id='".$id."'");
		$archive=$query->row();
		$data['archive']=$archive;
		$parentid=$archive->parentid;	
		while($parentid!=0){
			$query = $this->db->query("select * from type where id='".$parentid."'");
			$type=$query->row();
			$parentid=$type->parentid;
			$pid=$type->id;
			$data['imagelist']=$type->imagelist;
		}
		$query = $this->db->query("select * from type_meta where postid='".$pid."' order by id asc");
		$data['type_meta']=$query->result_array();
		$query = $this->db->query("select * from image_list where postid='".$id."'");
		$data['image_list']=$query->result_array();
		$data['id']=$id;
		$data['url'] = base_url().'system/application/views/admin/';
        $this->load->view('admin/page_edit',$data);
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
		
		$short=$this->input->post('short');
		//判断缩略名是否需要转换标题
		if($short==''){
			$this->load->library('utf8pinyin','','py');
			$short= $this->py->str2py($title,TRUE,TRUE); 
		}
		
		$query = $this->db->query("select * from archive where id='".$id."'");
		$row=$query->row();
		$parentid=$row->parentid;
		$short1=='';
		if($row->short != $short){
			//判断缩略名是否存在
			$rows=1;
			$i=0;
			$short1=$short;
			while($rows!=0){
				$query = $this->db->query("select * from archive where short='".$short1."'");
				$rows=$query->num_rows();
				if($rows!=0){$short1=$short.'_'.$i;$i++;}
			}
		}
		
		if($short1!=''){
		    $insertb['short']=$short1;
			//$inserta[]='short';
		}
		
	    $num=$this->input->post('num');
		if($num!=''){
		    $insertb['num']=$num;
			//$inserta[]='num';
		}
		
		$keywords=$this->input->post('keywords');
		if($keywords!=''){
		    $insertb['keywords']=$keywords;
			//$inserta[]='num';
		}
		
		$description=$this->input->post('description');
		if($description!=''){
		    $insertb['description']=$description;
			//$inserta[]='num';
		}
		
		
		//自定义字段处理
		if($parentid!=0){
		$pid=$parentid;	
			
			while($pid!=0){
				$query = $this->db->query("select * from type where id='".$pid."'");
				$type=$query->row();
				$pid=$type->parentid;
				$tid=$type->id;
			}
			
			$query = $this->db->query("select * from type_meta where postid='".$tid."' order by type");
			$type_meta=$query->result_array();
			
			foreach($type_meta as $li){
			    if($li['type']==2){
				    $file=$_FILES[$li['fetch']];
                    $$li['fetch']=$this->classl->doupload($file);
					
					if($$li['fetch']!=''){
					foreach(explode(';',$li['sizeimg']) as $item){
					    $this->classl->doupload($$li['fetch'],reset(explode(',',$item)),end(explode(',',$item)));
						if(reset(explode(',',$item))=='*'){$width2=0;}else{$width2=reset(explode(',',$item));}
			            if(end(explode(',',$item))=='*'){$height2=0;}else{$height2=end(explode(',',$item));}
						unlink('uploads/'.$width2.'.'.$height2.'.'.($row->$li['fetch']));
					}
					    unlink('uploads/'.($row->$li['fetch']));
						
						$insertb[$li['fetch']]=$$li['fetch'];
						//$inserta[]=$li['fetch'];
					}
				}else if($li['type']==3){
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
						$insertb[$li['fetch']]=str_replace("'", '"', $$li['fetch']);
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
		}
	
	    $data = $insertb;
	    $this->db->where('id', $id);
        $this->db->update('archive', $data);
	
        echo '<script language="javascript">location.href="'.base_url().'index.php/admin/home/update_carticle/'.$id.'";</script>'; 
      
        
	}
	function carticle_add($id=''){
		//$id->parentid
		if($id==''){echo '无效地址！';exit();}
		$data['classa']=1;
		$parentid=$id;	
		while($parentid!=0){
			$query = $this->db->query("select * from type where id='".$parentid."'");
			$type=$query->row();
			$parentid=$type->parentid;
			$pid=$type->id;
		}
		$query = $this->db->query("select * from type_meta where postid='".$pid."' order by id asc");
		$data['type_meta']=$query->result_array();
		$data['id']=$id;
		$data['url'] = base_url().'system/application/views/admin/';
		$this->load->view('admin/page_add',$data);
	}
	function add(){
		header("Content-Type:text/html;charset=utf-8"); 
		
		
		
		$inserta=array();
		$insertb=array();
		$parentid=$this->input->post('parentid');
		if($parentid==''){
			$parentid=0;
		}
		if($parentid!=''){
		    $insertb[]=$parentid;
			$inserta[]='parentid';
		}
		
		$title=$this->input->post('title');
		if($title!=''){
		    $insertb[]=$title;
			$inserta[]='title';
		}
		
		$short=$this->input->post('short');
		//判断缩略名是否需要转换标题
		if($short==''){
		    $this->load->library('utf8pinyin','','py');
			$short= $this->py->str2py($title,TRUE,TRUE); 
		}
		//判断缩略名是否存在
		$rows=1;
		$i=0;
		    $short1=$short;
			while($rows!=0){
				$query = $this->db->query("select * from archive where short='".$short1."'");
				$rows=$query->num_rows();
				if($rows!=0){$short1=$short.'_'.$i;$i++;}
			}
		
		if($short1!=''){
		    $insertb[]=$short1;
			$inserta[]='short';
		}
		
		$addtime=$this->input->post('addtime');
		if($addtime!=''){
		    $insertb[]=$addtime;
			$inserta[]='addtime';
		}
		
		$edittime=$this->input->post('edittime');
		if($edittime!=''){
		    $insertb[]=$edittime;
			$inserta[]='edittime';
		}
		
		$keywords=$this->input->post('keywords');
		if($keywords!=''){
		    $insertb[]=$keywords;
			$inserta[]='keywords';
		}
		
		$description=$this->input->post('description');
		if($description!=''){
		    $insertb[]=$description;
			$inserta[]='description';
		}
		
	    $num=$this->input->post('num');
		if($num!=''){
		    $insertb[]=$num;
			$inserta[]='num';
		}
		
		//自定义字段处理
		if($parentid!=0){
		$pid=$parentid;	
			
			while($pid!=0){
				$query = $this->db->query("select * from type where id='".$pid."'");
				$type=$query->row();
				$pid=$type->parentid;
				$tid=$type->id;
			}
			
			$query = $this->db->query("select * from type_meta where postid='".$tid."' order by type");
			$type_meta=$query->result_array();
			
			foreach($type_meta as $li){
			    if($li['type']==2){
				    $file=$_FILES[$li['fetch']];
                    $$li['fetch']=$this->classl->doupload($file);
					foreach(explode(';',$li['sizeimg']) as $item){
					    if($$li['fetch']!=''){
					    $this->classl->doupload($$li['fetch'],reset(explode(',',$item)),end(explode(',',$item)));
						}
					}
					
					if($$li['fetch']!=''){
						$insertb[]=$$li['fetch'];
						$inserta[]=$li['fetch'];
					}
				}else if($li['type']==3){
				    $file=$_FILES[$li['fetch']];
                    $$li['fetch']=$this->classl->doupload($file);
					if($$li['fetch']!=''){
						$insertb[]=$$li['fetch'];
						$inserta[]=$li['fetch'];
					}
				
				}else if($li['type']==4){
				    $$li['fetch']=$this->input->post($li['fetch']);
					if($$li['fetch']!=''){
						$insertb[]=str_replace("'", '"', $$li['fetch']);
						$inserta[]=$li['fetch'];
						//$inserta[]=$li['fetch'];
					}
				
				}else{
					$$li['fetch']=$this->input->post($li['fetch']);
					if($$li['fetch']!=''){
						$insertb[]=$$li['fetch'];
						$inserta[]=$li['fetch'];
					}
				}
			}
		}
		
		if($short1!=''){
		    $inserta1=implode(',',$inserta);
			$insertb1=implode('\',\'',$insertb);
			$sql = "INSERT INTO archive ($inserta1) 
        VALUES ('$insertb1')";
        $this->db->query($sql);
		}
	    echo '<script language="javascript">location.href="'.base_url().'index.php/admin/home/main/'.$parentid.'";</script>'; 
		
        
		
	}
		function remove($parentida=0,$id){
		$query = $this->db->query("select * from archive where id='".$id."'");
		$row=$query->row();
		$parentid=$row->parentid;	
			
			while($parentid!=0){
				$query = $this->db->query("select * from type where id='".$parentid."'");
				$type=$query->row();
				$parentid=$type->parentid;
				$pid=$type->id;
			}
		
		$query = $this->db->query("select * from type_meta where postid='".$pid."' order by type");
		$type_meta=$query->result_array();
		
		foreach($type_meta as $li){
			if($li['type']==2 or $li['type']==3){
				unlink('uploads/'.$row->$li['fetch']);
				foreach(explode(';',$li['sizeimg']) as $item){
						if(reset(explode(',',$item))=='*'){$width2=0;}else{$width2=reset(explode(',',$item));}
			            if(end(explode(',',$item))=='*'){$height2=0;}else{$height2=end(explode(',',$item));}
						unlink('uploads/'.$width2.'.'.$height2.'.'.($row->$li['fetch']));
				}
			}
		}
		
		
		

		$this->db->where('id', $id);
        $this->db->delete('archive');
        
        echo '<script language="javascript">location.href="'.base_url().'index.php/admin/home/main/'.$parentida.'";</script>';
        
		}
		function setting(){
			$do=$this->input->post('do');
			$id=$this->input->post('id');
			$parentid=$this->input->post('cid');
			$parentida=$parentid;
			$ida=$this->input->post('ida');
			if($do=='delete')
			{
				foreach($id as $item)
				{
				
				    $query = $this->db->query("select * from archive where id='".$item."'");
					$row=$query->row();
					$parentid=$row->parentid;	
						
						while($parentid!=0){
							$query = $this->db->query("select * from type where id='".$parentid."'");
							$type=$query->row();
							$parentid=$type->parentid;
							$pid=$type->id;
						}
					
					$query = $this->db->query("select * from type_meta where postid='".$pid."' order by type");
					$type_meta=$query->result_array();
					
					foreach($type_meta as $li){
						if($li['type']==2 or $li['type']==3){
							unlink('uploads/'.$row->$li['fetch']);
							foreach(explode(';',$li['sizeimg']) as $item1){
									if(reset(explode(',',$item1))=='*'){$width2=0;}else{$width2=reset(explode(',',$item1));}
									if(end(explode(',',$item1))=='*'){$height2=0;}else{$height2=end(explode(',',$item1));}
									unlink('uploads/'.$width2.'.'.$height2.'.'.($row->$li['fetch']));
							}
						}
					}
					
					
					

					$this->db->where('id', $item);
					$this->db->delete('archive');
					
					?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/home/main/<?php echo $parentida; ?>";</script>
		<?php 
                   
                
			   }
		
		 }
		 
		 if($do=='move')
			{
				foreach($id as $item)
				{
				
				    $data = array('parentid' => $parentid);
	                $this->db->where('id', $item);
                    $this->db->update('archive', $data); 
					$query = $this->db->query("select * from archive where id='".$item."'");
		            $article=$query->row();
					$parentida=$article->parentid;
                    
                
			   }
		
		 }
		 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/home/main/<?php echo $parentida; ?>";</script>
		<?php 
		
	  }
      
	  function removefile($id){
	  	
	  }
}
?>