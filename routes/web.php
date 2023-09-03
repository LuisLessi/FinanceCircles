<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\InstitutionsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\MovimentsController;
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

Route::get('/register', [Controller::class, 'register']);
Route::post('/register', [DashboardController::class, 'registerUser'])->name('user.register');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
Route::get('user', [UsersController::class, 'index'])->name('user.index');
Route::get('institution', [InstitutionsController::class, 'index'])->name('institution.index');
Route::get('group', [GroupsController::class, 'index'])->name('group.index');

Route::get('user/moviment', [MovimentsController::class, 'index'])->name('moviment.index');
Route::get('moviment', [MovimentsController::class, 'application'])->name('moviment.application');
Route::post('moviment', [MovimentsController::class, 'storeApplication'])->name('moviment.application.store');
Route::get('moviment/all', [MovimentsController::class, 'all'])->name('moviment.all');

Route::get('getback', [MovimentsController::class, 'getback'])->name('moviment.getback');
Route::post('getback', [MovimentsController::class, 'storeGetBack'])->name('moviment.getback.store');


Route::resource('user', UsersController::class);
Route::resource('institution', InstitutionsController::class); 
Route::resource('group', GroupsController::class); 
Route::resource('institution.product', ProductsController::class); 


Route::post('group/{group_id}/user', [GroupsController::class, 'userStore'])->name('group.user.store');

