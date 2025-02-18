@extends('master')

@section('content')

    <div class="col-md-10 m-auto">
        <div class="statbox widget box box-shadow mb-2 mt-5" id="fragmento_all_stores">
            <div class="widget-content widget-content-area">

                <div class="container">
                    @if(count($stores) === 0)
                        <div class="row justify-content-center">
                            <div class="col-sm-4 mb-3">
                                <div class="card border-dark btn" style="width: 18rem; max-height: 19rem !important" onclick="showAddStoreForm()">
                                    <div class="card-body">
                                        <div class="m-auto">
                                            <i class="las la-plus-square icon-large"></i>
                                            <h5 class="card-title">Añadir nueva tienda</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @foreach($stores as $index => $store)
                        @if($index % 3 == 0)
                            <div class="row justify-content-center">
                        @endif
                        <div class="col-sm-4 mb-3">
                            @include('stores.components.card', ['store' => $store])
                        </div>
                        @if ($index == count($stores) - 1)
                            <div class="col-sm-4 mb-3">
                                <div class="card border-dark btn" style="width: 18rem; max-height: 19rem !important" onclick="showAddStoreForm()">
                                    <div class="card-body">
                                        <div class="m-auto">
                                            <i class="las la-plus-square icon-large"></i>
                                            <h5 class="card-title">Añadir nueva tienda</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($index % 3 == 2 || $index == count($stores) - 1)
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    @include('stores.components.add')

@endsection

@push('scripts')
    <script>
        function showAddStoreForm() {
            $('#fragmento_add_store').removeClass('hide-element');
            $('#fragmento_all_stores').addClass('hide-element');
        }

        function back() {
            $('#fragmento_add_store').addClass('hide-element');
            $('#fragmento_all_stores').removeClass('hide-element');
        }

        function saveStore() {
            const form = $('#frm_store')[0];

            if(form.checkValidity()) {
                const formData = new FormData(form);

                $.ajax({
                    url: "{{ route('tienda.store') }}",
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
                            window.location.reload();
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
    </script>
@endpush
