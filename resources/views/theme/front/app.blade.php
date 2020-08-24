<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Bedram Tamang | Software Engineer From Nepal.')</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="keywords"
        content="Bedram Tamang, Engineer from Nepal, Software Developer, Laravel, Vue, Tailwind, Mysql, Php " />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('css/dist/app.css')}}">
    <link rel="stylesheet" href="{{url('css/tailwind.css')}}">
    <link rel="stylesheet" href="{{mix('/dist/css/markdown.css')}}">
</head>

<body>
    <div class="bg-gray-100" id="app">
        @include('front.components.header')
        @yield('content')
        @include('front.components.footer')
    </div>
    {{-- <script src="{{url('js/app.js')}}"></script> --}}
    @yield('scripts')
</body>

</html>
