<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Models\marableDB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});





Route::get('/welcome', function () {
    return view('welcome');
});








Route::get('/marable', function () {
    return view('marable' ,  [
        'marable' => "www.marable.com.au" , 
         'wpterms' =>  marableDB::reading()  
        ])->with('testview' , 'astronaut') ;
});



Route::get('/data', [MyController::class, 'index']);
Route::get('/datashow', [MyController::class, 'displayShowData']);
Route::get('/datashow/{id}', [MyController::class, 'details']);