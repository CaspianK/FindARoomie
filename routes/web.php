<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

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

Route::get('/room/create', [RoomController::class, 'create'])->middleware(['auth']);
Route::post('/room/create', [RoomController::class, 'store'])->middleware(['auth'])->name('room.create');
Route::get('/room/{id}', [RoomController::class, 'show']);
Route::get('/profile/create', [ProfileController::class, 'create'])->middleware(['auth']);
Route::post('/profile/create', [ProfileController::class, 'store'])->middleware(['auth'])->name('profile.create');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->middleware(['auth']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
