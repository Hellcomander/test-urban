<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" translate="no">
<head>
    <title>Urban Connections Test | Inicio Sesión </title>
    @include('common.head')

</head>
<body class="" data-base-url="{{url('/')}}">

    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    @stack('scripts')
</body>
</html>
