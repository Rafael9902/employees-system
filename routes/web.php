<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;

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

Route::get('/', [EmployeesController::class,'index']);
Route::get('/viewlist', [EmployeesController::class,'viewlist']);

Route::post('/save', [EmployeesController::class, 'save']);
Route::post('/delete/{id}', [EmployeesController::class, 'delete']);

Route::match(['get', 'post'], '/edit/{id}', [EmployeesController::class, 'edit']);
