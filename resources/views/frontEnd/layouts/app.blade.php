<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('frontEnd.layouts.head')
@include('frontEnd.layouts.header')

<body>
<main id="main">

    @yield('content')
</main>
</body>

@include('frontEnd.layouts.footer')
@yield('js')
</html>