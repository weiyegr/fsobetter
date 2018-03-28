<?php

class Classl extends Model{


//类目列表
	function listing($id,$li='li',$class='class',$li2on='li2on',$language,$type_id='',$img='0',$level=0){
                    //分类父ID，标签，CLASS，高亮ID名，语言，显示页面，显示图片，（不用理）
        
        if($type_id==1){$ctgpe_id=' type=0 and';}else{$ctgpe_id='';}
		$result=$this->db->query("select * from type where".$type_id." parentid='".$id."'");

		$row = $result->result_array();

		foreach($row as $item){

			if($level==0){$imgl=0;}else{$imgl=1;}

			$url = base_url().'system/application/views/'; 

			$bing=str_repeat($url.$img,$imgl);

			if($img=='0'){$bing1='';}else{$bing1='<img src="'.$bing.'">  ';}

		    $query=$this->db->query("select * from changgui where id=1");
		    $row=$query->row();

		    if($row->rewrite == 1){
			   $urlc=$this->classl->flpage($item['short']);

		    }else{
               if($item['type_id']==1){
			       $urlc=$this->classl->flpage($item['short']);
               }else{
                   $urlc=$this->classl->xxpage($item['short']);
               }
		    }

			if($li2on==$item['short']){$classid='li2on';}else{$classid='';}


			echo "<".$li." id=\"".$classid."\" class=\"".$class."\">".str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$level).$bing1."<a href=\"".$urlc.'">'.$item['title'].'</a></'.$li.'>';

			$this->classl->listing($item['id'],$li,$class,$li2on,$language,$type_id,$img,$level+1);

		}

	}

//类目列表（数组）
	function listingarr($id,$level=0){
                    //分类父ID，标签，CLASS，高亮ID名，语言，显示页面，显示图片，（不用理）
        
        
		$result=$this->db->query("select * from type where parentid='".$id."'");

		$row = $result->result_array();
		$iii=0;
		$lg=array();

		foreach($row as $item){
		    $query=$this->db->query("select * from changgui where id=1");
		    $row=$query->row();

		    if($row->rewrite == 1){
			   $urlc=$this->classl->flpagea($item['short']);

		    }else{
               if($item['type']==0){
			       $urlc=$this->classl->flpagea($item['short']);
               }else{
                   $urlc=$this->classl->xxpagea($item['short']);
               }
		    }
			
            $parentid=$id;	
			
			while($parentid!=0){
				$query = $this->db->query("select * from type where id='".$parentid."'");
				$type=$query->row();
				$parentid=$type->parentid;
				$pid=$type->id;
			}
			
			$query = $this->db->query("select * from type_image where postid='".$pid."'");
			$type_image=$query->result_array();
			
			foreach($type_image as $li){
			    $lg[$iii][$li['fetch']]=$item[$li['fetch']];
			}
			
			$lg[$iii]['id']=$item['id'];
			$lg[$iii]['title']=$item['title'];
			$lg[$iii]['short']=$item['short'];
			$lg[$iii]['url']=$urlc;
			
			$iii++;

			$this->classl->listingarr($item['id'],$level+1);

		}
            return $lg;
	}

//列表中第一篇文章详细
    function archive($parentid){ // echo $this->classl->archive(缩略名)->字段名;

	    $query = $this->db->query("select * from archive where parentid='".$parentid."' order by id limit 1");
		$row=$query->row();
        return $row;

	}
    
//文章详细
    function row($short){ // echo $this->classl->row(缩略名)->字段名;

	    $query = $this->db->query("select * from archive where short='".$short."'");
		$row=$query->row();
        return $row;

	}


//文章列表
	function li($limit = 5,$parentid=11,$grade=1,$hits='close'){

	    if($hits=='open'){$hit='hits DESC,';}else if($hits=='close'){$hit='';}
        $parentidarr=array($parentid);
		$rows=1;
		while($rows!=0 or $grade==0){
		    $parentidlist=implode(",",$parentidarr);
			$query = $this->db->query("select * from type where parentid in(".$parentidlist.") and id not in (".$parentidlist.")");
			$rows=$query->num_rows();
			if($rows!=0){
				$row=$query->result_array();
				foreach($row as $li){
					$parentidarr[]=$li['id'];
				}
			}
			
			$grade--;
			
		}
		$parentidlist=implode(",",$parentidarr);
		$query=$this->db->query("select * from archive where parentid in(".$parentidlist.") order by ".$hit."num ASC,id ASC limit 0,$limit");
        $lg=$query->result_array();
		return $lg;

	}

