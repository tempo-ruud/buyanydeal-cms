<!doctype html>
<html lang="en">
    <head>
        @include('layouts.front.includes.head')
    </head>
    <body class="">
        @include('layouts.front.includes.header')
        @yield('content')
        @yield('footerjs')
    </body>
</html>