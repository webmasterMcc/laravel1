<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr ;

class Job  extends Model
{
    use HasFactory;
  

    protected $table = "job_listings" ;

    protected $fillable = ['title', 'salary'];


    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");

    }

    public function insertData($title, $salary){

        if(!empty($title) && !empty($salary)){
            Job::create(['title'=> $title , 'salary' =>  $salary]);
        }else{
            echo "Please provide both title and salary";
        }
         
    }
    public static function findJob($id){
      //   App\Models\Job::find(2)
      dd($id);
      return Job::find($id);
    }

    public static function create(){
       // App\Models\Job::factory(22)->create() ;
       return Job::factory(22)->create() ;
    }


    public function FindFirst(){
        $job = new Job();
        $firstJob = $job->findFirst();
        $jobEmployerName = $job->Employer->name ; 
        
       // App\Models\Job::first();
    }
}
