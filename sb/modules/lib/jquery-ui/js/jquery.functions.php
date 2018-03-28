

// Add any jquery functions here


// Clears the input on focus if it has a particular value
$.fn.clearInput = function(inputVal){

	return this.focus(function(){
		obj = $(this);
		
		if(obj.val() == inputVal)
		{
			obj.val('');
		}
	})
	.blur(function(){
		obj = $(this);
		
		if(obj.val() == "")
		{
			obj.val(inputVal);
		}
	});

};

$("#searchText").clearInput("Search");
$("#emailText").clearInput("Email Address");
$("#username").clearInput("Username");
$("#password").clearInput("Password");



/* JQUERY - Superfish dropdown menu system */
/* view full source go here
   http://users.tpg.com.au/j_birch/plugins/superfish/
*/
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}(';(2($){$.k.J=2(d){4 e=$.k.J,c=e.c,$17=$([\'<1a 1j="\',c.M,\'"> &#1J;</1a>\'].g(\'\')),p=2(){4 a=$(3),m=L(a);O(m.H);a.V().1I().q()},B=2(){4 a=$(3),m=L(a),o=e.9;O(m.H);m.H=1H(2(){o.E=($.1F(a[0],o.$n)>-1);a.q();x(o.$n.F&&a.K([\'j.\',o.h].g(\'\')).F<1){p.8(o.$n)}},o.1c)},L=2(a){4 b=a.K([\'5.\',c.I,\':1h\'].g(\'\'))[0];e.9=e.o[b.1i];u b},N=2(a){a.w(c.P).1D($17.1C())};u 3.l(2(){4 s=3.1i=e.o.F;4 o=$.T({},e.U,d);o.$n=$(\'j.\'+o.y,3).1B(0,o.X).l(2(){$(3).w([o.h,c.z].g(\' \')).1A(\'j:Z(5)\').10(o.y)});e.o[s]=e.9=o;$(\'j:Z(5)\',3)[($.k.11&&!o.12)?\'11\':\'1z\'](p,B).l(2(){x(o.14)N($(\'>a:1h-1x\',3))}).v(\'.\'+c.z).q();4 b=$(\'a\',3);b.l(2(i){4 a=b.18(i).K(\'j\');b.18(i).1n(2(){p.8(a)}).1k(2(){B.8(a)})});o.1b.8(3)}).l(2(){4 a=[c.I];x(e.9.D&&!($.t.1e&&$.t.16<7))a.1O(c.r);$(3).w(a.g(\' \'))})};4 f=$.k.J;f.o=[];f.9={};f.G=2(){4 o=f.9;x($.t.1e&&$.t.16>6&&o.D&&o.C.19!=1l)3.1m(f.c.r+\'-15\')};f.c={z:\'1o\',I:\'1p\',P:\'1q\',M:\'1r\',r:\'1s\'};f.U={h:\'1t\',y:\'1u\',X:1,1c:1v,C:{19:\'1w\'},13:\'1y\',14:A,D:A,12:W,1b:2(){},R:2(){},Q:2(){},1g:2(){}};$.k.T({q:2(){4 o=f.9,v=(o.E===A)?o.$n:\'\';o.E=W;4 a=$([\'j.\',o.h].g(\'\'),3).1E(3).v(v).10(o.h).1d(\'>5\').1G().Y(\'S\',\'1f\');o.1g.8(a);u 3},V:2(){4 o=f.9,1K=f.c.r+\'-15\',$5=3.w(o.h).1d(\'>5:1f\').Y(\'S\',\'1L\');f.G.8($5);o.R.8($5);$5.1M(o.C,o.13,2(){f.G.8($5);o.Q.8($5)});u 3}})})(1N);',62,113,'||function|this|var|ul|||call|op|||||||join|hoverClass||li|fn|each|menu|path||over|hideSuperfishUl|shadowClass||browser|return|not|addClass|if|pathClass|bcClass|true|out|animation|dropShadows|retainPath|length|IE7fix|sfTimer|menuClass|superfish|parents|getMenu|arrowClass|addArrow|clearTimeout|anchorClass|onShow|onBeforeShow|visibility|extend|defaults|showSuperfishUl|false|pathLevels|css|has|removeClass|hoverIntent|disableHI|speed|autoArrows|off|version|arrow|eq|opacity|span|onInit|delay|find|msie|hidden|onHide|first|serial|class|blur|undefined|toggleClass|focus|ddBreadcrumb|ddJsEnabled|ddWithUl|ddSubIndicator|ddShadow|ddHover|overideThisToUse|800|show|child|normal|hover|filter|slice|clone|append|add|inArray|hide|setTimeout|siblings|187|sh|visible|animate|jQuery|push'.split('|'),0,{}));

