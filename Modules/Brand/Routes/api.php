<?php

use Illuminate\Http\Request;
use Modules\WebUI\Http\Controllers\WebUIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('brands', [\Modules\Brand\Http\Controllers\BrandController::class, 'index']);


//Route::middleware('auth:api')->group(function () {
////    Route::resource('brand', \Modules\Brand\Http\Controllers\BrandController::class)->except('index');
//});
