//converts a string into a URL friendly string
//NOTE: The following rule must always hold: makeURLFriendly(a) == makeURLFriendly(makeURLFriendly(a)) for all a
function makeURLFriendly(text) {
	//replace all dashes ('-') with a space
	text = text.replace(/-/g, ' ');
	//remove all characters that are neither alphanumeric nor white space (special characters)
	text = text.replace(/([^\sA-Za-z0-9]+)/g, '');
	//remove whitespace from the start and end of the string
	text = text.replace(/^\s+|\s+$/g, '');
	//now replace all remaining groups of whitespace with '-' (a dash)
	text = text.replace(/\s+/g, '-');
	//make all capital letters lowercase
	text = text.toLowerCase();
	return text;
}
function sb_tinymce(element_name, my_width, my_height, my_theme)
{
	if (my_theme == 'advanced_simplified')
	{
	tinyMCE.init(
		{
			elements : element_name,
			theme : "advanced",
			mode: "exact",
			theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_path_location : "bottom",
			extended_valid_elements : "a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]", 
			height:my_height+'px',
			width:my_width+'px'
		});
	}
}

/** * Sets/unsets the pointer in browse mode * * @param   object   the table row * @param   object   the color to use for this row * * @return  boolean  whether pointer is set or not */function setPointer( theRow,
                                                                                                                                                                                                              thePointerColor )
{
	if ( thePointerColor == '' || typeof(theRow.style) == 'undefined' )
	{
		return false;
	}
	if ( typeof(document.getElementsByTagName) != 'undefined' )
	{
		var theCells = theRow.getElementsByTagName( 'td' );
	}
	else if ( typeof(theRow.cells) != 'undefined' )
	{
		var theCells = theRow.cells;
	}
	else
	{
		return false;
	}
	var rowCellsCnt = theCells.length;
	for ( var c = 0; c < rowCellsCnt; c++ )
	{
		theCells[c].style.backgroundColor = thePointerColor;
	}
	return true;
}

// functions for moving select items up and down
var select_changes = false;
function set_ordered_list(srcList, flatlist)
{
	flatlist.value = "";

	for(var i = 0; i < srcList.options.length; i++)
	{
		flatlist.value += srcList.options[i].value + ",";
	}
}

function move_select_item_up(srcList, flatlist)
{
	// set temp variables
	var a;
	var b;
	var temp_a;
	var temp_b;

	// Do nothing if nothing is selected
	if ((srcList.selectedIndex == -1))
	{
		return;
	}

	// new list
	for(var i = 0; i < srcList.options.length; i++ )
	{
		if(srcList.options[i + 1] != null )
		{
			a = srcList.options[i];
			b = srcList.options[i + 1];
			temp_a = new Option(a.text, a.value, a.defaultSelected, a.selected);
			temp_b = new Option(b.text, b.value, b.defaultSelected, b.selected);

			if (!a.selected && b.selected)
			{
				srcList.options[i] = temp_b;
				srcList.options[i + 1] = temp_a;
			}
		}
	}

	// set the list
	set_ordered_list(srcList, flatlist);
	select_changes = true;
}

function move_select_item_down(srcList, flatlist)
{
	// set temp variables
	var a;
	var b;
	var temp_a;
	var temp_b;

	// Do nothing if nothing is selected
	if ((srcList.selectedIndex == -1))
	{
		return;
	}
	// new list
	for(var i = (srcList.options.length - 1); i >= 0; i-- )
	{
		if(srcList.options[i + 1] != null )
		{
			a = srcList.options[i];
			b = srcList.options[i + 1];
			temp_a = new Option(a.text, a.value, a.defaultSelected, a.selected);
			temp_b = new Option(b.text, b.value, b.defaultSelected, b.selected);

			if (a.selected && !b.selected)
			{
				srcList.options[i] = temp_b;
				srcList.options[i + 1] = temp_a;
			}
		}
	}
	set_ordered_list(srcList, flatlist);
	select_changes = true;
}

function get_number_selected_items(srcList)
{
	// Do nothing if nothing is selected
	if ((srcList.selectedIndex == -1))
	{
		return 0;
	}

	var selectedCount = 0;

	for(var i = 0; i < srcList.options.length; i++)
	{
		if(srcList.options[i].selected)
		{
			selectedCount++;
		}
	}

	return selectedCount;
}