/* JQUERY - Supersubs dropdown menu system */
/* view full source go here
   http://users.tpg.com.au/j_birch/plugins/superfish/
*/
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}(';(3($){$.5.6=3(k){1 l=$.r({},$.5.6.s,k);G 7.8(3(){1 h=$(7);1 o=$.H?$.r({},l,h.I()):l;1 j=$(\'<t J="u-v">&#K;</t>\').2({\'L\':0,\'M\':\'N\',\'O\':\'-P\',\'4\':\'w\'}).Q(h).4();$(\'#u-v\').R();$m=h.S(\'x\');$m.8(3(i){1 c=$m.T(i);1 d=c.y();1 e=d.y(\'a\');1 f=d.2(\'z-A\',\'U\').2(\'n\');1 g=c.B(d).B(e).2({\'n\':\'V\',\'4\':\'w\'}).C().C()[0].W/j;g+=o.D;E(g>o.p){g=o.p}X E(g<o.q){g=o.q}g+=\'Y\';c.2(\'4\',g);d.2({\'n\':f,\'4\':\'Z%\',\'z-A\':\'10\'}).8(3(){1 a=$(\'>x\',7);1 b=a.2(\'F\')!==11?\'F\':\'12\';a.2(b,g)})})})};$.5.6.s={q:9,p:13,D:0}})(14);',62,67,'|var|css|function|width|fn|supersubs|this|each||||||||||||||ULs|float||maxWidth|minWidth|extend|defaults|li|menu|fontsize|auto|ul|children|white|space|add|end|extraWidth|if|left|return|meta|data|id|8212|padding|position|absolute|top|999em|appendTo|remove|find|eq|nowrap|none|clientWidth|else|em|100|normal|undefined|right|25|jQuery'.split('|'),0,{}));



$(function()
{

		// Any tracking info here can be found within analytics under the content menu, event tracking.

		
		// remove target _blank off any link and replace with class="external".
		$('a[target^=_blank]')
				.addClass('external')
				.removeAttr('target', '_blank');

		// remove rel external off any link and replace with  class="external".
		$('a[rel^=external]')
				.addClass('external')
				.removeAttr('rel', 'external');
				

		// any links with rel="external" open in a new window
		$('a[class*="external"]').click(function()
		{
				$('a[class*="external"]').attr('target', '_blank');

						});
		
		
		// invoke a dropdown menu
		$('ul.ddMenu').superfish(
		{
				delay: 10,
				animation:   
				{
					height: 'show'
				},
				autoArrows: false,
				speed: 'normal',
				dropShadows: false
		});
		$('ul.ddMenu li li:last-child').addClass('end');
		
		
		/* clear text password and replace with hidden password input */
		$('#password-clear').show();
		$('#password-password').hide();
		
		$('#password-clear').focus(function() 
		{
			$('#password-clear').hide();
			$('#password-password').show();
			$('#password-password').focus();
		});
		$('#password-password').blur(function() 
		{
			if($('#password-password').val() == '') 
			{
				$('#password-clear').show();
				$('#password-password').hide();
			}
		});
});

( function ( $ ) {$.fn.sbPropCompat = typeof $.fn.prop !== 'undefined' ? $.fn.prop : $.fn.attr}( jQuery ) );

