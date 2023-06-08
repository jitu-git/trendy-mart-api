@php

    $css = load_asset_admin("css", isset($page) ? $page : "default");
@endphp

@foreach($css as $file)
    <link href="{{asset($file)}}" rel="stylesheet" type="text/css" />
@endforeach
