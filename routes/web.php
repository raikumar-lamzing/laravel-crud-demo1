<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
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

Route::get('/', [StudentsController::class, 'index']);

// Route::get('/addstudent', function () {
//     return view('students.addnew');
// });
Route::get('/addstudent', [StudentsController::class, 'addnew']);

Route::post('/store-student', [StudentsController::class, 'storestudent']);

Route::get('/edit-student/{id}', [StudentsController::class, 'editstudent']);

Route::put('/update-submit-student/{id}', [StudentsController::class, 'updatesubmit']);

Route::get('/remove-student/{id}', [StudentsController::class, 'removestudent']);
