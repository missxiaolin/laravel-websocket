layui.define(["layer","form"],function(t){"use strict";var e=layui.$,i=layui.layer,a=layui.form,l=(layui.hint(),layui.device()),n="layedit",o="layui-disabled",r=function(){var t=this;t.index=0,t.config={tool:["strong","italic","underline","del","|","left","center","right","|","link","unlink","face","image"],hideTool:[],height:280}};r.prototype.set=function(t){var i=this;return e.extend(!0,i.config,t),i},r.prototype.on=function(t,e){return layui.onevent(n,t,e)},r.prototype.build=function(t,i){i=i||{};var a=this,n=a.config,o="layui-layedit",r=e("#"+t),s="LAY_layedit_"+ ++a.index,u=r.next("."+o),d=e.extend({},n,i),y=function(){var t=[],e={};return layui.each(d.hideTool,function(t,i){e[i]=!0}),layui.each(d.tool,function(i,a){k[a]&&!e[a]&&t.push(k[a])}),t.join("")}(),f=e(['<div class="'+o+'">','<div class="layui-unselect layui-layedit-tool">'+y+"</div>",'<div class="layui-layedit-iframe">','<iframe id="'+s+'" name="'+s+'" textarea="'+t+'" frameborder="0"></iframe>',"</div>","</div>"].join(""));return l.ie&&l.ie<8?r.removeClass("layui-hide").addClass("layui-show"):(u[0]&&u.remove(),c.call(a,f,r[0],d),r.addClass("layui-hide").after(f),a.index)},r.prototype.getContent=function(t){var e=s(t);if(e[0])return u(e[0].document.body.innerHTML)},r.prototype.getText=function(t){var i=s(t);if(i[0])return e(i[0].document.body).text()},r.prototype.setContent=function(t,i,a){var l=s(t);l[0]&&(a?e(l[0].document.body).append(i):e(l[0].document.body).html(i),layedit.sync(t))},r.prototype.sync=function(t){var i=s(t);if(i[0]){e("#"+i[1].attr("textarea")).val(u(i[0].document.body.innerHTML))}},r.prototype.getSelection=function(t){var e=s(t);if(e[0]){var i=f(e[0].document);return document.selection?i.text:i.toString()}};var c=function(t,i,a){var l=this,n=t.find("iframe");n.css({height:a.height}).on("load",function(){var o=n.contents(),r=n.prop("contentWindow"),c=o.find("head"),s=e(["<style>","*{margin: 0; padding: 0;}","body{padding: 10px; line-height: 20px; overflow-x: hidden; word-wrap: break-word; font: 14px Helvetica Neue,Helvetica,PingFang SC,Microsoft YaHei,Tahoma,Arial,sans-serif; -webkit-box-sizing: border-box !important; -moz-box-sizing: border-box !important; box-sizing: border-box !important;}","a{color:#01AAED; text-decoration:none;}a:hover{color:#c00}","p{margin-bottom: 10px;}","img{display: inline-block; border: none; vertical-align: middle;}","pre{margin: 10px 0; padding: 10px; line-height: 20px; border: 1px solid #ddd; border-left-width: 6px; background-color: #F2F2F2; color: #333; font-family: Courier New; font-size: 12px;}","</style>"].join("")),u=o.find("body");c.append(s),u.attr("contenteditable","true").css({"min-height":a.height}).html(i.value||""),d.apply(l,[r,n,i,a]),v.call(l,r,t,a)})},s=function(t){var i=e("#LAY_layedit_"+t);return[i.prop("contentWindow"),i]},u=function(t){return 8==l.ie&&(t=t.replace(/<.+>/g,function(t){return t.toLowerCase()})),t},d=function(t,a,n,o){var r=t.document,c=e(r.body);c.on("keydown",function(t){if(13===t.keyCode){var e=f(r);if("pre"===m(e).parentNode.tagName.toLowerCase()){if(t.shiftKey)return;return i.msg("请暂时用shift+enter"),!1}r.execCommand("formatBlock",!1,"<p>")}}),e(n).parents("form").on("submit",function(){var t=c.html();8==l.ie&&(t=t.replace(/<.+>/g,function(t){return t.toLowerCase()})),n.value=t}),c.on("paste",function(e){r.execCommand("formatBlock",!1,"<p>"),setTimeout(function(){y.call(t,c),n.value=c.html()},100)})},y=function(t){this.document,t.find("*[style]").each(function(){var t=this.style.textAlign;this.removeAttribute("style"),e(this).css({"text-align":t||""})}),t.find("table").addClass("layui-table"),t.find("script,link").remove()},f=function(t){return t.selection?t.selection.createRange():t.getSelection().getRangeAt(0)},m=function(t){return t.endContainer||t.parentElement().childNodes[0]},p=function(t,i,a){var l=this.document,n=document.createElement(t);for(var o in i)n.setAttribute(o,i[o]);if(n.removeAttribute("text"),l.selection){var r=a.text||i.text;if("a"===t&&!r)return;r&&(n.innerHTML=r),a.pasteHTML(e(n).prop("outerHTML")),a.select()}else{var r=a.toString()||i.text;if("a"===t&&!r)return;r&&(n.innerHTML=r),a.deleteContents(),a.insertNode(n)}},h=function(t,i){var a=this.document,l="layedit-tool-active",n=m(f(a)),r=function(e){return t.find(".layedit-tool-"+e)};i&&i[i.hasClass(l)?"removeClass":"addClass"](l),t.find(">i").removeClass(l),r("unlink").addClass(o),e(n).parents().each(function(){var t=this.tagName.toLowerCase(),e=this.style.textAlign;"b"!==t&&"strong"!==t||r("b").addClass(l),"i"!==t&&"em"!==t||r("i").addClass(l),"u"===t&&r("u").addClass(l),"strike"===t&&r("d").addClass(l),"p"===t&&("center"===e?r("center").addClass(l):"right"===e?r("right").addClass(l):r("left").addClass(l)),"a"===t&&(r("link").addClass(l),r("unlink").removeClass(o))})},v=function(t,a,l){var n=t.document,r=e(n.body),c={link:function(i){var a=m(i),l=e(a).parent();g.call(r,{href:l.attr("href"),target:l.attr("target")},function(e){var a=l[0];"A"===a.tagName?a.href=e.url:p.call(t,"a",{target:e.target,href:e.url,text:e.url},i)})},unlink:function(t){n.execCommand("unlink")},face:function(e){b.call(this,function(i){p.call(t,"img",{src:i.src,alt:i.alt},e)})},image:function(a){var n=this;layui.use("upload",function(o){var r=l.uploadImage||{};o.render({url:r.url,method:r.type,elem:e(n).find("input")[0],done:function(e){0==e.code?(e.data=e.data||{},p.call(t,"img",{src:e.data.src,alt:e.data.title},a)):i.msg(e.msg||"上传失败")}})})},code:function(e){x.call(r,function(i){p.call(t,"pre",{text:i.code,"lay-lang":i.lang},e)})},help:function(){i.open({type:2,title:"帮助",area:["600px","380px"],shadeClose:!0,shade:.1,skin:"layui-layer-msg",content:["http://www.layui.com/about/layedit/help.html","no"]})}},s=a.find(".layui-layedit-tool"),u=function(){var i=e(this),a=i.attr("layedit-event"),l=i.attr("lay-command");if(!i.hasClass(o)){r.focus();var u=f(n);u.commonAncestorContainer,l?(n.execCommand(l),/justifyLeft|justifyCenter|justifyRight/.test(l)&&n.execCommand("formatBlock",!1,"<p>"),setTimeout(function(){r.focus()},10)):c[a]&&c[a].call(this,u),h.call(t,s,i)}},d=/image/;s.find(">i").on("mousedown",function(){var t=e(this),i=t.attr("layedit-event");d.test(i)||u.call(this)}).on("click",function(){var t=e(this),i=t.attr("layedit-event");d.test(i)&&u.call(this)}),r.on("click",function(){h.call(t,s),i.close(b.index)})},g=function(t,e){var l=this,n=i.open({type:1,id:"LAY_layedit_link",area:"350px",shade:.05,shadeClose:!0,moveType:1,title:"超链接",skin:"layui-layer-msg",content:['<ul class="layui-form" style="margin: 15px;">','<li class="layui-form-item">','<label class="layui-form-label" style="width: 60px;">URL</label>','<div class="layui-input-block" style="margin-left: 90px">','<input name="url" lay-verify="url" value="'+(t.href||"")+'" autofocus="true" autocomplete="off" class="layui-input">',"</div>","</li>",'<li class="layui-form-item">','<label class="layui-form-label" style="width: 60px;">打开方式</label>','<div class="layui-input-block" style="margin-left: 90px">','<input type="radio" name="target" value="_self" class="layui-input" title="当前窗口"'+("_self"!==t.target&&t.target?"":"checked")+">",'<input type="radio" name="target" value="_blank" class="layui-input" title="新窗口" '+("_blank"===t.target?"checked":"")+">","</div>","</li>",'<li class="layui-form-item" style="text-align: center;">','<button type="button" lay-submit lay-filter="layedit-link-yes" class="layui-btn"> 确定 </button>','<button style="margin-left: 20px;" type="button" class="layui-btn layui-btn-primary"> 取消 </button>',"</li>","</ul>"].join(""),success:function(t,n){a.render("radio"),t.find(".layui-btn-primary").on("click",function(){i.close(n),l.focus()}),a.on("submit(layedit-link-yes)",function(t){i.close(g.index),e&&e(t.field)})}});g.index=n},b=function(t){var a=function(){var t=["[微笑]","[嘻嘻]","[哈哈]","[可爱]","[可怜]","[挖鼻]","[吃惊]","[害羞]","[挤眼]","[闭嘴]","[鄙视]","[爱你]","[泪]","[偷笑]","[亲亲]","[生病]","[太开心]","[白眼]","[右哼哼]","[左哼哼]","[嘘]","[衰]","[委屈]","[吐]","[哈欠]","[抱抱]","[怒]","[疑问]","[馋嘴]","[拜拜]","[思考]","[汗]","[困]","[睡]","[钱]","[失望]","[酷]","[色]","[哼]","[鼓掌]","[晕]","[悲伤]","[抓狂]","[黑线]","[阴险]","[怒骂]","[互粉]","[心]","[伤心]","[猪头]","[熊猫]","[兔子]","[ok]","[耶]","[good]","[NO]","[赞]","[来]","[弱]","[草泥马]","[神马]","[囧]","[浮云]","[给力]","[围观]","[威武]","[奥特曼]","[礼物]","[钟]","[话筒]","[蜡烛]","[蛋糕]"],e={};return layui.each(t,function(t,i){e[i]=layui.cache.dir+"images/face/"+t+".gif"}),e}();return b.hide=b.hide||function(t){"face"!==e(t.target).attr("layedit-event")&&i.close(b.index)},b.index=i.tips(function(){var t=[];return layui.each(a,function(e,i){t.push('<li title="'+e+'"><img src="'+i+'" alt="'+e+'"></li>')}),'<ul class="layui-clear">'+t.join("")+"</ul>"}(),this,{tips:1,time:0,skin:"layui-box layui-util-face",maxWidth:500,success:function(l,n){l.css({marginTop:-4,marginLeft:-10}).find(".layui-clear>li").on("click",function(){t&&t({src:a[this.title],alt:this.title}),i.close(n)}),e(document).off("click",b.hide).on("click",b.hide)}})},x=function(t){var e=this,l=i.open({type:1,id:"LAY_layedit_code",area:"550px",shade:.05,shadeClose:!0,moveType:1,title:"插入代码",skin:"layui-layer-msg",content:['<ul class="layui-form layui-form-pane" style="margin: 15px;">','<li class="layui-form-item">','<label class="layui-form-label">请选择语言</label>','<div class="layui-input-block">','<select name="lang">','<option value="JavaScript">JavaScript</option>','<option value="HTML">HTML</option>','<option value="CSS">CSS</option>','<option value="Java">Java</option>','<option value="PHP">PHP</option>','<option value="C#">C#</option>','<option value="Python">Python</option>','<option value="Ruby">Ruby</option>','<option value="Go">Go</option>',"</select>","</div>","</li>",'<li class="layui-form-item layui-form-text">','<label class="layui-form-label">代码</label>','<div class="layui-input-block">','<textarea name="code" lay-verify="required" autofocus="true" class="layui-textarea" style="height: 200px;"></textarea>',"</div>","</li>",'<li class="layui-form-item" style="text-align: center;">','<button type="button" lay-submit lay-filter="layedit-code-yes" class="layui-btn"> 确定 </button>','<button style="margin-left: 20px;" type="button" class="layui-btn layui-btn-primary"> 取消 </button>',"</li>","</ul>"].join(""),success:function(l,n){a.render("select"),l.find(".layui-btn-primary").on("click",function(){i.close(n),e.focus()}),a.on("submit(layedit-code-yes)",function(e){i.close(x.index),t&&t(e.field)})}});x.index=l},k={html:'<i class="layui-icon layedit-tool-html" title="HTML源代码" lay-command="html" layedit-event="html"">&#xe64b;</i><span class="layedit-tool-mid"></span>',strong:'<i class="layui-icon layedit-tool-b" title="加粗" lay-command="Bold" layedit-event="b"">&#xe62b;</i>',italic:'<i class="layui-icon layedit-tool-i" title="斜体" lay-command="italic" layedit-event="i"">&#xe644;</i>',underline:'<i class="layui-icon layedit-tool-u" title="下划线" lay-command="underline" layedit-event="u"">&#xe646;</i>',del:'<i class="layui-icon layedit-tool-d" title="删除线" lay-command="strikeThrough" layedit-event="d"">&#xe64f;</i>',"|":'<span class="layedit-tool-mid"></span>',left:'<i class="layui-icon layedit-tool-left" title="左对齐" lay-command="justifyLeft" layedit-event="left"">&#xe649;</i>',center:'<i class="layui-icon layedit-tool-center" title="居中对齐" lay-command="justifyCenter" layedit-event="center"">&#xe647;</i>',right:'<i class="layui-icon layedit-tool-right" title="右对齐" lay-command="justifyRight" layedit-event="right"">&#xe648;</i>',link:'<i class="layui-icon layedit-tool-link" title="插入链接" layedit-event="link"">&#xe64c;</i>',unlink:'<i class="layui-icon layedit-tool-unlink layui-disabled" title="清除链接" lay-command="unlink" layedit-event="unlink"">&#xe64d;</i>',face:'<i class="layui-icon layedit-tool-face" title="表情" layedit-event="face"">&#xe650;</i>',image:'<i class="layui-icon layedit-tool-image" title="图片" layedit-event="image">&#xe64a;<input type="file" name="file"></i>',code:'<i class="layui-icon layedit-tool-code" title="插入代码" layedit-event="code">&#xe64e;</i>',help:'<i class="layui-icon layedit-tool-help" title="帮助" layedit-event="help">&#xe607;</i>'},C=new r;t(n,C)});