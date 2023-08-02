<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController; 

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

Auth::routes();

Route::get('/', [LoginController::class, 'showLoginForm'])->name("home");

Route::get("/get-book", [BookController::class, "getBook"])->name("showBooks");

Route::get("create-book", [BookController::class, "createBook"])->name("createBook");

Route::post("book-store", [BookController::class, "storeBook"])->name("storeBook");

Route::delete("book-delete/{id}", [BookController::class, "deleteBook"])->name("deleteBook");

Route::get("book-edit/{id}", [BookController::class, "editBook"])->name("editBook");

Route::put("book-update/{id}", [BookController::class, "updateBook"])->name("updateBook");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
