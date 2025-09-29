<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pzn', function () {
    return "Halo siaaaap";
});

Route::redirect('/ytb', '/pzn'); // Redirect route   

Route::fallback(function () {
    return "404 halaman kaga ada";
});

//Test VIEW
Route::get('/hello-test', function () {
    return view('hello', ['nama' => 'abdul']);
});
Route::get('/nested-test', function () {
    return view('nestedView.hello', ['nama' => 'sanusi']);
});


//TEST Route parameter
Route::get('/products/{id}', function ($productId) {
    return "Product ID: $productId";
})->name('product.detail'); //named route

Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product ID: $productId, Item Name: $itemId";
})->name('product.item.detail'); //named route

//REGULAR EXPRESSION ROUTE
Route::get('/products-regex/{id}', function ($productId) {
    return "Product ID: $productId";
})->where('id', '[0-9]+');

//TEST NAMED ROUTE
Route::get('/produk/{id}', function ($id) {
    $link = route('product.detail', ['id' => $id]);
    return "Link: $link";
});

//Contoh penerapan Named Route
Route::get('/produk/{id}/barang/{barang}', function ($id, $barang) {
    $link = route('product.item.detail', ['product' => $id, 'item' => $barang]);
    return "Link: $link";
});
Route::get('/produk-redirect/{id}', function ($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});

//TEST CONTROLLER
/* Route::get('/controller/hello', [\App\Http\Controllers\HelloController::class, 'hello']); */
Route::get('/controller/hello/request', [\App\Http\Controllers\HelloController::class, 'request']);
Route::get('/controller/hello/{name}', [\App\Http\Controllers\HelloController::class, 'hello']);

//===TEST INPUT REQUEST==
//Test dengan Method GET
Route::get('/input/hello', [\App\Http\Controllers\InputController::class, 'hello']);

//TEST dengan Method POST
Route::post('/input/hello', [\App\Http\Controllers\InputController::class, 'hello']);

//TEST dengan Method POST dan input nested
Route::post('/input/hello/first', [\App\Http\Controllers\InputController::class, 'hellofirst']);

//TEST dengan Method POST dan input semua
Route::post('/input/hello/input', [\App\Http\Controllers\InputController::class, 'helloInput']);

//TEST ambil data Array spesifik
Route::post('/input/hello/array', [\App\Http\Controllers\InputController::class, 'helloArray']);

//TEST Input Type
Route::post('/input/type', [\App\Http\Controllers\InputController::class, 'inputType']);

//TES Filter Input
Route::post('/input/filter/only', [\App\Http\Controllers\InputController::class, 'filterOnly']);
Route::post('/input/filter/except', [\App\Http\Controllers\InputController::class, 'filterExcept']);

//Filter Merge & MergeIfMissing
Route::post('/input/merge', [\App\Http\Controllers\InputController::class, 'filterMerge']);
Route::post('/input/mergeifmising', [\App\Http\Controllers\InputController::class, 'filterMergeIfMising']);

//File Upload
Route::post('/file/testupload', [\App\http\controllers\fileUploadController::class, 'testUpload']);

//RESPONSE
Route::get('/response/hello', [\App\Http\Controllers\ResponseController::class, 'response']);

