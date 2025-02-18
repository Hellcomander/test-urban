<div class="layout-px-spacing hide-element" id="fragmento_add_store">
    <div class="container-fluid p-5">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card w-50">
                <div class="card-body d-flex row">
                    <form class="form" method="POST" action="#" id="frm_store">
                        <!-- Name input -->
                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="addName">Nombre </label>
                            <input type="text" id="addName" class="form-control" name="nombre" required/>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="addAddress">Dirección </label>
                            <input type="text" id="addAddress" class="form-control" name="direccion" required/>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <label class="form-label" for="addAddress">Teléfono </label>
                            <input type="text" id="addAddress" class="form-control" name="telefono" required/>
                        </div>

                        <label class="text-danger" style="font-weight: bold !important" id="feedback-error"></h4>

                        <!-- Submit button -->
                        <div class="">
                            <button type="button" class="btn btn-primary mb-2 mr-2" onclick="saveStore()">Guardar</button>
                            <button type="button" class="btn btn-outline-primary mb-2 " onclick="back()">Volver</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
