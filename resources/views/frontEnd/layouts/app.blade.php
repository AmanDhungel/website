<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('frontEnd.layouts.head')
@include('frontEnd.layouts.header')

<body>

    @yield('content')
</body>

@include('frontEnd.layouts.footer')
@yield('js')
</html>