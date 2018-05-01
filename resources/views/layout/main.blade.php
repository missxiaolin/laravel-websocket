<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <meta content="yes" name="apple-touch-fullscreen"/>
    <meta content="telephone=no,email=no" name="format-detection"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
    <title>{!! $title or ''!!}</title>

    <meta name="author" content="">
    <meta name="Keywords" content="{!!$meta_keyword or ''!!}"/>
    <meta name="Description" content="{!!$meta_description or ''!!}"/>

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


@if (isset($file_css) && $file_css)
    <style></style>
    <link href="{!! isset($host) ? $host : ''!!}/{!!$file_css!!}.css?v= {{ time() }})"
          rel="stylesheet"/>
@endif
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
@if (isset($file_js) && $file_js)
    <script src="{!! isset($host) ? $host : ''!!}/{!!$file_js!!}.js?v= {{ time() }}"></script>
@endif
</body>
</html>