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

    public function insertData($title, $salary){

        if(!empty($title) && !empty($salary)){
            Job::create(['title'=> $title , 'salary' =>  $salary]);
        }else{
            echo "Please provide both title and salary";
        }
         
    }
    public static function find($id){
      //   App\Models\Job::find(2)
      return Job::find($id);
    }

    public static function create(){
       // App\Models\Job::factory(22)->create() ;
       return Job::factory(22)->create() ;
    }
}
