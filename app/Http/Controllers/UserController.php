<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function registrar(Request $request) {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'telefono' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string',
            'confirm_password' => 'required|string',
            'rol' => 'required|string|in:cliente,vendedor',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'apellidos.required' => 'Los apellidos son obligatorios.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Por favor, ingresa un correo electrónico válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'confirm_password.required' => 'La confirmación de la contraseña es obligatoria.',
            'rol.required' => 'El rol es obligatorio.',
        ]);


        if($request->password !== $request->confirm_password) {
            return response()->json([
                'errors' => [
                    'Los campos de contraseñas deben ser IDÉNTICAS'
                ]
            ], 422);
        }

        $correoClienteRepetido = Cliente::where('email', $request->email)->first();
        $correoVendedorRepetido = Vendedor::where('email', $request->email)->first();

        if($correoClienteRepetido || $correoVendedorRepetido) {
            return response()->json([
                'errors' => [
                    'Correo no disponible'
                ]
            ], 422);
        }


        try {
            DB::beginTransaction();
            if($request->rol === 'cliente') {
                $this->storeCliente($request);
            } elseif($request->rol === 'vendedor') {
                $this->storeVendedor($request);
            }

            DB::commit();
            return redirect()->route('home');
        } catch (\Throwable $th) {
            DB::rollBack();
            return response('Error al registrar usuario', 500);
        }
    }

    private function storeCliente(Request $request) {
        $cliente = new Cliente();

        $cliente->nombre = $request->nombre;
        $cliente->apellidos = $request->apellidos;
        $cliente->telefono = $request->telefono;
        $cliente->email = $request->email;
        $cliente->password = Hash::make($request->password);

        $cliente->save();

        Auth::login($cliente);
    }

    private function storeVendedor(Request $request) {
        $vendedor = new Vendedor();

        $vendedor->nombre = $request->nombre;
        $vendedor->apellidos = $request->apellidos;
        $vendedor->telefono = $request->telefono;
        $vendedor->email = $request->email;
        $vendedor->password = Hash::make($request->password);

        $vendedor->save();
        Auth::login($vendedor);
    }
}
