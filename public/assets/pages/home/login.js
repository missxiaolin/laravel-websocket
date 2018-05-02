require(['jquery'], function ($) {

    var $back = $('#back');
    var $submitBtn = $('#submit-btn');
    // 获取验证吗
    $('#authCodeBtn').click(function (event) {

        var phone_num = $(" input[ name='phone_num' ] ").val()
        url = "http://singwa.swoole.com:8811?s=index/login&phone_num=" + phone_num;
        $(this).html('已发送').attr('disabled', true);
        // $.post()
        $.get(url, function (data) {
            // TODO: 将下面3行代码删除
            if (data.status == 'ok') {
                alert('发送完成');
            }
            // if (result.status != 'ok') {
            // 	alert('网络错误');
            // }
        });
    });

    // 提交表单
    $submitBtn.click(function (event) {
        event.preventDefault();
        var formData = $('form').serialize();
        // TODO: 请求后台接口跳转界面，前端跳转或者后台跳
        $.get("https://www.easy-mock.com/mock/5ab1188bddac7967e4398146/example/query?" + formData, function (data) {
            console.log("https://www.easy-mock.com/mock/5ab1188bddac7967e4398146/example/query?" + formData);
            // location.href='index.html';
        });
    });

    // 返回上一页
    $back.click(function (e) {
        window.history.back();
    });
});