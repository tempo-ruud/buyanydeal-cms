<!doctype html>
<html lang="en">
    <head>
        @include('layouts.front.includes.head')
    </head>
    <body class="">
      @include('layouts.front.includes.header')
      @include('layouts.front.includes.navbar')
      <div class="container">
        <div class="main-content my-4">
          @yield('content')
        </div>
      </div>
      @include('layouts.front.includes.footer')
        @yield('footerjs')
    </body>
</html>
