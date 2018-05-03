<?php
$static_resources = \App\Http\Controllers\Resource::getInstance()->loadStyles();
?>
@foreach($static_resources['external'] ?? [] as $css_file)
    <link href="{{$css_file}}" rel="stylesheet"/>
@endforeach