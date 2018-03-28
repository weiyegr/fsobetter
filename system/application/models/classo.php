<?php 
class Classo extends Model{
	function option($id,$img='',$level=0){
		$result=$this->db->query("select * from type where type_id=1 and parentid='".$id."'");
		$row = $result->result_array();
		foreach($row as $item){
			if($item['displayid']==0){$displayid=" class=readOnly";}
			if($level==0){$imgl=0;}else{$imgl=1;}
			echo '<option value='.$item['id'].$displayid.'>'.str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$level).str_repeat($img,$imgl).$item['p_title'].'</option>';
			$this->classo->option($item['id'],$img,$level+1);
			
		}
	}
	

}
?>