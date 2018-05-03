<?php
$static_resources = \App\Http\Controllers\Resource::getInstance()->loadScripts();
?>
@foreach($static_resources['external'] ?? [] as $js_file)
    <script src="{{$js_file}}" type="text/javascript"></script>
@endforeach