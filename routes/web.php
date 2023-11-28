<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUser;
use App\Http\Controllers\ControllerTasks;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['web']], function () {
    // Rutas de autenticación y otras rutas
    Auth::routes();
});




Route::prefix('users')->group(function () {
    Route::get('', [ControllerUser::class, 'getUsers'])->name('getUsers');
    Route::post('/getUser', [ControllerUser::class, 'getUser'])->name('getUser');
    Route::post('/createUsers', [ControllerUser::class, 'createUsers'])->name('createUsers');
    Route::post('/updateUsers', [ControllerUser::class, 'updateUsers'])->name('updateUsers');
    Route::post('/deleteUsers', [ControllerUser::class, 'deleteUser'])->name('deleteUsers');
    Route::get('/optionUsers', [ControllerUser::class, 'optionUsers'])->name('optionUsers');

});


Route::prefix('tasks')->group(function (){
    Route::get('/getTasks', [ControllerTasks::class, 'gettasks'])->name('gettasks');
    Route::post('/getTask', [ControllerTasks::class, 'getTask'])->name('getTask');
    Route::post('/createTasks', [ControllerTasks::class, 'createTasks'])->name('createTasks');
    Route::post('/updateTasks', [ControllerTasks::class, 'updateTasks'])->name('updateTasks');
    Route::post('/deleteTask', [ControllerTasks::class, 'deleteTask'])->name('deleteTask');
});
