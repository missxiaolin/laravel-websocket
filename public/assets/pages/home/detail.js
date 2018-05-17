require([
    'zepto',
    'webSocket',
    'page.params',
    'ajax'
], function ($, socket, params) {
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

    // 聊天模块
    $('#discuss-box').keydown(function (event) {
        var text = $(this).val(),
            self = $(this);
        // 回车事件
        if (event.keyCode == 13 && text) {
            $.http({
                type: 'POST',
                dataType: 'json',
                url: '/api/push/chat',
                data: $('#chat-form').serialize(),
                success: function (data) {
                    if (data.code == 0) {
                        self.val("")
                    }
                },
                error: function (data) {
                }
            });
        }
    });

    $back.click(function () {
        window.history.back();
    });

    new socket({
        url: "ws://127.0.0.1:11521",
        onopen: function (evt) {

        },
        onmessage: function (evt) {
            push(evt.data)
        },
        onclose: function (evt) {

        },
        onerror: function (evt) {

        }
    })

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

    new socket({
        url: "ws://127.0.0.1:8812",
        onopen: function (evt) {

        },
        onmessage: function (evt) {
            var data = JSON.parse(evt.data),
                html = '<div class="comment">';
            html += '<span>' + data.name + '</span>';
            html += '<span>' + data.content + '</span>';
            html += '</div>'
            $('#comments').prepend(html)
        },
        onclose: function (evt) {

        },
        onerror: function (evt) {

        }
    })


});