function change_location_from_select(url, srcList)
{
	// check that no changes have been made
	if(select_changes && !confirm("There are unsaved changes on this page. To continue without saving click 'ok'. To save changes click 'cancel' and submit the form."))
	{
		return
	}

	// check if one is selected
	if(srcList.selectedIndex == -1)
	{
		alert("There are no categories selected. You must select one to view and order it's subcategories.");
		return;
	}

	// check if more than one is selected
	if(get_number_selected_items(srcList) > 1)
	{
		if(confirm("There are " + get_number_selected_items(srcList) + " items selected. Click 'ok' to go to the first item (" + srcList.options[srcList.selectedIndex].text + ") or 'cancel' to select 'one' item from the list to view."))
		{
			document.location = url + srcList.options[srcList.selectedIndex].value;
		}
	}
	else if(get_number_selected_items(srcList) == 1)
	{
		document.location = url + srcList.options[srcList.selectedIndex].value;
	}
	else
	{
		alert("I've no idea!!!");
	}
}

function setCheckboxes(the_form, the_field, do_check)
{
	if (!document.forms[the_form].elements[the_field])
	{
		return false;
	}

	var elts = (typeof(document.forms[the_form].elements[the_field]) != 'undefined')
		? document.forms[the_form].elements[the_field]
		: document.forms[the_form].elements['selected_tbl[]'];
	var elts_cnt = (typeof(elts.length) != 'undefined')
		? elts.length
		: 0;

	if (!elts)
	{
		return false;
	}

	if (elts_cnt)
	{
		for (var i = 0; i < elts_cnt; i++) {
			elts[i].checked = do_check;
		}
	} else {
		elts.checked = do_check;
	}

	return true;
}

function checked_form(the_form, the_field, message, display_error)
{
	var elts = (typeof(document.forms[the_form].elements[the_field]) != 'undefined')
		? document.forms[the_form].elements[the_field]
		: 0;
	var elts_cnt = (typeof(elts.length) != 'undefined')
		? elts.length
		: 0;

	if (!document.forms[the_form].elements[the_field])
		return false;

	if (!message)
		message = 'Are you sure you want to delete the selected records?';

	if ((!display_error) && (display_error != 0))
		display_error = 1;

	//Single record confirmation.
	if ((document.forms[the_form].elements[the_field].value!='undefined')&&(document.forms[the_form].elements[the_field].checked))
	{
	var agree=confirm(message);
	if (agree)
		return true ;
	else
		return false ;
	}

	if (elts_cnt)
	{
		for (var i = 0; i < elts_cnt; i++)
		{
			if (elts[i].checked)
			{
				var agree=confirm(message);
				if (agree)
					return true ;
				else
					return false ;
			}
		}
	}

	if (display_error == 1)
		alert ('No records were selected');
	return false;
}

function delete_confirm()
{
		var agree=confirm("Are you sure you want to delete the record?");
		if (agree)
			return true ;
		else
			return false ;
}

function form_confirm(message)
{
		var agree=confirm(message);
		if (agree)
			return true ;
		else
			return false ;
}

