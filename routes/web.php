<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookLendController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\UserController;
use App\Models\Book;
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
    $books = Book::latest()->take(5)->get();
    return view('General.index', compact('books'));
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
    Route::get('/bookMaster', [DashboardController::class, 'indexBook'])->name('books');
    Route::get('/rating-review', [DashboardController::class, 'indexReview'])->name('rating_review');
    Route::get('/collection', [DashboardController::class, 'indexCollection'])->name('user_collection');
    
    // users crud
    Route::resource('usersMaster', UserController::class);
    Route::get('/approve-account/{id}', [UserController::class, 'approveUser']);
    
    // BookLend( Rent Book ) crud
    Route::post('/book-lend/{id}', [BookLendController::class, 'BookLend'])->name('book_lend');
    Route::post('/return-book/{id}', [BookLendController::class, 'ReturnBook'])->name('return_book');
    
    // books and categories crud
    Route::resource('bookMasters', BookController::class);
    Route::resource('categories', CategoryController::class)->except('index','create','show','edit','update');

    // Rating and Review
    // Route::get('/rating', [RatingsController::class, 'ratings']);

});


