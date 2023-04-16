<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ListController;

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
    return view('welcome');
});

Route::get('livewire-version', function () {
    return view('livewire-version');
})->name('livewire-version');

route::get('blade-version', [ListController::class, 'index'])->name('blade-version');
route::get('blade-version/{product}', [ListController::class, 'show'])->name('blade-version-show');



Route::get('products', [ProductController::class, 'getProducts'])->name('products');
// Route::get('update', [ProductController::class, 'updateProducts'])->name('update');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
