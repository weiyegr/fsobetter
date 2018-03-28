<?php 
class Classify extends Model{
	function display($id,$level){
		$result=$this->db->query("select * from type where type=0 and parentid='".$id."'");
		$row = $result->result_array();
		foreach($row as $item){
			echo '<option value='.$item['id'].'>'.str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$level).$item['title'].'</option>';
			$this->classify->display($item['id'],$level+1);
			
		}
	}
	

}
?>