<?php

namespace App\Http\Controllers;

use App\Models\Tienda;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index() {
        $data['stores'] = Tienda::get();

        return view('stores.show', $data);
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'direccion.required' => 'El campo direccion es obligatorio.',
            'telefono.required' => 'El campo telefono es obligatorio.',
        ]);

        Tienda::create([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);

        return response('Tienda creada correctamente', 201);
    }

    public function show(Request $request) {
        $request->validate([
            'id' => 'required|integer'
        ]);

        $data['store'] = Tienda::find($request->id);

        return $data['store'] ? view('stores.details', $data) : abort(404);
    }

    public function update(Request $request) {
        $request->validate([
            'id' =>'required|integer',
            'nombre' => 'required|string',
            'direccion' => 'required|string',
            'telefono' => 'required|string',
        ]);

        $store = Tienda::findOrFail($request->id);

        $store->update([
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
        ]);

        return response('Actualizado correctamente', 201);
    }

    public function delete($id) {
        $store = Tienda::findOrFail($id);

        $store->delete();

        return response('Eliminada correctamente');
    }
}
