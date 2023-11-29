<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\RegisterController;

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

Route::get('/verify', function () {
    return view('verify');
})->name('verify');

Route::get('/options', function () {
    return view('options');
})->name('options');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/register_finger', [RegisterFingerController::Class, 'index'])->name('register_finger'); 

// Métodos POST

// Route::post('/register', function (Request $request) {
//     $newUser = new User;
//     $newUser->name = $request->input('name');
//     $newUser->ci = $request->input('ci');
//     $newUser->turno = $request->input('turno');
//     // ventana emergente de la huella
//     // $fingerRec = redirect()->route('register_finger');
//     $newUser->finger = "";
//     $newUser->save();

//     return redirect()->route('verify')->with('shipping-report', 'Datos guardados exitosamente');
// })->name('register.save');




Route::post('/register', [RegisterController::class, 'index'  ])->name('register.send');

// Route::post('/register', 'RegisterController@index')->name('register.send');
// Route::post('/register', function () {
//     dd(userDataJSON);
// });


//cambio de eprueba






// Route::match(['get', 'post'], '/register2', 'biometricoController@metodo');


// rutas adm

Route::get('/adm.index', function () {
    $users = User::all();
    return view('adm.index', compact('users'));
})->name('adm.index');



