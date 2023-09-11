<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, ImovelController};

Route::get('/get-imoveis', [ImovelController::class,'getAllImoveis'])->name('get-imoveis');
Route::post('/search-imoveis/{search_param}', [ImovelController::class,'searchImoveis'])->name('search-imoveis');
