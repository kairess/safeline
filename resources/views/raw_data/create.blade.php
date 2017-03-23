@extends('layouts.master')

@section('content')
<div class="col s12 m12">
    <h1>Create Raw Data</h1>

    <form method="post" action="{{url('raw_data')}}">
        {{csrf_field()}}
        <div class="form-group">
            <label for="raw_data">raw_data</label>
            <input type="text" class="form-control" id="raw_data" placeholder="10293102938" name="raw_data">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection