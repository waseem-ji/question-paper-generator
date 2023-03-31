<?php

use App\Http\Controllers\AddQuestionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'store']);
Route::get('logout', [LoginController::class,'logout']);

Route::view('/dashboard', 'dashboard')->middleware(['auth','can:admin']);

//  need to add middleware
Route::resource('/questions', QuestionController::class);

Route::resource('/categories', CategoryController::class)->except(['show']);

Route::resource('/drives', DriveController::class);

Route::resource('/tests', TestController::class);


Route::get('{id}/addQuestion', [AddQuestionController::class,'create'])->name('addQuestion');
Route::post('addRandom', [AddQuestionController::class,'storeRandom'])->name('storeRandom');
Route::get('search', [AddQuestionController::class,'search'])->name('search');
Route::post('addSpecific', [AddQuestionController::class,'storeSpecific'])->name('storeSpecific');
Route::delete('removeSpecific/{specificQuestion}', [AddQuestionController::class, 'removeSpecific'])->name('removeSpecific');
Route::delete('removeRandom/{randomQuestion}', [AddQuestionController::class, 'removeRandom'])->name('removeRandom');

