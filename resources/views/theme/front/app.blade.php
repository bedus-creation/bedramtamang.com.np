<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Bedram Tamang | Software Engineer In Vancouver, Canada.')</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="keywords"
          content="Bedram Tamang,Software Engineer in Vancouver, BC, Canada, Full-stack, Developer Laravel, Vue, Tailwind, MySQL, PHP, Python "/>
    <meta name="author" content=""/>
    <meta name="description" content=""/>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;500;700&family=Source+Code+Pro&display=swap"
          rel="stylesheet">
    @yield('head')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/10.1.2/styles/github-gist.min.css">
    @vite('resources/js/vue.js', 'build/front')
</head>

<body>
<div class="" id="app">
    @include('front.components.header')
    @yield('content')
    @include('front.components.footer')
</div>
@yield('scripts')
</body>

</html>
