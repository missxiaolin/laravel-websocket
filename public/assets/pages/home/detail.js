require(['jquery', 'page.params'], function ($, params) {
    var $nav = $('.tab-nav div'),
        $content = $('.tab-block > div'),
        $back = $('#back');

    /*切换tab*/
    $nav.click(function () {
        var $this = $(this);
        var $t = $this.index();
        $nav.removeClass();
        $this.addClass('active');
        $content.css('display', 'none');
        $content.eq($t).css('display', 'block');
    });

    $back.click(function () {
        window.history.back();
    });

    var websocket = new WebSocket("ws://127.0.0.1:11521");

    // 实例对象的onopen属性
    websocket.onopen = function (evt) {
        // websocket.send("hello-sinwa");
        // console.log("conected-swoole-success");
    }

    // 实例化 onmessage
    websocket.onmessage = function (evt) {
        console.log("ws-server-return-data:" + evt.data);
    }

    //onclose
    websocket.onclose = function (evt) {
        console.log("close");
        console.log(evt)
    }
    //onerror

    websocket.onerror = function (evt, e) {
        console.log("error:" + evt.data);
    }
});