<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ZapatoController;
use App\Models\Zapato;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('zapateria');
});

Route::get('/zapateria', function () {
    return view('zapateria',[
        'zapatos'=>Zapato::all(),
        
    ]);
})->name('zapateria');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); */

Route::get('/dashboard',[ZapatoController::class,'index'])->middleware(['auth'])->name('dashboard');

Route::get('/carrito',[CarritoController::class,'index'])->middleware(['auth'])->name('carrito.index');

require __DIR__.'/auth.php';

Route::post('/carrito',[CarritoController::class,'Comprar'])->middleware(['auth'])->name('carrito.comprar');

Route::get('/carrito/vaciar',[CarritoController::class,'VaciarCarrito'])->middleware(['auth'])->name('carrito.vaciar');

Route::get('/carrito/comprar',[CarritoController::class,'comprar'])->middleware(['auth'])->name('carrito.comprar');

Route::post('/carrito/meter/{zapato}',[CarritoController::class,'agregarCarrito'])->middleware(['auth'])->name('carrito.agregarCarrito');

Route::resource('carritos',CarritoController::class);