function validate(form)
{ // form is passed as 'document.forms.myForm'
var valid=true;
var message='';

i = 0;
while (i<form.elements.length)
{
	var type='';
	var name='';
	var d=0;
	var display=1;
	var my_title = '';

	if (form.elements[i].title)
	{
		my_title = form.elements[i].title;
		for (var c=0; c<form.elements[i].title.length; c++)
		{
			if (display==1)
			{
				name=name + my_title.substring(d,(d+1));
			}
			else
			{
				type=type + my_title.substring(d,(d+1));
			}
			d++;

			if (my_title.substring((c+1),(c+2))=='|')
			{
				display=2;
				c++;
				d++;
			}
		}

		switch (type)
		{
		case 'email':

			var emailStr = form.elements[i].value

			var emailPat=/^(.+)@(.+)$/
			var specialChars="\\(\\)<>@,;:\\\\\\\"\\.\\[\\]"
			var validChars="\[^\\s" + specialChars + "\]"
			var quotedUser="(\"[^\"]*\")"
			var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,6})\]$/
			var atom=validChars + '+'
			var word="(" + atom + "|" + quotedUser + ")"
			var userPat=new RegExp("^" + word + "(\\." + word + ")*$")
			var domainPat=new RegExp("^" + atom + "(\\." + atom +")*$")
			var matchArray=emailStr.match(emailPat)

			if (matchArray==null)
			{
				message = message + name + ' is invalid\n';
				break;
			}

			var user=matchArray[1]
			var domain=matchArray[2]

			if (user.match(userPat)==null) 
			{
				message = message + name + ' is invalid\n';
				break;
			}

			var IPArray=domain.match(ipDomainPat)

			if (IPArray!=null) 
			{
				for (var i=1;i<=4;i++) 
				{
					if (IPArray[i]>255) 
					{
						message = message + name + ' is invalid\n';
						break;
					}
				}
				break;
			}

			var domainArray=domain.match(domainPat)

			if (domainArray==null) 
			{
				message = message + name + ' is invalid\n';
				break;
			}

			var atomPat=new RegExp(atom,"g")
			var domArr=domain.match(atomPat)
			var len=domArr.length

			if (domArr[domArr.length-1].length < 2 || domArr[domArr.length-1].length > 4)
			{
				message = message + name + ' is invalid\n';
				break;
			}

			if (len < 2)
			{
				message = message + name + ' is invalid\n';
				break;
			}
		break;
		
		case 'password':
		case 'username':
			var checkStr = form.elements[i].value;

			if (checkStr.length == 0)
			{
				message = message + name + ' is missing\n';
				break;
			}

			if (checkStr.length < 6 || checkStr.length > 20)
			{
				message = message + name + ' must be between 6 and 20 characters.\n';
				break;
			}

		break;

		case 'percentage':

			var checkStr = form.elements[i].value;

			if (checkStr.length == 0)
			{
				message = message + name + ' is missing\n';
				break;
			}

			if (isNaN(checkStr))
			{
				message = message + name + ' is not a number\n';
				break;
			}

			if (checkStr < 0 || checkStr > 100)
			{
				message = message + name + ' is invalid\n';
				break;
			}
		break;

		case 'integer':
			var checkStr = form.elements[i].value;

			if (checkStr.length == 0)
			{
				message = message + name + ' is missing\n';
				break;
			}

			if (isNaN(checkStr))
			{
				message = message + name + ' is not a number\n';
				break;
			}

			if (parseInt(checkStr) != checkStr)
			{
				message = message + name + ' is not a whole number\n';
				break;
			}
		break;

		case 'c_BirthDate':
		case 'dd-mm-yyyy':
		case 'dd-MM-yyyy':
		case 'dd/mm/yyyy':
		case 'dd/MM/yyyy':
			if ((form.elements[i].value=='')||(form.elements[i].value==0))
			{
				message = message + name + ' is missing\n';
				break
			}
			else
			{
				dtStr = form.elements[i].value;
				var pos1=dtStr.indexOf('-');
				var pos2=dtStr.indexOf('-',pos1+1);
				var strDay=dtStr.substring(0,pos1);
				var strMonth=dtStr.substring(pos1+1,pos2);
				var strYear=dtStr.substring(pos2+1);

				if (strMonth.length != '2' || strDay.length != '2' || strYear.length != '4')
				{
					// try breaking by / instead
					pos1=dtStr.indexOf('/');
					pos2=dtStr.indexOf('/',pos1+1);
					strDay=dtStr.substring(0,pos1);
					strMonth=dtStr.substring(pos1+1,pos2);
					strYear=dtStr.substring(pos2+1);
				}

				var month = strMonth;
				var day = strDay;
				var year = strYear;

				while (month.charAt(0) == '0')
				month = month.substring(1, month.length);

				while (day.charAt(0) == '0')
					day = day.substring(1, day.length);

				while (year.charAt(0) == '0')
					year = year.substring(1, year.length);

				var error = validate_date(strYear, year, strMonth, month, strDay, day);
				if (error.length > 0)
				{
					message = message + name + ' ' + error + '\n';
					break;
				}
			}
		break;

		case 'yyyy-MM-dd':
		case 'yyyy-mm-dd':
		case 'yyyy/MM/dd':
		case 'yyyy/mm/dd':
			if ((form.elements[i].value=='')||(form.elements[i].value==0))
			{
				message = message + name + ' is missing\n';
				break
			}
			else
			{
				dtStr = form.elements[i].value;
				var pos1=dtStr.indexOf('-');
				var pos2=dtStr.indexOf('-',pos1+1);

				var strYear=dtStr.substring(0,pos1);
				var strMonth=dtStr.substring(pos1+1,pos2);
				var strDay=dtStr.substring(pos2+1);

				if (strMonth.length != '2' || strDay.length != '2' || strYear.length != '4')
				{
					// try breaking by / instead
					dtStr = form.elements[i].value;
					pos1=dtStr.indexOf('/');
					pos2=dtStr.indexOf('/',pos1+1);

					strYear=dtStr.substring(0,pos1);
					strMonth=dtStr.substring(pos1+1,pos2);
					strDay=dtStr.substring(pos2+1);
				}

				var year = strYear;
				var month = strMonth;
				var day = strDay;

				while (month.charAt(0) == '0')
				month = month.substring(1, month.length);

				while (day.charAt(0) == '0')
					day = day.substring(1, day.length);

				while (year.charAt(0) == '0')
					year = year.substring(1, year.length);

				var error = validate_date(strYear, year, strMonth, month, strDay, day);
				if (error.length > 0)
				{
					message = message + name + ' ' + error + '\n';
					break;
				}
			}
		break;

		default:
			//For radio buttons check that current and previous values were empty
			if ((form.elements[i].type=='radio')||(form.elements[i].type=='checkbox'))
			{
				var a = i;
				var m = 0;
				var is_checked = 0;
				while(form.elements[a].name==form.elements[i].name)
				{
					if (form.elements[a].checked==true) is_checked = 1;
					a++;
					m++;
				}
				//increment i to account for the array of elements.
				i = i + (m-1);

				if (is_checked==0)
				{
					message = message + name + ' is missing\n';
				}
			}
			else if ((form.elements[i].type=='text')||(form.elements[i].type=='textarea')||(form.elements[i].type=='password')||(form.elements[i].type=='file'))
			{
				if ((form.elements[i].value=='')||(form.elements[i].value=='0'))
				{
					message = message + name + ' is missing\n';
				}
			}
			else if (form.elements[i].type=='select-one')
			{
				//Select list.
				//if (form.elements[i].selectedIndex < 0)
				var selected_index = form.elements[i].selectedIndex;
				if (form.elements[i][selected_index].value == '')
				{
					message = message + name + ' is missing\n';
				}
			}
			break;
		}
	}
	
	i++;
}

