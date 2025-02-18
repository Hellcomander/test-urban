<a class="card btn border-dark border-b" style="width: 18rem;" href="{{ route('tienda', ['id' => $store->id]) }}">
    <div class="p-4">
        <img src="{{ $store->image_url ?? 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/Logo_de_Cherdraui.svg/640px-Logo_de_Cherdraui.svg.png' }}" class="card-img-top" alt="Imagen de {{ $store->nombre }}">
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $store->nombre }}</h5>
        <p class="card-text">{{ $store->direccion }}</p>
    </div>
</a>

