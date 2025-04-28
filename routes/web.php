<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BorrowingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Student\DashboardStudentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(WelcomeController::class)->group(function() {
    Route::get('/', 'welcome')->name('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::prefix('admin')->middleware('auth', AdminMiddleware::class)->group(function () {
    Route::controller(DashboardAdminController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('admin.dashboard');
    });
});

// CRUD Category
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('Category');
    Route::post('/category/store', 'store')->name('Category.store');
    Route::post('/category/update/{id}', 'update')->name('Category.update');
    Route::delete('/category/destroy/{id}', 'destroy')->name('Category.destroy'); //delete data

    //CRUD Book
    Route::controller(BookController::class)->group(function () {
        Route::get('/book', 'index')->name('book');
        Route::get('/book/create', 'create')->name('book.create'); //memnampilkan form data
        Route::post('/book/store', 'store')->name('book.store'); //menyimpan buku ke database
        Route::get('/book/{id}', 'detail')->name('book.detail'); //detail data
        Route::get('/book/edit/{id}', 'edit')->name('book.edit'); //edit data
        Route::put('/book/update/{id}', 'update')->name('book.update'); //menyimpan data update
        Route::delete('/book/destroy/{id}', 'destroy')->name('book.destroy'); //menghapus data
    });

    // borrowing
    Route::controller(BorrowingController::class)->group(function() {
        Route::get('/borrowing/unreturned', 'borrowingUnreturned')->name('borrowing.unreturned');
        Route::put('/borrowing/{id}/return', 'returnBook')->name('borrowing.return');
        Route::get('/borrowing/returned', 'borrowingReturned')->name('borrowing.returned');
        Route::get('/borrowing/all', 'borrowingAll')->name('borrowing.all');
    });

});



// Student
Route::prefix('student')->middleware('auth')->group(function () {
    Route::controller(DashboardStudentController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('student.dashboard');
        Route::get('/show/book/{id}', 'show')->name('student.book.show');//tampilan buku
        Route::post('/borrow/book/{id}', 'borrow')->name('student.borrow');//peminjaman buku
        Route::get('/borrow/book/all', 'borrowedBooks')->name('student.borrow.all');

        Route::get('/all/books', 'allBooks')->name('student.all.books');
    });
});
