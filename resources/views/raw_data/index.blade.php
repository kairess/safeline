@extends('layouts.master')

@section('content')
<div class="col s12 m12">
    <h1>Raw Data</h1>

    <a class="btn btn-primary" href="{{url('raw_data/create')}}" role="button">Create</a>

    <table>
        <thead>
            <tr>
                <th data-field="id">id</th>
                <th data-field="device_id">device_id</th>
                <th data-field="is_animal">is_animal</th>
                <th data-field="is_car">is_car</th>
                <th data-field="temperature">temperature</th>
                <th data-field="decibel">decibel</th>
                <th data-field="latitude">latitude</th>
                <th data-field="longitude">longitude</th>
                <th data-field="created_at">created_at</th>
            </tr>
        </thead>

        <tbody>
            @foreach($device_datas as $device_data)
            <tr>
                <td>{{$device_data->id}}</td>
                <td>{{$device_data->device_id}}</td>
                <td>{{$device_data->is_animal}}</td>
                <td>{{$device_data->is_car}}</td>
                <td>{{$device_data->temperature}}</td>
                <td>{{$device_data->decibel}}</td>
                <td>{{$device_data->latitude}}</td>
                <td>{{$device_data->longitude}}</td>
                <td>{{$device_data->created_at->diffForHumans()}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection