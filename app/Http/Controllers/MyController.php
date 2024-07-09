<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
     public function index(){
        return view('data');
    }
    
    
    public function displayShowData(){
        return view('datashow');
    }
    
       // //showData
    // public function showData(int $id): array
    // {
    //     $myNum = [1, 2, 3, 4, 5];
        
    //     // Check if the id is within the bounds of the array
    //     // if (isset($myNum[$id])) {
    //     //     return view('datashow' , 
    //     //     ['foo' => $myNum[$id]]) ;
    //     // } else {
    //     //     return ['error' => 'ID not found'];
    //     // }
    //     $id = $id ;
    //     // return view('datashow' , ['id' => $id]) ;
    // } //showData
    
     public function details($id)
    {
         $myLanguages = ["Javascript", "PHP", "TailwindCSS", "Laravel", "React"  , "Typescript" , "sql"];
        //  $id = 1 ; 
        // return view('datashow' , compact($id));
        return view('datashow' ,[
            'id' => $id ,
            "myLanguages" => $myLanguages ]);
    }
}
