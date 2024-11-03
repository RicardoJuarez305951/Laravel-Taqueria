<?php

use Dompdf\Dompdf;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ExcelController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/dashboard', function () {
    //return view('dashboard');
    return redirect("/");
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
}); 

Route::controller(OrdenesController::class)->group(function(){
    Route::post('/crear-pedido', 'crearPedido')->name('crear_pedido');
});

Route::controller(UsersController::class) -> group(function(){
    Route::get('/taquero', 'taquero')->middleware('can:taquear');
    Route::post('/taquero-libera', 'taqueroLibera')->middleware('can:taquear');
    Route::post('/taquero-agrega-imagen', 'taqueroAgregaImagen')->middleware('can:taquear');
});

Route::controller(PDFController::class) -> group(function(){
    Route::get('/taquero/pdf', 'exportPDF')->middleware('can:taquear');
    Route::get('/taquero/pdf/generate', 'exportPDF')->middleware('can:taquear');
});

Route::controller(ExcelController::class) -> group(function(){
    Route::post('/taquero/excel', 'importExcel')->middleware('can:taquear');
    Route::post('/taquero/excel/generate', 'importExcel')->middleware('can:taquear');
    Route::post('/taquero/excel-export', 'exportExcel')->middleware('can:taquear');
});

Route::controller(pagesController::class) -> group(function(){
    Route::get('/', 'home');
    Route::get('/menu', 'menu'); 
    Route::get('/pedido', 'pedido')->middleware('can:buy');
    Route::get('/contacto', 'contacto');
    Route::get('/login', 'login');
    Route::get('/register', 'register');
});

require __DIR__.'/auth.php';
