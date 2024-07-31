<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Steps extends Model
{
    use HasFactory;
    public $steps;

    public function __construct($steps){
        $this->name = 'Step Calculation' ;
        $this->steps = $steps ; 
        $this->display = true ;  // display the result in the view  // default value is true  // change it to false to hide the result in the view  // default value is false  // change it to true to display the result in the view  // default value is true  // change it to false to hide the result in the view  // default value is false  // change it to true to display the result in the view  // default value is true  // change it to false to hide the result in the view  // default value is false  // change it to true to display the result in the view  // default value is true  // change it to false to hide the result in the view  // default value is false  // change it to true to display the result in the view  // default value is true  // change it
    }

    public function calculatingSteps(){
        $steps = $this->steps ; 
        $result = $steps * 0.74 ; 
        return $result ;  // return the result of calculation
    }
}
