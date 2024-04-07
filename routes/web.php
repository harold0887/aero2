<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProfileAdminController;

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

Route::get('/foo', function () {
    Artisan::call('storage:link');
  });
  
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/internal', [HomeController::class, 'internal'])->name('internal');
Route::get('/contactos', [HomeController::class, 'contactos'])->name('contactos');

Route::get('search/casos', [HomeController::class, 'search'])->name('search.casos');
Route::get('search/solucion', [HomeController::class, 'solucion'])->name('solucion.casos');
Route::get('search/notas', [HomeController::class, 'notas'])->name('notas.casos');


Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
Route::resource('dashboard/casos', \App\Http\Controllers\CaseController::class);
Route::resource('dashboard/post', PostController::class);
Route::resource('dashboard/internal', \App\Http\Controllers\InternalController::class);
Route::resource('dashboard/correo', \App\Http\Controllers\correosController::class);



Route::get('dashboard/profile', [ProfileAdminController::class, 'edit'])->name('dashboard.edit');
Route::put('dashboard/profile', [ProfileAdminController::class, 'update'])->name('dashboard.update');
Route::put('dashboard/password', [ProfileAdminController::class, 'password'])->name('dashboard.password');
Route::get('profile', [ProfileController::class, 'profile'])->name('profile.edit');
Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
Route::put('password', [ProfileController::class, 'password'])->name('profile.password');

});




