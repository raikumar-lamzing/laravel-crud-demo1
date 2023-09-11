<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Controller;
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

// Route::get('/', function () {
 
//     return view('students');
// });

Route::get('/', [Controller::class, 'index']);

Route::get('/students',[StudentsController::class, 'studentList']);
// Route::get('/addstudent', function () {
//     return view('students.addnew');
// });
Route::get('/addstudent', [StudentsController::class, 'addnew'])->middleware('auth');

Route::post('/store-student', [StudentsController::class, 'storestudent']);

Route::get('/edit-student/{id}', [StudentsController::class, 'editstudent']);

Route::put('/update-submit-student/{id}', [StudentsController::class, 'updatesubmit']);

Route::get('/remove-student/{id}', [StudentsController::class, 'removestudent']);

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});