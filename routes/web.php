<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HallController;
use App\Http\Controllers\CrewmateController;
use App\Http\Controllers\LeaderBoardController;

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

Route::get('/', [HallController::class, 'index'])->name('hall.index');

Route::get('/hall/{id}', [HallController::class, 'show'])->name('hall.show');
Route::post('/hall/crewmate', [CrewmateController::class, 'store'])->name('crew.store');
Route::post('/hall/update', [HallController::class, 'update'])->name('hall.update');

Route::get('/leaderboard', [LeaderBoardController::class, 'index'])->name('leaderboard.show');
