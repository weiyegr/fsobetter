<?php 
class Classify extends Controller{
	function index(){
		 $this->load->helper('url');
		 $this->load->library('session');
		 $this->load->model('classify_list');
		 $data['classa']=2;
		 $query = $this->db->query("select * from type");
		 $data['nums']=$query->num_rows();
		 $data['url'] = base_url().'system/application/views/admin/';
		 $this->load->view('admin/category',$data);
	}
	
	function update_num($ida,$idnum){
	    $data = array('num' => $idnum);
	    $this->db->where('id', $ida);
        $this->db->update('type', $data); 
	}
	
	function update_page($id){
		$this->load->helper('url');
	    $query = $this->db->query("select * from type where id='".$id."'");
		$row=$query->row();
		$data['article']=$query->row();
		$data['type']=$query->row();
		$query = $this->db->query("select * from language");
		$data['language']=$query->result_array();
		
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=2;
        $this->load->view('admin/classify_page_edit',$data);
	}
	function page_update(){
	    $title=$this->input->post('title');
	    
	    $query = $this->db->query("select * from language");
		$language=$query->result_array();
		$i=0;
	    foreach($language as $li){$title[$i]['language']=$li['language']; $i++;}
	    foreach($title as $li){$ptitlea[]=$li['language'].'<------content------>'.$li['name'];}
	    $title=implode('<------language------>',$ptitlea);
	    
	    $web_title=$this->input->post('web_title');
	    
	    $query = $this->db->query("select * from language");
		$language=$query->result_array();
		$i=0;
	    foreach($language as $li){$web_title[$i]['language']=$li['language']; $i++;}
	    foreach($web_title as $li){$web_titlea[]=$li['language'].'<------content------>'.$li['name'];}
	    $web_title=implode('<------language------>',$web_titlea);
	    
	    $web_keyword=$this->input->post('web_keyword');
	    
	    $query = $this->db->query("select * from language");
		$language=$query->result_array();
		$i=0;
	    foreach($language as $li){$web_keyword[$i]['language']=$li['language']; $i++;}
	    foreach($web_keyword as $li){$web_keyworda[]=$li['language'].'<------content------>'.$li['name'];}
	    $web_keyword=implode('<------language------>',$web_keyworda);
	    
	    $web_describe=$this->input->post('web_describe');
	    
	    $query = $this->db->query("select * from language");
		$language=$query->result_array();
		$i=0;
	    foreach($language as $li){$web_describe[$i]['language']=$li['language']; $i++;}
	    foreach($web_describe as $li){$web_describea[]=$li['language'].'<------content------>'.$li['name'];}
	    $web_describe=implode('<------language------>',$web_describea);
	    
	    $price=$this->input->post('price');
	    $code=$this->input->post('code');
	    
	    $query = $this->db->query("select * from language");
		$language=$query->result_array();
		$i=0;
	    foreach($language as $li){$code[$i]['language']=$li['language']; $i++;}
	    foreach($code as $li){$codea[]=$li['language'].'<------content------>'.$li['name'];}
	    $code=implode('<------language------>',$codea);
	    
	    $writer=$this->input->post('writer');
	    
	    $query = $this->db->query("select * from language");
		$language=$query->result_array();
		$i=0;
	    foreach($language as $li){$writer[$i]['language']=$li['language']; $i++;}
	    foreach($writer as $li){$writera[]=$li['language'].'<------content------>'.$li['name'];}
	    $writer=implode('<------language------>',$writera);
	    
	    $num=$this->input->post('num');
	    $text=$this->input->post('text');
	    
	    $query = $this->db->query("select * from language");
		$language=$query->result_array();
		$i=0;
	    foreach($language as $li){$text[$i]['language']=$li['language']; $i++;}
	    foreach($text as $li){$texta[]=$li['language'].'<------content------>'.$li['name'];}
	    $text=implode('<------language------>',$texta);
	    
	    $image=$this->input->post('image');
	    $file=$this->input->post('file');
	    $id=$this->input->post('id');
	    $typeid=$this->input->post('typeid');
	    $time=$this->input->post('time');

	    
	    $short=$this->input->post('short');
	    $data = array('short'=>'');
        $this->db->where('id', $id);
        $this->db->update('type', $data);
	    if($short!=''){
	    $query = $this->db->query("select * from type where short='".$short."'");
		$row=$query->num_rows();
		if($row!=0){
		
			while($row!=0){
		    $shotall=explode('_',$short);
		    $shotreset=reset($shotall);
		    $shotend=end($shotall);
		    $shotenda=$shotend+1;
		    if(intval($shotend)){$short=$shotreset.'_'.$shotenda;}else{$short=$shotreset.'_1';}
			$query = $this->db->query("select * from type where short='".$short."'");
		    $row=$query->num_rows();
			}
	    }
		}else{
			$this->load->library('utf8pinyin','','py');
            $short= $this->py->str2py($title,TRUE,TRUE); 
		}
	    
	    
	    // 上传图片开始
	          $usera=$_FILES['userfile'];
              $this->load->library('upload');
              $userfile_data = $_FILES['userfile'];
              $a= $this->upload->do_upload_ex("userfile",$userfile_data,true,"/uploads/","/uploads/",false);
              if($usera['name'][0]!=''){
                $image=$a[0];
              }else{
              	$image=$image;
              }
              if($usera['name'][1]!=''){
                $file=$a[1];
              }else{
              	$file=$file;
              }
	    $data = array('title' => $title, 'web_title' => $web_title, 'web_keyword' => $web_keyword, 'web_describe'=>$web_describe, 'price'=>$price, 'code'=>$code, 'writer'=>$writer, 'num'=>$num, 'text'=>$text, 'image'=>$image, 'file'=>$file,'time'=>$time, 'short'=>$short);
	    $this->db->where('id', $id);
        $this->db->update('type', $data); 
		?>
		<script language="javascript">location.href="<?php echo base_url(); ?>index.php/admin/classify/update_page/<?php echo $id; ?>";</script>
		<?php 
        
	}
	