//头部列表
	function menu($on=''){

		$query=$this->db->query("select * from headlink where parentid='0'");
        $listing=$query->result_array();
		echo '<ul class="navul">';
        foreach($listing as $li){
            if($on==$li['ontype']){ $ontype='id="on"';}else{$ontype='';}

        	echo '<li '.$ontype.' id="'.$li['link_id'].'" class="'.$li['link_class'].'"><a href="'.$li['link_url'].'" target="'.$li['link_type'].'">'.$li['link_title'].'</a></li>';

            $queryb=$this->db->query("select * from headlink where parentid='".$li['item_id']."'");
            $listingb=$queryb->result_array();
            foreach($listingb as $lib){
            if($on==$lib['ontype']){ $ontype='on';}else{$ontype='';}
        	    echo '<ul><li><li id="'.$lib['link_id'].'" class="'.$lib['link_class']." ".$ontype.'"><a href="'.$lib['link_url'].'" target="'.$lib['link_type'].'">'.$lib['link_title'].'</a></li>';
                    $queryc=$this->db->query("select * from headlink where parentid='".$lib['item_id']."'");
                    $listingc=$queryc->result_array();
                    foreach($listingc as $lic){
                    if($on==$lic['ontype']){ $ontype='on';}else{$ontype='';}
        	            echo '<ul><li><li id="'.$lic['link_id'].'" class="'.$lic['link_class']." ".$ontype.'"><a href="'.$lic['link_url'].'" target="'.$lic['link_type'].'">'.$lic['link_title'].'</a></li></ul>';

                    }
        	    echo '</ul>';
            }


        }	echo '</ul>';

	}

//字符截取
function len($str,$len) {//$str是指字符串，$len指字符串长度 
    
    $str=strip_tags($str);
    for($i=0;$i<$len;$i++)
{
$temp_str=substr($str,0,1);
if(ord($temp_str) > 127)
{
$i++;
if($i<$len)
{
$new_str[]=substr($str,0,3);
$str=substr($str,3);
}
}
else
{
$new_str[]=substr($str,0,1);
$str=substr($str,1);
}
}
return join($new_str);
}

//首页FLASH插件(头部连接)
function focus_link() {
    $url=base_url().'system/application/views/admin/';
    $query = $this->db->query("select * from focus where id = '1'");
		$post=$query->row();
        $idname=$post->idname;
        $pattern=$post->pattern;
        $time=$post->time;
        $trigger=$post->trigger;
        $width=$post->width;
        $height=$post->height;
    echo '<script src="'.$url.'js/myfocus-1.1.0.min.js" type="text/javascript"></script>
<script src="'.$url.'js/'.$pattern.'.js" type="text/javascript"></script>
<link href="'.$url.'css/'.$pattern.'.css" rel="stylesheet" />
<script type="text/javascript">

myFocus.set({

	id:\''.$idname.'\',

	pattern:\''.$pattern.'\',

	time:'.$time.',

	trigger:\''.$trigger.'\',

	width:'.$width.',

	height:'.$height.'

});

</script>';
}

//首页FLASH插件(主要块)
function focus_content() {
    $query = $this->db->query("select * from focus where id = '1'");
		$post=$query->row();
        $idname=$post->idname;
        $focuscontent='';
        $query = $this->db->query("select * from focus_list order by num");
		foreach($query->result_array() as $item){
		  $focuscontent=$focuscontent.'<li><a href="'.$item['link'].'"><img src="'.base_url().'photo/'.$item['image'].'" thumb="" alt="'.$item['title'].'" text="'.$item['describe'].'" /></a></li>';
		}
    echo '<div id="'.$idname.'"><!--焦点图盒子-->

  <div class="loading"><span>请稍候...</span></div><!--载入画面(可删除)-->

  <ul class="pic"><!--内容列表-->

        '.$focuscontent.'
  </ul>

</div>';
}

//类目详细
function typeid($short){
    $query=$this->db->query("select * from type where short='".$short."'");
	$row=$query->row();
	return $row;
}

//父类详细
function parentid($id){
                    
        
        
		$result=$this->db->query("select id from type where parentid='".$id."'");

		$row = $result->result_array();
        
        foreach($row as $item){
            $newa[]=$item['id'];
        }
        
        $new=implode(",",$newa);
        if($new==''){
            $new=$id;
        }
        return $new;

	}

