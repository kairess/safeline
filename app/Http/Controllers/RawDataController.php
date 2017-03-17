<?php

namespace App\Http\Controllers;

use App\RawData;
use Illuminate\Http\Request;

class RawDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw_datas = RawData::latest()->get();
        return view('raw_data', compact('raw_datas'));
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
     * @param  \App\RawData  $rawData
     * @return \Illuminate\Http\Response
     */
    public function show(RawData $rawData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RawData  $rawData
     * @return \Illuminate\Http\Response
     */
    public function edit(RawData $rawData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RawData  $rawData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawData $rawData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RawData  $rawData
     * @return \Illuminate\Http\Response
     */
    public function destroy(RawData $rawData)
    {
        //
    }
}
