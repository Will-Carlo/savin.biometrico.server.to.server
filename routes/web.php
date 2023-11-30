<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifyController;

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


Route::get('/options', function () {
    return view('options');
})->name('options');

Route::get('/register', function () {
    return view('register');
})->name('register');

// Métodos POST

Route::post('/register', [RegisterController::class, 'index'  ])->name('register.send');


// ROUTES verify

Route::post('/verify', [VerifyController::class, 'index'  ])->name('verify.send');
Route::get('/verify', [VerifyController::class, 'show'  ])->name('verify');
// Route::post('/verify', [VerifyController::class, 'lastEmployee'])->name('verify.last');

// rutas adm

Route::get('/adm', function () {
    $users = User::all();
    return $users;
    // return view('adm.index', compact('users'));
})->name('adm');



