<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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
Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::get('/check', function (Request $request) {
    return response()->json([
        'message' => 'Welcome to the API',
        'status' => 'success',
    ]);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    //Example protected route
    Route::get('/withmiddleware', function (Request $request) {
        return response()->json([
            'message' => 'API Authenticated',
            'status' => 'success',
        ]);
    });

    //Logout
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
