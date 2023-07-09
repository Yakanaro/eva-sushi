<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AccountUserController;
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

Route::prefix('admin/positions')->name('position.')->group(function () {
    Route::get('/', [PositionController::class, 'index'])->name('index');
    Route::get('/search', [PositionController::class, 'search'])->name('search');
    Route::get('/create', [PositionController::class, 'create'])->name('create');
    Route::post('/', [PositionController::class, 'store'])->name('store');
    Route::get('/{position}/edit', [PositionController::class, 'edit'])->name('edit');
    Route::patch('/{position}', [PositionController::class, 'update'])->name('update');
    Route::delete('/{position}', [PositionController::class, 'destroy'])->name('delete');
});

Route::prefix('admin')->group(function () {
    Route::get('users', [ProfileController::class, 'index'])->name('users.index');

    Route::post('categories', [CategoriesController::class, 'store'])->name('category.store');
    Route::get('categories', [CategoriesController::class, 'index'])->name('category.index');
    Route::delete('categories/{category}', [CategoriesController::class, 'destroy'])->name('category.delete');

    Route::post('labels', [LabelController::class, 'store'])->name('label.store');
    Route::get('labels', [LabelController::class, 'index'])->name('label.index');
    Route::delete('labels/{label}', [LabelController::class, 'destroy'])->name('label.delete');
});

//Route::post('/', [AddressController::class, 'store'])->name('address.store');
//Route::get('/addresses', [AddressController::class, 'index'])->name('address.index');
//Route::delete('/addresses/{address}', [AddressController::class, 'destroy'])->name('address.delete');
//Route::get('addresses/{address}/edit', [AddressController::class, 'edit'])->name('address.edit');
//Route::patch('addresses/{address}', [AddressController::class, 'update'])->name('address.update');

Route::resource('addresses', AddressController::class)
    ->except(['show', 'create'])
    ->names([
        'index' => 'address.index',
        'store' => 'address.store',
        'edit' => 'address.edit',
        'update' => 'address.update',
        'destroy' => 'address.delete'
    ]);

//Route::post('/cart',[CartController::class, 'addToCart'])->name('cart.add');
//Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//Route::delete('/cart/{position}', [CartController::class, 'destroy'])->name('cart.delete');

Route::prefix('cart')->group(function () {
    Route::post('/', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/{position}', [CartController::class, 'destroy'])->name('cart.delete');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');
//
//Route::get('admin/users', [ProfileController::class, 'index'])->name('profile.index');
//
//Route::get('/account', [AccountUserController::class, 'index'])->name('account.index');

//Route::prefix('admin')->name('admin.')->group(function () {
//    Route::get('users', [ProfileController::class, 'index'])->name('users.index');
//});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/account', [AccountUserController::class, 'index'])->name('account.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
