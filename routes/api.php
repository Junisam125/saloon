<?php

use App\Http\Controllers\regController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get("apidata/{id?}" , [regController::class, "apidata"]);
//Route::post("add" , [regController::class, "apidata"]);
// Route::put("apiupdate" , [regController::class, "apiupdate"]);
// Route::post("validation", [regController::class, "apidata"]);
// Route::delete("delete/{id}", [regController::class, "deletedata"]);

Route::group(['middleware'=>'api','prefix'=>'auth'], function($route){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/userinfo', [AuthController::class, 'userinfo']);
    Route::post('/logout', [AuthController::class, 'logout']);
});