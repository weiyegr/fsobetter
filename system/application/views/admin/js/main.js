// JavaScript Document

function show_li(){
	document.getElementById("main_show").style.display="block";
}
function hide_li(){
	document.getElementById("main_show").style.display="none";
}
function info_close(){
	document.getElementById("close").style.display="none";
}
function info_close(){
	document.getElementById("close").style.display="none";
}
function info_close1(){
	document.getElementById("close1").style.display="none";
}
$(document).ready(function(){
	$(".first").click(function(){
		$(this).next(".second").toggle();
		})
});
function clicked(id)
	{
		for(i=1;i<11;i++)
		{
			if(i==id)
			{
				document.getElementById(i).className='cc';
			}
			else
			{
				document.getElementById(i).className='';
			}
			
		}
	}
function sclicked(id)
	{
		for(i=101;i<107;i++)
		{
			if(i==id)
			{
				document.getElementById(i).className='ss';
			}
			else
			{
				document.getElementById(i).className='';
			}
			
		}
	}

/*栏目的*/
$(".colicon").click(function(){
	$thisdom=$(this).parent().parent();
	for (i=1;i<5;i++) {
	if ($thisdom.hasClass("col_"+i)) {
		    $('.maintable tbody tr').each(function(){
			$thisdom=$thisdom.next();
			if ($thisdom.hasClass("col_"+(i+1))) $thisdom.toggle();
			if ($thisdom.next().hasClass("col_"+i)) return false;
			});
	}
	}
});


  $(".search_txt").focus(function(){
    var txt_u = $(this).val();
	if(txt_u=="输入关键字..."){
	  $(this).val("");
	  $(this).css({"color":"#000"});
	}
 });
  $(".search_txt").blur(function(){
    var txt_u = $(this).val();
	if(txt_u ==""){
	  $(this).val("输入关键字...");
	  $(this).css({"color":"#b1abab"});
	}
 });
 /* $("#posttitle").focus(function(){
    var txt_i = $(this).val();
	if(txt_i=="在此输入标题..."){
	  $(this).val("");
	  $(this).css({"color":"#000"});
	}
 });
  $("#posttitle").blur(function(){
    var txt_i = $(this).val();
	if(txt_i ==""){
	  $(this).val("在此输入标题...");
	  $(this).css({"color":"#dcdcdc"});
	}
 }); */
 $(".att").click(function(){
	 $(this).next(".att_bottom").toggle();
	 })
 
 function checkAll(e)
{
	var a = document.getElementsByName('id[]');
	var l = a.length;
	while (l--)
		a[l].checked=e.checked;
}