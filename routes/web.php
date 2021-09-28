<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Showpost;

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
    return view('home');
})->name('index');

Route::get('/showpost', function () {
    return view('show');
})->name('showpost');

Route::get('/admin', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/about', function () {
    return view('about');
})->name('about');

Route::middleware(['auth:sanctum', 'verified'])->get('/post', function () {
    return view('post');
})->name('post');
