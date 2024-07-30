<?php

use App\Http\Controllers\CryptocurrencieController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Models\marableDB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr ;




Route::get('/', function () {
   return view('home');
});

 
Route::get('/jobs', function ()   {
 
return view('jobs' , ["jobs" => Job::all()   ]);

});

Route::get('/jobs/{id}', function ($id)  {
 
    $job = Job::find($id);
    return view("job" , [ 'job' => $job]);   
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});



Route::prefix('/crypto')->group(
    function () {
    
        Route::get('/', [CryptocurrencieController::class, 'index']);
    
        Route::get('/bitcoin', function () {
            return view('crypto.bitcoin');
        });
    
        Route::get('/ethereum', function () {
            return view('crypto.ethereum');
        });
    
        Route::get('/litecoin', function () {
            return view('crypto.litecoin');
        });
    }
);




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