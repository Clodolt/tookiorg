<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/islandtracker', function () {
    return Inertia::render('IslandTracker');
})->middleware(['auth', 'verified'])->name('islandtracker');

Route::get('/maris', function () {
    return Inertia::render('MarisShop');
})->name('marisshop');
Route::get('/merchants', function () {
    return Inertia::render('Merchants');
})->name('merchants');


require __DIR__.'/auth.php';
