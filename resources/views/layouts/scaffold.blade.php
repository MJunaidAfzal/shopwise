<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shopwise - @stack('title')</title>
    @if(!empty(settings()->favico))
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('upload/setting/'.settings()->favico)}}">
    @else
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
    @endif
    @include('partials.style')
    @stack('styles')
</head>
<body>
    @include('partials.header')
    @yield('content')
    @include('partials.footer')


    @include('partials.script')
    @stack('scripts')
</body>
</html>
