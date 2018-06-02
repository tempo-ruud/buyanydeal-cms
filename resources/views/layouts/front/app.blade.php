<!doctype html>
<html lang="en">
    <head>
        @include('layouts.front.includes.head')
    </head>
    <body class="">
      @include('layouts.front.includes.header')
      <div class="container">
        <div class="row">
            <div class="col-md-12">
          @yield('content')
          </div>
        </div>
      </div>
      @include('layouts.front.includes.footer')
        @yield('footerjs')
    </body>
</html>
