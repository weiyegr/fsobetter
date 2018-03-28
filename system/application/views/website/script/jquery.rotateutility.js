(function(E,C){var B={0:0};var A={0:1};var D={0:0};E.math={};E.math.sin=function(G){if(G<0){G=G+360}if(G>=360){G=G%360}if(B[G]==C){var F=Math.sin(G*Math.PI/180);B[G]=F}return B[G]};E.math.cos=function(G){if(G<0){G=G+360}if(G>=360){G=G%360}if(A[G]==C){var F=Math.cos(G*Math.PI/180);A[G]=F}return A[G]};E.math.tan=function(G){if(G<0){G=G+360}if(G>=360){G=G%360}if(D[G]==C){var F=Math.tan(G*Math.PI/180);D[G]=F}return D[G]};E.math.acos=function(F){var G=Math.acos(F);return Math.round(G*180/Math.PI)};E.parseInteger=function(G){var F=parseInt(G);if(isNaN(F)){return 0}return F};E.divrotate=function(L,G,M,F){L=E(L);var H=L.width();var K=L.height();if(F){H=F[0];K=F[1]}if(M){var J=M[0];var I=M[1];if(E.browser.msie&&E.browser.version<9){H=parseInt(L.data("IEWidth"));K=parseInt(L.data("IEHeight"));J=L.data("IELeft");if(J==C){J=M[0];L.data("IELeft",J)}I=L.data("IETop");if(I==C){I=M[1];L.data("IETop",I)}ieRotate({degree:G,left:J,top:I,width:H,height:K,dom:L})}else{L[0].style.left=Math.round(J)+"px";L[0].style.top=Math.round(I)+"px"}}if(E.browser.safari||E.browser.mozilla||E.browser.opera||(E.browser.msie&&E.browser.version=="9.0")){ieRotate({degree:G,dom:L})}};E.fn.modattr=function(F,G){if(F=="leftpos"){var H=this.data("prop_leftpos");if(!H){H=[parseInt(this.css("left")),parseInt(this.css("top"))]}if(G!=C){this.data("prop_leftpos",G)}return H}if(F=="degree"){var H=this.data("deg");if(!H){H=0}if(G!=C){this.data("deg",G)}return H}if(F=="size"){var H=this.data("prop_size");if(!H){H=[this.width(),this.height()]}if(G!=C){this.data("prop_size",G)}return H}};E.divrotate.reversePos=function(N,H,I,M){var K=N[0];var J=N[1];var O=E.math.cos(H);var L=E.math.sin(H);if(E.browser.msie&&E.browser.version<9){var F=K;if(H<90){F=K+M*L}else{if(H<180){F=K+M*L-I*O}else{if(H<270){F=K-I*O}else{F=K}}}var G=J;if(H<90){G=J}else{if(H<180){G=J-M*O}else{if(H<270){G=J-M*O-I*L}else{G=J-I*L}}}return[F,G]}else{return N}};E.divrotate.getMaxDistance=function(N){var G=N.data("deg");var K=parseInt(N.css("left"));var J=parseInt(N.css("top"));var H=N.width();var M=N.height();var L=canv.width();var P,I,F;if(!G){P=K;I=L-H-K;F=J}else{if(G>360){G=G%360}var O=E.math.cos(G);var Q=E.math.sin(G);if(G<=90){P=K-M*Q;I=L-K-H*O;F=J}else{if(G>90&&G<=180){P=K-M*Q+H*O;I=L-K;F=J+M*O}else{if(G>180&&G<=270){P=K+H*O;I=L-K+M*Q;F=J+M*O+H*Q}else{if(G>270&&G<=360){P=K;I=L-K+M*Q-H*O;F=J+H*Q}}}}}return{left:P,right:I,top:F}};E.divrotate.getDegreeModMaxPointOrigin=function(P,H,O,I,S){var M=E.getElementFatherid(P);var F=E("#"+M).ab_pos_cnter("top");var R=E("#"+M).ab_pos_cnter("left")||0;var H=H;if(!H){var N=0;var K=I[0];var L=I[1];switch(S){case"left":N=O[0]+R;break;case"right":N=O[0]+K+R;break;case"top":N=O[1]+F;break;case"buttom":N=O[1]+L+F;break}return N}else{if(E.browser.msie&&E.browser.version<9){var N=0;switch(S){case"left":N=P.position().left;break;case"right":N=P.position().left+P.width();break;case"top":N=P.position().top;break;case"buttom":N=P.position().top+P.height();break}return N}var N=0;var K=I[0];var L=I[1];var Q=O[0];var J=O[1];if(H>360){H=H%360}var G=E.math.cos(H);var T=E.math.sin(H);switch(S){case"left":if(H<=90){N=Q-L*T}else{if(H>90&&H<=180){N=Q-L*T+K*G}else{if(H>180&&H<=270){N=Q+K*G}else{if(H>270&&H<=360){N=Q}}}}N+=R;break;case"right":if(H<=90){N=Q+K*G}else{if(H>90&&H<=180){N=Q}else{if(H>180&&H<=270){N=Q-L*T}else{if(H>270&&H<=360){N=Q-L*T+K*G}}}}N+=R;break;case"top":if(H<=90){N=J}else{if(H>90&&H<=180){N=J+L*G}else{if(H>180&&H<=270){N=J+L*G+K*T}else{if(H>270&&H<=360){N=J+K*T}}}}N=N+F;break;case"buttom":if(H<=90){N=J+L*G+K*T}else{if(H>90&&H<=180){N=J+K*T}else{if(H>180&&H<=270){N=J}else{if(H>270&&H<=360){N=J+L*G}}}}N=N+F;break}return N}};E.divrotate.getDegreeModMaxPoint=function(F,H,J){var K=F.data("deg");if(H==null){H=[E.parseInteger(F.css("left")),E.parseInteger(F.css("top"))]}var I=F.width();var G=F.height();return E.divrotate.getDegreeModMaxPointOrigin(F,K,H,[I,G],J)};E.divrotate.getDegreeModMaxPointForRotate=function(F,K,H,J){var I=F.width();var G=F.height();return E.divrotate.getDegreeModMaxPointOrigin(F,K,H,[I,G],J)};E.divrotate.getDegreeResizeCursor=function(F){var G=F.data("deg");if(G==null){G=0}if(G>360){G=G%360}if(G<=22||G>=338){F.find(".ui-resizable-n").css("cursor","n-resize");F.find(".ui-resizable-e").css("cursor","e-resize");F.find(".ui-resizable-w").css("cursor","w-resize");F.find(".ui-resizable-s").css("cursor","s-resize");F.find(".ui-resizable-ne").css("cursor","ne-resize");F.find(".ui-resizable-se").css("cursor","se-resize");F.find(".ui-resizable-nw").css("cursor","nw-resize");F.find(".ui-resizable-sw").css("cursor","sw-resize")}else{if(G>22&&G<=67){F.find(".ui-resizable-n").css("cursor","ne-resize");F.find(".ui-resizable-e").css("cursor","se-resize");F.find(".ui-resizable-w").css("cursor","nw-resize");F.find(".ui-resizable-s").css("cursor","sw-resize");F.find(".ui-resizable-ne").css("cursor","e-resize");F.find(".ui-resizable-se").css("cursor","s-resize");F.find(".ui-resizable-nw").css("cursor","n-resize");F.find(".ui-resizable-sw").css("cursor","w-resize")}else{if(G>67&&G<=112){F.find(".ui-resizable-n").css("cursor","e-resize");F.find(".ui-resizable-e").css("cursor","s-resize");F.find(".ui-resizable-w").css("cursor","n-resize");F.find(".ui-resizable-s").css("cursor","w-resize");F.find(".ui-resizable-ne").css("cursor","se-resize");F.find(".ui-resizable-se").css("cursor","sw-resize");F.find(".ui-resizable-nw").css("cursor","ne-resize");F.find(".ui-resizable-sw").css("cursor","nw-resize")}else{if(G>112&&G<=157){F.find(".ui-resizable-n").css("cursor","se-resize");F.find(".ui-resizable-e").css("cursor","sw-resize");F.find(".ui-resizable-w").css("cursor","ne-resize");F.find(".ui-resizable-s").css("cursor","nw-resize");F.find(".ui-resizable-ne").css("cursor","s-resize");F.find(".ui-resizable-se").css("cursor","w-resize");F.find(".ui-resizable-nw").css("cursor","e-resize");F.find(".ui-resizable-sw").css("cursor","n-resize")}else{if(G>157&&G<=202){F.find(".ui-resizable-n").css("cursor","s-resize");F.find(".ui-resizable-e").css("cursor","w-resize");F.find(".ui-resizable-w").css("cursor","e-resize");F.find(".ui-resizable-s").css("cursor","n-resize");F.find(".ui-resizable-ne").css("cursor","sw-resize");F.find(".ui-resizable-se").css("cursor","nw-resize");F.find(".ui-resizable-nw").css("cursor","se-resize");F.find(".ui-resizable-sw").css("cursor","ne-resize")}else{if(G>202&&G<=247){F.find(".ui-resizable-n").css("cursor","sw-resize");F.find(".ui-resizable-e").css("cursor","nw-resize");F.find(".ui-resizable-w").css("cursor","se-resize");F.find(".ui-resizable-s").css("cursor","ne-resize");F.find(".ui-resizable-ne").css("cursor","w-resize");F.find(".ui-resizable-se").css("cursor","n-resize");F.find(".ui-resizable-nw").css("cursor","s-resize");F.find(".ui-resizable-sw").css("cursor","e-resize")}else{if(G>247&&G<=292){F.find(".ui-resizable-n").css("cursor","w-resize");F.find(".ui-resizable-e").css("cursor","n-resize");F.find(".ui-resizable-w").css("cursor","s-resize");F.find(".ui-resizable-s").css("cursor","e-resize");F.find(".ui-resizable-ne").css("cursor","nw-resize");F.find(".ui-resizable-se").css("cursor","ne-resize");F.find(".ui-resizable-nw").css("cursor","sw-resize");F.find(".ui-resizable-sw").css("cursor","se-resize")}else{if(G>292&&G<=337){F.find(".ui-resizable-n").css("cursor","nw-resize");F.find(".ui-resizable-e").css("cursor","ne-resize");F.find(".ui-resizable-w").css("cursor","sw-resize");F.find(".ui-resizable-s").css("cursor","se-resize");F.find(".ui-resizable-ne").css("cursor","n-resize");F.find(".ui-resizable-se").css("cursor","e-resize");F.find(".ui-resizable-nw").css("cursor","w-resize");F.find(".ui-resizable-sw").css("cursor","s-resize")}}}}}}}}};E.divrotate.getDegreeResizeChange=function(N,Y,S,K,M){var R=N.data("deg");if(R>360){R=R%360}var O=Math.sin(R*Math.PI/180);var V=Math.cos(R*Math.PI/180);if(E.browser.msie&&E.browser.version<9){var G=N.data("IEWidth");var J=N.data("IEHeight");if(R>=0&&R<90){var Z=S.left+J*O,H=S.top}else{if(R>=90&&R<180){var Z=J*O-G*V+S.left,H=S.top-J*V}else{if(R>180&&R<=270){var Z=S.left-G*V,H=S.top-G*O-J*V}else{if(R>270&&R<360){var Z=S.left,H=G*V+S.top}}}}}else{var G=K.width;var J=K.height;var Z=S.left,H=S.top}var L=Y[0];var U=Y[1];var Q=E.math.tan(R);var T,P,X;var I=function(a){T=E.math.acos((L+a*U)/(Math.sqrt(L*L+U*U)*Math.sqrt(1+a*a)));P=Math.sqrt(L*L+U*U)*E.math.sin(T);X=L*a-U};var W=function(a){T=E.math.acos((L-a*U)/(Math.sqrt(L*L+U*U)*Math.sqrt(1+a*a)));P=Math.sqrt(L*L+U*U)*E.math.sin(T);X=0-(L*a+U)};if(E.browser.msie&&E.browser.version<9){var F=null;switch(M){case"n":I(Q);if(X==0){return{}}if(R<=90){if(X>0){F={height:Math.round(J+P),left:Math.round(Z+P*E.math.sin(R)-(J+P)*E.math.sin(R)),top:Math.round(H-P*E.math.cos(R))}}else{if(X<0){F={height:Math.round(J-P),left:Math.round(Z-P*E.math.sin(R)-(J-P)*E.math.sin(R)),top:Math.round(H+P*E.math.cos(R))}}}}else{if(R>270&&R<360){if(X>0){F={height:Math.round(J+P),left:Math.round(Z+P*E.math.sin(R)),top:Math.round(H-P*E.math.cos(R)-G*E.math.cos(R))}}else{if(X<0){F={height:Math.round(J-P),left:Math.round(Z-P*E.math.sin(R)),top:Math.round(H+P*E.math.cos(R)-G*E.math.cos(R))}}}}else{if(R>90&&R<=180){if(X>0){F={height:Math.round(J-P),left:Math.round(Z-P*E.math.sin(R)-(J-P)*E.math.sin(R)+G*E.math.cos(R)),top:Math.round(H+P*E.math.cos(R)+(J-P)*E.math.cos(R))}}else{if(X<0){F={height:Math.round(J+P),left:Math.round(Z+P*E.math.sin(R)-(J+P)*E.math.sin(R)+G*E.math.cos(R)),top:Math.round(H-P*E.math.cos(R)+(J+P)*E.math.cos(R))}}}}else{if(R>180&&R<=270){if(X>0){F={height:Math.round(J-P),left:Math.round(Z-P*E.math.sin(R)+G*E.math.cos(R)),top:Math.round(H+P*E.math.cos(R)+(J-P)*E.math.cos(R)+G*E.math.sin(R))}}else{if(X<0){F={height:Math.round(J+P),left:Math.round(Z+P*E.math.sin(R)+G*E.math.cos(R)),top:Math.round(H-P*E.math.cos(R)+(J+P)*E.math.cos(R)+G*E.math.sin(R))}}}}}}}break;case"s":I(Q);if(X==0){return{}}if(R<=90){if(X>0){F={width:G,height:Math.round(J-P),left:Math.round(Z-(J-P)*E.math.sin(R)),top:H}}else{if(X<0){F={width:G,height:Math.round(J+P),left:Math.round(Z-(J+P)*E.math.sin(R)),top:H}}}}else{if(R>90&&R<=180){if(X>0){F={width:G,height:Math.round(J+P),left:Math.round(Z-(J+P)*E.math.sin(R)+G*E.math.cos(R)),top:Math.round(H+(J+P)*E.math.cos(R))}}else{if(X<0){F={width:G,height:Math.round(J-P),left:Math.round(Z-(J-P)*E.math.sin(R)+G*E.math.cos(R)),top:Math.round(H+(J-P)*E.math.cos(R))}}}}else{if(R>180&&R<=270){if(X>0){F={width:G,height:Math.round(J+P),left:Math.round(Z+G*E.math.cos(R)),top:Math.round(H+(J+P)*E.math.cos(R)+G*E.math.sin(R))}}else{if(X<0){F={width:G,height:Math.round(J-P),left:Math.round(Z+G*E.math.cos(R)),top:Math.round(H+(J-P)*E.math.cos(R)+G*E.math.sin(R))}}}}else{if(R>270&&R<360){if(X>0){F={width:G,height:Math.round(J-P),left:Z,top:Math.round(H-G*E.math.cos(R))}}else{if(X<0){F={width:G,height:Math.round(J+P),left:Z,top:Math.round(H-G*E.math.cos(R))}}}}}}}break;case"w":W(1/Q);if(X==0){return{}}if(R<=90){if(X>0){F={width:Math.round(G+P),height:J,left:Math.round(Z-P*E.math.cos(R)-J*E.math.sin(R)),top:Math.round(H-P*E.math.sin(R))}}else{if(X<0){F={width:Math.round(G-P),height:J,left:Math.round(Z+P*E.math.cos(R)-J*E.math.sin(R)),top:Math.round(H+P*E.math.sin(R))}}}}else{if(R>90&&R<=180){if(X>0){F={width:Math.round(G+P),height:J,left:Math.round(Z-P*E.math.cos(R)-J*E.math.sin(R)+(G+P)*E.math.cos(R)),top:Math.round(H-P*E.math.sin(R)+J*E.math.cos(R))}}else{if(X<0){F={width:Math.round(G-P),height:J,left:Math.round(Z+P*E.math.cos(R)-J*E.math.sin(R)+(G-P)*E.math.cos(R)),top:Math.round(H+P*E.math.sin(R)+J*E.math.cos(R))}}}}else{if(R>180&&R<=270){if(X>0){F={width:Math.round(G-P),height:J,left:Math.round(Z+P*E.math.cos(R)+(G-P)*E.math.cos(R)),top:Math.round(H+P*E.math.sin(R)+(G-P)*E.math.sin(R)+J*E.math.cos(R))}}else{if(X<0){F={width:Math.round(G+P),height:J,left:Math.round(Z-P*E.math.cos(R)+(G+P)*E.math.cos(R)),top:Math.round(H-P*E.math.sin(R)+(G+P)*E.math.sin(R)+J*E.math.cos(R))}}}}else{if(R>270&&R<360){if(X>0){F={width:Math.round(G-P),height:J,left:Math.round(Z+P*E.math.cos(R)),top:Math.round(H+P*E.math.sin(R)-(G-P)*E.math.cos(R))}}else{if(X<0){F={width:Math.round(G+P),height:J,left:Math.round(Z-P*E.math.cos(R)),top:Math.round(H-P*E.math.sin(R)-(G+P)*E.math.cos(R))}}}}}}}break;case"e":W(1/Q);if(X==0){return{}}if(R<=90){if(X>0){F={width:Math.round(G-P),height:J,left:Z-J*E.math.sin(R),top:H}}else{if(X<0){F={width:Math.round(G+P),height:J,left:Z-J*E.math.sin(R),top:H}}}}else{if(R>90&&R<=180){if(X>0){F={width:Math.round(G-P),height:J,left:Z-J*E.math.sin(R)+(G-P)*E.math.cos(R),top:H+J*E.math.cos(R)}}else{if(X<0){F={width:Math.round(G+P),height:J,left:Z-J*E.math.sin(R)+(G+P)*E.math.cos(R),top:H+J*E.math.cos(R)}}}}else{if(R>180&&R<=270){if(X>0){F={width:Math.round(G+P),height:J,left:Z+(G+P)*E.math.cos(R),top:H+(G+P)*E.math.sin(R)+J*E.math.cos(R)}}else{if(X<0){F={width:Math.round(G-P),height:J,left:Z+(G-P)*E.math.cos(R),top:H+(G-P)*E.math.sin(R)+J*E.math.cos(R)}}}}else{if(R>270&&R<360){if(X>0){F={width:Math.round(G+P),height:J,left:Z,top:H-(G+P)*E.math.cos(R)}}else{if(X<0){F={width:Math.round(G-P),height:J,left:Z,top:H-(G-P)*E.math.cos(R)}}}}}}}break}N.data("IEWidth_tmp",F.width||G).data("IEHeight_tmp",F.height||J);E(".propblk,.posblk").remove();return F}else{switch(M){case"n":I(Q);if(X==0){return{}}if(R<=90||(R>270&&R<=360)){if(X>0){return{height:Math.round(J+P),left:Math.round(Z+P*E.math.sin(R)),top:Math.round(H-P*E.math.cos(R))}}else{if(X<0){return{height:Math.round(J-P),left:Math.round(Z-P*E.math.sin(R)),top:Math.round(H+P*E.math.cos(R))}}}}else{if(R>90&&R<=270){if(X>0){return{height:Math.round(J-P),left:Math.round(Z-P*E.math.sin(R)),top:Math.round(H+P*E.math.cos(R))}}else{if(X<0){return{height:Math.round(J+P),left:Math.round(Z+P*E.math.sin(R)),top:Math.round(H-P*E.math.cos(R))}}}}}break;case"s":I(Q);if(X==0){return{}}if(R<=90||(R>270&&R<=360)){if(X>0){return{height:Math.round(J-P)}}else{if(X<0){return{height:Math.round(J+P)}}}}else{if(R>90&&R<=270){if(X>0){return{height:Math.round(J+P)}}else{if(X<0){return{height:Math.round(J-P)}}}}}break;case"w":W(1/Q);if(X==0){return{}}if(R<=180){if(X>0){return{width:Math.round(G+P),left:Math.round(Z-P*E.math.cos(R)),top:Math.round(H-P*E.math.sin(R))}}else{if(X<0){return{width:Math.round(G-P),left:Math.round(Z+P*E.math.cos(R)),top:Math.round(H+P*E.math.sin(R))}}}}else{if(R>180&&R<=360){if(X>0){return{width:Math.round(G-P),left:Math.round(Z+P*E.math.cos(R)),top:Math.round(H+P*E.math.sin(R))}}else{if(X<0){return{width:Math.round(G+P),left:Math.round(Z-P*E.math.cos(R)),top:Math.round(H-P*E.math.sin(R))}}}}}break;case"e":W(1/Q);if(X==0){return{}}if(R<=180){if(X>0){return{width:Math.round(G-P)}}else{if(X<0){return{width:Math.round(G+P)}}}}else{if(R>180&&R<=360){if(X>0){return{width:Math.round(G+P)}}else{if(X<0){return{width:Math.round(G-P)}}}}}break}}}})(jQuery);function rotateWithCenter(L,E){L=$(L);var B=L.modattr("leftpos");var O=B[0];var M=B[1];var D=L.modattr("degree");var F=L.width();var I=L.height();var K=$.math.sin(D);var N=$.math.cos(D);var G=[O+F/2*N-I/2*K,M+I/2*N+F/2*K];var A=$.math.sin(E);var J=$.math.cos(E);var C=G[0]+I/2*A-F/2*J;var H=G[1]-F/2*A-I/2*J;$.divrotate(L,E,[C,H]);toolbarRotate(L,E,{w:F,h:I})}function toolbarRotate(M,T,A,P){if(!P){P=$(".propblk")}if(P.length==0){return}M=$(M);if(P.is(".propblk")){var Q=M.data("toolbarsize")}else{Q=M.data("posizeblksize");if(T){P.data("rotatedegree",T)}}if(!Q){Q=[P.width(),P.height()];M.data("toolbarsize",Q)}if($.browser.msie&&$.browser.version<9){var K=Q[0];var D=Q[1];var C=$("#"+M.attr("id")).width();var G=$("#"+M.attr("id")).height();var F=$.resetModToolbarLeft($("#"+M.attr("id")).position().left);var U=$("#"+M.attr("id")).position().top;var J=T%360;var E=M.data("IEWidth");var N=M.data("IEHeight");if(M.data("sinx")==undefined){var L=Math.PI*J/180;var V=Math.cos(L);var O=Math.sin(L);M.data("sinx",O);M.data("cosx",V)}else{var V=M.data("cosx");var O=M.data("sinx")}if(J>0&&J<=90){var B=(C+F)-D*O;var X=U+(G-N*V)}else{if(J>90&&J<=180){var B=C+F-(D*O-K*V)-(-1*V*E);var X=G+U+D*V}else{if(J>180&&J<=270){var B=F+K*V;var X=U-N*V+D*V+K*O}else{if(J>270&&J<360){var B=F+E*V;var X=U+K*O}}}}P.css({filter:"progid:DXImageTransform.Microsoft.Matrix(M11="+V+",M12="+(-O)+",M21="+O+",M22="+V+",SizingMethod='auto expand')","left":B+"px","top":X+"px"})}else{var Y=M.data("prop_size");var C=0;if(Y){C=Y[0]}else{C=M.width()}if(!T){T=0}var Z=M.data("prop_leftpos");var R=parseInt(M.css("left"));var S=$.resetModToolbarLeft(parseInt(R));if(M.attr("fatherid")&&M.attr("fatherid")!=""&&$("#"+M.attr("fatherid")).is(".cstlayer")){S=R}var W=parseInt(M.css("top"));if(Z){R=Z[0];W=Z[1]}var G=35;var I=$.math.sin(T)*G+S+canv.offset().left-(window.MobileOffsetLeft||0)+$("#"+$.getElementFatherid(M)).ab_pos_cnter("left");var H=parseInt(W)-$.math.cos(T)*G+$("#"+$.getElementFatherid(M)).ab_pos_cnter("top");$.divrotate(P,T,[I,H],Q)}}function modPosRotate(K,R,B){if($(".posblk").length==0){return}K=$(K);var S=K.data("modpossize");if(!S){S=[$(".posblk").width(),$(".posblk").height()];K.data("modpossize",S)}if(!R){R=0}var W=K.data("prop_leftpos");var U=parseInt(K.css("left"));var Q=parseInt(K.css("top"));if(W){U=W[0];Q=W[1]}K.data("deg",R);$(".posblk").find(".posblk-position").html(Math.round(U)+","+Math.round(Q)).andSelf().find(".posblk-deg").html(K.data("deg")%360);if($.browser.msie&&$.browser.version<9){var X=S[0];var L=S[1];var D=$("#"+K.attr("id")).width();var F=$("#"+K.attr("id")).height();var O=$("#"+K.attr("id")).position().left;var T=$("#"+K.attr("id")).position().top;var I=R%360;var E=K.data("IEWidth");var M=K.data("IEHeight");if(K.data("sinx")==undefined){var J=Math.PI*I/180;var A=Math.cos(J);var N=Math.sin(J);K.data("sinx",N);K.data("cosx",A)}else{var A=K.data("cosx");var N=K.data("sinx")}if(I>=0&&I<=90){var P=O+M*N;var C=T-L*A}else{if(I>90&&I<=180){var P=O+D+X*A;var C=T-M*A}else{if(I>180&&I<=270){var P=O-E*A+X*A+L*N;var C=T+F+X*N}else{if(I>270&&I<360){var P=O+L*N;var C=T-E*N-L*A+X*N}}}}$(".posblk").css({filter:"progid:DXImageTransform.Microsoft.Matrix(M11="+A+",M12="+(-N)+",M21="+N+",M22="+A+",SizingMethod='auto expand')","left":P+"px","top":C+"px"})}else{var V=K.data("prop_size");var D=0;if(V){D=V[0]+10}else{D=K.width()+10}var H=$.math.cos(R)*D+parseInt(U)+canv.offset().left-(window.MobileOffsetLeft||0)+$("#"+$.getElementFatherid(K)).ab_pos_cnter("left");var G=$.math.sin(R)*D+parseInt(Q)+$("#"+$.getElementFatherid(K)).ab_pos_cnter("top");$.divrotate($(".posblk"),R,[H,G],S)}}function getOldProxyFromSize(J,C,D,F){var I=C%360;var A=$("#"+J.attr("id")).position().left;var L=$("#"+J.attr("id")).position().top;var K=$("#"+J.attr("id"));if(J.data("sinx")==undefined){var E=Math.PI*I/180;var H=Math.cos(E);var G=Math.sin(E);J.data("sinx",G);J.data("cosx",H)}else{var G=J.data("sinx");var H=J.data("cosx")}if(I==0){var B=A;var M=L}else{if(I>=0&&I<=90){var B=(F*G+D*H-D)/2+A;var M=(D*G+F*H-F)/2+L}else{if(I>90&&I<=180){var B=(F*G-D*H-D)/2+A;var M=(D*G-F*H-F)/2+L}else{if(I>180&&I<=270){var B=(-1*F*G-D*H-D)/2+A;var M=(-1*D*G-F*H-F)/2+L}else{if(I>270&&I<360){var B=(-1*F*G+D*H-D)/2+A;var M=(-1*D*G+F*H-F)/2+L}}}}}return[B,M]}function getLeftPointProxy(B,A){var I=A%360;var C=B.position().left,D=B.position().top;var J=Math.PI*I/180;var G=Math.sin(J),H=Math.cos(J);var F=B.data("IEWidth"),E=B.data("IEHeight");if(I>=0&&I<90){return[Math.round(C+E*G),Math.round(D)]}else{if(I>=90&&I<180){return[Math.round(C+E*G-F*H),Math.round(D-E*H)]}else{if(I>=180&&I<270){return[Math.round(C-F*H),Math.round(D-E*H-F*G)]}else{if(I>=270&&I<360){return[Math.round(C),Math.round(D-F*G)]}}}}};