if (message!='')
{
	alert(message);
	return(false);
}

return(true);
}

/**********************************************
 Maxlength script- (C) Dynamic Drive (www.dynamicdrive.com)
* This notice must stay intact for legal use.
* Visit http://www.dynamicdrive.com/ for full source code
***********************************************/
function isMaxLength(obj)
{
	var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
	if (obj.getAttribute && obj.value.length>mlength)
	obj.value=obj.value.substring(0,mlength)
}

function validate_date(strYear, year, strMonth, month, strDay, day)
{
	if (strMonth.length != '2' || strDay.length != '2' || strYear.length != '4')
		return 'format is invalid';

	if (year != parseInt(year) || isNaN(parseInt(strYear)))
		return 'year is invalid';

	if (month == 2)
		var daysInFebruary = (((year % 4 == 0) && ( (!(year % 100 == 0)) || (year % 400 == 0))) ? 29 : 28 );

	if (strMonth.length != 2 || month < 1 || month > 12 || isNaN(parseInt(strMonth)) || month != parseInt(month))
		return 'month is invalid';
	else
	{
		var daysInMonth = 31;
		if (month == 4 || month == 6 || month == 9 || month == 11)
		{
			daysInMonth = 30;
		}
		else if (month == 2)
		{
			daysInMonth = 29;
		}
	}

	if (strDay.length != 2 || day < 1 || day > 31 || (month == 2 && day > daysInFebruary) || day > daysInMonth || parseInt(day) != day || isNaN(parseInt(strDay)))
		return 'day is invalid';

	return '';
}

var newWindow = null;
function new_window(url,width,height,name)
{
	newWindow = window.open(url + '&' + session_url,name,'left='+((screen.width  - width)/2)+',screenX=0,top='+((screen.height  - height)/2)+',screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=' + width + ',height=' + height);
}

var newWindowResizable = null;
function new_window_resizable(url,width,height,name)
{
	newWindowResizable = window.open(url + '&' + session_url,name,'left='+((screen.width  - width)/2)+',screenX=0,top='+((screen.height  - height)/2)+',screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=' + width + ',height=' + height);
}

var newWindowExt = null;
function new_window_ext(url,width,height)
{
	newWindow = window.open(url,'','left=0,screenX=0,top=0,screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=no,width=' + width + ',height=' + height);
}

