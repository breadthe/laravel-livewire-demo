<?php

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

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', fn() => redirect('/'));

Route::get('/tags', fn () => view('tags'))->name('tags');
Route::get('/edit-in-place', fn () => view('edit-in-place'))->name('edit-in-place');

Auth::routes();

