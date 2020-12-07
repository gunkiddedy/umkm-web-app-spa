<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', 'Api\ProductController@index');

Route::get('ukms/{desa_id}', 'UmkmDesaController@getUmkmDesa');
Route::get('global-kecamatan/{id}', 'UmkmDesaController@getGlobalDataUmkmKecamatan');
Route::get('global-umkm', 'UmkmDesaController@getGlobalDataUmkm');
Route::get('get-umkm-desa-by-id/{id}', 'UmkmDesaController@getDataUmkmById');
Route::post('update-umkm-desa/{id}', 'UmkmDesaController@updateDataUmkmById');
Route::post('delete-umkm-desa/{id}', 'UmkmDesaController@deleteDataUmkmById');
Route::get('export-umkm-desa/{desa_id}', 'UmkmDesaController@export');

Route::post('add-product', 'Api\ProductController@addProduct');
Route::post('logout', 'AuthController@logout');
Route::post('login', 'AuthController@login')->name('login');

// get kecamatan and desa (dependent dropdown)
Route::get('get-usaha-pokok', 'UmkmDesaController@getUsahaPokok');
Route::get('get-kriteria', 'UmkmDesaController@getKriteria');
Route::get('get-kecamatans', 'UmkmDesaController@getKecamatan');
Route::get('get-desa-by-kecamatan-id', 'UmkmDesaController@getDesa');
