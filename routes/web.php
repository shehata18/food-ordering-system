<?php

use Illuminate\Support\Facades\Auth;
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



// Category Routes
Route::get('/', [App\Http\Controllers\VisitorController::class, 'index'])->name('VPage');
Route::get('/category',[\App\Http\Controllers\CategoryController::class,'show'])->name('cat.show')->middleware('auth');
Route::post('/category/store',[\App\Http\Controllers\CategoryController::class,'store'])->name('cat.store');
Route::get('/category/delete/{id}',[\App\Http\Controllers\CategoryController::class,'delete'])->name('cat.delete');
Route::get('/category/edit/{id}',[\App\Http\Controllers\CategoryController::class,'edit'])->name('cat.edit');
Route::post('/category/update{id}',[\App\Http\Controllers\CategoryController::class,'update'])->name('cat.update');

//Meals Routes
Route::get('/meal/create',[\App\Http\Controllers\MealController::class,'create'])->name('meal.create');
Route::post('/meal/store',[\App\Http\Controllers\MealController::class,'store'])->name('meal.store');
Route::get('/meal/show',[\App\Http\Controllers\MealController::class,'index'])->name('meal.index');
Route::get('/meal/edit/{id}',[\App\Http\Controllers\MealController::class,'edit'])->name('meal.edit');
Route::post('/meal/update/{id}',[\App\Http\Controllers\MealController::class,'update'])->name('meal.update');
Route::get('/meal/delete/{id}',[\App\Http\Controllers\MealController::class,'delete'])->name('meal.delete');
Route::get('/meal/show/{id}',[\App\Http\Controllers\MealController::class,'show_details'])->name('meal_details');


// Orders Routes

Route::post('/order/store',[\App\Http\Controllers\HomeController::class,'orderStore'])->name('order.store');
Route::get('/order/show',[\App\Http\Controllers\HomeController::class,'orderShow'])->name('order.show');

Route::post('/order/{id}/status',[\App\Http\Controllers\HomeController::class,'changeStatus'])->name('order.status');






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
