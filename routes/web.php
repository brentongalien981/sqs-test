<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestRedisController;

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



Route::get('/nice', function () {
    return [
        'msg' => 'nice'
    ];
});
Route::get('/test-redis/put', [TestRedisController::class, 'put']);
Route::get('/test-redis/get', [TestRedisController::class, 'get']);
Route::get('/test-redis/get-connection', [TestRedisController::class, 'getConnection']);



Route::get('/test/dispatch-multiple-user-ids', [TestController::class, 'dispatchMultipleUserIds']);
Route::get('/hello', function () {
    return [
        'msg' => 'hello'
    ];
});
Route::get('/test/dispatch-on-queue-qorders', [TestController::class, 'dispatchOnQueueQOrders']);
Route::get('/test/dispatch-queue', [TestController::class, 'dispatchQueue']);



Route::get('/route-for-qw1', function () {
    return "ROUTE: route-for-qw1";
});



// /test/delay-create-user?name=vanessa&email=vanessa@lakers.com&password=vanessa123
Route::get('/test/delay-create-user', [TestController::class, 'delayCreateUser']);
Route::get('/test/create-user', [TestController::class, 'createUser']);



Route::get('/', function () {
    return view('welcome');
});
