<?php
class MY_Upload extends CI_Upload{  
       function My_Upload(){
              parent::CI_Upload();
       }
       function do_upload_ex($field = 'userfile',$uploaddata,$Multi_file=false,$upload_path,$upload_path_thumb="/uploads/",$pro_thumb=false)
       {
              $CI =& get_instance();
              $imgname = array();
              $uploaddata1[$field] = $uploaddata;
              $_FILES = $uploaddata1;
              if($Multi_file)
              {
                     foreach ($_FILES[$field] as $key => $value){
                            foreach ($value as $key1 => $value1){
                                   $uploadfile["myfile".$key1][$key] =  $value1;
                                   //$aaa[]=$uploadfile["myfile".$key1][$key];
                                   //exit;
                            }
                     }
                     //print_r($uploadfile);
                     //echo count($uploadfile);
                     //exit;
                     //unset($uploadfile["myfile0"],$uploadfile["myfile".count($uploadfile)]);
                     //print_r($uploadfile);exit;
                     $_FILES = $uploadfile;
                     //echo $_FILES;exit;
                     //print_r($_FILES);exit;
              }
              $config['upload_path'] = '.'.$upload_path;
              $config['allowed_types'] = 'rar|zip|jpg|jpeg|gif|png';
              $config['max_size'] = '0';
              $config['max_width'] = '1024';
              $config['max_heigth'] = '768';
              $config['encrypt_name']='TRUE';
              $this->initialize($config);
              foreach($_FILES as $key => $value){
                     if( ! empty($key['name'])){
                            if(!$this->do_upload($key)){              
                                   $error = $this->display_errors();
                                   if($error=="<p>You did not select a file to upload.</p>"){
                                          return $imgname;
                                          }
                                   echo "<script language='JavaScript'>alert('???????????????');history.back();</script>";
                                   exit;
                            }else{
                                   $data['upload_data'] = $this->data();
                                   //print_r($data);exit;
                                   $imgname[] = $data['upload_data']['file_name'];
                                   if($pro_thumb){                          //????????
                                          $CI->load->library('image_lib');
                                          $config['image_library'] = 'gd2';
                                          $config['source_image'] = '.'.$upload_path.$imgname[0];
                                          $config['new_image'] = '.'.$upload_path_thumb.$imgname[0];
                                          $config['thumb_marker'] = '';
                                          $config['create_thumb'] = TRUE;
                                          $config['maintain_ratio'] = TRUE;
                                          $config['width'] = 125;
                                          $CI->image_lib->initialize($config);
                                          $CI->image_lib->resize();             //????????
                                   }
                            }
                     }
              }
              return $imgname;  
       }
}
?>  