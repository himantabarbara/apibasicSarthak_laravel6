<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider which is in app\Http\Providers within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/products','ProductController'); 
// /api/products/{product} , product.show

//creates  store,index,destroy,update, show 

//skirt-->review 
//products/{product}/reviews

Route::group(['prefix'=>'products'],function(){
    Route::apiResource('/{product}/reviews','ReviewController');
});

//add a prefix to each route in the group
Route::prefix('products')->name('products.')->group(function(){
    Route::apiResource('/{product}/reviews','ReviewController');
});
