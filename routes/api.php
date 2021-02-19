<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestWafController;

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


// Route::get('/test-waf/test-max-30-request', [TestWafController::class, 'testThrottle']);
Route::get('/test-waf/test-max-30-request', [TestWafController::class, 'testThrottle'])->middleware('throttle:30,1');
Route::get('/test-waf/testDdos', [TestWafController::class, 'testDdos']);
Route::get('/test-waf/test2', [TestWafController::class, 'test2']);

Route::get('/test-api-route', function () {
    return [
        'msg' => 'This is test-api-route'
    ];
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
