<div class="nav">
    <div class="top">
     <div class="bottom">
      <div class="navcontent">
	  <?php $query = $this->db->query("select * from changgui where id=1");
      $row=$query->row();
            $query1=$this->db->query("select * from message where isread='0'");
		$row1=$query1->num_rows();
		if($row1!=0){$num="<font color='red'>($row1)</font>";}else{$num='';}
		    $query1=$this->db->query("select * from myorder where isread='0' and parentid='0'");
		$row1=$query1->num_rows();
		if($row1!=0){$num1="<font color='red'>($row1)</font>";}else{$num1='';}
	  ?>
       <ul>
        <li class="first"><a <?php if($classa==-1): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/home/" onclick="clicked(this.id)"><span class="home"></span>管理首页</a></li>
        
        <li class="first"><a <?php if($classa==2): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/classify" onclick="clicked(this.id)"><span class="list"></span>栏目管理</a></li>
		
        <?php if($row->focusor==1){ ?><li class="first"><a <?php if($classa==10): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/focus" onclick="clicked(this.id)"><span class="guest"></span>焦点视图</a></li><?php } ?>
        
        <?php if($row->messageor==1){ ?><li class="first"><a <?php if($classa==3): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/message" onclick="clicked(this.id)"><span class="guest"></span>留言管理<?php echo $num; ?></a></li><?php } ?>
		
        <?php if($row->linkor==1){ ?><li class="first"><a <?php if($classa==4): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/url" onclick="clicked(this.id)"><span class="link"></span>友情链接</a></li><?php } ?>
		
        <?php if($row->baseor==1){ ?><li class="first"><a <?php if($classa==5): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/setting" onclick="clicked(this.id)"><span class="setinfo"></span>设置信息</a></li><?php } ?>
		
        <?php if(get_cookie('adminid')==1){ ?><li class="first"><a <?php if($classa==7): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/system" onclick="clicked(this.id)"><span class="club"></span>系统设置</a></li><?php } ?>
		
		<?php if($row->memberor==1){ ?><li class="first"><a <?php if($classa==8): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/member" onclick="clicked(this.id)"><span class="admin"></span>会员管理</a></li><?php } ?>
		
		<?php if($row->orderor==1){ ?><li class="first"><a <?php if($classa==9): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/order" onclick="clicked(this.id)"><span class="admin"></span>订单管理<?php echo $num1; ?></a></li><?php } ?>
		
        <?php if(get_cookie('adid')==1){ ?><li class="first"><a <?php if($classa==6): ?>class="cc"<?php endif; ?> href="<?php echo base_url(); ?>index.php/admin/admin" onclick="clicked(this.id)"><span class="admin"></span>管理帐号</a></li><?php } ?>
		
		<li class="first"><form name="form1" target="_blank" action="http://new.cnzz.com/v1/login.php?t=login&amp;siteid=<?php echo $row->tongji; ?>" method="post"><input name="password" type="hidden" value="211206"><span class="admin"></span><a style="cursor:pointer;" onclick="submit();">流量统计</a></form></li>
		
		
		
		
		
        
       </ul>
      </div>
     </div>
    </div>
   </div>