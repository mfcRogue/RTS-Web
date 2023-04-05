<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LobbyAPIController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/lobby/createnewlobby', [LobbyAPIController::class, 'create']);
    Route::post('/lobby/destroylobby', [LobbyAPIController::class, 'destroy']);
    Route::post('/lobby/getlobbyinfo', [LobbyAPIController::class, 'getInfo']);
    Route::post('/lobby/listlobby', [LobbyAPIController::class, 'getAll']);
    Route::post('/lobby/leavelobby', [LobbyAPIController::class, 'leave']);
    Route::post('/lobby/joinlobby', [LobbyAPIController::class, 'join']);

});
