@extends('layouts.master')

@section('content')
<div class="col s12 m12">
    <h1>Create Data</h1>

    <form method="post" action="{{url('raw_data')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="device_id">디바이스 아이덴티티 device_id (3)</label>
            <input type="text" class="form-control" id="device_id" placeholder="007" name="device_id" value="007">
        </div>
        <div class="form-group">
            <label for="is_animal">동물감지여부 is_animal (1)</label>
            <input type="text" class="form-control" id="is_animal" placeholder="1" name="is_animal" value="1">
        </div>
        <div class="form-group">
            <label for="is_car">차감지여부 is_car (1)</label>
            <input type="text" class="form-control" id="is_car" placeholder="1" name="is_car" value="1">
        </div>
        <div class="form-group">
            <label for="temperature">온도 temperature (3)</label>
            <input type="text" class="form-control" id="temperature" placeholder="010" name="temperature" value="010">
        </div>
        <div class="form-group">
            <label for="decibel">마이크 데시벨 decibel (3)</label>
            <input type="text" class="form-control" id="decibel" placeholder="080" name="decibel" value="080">
        </div>
        <div class="form-group">
            <label for="latitude">위도 latitude (20)</label>
            <input type="text" class="form-control" id="latitude" placeholder="37.482424" name="latitude" value="37.482424">
        </div>
        <div class="form-group">
            <label for="longitude">경도 longitude (21)</label>
            <input type="text" class="form-control" id="longitude" placeholder="127.035411" name="longitude" value="127.035411">
        </div>
        <div class="form-group">
            <label for="animal_name">동물이름 animal_name</label>
            <input type="text" class="form-control" id="animal_name" placeholder="고라니" name="animal_name" value="고라니">
        </div>
        <div class="form-group">
            <label for="photo">사진 경로 photo</label>
            <input type="text" class="form-control" id="photo" placeholder="sample1.jpg" name="photo" value="sample1.jpg">
        </div>
        <div class="form-group"> 
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    {{-- <h1>Create Raw Data</h1>

    <form method="post" action="{{url('raw_data')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="raw_data">raw_data</label>
            <input type="text" class="form-control" id="raw_data" placeholder="10293102938" name="raw_data">
        </div>
        <div class="form-group"> 
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form> --}}
</div>
@endsection