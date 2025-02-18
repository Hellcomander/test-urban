@extends('master')

@section('content')

<div class="layout-px-spacing">
    <div class="container-fluid p-5">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card w-50">
                <div class="card-body d-flex row">
                    <form class="form" method="POST" action="#" id="frm_store">
                        <input type="hidden" name="id" value="{{ $store->id }}">
                        <!-- Name input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="addName">Nombre </label>
                            <input type="text" id="addName" class="form-control" name="nombre" value="{{ $store->nombre }}" required/>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="addAddress">Dirección </label>
                            <input type="text" id="addAddress" class="form-control" name="direccion" value="{{ $store->direccion }}" required/>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="addPhone">Teléfono </label>
                            <input type="text" id="addPhone" class="form-control" name="telefono" value="{{ $store->telefono }}" required/>
                        </div>

                        <label class="text-danger" style="font-weight: bold !important" id="feedback-error"></h4>

                        <!-- Submit button -->
                        <div class="">
                            <button type="button" class="btn btn-primary mb-2 mr-2" onclick="update()">Actualizar</button>
                            <button type="button" class="btn btn-danger mb-2 mr-2" onclick="deleteStore()">Eliminar</button>
                            <a href="{{ route('tiendas') }}" class="btn btn-outline-primary mb-2">Volver</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>

        function update() {
            const form = $('#frm_store')[0];

            if(form.checkValidity()) {
                const formData = new FormData(form);
                formData.append('_method', 'PUT');

                $.ajax({
                    url: "{{ route('tienda.update', ['id' => $store->id]) }}",
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
        }

        function deleteStore() {
            $.ajax({
                url: "{{ route('tienda.delete', ['id' => $store->id]) }}",
                type: 'DELETE',
                beforeSend: () => {
                    $("#loadingModal").modal("show")
                },
                success: (res, _, jqXHR) => {
                    setTimeout(() => {
                        $("#loadingModal").modal("hide")
                        location.href = "{{ route('tiendas') }}"
                    }, 500);
                },
                error: (error) => {
                    setTimeout(() => {
                        $("#loadingModal").modal("hide")
                        let errors = error.responseJSON.errors;

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

    </script>
@endpush

