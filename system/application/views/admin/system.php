<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/reset.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>css/main.css"/>
<script type="text/javascript" src="<?php echo $url; ?>js/jquery-1.4.2.min.js"></script>
<!--[if IE 6]>
    <script type="text/javascript" src="<?php echo $url; ?>js/DD_png-min.js"></script>
	<script type="text/javascript">
	DD_belatedPNG.fix('.nav,.txt,.main,.close,.main_bottom,.main_title,img');
	</script>
<![endif]-->
<title>系统设置</title>
</head>

<body>
 <div id="container">
 <!--标题-->
  <?php $this->load->view('admin/header'); ?>
  <!--内容-->
  <div id="content" class="clearfix">
  <!--导航条-->
   <?php $this->load->view('admin/left'); ?>
   <!--右边-->
   <div class="contetn_right">
    <div class="main">
     <div id="TabbedPanels1" class="TabbedPanels">
       <ul class="TabbedPanelsTabGroup">
        <li class="TabbedPanelsTab firstTab TabbedPanelsTabSelected" tabindex="0"><div class="left"><div class="right">系统设置</div></div></li>
       </ul>
      <div class="TabbedPanelsContentGroup">
        <div class="TabbedPanelsContent">
        <!--添加文章-->
         <div class="tab_content">
          <div class="topcontent clearfix">
          <!--文章标题-->
		 <script language="javascript">
		var ida=0;
		var idb=0;
		var idc=0;
		var idd=0;
		ida=ida+1;	
		idb=idb+1;
		idc='linkaddb'+idb;
		idd='#linkaddb'+idb;
        </script>
        <div id="main" >
            <div class="main-content system-content">
                
                <form class="setting" method="post" action="<?php echo base_url(); ?>index.php/admin/system/system_pro">
				    
					<?php if(get_cookie('adminid')==1){ ?>
					<div class="system-hr">
					<h3>显示设置:</h3>
					<p>
                    <input name="message" type="checkbox" value="1" <?php if($xs->messageor==1){ ?>checked="checked"<?php } ?> /> 客户留言&nbsp;<input name="link" type="checkbox" value="1"  <?php if($xs->linkor==1){ ?>checked="checked"<?php } ?>/> 友情链接&nbsp;<input name="focus" type="checkbox" value="1"  <?php if($xs->focusor==1){ ?>checked="checked"<?php } ?>/> 焦点视图&nbsp;<input name="member" type="checkbox" value="1"  <?php if($xs->memberor==1){ ?>checked="checked"<?php } ?>/> 会员管理&nbsp;<input name="order" type="checkbox" value="1"  <?php if($xs->orderor==1){ ?>checked="checked"<?php } ?>/> 订单管理&nbsp;<input name="setting" type="checkbox" value="1"  <?php if($xs->baseor==1){ ?>checked="checked"<?php } ?>/> 基本设置&nbsp;<input name="rewrite" type="checkbox" value="1"  <?php if($xs->rewrite==1){ ?>checked="checked"<?php } ?>/>伪静态
                    &nbsp;<input name="pmessage" type="checkbox" value="1"  <?php if($xs->pmessageor==1){ ?>checked="checked"<?php } ?>/> 手机短信&nbsp;<input name="email" type="checkbox" value="1"  <?php if($xs->emailor==1){ ?>checked="checked"<?php } ?>/> 邮件接收					
                    </p>
					</div>
					
					<div class="system-hr">
					<h3>流量统计:</h3>
					<div id="kuozhangdyy">
					<?php foreach($langu as $item){ ?>
					<p>
						<input name='tongji' type='text' value='<?php echo $xs->tongji; ?>'>
						
					</p>
					<?php } ?>
                    </div>
					
					</div>
					
					
					<div class="system-hr">
					<h3>多语言设置:<span>(<a id="dyyadd">增加</a>)</span></h3>
					<div id="kuozhangdyy">
					<?php foreach($langu as $item){ ?>
					<p>
						<input name='language[<?php echo $item['id']; ?>][title]' type='text' value='<?php echo $item['language']; ?>'>
						<input name='language[<?php echo $item['id']; ?>][shot]' type='text' value='<?php echo $item['keyword']; ?>'>&nbsp;&nbsp;
						<a class='aa'>[<span class='a'>&nbsp;-&nbsp;</span>]</a>
					<script language="javascript">
					$("document").ready(function(){
					    $(function(){
					    $(".a").click(function(){
					    $(this).parent().parent().remove();})
					    })
					})
	                </script>
					</p>
					<?php } ?>
                    </div>
					
					</div>
					
					<div class="system-hr">
					<h3>导航条:<span>(<a id="linkadd">增加①级菜单</a>)</span></h3>
					<div id="kuozhang" class="gaohang">
					<?php foreach($slist as $li){ ?>
					          <p style='color:#000;'>①级标签：<input type='text' style='width:60px;' name='systeml[<?php echo $li['id'] ?>][title]' size='30' value="<?php echo $li['link_title'] ?>" />&nbsp;链接：<input type='text' style='width:60px;' name='systeml[<?php echo $li['id'] ?>][address]' size='30' value="<?php echo $li['link_url'] ?>" />&nbsp;ID：<input type='text' style='width:30px;' name='systeml[<?php echo $li['id'] ?>][title_id]' size='30' value="<?php echo $li['link_id'] ?>" />&nbsp;class：<input type='text' style='width:30px;' name='systeml[<?php echo $li['id'] ?>][titleclass]' size='30' value="<?php echo $li['link_class'] ?>" />&nbsp;<select style="width:60px;" name='systeml[<?php echo $li['id'] ?>][titletype]'><option value='<?php echo $li['link_type'] ?>'><?php if($li['link_type']=='_blank'){echo '新窗口';}else{echo '本窗口';} ?></option><option value='_blank'>新窗口</option><option value='_self'>本窗口</option></select>&nbsp;<select style="width:60px;" name='systeml[<?php echo $li['id'] ?>][ontype]'><option value='<?php echo $li['ontype'] ?>'><?php echo $li['ontype']; ?></option><option value='首页'>首页</option><option value='客户留言'>客户留言</option><option value='友情链接'>友情链接</option><?php foreach($tlist as $lit){ ?><option value='<?php echo $lit['short']; ?>'><?php echo $lit['short']; ?></option><?php } ?></select>&nbsp;<a class='aa'>[<span class='a'>&nbsp;-&nbsp;</span>]</a>&nbsp;&nbsp;<a class='aa'>[<span id='"+idc+"'>&nbsp;+&nbsp;</span>]</a><input type='hidden' name='systeml[<?php echo $li['id'] ?>][parentid]' size='30' value='0' /><input type='hidden' name='systeml[<?php echo $li['id'] ?>][titleid]' size='30' value='a<?php echo $li['item_id']; ?>' />
							  
							  <?php $resultb=$this->db->query("select * from headlink where parentid='".$li['item_id']."'");
                                    $slistb = $resultb->result_array(); foreach($slistb as $lib){ ?>
					          <p style='color:#000;'>┖┄②级标签：<input type='text' style='width:60px;' name='systeml[<?php echo $lib['id'] ?>][title]' size='30' value="<?php echo $lib['link_title'] ?>" />&nbsp;链接：<input type='text' style='width:60px;' name='systeml[<?php echo $lib['id'] ?>][address]' size='30' value="<?php echo $lib['link_url'] ?>" />&nbsp;ID：<input type='text' style='width:30px;' name='systeml[<?php echo $lib['id'] ?>][title_id]' size='30' value="<?php echo $lib['link_id'] ?>" />&nbsp;class：<input type='text' style='width:30px;' name='systeml[<?php echo $lib['id'] ?>][titleclass]' size='30' value="<?php echo $lib['link_class'] ?>" />&nbsp;<select style='width:60px;' name='systeml[<?php echo $lib['id'] ?>][titletype]'><option value='<?php echo $lib['link_type'] ?>'><?php if($lib['link_type']=='_blank'){echo '新窗口';}else{echo '本窗口';} ?></option><option value='_blank'>新窗口</option><option value='_self'>本窗口</option></select>&nbsp;<select style='width:60px;' name='systeml[<?php echo $lib['id'] ?>][ontype]'><option value='<?php echo $lib['ontype'] ?>'><?php echo $lib['ontype']; ?></option><option value='首页'>首页</option><option value='客户留言'>客户留言</option><option value='友情链接'>友情链接</option><?php foreach($tlist as $lit){ ?><option value='<?php echo $lit['short']; ?>'><?php echo $lit['short']; ?></option><?php } ?></select>&nbsp;<a class='aa'>[<span class='a'>&nbsp;-&nbsp;</span>]</a>&nbsp;&nbsp;<a class='aa'>[<span id='"+idc+"'>&nbsp;+&nbsp;</span>]</a><input type='hidden' name='systeml[<?php echo $lib['id'] ?>][parentid]' id="b<?php echo $lib['id']; ?>" size='30' value="a<?php echo $li['item_id']; ?>" /><input type='hidden' name='systeml[<?php echo $lib['id'] ?>][titleid]' id="a<?php echo $lib['item_id']; ?>" size='30' value='a<?php echo $lib['item_id']; ?>' />
							  
							  
							  <?php $resultc=$this->db->query("select * from headlink where parentid='".$lib['item_id']."'");
                                    $slistc = $resultc->result_array(); foreach($slistc as $lic){ ?>
					          <p style='color:#000;'>┖┄┄③级标签：<input type='text' style='width:60px;' name='systeml[<?php echo $lic['id'] ?>][title]' size='30' value="<?php echo $lic['link_title'] ?>" />&nbsp;链接：<input type='text' style='width:60px;' name='systeml[<?php echo $lic['id'] ?>][address]' size='30' value="<?php echo $lic['link_url'] ?>" />&nbsp;ID：<input type='text' style='width:30px;' name='systeml[<?php echo $lic['id'] ?>][title_id]' size='30' value="<?php echo $lic['link_id'] ?>" />&nbsp;class：<input type='text' style='width:30px;' name='systeml[<?php echo $lic['id'] ?>][titleclass]' size='30' value="<?php echo $lic['link_class'] ?>" />&nbsp;<select style='width:60px;'  name='systeml[<?php echo $lic['id'] ?>][titletype]'><option value='<?php echo $lic['link_type'] ?>'><?php if($lic['link_type']=='_blank'){echo '新窗口';}else{echo '本窗口';} ?></option><option value='_blank'>新窗口</option><option value='_self'>本窗口</option></select>&nbsp;<select style='width:60px;'  name='systeml[<?php echo $lic['id'] ?>][ontype]'><option value='<?php echo $lic['ontype'] ?>'><?php echo $lic['ontype']; ?><option value='首页'>首页</option><option value='客户留言'>客户留言</option><option value='友情链接'>友情链接</option><?php foreach($tlist as $lit){ ?><option value='<?php echo $lit['short']; ?>'><?php echo $lit['short']; ?></option><?php } ?></select>&nbsp;<input type='hidden' name='systeml[<?php echo $lic['id'] ?>][parentid]' id="b<?php echo $lib['id']; ?>" size='30' value="a<?php echo $lib['item_id']; ?>" /><a class='aa'>[<span class='a'>&nbsp;-&nbsp;</span>]</a>&nbsp;&nbsp;<a class='aa'>[<span id='"+idc+"'>&nbsp;+&nbsp;</span>]</a><input type='hidden' name='systeml[<?php echo $lic['id'] ?>][titleid]' size='30' value='a<?php echo $lic['item_id']; ?>' />
							
							<script language="javascript">
							idb=idb+1;
							$("document").ready(function(){	
							$(function(){
							$(".a").click(function(){
							$(this).parent().parent().remove();})
							})			
							})
							</script>
			  		<?php } ?>
	        </p>	
	   
							<script language="javascript">
							idb=idb+1;
							$("document").ready(function(){	
							$(function(){
							$(".a").click(function(){
							$(this).parent().parent().remove();})
							})			
							})
							</script>
			  
					<?php } ?>
	  
			</p>				  
							<script language="javascript">
							idd='#linkaddb'+idb;
							$("document").ready(function(){	
							$(function(){
							$(".a").click(function(){
							$(this).parent().parent().remove();})
							})			
							})
							</script>				  
  
					<?php } ?>
		    </p>
					   </div>
					</div>
					<?php } ?>
					<div class="clearfix subimtbg"><ul class="btnbg1"><li><input type="submit" value="保存设置" name="B1"  class="btn1" /></li></ul></div>
                </form>
            </div>
            
            
        </div>
         </div>

