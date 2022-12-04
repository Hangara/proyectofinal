<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

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
    return view('auth.login');
});
/*
Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('/empleado/create',[EmpleadoController::class, 'create']);
*/
Route::resource('libro',LibroController::class)->middleware('auth');
Auth::routes();
//Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [LibroController::class, 'index'])->name('home');

Route::group(['middleware'=> 'auth'], function(){

    Route::get('/home', [LibroController::class, 'index'])->name('home');

});
Route::get('/', function () {
    return view('index');
});
