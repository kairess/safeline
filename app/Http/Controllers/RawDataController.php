<?php

namespace App\Http\Controllers;

use App\RawData;
use App\DeviceData;
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
        $device_datas = DeviceData::latest()->get();
        return view('raw_data.index', compact('device_datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('raw_data.create');
    }

    public function store_raw(Request $request)
    {
        $very_raw_data = file_get_contents("php://input");

        RawData::create([
            'raw_data' => $very_raw_data
        ]);

        // is_animal 1
        // is_car 1
        // temperature 3
        // decibel 3
        // gps 21
        // device_id 3
        
        $animal_array = array_fill(0, 70, "고라니");
        $animal_array2 = array_fill(70, 10, "사슴");
        $animal_array3 = array_fill(80, 1, "삵");
        $animal_array4 = array_fill(81, 9, "곰");
        $animal_array5 = array_fill(90, 10, "멧돼지");
        // $animal_array6 = array_fill(90, 10, "사람");

        $animal_array = array_merge($animal_array, $animal_array2, $animal_array3, $animal_array4, $animal_array5);
        $animal_name = $animal_array[rand(0, 99)];
        
        DeviceData::create([
            'is_animal' => substr($very_raw_data, 0, 1),
            'is_car' => substr($very_raw_data, 1, 1),
            'temperature' => substr($very_raw_data, 2, 3),
            'decibel' => substr($very_raw_data, 5, 3),
            // 'latitude' => $request->latitude,
            // 'longitude' => $request->longitude,
            'animal_name' => $animal_name,
            'photo' => 'empty'
        ]);

        return $very_raw_data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DeviceData::create([
            'device_id' => $request->device_id,
            'is_animal' => $request->is_animal,
            'is_car' => $request->is_car,
            'temperature' => $request->temperature,
            'decibel' => $request->decibel,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'animal_name' => $request->animal_name,
            'photo' => $request->photo
        ]);

        return redirect(url('raw_data'));

        // RawData::create([
        //     'raw_data' => $request->raw_data
        // ]);

        // return redirect(url('raw_data'));
        // return $request->raw_data;
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
