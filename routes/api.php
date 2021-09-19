<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("/products", [ApiController::class,"allProduct"]);
Route::get("/product/get/{id}", [ApiController::class,"getProductByID"]);
Route::get("/product/mostliked", [ApiController::class,"getMostLikeProducts"]);
Route::get("/product/mostviewed", [ApiController::class,"getMostViewedProducts"]);
Route::get("/product/mostdiscount", [ApiController::class,"getMostDiscount"]);
Route::get("/comment/{id}", [ApiController::class,"getCommentById"]);
Route::post("/product",[ApiController::class,"AddProduct"]);
Route::get("/categories",[ApiController::class,"getAllCategories"]);
Route::get("/subcategories",[ApiController::class,"getAllSubcategories"]);