<script language="javascript">
		$("document").ready(function(){	
		    $("#linkadd").click(function(){
			    ida=ida+1;	
				idb=idb+1;
				idc='linkaddb'+idb;
				idd='#linkaddb'+idb;
			    $("#kuozhang").append("<p style='color:#000;'>①级标签：<input type='text' style='width:60px;' name='systeml["+ida+"][title]' size='30' />&nbsp;链接：<input type='text' style='width:60px;' name='systeml["+ida+"][address]' size='30' />&nbsp;ID：<input type='text' style='width:30px;' name='systeml["+ida+"][title_id]' size='30' />&nbsp;class：<input type='text' style='width:30px;' name='systeml["+ida+"][titleclass]' size='30' />&nbsp;<select  style='width:60px;' name='systeml["+ida+"][titletype]'><option value='_blank'>新窗口</option><option value='_self'>本窗口</option></select>&nbsp;<select  style='width:60px;' name='systeml["+ida+"][ontype]'><option value='首页'>首页</option><option value='客户留言'>客户留言</option><option value='友情链接'>友情链接</option><?php foreach($tlist as $lit){ ?><option value='<?php echo $lit['short']; ?>'><?php echo $lit['short']; ?></option><?php } ?></select>&nbsp;<a class='aa'>[<span class='a'>&nbsp;-&nbsp;</span>]</a>&nbsp;&nbsp;<a class='aa'>[<span id='"+idc+"'>&nbsp;+&nbsp;</span>]</a><input type='hidden' name='systeml["+ida+"][parentid]' size='30' value='0' /><input type='hidden' name='systeml["+ida+"][titleid]' size='30' value='"+idc+"' /></p>")
				    
					$(function(){
					$(idd).click(function(){
					ida=ida+1;
					idb=idb+1;
				    idc='linkaddb'+idb;
				    idd='#linkaddb'+idb;
					var parentid=$(this).attr("id");
					 
					$(this).parent().append("<p style='color:#000;'>┖┄②级标签：<input type='text' style='width:60px;' name='systeml["+ida+"][title]' size='30' />&nbsp;链接：<input type='text' style='width:60px;' name='systeml["+ida+"][address]' size='30' />&nbsp;ID：<input type='text' style='width:30px;' name='systeml["+ida+"][title_id]' size='30' />&nbsp;class：<input type='text' style='width:30px;' name='systeml["+ida+"][titleclass]' size='30' />&nbsp;<select  style='width:60px;' name='systeml["+ida+"][titletype]'><option value='_blank'>新窗口</option><option value='_self'>本窗口</option></select>&nbsp;&nbsp;<select  style='width:60px;' name='systeml["+ida+"][ontype]'><option value='首页'>首页</option><option value='客户留言'>客户留言</option><option value='友情链接'>友情链接</option><?php foreach($tlist as $lit){ ?><option value='<?php echo $lit['short']; ?>'><?php echo $lit['short']; ?></option><?php } ?></select>&nbsp;&nbsp;<a class='aa'>[<span class='a'>&nbsp;-&nbsp;</span>]</a>&nbsp;&nbsp;<a class='aa'>[<span id='"+idc+"'>&nbsp;+&nbsp;</span>]</a><input type='hidden' name='systeml["+ida+"][parentid]' size='30' value='"+parentid+"' /><input type='hidden' name='systeml["+ida+"][titleid]' size='30' value='"+idc+"' /></p>");
					
					    $(function(){
					    $(idd).click(function(){
						ida=ida+1;
					    idb=idb+1;
				        idc='linkaddb'+idb;
				        idd='#linkaddb'+idb;
						var parentida=$(this).attr("id");
					    $(this).parent().append("<p style='color:#000;'>┖┄┄③级标签：<input type='text' style='width:60px;' name='systeml["+ida+"][title]' size='30' />&nbsp;链接：<input type='text' style='width:60px;' name='systeml["+ida+"][address]' size='30' />&nbsp;ID：<input type='text' style='width:30px;' name='systeml["+ida+"][title_id]' size='30' />&nbsp;class：<input type='text' style='width:30px;' name='systeml["+ida+"][titleclass]' size='30' />&nbsp;<select  style='width:60px;' name='systeml["+ida+"][titletype]'><option value='_blank'>新窗口</option><option value='_self'>本窗口</option></select>&nbsp;&nbsp;&nbsp;&nbsp;<select  style='width:60px;' name='systeml["+ida+"][ontype]'><option value='首页'>首页</option><option value='客户留言'>客户留言</option><option value='友情链接'>友情链接</option><?php foreach($tlist as $lit){ ?><option value='<?php echo $lit['short']; ?>'><?php echo $lit['short']; ?></option><?php } ?></select><input type='hidden' name='systeml["+ida+"][parentid]' size='30' value='"+parentida+"' /><a class='aa'>[<span class='a'>&nbsp;-&nbsp;</span>]</a><input type='hidden' name='systeml["+ida+"][titleid]' size='30' value='"+idc+"' /></p>");
					
					
								$(function(){
								$(".a").click(function(){
								$(this).parent().parent().remove();})
								})
		
					    })
						})
					
					    $(function(){
					    $(".a").click(function(){
					    $(this).parent().parent().remove();})
					    })
		
					})
					
				$(function(){
				$(".a").click(function(){
				$(this).parent().parent().remove();})
				})
			})	
			})	

			
		    $("#dyyadd").click(function(){
		    	ida=ida+1;
			    $("#kuozhangdyy").append("<p><input name='language["+ida+"][title]' type='text'><input name='language["+ida+"][shot]' type='text'>&nbsp;&nbsp;<a class='aa'>[<span class='a'>&nbsp;-&nbsp;</span>]</a></p>")
				
					$(function(){
					$(".a").click(function(){
					$(this).parent().parent().remove();})
					})
			})	

			
			
			})
</script>
          <div class="bottom_info clearfix" id="close1">
          <div class="bottom_info2">
          <div class="bottom_info_img"><img src="<?php echo $url ?>images/info_tishi.png" width="16" height="15" alt="info_img" /></div>
          <p>排序规则：优先以排序编号逆向排序，次以栏目ID正向排序。</p>
          <p>栏目级别：通过点击前面的展开合拢小图标进行栏目多级别的操作，更直观地看到自己的栏目状况。</p>
          <span onclick="info_close1()"></span>
          <div class="bottom_info1"></div>
          </div>
         </div><!--.bottom_info-->
         </div> <!--.tab_content-->
        </div>
      </div>
     </div>
     <div class="main_bottom"></div>
    </div>
   </div>
   </div>
   <!--版权-->
   <div id="footer" class="clearfix">
    <div class="footer_info">
     <p class="date">Copyright © 2002-2012 WEIYEGR. 版权所有</p>
     <p class="help"><a href="#">帮助</a> | <a href="#">联系我们</a></p>
    </div>
   </div>
 </div>

<script type="text/javascript" src="<?php echo $url; ?>js/main.js"></script>
</body>
</html>
