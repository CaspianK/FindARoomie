<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Models\City;
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

Route::get('/', [RoomController::class, 'index'])->name('home');

Route::get('/room/create', [RoomController::class, 'create'])->middleware(['auth'])->name('room.create');
Route::post('/room/create', [RoomController::class, 'store'])->middleware(['auth'])->name('room.store');
Route::get('/room/update/{id}', [RoomController::class, 'edit'])->middleware(['auth'])->name('room.update');
Route::post('/room/update/{id}', [RoomController::class, 'update'])->middleware(['auth'])->name('room.edit');
Route::get('/room/{id}', [RoomController::class, 'show'])->name('room.show');
Route::get('/profile/create', [ProfileController::class, 'create'])->middleware(['auth']);
Route::post('/profile/create', [ProfileController::class, 'store'])->middleware(['auth'])->name('profile.store');
Route::get('/profile/update/{id}', [ProfileController::class, 'edit'])->middleware(['auth'])->name('profile.update');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->middleware(['auth'])->name('profile.edit');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->middleware(['auth'])->name('profile');
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/bookmark/create/{room_id}', [BookmarkController::class, 'store'])->middleware(['auth'])->name('bookmark.store');
Route::get('/bookmark/delete/{room_id}', [BookmarkController::class, 'destroy'])->middleware(['auth'])->name('bookmark.destroy');
Route::get('/bookmarks', [BookmarkController::class, 'index'])->middleware(['auth'])->name('bookmarks');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/{lang}', [LocalizationController::class, 'index']);

Route::post('/city', [CityController::class, 'index'])->name('city');

