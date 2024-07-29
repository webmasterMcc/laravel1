<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr ;

class Job  
{
    use HasFactory;
 
    public static function all(){
        //https://laravel.com/docs/11.x/helpers 
        // https://laravel.com/docs/5.1/controllers
     return [
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
            ];
    }

    public static function find($id){
        $job =  Arr::first(static::all() , fn($job) => $job['id'] == $id);
        if(!$job){
            abort(404);
        }
        return $job;
    }
    
}
