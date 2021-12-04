<?php

namespace App\Http\Controllers;

use App\Models\institution;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions=Institution::all();
        
        return view('template.cdf.institution-index',compact('institutions'));
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
     * @param  \App\Models\institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit(institution $institution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, institution $institution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(institution $institution)
    {
        //
    }
}
