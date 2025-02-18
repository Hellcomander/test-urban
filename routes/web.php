<?php

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
    return view('auth.login');
})->name('login');

Route::post('/register', [UserController::class, 'registrar'])->name('register');

Route::middleware('auth:cliente')->get('/home', function () {
    return view('home.home');
})->name('home');
