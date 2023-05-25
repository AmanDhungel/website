<!DOCTYPE html>
<html lang="en">

@include('frontEnd.layouts.head')
<body>
    @include('frontEnd.layouts.header')
    @yield('content')

    @include('frontEnd.layouts.footer')
    @yield('js')
</body>
</html>