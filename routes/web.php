<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

Route::get('/', function () {
    return view('welcome');
});





Route::get('/marable', function () {
    return view('marable' ,  ['marable' => "www.marable.com.au"]);
});



Route::get('/data', [MyController::class, 'index']);
Route::get('/datashow', [MyController::class, 'displayShowData']);
Route::get('/datashow/{id}', [MyController::class, 'details']);