//上传图片（返回文件名）
function doupload($imgpath,$width="",$height=""){
		$filestate='';
		if($width=="" and $height==""){
			$name=$imgpath["name"];
			$tmp_name=$imgpath["tmp_name"];
			$type=$imgpath["type"];
			$size=$imgpath["size"];
			$uploadfile = time()."_".$imgpath['name'];
			  
			$filestate='';
			// if($type!="image/pjpeg" && $type!="image/jpeg" && $type!="image/gif")//文件类型不在指定范围
			// {
				// $filestate='';
			// }else{
			
				if(move_uploaded_file($tmp_name,"uploads/".$uploadfile))
					$filestate=$uploadfile;
				else if (copy($tmp_name,$uploadfile))
					$filestate=$uploadfile;
			// }
		}else{
		    $imagefile=$imgpath;
			$width1=$width;
			$height1=$height;
			// The file
			$filename = 'uploads/'.$imagefile;
			if($width1=='*'){$width2=0;}else{$width2=$width1;}
			if($height1=='*'){$height2=0;}else{$height2=$height1;}
			$newfilename = 'uploads/'.$width2.'.'.$height2.'.'.$imagefile;
			// Content type
			//header('Content-type: image/jpeg');
			// Get new dimensions
			$file = fopen($filename, "rb"); 
			$bin = fread($file, 2); //只读2字节 
			fclose($file); 
			$strInfo = @unpack("C2chars", $bin); 
			$type = intval($strInfo['chars1'].$strInfo['chars2']); 
			list($width, $height) = getimagesize($filename);
			if($width1!='*' and $height1!='*'){
				if($width>=$width1 || $height>=$height1)
				{
					if(($width/$width1) >= ($height/$height1)){
						$new_width = $width1;
						$new_height = $height/($width/$width1);
					}else{
						$new_width = $width/($height/$height1);
						$new_height = $height1;
					}
				}else{
					$new_width = $width;
					$new_height = $height;
				}
			}else if($width1!='*' and $height1=='*'){
			    if($width>=$width1)
				{
						$new_width = $width1;
						$new_height = $height/($width/$width1);
				}else{
					$new_width = $width;
					$new_height = $height;
				}
			}else if($width1=='*' and $height1!='*'){
			    if($height>=$height1)
				{
						$new_height = $height1;
						$new_width = $width/($height/$height1);
				}else{
					$new_height = $height;
					$new_width = $width;
				}
			}
			
			
			if($width1!='*'){if($width1 > $new_width){$left=($width1-$new_width)/2;}else{$left=0;}}else{$left=0;}
			if($height1!='*'){if($height1 > $new_height){$top=($height1-$new_height)/2;}else{$top=0;}}else{$top=0;}
			//以原图片的长宽的0.5为新的长宽来创建新的图片此图片的标志为$image_p
			//$image_p = imagecreatetruecolor($width1, $height1);
			if($width1=='*'){$width3=$new_width;}else{$width3=$width1;}
			if($height1=='*'){$height3=$new_height;}else{$height3=$height1;}
			$image_p = imagecreatetruecolor($width3, $height3);
			$background = imagecolorallocate($image_p,255,255,255);   
			imagefill($image_p,0,0,$background);
			switch($type) 
			{ 
			case 255216: 
			
			$image = imagecreatefromjpeg($filename); 
			imagecopyresampled($image_p, $image, $left, $top, 0, 0, $new_width, $new_height, $width, $height);
			imagejpeg($image_p,$newfilename,100); 
			break; 
			case 13780: 
			$image = imagecreatefrompng($filename); 

			imagecopyresampled($image_p, $image, $left, $top, 0, 0, $new_width, $new_height, $width, $height);
			imagepng($image_p,$newfilename); 
			break; 
			case 7173: 

			$image = imagecreatefromgif($filename); 
			imagecopyresampled($image_p, $image, $left, $top, 0, 0, $new_width, $new_height, $width, $height);
			imagegif($image_p,$newfilename,100); 
			break; 
			default : 
			die("不支持此文件类型"); 
			exit; 
			}
						
			imagedestroy($image_p);
		}
	    return $filestate;
    }

//基本设置
function setting($fetch=''){
		$query = $this->db->query("select * from setting where id='1'");
		$row=$query->row();
	    echo $row->$fetch;
    }

//友情连接
function url(){
		$query = $this->db->query("select * from link");
		$url=$query->result_array();
	    return $url;
    }
	
//留言列表
function message(){
		$query = $this->db->query("select * from message order by id desc");
		$message=$query->result_array();
	    return $message;
    }
	
