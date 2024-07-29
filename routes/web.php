<?php

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

// Route::get('/jobs', function () use ($jobs) {
    Route::get('/jobs', function ()   {
  /*
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ]
    ]);
*/


return view('jobs' , ["jobs" => Job::all()   ]);

});

Route::get('/jobs/{id}', function ($id)  {
  
      $job =  Arr::first(Job::all(), function ($job) use ($id) {
        return $job['id'] == $id;
        
       });
     //  dd($job);
       return view("job" , [ 'job' => $job]);   
   // return $id ; 
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