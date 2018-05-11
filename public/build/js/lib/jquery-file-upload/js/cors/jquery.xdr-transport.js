/*
 * jQuery XDomainRequest Transport Plugin 1.1.4
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2011, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 *
 * Based on Julian Aubourg's ajaxHooks xdr.js:
 * https://github.com/jaubourg/ajaxHooks/
 */

!function(t){"use strict";"function"==typeof define&&define.amd?define(["jquery"],t):t("object"==typeof exports?require("jquery"):window.jQuery)}(function(t){"use strict";window.XDomainRequest&&!t.support.cors&&t.ajaxTransport(function(e){if(e.crossDomain&&e.async){e.timeout&&(e.xdrTimeout=e.timeout,delete e.timeout);var o;return{send:function(n,u){function r(e,n,r,i){o.onload=o.onerror=o.ontimeout=t.noop,o=null,u(e,n,r,i)}var i=/\?/.test(e.url)?"&":"?";o=new XDomainRequest,"DELETE"===e.type?(e.url=e.url+i+"_method=DELETE",e.type="POST"):"PUT"===e.type?(e.url=e.url+i+"_method=PUT",e.type="POST"):"PATCH"===e.type&&(e.url=e.url+i+"_method=PATCH",e.type="POST"),o.open(e.type,e.url),o.onload=function(){r(200,"OK",{text:o.responseText},"Content-Type: "+o.contentType)},o.onerror=function(){r(404,"Not Found")},e.xdrTimeout&&(o.ontimeout=function(){r(0,"timeout")},o.timeout=e.xdrTimeout),o.send(e.hasContent&&e.data||null)},abort:function(){o&&(o.onerror=t.noop(),o.abort())}}}})});