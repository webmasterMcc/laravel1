<?php

namespace App\Http\Controllers;

use App\Models\JobForm;
use Illuminate\Http\Request;

class JobFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $jobForm = new JobForm();
        //displayForm
        return view("jobform" ) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createNew()
    {
        //
        $jobForm = new JobForm();
       
        return redirect("jobform")->with([ 'jobForm' => $jobForm ]) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(JobForm $jobForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobForm $jobForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobForm $jobForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobForm $jobForm)
    {
        //
    }
}
