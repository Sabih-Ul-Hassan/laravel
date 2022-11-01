<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BooksController;
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
    return redirect('/books');
});
Route::get('/signup',[UserController::class,'signUp'])->name('signup');
Route::post('/signup',[UserController::class,'createUser']);
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'authenticate']);
Route::get('/logout',[UserController::class,'logout']);



Route::group(['prefix'=>'/books','middleware'=>'checkAuth'],function(){
    Route::get('/',[BooksController::class,'showBooks'])->name('books');
    Route::post('/addBook',[BooksController::class,'addBook']);
    Route::get('/delete/{id?}',[BooksController::class,'delete']);
    Route::get('/update/{id?}',[BooksController::class,'updateBookForm']);
    Route::post('/update/{id?}',[BooksController::class,'updateBook'])->name('updateBook');
    Route::get('/addBook',[BooksController::class,'addBookForm'])->name('uploadBook');
    
}
);
