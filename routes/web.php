<?php

use App\Http\Controllers\MinimizeLinkController;
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

Route::get('/form', [MinimizeLinkController::class, 'index']);
Route::post('/form', [MinimizeLinkController::class, 'store']);
Route::get('/min-link', [MinimizeLinkController::class, 'redirectToMinLink'])->name('minimizedLink');
