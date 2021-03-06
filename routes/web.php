<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitantsController;

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

Route::get('/', [VisitantsController::class, 'index']);
Route::post('/create', [VisitantsController::class, 'store'])->name('visitants.store');