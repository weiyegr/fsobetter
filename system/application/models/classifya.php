<?php 
class Classifya extends Model{
	function displaya($id,$level){
		$result=$this->db->query("select * from type where type_id=1 and parentid='".$id."'");
		$row = $result->result_array();
		foreach($row as $item){
			if($item['displayid']==1){$displayid=" class=readOnly";}
			echo '<option value='.$item['id'].$displayid.'>'.str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$level).$item['p_title'].'</option>';
			$this->classifya->displaya($item['id'],$level+1);
			
		}
	}
	

}
?>