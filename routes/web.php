<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userAuthController;
use App\Http\Controllers\ImageController;

use App\Http\Controllers\EmployeeDetailsController;

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

Route::get('/user', [userAuthController::class , 'index']);

Route::any('/test', [userAuthController::class , 'test'])->name('test');

Route::get('/',[EmployeeDetailsController::class,'index']);
Route::any('employee',[EmployeeDetailsController::class,'userDetails'])->name('employee');
Route::get('/employee/edit/{id}', 'EmployeeDetailsController@userDetailsEdit')->name('employee.edit');
Route::get('/employee/view/{id}', 'EmployeeDetailsController@userDetailsView')->name('employee.view');

Route::get('/checkout', [EmployeeDetailsController::class, 'payment'])->name('checkout');

Route::post('/purchase',[EmployeeDetailsController::class, 'makePayment'])->name('purchase');

// Route::any('/upload',[ImageController::class,'upload'])->name('image.upload');

// Route::get('ajaxImageUpload', [ImageController::class, 'ajaxImageUpload']);
// Route::post('ajaxImageUpload', [ImageController::class, 'ajaxImageUploadPost'])->name('ajaxImageUpload');


