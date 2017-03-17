<?php

Route::get('raw_data', 'RawDataController@index');
Route::get('raw_data/{raw_data}', 'RawDataController@show');