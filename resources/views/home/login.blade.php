<?php

use \App\Http\Controllers\Resource;

Resource::getInstance()->setTitle('登录');
Resource::getInstance()->extJs([
    'pages/home/login'
]);
Resource::getInstance()->extCss([
    'css/home/login'
]);
?>
@extends("layout.live")
@section("content")
    <header class="header xxl-font">
        <i class="icon iconfont icon-fanhui back" id="back"></i>
        登录
    </header>
    <form class="login" id="form" onsubmit="return false">
        <div class="login-item">
            <input type="text" name="phone" id="phone" placeholder="请输入手机号" maxlength="11" value=""
                   data-required="true"
                   data-pattern="^1(3|4|5|7|8)\d{9}$"
                   data-descriptions="phone"
                   data-describedby="phone-description"/>
        </div>
        <div id="phone-description" class="error-tip"></div>
        <div class="login-item">
            <input type="password" name="password" id="password" placeholder="请输入密码" maxlength="12"
                   value=""
                   data-pattern="^[0-9a-zA-z]{6,12}$"
                   data-required="true"
                   data-descriptions="password"
                   data-describedby="password-description"/>
        </div>
        {{ csrf_field() }}
        <div id="password-description" class="error-tip"></div>
        <div class="error"></div>
        <button type="submit" class="submit-btn" >进入平台</button>
    </form>
@endsection