layui.define("jquery",function(e){"use strict";var l=layui.$,o=function(e){};o.prototype.load=function(e){var o,t,i,n,r=this,a=0;e=e||{};var c=l(e.elem);if(c[0]){var f=l(e.scrollElem||document),m=e.mb||50,u=!("isAuto"in e)||e.isAuto,s=e.end||"没有更多了",v=e.scrollElem&&e.scrollElem!==document,y="<cite>加载更多</cite>",d=l('<div class="layui-flow-more"><a href="javascript:;">'+y+"</a></div>");c.find(".layui-flow-more")[0]||c.append(d);var h=function(e,n){e=l(e),d.before(e),n=0==n||null,n?d.html(s):d.find("a").html(y),t=n,o=null,i&&i()},p=function(){o=!0,d.find("a").html('<i class="layui-anim layui-anim-rotate layui-anim-loop layui-icon ">&#xe63e;</i>'),"function"==typeof e.done&&e.done(++a,h)};if(p(),d.find("a").on("click",function(){l(this),t||o||p()}),e.isLazyimg)var i=r.lazyimg({elem:e.elem+" img",scrollElem:e.scrollElem});return u?(f.on("scroll",function(){var e=l(this),i=e.scrollTop();n&&clearTimeout(n),t||(n=setTimeout(function(){var t=v?e.height():l(window).height();(v?e.prop("scrollHeight"):document.documentElement.scrollHeight)-i-t<=m&&(o||p())},100))}),r):r}},o.prototype.lazyimg=function(e){var o,t=this,i=0;e=e||{};var n=l(e.scrollElem||document),r=e.elem||"img",a=e.scrollElem&&e.scrollElem!==document,c=function(e,l){var o=n.scrollTop(),r=o+l,c=a?function(){return e.offset().top-n.offset().top+o}():e.offset().top;if(c>=o&&c<=r&&!e.attr("src")){var m=e.attr("lay-src");layui.img(m,function(){var l=t.lazyimg.elem.eq(i);e.attr("src",m).removeAttr("lay-src"),l[0]&&f(l),i++})}},f=function(e,o){var f=a?(o||n).height():l(window).height(),m=n.scrollTop(),u=m+f;if(t.lazyimg.elem=l(r),e)c(e,f);else for(var s=0;s<t.lazyimg.elem.length;s++){var v=t.lazyimg.elem.eq(s),y=a?function(){return v.offset().top-n.offset().top+m}():v.offset().top;if(c(v,f),i=s,y>u)break}};if(f(),!o){var m;n.on("scroll",function(){var e=l(this);m&&clearTimeout(m),m=setTimeout(function(){f(null,e)},50)}),o=!0}return f},e("flow",new o)});