<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LabelController;
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
    return view('index');
})->name('home');

Route::get('admin', function () {
    return view('admin.adminIndex');
});

Route::get('admin/users', function () {
    return view('admin.usersList');
})->name('admin.users');
Route::get('admin/positions', [PositionController::class, 'index'])->name('admin.positions');
Route::get('admin/positions/create', 'App\Http\Controllers\PositionController@create')->name('position.create');
Route::post('admin/positions', 'App\Http\Controllers\PositionController@store')->name('position.store');
Route::delete('admin/positions/{position}', 'App\Http\Controllers\PositionController@destroy')->name('position.delete');
Route::patch('admin/positions/{position}', 'App\Http\Controllers\PositionController@update')->name('position.update');

Route::post('admin/categories', [CategoriesController::class, 'store'])->name('category.store');
Route::get('admin/categories', [CategoriesController::class, 'index'])->name('category.index');
Route::delete('admin/categories/{category}', [CategoriesController::class, 'destroy'])->name('category.delete');

Route::get('admin/labels', [LabelController::class, 'index'])->name('label.index');
Route::post('admin/labels', [LabelController::class, 'store'])->name('label.store');
Route::delete('admin/labels/{label}', [LabelController::class, 'destroy'])->name('label.delete');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
