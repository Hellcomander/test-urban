<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" translate="no">
<head>
    <title>Urban Connections Test | Inicio Sesión </title>
    @include('common.head')

</head>
<body class="" data-base-url="{{url('/')}}" style="background-color: #57a3ef">

    <div class="modal fade" id="loadingModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index:10000 !important">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="spinner-border avatar-lg text-primary m-2" role="status"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

    <script>
        function validateNumber(event) {
            const keyCode = event.keyCode || event.which;
            // Permitir teclas especiales: Backspace, Tab, Enter, Delete, Flechas izquierda y derecha
            const specialKeys = [8, 9, 13, 46, 37, 39];
            if (((keyCode < 48 || keyCode > 57) && (keyCode < 96 || keyCode > 105)) && !specialKeys.includes(keyCode)) {
                event.preventDefault();
            }
        }
    </script>
</body>
</html>