var newWindowExtChrome = null;
function new_window_ext_chrome(url,width,height)
{
	newWindow = window.open(url,'','left=0,screenX=0,top=0,screenY=0,toolbar=yes,location=yes,directories=no,status=yes,menubar=yes,scrollbars=yes,resizable=yes,copyhistory=no,width=' + width + ',height=' + height);
}

var fullWindow = null;
function full_window(url)
{
	var width = (screen.availWidth - 10);
	var height = (screen.availHeight - 40);

	fullWindow = window.open(url + '&' + session_url,'','left=0,screenX=0,top=0,screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=' + width + ',height=' + height);
}

var fullHeightWindow = null;
function full_height_window(url, width)
{
	var height = (screen.availHeight - 40);

	fullHeightWindow = window.open(url + '&' + session_url,'','left=0,screenX=0,top=0,screenY=0,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,copyhistory=no,width=' + width + ',height=' + height);
}

function new_window_status(url,width,height)
{
	newWindow = window.open(url + '&' + session_url,'','left=0,screenX=0,top=0,screenY=0,toolbar=no,location=no,directories=no,status=yes,menubar=no,scrollbars=yes,resizable=no,copyhistory=no,width=' + width + ',height=' + height);
}
var id_element = null;
var title_element = null;
var link_element = null;


function highlight_row(my_row,last_row,my_bg)
{
	// Categories was not working when it wasn't the top level window (ie. in an iframe).
	var parent = window;
	if (parent.document.getElementById(parent.document.getElementById(last_row).value))
	{
		parent.document.getElementById(parent.document.getElementById(last_row).value).style.background = '#FFFFFF';
	}
	parent.document.getElementById(my_row).style.background = my_bg;
	parent.document.getElementById(last_row).value = my_row;
}

function invert_row(my_row,last_row,my_bg,my_font,last_font,folder_open_source,folder_close_source)
{
	// Categories was not working when it wasn't the top level window (ie. in an iframe).
	var parent = window;
	if (parent.document.getElementById(parent.document.getElementById(last_row).value))
	{
		parent.document.getElementById(parent.document.getElementById(last_row).value).style.background = '#FFFFFF';
		parent.document.getElementById(parent.document.getElementById(last_row).value + '_icon').src = folder_close_source;
	}
	parent.document.getElementById(my_row).style.background = my_bg;
	parent.document.getElementById(my_row + '_icon').src = folder_open_source;
	parent.document.getElementById(last_row).value = my_row;
}

function insertTD(my_count)
{
	var newTD = document.createElement("td");
	newTD.setAttribute('id','level' + my_count);
	newTD.setAttribute('valign','top');
	var trElm = document.getElementById("outer_box");
	trElm.appendChild(newTD);
}

function removeTD(my_count)
{
	var trElm = document.getElementById("outer_box");
	var rmTD = document.getElementById("level" + my_count);
	if (rmTD)
	{
		trElm.removeChild(rmTD);
	}
}

function MM_findObj(n, d) { //v4.01
	var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length)
	{
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);
	}
	if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImgRestore() { //v3.0
	var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
	var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

// Open New Window in center of screen.
var win = null;
function OpenWindow(mypage,myname,w,h,scroll){
LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
settings ='height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
win = window.open(mypage,myname,settings)
}

// Display PNG's correctly in IE Browsers.
function correctPNG()
{
	for(var i=0; i<document.images.length; i++)
	{
		var img = document.images[i]
		var imgName = img.src.toUpperCase()
		if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
		{
			var imgID = (img.id) ? "id='" + img.id + "' " : ""
			var imgClass = (img.className) ? "class='" + img.className + "' " : ""
			var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
			var imgStyle = "display:inline-block;" + img.style.cssText
			if (img.align == "left") imgStyle = "float:left;" + imgStyle
			if (img.align == "right") imgStyle = "float:right;" + imgStyle
			if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
			var strNewHTML = "<span " + imgID + imgClass + imgTitle
			+ " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
			+ "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
			+ "(src=\'" + img.src + "\', sizingMethod='noscale');\"></span>"
			img.outerHTML = strNewHTML
			i = i-1
		}
	}
}
if ( navigator.userAgent.indexOf("MSIE") != -1 )
{
	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent))
	{
		// check for version of Internet Explorer
		// in this case need to focus on IE6
		function loadPNG()
		{
			window.attachEvent("onload", correctPNG);
		}
		
		var ieversion = new Number(RegExp.$1);
		if ( ieversion == 6 )
		{
			window.onload = loadPNG;
			window.attachEvent("onload", correctPNG);
		}
	}
}

