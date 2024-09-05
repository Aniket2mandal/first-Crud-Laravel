<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('category')->name('category.')->group(function(){
    Route::get('/',[CategoryController::class, 'index'])->name('index');
    Route::get('/create',[CategoryController::class, 'create'])->name('create');
    // TO POST DATA
    Route::post('store',[CategoryController::class, 'store'])->name('store');
    //TO EDIT DATA
    Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('edit');
    Route::put('/update/{id}',[CategoryController::class, 'update'])->name('update');
    //TO DELETE
    Route::get('/delete/{id}',[CategoryController::class, 'delete'])->name('delete');
});

// FOR POST PAGE USING RESOURCE ROUTE
Route::resource('post',PostController::class);
