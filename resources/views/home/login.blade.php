<?php
\App\Http\Controllers\Resource::getInstance()->extJs([
    'pages/home/login'
]);
\App\Http\Controllers\Resource::getInstance()->extCss([
    'css/home/login'
]);
?>
@extends("layout.live")
@section("content")
    <header class="header xxl-font">
        <i class="icon iconfont icon-fanhui back" id="back"></i>
        登录
    </header>
    <form class="login" id="form">
        <h2>图文直播平台</h2>
        <div class="login-item">
            <input type="text" placeholder="手机号" class="phone-num" name="phone_num"/>
            <button type="button" id="authCodeBtn">验证码</button>
        </div>
        <div class="login-item">
            <input type="text" placeholder="验证码" name="code" />
        </div>
        <button type="submit" class="submit-btn" id="submit-btn">进入平台</button>
    </form>
@endsection