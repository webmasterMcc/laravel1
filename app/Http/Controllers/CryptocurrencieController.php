<?php

namespace App\Http\Controllers;

use App\Models\Cryptocurrencie;
use Illuminate\Http\Request;

class CryptocurrencieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $crypto =  new Cryptocurrencie("ethereum");

        //
        return view("/crypto" , [
            'crypto' => $crypto ,
             "data" => Cryptocurrencie::getPrice()  ,
        ]) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Cryptocurrencie $cryptocurrencie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cryptocurrencie $cryptocurrencie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cryptocurrencie $cryptocurrencie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cryptocurrencie $cryptocurrencie)
    {
        //
    }
}
