<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', 'PublicController@index');
Route::get('product-detail/{id}', 'PublicController@productDetail');
Route::get('total-products', 'PublicController@totalProducts');

Route::get('ukms/{desa_id}', 'DesaController@getUmkmDesa');
Route::get('global-kecamatan/{id}', 'DesaController@getGlobalDataUmkmKecamatan');
Route::get('global-umkm', 'DesaController@getGlobalDataUmkm');
Route::get('get-umkm-desa-by-id/{id}', 'DesaController@getDataUmkmById');
Route::post('update-umkm-desa/{id}', 'DesaController@updateDataUmkmById');
Route::post('delete-umkm-desa/{id}', 'DesaController@deleteDataUmkmById');

Route::get('export-umkm-desa/{desa_id}', 'ExportController@exportDesa');

// Route::post('add-product', 'Api\ProductController@addProduct');
Route::post('logout', 'AuthController@logout');
Route::post('login', 'AuthController@login')->name('login');

// ADMIN
Route::post('upload-photo-product', 'AdminController@uploadProduct');
Route::get('export-umkm-admin-k-d-k/{kcmtn}/{desa}/{kriteria}', 'ExportController@exportAdminKriteria');
Route::get('export-umkm-admin-k/{kcmtn}', 'ExportController@exportAdminKecamatan');
Route::get('export-umkm-admin-k-d-u/{kcmtn}/{desa}/{up}', 'ExportController@exportAdminUsahaPokok');
Route::get('export-umkm-admin-k-k/{kcmtn}/{kriteria}', 'ExportController@exportAdminUsahaPokok');
Route::get('export-umkm-admin-k-u/{kcmtn}/{up}', 'ExportController@exportAdminUsahaPokok');
// Route::get('export-umkm-admin/{name?}', 'ExportController@exportAdmin');

// get kecamatan and desa (dependent dropdown)
Route::get('get-usaha-pokok', 'DesaController@getUsahaPokok');
Route::get('get-kriteria', 'DesaController@getKriteria');
Route::get('get-kecamatans', 'DesaController@getKecamatan');
Route::get('get-desa-by-kecamatan-id', 'DesaController@getDesa');
