<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortUrlController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/query', function(Request $request) {
    // get url form func get-short-url in controller ShortUrlController and return the result to the client
    return ShortUrlController::getShortUrl($request);
});

Route::post("/insert", function(Request $request) {
    // insert URL and call the generateShortUrl method in the ShortUrlController
    return ShortUrlController::generateShortUrl($request);
    //return "test";
});




