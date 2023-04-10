<?php

use App\Http\Controllers\AddQuestionController;
use App\Http\Controllers\AddTestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Candidate\CandidateController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DriveController;
use App\Http\Controllers\DriveTestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestTokenController;
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
Route::post('/login', [LoginController::class,'store']);        //Should we rename this as adminLogin , adminLogout ?
Route::get('logout', [LoginController::class,'logout']);


Route::middleware(['auth','can:admin'])->group( function() {
    Route::view('/dashboard', 'dashboard');
    Route::resource('/questions', QuestionController::class);

    Route::resource('/categories', CategoryController::class)->except(['show']);

    Route::get('drives/{drive}/tests', [DriveController::class,'showTests'])->name('showDriveTests');
    Route::resource('/drives', DriveController::class);

    Route::resource('/tests', TestController::class);


    Route::get('{id}/addQuestion', [AddQuestionController::class,'create'])->name('addQuestion');
    Route::post('addRandom', [AddQuestionController::class,'storeRandom'])->name('storeRandom');
    Route::get('search', [AddQuestionController::class,'search'])->name('search');
    Route::post('addSpecific', [AddQuestionController::class,'storeSpecific'])->name('storeSpecific');
    Route::delete('removeSpecific/{specificQuestion}', [AddQuestionController::class, 'removeSpecific'])->name('removeSpecific');
    Route::delete('removeRandom/{randomQuestion}', [AddQuestionController::class, 'removeRandom'])->name('removeRandom');


    Route::get('{id}/addTest', [AddTestController::class,'create'])->name('addTest');
    Route::post('addTest', [AddTestController::class,'store'])->name('storeTest');
    Route::delete('removeTest/{driveTest}', [AddTestController::class,'destroy'])->name('removeTest');

    Route::post('{driveTest}/generateToken', [TestTokenController::class,'generateToken'])->name('generateToken');
    
    Route::get('driveTest/tokens/{driveTest}', [DriveTestController::class,'viewTokens'])->name('driveTest.tokens');
    Route::get('driveTest/{driveTest}', [DriveTestController::class,'index'])->name('driveTest');
});

//Candidate routes

Route::prefix('candidate')->group(function () {
    Route::get('login', [CandidateController::class,'login'])->name('candidate.login');
    Route::post('login', [CandidateController::class,'verifyToken'])->name('candidate.verifyToken');
    Route::get('email/{token}', [CandidateController::class,'emailView'])->name('candidate.email');
    Route::post('email', [CandidateController::class,'checkEmail'])->name('candidate.verifyEmail');
    Route::get('register/{candidate}',[CandidateController::class,'registerView'])->name('candidate.create');
    Route::post('register/{candidate}',[CandidateController::class,'register'])->name('candidate.register');
    Route::get('edit/{candidate}', [CandidateController::class,'edit'])->name('candidate.edit');
    Route::patch('update/{candidate}',[CandidateController::class,'update'])->name('candidate.update');
});


