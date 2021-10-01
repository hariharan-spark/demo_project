<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;


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


Route::get('/index', [LoginController::class, 'index']);
Route::post('/register', [LoginController::class, 'userRegister'])->name('user-register');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::POST('/user-login', [LoginController::class, 'userLogin'])->name('user-login');
Route::get('/dashboard', [LoginController::class, 'userDashboard'])->middleware('user_verified');


Route::get('/curl/{name}', [LoginController::class, 'curl']);
 