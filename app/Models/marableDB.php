<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class marableDB extends Model
{
    use HasFactory;
    
    public static function reading(){
        $terms = DB::table('wp_terms')->get();
      //  $data  =  response()->json($terms);
          //var_dump($terms);
      //    echo $data ;
        
        
      //  echo '<br> connected <br>' ;
        
        return $terms ; 
    }
    
}
