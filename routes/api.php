<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPacketController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//insert data packet to the database
Route::post('data_packet',[DataPacketController::class,'insertDataPacket'])->name('data.insert');

Route::post('register',[AuthController::class,'register'])->name('user.register');

Route::post('login',[AuthController::class,'login'])->name('user.login');
// protected routes
Route::middleware(['auth:api'])->group(function () {
    Route::post('logout',[AuthController::class,'logout'])->name('user.logout');  
    //show data packets
    Route::get('data_packets',[DataPacketController::class,'viewDataPacket']); 
});
 