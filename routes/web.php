<?php

Route::get('raw_data', 'RawDataController@index');
Route::get('raw_data/create', 'RawDataController@create');
// Route::get('raw_data/{raw_data}', 'RawDataController@show');

Route::post('raw_data', 'RawDataController@store');