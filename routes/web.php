<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuthController;
use App\Http\Controllers\ImageController;

use App\Http\Controllers\EmployeeDetailsController;

use App\Http\Controllers\empController;

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


Route::get('students' , [empController::class , 'index']);
Route::get('fetch-students', [empController::class, 'fetchstudent']);
Route::post('students' , [empController::class , 'store']);
Route::get('edit-student/{id}', [empController::class, 'edit']);
Route::put('update-student/{id}', [empController::class, 'update']);
Route::delete('delete-student/{id}', [empController::class, 'destroy']);
Route::post('search-student', [empController::class, 'searchStudent']);
Route::get('/export-csv', [empController::class,'export'])->name('export-csv');

// Route::get('/user', [userAuthController::class , 'index']);

// Route::any('/test', [userAuthController::class , 'test'])->name('test');

// Route::get('/',[EmployeeDetailsController::class,'index']);
// Route::any('employee',[EmployeeDetailsController::class,'userDetails'])->name('employee');
// Route::get('/employee/edit/{id}', 'EmployeeDetailsController@userDetailsEdit')->name('employee.edit');
// Route::get('/employee/view/{id}', 'EmployeeDetailsController@userDetailsView')->name('employee.view');

// Route::get('/checkout', [EmployeeDetailsController::class, 'payment'])->name('checkout');

// Route::post('/purchase',[EmployeeDetailsController::class, 'makePayment'])->name('purchase');

// Route::any('/upload',[ImageController::class,'upload'])->name('image.upload');

// Route::get('ajaxImageUpload', [ImageController::class, 'ajaxImageUpload']);
// Route::post('ajaxImageUpload', [ImageController::class, 'ajaxImageUploadPost'])->name('ajaxImageUpload');


