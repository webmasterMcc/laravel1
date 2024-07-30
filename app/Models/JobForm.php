<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use App\Models\Job;

class JobForm extends Model
{
    use HasFactory;

    // protected $fillable = [ ] ;


    public function createNew(Request $request){
        $job = new Job();
        $allInputs = $request->all();

        dd($allInputs);
        return $job;

    }
    
}
