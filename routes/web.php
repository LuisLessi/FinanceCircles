<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\InstitutionsController;
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

Route::get('/', [Controller::class, 'homepage']);
Route::get('/register', [Controller::class, 'register']);

/**
 *Routes to user auth
 */

Route::get('/login', [Controller::class, 'login']);
Route::post('/login', [DashboardController::class, 'auth'])->name('user.login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');


Route::get('user', [UsersController::class, 'index'])->name('user.index');
Route::get('institution', [InstitutionsController::class, 'index'])->name('institution.index');
Route::get('group', [GroupsController::class, 'index'])->name('group.index');


Route::resource('user', UsersController::class);
Route::resource('institution', InstitutionsController::class); 
Route::resource('group', GroupsController::class); 
