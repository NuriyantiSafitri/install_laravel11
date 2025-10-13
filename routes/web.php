<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ Halaman utama → redirect ke /home
Route::get('/', function () {
    return redirect()->route('home');
});

// ✅ Route Home
Route::get('/home', [HomeController::class, 'index'])->name('home');

// ✅ Route Resource untuk Artikel (CRUD)
Route::resource('articles', ArticleController::class);

// ✅ Route Form Latihan
Route::get('/form', function () {
    return view('form');
})->name('form');

Route::post('/submit', function (Request $request) {
    $message = $request->input('message');
    return view('home', ['message' => $message]);
})->name('submit');

// ✅ Auth Routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('login');
})->name('login');

// ✅ Logout Route
Route::get('/logout', function (Request $request) {
    $request->session()->flush();
    return redirect()->route('login');
})->name('logout');
