<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta https-equiv="Content-Language" content="EN"/>
    <title>Website</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset("web/images/favicon.png") }}"/>

    @yield("meta")

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include("partial.web.css")

    @yield("css")

</head>
<body>
    <div class="wrapper">
        @include("partial.web.header")

        <main class="cd-main-content">

            @yield("content")

            @include("partial.web.footer")
        </main>

    </div>

    @include("partial.web.js")

    @yield("script")
</body>
</html>
