var q=null;window.PR_SHOULD_USE_CONTINUATION=!0,function(){function e(e){function t(e){var t=e.charCodeAt(0);if(92!==t)return t;var i=e.charAt(1);return(t=u[i])?t:i>="0"&&"7">=i?parseInt(e.substring(1),8):"u"===i||"x"===i?parseInt(e.substring(2),16):e.charCodeAt(1)}function i(e){return 32>e?(16>e?"\\x0":"\\x")+e.toString(16):(e=String.fromCharCode(e),("\\"===e||"-"===e||"["===e||"]"===e)&&(e="\\"+e),e)}function n(e){for(var n=e.substring(1,e.length-1).match(/\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\[0-3][0-7]{0,2}|\\[0-7]{1,2}|\\[\S\s]|[^\\]/g),e=[],r=[],s="^"===n[0],o=s?1:0,a=n.length;a>o;++o){var l=n[o];if(/\\[bdsw]/i.test(l))e.push(l);else{var h,l=t(l);a>o+2&&"-"===n[o+1]?(h=t(n[o+2]),o+=2):h=l,r.push([l,h]),65>h||l>122||(65>h||l>90||r.push([32|Math.max(65,l),32|Math.min(h,90)]),97>h||l>122||r.push([-33&Math.max(97,l),-33&Math.min(h,122)]))}}for(r.sort(function(e,t){return e[0]-t[0]||t[1]-e[1]}),n=[],l=[0/0,0/0],o=0;r.length>o;++o)a=r[o],a[0]<=l[1]+1?l[1]=Math.max(l[1],a[1]):n.push(l=a);for(r=["["],s&&r.push("^"),r.push.apply(r,e),o=0;n.length>o;++o)a=n[o],r.push(i(a[0])),a[1]>a[0]&&(a[1]+1>a[0]&&r.push("-"),r.push(i(a[1])));return r.push("]"),r.join("")}function r(e){for(var t=e.source.match(/\[(?:[^\\\]]|\\[\S\s])*]|\\u[\dA-Fa-f]{4}|\\x[\dA-Fa-f]{2}|\\\d+|\\[^\dux]|\(\?[!:=]|[()^]|[^()[\\^]+/g),i=t.length,r=[],a=0,l=0;i>a;++a){var h=t[a];"("===h?++l:"\\"===h.charAt(0)&&(h=+h.substring(1))&&l>=h&&(r[h]=-1)}for(a=1;r.length>a;++a)-1===r[a]&&(r[a]=++s);for(l=a=0;i>a;++a)h=t[a],"("===h?(++l,void 0===r[l]&&(t[a]="(?:")):"\\"===h.charAt(0)&&(h=+h.substring(1))&&l>=h&&(t[a]="\\"+r[l]);for(l=a=0;i>a;++a)"^"===t[a]&&"^"!==t[a+1]&&(t[a]="");if(e.ignoreCase&&o)for(a=0;i>a;++a)h=t[a],e=h.charAt(0),h.length>=2&&"["===e?t[a]=n(h):"\\"!==e&&(t[a]=h.replace(/[A-Za-z]/g,function(e){return e=e.charCodeAt(0),"["+String.fromCharCode(-33&e,32|e)+"]"}));return t.join("")}for(var s=0,o=!1,a=!1,l=0,h=e.length;h>l;++l){var c=e[l];if(c.ignoreCase)a=!0;else if(/[a-z]/i.test(c.source.replace(/\\u[\da-f]{4}|\\x[\da-f]{2}|\\[^UXux]/gi,""))){o=!0,a=!1;break}}for(var u={b:8,t:9,n:10,v:11,f:12,r:13},d=[],l=0,h=e.length;h>l;++l){if(c=e[l],c.global||c.multiline)throw Error(""+c);d.push("(?:"+r(c)+")")}return RegExp(d.join("|"),a?"gi":"g")}function t(e){function t(e){switch(e.nodeType){case 1:if(n.test(e.className))break;for(var i=e.firstChild;i;i=i.nextSibling)t(i);i=e.nodeName,("BR"===i||"LI"===i)&&(r[a]="\n",o[a<<1]=s++,o[1|a++<<1]=e);break;case 3:case 4:i=e.nodeValue,i.length&&(i=l?i.replace(/\r\n?/g,"\n"):i.replace(/[\t\n\r ]+/g," "),r[a]=i,o[a<<1]=s,s+=i.length,o[1|a++<<1]=e)}}var i,n=/(?:^|\s)nocode(?:\s|$)/,r=[],s=0,o=[],a=0;e.currentStyle?i=e.currentStyle.whiteSpace:window.getComputedStyle&&(i=document.defaultView.getComputedStyle(e,q).getPropertyValue("white-space"));var l=i&&"pre"===i.substring(0,3);return t(e),{a:r.join("").replace(/\n$/,""),c:o}}function i(e,t,i,n){t&&(e={a:t,d:e},i(e),n.push.apply(n,e.e))}function n(t,n){function r(e){for(var t=e.d,h=[t,"pln"],c=0,u=e.a.match(s)||[],d={},p=0,f=u.length;f>p;++p){var m,g=u[p],y=d[g],v=void 0;if("string"==typeof y)m=!1;else{var b=o[g.charAt(0)];if(b)v=g.match(b[1]),y=b[0];else{for(m=0;l>m;++m)if(b=n[m],v=g.match(b[1])){y=b[0];break}v||(y="pln")}!(m=y.length>=5&&"lang-"===y.substring(0,5))||v&&"string"==typeof v[1]||(m=!1,y="src"),m||(d[g]=y)}if(b=c,c+=g.length,m){m=v[1];var L=g.indexOf(m),x=L+m.length;v[2]&&(x=g.length-v[2].length,L=x-m.length),y=y.substring(5),i(t+b,g.substring(0,L),r,h),i(t+b+L,m,a(y,m),h),i(t+b+x,g.substring(x),r,h)}else h.push(t+b,y)}e.e=h}var s,o={};(function(){for(var i=t.concat(n),r=[],a={},l=0,h=i.length;h>l;++l){var c=i[l],u=c[3];if(u)for(var d=u.length;--d>=0;)o[u.charAt(d)]=c;c=c[1],u=""+c,a.hasOwnProperty(u)||(r.push(c),a[u]=q)}r.push(/[\S\s]/),s=e(r)})();var l=n.length;return r}function r(e){var t=[],i=[];e.tripleQuotedStrings?t.push(["str",/^(?:'''(?:[^'\\]|\\[\S\s]|''?(?=[^']))*(?:'''|$)|"""(?:[^"\\]|\\[\S\s]|""?(?=[^"]))*(?:"""|$)|'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$))/,q,"'\""]):e.multiLineStrings?t.push(["str",/^(?:'(?:[^'\\]|\\[\S\s])*(?:'|$)|"(?:[^"\\]|\\[\S\s])*(?:"|$)|`(?:[^\\`]|\\[\S\s])*(?:`|$))/,q,"'\"`"]):t.push(["str",/^(?:'(?:[^\n\r'\\]|\\.)*(?:'|$)|"(?:[^\n\r"\\]|\\.)*(?:"|$))/,q,"\"'"]),e.verbatimStrings&&i.push(["str",/^@"(?:[^"]|"")*(?:"|$)/,q]);var r=e.hashComments;return r&&(e.cStyleComments?(r>1?t.push(["com",/^#(?:##(?:[^#]|#(?!##))*(?:###|$)|.*)/,q,"#"]):t.push(["com",/^#(?:(?:define|elif|else|endif|error|ifdef|include|ifndef|line|pragma|undef|warning)\b|[^\n\r]*)/,q,"#"]),i.push(["str",/^<(?:(?:(?:\.\.\/)*|\/?)(?:[\w-]+(?:\/[\w-]+)+)?[\w-]+\.h|[a-z]\w*)>/,q])):t.push(["com",/^#[^\n\r]*/,q,"#"])),e.cStyleComments&&(i.push(["com",/^\/\/[^\n\r]*/,q]),i.push(["com",/^\/\*[\S\s]*?(?:\*\/|$)/,q])),e.regexLiterals&&i.push(["lang-regex",/^(?:^^\.?|[!+-]|!=|!==|#|%|%=|&|&&|&&=|&=|\(|\*|\*=|\+=|,|-=|->|\/|\/=|:|::|;|<|<<|<<=|<=|=|==|===|>|>=|>>|>>=|>>>|>>>=|[?@[^]|\^=|\^\^|\^\^=|{|\||\|=|\|\||\|\|=|~|break|case|continue|delete|do|else|finally|instanceof|return|throw|try|typeof)\s*(\/(?=[^*/])(?:[^/[\\]|\\[\S\s]|\[(?:[^\\\]]|\\[\S\s])*(?:]|$))+\/)/]),(r=e.types)&&i.push(["typ",r]),e=(""+e.keywords).replace(/^ | $/g,""),e.length&&i.push(["kwd",RegExp("^(?:"+e.replace(/[\s,]+/g,"|")+")\\b"),q]),t.push(["pln",/^\s+/,q," \r\n	 "]),i.push(["lit",/^@[$_a-z][\w$@]*/i,q],["typ",/^(?:[@_]?[A-Z]+[a-z][\w$@]*|\w+_t\b)/,q],["pln",/^[$_a-z][\w$@]*/i,q],["lit",/^(?:0x[\da-f]+|(?:\d(?:_\d+)*\d*(?:\.\d*)?|\.\d\+)(?:e[+-]?\d+)?)[a-z]*/i,q,"0123456789"],["pln",/^\\[\S\s]?/,q],["pun",/^.[^\s\w"-$'./@\\`]*/,q]),n(t,i)}function s(e,t){function i(e){switch(e.nodeType){case 1:if(s.test(e.className))break;if("BR"===e.nodeName)n(e),e.parentNode&&e.parentNode.removeChild(e);else for(e=e.firstChild;e;e=e.nextSibling)i(e);break;case 3:case 4:if(l){var t=e.nodeValue,r=t.match(o);if(r){var h=t.substring(0,r.index);e.nodeValue=h,(t=t.substring(r.index+r[0].length))&&e.parentNode.insertBefore(a.createTextNode(t),e.nextSibling),n(e),h||e.parentNode.removeChild(e)}}}}function n(e){function t(e,i){var n=i?e.cloneNode(!1):e,r=e.parentNode;if(r){var r=t(r,1),s=e.nextSibling;r.appendChild(n);for(var o=s;o;o=s)s=o.nextSibling,r.appendChild(o)}return n}for(;!e.nextSibling;)if(e=e.parentNode,!e)return;for(var i,e=t(e.nextSibling,0);(i=e.parentNode)&&1===i.nodeType;)e=i;h.push(e)}var r,s=/(?:^|\s)nocode(?:\s|$)/,o=/\r\n?|\n/,a=e.ownerDocument;e.currentStyle?r=e.currentStyle.whiteSpace:window.getComputedStyle&&(r=a.defaultView.getComputedStyle(e,q).getPropertyValue("white-space"));var l=r&&"pre"===r.substring(0,3);for(r=a.createElement("LI");e.firstChild;)r.appendChild(e.firstChild);for(var h=[r],c=0;h.length>c;++c)i(h[c]);t===(0|t)&&h[0].setAttribute("value",t);var u=a.createElement("OL");u.className="linenums";for(var d=Math.max(0,0|t-1)||0,c=0,p=h.length;p>c;++c)r=h[c],r.className="L"+(c+d)%10,r.firstChild||r.appendChild(a.createTextNode(" ")),u.appendChild(r);e.appendChild(u)}function o(e,t){for(var i=t.length;--i>=0;){var n=t[i];b.hasOwnProperty(n)?window.console&&console.warn("cannot override language handler %s",n):b[n]=e}}function a(e,t){return e&&b.hasOwnProperty(e)||(e=/^\s*</.test(t)?"default-markup":"default-code"),b[e]}function l(e){var i=e.g;try{var n=t(e.h),r=n.a;e.a=r,e.c=n.c,e.d=0,a(i,r)(e);var s=/\bMSIE\b/.test(navigator.userAgent),i=/\n/g,o=e.a,l=o.length,n=0,h=e.c,c=h.length,r=0,u=e.e,d=u.length,e=0;u[d]=l;var p,f;for(f=p=0;d>f;)u[f]!==u[f+2]?(u[p++]=u[f++],u[p++]=u[f++]):f+=2;for(d=p,f=p=0;d>f;){for(var m=u[f],g=u[f+1],y=f+2;d>=y+2&&u[y+1]===g;)y+=2;u[p++]=m,u[p++]=g,f=y}for(u.length=p;c>r;){var v,b=h[r+2]||l,L=u[e+2]||l,y=Math.min(b,L),x=h[r+1];if(1!==x.nodeType&&(v=o.substring(n,y))){s&&(v=v.replace(i,"\r")),x.nodeValue=v;var C=x.ownerDocument,w=C.createElement("SPAN");w.className=u[e+1];var S=x.parentNode;S.replaceChild(w,x),w.appendChild(x),b>n&&(h[r+1]=x=C.createTextNode(o.substring(y,b)),S.insertBefore(x,w.nextSibling))}n=y,n>=b&&(r+=2),n>=L&&(e+=2)}}catch(O){"console"in window&&console.log(O&&O.stack?O.stack:O)}}var h=["break,continue,do,else,for,if,return,while"],c=[[h,"auto,case,char,const,default,double,enum,extern,float,goto,int,long,register,short,signed,sizeof,static,struct,switch,typedef,union,unsigned,void,volatile"],"catch,class,delete,false,import,new,operator,private,protected,public,this,throw,true,try,typeof"],u=[c,"alignof,align_union,asm,axiom,bool,concept,concept_map,const_cast,constexpr,decltype,dynamic_cast,explicit,export,friend,inline,late_check,mutable,namespace,nullptr,reinterpret_cast,static_assert,static_cast,template,typeid,typename,using,virtual,where"],d=[c,"abstract,boolean,byte,extends,final,finally,implements,import,instanceof,null,native,package,strictfp,super,synchronized,throws,transient"],p=[d,"as,base,by,checked,decimal,delegate,descending,dynamic,event,fixed,foreach,from,group,implicit,in,interface,internal,into,is,lock,object,out,override,orderby,params,partial,readonly,ref,sbyte,sealed,stackalloc,string,select,uint,ulong,unchecked,unsafe,ushort,var"],c=[c,"debugger,eval,export,function,get,null,set,undefined,var,with,Infinity,NaN"],f=[h,"and,as,assert,class,def,del,elif,except,exec,finally,from,global,import,in,is,lambda,nonlocal,not,or,pass,print,raise,try,with,yield,False,True,None"],m=[h,"alias,and,begin,case,class,def,defined,elsif,end,ensure,false,in,module,next,nil,not,or,redo,rescue,retry,self,super,then,true,undef,unless,until,when,yield,BEGIN,END"],h=[h,"case,done,elif,esac,eval,fi,function,in,local,set,then,until"],g=/^(DIR|FILE|vector|(de|priority_)?queue|list|stack|(const_)?iterator|(multi)?(set|map)|bitset|u?(int|float)\d*)/,y=/\S/,v=r({keywords:[u,p,c,"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END"+f,m,h],hashComments:!0,cStyleComments:!0,multiLineStrings:!0,regexLiterals:!0}),b={};o(v,["default-code"]),o(n([],[["pln",/^[^<?]+/],["dec",/^<!\w[^>]*(?:>|$)/],["com",/^<\!--[\S\s]*?(?:--\>|$)/],["lang-",/^<\?([\S\s]+?)(?:\?>|$)/],["lang-",/^<%([\S\s]+?)(?:%>|$)/],["pun",/^(?:<[%?]|[%?]>)/],["lang-",/^<xmp\b[^>]*>([\S\s]+?)<\/xmp\b[^>]*>/i],["lang-js",/^<script\b[^>]*>([\S\s]*?)(<\/script\b[^>]*>)/i],["lang-css",/^<style\b[^>]*>([\S\s]*?)(<\/style\b[^>]*>)/i],["lang-in.tag",/^(<\/?[a-z][^<>]*>)/i]]),["default-markup","htm","html","mxml","xhtml","xml","xsl"]),o(n([["pln",/^\s+/,q," 	\r\n"],["atv",/^(?:"[^"]*"?|'[^']*'?)/,q,"\"'"]],[["tag",/^^<\/?[a-z](?:[\w-.:]*\w)?|\/?>$/i],["atn",/^(?!style[\s=]|on)[a-z](?:[\w:-]*\w)?/i],["lang-uq.val",/^=\s*([^\s"'>]*(?:[^\s"'/>]|\/(?=\s)))/],["pun",/^[/<->]+/],["lang-js",/^on\w+\s*=\s*"([^"]+)"/i],["lang-js",/^on\w+\s*=\s*'([^']+)'/i],["lang-js",/^on\w+\s*=\s*([^\s"'>]+)/i],["lang-css",/^style\s*=\s*"([^"]+)"/i],["lang-css",/^style\s*=\s*'([^']+)'/i],["lang-css",/^style\s*=\s*([^\s"'>]+)/i]]),["in.tag"]),o(n([],[["atv",/^[\S\s]+/]]),["uq.val"]),o(r({keywords:u,hashComments:!0,cStyleComments:!0,types:g}),["c","cc","cpp","cxx","cyc","m"]),o(r({keywords:"null,true,false"}),["json"]),o(r({keywords:p,hashComments:!0,cStyleComments:!0,verbatimStrings:!0,types:g}),["cs"]),o(r({keywords:d,cStyleComments:!0}),["java"]),o(r({keywords:h,hashComments:!0,multiLineStrings:!0}),["bsh","csh","sh"]),o(r({keywords:f,hashComments:!0,multiLineStrings:!0,tripleQuotedStrings:!0}),["cv","py"]),o(r({keywords:"caller,delete,die,do,dump,elsif,eval,exit,foreach,for,goto,if,import,last,local,my,next,no,our,print,package,redo,require,sub,undef,unless,until,use,wantarray,while,BEGIN,END",hashComments:!0,multiLineStrings:!0,regexLiterals:!0}),["perl","pl","pm"]),o(r({keywords:m,hashComments:!0,multiLineStrings:!0,regexLiterals:!0}),["rb"]),o(r({keywords:c,cStyleComments:!0,regexLiterals:!0}),["js"]),o(r({keywords:"all,and,by,catch,class,else,extends,false,finally,for,if,in,is,isnt,loop,new,no,not,null,of,off,on,or,return,super,then,true,try,unless,until,when,while,yes",hashComments:3,cStyleComments:!0,multilineStrings:!0,tripleQuotedStrings:!0,regexLiterals:!0}),["coffee"]),o(n([],[["str",/^[\S\s]+/]]),["regex"]),window.prettyPrintOne=function(e,t,i){var n=document.createElement("PRE");return n.innerHTML=e,i&&s(n,i),l({g:t,i:i,h:n}),n.innerHTML},window.prettyPrint=function(e){function t(){for(var i=window.PR_SHOULD_USE_CONTINUATION?h.now()+250:1/0;n.length>u&&i>h.now();u++){var r=n[u],o=r.className;if(o.indexOf("prettyprint")>=0){var a,p,o=o.match(d);if(p=!o){p=r;for(var f=void 0,m=p.firstChild;m;m=m.nextSibling)var g=m.nodeType,f=1===g?f?p:m:3===g?y.test(m.nodeValue)?p:f:f;p=(a=f===p?void 0:f)&&"CODE"===a.tagName}for(p&&(o=a.className.match(d)),o&&(o=o[1]),p=!1,f=r.parentNode;f;f=f.parentNode)if(("pre"===f.tagName||"code"===f.tagName||"xmp"===f.tagName)&&f.className&&f.className.indexOf("prettyprint")>=0){p=!0;break}p||((p=(p=r.className.match(/\blinenums\b(?::(\d+))?/))?p[1]&&p[1].length?+p[1]:!0:!1)&&s(r,p),c={g:o,h:r,i:p},l(c))}}n.length>u?setTimeout(t,250):e&&e()}for(var i=[document.getElementsByTagName("pre"),document.getElementsByTagName("code"),document.getElementsByTagName("xmp")],n=[],r=0;i.length>r;++r)for(var o=0,a=i[r].length;a>o;++o)n.push(i[r][o]);var i=q,h=Date;h.now||(h={now:function(){return+new Date}});var c,u=0,d=/\blang(?:uage)?-([\w.]+)(?!\S)/;t()},window.PR={createSimpleLexer:n,registerLangHandler:o,sourceDecorator:r,PR_ATTRIB_NAME:"atn",PR_ATTRIB_VALUE:"atv",PR_COMMENT:"com",PR_DECLARATION:"dec",PR_KEYWORD:"kwd",PR_LITERAL:"lit",PR_NOCODE:"nocode",PR_PLAIN:"pln",PR_PUNCTUATION:"pun",PR_SOURCE:"src",PR_STRING:"str",PR_TAG:"tag",PR_TYPE:"typ"}}();