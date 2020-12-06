<?php
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::get('/{any}', function(){
    return view('layouts.app');
})->where('any', '.*');

// Route::get('get-umkm-desa-by-id/{desa_id}', 'UmkmDesaController@getDataUmkmById');