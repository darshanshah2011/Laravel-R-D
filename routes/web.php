<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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




//Route::view('form','Module.userform');
Route::post('adddetails', [UserController::class,'submit']);

Route::get('viewdetails', [UserController::class,'show'])->name('viewdetails');
Route::get('form', [UserController::class,'form']);

Route::get('/insert', [Usercontroller::class,'insert']);

