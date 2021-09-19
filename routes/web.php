<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\SalerController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    //joint routes
    Route::get("/login",[MainController::class, 'GetLoginPage'])->name("login");
    Route::post("/login",[MainController::class, 'Login']);
    Route::get("/signup",[MainController::class, 'GetSignUpPage'])->name("signup");
    Route::post("/signup",[MainController::class, 'SignUp']);
    Route::post("/add-to-cart",[MainController::class, 'AddToCart'])->name("addToCart");
    Route::get("/cart_items",[MainController::class, 'cartPage'])->name("cartIndex");
    Route::get("/delete-to-cart/{id}",[MainController::class, 'deleteCart'])->name("deleteToCart");
    Route::get("/detail/{id}",[MainController::class, 'ProductDetail'])->name("product.detail");
    Route::get("/saler/index",[MainController::class,"getSalerIndex"])->name("saler_index");
    Route::get('/',[MainController::class,"index"])->name("front_index");
    Route::get("/saler/signup",[MainController::class,"getSalersSignUp"])->name("saler_signup");
    Route::post("/saler/signup",[MainController::class,"salersSignUp"]);
    Route::get("/saler/login",[MainController::class,"getSalersLogin"])->name("saler_login");
    Route::post("/saler/login",[MainController::class,"salersLogin"]);
    Route::get("/admin/login",[MainController::class,"SuperAdminLoginPage"])->name("superadmin.login");
    Route::post("/admin/login",[MainController::class,"SuperAdminLogin"]);
    Route::get("/category/{id}",[MainController::class,"getCategoryById"])->name("category.get");

    //Saler routes
    Route::get("/saler/add_product",[SalerController::class,"AddPage"])->name("saler_addProduct");
    Route::post("/saler/add_product",[SalerController::class,"SaveProduct"]);
    Route::get("/saler/my_products",[SalerController::class,"MyProducts"])->name("saler_myProducts");
    Route::get("/saler/productDetail/{id}",[SalerController::class,"Detail"])->name("saler_productDetail");
    Route::get("/saler/productUpdate/{id}",[SalerController::class,"UpdatePage"])->name("saler_productUpdate");
    Route::post("/saler/productUpdate/{id}",[SalerController::class,"UpdateProduct"]);
    Route::get("/saler/productDelete/{id}",[SalerController::class,"DeleteProduct"])->name("saler_productDelete");
    Route::get("/saler/uncompletedOrders",[SalerController::class,"UncompletedOrders"])->name("saler.uncompleteOrders");
    Route::get("/saler/completedOrders",[SalerController::class,"CompletedOrders"])->name("saler.completedOrders");
    Route::get("/saler/canceledOrders",[SalerController::class,"CanceledOrders"])->name("saler.canceledOrders");
    Route::get("/saler/orders/cancel/{id}",[SalerController::class,"CancelOrder"])->name("saler.cancelOrder");
    Route::get("/saler/orders/complete/{id}",[SalerController::class,"CompleteOrder"])->name("saler.completeOrder");
    Route::get("/saler/logout",[SalerController::class,"logout"])->name("saler.logout");

    //User routes
    Route::get("/user/logout",[UserController::class,"logout"])->name("user.logout");
    Route::get("/complete_order",[UserController::class, 'completeToOrder'])->name("completeOrder");
    Route::post("/detail/addComment",[UserController::class, 'AddComment'])->name("detail.addComment");

    //Super Admin routes
    Route::get("/admin/index",[SuperAdminController::class,"index"])->name("superadmin.index");
    Route::get("/admin/category/list",[SuperAdminController::class,"CategoryList"])->name("superadmin.category.list");
    Route::get("/admin/subcategory/list",[SuperAdminController::class,"SubCategoryList"])->name("superadmin.subcategory.list");
    Route::get("/admin/category/delete/{id}",[SuperAdminController::class,"DeleteCategory"])->name("superadmin.category.delete");
    Route::get("/admin/category/edit/{id}",[SuperAdminController::class,"EditCategory"])->name("superadmin.category.edit");
    Route::post("/admin/category/edit/{id}",[SuperAdminController::class,"UpdateCategory"]);
    Route::get("/admin/add-category",[SuperAdminController::class,"AddCategoryPage"])->name("superadmin.add.category");
    Route::post("/admin/add-category",[SuperAdminController::class,"AddCategory"]);
    Route::get("/admin/add-subcategory",[SuperAdminController::class,"AddSubCategoryPage"])->name("superadmin.add.subcategory");
    Route::post("/admin/add-subcategory",[SuperAdminController::class,"AddSubCategory"]);
    Route::get("/admin/subcategory/delete/{id}",[SuperAdminController::class,"DeleteSubCategory"])->name("superadmin.subcategory.delete");
    Route::get("/admin/subcategory/edit/{id}",[SuperAdminController::class,"EditSubCategory"])->name("superadmin.subcategory.edit");
    Route::get("/admin/logout",[SuperAdminController::class,"logout"])->name("superadmin.logout");
    Route::post("/admin/subcategory/edit/{id}",[SuperAdminController::class,"UpdateSubCategory"]);




