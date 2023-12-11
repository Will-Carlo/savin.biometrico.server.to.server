<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifyController;
use App\Http\Controllers\DelayController;
use App\Http\Controllers\SocketController;
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
    return view('/verify');
});


Route::get('/options', function () {
    return view('options');
})->name('options');


// // Métodos POST
// Route::controller(RegisterController::class)->group(function(){  
//     Route::post('/register',        'index')->name('register.send');
//     Route::get('/scheduleregister', 'scheduleRegister')->name('register.schedule');
//     Route::get('/register',         'show')->name('register');
// });


// ROUTES verify
Route::controller(VerifyController::class)->group(function(){  
    Route::post('/verify',  'index')->name('verify.send');
    Route::get('/verify',   'show')->name('verify');
});
// Route::post('/verify', [VerifyController::class, 'lastEmployee'])->name('verify.last');


// REOUTES delay
Route::controller(DelayController::class)->group(function(){  
    Route::post('/delay',  'index')->name('delay.send');
    Route::get('/delay',   'show')->name('delay');
});


// rutas adm

// Route::get('/adm', function () {
//     $users = User::all();
//     return $users;
//     // return view('adm.index', compact('users'));
// })->name('adm');



// websocket routs

Route::get('test', [SocketController::class, 'test']);
Route::view('bbb', 'welcome');
Route::post('/sendWS', [SocketController::class, 'verify-channel']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