	function classify_add($id=''){
		//$id->parentid
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('classifya');
		$data['type_image']=array();
		
		if($id!='' or $id!=0){
		$parentid=$id;	
			
			while($parentid!=0){
				$query = $this->db->query("select * from type where id='".$parentid."'");
				$type=$query->row();
				$parentid=$type->parentid;
				$pid=$type->id;
			}
			
			$query = $this->db->query("select * from type_image where postid='".$pid."'");
			$data['type_image']=$query->result_array();
		}
		
		$data['id']=$id;
		
		$data['classa']=2;
		
		$data['url'] = base_url().'system/application/views/admin/';
		$this->load->view('admin/category_add',$data);
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
		
		$viewhtml=$this->input->post('viewhtml');
		if($viewhtml!=''){
		    $insertb[]=$viewhtml;
			$inserta[]='viewhtml';
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
		    $query = $this->db->query("select * from type where short='".$short1."'");
			$rows=$query->num_rows();
			if($rows!=0){$short1=$short.'_'.$i;$i++;}
		}
		
		if($short1!=''){
		    $insertb[]=$short1;
			$inserta[]='short';
		}
		
		$type=$this->input->post('type');
		if($type!=''){
		    $insertb[]=$type;
			$inserta[]='type';
		}
		
		$status=$this->input->post('status');
		if($status!=''){
		    $insertb[]=$status;
			$inserta[]='status';
		}
		
		$imagelist=$this->input->post('imagelist');
		if($imagelist!=''){
		    $insertb[]=$imagelist;
			$inserta[]='imagelist';
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
			
			$query = $this->db->query("select * from type_image where postid='".$tid."' order by type");
			$type_image=$query->result_array();
			
			foreach($type_image as $li){
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
		}
		
		if($title!=''){
		    $inserta1=implode(',',$inserta);
			$insertb1=implode('\',\'',$insertb);
			$sql = "INSERT INTO type ($inserta1) 
        VALUES ('$insertb1')";
        $this->db->query($sql);
			if($type=='1'){
			
			    $rows=1;
				$i=0;
				while($rows!=0){
					$short1=$short.'_'.$i;$i++;
					$query = $this->db->query("select * from archive where short='".$short1."'");
					$rows=$query->num_rows();
				}
				
				$query = $this->db->query("select * from type");
				$row = $query->last_row();
				
			    $sql = "INSERT INTO archive (parentid,addtime,edittime,short) VALUES ('".$row->id."','".strtotime("now")."','".strtotime("now")."','".$short1."')";
                $this->db->query($sql);
			}
		
		}
	    echo '<script language="javascript">location.href="'.base_url().'index.php/admin/classify/";</script>'; 
        	
	}
	
	function add_type_image(){
	    $postid=$this->input->post('id');
		$title=$this->input->post('title');
		$fetch=$this->input->post('fetch');
		$type=$this->input->post('type');
		$width=$this->input->post('width');
		$height=$this->input->post('height');
		$intf=$this->input->post('intf');
		if($width==''){$width=0;}
		if($height==''){$height=0;}
		
		
			
		
		echo "$postid!='' and $title!='' and $fetch!='' and $type!=''";
	    if($postid!='' and $title!='' and $fetch!='' and $type!=''){
	    $sql = "INSERT INTO type_image (`postid`,`title`,`fetch`,`type`,`width`,`height`) 
        VALUES ('".$postid."','".$title."','".$fetch."','".$type."','".$width."','".$height."')";
        $this->db->query($sql);
		
		    $query = $this->db->query("select * from type");
		    $field=$query->list_fields();
			if(!in_array($fetch,$field)){
			    $query = $this->db->query("alter table type add $fetch $intf default NULL;");	
			}
		
		}
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/classify/update_classify/'.$postid.'";</script>';
		
	}
	
	function del_type_image($id='',$postid=''){
	    if($id=='' or $postid==''){echo '无效地址！';exit();}
		$query = $this->db->query("select * from type_image where id='".$id."'");
		$type_image=$query->row();
		$fetch=$type_image->fetch;
		if($type_image->type==2 or $type_image->type==3){
			$query = $this->db->query("select * from type");
			$type=$query->result_array();
			foreach($type as $li){
			    unlink('uploads/'.$li[$fetch]);
			}
		}
		
	    $this->db->where('id', $id);
        $this->db->delete('type_image');
		
		    $query = $this->db->query("select * from type_image where fetch='".$fetch);
		    $field=$query->num_rows();
			if($field == 1){
			    $query = $this->db->query("alter table type drop column $fetch");
			}
		
		
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/classify/update_classify/'.$postid.'";</script>';
		
	}
	
	function add_type_meta(){
	    $postid=$this->input->post('id');
		$title=$this->input->post('title');
		$fetch=$this->input->post('fetch');
		$type=$this->input->post('type');
		$search=$this->input->post('search');
		$listtop=$this->input->post('listtop');
		$num=$this->input->post('num');
		$sizeimg=$this->input->post('sizeimg');
		$selectlist=$this->input->post('selectlist');
		$intf=$this->input->post('intf');
		
		
	    if($postid!='' and $title!='' and $fetch!='' and $type!=''){
	    $sql = "INSERT INTO type_meta (`postid`,`title`,`fetch`,`type`,`num`,`sizeimg`,`search`,`listtop`,`selectlist`) 
        VALUES ('".$postid."','".$title."','".$fetch."','".$type."','".$num."','".$sizeimg."','".$search."','".$listtop."','".$selectlist."')";
        $this->db->query($sql);
		
		
		    $query = $this->db->query("select * from archive");
		    $field=$query->list_fields();
			if(!in_array($fetch,$field)){
			    $query = $this->db->query("alter table archive add $fetch $intf default NULL;");	
			}
		}
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/classify/update_classify/'.$postid.'";</script>';
		
	}
	
	function del_type_meta($id='',$postid=''){
	    if($id=='' or $postid==''){echo '无效地址！';exit();}
		$query = $this->db->query("select * from type_meta where id='".$id."'");
		$type_image=$query->row();
		$fetch=$type_image->fetch;
		if($type_image->type==2 or $type_image->type==3){
			$query = $this->db->query("select * from archive");
			$type=$query->result_array();
			foreach($type as $li){
			    unlink('uploads/'.$li[$fetch]);
			}
		}
		
	    $this->db->where('id', $id);
        $this->db->delete('type_meta');
		
		    $query = $this->db->query("select * from type_meta where fetch='".$fetch);
		    $field=$query->num_rows();
			if($field == 1){
			    $query = $this->db->query("alter table archive drop column $fetch");
			}
		
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/classify/update_classify/'.$postid.'";</script>';
		
	}
	
	
	function update_classify($id=''){
		if($id==''){echo '无效地址！';exit();}
	    $query = $this->db->query("select * from type where id='".$id."'");
		$data['type']=$query->row();
		$data['type_image']=array();
		
		$parentid=$id;	
			
			while($parentid!=0){
				$query = $this->db->query("select * from type where id='".$parentid."'");
				$type=$query->row();
				$parentid=$type->parentid;
				$pid=$type->id;
			}
			
		$query = $this->db->query("select * from type_image where postid='".$pid."' order by id asc");
		$data['type_image']=$query->result_array();
		
		$query = $this->db->query("select * from type_meta where postid='".$id."' order by id asc");
		$data['type_meta']=$query->result_array();
		
		$query = $this->db->query("select * from type where id='".$id."'");
		$type=$query->row();
		$data['parentid']=$type->parentid;
			
		$data['url'] = base_url().'system/application/views/admin/';
		$data['classa']=2;
		
        $this->load->view('admin/category_edit',$data);
	}
	
	
	function update(){
	    header("Content-Type:text/html;charset=utf-8"); 
		//$inserta=array();
		$insertb=array();
		$id=$this->input->post('id');
		$parentid=$this->input->post('parentid');
		if($parentid!=''){
		    $insertb['parentid']=$parentid;
			//$inserta[]='parentid';
		}
		
		$title=$this->input->post('title');
		if($title!=''){
		    $insertb['title']=$title;
			//$inserta[]='title';
		}
		
		$viewhtml=$this->input->post('viewhtml');
		if($viewhtml!=''){
		    $insertb['viewhtml']=$viewhtml;
			//$inserta[]='title';
		}
		
		$short=$this->input->post('short');
		//判断缩略名是否需要转换标题
		if($short==''){
			$this->load->library('utf8pinyin','','py');
			$short= $this->py->str2py($title,TRUE,TRUE); 
		}
		
		$query = $this->db->query("select * from type where id='".$id."'");
		$row=$query->row();
		$short1='';
		if($row->short != $short){
			//判断缩略名是否存在
			$rows=1;
			$i=0;
			$short1=$short;
			while($rows!=0){
				
				$query = $this->db->query("select * from type where short='".$short1."'");
				$rows=$query->num_rows();
				if($rows!=0){$short1=$short.'_'.$i;$i++;}
			}
		}
		
		if($short1!=''){
		    $insertb['short']=$short1;
			//$inserta[]='short';
		}
		
		$type=$this->input->post('type');
		if($type!=''){
		    $insertb['type']=$type;
			//$inserta[]='type';
			$query = $this->db->query("select * from type where id='".$id."'");
			$row = $query->row();
		    if($type!=$row->type){
			    if($type==1){
				    $rows=1;
					$i=0;
					while($rows!=0){
						$short1=$short.'_'.$i;$i++;
						$query = $this->db->query("select * from archive where short='".$short1."'");
						$rows=$query->num_rows();
					}
					
					
					$sql = "INSERT INTO archive (parentid,addtime,edittime,short) VALUES ('".$id."','".strtotime("now")."','".strtotime("now")."','".$short1."')";
					$this->db->query($sql);
				}else{
				    $this->db->where('parentid', $id);
                    $this->db->delete('archive');
				}
			    
			}
		}
		
		
		
		$status=$this->input->post('status');
		if($status!=''){
		    $insertb['status']=$status;
			//$inserta[]='status';
		}
		
		$imagelist=$this->input->post('imagelist');
		if($imagelist!=''){
		    $insertb['imagelist']=$imagelist;
			//$inserta[]='imagelist';
		}
		
	    $num=$this->input->post('num');
		if($num!=''){
		    $insertb['num']=$num;
			//$inserta[]='num';
		}
		
		//自定义字段处理
		
		$pid=$parentid;	
			if($pid!=0){
			while($pid!=0){
				$query = $this->db->query("select * from type where id='".$pid."'");
				$type=$query->row();
				$pid=$type->parentid;
				$tid=$type->id;
			}
			}else{$tid=$id;}
			
			$query = $this->db->query("select * from type_image where postid='".$tid."' order by type");
			$type_image=$query->result_array();
			
			foreach($type_image as $li){
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
        $this->db->update('type', $data);
	
        echo '<script language="javascript">location.href="'.base_url().'index.php/admin/classify/update_classify/'.$id.'";</script>'; 
        	
	}
	function remove($id){
		$this->load->helper('url');
		$query = $this->db->query("select * from type where id='".$id."'");
		$row=$query->row();

		
		$query = $this->db->query("select * from type_image where postid='".$id."' order by type");
		$type_image=$query->result_array();
		foreach($type_image as $li){
			if($li['type']==2 or $li['type']==3){
				unlink('uploads/'.$row->$li['fetch']);
			}
			
			$query = $this->db->query("select * from type_image where `fetch`='".$li['fetch']."'");	
		    $field=$query->num_rows();
			if($field == 1){
			    $query = $this->db->query("alter table type drop column ".$li['fetch']);
			}
			
			$this->db->where('id', $li['id']);
            $this->db->delete('type_image'); 
		}
		
		$query = $this->db->query("select * from type_meta where postid='".$id."' order by type");
		$type_meta=$query->result_array();
		foreach($type_meta as $li){
			if($li['type']==2 or $li['type']==3){
				unlink('uploads/'.$row->$li['fetch']);
			}
			
			$query = $this->db->query("select * from type_meta where `fetch`='".$li['fetch']."'");	
		    $field=$query->num_rows();
			if($field == 1){
			    $query = $this->db->query("alter table archive drop column ".$li['fetch']);
			}
			
			$this->db->where('id', $li['id']);
            $this->db->delete('type_meta'); 
		}
		
        
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
		
		foreach($parentidarr as $li){
		    $this->db->where('parentid', $li);
			$this->db->delete('archive');
			$this->db->where('id', $li);
            $this->db->delete('type'); 
		}
		
		echo '<script language="javascript">location.href="'.base_url().'index.php/admin/classify/";</script>'; 
        
	}
	
}
?>