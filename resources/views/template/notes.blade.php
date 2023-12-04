para crear CRUD
php artisan make:model Post -mcf --resource
Lo que hace adicionalmente es crear los métodos básicos de un crud en el controllador



Post::get();-> Trae todos los registros de la base de datos Post::frist();-> Trae el primer registro de la base de datos Post::find(id); -> Busca un registro en la base de datos por medio de su id Post::latest(); -> Trae todos los registros de la base de datos, y los ordena de forma descendente

adicional, podemos utilizar el método paginate(), para realizar la paginación, solo no nos debemos de incluir en nuestras vistas la propiedad links() para que podamos visualizar los controles de paginación
Post::where('nombre_campo_base_datos', 'id')->first();


Si quieren ordenar de manera descendente, puede agregar el id
$posts = Post::latest('id')->paginate();


para modificar la base de datos hayq ue ir creand las migraciones

php artisa migrate





backup for Web.php


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






// <!-- @foreach ($areas as $area) 
// <option value="{{ $area['id'] }}"> {{ $area['nombre'] }} </option>
// @endforeach -->
