<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    if (!auth()->check()) {
        return redirect('login');
    }

    return redirect('home');
});

Route::get('/login', function () {
    if (!auth()->check()) {
        return view('auth.login');
    }
    return redirect('home');
})->name('login');

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();

    return redirect('login');
})->name('logout');

Route::post('/register', [UserController::class, 'registrar'])->name('register');

Route::middleware('auth:cliente')->get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware('auth:vendedor')->get('/tiendas', [StoreController::class, 'index'])->name('tiendas');
Route::middleware('auth:vendedor')->get('/tienda', [StoreController::class, 'show'])->name('tienda');
Route::middleware('auth:vendedor')->post('/tienda', [StoreController::class, 'store'])->name('tienda.store');
Route::middleware('auth:vendedor')->put('/tienda/{id}', [StoreController::class, 'update'])->name('tienda.update');
Route::middleware('auth:vendedor')->delete('/tienda/{id}', [StoreController::class, 'delete'])->name('tienda.delete');
