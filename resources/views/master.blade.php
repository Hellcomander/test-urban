<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" translate="no">
<head>
    <title>Urban Connections Test | Inicio Sesión </title>
    @include('common.head')

</head>

@auth
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo de la tienda -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo de la tienda" style="height: 40px;">
            Tienda Virtual
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú de navegación -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Enlace a la página de inicio -->
                <li class="nav-item mr-2">
                    <button class="btn btn-outline-primary">
                        <i class="las la-home"></i>
                        Inicio
                    </button>
                </li>

                <!-- Enlace a los productos -->
                @if (session()->get('role') === 'vendedor')
                    <li class="nav-item mr-2">
                        <a class="btn btn-outline-primary" href="{{ route('tiendas') }}">
                            <i class="las la-store-alt"></i>
                            Tiendas
                        </a>
                    </li>
                @endif

                <!-- Carrito de compras -->

                @if (session()->get('role') === 'cliente')
                    <li class="nav-item mr-2">
                        <button class="btn btn-outline-primary">
                            <i class="las la-shopping-cart"></i>
                            Carrito
                            <span class="badge bg-primary">{{ auth()->user()->carrito()->count() }}</span>
                        </button>
                    </li>
                @endif

                    <li class="nav-item mr-2">
                        <button class="btn btn-outline-primary">
                            <i class="las la-user"></i>
                            {{ auth()->user()->nombre . ' ' . auth()->user()->apellidos }}
                        </button>
                    </li>

                    <!-- Enlace para cerrar sesión -->
                    <li class="nav-item mr-2">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="las la-sign-out-alt"></i>
                                Cerrar sesión
                            </button>
                        </form>
                    </li>
            </ul>
        </div>
    </div>
</nav>
@endauth
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

        $(document).ready(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                statusCode: {
                    401: function() {
                        location.reload();
                    }
                }
            });
        });
        
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
