<?php

use App\Http\Controllers\CryptocurrencieController;
use App\Http\Controllers\JobFormController;
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

// Route::get('/jobform', function () {
//     return view('jobform');
// });

Route::get('/jobform', [JobFormController::class , 'index'] ) ;    

Route::post('/jobform', [JobFormController::class , 'createNew'] )->name('jobform-submit') ;    

// Route::match(['get', 'jobform'], '/', function () {
//     // ...
// });


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