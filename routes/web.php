<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('admin', function () {
    return view('admin.adminIndex');
});

//Route::get('admin/users', function () {
//    return view('admin.usersList');
//})->name('admin.users');

Route::get('admin/positions', [PositionController::class, 'index'])->name('admin.positions');
Route::get('admin/positions/search', [PositionController::class, 'search'])->name('admin.search');
Route::get('admin/positions/create', [PositionController::class, 'create'])->name('position.create');
Route::post('admin/positions', [PositionController::class, 'store'])->name('position.store');
Route::get('admin/positions/{position}/edit', [PositionController::class, 'edit'])->name('position.edit');
Route::patch('admin/positions/{position}', [PositionController::class, 'update'])->name('position.update');
Route::delete('admin/positions/{position}', [PositionController::class, 'destroy'])->name('position.delete');

Route::post('admin/categories', [CategoriesController::class, 'store'])->name('category.store');
Route::get('admin/categories', [CategoriesController::class, 'index'])->name('category.index');
Route::delete('admin/categories/{category}', [CategoriesController::class, 'destroy'])->name('category.delete');
Route::get('admin/labels', [LabelController::class, 'index'])->name('label.index');
Route::post('admin/labels', [LabelController::class, 'store'])->name('label.store');
Route::delete('admin/labels/{label}', [LabelController::class, 'destroy'])->name('label.delete');

Route::post('/', [AddressController::class, 'store'])->name('address.store');
Route::get('/addresses', [AddressController::class, 'index'])->name('address.index');
Route::delete('/addresses/{address}', [AddressController::class, 'destroy'])->name('address.delete');
Route::get('addresses/{address}/edit', [AddressController::class, 'edit'])->name('address.edit');

Route::post('/cart',[CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/{position}', [CartController::class, 'destroy'])->name('cart.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('admin/users', [ProfileController::class, 'index'])->name('profile.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
