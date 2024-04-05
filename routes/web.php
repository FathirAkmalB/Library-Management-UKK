<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('General.index'); // landing page here
});


Route::get('/login', [AuthController::class, 'login'])->name('login_user');
Route::post('/login/auth', [AuthController::class, 'authenticating'])->name('authentication_user');
Route::get('/register', [AuthController::class, 'register'])->name('register_user');
Route::post('/register/auth', [AuthController::class, 'registering'])->name('registering');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout_user');



Route::group([
    'middleware' => 'auth'
], function () {
    // view that should be logged in

    // view for any dashboard pages
    Route::get('/dashboard', [DashboardController::class, 'indexDashboard'])->name('dashboard');
    Route::get('/user', [DashboardController::class, 'indexUsers'])->name('users_tab');
    Route::get('/bookLend', [DashboardController::class, 'indexBookLend'])->name('bookLend');
    Route::get('/books', [DashboardController::class, 'indexBook'])->name('books');

    // users crud
    Route::resource('usersMaster', UserController::class);
    
    // BookLend( Rent Book ) crud
    Route::resource('bookLendMaster', BookLendController::class);
    
    // books and categories crud
    Route::resource('bookMaster', BookController::class);
    Route::resource('categories', CategoryController::class)->except('index','create','show','edit','update');

});


