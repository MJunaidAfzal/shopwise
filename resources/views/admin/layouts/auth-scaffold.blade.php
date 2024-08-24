<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assets')}}" data-template="vertical-menu-template">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
      <title>Shopwise - @stack('title')</title>
      <meta name="description" content="Start your development with a Dashboard for Bootstrap 5">
      <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
      @if(!empty(settings()->favico))
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('upload/setting/'.settings()->favico)}}">
      @else
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
      @endif
      @stack('styles')
   </head>
   <body>
      @yield('content')
      @stack('scripts')
   </body>
</html>
