<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StepsController extends Controller
{
    //
    public function displaySteps(){
           return view("steps");
    }
}
