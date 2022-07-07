<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\MatchesController;

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

Route::get('/', [MatchesController::class, 'render'])->name('matches');
Route::get('/createMatch', function () {
    return view('createMatch');
})->name('createMatch');
Route::get('createPlayer', function () {
    return view('createPlayer');
})->name('createPlayer');
Route::post('/create/match', [MatchesController::class, 'create'])->name('create.match');
Route::post('/create/player', [PlayerController::class, 'create'])->name('create.player');
Route::get('/download', [MatchesController::class, 'downloadCSV'])->name('download');
Route::get('/player', [PlayerController::class, 'render'])->name('player');
