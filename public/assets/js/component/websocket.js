/**
 * webSocket
 * @param {string} name  键名
 * @param {string} value 键值
 * @param {integer} days cookie周期
 */

define(['jquery'], function ($) {

    function webSocket(options) {
        var defOpts = {
            url: [],
            onopen: function (evt) {
                
            },
            onmessage: function (evt) {
                
            },
            onclose: function (evt) {
                
            },
            onerror: function (evt) {
                
            }
        };
        this.opts = $.extend(defOpts, options);
        this.init();
    }

    //执行
    webSocket.prototype.init = function () {
        var websocket = new WebSocket(this.opts.url);

        // 实例对象的onopen属性
        websocket.onopen = this.opts.onopen;

        // 实例化 onmessage
        websocket.onmessage = this.opts.onmessage;

        //onclose
        websocket.onclose = this.opts.onclose;

        //onerror
        websocket.onerror = this.opts.onerror;
    };

    return webSocket;
});