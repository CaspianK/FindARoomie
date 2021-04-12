<?php

use App\Http\Controllers\BookmarkController;
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

Route::get('/room/create', [RoomController::class, 'create'])->middleware(['auth']);
Route::post('/room/create', [RoomController::class, 'store'])->middleware(['auth'])->name('room.store');
Route::get('/room/{id}', [RoomController::class, 'show']);
Route::get('/profile/create', [ProfileController::class, 'create'])->middleware(['auth']);
Route::post('/profile/create', [ProfileController::class, 'store'])->middleware(['auth'])->name('profile.store');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->middleware(['auth']);
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/bookmark/create/{room_id}', [BookmarkController::class, 'store'])->middleware(['auth'])->name('bookmark.store');

Route::get('/ast', function() {
    City::create([
        'name' => 'Almaty',
    ]);
});

Route::get('/log', function() {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
