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
        push(evt.data)
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

    function push(data) {
        data = JSON.parse(data);
        console.log(data)

        html = '<div class="frame">';
        html += '<h3 class="frame-header">';
        html += '<i class="icon iconfont icon-shijian"></i>' + data.type;
        html += '</h3>';
        html += '<div class="frame-item">';
        html += '<span class="frame-dot"></span>';
        html += '<div class="frame-item-author">';
        if (data.logo) {
            html += '<img src="' + data.logo + '" width="20px" height="20px"/>';
        }
        html += data.title
        html += '</div>';
        html += '<p>' + data.content + '</p>';
        html += '</div>';
        html += '</div>';

        $('#match-result').prepend(html)
    }
});