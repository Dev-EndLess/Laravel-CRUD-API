<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

// Route::resource('products', ProductController::class);

/* Protected Routes */
Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::post('/products', [ProductController::class, 'store']);
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::put('/products/{id}', [ProductController::class, 'update']);
  Route::get('/products/search/{name}', [ProductController::class, 'search']);
});

/* Public Routes */
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::delete('products/{id}', [ProductController::class, 'destroy']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');