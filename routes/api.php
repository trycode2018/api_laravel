<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Auth\Api\LoginController;
use App\Http\Controllers\Auth\Api\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('stores',StoreController::class)
    ->only('index','show');

Route::apiResource('stores',StoreController::class)
    ->only('update','delete','store')->middleware('auth:sanctum');

Route::apiResource('stores.products',ProductController::class)->only(['index']);

Route::prefix('auth')->group(function(){

    Route::post('/login',[LoginController::class,'login']);
    Route::post('/logout',LoginController::class,'logout')->middleware('auth:sanctum');
    Route::post('/register',[RegisterController::class,'register']);
});




