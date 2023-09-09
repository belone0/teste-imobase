<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ImovelController};
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('imoveis', ImovelController::class);
Route::get('/get-imoveis', [ImovelController::class,'getAllImoveis'])->name('get-imoveis');
Route::post('/search-imoveis/{search_param}', [ImovelController::class,'searchImoveis'])->name('search-imoveis');
