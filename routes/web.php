<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController,UserController,AdminController,AuthorController,CategoryController};
use App\Models\{Product,Order};
use Illuminate\Support\Facades\DB;


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

Route::get('/', function () 
{
    return redirect('login');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home'); 

Route::controller(AdminController::class)->middleware(['auth','admin'])->group(function()
{
   Route::get('/admin-dashboard','index')->name('home.admin');
   Route::get('/admin-book-create','create')->name('books.create');
   Route::post('/admin-book-store','store')->name('books.store');
   Route::get('/admin-book-edit/{id}','edit')->name('books.edit');
   Route::post('/admin-book-update/{id}', 'update')->name('books.update');
   Route::get('/admin-book-delete/{id}','destroy')->name('books.destroy');
});

Route::controller(AuthorController::class)->group(function()
{
   Route::get('/admin-author','index')->name('author.index');
   Route::get('/admin-author-create','create')->name('author.create');
   Route::post('/admin-author-store','store')->name('author.store');
   Route::get('/admin-author-edit/{id}','edit')->name('author.edit');
   Route::post('/admin-author-update/{id}', 'update')->name('author.update');
   Route::get('/admin-author-delete/{id}','destroy')->name('author.destroy');
});

Route::controller(CategoryController::class)->group(function()
{
   Route::get('/admin-category','index')->name('category.index');
   Route::get('/admin-category-create','create')->name('category.create');
   Route::post('/admin-category-store','store')->name('category.store');
   Route::get('/admin-category-edit/{id}','edit')->name('category.edit');
   Route::post('/admin-category-update/{id}', 'update')->name('category.update');
   Route::get('/admin-category-delete/{id}','destroy')->name('category.destroy');
});

Route::controller(UserController::class)->middleware(['auth','user'])->group(function()
{
   Route::get('/user-dashboard','index')->name('home.user');

   Route::get('books/{book}/borrow','borrow')->name('books.borrow');
   Route::get('books/{book}/return','return')->name('books.return');

   Route::get('/books/author/{authorId}','booksByAuthour')->name('books.byAuthor');
   Route::get('/books/category/{categoryId}','booksByCategory')->name('books.byCategory');
   Route::get('/books/borrowed','borrowedBooks')->name('books.borrowedByUser');
   Route::get('/books/{book}/history', 'borrowingHistory')->name('books.history');

});
