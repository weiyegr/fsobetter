<!--

-->
<?php  
 $query = $this->db->query("select * from changgui where id=1");
 $row=$query->row();
?>
<div id="footer">
				<p><a href="<?php echo base_url(); ?>">首页</a> | <a href="<?php $this->classl->xxpage('contactus'); ?>">联系我们</a></p>
				<p id="copyright">© 佛山光威（欧贝特）照明科技有限公司 2013</p>
			</div>
<div style="width:0px;height:0px;overflow:hidden;"><script src="http://s6.cnzz.com/stat.php?id=<?php echo $row->tongji; ?>&amp;web_id=<?php echo $row->tongji; ?>&amp;show=pic1" language="JavaScript"/></script></div>
