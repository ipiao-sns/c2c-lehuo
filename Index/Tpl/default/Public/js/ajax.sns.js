pmc_in_script_time_9961=new Date()*1;(function(){function A(B){this.ops={url:null,method:"GET",async:true,cache:true,username:null,password:null,contentType:"application/x-www-form-urlencoded",charset:"UTF-8",scriptCharset:null,data:null,timeout:null,jsonp:"callback",dataType:"text",label:null,headers:null,onbefore:null,onsuccess:null,oncomplete:null,onerror:null,oncancel:null};BB.ObjectH.mix(this.ops,A.options,true);BB.ObjectH.mix(this.ops,B,true);this._xhr=null;this.completed=null;BB.CustEvent.createEvents(this,A.EVENTS);}BB.ObjectH.mix(A,{versions:["MSXML2.XMLHttp.6.0","MSXML2.XMLHttp.3.0","MSXML2.XMLHttp.5.0","MSXML2.XMLHttp.4.0","Msxml2.XMLHTTP","MSXML.XMLHttp","Microsoft.XMLHTTP"],EVENTS:["before","success","complete","error","cancel"],STATE_JSPERROR:1,STATE_JSERROR:2,STATE_JSSUCCESS:3,STATE_TIMEOUT:4,STATE_CANCEL:5,_xhrPool:[],options:{useXHRPool:false},getXHR:function(){if(A.options.useXHRPool&&A._xhrPool.length>0){return A._xhrPool.shift();}if(window.ActiveXObject){while(A.versions.length>0){try{return new ActiveXObject(A.versions[0]);}catch(B){A.versions.shift();continue;}}}else{if(window.XMLHttpRequest){return new XMLHttpRequest();}}},get:function(C,E,F){if(C&&BB.Dom.isElement(C)&&C.tagName.toLowerCase()=="form"){var D=C;C=D.action;F=E;E=D;}if(typeof E=="function"){F=E;E="";}var B=new A({url:C,method:"get",data:E,onsuccess:F});B.request();return B;},post:function(C,E,F){if(C&&BB.Dom.isElement(C)&&C.tagName.toLowerCase()=="form"){var D=C;C=D.action;F=E;E=D;}if(typeof E=="function"){F=E;E="";}var B=new A({url:C,method:"post",data:E,onsuccess:F});B.request();return B;},getScript:function(C,D,E){var B=new A({url:C,data:D,dataType:"script",onsuccess:E});B.request();return B;},getJSON:function(C,D,E){var B=new A({url:C,method:"get",data:D,dataType:"json",onsuccess:E});B.request();return B;},getJSONP:function(C,D,E){var B=new A({url:C,method:"get",data:D,dataType:"jsonp",onsuccess:E});B.request();return B;},isSuccess:function(C){var B=C.status;return !B||(B>=200&&B<300)||B==304;},isProcessing:function(C){var B=C.readyState;return B>0&&B<4;},_stringify:function(D){if(D==null||typeof D=="undefined"){return"";}if(typeof D=="string"){return D;}if(BB.Dom.isElement(D)&&D.tagName.toLowerCase()=="form"){return BB.Dom.encodeURIForm(D);}if(typeof D=="object"){var E=[];for(var C in D){if(D[C]==null){continue;}if(D[C].constructor==Array){for(var B=0;B<D[C].length;B++){E.push(encodeURIComponent(C)+"="+encodeURIComponent(D[C][B]));}}else{E.push(encodeURIComponent(C)+"="+encodeURIComponent(D[C]));}}return E.join("&");}return"";}});BB.ObjectH.mix(A.prototype,{_jsonp_num:0,_setRequestHeaders:function(){var D={"x-baidu-ie":"utf-8","x-baidu-rf":"json"};D["Content-type"]=this.ops.contentType+(this.ops.charset?"; charset="+this.ops.charset:"");var C=this.ops.headers;if(typeof (C)=="object"){BB.ObjectH.mix(D,C,true);}for(var B in D){this._xhr.setRequestHeader(B,D[B]);}},request:function(B,K,G){this.completed=false;var C=this.ops,J=this;if((C.onbefore&&C.onbefore.call(this,C)===false)||this.fire("before")===false){return ;}if(arguments.length==1||BB.Dom.isElement(B)||typeof B=="object"){G=B;B=C.url;K=C.method;}else{B=B||C.url;K=K||C.method;G=G||C.data;}if(BB.Dom.isElement(G)&&G.tagName.toLowerCase()=="form"){B=G.action||B;K=G.method||K;}G=A._stringify(G);function D(Q,R){Q=Q.indexOf("?")!=-1?Q+"&"+R:Q+"?"+R;return Q;}if(G&&K.toLowerCase()=="get"){B=D(B,G);}if(!C.cache&&K.toLowerCase()=="get"){var O=+new Date,H=O+"="+O;B=D(B,H);}var J=this;var I=C.dataType,L,P;if(I=="jsonp"){var M="jsonp"+this._jsonp_num++,E=C.jsonp+"="+M;B=B.indexOf("?")!=-1?B+"&"+E:B+"?"+E;this._setupJSONP(B,C,M);return ;}if(I=="script"){L=document.getElementsByTagName("head")[0];P=document.createElement("script");P.src=B;if(C.scriptCharset){P.charset=C.scriptCharset;}if(C.dataType=="script"){var F=false;P.onerror=P.onload=P.onreadystatechange=function(){if(!F&&(!this.readyState||this.readyState=="loaded"||this.readyState=="complete")){if(J._timer){clearTimeout(J._timer);}F=true;if(C.label&&C.onerror){try{BB.StringH.evalJs(C.label);J._handleComplete(A.STATE_JSSUCCESS);}catch(Q){J._handleComplete(A.STATE_JSERROR);}}else{J._handleComplete(A.STATE_JSSUCCESS);}P.onerror=P.onload=P.onreadystatechange=null;L.removeChild(P);}};}L.appendChild(P);if(C.onerror&&C.timeout>0){this._timer=setTimeout(function(){J._handleComplete(A.STATE_TIMEOUT);},this.ops.timeout);}return ;}this._xhr=A.getXHR();var N=this._xhr;if(this.ops.async){this._xhr.onreadystatechange=function(){if(N.readyState==4){J._handleComplete();N.onreadystatechange=new Function();if(A.options.useXHRPool){A._xhrPool.push(N);}}};}if(C.username){this._xhr.open(K.toUpperCase(),B,C.async,C.username,C.password);}else{this._xhr.open(K.toUpperCase(),B,C.async);}this._setRequestHeaders();if(G&&K.toLowerCase()=="post"){this._xhr.send(G);}else{this._xhr.send(null);}if(C.timeout>0&&C.async){this._checkTimeout();}if(!this.ops.async){this._handleComplete();}},_handleComplete:function(G,F){this.completed=true;var D=this.ops;var H=this._xhr;switch(G){case A.STATE_JSSUCCESS:D.onsuccess&&D.onsuccess.call(this,F,D);this.fire("success");break;case A.STATE_JSERROR:D.onerror&&D.onerror.call(this,null,D,"script");this.fire("error");break;case A.STATE_JSPERROR:D.onerror&&D.onerror.call(this,null,D,"jsonp");this.fire("error");break;case A.STATE_TIMEOUT:if(D.onerror){D.onerror.call(this,H,D,"timeout");}if(this._timer){clearTimeout(this._timer);}this.fire("error");break;case A.STATE_CANCEL:if(D.oncancel){D.oncancel.call(this,H,D);}this.fire("cancel");break;default:if(this._byCanceled){this._byCanceled=false;return ;}if(A.isSuccess(H)&&D.onsuccess){var C=H.getResponseHeader("content-type"),B=D.dataType,I=B=="xml"||!B&&C&&C.indexOf("xml")>=0,E=I?H.responseXML:H.responseText;if(B=="json"){E=new Function("return "+E)();}D.onsuccess.call(this,E,D);}if(!A.isSuccess(H)&&D.onerror){D.onerror.call(this,H,D,"status");}if(A.isSuccess(H)){this.fire("success");}else{this.fire("error");}}if(D.oncomplete){D.oncomplete.call(this,H,D);}this.fire("complete");},_checkTimeout:function(){if(this.ops.timeout>0){var B=this;this._timer=setTimeout(function(){if(A.isProcessing(B._xhr)){B._abortXHR();B._handleComplete(A.STATE_TIMEOUT);}},this.ops.timeout);}},_abortXHR:function(){if(this._xhr){this._byCanceled=true;this._xhr.abort();this._handleComplete(A.STATE_CANCEL);}},cancel:function(){this._abortXHR();},_setupJSONP:function(B,C,K){var J=this;if(C.onerror&&C.timeout>0){this._timer=setTimeout(function(){J._handleComplete(A.STATE_TIMEOUT);},C.timeout);}if(BB.Env.ie){var M=document.createDocumentFragment(),N=document.createElement("script");function D(){M=N=N.onreadystatechange=M[K]=null;}if(C.scriptCharset){N.charset=C.scriptCharset;}M[K]=function(O){if(J._timer){clearTimeout(J._timer);}J._handleComplete(A.STATE_JSSUCCESS,O);D();};N.onreadystatechange=function(){if(N.readyState=="loaded"){J._handleComplete(A.STATE_JSPERROR);D();}};N.src=B;M.appendChild(N);}else{var F=document.createElement("iframe");F.style.display="none";function G(){F.callback=F.errorcallback=null;F.src="about:blank",F.parentNode.removeChild(F),F=null;}var E=C.scriptCharset;F.callback=function(O){if(J._timer){clearTimeout(J._timer);}J._handleComplete(A.STATE_JSSUCCESS,O);G();};F.errorcallback=function(){J._handleComplete(A.STATE_JSPERROR);G();};try{document.body.appendChild(F);var L=F.contentWindow.document;var I='<script type="text/javascript">function '+K+"(data) { window.frameElement.callback(data); }</script>";if(E){I+='<script type="text/javascript" src="'+B+'" charset="'+E+'"></script>';}else{I+='<script type="text/javascript" src="'+B+'"></script>';}I+='<script type="text/javascript">window.setTimeout("try { window.frameElement.errorcallback(); } catch (exp) {}", 1)</script>';L.open();L.write(I);L.close();}catch(H){}}}});BB.provide("Ajax",A);})();if(!Ajax){Ajax={};}Ajax.Delay=950;Ajax.opResults=function(Results,url){if(!Results){return false;}if(typeof Results=="string"){if(Results.replace(/(\n|\r)+/g,"").trim().substr(0,1)!="{"){return Results;}else{try{eval("var status="+Results);}catch(e){alert("返回出错，返回的内容为：\n"+Results);return{err:"inter"};}}}else{var status=Results;}status.isop=true;switch(status.err){case"mcphp.ok":if(url!=false){if(url){if(url===true){setTimeout("window.location = window.location.href;window.location.reload(true);",Ajax.Delay);}else{setTimeout("window.location='"+url+"'",Ajax.Delay);}}else{if(status.data.url==null){setTimeout("window.location = window.location.href;window.location.reload(true);",Ajax.Delay);}else{setTimeout("window.location='"+status.data.url+"'",Ajax.Delay);}}}else{status.isop=false;}break;case"gmap.internal":alert("验证码过期，请刷新页面后重试！");break;case"mcphp.u_vcode":var els=document.getElementsByName("_vcode"),elKeys=document.getElementsByName("_vcode_key");if(els.length>0&&elKeys.length>0){var el=els[0],elKey=elKeys[0];Valid.fail(el,"请检查您输入的验证码。",true);if($("_vcode_img")){$("_vcode_img").src="/vcode?k="+elKey.value+"&random="+Math.random();}}break;case"mcphp.u_input":for(var i in status.data){var tempEl=document.getElementsByName(i);try{if(tempEl.length>0){var unfound=true;if(tempEl.length==1){Valid.fail(tempEl[0],"您输入的内容格式不对或超长，请检查是否包含特殊字符。",true);}else{for(var x=0;x<tempEl.length;x++){if(status.fields[i]==tempEl[x].value.encode4Html()){Valid.fail(tempEl[x],"您输入的内容格式不对或超长，请检查是否包含特殊字符。",true);unfound=false;break;}}}}}catch(e){alert("您输入的内容格式不对或超长，请检查是否包含特殊字符。");}}break;case"mcphp.u_notfound":alert("您请求的页面不存在！");break;case"mcphp.u_antispam":alert("您提交的内容包含敏感词汇，请检查后重新提交！");break;case"mcphp.u_deny":alert("您的操作不允许！");break;case"mcphp.u_bfilter":alert("您的操作太频繁！");break;case"login":case"mcphp.u_login":try{User.Power.login();}catch(e){try{top.User.Power.login();}catch(e1){location.href="http://www.leho.com/";}}break;case"mcphp.u_power":window.location="http://co.youa.baidu.com/content/misc/err/nopower/index.html";break;case"mcphp.fatal":case"mar.sys_inter":alert("系统错误，请稍后再试。");break;default:status.isop=false;}return status;};Ajax.CSRF=0;(function(){var A=Ajax.post;Ajax.post=function(B,C,D){if(Ajax.CSRF){A("/_posttoken",function(F){F=Ajax.opResults(F,false);if(F.err=="mcphp.ok"){if(B&&BB.Dom.isElement(B)&&B.tagName.toLowerCase()=="form"){var E=B;B=E.action;D=C;C=E;}if(typeof C=="function"){D=C;C="";}C=Ajax._stringify(C);C=C==""?"_posttoken="+F.data.token:C+"&_posttoken="+F.data.token;A(B,C,D);}});}else{A(B,C,D);}};})();(function(){var H=window.BB,E=H.ObjectH.mix,D=H.Helper,F=H.Dom,C=H.NodeW,B=D.applyTo,A=D.methodizeTo;var G={ajaxForm:function(K,I){K=$(K);if(!K){return ;}var J={validate:true,delay:1000,freeze:3000,url:null,before:null,errors:null,after:null,success:function(M){if(J.status){setTimeout(function(){$$(J.status).hide();},J.delay);}var P=Ajax.Delay;Ajax.Delay=J.delay;var O=Ajax.opResults(M,J.url);Ajax.Delay=P;if(J.after){var N=J.after(O);if(N===false){return ;}}if(O.isop){return ;}if(J.errors){for(var L in J.errors){if(O.err==L){alert(J.errors[L]);break;}}}}};E(J,I,true);$$(K).attr("data--ban",J.freeze).on("submit",function(L){L.preventDefault();if(J.validate&&!Valid.checkAll(this)){return ;}if(J.before&&!J.before(this)){return ;}Ajax.post(this,J.success);if(J.status){$$(J.status).show();}});}};G=D.mul(G);E(F,G);G=D.rwrap(G,C,0);B(G,C);A(G,C.prototype,"core");})();pmc_exec_time_9961=new Date()*1-pmc_in_script_time_9961;
