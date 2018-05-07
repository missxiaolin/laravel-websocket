layui.define("jquery",function(e){"use strict";var i=layui.$,n=(layui.hint(),layui.device(),{config:{},set:function(e){var n=this;return n.config=i.extend({},n.config,e),n},on:function(e,i){return layui.onevent.call(this,t,e,i)}}),t="carousel",a="layui-this",o="layui-carousel-left",l="layui-carousel-right",d="layui-carousel-prev",r="layui-carousel-next",s="layui-carousel-arrow",u="layui-carousel-ind",c=function(e){var t=this;t.config=i.extend({},t.config,n.config,e),t.render()};c.prototype.config={width:"600px",height:"280px",full:!1,arrow:"hover",indicator:"inside",autoplay:!0,interval:3e3,anim:"",trigger:"click",index:0},c.prototype.render=function(){var e=this,n=e.config;n.elem=i(n.elem),n.elem[0]&&(e.elemItem=n.elem.find(">*[carousel-item]>*"),n.index<0&&(n.index=0),n.index>=e.elemItem.length&&(n.index=e.elemItem.length-1),n.interval<800&&(n.interval=800),n.full?n.elem.css({position:"fixed",width:"100%",height:"100%",zIndex:9999}):n.elem.css({width:n.width,height:n.height}),n.elem.attr("lay-anim",n.anim),e.elemItem.eq(n.index).addClass(a),e.indicator(),e.elemItem.length<=1||(e.arrow(),e.autoplay(),e.events()))},c.prototype.reload=function(e){var n=this;clearInterval(n.timer),n.config=i.extend({},n.config,e),n.render()},c.prototype.prevIndex=function(){var e=this,i=e.config,n=i.index-1;return n<0&&(n=e.elemItem.length-1),n},c.prototype.nextIndex=function(){var e=this,i=e.config,n=i.index+1;return n>=e.elemItem.length&&(n=0),n},c.prototype.addIndex=function(e){var i=this,n=i.config;e=e||1,n.index=n.index+e,n.index>=i.elemItem.length&&(n.index=0)},c.prototype.subIndex=function(e){var i=this,n=i.config;e=e||1,n.index=n.index-e,n.index<0&&(n.index=i.elemItem.length-1)},c.prototype.autoplay=function(){var e=this,i=e.config;i.autoplay&&(e.timer=setInterval(function(){e.slide()},i.interval))},c.prototype.arrow=function(){var e=this,n=e.config,t=i(['<button class="layui-icon '+s+'" lay-type="sub">'+("updown"===n.anim?"&#xe619;":"&#xe603;")+"</button>",'<button class="layui-icon '+s+'" lay-type="add">'+("updown"===n.anim?"&#xe61a;":"&#xe602;")+"</button>"].join(""));n.elem.attr("lay-arrow",n.arrow),n.elem.find("."+s)[0]&&n.elem.find("."+s).remove(),n.elem.append(t),t.on("click",function(){var n=i(this),t=n.attr("lay-type");e.slide(t)})},c.prototype.indicator=function(){var e=this,n=e.config,t=e.elemInd=i(['<div class="'+u+'"><ul>',function(){var i=[];return layui.each(e.elemItem,function(e){i.push("<li"+(n.index===e?' class="layui-this"':"")+"></li>")}),i.join("")}(),"</ul></div>"].join(""));n.elem.attr("lay-indicator",n.indicator),n.elem.find("."+u)[0]&&n.elem.find("."+u).remove(),n.elem.append(t),"updown"===n.anim&&t.css("margin-top",-t.height()/2),t.find("li").on("hover"===n.trigger?"mouseover":n.trigger,function(){var t=i(this),a=t.index();a>n.index?e.slide("add",a-n.index):a<n.index&&e.slide("sub",n.index-a)})},c.prototype.slide=function(e,i){var n=this,s=n.elemItem,u=n.config,c=u.index,m=u.elem.attr("lay-filter");n.haveSlide||("sub"===e?(n.subIndex(i),setTimeout(function(){s.eq(u.index).addClass(d),setTimeout(function(){s.eq(c).addClass(l),s.eq(u.index).addClass(l)},50)},50)):(n.addIndex(i),setTimeout(function(){s.eq(u.index).addClass(r),setTimeout(function(){s.eq(c).addClass(o),s.eq(u.index).addClass(o)},50)},50)),setTimeout(function(){s.removeClass(a+" "+d+" "+r+" "+o+" "+l),s.eq(u.index).addClass(a),n.haveSlide=!1},300),n.elemInd.find("li").eq(u.index).addClass(a).siblings().removeClass(a),n.haveSlide=!0,layui.event.call(this,t,"change("+m+")",{index:u.index,prevIndex:c,item:s.eq(u.index)}))},c.prototype.events=function(){var e=this,i=e.config;i.elem.data("haveEvents")||(i.elem.on("mouseenter",function(){clearInterval(e.timer)}).on("mouseleave",function(){e.autoplay()}),i.elem.data("haveEvents",!0))},n.render=function(e){return new c(e)},e(t,n)});