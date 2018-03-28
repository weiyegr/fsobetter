<?php

class Statistics extends Model{


	function add(){
	    date_default_timezone_set( 'Asia/Shanghai');
	    $today=date("Y-m-d");
		  //获取当前IP
		  if(getenv("HTTP_CLIENT_IP")&&strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
			$ip =getenv("HTTP_CLIENT_IP");
		  else if (getenv("HTTP_X_FORWARDED_FOR")&&strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
			$ip =getenv("HTTP_X_FORWARDED_FOR");
		  else if (getenv("REMOTE_ADDR")&&strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
			$ip =getenv("REMOTE_ADDR");
		  else if (isset($_SERVER['REMOTE_ADDR'])&& $_SERVER['REMOTE_ADDR']&&strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
			$ip =$_SERVER['REMOTE_ADDR'];
		  else
			$ip ="unknown";
		
		$query=$this->db->query("select * from statistics where time='".$today."'");
		$todaynum=$query->num_rows();
		$todayrow=$query->row();
		if($todaynum==0){
		    $sql = "INSERT INTO statistics (time,pv,ip,iplist) 
        VALUES ('".$today."', '1', '1', '".$ip."')";
        $this->db->query($sql);
		}else{
		    $iplist=$todayrow->iplist;
		    $exist=preg_match("/{$ip}/",$iplist);
		    if($exist){
			    $id=$todayrow->id;
				$pv=$todayrow->pv;
				$pv=$pv+1;
				
				$data = array('pv' => $pv);
				$this->db->where('id', $id);
				$this->db->update('statistics', $data); 
			}else{
			    $id=$todayrow->id;
				$pv=$todayrow->pv;
				$pv=$pv+1;
				$ip=$todayrow->ip;
				$ip=$ip+1;
				$iplist=$todayrow->iplist;
				$iplist=$iplist.';'.$ip;
				
				
				$data = array('pv' => $pv, 'ip' => $ip, 'iplist' => $iplist);
				$this->db->where('id', $id);
				$this->db->update('statistics', $data);  
			}
		}
		
	}



}

?>