<?php

namespace App\Http\Controllers;

use App\Models\MainEntries;
use Illuminate\Http\Request;

class MainEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('main_entries.index');
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
     * @param  \App\Models\MainEntries  $mainEntries
     * @return \Illuminate\Http\Response
     */
    public function show(MainEntries $mainEntries)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainEntries  $mainEntries
     * @return \Illuminate\Http\Response
     */
    public function edit(MainEntries $mainEntries)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainEntries  $mainEntries
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainEntries $mainEntries)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainEntries  $mainEntries
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainEntries $mainEntries)
    {
        //
    }
}