//会员详细
function member($uid=''){
		$query = $this->db->query("select * from member where uid='".$uid."'");
		$row=$query->row();
	    return $row;
    }
	
//图片库
function imagelist($postid=''){
		$query = $this->db->query("select * from image_list where postid='".$postid."'");
		$imagelist=$query->result_array();
	    return $imagelist;
    }
	
//发邮件
function smail($subject,$message){
		    $this->load->library('email');
			$query = $this->db->query("select * from changgui where id=1");
            $xs=$query->row();
			$host = $xs->host;//smtp地址
			$user = $xs->user;//用户名
			$pass = $xs->pass;//密码
			$hmail = $xs->hmail;//smtp地址
			$email = $xs->email;//smtp地址
			if($host!='' and $user!='' and $pass!='' and $hmail!='')
			{
				$config['smtp_host'] = $host;
				$config['smtp_user'] = $user;
				$config['smtp_pass'] = $pass;
				$this->email->initialize($config);
				$this->email->from($hmail, $user);
			}
			else
			{
			    $this->email->from('cms8du@126.com', 'cms8du');
			}
			
			$this->email->to($email);
			
			$this->email->subject($subject);
			$this->email->message($message); 
			
			$this->email->send();
    }
	
	
//文章内页上一篇或下一篇
function pordpage($parentid,$postid){
        $query=$this->db->query("select * from archive where id<'".$postid."' and parentid='".$parentid."' order by id desc limit 1");
		$ppage=$query->row();
		$query=$this->db->query("select * from archive where id>'".$postid."' and parentid='".$parentid."' order by id asc limit 1");
		$dpage=$query->row();
		if($ppage->title!=''){echo '上一篇：<a href="'.base_url().'index.php/category/post/'.$ppage->short.'">'.$ppage->title.'</a><br><br>';};
		if($dpage->title!=''){echo '下一篇：<a href="'.base_url().'index.php/category/post/'.$dpage->short.'">'.$dpage->title.'</a>';};
    }
	
	
//首页地址
function home(){
        $query = $this->db->query("select * from changgui where id=1");
        $row=$query->row();
		if($row->rewrite==0){echo base_url();}else{echo base_url().'index.htm';}
    }

//分类页地址
function flpage($short){
        $query = $this->db->query("select * from changgui where id=1");
        $row=$query->row();
		if($row->rewrite==0){echo base_url().'index.php/category/index/'.$short;}else{echo base_url().'category/'.$short.'.htm';}
    }
	
//详细页地址
function xxpage($short){
        $query = $this->db->query("select * from changgui where id=1");
        $row=$query->row();
		if($row->rewrite==0){echo base_url().'index.php/category/post/'.$short;}else{echo base_url().'article/'.$short.'.htm';}
    }
	
//分类页地址
function flpagea($short){
        $query = $this->db->query("select * from changgui where id=1");
        $row=$query->row();
		if($row->rewrite==0){$flin=base_url().'index.php/category/index/'.$short;}else{$flin=base_url().'category/'.$short.'.htm';}
		return $flin;
    }
	
//详细页地址
function xxpagea($short){
        $query = $this->db->query("select * from changgui where id=1");
        $row=$query->row();
		if($row->rewrite==0){$flin=base_url().'index.php/category/post/'.$short;}else{$flin=base_url().'article/'.$short.'.htm';}
		return $flin;
    }
	
//自定义页地址
function zdypage($short){
        $query = $this->db->query("select * from changgui where id=1");
        $row=$query->row();
		if($row->rewrite==0){echo base_url().'index.php/home/post/'.$short;}else{echo base_url().'page/'.$short.'.htm';}
    }
	
//表单页地址
function bdpage(){
        $query = $this->db->query("select * from changgui where id=1");
        $row=$query->row();
		if($row->rewrite==0){echo base_url().'index.php/guest_book';}else{echo base_url().'guest_book.htm';}
    }
	
//网站title,keywords,description  $this->classl->webtitle($archive->short);
function webtitle($short=''){
        if($short==''){
		$query = $this->db->query("select * from changgui where id=1");
        $row=$query->row();
		echo '<title>'.$row->weititle.'</title>
		      <meta name="keywords" content="'.$row->keywords.'" />
		      <meta name="description" content="'.$row->description.'"/>';
		}else{
		$rowa=$this->classl->row($short);
        echo '<title>'.$rowa->title.'</title>
		      <meta name="keywords" content="'.$rowa->keywords.'" />
		      <meta name="description" content="'.$rowa->description.'"/>';
		}
    }

}

?>