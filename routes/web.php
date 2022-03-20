<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\CategoryController::class, 'index'])->name('home');

Route::post('/addcategory', [App\Http\Controllers\CategoryController::class, 'store'])->name('add.category');

Route::get('/addcategoryform', [App\Http\Controllers\CategoryController::class, 'create'])->name('addcategoryform');

Route::get('/addsubcategoryform', [App\Http\Controllers\SubCategoryController::class, 'create'])->name('addsubcategoryform');

Route::post('/add-subcategory', [App\Http\Controllers\SubCategoryController::class, 'store'])->name('add.subcategory');

Route::get('/get-subcategory', [App\Http\Controllers\SubSubCategoryController::class, 'getSubCategory']);

Route::get('/addsubsubcategoryform', [App\Http\Controllers\SubSubCategoryController::class, 'create'])->name('subsubcategory');

Route::post('/addsubsubcategory', [App\Http\Controllers\SubSubCategoryController::class, 'store'])->name('add.subsubcategory');

Route::get('/delcat/{id}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete.category');
Route::get('/editcategory/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit.category');
Route::post('/update-category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('update.category');


Route::get('/delsubcat/{id}', [App\Http\Controllers\SubCategoryController::class, 'destroy'])->name('delete.subcategory');
Route::get('/editsubcategory/{id}', [App\Http\Controllers\SubCategoryController::class, 'edit'])->name('edit.subcategory');
Route::post('/update-subcategory/{id}', [App\Http\Controllers\SubCategoryController::class, 'update'])->name('update.subcategory');


Route::get('/delsubsubcat/{id}', [App\Http\Controllers\SubSubCategoryController::class, 'destroy'])->name('delete.subsubcategory');
Route::get('/editsubsubcategory/{id}', [App\Http\Controllers\SubSubCategoryController::class, 'edit'])->name('edit.subsubcategory');
Route::post('/update-subsubcategory/{id}', [App\Http\Controllers\SubSubCategoryController::class, 'update'])->name('update.subsubcategory');
