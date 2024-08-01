<?php

use App\Http\Controllers\CryptocurrencieController;
use App\Http\Controllers\JobFormController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Models\marableDB;
use App\Models\Steps;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr ;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

Route::get('/', function () {
   return view('home');
});

 
Route::get('/jobs', function ()   {
    $job = new Job();
   // $result = Job::all() ;
   
   $result = $job->with('employer')->get();
return view('jobs' , [ "jobs" =>  $result  ]);

});

Route::get('/jobs/{id}', function ($id)  {
    
    $job = new Job();
    // return $id ; 
    // dd($job);
   // return Job::find($id); 
    $result = $job::find($id) ; 
   
    return view("job" , [ 'job' => $result  ]);   
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
 /// crypto

 // steps 
/*
 Route::get('/steps', function () {
    return view('steps');
});
*/
Route::match(['get', 'post'], '/steps', function (request $request) {

    
    //
     if($request->isMethod('get')){
          // Retrieve session data if it exists
          $data = session('data', []);
          $totalSteps = session('totalSteps', 0);
         return view('steps');

     }elseif ($request->isMethod("post")) {

        # post method...
        $data = $request->all();
        $steps = new Steps($data['steps']);
        $totalSteps = $steps->calculatingSteps();

        //dd($data['steps']);
       // dd($totalSteps);
        return redirect('/steps')
        ->with('data', $data)
        ->with("totalSteps", $totalSteps);
         
     }


})->name('stepCalculator');

 // steps 


Route::get('/welcome', function () {
   
    return view('welcome');
});

Route::get('/login', function () {
    $data = Session::all();
    $email = session('email', null);
    $password = session('password', null);
   // $email = Input::get('email' , null);

    return view('login' , [
        'email' => $email,
        'password' => $password,
        'error' => session('error', null) , 
        'data' => $data 
    ]);
});

Route::post('/login' , function (request $request) {
    
    $data = $request->all();
   // dd($data['email']) ;

    return redirect('/login')
    ->with('data' , $data)
    ->with('email' , $data['email']);
})->name('loginForm');








Route::get('/marable', function () {
    return view('marable' ,  [
        'marable' => "www.marable.com.au" , 
         'wpterms' =>  marableDB::reading()  
        ])->with('testview' , 'astronaut') ;
});



Route::get('/data', [MyController::class, 'index']);
Route::get('/datashow', [MyController::class, 'displayShowData']);
Route::get('/datashow/{id}', [MyController::class, 'details']);