function printit()
{
	if (window.print)
	{
		window.print();
	}
}

function parseNavigation(ob)
{
	toBeBrokenDown = ob.options[ob.selectedIndex].value.split("|");

	targetWindow = toBeBrokenDown[0];
	targetURL    = toBeBrokenDown[1];

	if (targetWindow!=='')
	{
		// if a new Window name is specified, then it will
		// open in a new Window.
		window.open(targetURL,targetWindow,'toolbar=1,location=1,directories=1,status=1,menubar=1,scrollbars=1,resizable=1,width=800,height=600');
		// if we open a new window, then we have to re-set
		// the select box to the first option
		// which should have no value
		ob.selectedIndex = 0;
	} else {
		// or else it will open in the current window
		window.open(targetURL,'_top')
	}
}

/**
 * Array of objects dictating which callback functions need to run after loading which javascript file.
 * 
 * This was added because you don't want to add a file multiple times, however u may need to call 
 * multiple call back functions once a file is loaded.
 * 
**/
var addDomCallBacks = Array();

/**
 * Load a Javascript file into DOM
 * 
 * If a callback function is provided, that function would be called when the
 * script file is completed loading itself. 
 * 
 * NOTE: Just make sure the callback function is loaded before the call to this 
 * function is made.
 * 
 * @see http://www.ejeliot.com/blog/109
 * @param scriptFile
 * @param callBackFunction
 * @return void
 */
function add_dom_javascript(scriptFile, callBackFunction, callBackParams)
{
    var fileAdded = false;
    
    var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = scriptFile;
    
    if ( (callBackFunction) && (arguments.length >= 2) )
    {
    	// loop through the addDomCallBacks array and determine if this file is already mentioned
    	for ( var i = 0; i < addDomCallBacks.length; i++ )
    	{
    		if ( addDomCallBacks[i].scriptSrc == scriptFile )
    		{
    			fileAdded = true;
    			
    			// if the file is already loaded, just run the callback function
    			if ( addDomCallBacks[i].loaded == true )
    			{
    				callBackFunction( callBackParams );
    			}
    			// otherwise add the callback to the array of callbacks
    			else
				{
					addDomCallBacks[i].callBackFunctions.push( callBackFunction );
					addDomCallBacks[i].callBackParams.push( callBackParams );
				}
    		}
    	}
    	
    	if ( fileAdded == false )
    	{
	    	// create an object referencing the callback function
	    	var callBackRef = {};
	    	callBackRef.scriptSrc = scriptFile;
	    	callBackRef.callBackFunctions = Array();
	    	callBackRef.callBackFunctions.push( callBackFunction );
	    	callBackRef.callBackParams = Array();
	    	callBackRef.callBackParams.push( callBackParams );
	    	callBackRef.loaded = false;
	    	
	    	addDomCallBacks.push(callBackRef); 
			
			var evl = {};
			evl.handleEvent = function(e) {
				addJavascriptCallBack( scriptFile );
			};
			
			if ( script.addEventListener )
			{
				script.addEventListener('load' ,evl ,true);
			}
			else // For IE
			{
				script.onreadystatechange = function() 
				{
				    if (this.readyState == "loaded" || this.readyState == "complete")
				    {
				    	addJavascriptCallBack.call( this, scriptFile );
				    }
				}
			}
		}
    }

	if ( fileAdded == false )
	{
		document.getElementsByTagName('head')[0].appendChild(script);	
	}
}

/**
 * Callback function called from add_dom_javascript.
 * 
 * If the passed in file matches an object in the addDomCallBacks array, then run all the callback functions needed
**/
function addJavascriptCallBack( scriptFile )
{
	for ( var i = 0; i < addDomCallBacks.length; i++ )
	{
		if ( addDomCallBacks[i].scriptSrc == scriptFile )
		{
			addDomCallBacks[i].loaded = true;
			
			// loop through the callbacks and call them all
			callBackFunctions = addDomCallBacks[i].callBackFunctions;
			callBackParams = addDomCallBacks[i].callBackParams;
			for ( var k = 0; k < callBackFunctions.length; k++ )
			{
				callBackFunctions[k]( callBackParams[k] );
			}
		}
	}
}

