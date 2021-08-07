<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web;
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

Route::middleware(['auth', 'web'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard')
            ->with('models', \App\Models\Borrow::orderBy('id', 'desc')->paginate());
    })->name('dashboard');

    Route::resource('author', Web\AuthorController::class);
    Route::resource('book', Web\BookController::class);
    Route::post('borrow/book/{book}', [Web\BookController::class, 'borrow'])->name('borrow.book');
    Route::put('return/book/{book}', [Web\BookController::class, 'return'])->name('return.book');
    Route::resource('category', Web\CategoryController::class);

});


require __DIR__.'/auth.php';
