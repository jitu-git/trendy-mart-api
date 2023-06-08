<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta https-equiv="Content-Language" content="EN"/>
    <meta itemprop="name" content="SemiDot Infotech Pvt. Ltd." />
    <meta name='dmca-site-verification' content='QllYdlVnVTJDNkZrRTJydWxJWDV5QWFmbko1UXJEVlVnUU0rVHRYMGwxZz01'/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="https://semidotinfotech.com/images/favicon.png"/>

    @yield("meta")

    <meta name="revisit-after" content="2 days">
    <meta name="rating" content="Safe For Kids">
    <meta name="document-type" content="Public">
    <meta name="language" content="English"/>

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include("partial.web.css")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    @yield("css")
</head>
<body>
    <div class="wrapper">

        <main class="cd-main-content">

            @yield("content")

        </main>

    </div>

    @include("partial.web.js")

</body>
</html>
