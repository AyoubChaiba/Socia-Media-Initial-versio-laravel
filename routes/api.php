<?php

use App\Http\Controllers\api\loginProfileController;
use App\Http\Controllers\api\ProfileController;
use App\Http\Controllers\api\publicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('profile',ProfileController::class);
Route::apiResource('publication',publicationController::class);
Route::apiResource('login',loginProfileController::class);
