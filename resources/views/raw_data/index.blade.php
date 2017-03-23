@extends('layouts.master')

@section('content')
<div class="col s12 m12">
    <h1>Raw Data</h1>

    <table>
        <thead>
            <tr>
                <th data-field="id">Name</th>
                <th data-field="name">Item Name</th>
                <th data-field="price">Item Price</th>
            </tr>
        </thead>

        <tbody>
            @foreach($raw_datas as $raw_data)
            <tr>
                <td>Alvin</td>
                <td>{{$raw_data->raw_data}}</td>
                <td>{{$raw_data->created_at->subHours(9)->diffForHumans()}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection