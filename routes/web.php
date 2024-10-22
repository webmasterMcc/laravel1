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

 
Route::get('/jobs', function (Request $request)   {
    $job = new Job();
   // $result = Job::all() ;
   // tailwind pagination options :  paginate -   simplePaginate -  cursorPaginate 
  // $result = $job->with('employer')->simplePaginate(3);
  // $result = $job->with('employer')->cursorPaginate(3);
  //dd($request->all());

  $result = $job->with('employer')->latest()->paginate(3);
  return view('jobs.index' , [ "jobs" =>  $result  ]);

});



/// jobs create
Route::get('/jobs/create', function () {
  //  dd('hello world');
    return view('jobs.create');
} );
/// jobs create
Route::post('/jobs/create', function(request $request){
    // $data = $request->all();
    // dd('hello from post ' ,  $data);
    // App\Models\Job::create([
    //     'title' => request('title'),
    //     'salary' => request('salary'),
    //     'employer_id' => 1 ,
    // ]);
    // $validatedData = $request->validate([
    //     'title' => ['required', 'string', 'max:255'],
    //     'salary' => ['required', 'numeric'],
    //     'employer_id' => ['required', 'numeric'],
    // ]);

    Job::createJob(request('title') , (request('employer_id')+1) ,  request('salary') ) ;

 //   dd(request("title") , request("salary"));
    //dd(request("salary"));
    return redirect('/jobs');
} )->name('jobs-create') ;

Route::get('jobs/jobform', [JobFormController::class , 'index'] ) ;    
Route::post('jobs/jobform', [JobFormController::class , 'createNew'] )->name('jobform-submit') ;    





/// show jobs form
Route::get('/jobs/{id}', function ($id)  {
    
    $job = new Job();
    // return $id ; 
    // dd($job);
   // return Job::find($id); 
    $result = $job::find($id) ; 
   
    return view("jobs.show" , [ 'job' => $result  ]);   
});


/// edit and existing job
Route::get('/jobs/{id}/edit', function ($id)  {
    
    $job = new Job();
    $result = $job::find($id) ; 
    return view("jobs.edit" , [ 'job' => $result  ]);   
});

//UPDATE job - patch
Route::patch('/jobs/{id}', function ($id)  {

/*
    request()->validate(
        [
            'title' => ['required','string','max:255'],
           'salary' => ['required','numeric'],
            'employer_id' => ['required','numeric'],
        ]
    ) ;

    /*
    //way one to update ORM database
    
    $job->title = request("title");
    $job->salary = request("salary");
    $job->save() ;
    
    //way one to update ORM database
   
    # way 2 to update data from database
    
*/ 
    // request()->validate([
    //     'title' => ['required', 'min:3'],
    //     'salary' => ['required']
    // ]);

    // authorize (On hold...)

    $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);  
}); //patch

///DESTROY - delete
Route::delete('/jobs/{id}', function ($id)  {
    // $job = new Job();
    // $result = $job::findOrFail($id) ; 
    // $result->delete();
    Job::findOrFail($id)->delete();
    return redirect('/jobs')  ;
});

///delete




// Route::get('/jobform', function () {
    //     return view('jobform');
    // });
    // Route::match(['get', 'jobform'], '/', function () {
        //     // ...
        // });
        
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