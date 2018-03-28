<?php
class Mcategory extends Controller{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');


    }
    function index($short='',$searchtxt='0',$offset=0){
        //缩略名，语言，继承分类文件名（默认1为开启）
        //关闭后文件名为缩略名+cf
        //基本设置
        $this->statistics->add();
        $query=$this->db->query("select * from type where short='".$short."'");
        $row=$query->row();
        $id=$row->id;
        $parentid=$id;
        $on=array();

        while($parentid!=0){
            $query=$this->db->query("select * from type where id='".$parentid."'");
            $row=$query->row();
            $parentid=$row->parentid;
            $on[$row->short]=$row->title;
        }



        $data['on']=$on;

        //产品列表
        if($this->input->post('searchtxt')!=''){$searchtxt=$this->input->post('searchtxt');}
        if($this->input->post('searchtxt')=='输入关键字...'){$searchtxt='';}
        if($searchtxt=='0'){$searchtxt='';}
        $data['offset']=$offset;
        $limit = 80;
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
        $data['posts']=$query->result_array();
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
        $config['uri_segment'] = 5;
        $config['base_url'] = base_url().'index.php/category/index/'.$short.'/'.$searchtxt.'/';
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;


        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();



        $query=$this->db->query("select * from changgui where id=1");
        $row=$query->row();

        if($row->rewrite == 1){
            $data['urla']=base_url().$short.'/';
            $data['urli']=base_url();
            $data['urlp']=base_url().'pages/';
        }else{
            $data['urla']=base_url().'index.php/category/post/'.$short.'/';
            $data['urli']=base_url().'index.php/';
            $data['urlp']=base_url().'index.php/pages/index/';
        }

        $data['url'] = base_url().'system/application/views/';
        $parentid=$id;

        while($parentid!=0){
            $query = $this->db->query("select * from type where id='".$parentid."'");
            $type=$query->row();
            $parentid=$type->parentid;
            $pshort=$type->viewhtml;
        }


        $this->load->view("m_products",$data);

    }

    function search($short='',$searchtxt='0',$offset=0){
        //缩略名，语言，继承分类文件名（默认1为开启）
        //关闭后文件名为缩略名+cf
        //基本设置
        $this->statistics->add();
        $query=$this->db->query("select * from type where short='".$short."'");
        $row=$query->row();
        $id=$row->id;
        $parentid=$id;
        $on=array();

        while($parentid!=0){
            $query=$this->db->query("select * from type where id='".$parentid."'");
            $row=$query->row();
            $parentid=$row->parentid;
            $on[$row->short]=$row->title;
        }



        $data['on']=$on;

        //产品列表
        if($this->input->post('searchtxt')!=''){$searchtxt=$this->input->post('searchtxt');}
        if($this->input->post('searchtxt')=='输入关键字...'){$searchtxt='';}
        if($searchtxt=='0'){$searchtxt='';}
        $data['offset']=$offset;
        $limit = 80;
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
        $data['posts']=$query->result_array();
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
        $config['uri_segment'] = 5;
        $config['base_url'] = base_url().'index.php/category/index/'.$short.'/'.$searchtxt.'/';
        $config['total_rows'] = $total;
        $config['per_page'] = $limit;


        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();



        $query=$this->db->query("select * from changgui where id=1");
        $row=$query->row();

        if($row->rewrite == 1){
            $data['urla']=base_url().$short.'/';
            $data['urli']=base_url();
            $data['urlp']=base_url().'pages/';
        }else{
            $data['urla']=base_url().'index.php/category/post/'.$short.'/';
            $data['urli']=base_url().'index.php/';
            $data['urlp']=base_url().'index.php/pages/index/';
        }

        $data['url'] = base_url().'system/application/views/';
        $parentid=$id;

        while($parentid!=0){
            $query = $this->db->query("select * from type where id='".$parentid."'");
            $type=$query->row();
            $parentid=$type->parentid;
            $pshort=$type->viewhtml;
        }


        $this->load->view('Products_search',$data);

    }

    function detail($short){
        $this->statistics->add();
        $row=$this->classl->row($short);
        $parentid=$row->parentid;
        $title=$row->title;
        $on=array();

        while($parentid!=0){
            $query=$this->db->query("select * from type where id='".$parentid."'");
            $row=$query->row();
            $parentid=$row->parentid;
            $on[$row->short]=$row->title;
        }
        $on[$short]=$title;
        $data['on']=$on;

        //产品详细
        $archive=$this->classl->row($short);
        $data['archive']=$archive;


        $query=$this->db->query("select * from changgui where id=1");
        $row=$query->row();

        if($row->rewrite == 1){
            $data['urli']=base_url();
            $data['urlp']=base_url().'pages/';
        }else{
            $data['urli']=base_url().'index.php/';
            $data['urlp']=base_url().'index.php/pages/index/';
        }

        $data['url'] = base_url().'system/application/views/';

        $parentid=$archive->parentid;
        while($parentid!=0){
            $query = $this->db->query("select * from type where id='".$parentid."'");
            $type=$query->row();
            $parentid=$type->parentid;
            $pshort=$type->viewhtml;
        }

        $this->load->view('m_product_detail',$data);
    }


    function post($short){
        $this->statistics->add();
        $row=$this->classl->row($short);
        $parentid=$row->parentid;
        $title=$row->title;
        $on=array();

        while($parentid!=0){
            $query=$this->db->query("select * from type where id='".$parentid."'");
            $row=$query->row();
            $parentid=$row->parentid;
            $on[$row->short]=$row->title;
        }
        $on[$short]=$title;
        $data['on']=$on;

        //产品详细
        $archive=$this->classl->row($short);
        $data['archive']=$archive;


        $query=$this->db->query("select * from changgui where id=1");
        $row=$query->row();

        if($row->rewrite == 1){
            $data['urli']=base_url();
            $data['urlp']=base_url().'pages/';
        }else{
            $data['urli']=base_url().'index.php/';
            $data['urlp']=base_url().'index.php/pages/index/';
        }

        $data['url'] = base_url().'system/application/views/';

        $parentid=$archive->parentid;
        while($parentid!=0){
            $query = $this->db->query("select * from type where id='".$parentid."'");
            $type=$query->row();
            $parentid=$type->parentid;
            $pshort=$type->viewhtml;
        }

        $this->load->view('m_about',$data);
    }

    function post2($short){
        $this->statistics->add();
        $row=$this->classl->row($short);
        $parentid=$row->parentid;
        $title=$row->title;
        $on=array();

        while($parentid!=0){
            $query=$this->db->query("select * from type where id='".$parentid."'");
            $row=$query->row();
            $parentid=$row->parentid;
            $on[$row->short]=$row->title;
        }
        $on[$short]=$title;
        $data['on']=$on;

        //产品详细
        $archive=$this->classl->row($short);
        $data['archive']=$archive;


        $query=$this->db->query("select * from changgui where id=1");
        $row=$query->row();

        if($row->rewrite == 1){
            $data['urli']=base_url();
            $data['urlp']=base_url().'pages/';
        }else{
            $data['urli']=base_url().'index.php/';
            $data['urlp']=base_url().'index.php/pages/index/';
        }

        $data['url'] = base_url().'system/application/views/';

        $parentid=$archive->parentid;
        while($parentid!=0){
            $query = $this->db->query("select * from type where id='".$parentid."'");
            $type=$query->row();
            $parentid=$type->parentid;
            $pshort=$type->viewhtml;
        }

        $this->load->view('m_contact',$data);
    }

}
?>