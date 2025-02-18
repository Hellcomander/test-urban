@extends('master')

@push('styles')
    <style>
        .nav-link.active {
            background-color: #808080 !important;
        }
    </style>
@section('content')

<div class="container-fluid login-one-container">

    <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-30 w-25 border-b border-dark">
            <div class="card-body">

                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="tab-login" data-mdb-pill-init href="#pills-login" role="tab"
                        aria-controls="pills-login" aria-selected="true">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item" role="presentation">
                    <a class="nav-link" id="tab-register" data-mdb-pill-init href="#pills-register" role="tab"
                        aria-controls="pills-register" aria-selected="false">Registrar</a>
                    </li>
                </ul>
                <!-- Pills navs -->

                <!-- Pills content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col mb-4 mt-2">
                            <label class="text-center text-bold" style="font-weight: bold !important">¿Eres cliente o vendedor? Elige tu rol para acceder a tu área:</label>
                            <div class="btn-group btn-group-rol-login btn-group-sm margin-radio-group d-flex justify-content-center" role="group" aria-label="Seleccionar opción">
                                <input type="radio" id="radio-cliente" name="rol" value="cliente" onchange="selectRolLoginOption(this)" checked hidden>
                                <label class="btn btn-outline-secondary btn-sm active" for="radio-cliente">Cliente</label>

                                <input type="radio" id="radio-vendedor" name="rol" value="vendedor" onchange="selectRolLoginOption(this)" hidden>
                                <label class="btn btn-outline-secondary btn-sm" for="radio-vendedor">Vendedor</label>
                            </div>
                        </div>

                        <!-- Email input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="loginName" class="form-control" name="email"/>
                            <label class="form-label" for="loginName">Correo electrónico</label>
                        </div>

                        <!-- Password input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="loginPassword" class="form-control" name="password"/>
                            <label class="form-label" for="loginPassword">Contraseña</label>
                        </div>

                        <!-- Submit button -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Iniciar sesión</button>
                        </div>
                    </form>
                    </div>
                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form class="form" method="POST" action="#" id="frm_registrar">
                            @csrf

                            <!-- Name input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="registerName" class="form-control" name="nombre"/>
                                <label class="form-label" for="registerName">Nombre (s)</label>
                            </div>

                            <!-- LastName input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                                <input type="text" id="registerLastName" class="form-control" name="apellidos"/>
                                <label class="form-label" for="registerLastName">Apellido (s)</label>
                            </div>

                            <!-- Phone input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="text" id="registerPhone" class="form-control" name="telefono" onkeydown="validateNumber(event)"/>
                            <label class="form-label" for="registerPhone">Teléfono</label>
                            </div>

                            <!-- Email input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="registerEmail" class="form-control" name="email"/>
                            <label class="form-label" for="registerEmail">Correo electrónico</label>
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="registerPassword" class="form-control" name="password"/>
                            <label class="form-label" for="registerPassword">Contraseña</label>
                            </div>

                            <!-- Repeat Password input -->
                            <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="registerRepeatPassword" class="form-control" name="confirm_password"/>
                            <label class="form-label" for="registerRepeatPassword">Confirmar contraseña</label>
                            </div>

                            <div class="mb-4">
                                <label class="text-center text-bold" style="font-weight: bold !important">¿Eres cliente o vendedor? Elige tu rol para acceder a tu área:</label>
                                <div class="btn-group btn-group-rol-register btn-group-sm margin-radio-group d-flex justify-content-center" role="group" aria-label="Seleccionar opción">
                                    <input type="radio" id="radio-cliente-registro" name="rol" value="cliente" onchange="selectRolRegisterOption(this)" checked hidden>
                                    <label class="btn btn-outline-secondary btn-sm active" for="radio-cliente-registro">Cliente</label>

                                    <input type="radio" id="radio-vendedor-registro" name="rol" value="vendedor" onchange="selectRolRegisterOption(this)" hidden>
                                    <label class="btn btn-outline-secondary btn-sm" for="radio-vendedor-registro">Vendedor</label>
                                </div>
                            </div>

                            <label class="text-danger" style="font-weight: bold !important" id="feedback-error"></h4>
                            <!-- Submit button -->
                            <div class="d-flex justify-content-center">
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block mb-4" onclick="registrarUsuario()">¡Registrar!</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(() => {
        $('#radio-cliente').prop('checked', true).trigger('change');
        $('#radio-cliente-registro').prop('checked', true).trigger('change');

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

    function registrarUsuario() {
        const formData = new FormData($('#frm_registrar')[0]);

        $.ajax({
            url: "{{ url('register') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: () => {
                $("#loadingModal").modal("show")
            },
            success: (res, _, jqXHR) => {
                setTimeout(() => {
                    $("#loadingModal").modal("hide")

                }, 500);
            },
            error: (error) => {
                setTimeout(() => {
                    $("#loadingModal").modal("hide")
                    let errors = error.responseJSON.errors;

                    // Si quieres mostrar todos los errores, puedes recorrer el objeto 'errors'
                    let errorMessages = '';
                    for (let field in errors) {
                        errorMessages += `<p> -${errors[field].join(', ')}</p>`;
                    }

                    // Mostrar los mensajes de error
                    $('#feedback-error').html(errorMessages);

                }, 500);
            }
        })
    }


    function selectRolLoginOption(input) {
        $('.btn-group-rol-login .btn').removeClass('active');

        if ($(input).is(':checked')) {
            $(input).next('label').addClass('active');
        }
    }

    function selectRolRegisterOption(input) {
        $('.btn-group-rol-register .btn').removeClass('active');

        if ($(input).is(':checked')) {
            $(input).next('label').addClass('active');
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        let tabLinks = document.querySelectorAll('.nav-link');
        let tabContents = document.querySelectorAll('.tab-pane');

        tabLinks.forEach(function(link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                tabLinks.forEach(function(link) {
                    link.classList.remove('active');
                });
                link.classList.add('active');

                tabContents.forEach(function(content) {
                    content.classList.remove('show', 'active');
                });

                const target = document.querySelector(link.getAttribute('href'));
                target.classList.add('show', 'active');
            });
        });
    });


</script>
@endpush
