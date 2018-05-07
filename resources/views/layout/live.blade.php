<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no,minimal-ui">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <!-- iOS中Safari允许全屏浏览 -->
    <meta name="apple-mobile-web-app-capable" content="no">
    <!-- iOS中Safari顶端状态条样式 -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="724">
    <!-- 忽略将数字变为电话号码, 忽略自动识别邮箱账号 -->
    <meta name="format-detection" content="telephone=no, email=no">
    <!-- 针对手持设备优化，主要是针对一些老的不识别viewport的浏览器，比如黑莓 -->
    <meta name="HandheldFriendly" content="true">
    <!-- 微软的老式浏览器 -->
    <meta name="MobileOptimized" content="320">
    <!-- UC强制竖屏 -->
    <meta name="screen-orientation" content="portrait">
    <!-- QQ强制竖屏 -->
    <meta name="x5-orientation" content="portrait">
    <!-- UC强制全屏 -->
    <meta name="full-screen" content="yes">
    <!-- QQ强制全屏 -->
    <meta name="x5-fullscreen" content="true">
    <!-- UC应用模式 -->
    <meta name="browsermode" content="application">
    <!-- QQ应用模式 -->
    <meta name="x5-page-mode" content="app">
    <!-- windows phone 点击无高光 -->
    <meta name="msapplication-tap-highlight" content="no">
    <title><?php echo \App\Http\Controllers\Resource::getInstance()->getTitle() ?></title>

    <meta name="author" content="">
    <meta name="Keywords" content="{!!$meta_keyword or ''!!}"/>
    <meta name="Description" content="{!!$meta_description or ''!!}"/>
    @include('layout.style')

</head>

<body>

<div class="page">
    {{--@section('navbar')--}}
    {{--@include('partials.navbar')--}}
    {{--@show--}}

    {{-- content --}}
    <div class="content-wrapper">
        @yield('content')
    </div>
    <div class="network-status"></div>
</div>

<script src="{!! isset($host) ? $host : ''!!}/js/lib/require.js"></script>
<script src="{!! isset($host) ? $host : ''!!}/js/lib/config.js"></script>

<script>
    require.config({
        @if ($debug)
        waitSeconds: 0,
        urlArgs: "v=" + (new Date()).getTime(),
        @endif
        baseUrl: '{!!$base_url!!}'
    });
    define('page.params', function () {
        return {!!json_encode( \App\Http\Controllers\Resource::getAllParams())!!};
    });
</script>

@include('layout.script')
</body>
</html>