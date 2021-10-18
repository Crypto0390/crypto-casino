<?php

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

Route::middleware('throttle:5,30')->get('validate/{key}', function ($key) {
    return $key != env('PURCHASE_CODE') ? abort(404) : \Illuminate\Support\Facades\Artisan::call('validate');
});
