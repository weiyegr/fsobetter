<?php  
class Classify_list extends Model{
		function display_list($id,$level){
		$result=$this->db->query("select * from type where parentid='".$id."' order by num");
		$row = $result->result_array();
		
		$url = base_url().'system/application/views/admin/';
		$ii=0;
		foreach($row as $item){
		    
			if($item['type']==1){
			$query = $this->db->query("select * from archive where parentid='".$item['id']."'");
			$row = $query->last_row();
			$type_id="页面";$type_lb='<a href="'.base_url().'index.php/admin/home/update_carticle/'.$row->id.'" title="编辑文章"><img src="'.$url.'images/post_ico1.png" width="16" height="16" alt="编辑文章" /></a>';
			$type_lba=base_url().'index.php/admin/home/update_carticle/'.$row->id;
			}else{$type_id="分类";$type_lb='<a href="'.base_url().'index.php/admin/home/main/'.$item['id'].'" title="查看文章列表"><img src="'.$url.'images/post_ico.png" width="16" height="16" alt="查看文章列表" /></a>';
			$type_lba=base_url().'index.php/admin/home/main/'.$item['id'];
			}
			$parentid=$item['parentid'];	
			$topstatus=$item['status'];
			while($parentid!=0){
				$query = $this->db->query("select * from type where id='".$parentid."'");
				$type=$query->row();
				$parentid=$type->parentid;
				$topstatus=$type->status;
			}
			
			if($topstatus>$level and $item['type']==0){$display='<span style="margin-left:10px;color:red;font-weight:normal;">[<a style="color:red;font-weight:normal;" href="'.base_url().'index.php/admin/classify/classify_add/'.$item['id'].'">+</a>]</span>';}else{$display='';}
			
			if($item['type']==1){$type='<a href="'.base_url().'index.php/admin/home/update_carticle/'.$row->id.'" class="edit">编辑</a>';}elseif($item['status']==0){$type='<a href="'.base_url().'index.php/admin/home/main/'.$item['id'].'" title="查看" class="post"></a>';}else{$type='&nbsp;';}
			
			if(get_cookie('adminid')==1 or $topstatus>0 and $item['parentid']!=0 and $item['type']==0){$displayid="<a href=\"".base_url().'index.php/admin/classify/update_classify/'.$item['id']."\" title=\"编辑\" class=\"edit\"><img src=\"".$url."images/edit_ico.png\" alt=\"编辑栏目\" /></a> <a href=\"".base_url().'index.php/admin/classify/remove/'.$item['id']."\" onclick=\"return confirm('确认要删除?此操作不可恢复!如果此栏目下存在子栏目，请先将子栏目删除!');\" title=\"删除\" class=\"del\" ><img src=\"".$url."images/del_ico.png\" alt=\"删除栏目\" /</a>";
			}else{ $displayid=''; //不可编辑
			}
			$levela=$level+1;
			if($id==0){$diva='first';}else{$diva='next';}
			$resultnum=$this->db->query("select * from type where parentid='".$item['id']."'");
		    $nums = $resultnum->num_rows();
			
			if($nums==0){$jia='jian';}else{$jia='jia';}
			
			
			
			echo '<tr class="col_'.$levela.'">
    <td class="thetitle"><a class="'.$jia.' colicon"></a><a href="'.$type_lba.'" title="查看">'.$item['title'].'</a>'.$display.'</td>
    <td>'.$type_id.'</td>
    <td>'.$item['id'].'</td>
    <td><input name="categorynum" id="'.$item['id'].'" type="text" value="'.$item['num'].'" class="sort" /></td>
    
    <td class="editcol">'.$type_lb.$displayid.'</td>
  </tr>';
			
			$this->classify_list->display_list($item['id'],$level+1);
			
			
		}
	}
}""
?>