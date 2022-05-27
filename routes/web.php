<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get("/register", [UserController::class,"registerPage"]);
Route::post("/register", [UserController::class,"register"]);
Route::get("/login", [UserController::class,"loginPage"]);
Route::post("/login", [UserController::class,"login"]);
Route::get("/logout", [UserController::class,"logout"]);

Route::get("/", [ProductController::class,"home"]);
Route::get("/detail/{id}", [ProductController::class,"detail"]);
Route::get("/search", [ProductController::class,"search"]);

Route::get("/cartList", [ProductController::class,"cartList"]);
Route::post("/addCart", [ProductController::class,"addCart"]);
Route::post("/removeCart", [ProductController::class,"removeCart"]);

Route::get("/orderNow", [ProductController::class,"orderNow"]);
Route::post("/orderPlace", [ProductController::class,"orderPlace"]);
Route::get("/myOrders", [ProductController::class,"myOrders"]);