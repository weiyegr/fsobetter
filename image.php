<?php
$imagefile=$_GET['file'];
$width1=$_GET['width'];
$height1=$_GET['height'];
// The file
$filename = 'uploads/'.$imagefile;
// Content type
//header('Content-type: image/jpeg');
// Get new dimensions
$file = fopen($filename, "rb"); 
$bin = fread($file, 2); //ֻ��2�ֽ� 
fclose($file); 
$strInfo = @unpack("C2chars", $bin); 
$type = intval($strInfo['chars1'].$strInfo['chars2']); 
list($width, $height) = getimagesize($filename);
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
if($width1 > $new_width){$left=($width1-$new_width)/2;}else{$left=0;}
if($height1 > $new_height){$top=($height1-$new_height)/2;}else{$top=0;}
//��ԭͼƬ�ĳ����0.5Ϊ�µĳ����������µ�ͼƬ��ͼƬ�ı�־Ϊ$image_p
//$image_p = imagecreatetruecolor($width1, $height1);
$image_p = imagecreatetruecolor($width1, $height1);
$background = imagecolorallocate($image_p,255,255,255);   
imagefill($image_p,0,0,$background);


//�� JPEG�ļ���URL�½�һͼ��
switch($type) 
{ 
case 255216: 
header('Content-type: image/jpeg');
$image = imagecreatefromjpeg($filename); 
imagecopyresampled($image_p, $image, $left, $top, 0, 0, $new_width, $new_height, $width, $height);
imagejpeg($image_p,null,100); 
break; 
case 13780: 
$image = imagecreatefrompng($filename); 
header('Content-Type: image/png');
imagecopyresampled($image_p, $image, $left, $top, 0, 0, $new_width, $new_height, $width, $height);
imagepng($image_p); 
break; 
case 7173: 
header('Content-type: image/gif');
$image = imagecreatefromgif($filename); 
imagecopyresampled($image_p, $image, $left, $top, 0, 0, $new_width, $new_height, $width, $height);
imagegif($image_p,null,100); 
break; 
default : 
die("��֧�ִ��ļ�����"); 
exit; 
} 
imagedestroy($image_p);
?>