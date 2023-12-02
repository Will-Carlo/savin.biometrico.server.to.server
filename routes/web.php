<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifyController;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Local Routes
|--------------------------------------------------------------------------
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
Route::controller(VerifyController::class)->group(function(){  
    Route::post('/verify',  'index')->name('verify.send');
    Route::get('/verify',   'show')->name('verify');
});
// Route::post('/verify', [VerifyController::class, 'lastEmployee'])->name('verify.last');

// rutas adm

Route::get('/adm', function () {
    $users = User::all();
    return $users;
    // return view('adm.index', compact('users'));
})->name('adm');







Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
