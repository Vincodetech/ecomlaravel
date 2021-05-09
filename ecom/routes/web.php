<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Support\Facades\Session;

Route::get('/login', [UserController::class,'login']);

Route::get('/logout', [UserController::class,'logout']);

Route::post('/postlogin',[UserController::class,'postlogin']);

Route::get('/register', [UserController::class,'register']);

Route::post('/postuser', [UserController::class, 'postUser']);

Route::get('/',[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get("cartlist",[ProductController::class,'cartList']);
Route::get("removecart/{id}",[ProductController::class,'removeCart']);
Route::get("ordernow",[ProductController::class,'orderNow']);
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorders",[ProductController::class,'myOrders']);
Route::get("search",[ProductController::class,'search']);