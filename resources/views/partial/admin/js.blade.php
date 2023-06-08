@php
    $js = load_asset_admin("js", isset($page) ? $page : "default");
@endphp

@if($js)
    @foreach($js as $file)
        <script src="{{asset($file)}}" type="text/javascript"></script>
    @endforeach
@endif
