<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// public path
Route::get('/', [\App\Http\Controllers\StoreController::class, 'index']);
// Editor access
Route::middleware(["editor"])->group(function (){
Route::get("/editor/dashboard",[\App\Http\Controllers\Editor\EditorController::class,"index"])->name("editor_dashboard");

});
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Admin access
Route::middleware(["admin"])->group(function (){
    Route::get("/admin/dashboard",[\App\Http\Controllers\Admin\AdminController::class,"index"])->name("admin_dashboard");
    Route::resource("products",\App\Http\Controllers\ProductController::class);
    Route::resource("categories",\App\Http\Controllers\Admin\CategoryController::class);
});
Auth::routes();

