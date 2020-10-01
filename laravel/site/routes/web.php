<?php

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

Route::get('/oi', function(){
    return 'oi mundo';
});

Route::get('/ola/{nome?}', function($nome){
    if(isset($nome)){
        return 'Olá '.$nome.'<br>';
    } else {
        return 'Olá anônimo';
    }
});

Route::get('/rotascomregras/{nome}/{n}', function($nome, $n){
    for($x=0;$x<$n;$x++){
        echo 'Olá   '.$nome.'  <br>';
    }
})->where('nome','[A-Za-z]+')->where('n','[0-9]+');

Route::prefix('/app')->group(function(){
    Route::get('/', function () {
    return view('welcome');
    })->name('app');
    Route::get('/user', function () {
    return view('user');
    })->name('app.user');;
    Route::get('/profile', function () {
    return view('profile');
    })->name('app.profile');;
});

Route::redirect('aplicativo','/app',301);

Route::get('bla1', function() {
    return redirect()->route('app');
    });
Route::get('/teste1', function () {
    return 'Oi Mundo';
});
Route::post('/teste1', function () {});
Route::put('/teste1', function () {});
Route::delete('/teste1', function () {});
Route::any('/teste3', function () {});
Route::match([ 'get', 'post'], '/teste2', function () {});

use App\Http\Controllers\TaskController;

Route::get('/1', [TaskController::class, 'controlador']);
Route::get('/2', [TaskController::class, 'numero_dois']);

use App\Http\Controllers\ClienteController;
Route::resource('cliente', ClienteController::class);