<!doctype html>
<html lang="en">
<head>
    @include('layouts.admin.includes.head')
</head>
<body class="">
<div class="page">
    <div class="page-main">
        @include('layouts.admin.includes.header')
        <div class="my-3 my-md-5">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    @include('layouts.admin.includes.footer')
</div>
@yield('footerjs')
</body>
</html>
