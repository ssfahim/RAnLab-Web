<?php

namespace App\Http\Controllers;

use App\Models\Demography;
use Illuminate\Http\Request;

class DemographyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('demography');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demography  $demography
     * @return \Illuminate\Http\Response
     */
    public function show(Demography $demography)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demography  $demography
     * @return \Illuminate\Http\Response
     */
    public function edit(Demography $demography)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demography  $demography
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demography $demography)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demography  $demography
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demography $demography)
    {
        //
    }
}
