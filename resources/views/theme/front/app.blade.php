<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bedram Tamang | Software Engineer From Nepal.</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="keywords"
        content="Bedram Tamang, Engineer from Nepal, Software Developer, Laravel, Vue, Tailwind, Mysql, Php " />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/tailwind.css')}}">
</head>

<body>
    <div id="app">
        @include('front.components.header')
        @yield('content')
    </div>
    {{-- <script src="{{url('js/app.js')}}"></script> --}}
</body>

</html>