//http://www.javascriptkit.com/javatutors/loadjavascriptcss.shtml
function add_dom_css(script_file)
{
	script = document.createElement('link');
	script.type = 'text/css';
	script.rel = 'stylesheet';
	script.href = script_file;
	document.getElementsByTagName('head')[0].appendChild(script);
}

/**
 * FlashObject v1.3d: Flash detection and embed - http://blog.deconcept.com/flashobject/
 *
 * FlashObject is (c) 2006 Geoff Stearns and is released under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 *
 */
if(typeof com=="undefined"){var com=new Object();}
if(typeof com.deconcept=="undefined"){com.deconcept=new Object();}
if(typeof com.deconcept.util=="undefined"){com.deconcept.util=new Object();}
if(typeof com.deconcept.FlashObjectUtil=="undefined"){com.deconcept.FlashObjectUtil=new Object();}
com.deconcept.FlashObject=function(_1,id,w,h,_5,c,_7,_8,_9,_a,_b){
if(!document.createElement||!document.getElementById){return;}
this.DETECT_KEY=_b?_b:"detectflash";
this.skipDetect=com.deconcept.util.getRequestParameter(this.DETECT_KEY);
this.params=new Object();
this.variables=new Object();
this.attributes=new Array();
this.useExpressInstall=_7;
if(_1){this.setAttribute("swf",_1);}
if(id){this.setAttribute("id",id);}
if(w){this.setAttribute("width",w);}
if(h){this.setAttribute("height",h);}
if(_5){this.setAttribute("version",new com.deconcept.PlayerVersion(_5.toString().split(".")));}
this.installedVer=com.deconcept.FlashObjectUtil.getPlayerVersion(this.getAttribute("version"),_7);
if(c){this.addParam("bgcolor",c);}
var q=_8?_8:"high";
this.addParam("quality",q);
var _d=(_9)?_9:window.location;
this.setAttribute("xiRedirectUrl",_d);
this.setAttribute("redirectUrl","");
if(_a){this.setAttribute("redirectUrl",_a);}
};
com.deconcept.FlashObject.prototype={setAttribute:function(_e,_f){
this.attributes[_e]=_f;
},getAttribute:function(_10){
return this.attributes[_10];
},addParam:function(_11,_12){
this.params[_11]=_12;
},getParams:function(){
return this.params;
},addVariable:function(_13,_14){
this.variables[_13]=_14;
},getVariable:function(_15){
return this.variables[_15];
},getVariables:function(){
return this.variables;
},createParamTag:function(n,v){
var p=document.createElement("param");
p.setAttribute("name",n);
p.setAttribute("value",v);
return p;
},getVariablePairs:function(){
var _19=new Array();
var key;
var _1b=this.getVariables();
for(key in _1b){_19.push(key+"="+_1b[key]);}
return _19;
},getFlashHTML:function(){
var _1c="";
if(navigator.plugins&&navigator.mimeTypes&&navigator.mimeTypes.length){
if(this.getAttribute("doExpressInstall")){
this.addVariable("MMplayerType","PlugIn");
}
_1c="<embed type=\"application/x-shockwave-flash\" src=\""+this.getAttribute("swf")+"\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\"";
_1c+=" id=\""+this.getAttribute("id")+"\" name=\""+this.getAttribute("id")+"\" ";
var _1d=this.getParams();
for(var key in _1d){_1c+=[key]+"=\""+_1d[key]+"\" ";}
var _1f=this.getVariablePairs().join("&");
if(_1f.length>0){_1c+="flashvars=\""+_1f+"\"";}
_1c+="/>";
}else{
if(this.getAttribute("doExpressInstall")){this.addVariable("MMplayerType","ActiveX");}
_1c="<object id=\""+this.getAttribute("id")+"\" classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" width=\""+this.getAttribute("width")+"\" height=\""+this.getAttribute("height")+"\">";
_1c+="<param name=\"movie\" value=\""+this.getAttribute("swf")+"\" />";
var _20=this.getParams();
for(var key in _20){_1c+="<param name=\""+key+"\" value=\""+_20[key]+"\" />";}
var _22=this.getVariablePairs().join("&");
if(_22.length>0){_1c+="<param name=\"flashvars\" value=\""+_22+"\" />";
}_1c+="</object>";}
return _1c;
},write:function(_23){
if(this.useExpressInstall){
var _24=new com.deconcept.PlayerVersion([6,0,65]);
if(this.installedVer.versionIsValid(_24)&&!this.installedVer.versionIsValid(this.getAttribute("version"))){
this.setAttribute("doExpressInstall",true);
this.addVariable("MMredirectURL",escape(this.getAttribute("xiRedirectUrl")));
document.title=document.title.slice(0,47)+" - Flash Player Installation";
this.addVariable("MMdoctitle",document.title);}
}else{this.setAttribute("doExpressInstall",false);}
if(this.skipDetect||this.getAttribute("doExpressInstall")||this.installedVer.versionIsValid(this.getAttribute("version"))){
var n=(typeof _23=="string")?document.getElementById(_23):_23;
n.innerHTML=this.getFlashHTML();
}else{if(this.getAttribute("redirectUrl")!=""){document.location.replace(this.getAttribute("redirectUrl"));}}}};
com.deconcept.FlashObjectUtil.getPlayerVersion=function(_26,_27){
var _28=new com.deconcept.PlayerVersion(0,0,0);
if(navigator.plugins&&navigator.mimeTypes.length){
var x=navigator.plugins["Shockwave Flash"];
if(x&&x.description){_28=new com.deconcept.PlayerVersion(x.description.replace(/([a-z]|[A-Z]|\s)+/,"").replace(/(\s+r|\s+b[0-9]+)/,".").split("."));}
}else{
try{var axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
for(var i=3;axo!=null;i++){
axo=new ActiveXObject("ShockwaveFlash.ShockwaveFlash."+i);
_28=new com.deconcept.PlayerVersion([i,0,0]);}}
catch(e){}
if(_26&&_28.major>_26.major){return _28;}
if(!_26||((_26.minor!=0||_26.rev!=0)&&_28.major==_26.major)||_28.major!=6||_27){
try{
_28=new com.deconcept.PlayerVersion(axo.GetVariable("$version").split(" ")[1].split(","));
}catch(e){}}}
return _28;
};
com.deconcept.PlayerVersion=function(_2c){
this.major=parseInt(_2c[0])||0;
this.minor=parseInt(_2c[1])||0;
this.rev=parseInt(_2c[2])||0;
};
com.deconcept.PlayerVersion.prototype.versionIsValid=function(fv){
if(this.major<fv.major){return false;}
if(this.major>fv.major){return true;}
if(this.minor<fv.minor){return false;}
if(this.minor>fv.minor){return true;}
if(this.rev<fv.rev){return false;}
return true;
};
com.deconcept.util={getRequestParameter:function(_2e){
var q=document.location.search||document.location.hash;
if(q){var _30=q.indexOf(_2e+"=");
var _31=(q.indexOf("&",_30)>-1)?q.indexOf("&",_30):q.length;
if(q.length>1&&_30>-1){
return q.substring(q.indexOf("=",_30)+1,_31);}}return "";
},removeChildren:function(n){
while(n.hasChildNodes()){
n.removeChild(n.firstChild);}}};
if(Array.prototype.push==null){
Array.prototype.push=function(_33){
this[this.length]=_33;
return this.length;};}
var getQueryParamValue=com.deconcept.util.getRequestParameter;
var FlashObject=com.deconcept.FlashObject;



function externalLinks()
{
	if (!document.getElementsByTagName) return;
	var anchors = document.getElementsByTagName("a");
	for (var i=0; i<anchors.length; i++)
	{
		var anchor = anchors[i];
		if (anchor.getAttribute("href") &&
		anchor.getAttribute("rel") == "external")
		anchor.target = "_blank";
	}
}
window.onload = externalLinks;

Hover = function() {
				if (document.getElementById("nav"))
				{
					var sfEls = document.getElementById("nav").getElementsByTagName("LI");
					for (var i=0; i<sfEls.length; i++) {
						sfEls[i].onmouseover=function() {
							this.className+=" hover";
						}
						sfEls[i].onmouseout=function() {
							this.className=this.className.replace(new RegExp(" hover\\b"), "");
						}
					}
				}
			}
			if (window.attachEvent) window.attachEvent("onload", Hover);

window.sbHtml = {
	getUniqueId: (function () {
		var i = 0;
		return function () {
			return 'sbHtmlJsId' + (++i).toString();
		};
	})()
};
