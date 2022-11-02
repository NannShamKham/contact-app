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

Route::resource('/contact',\App\Http\Controllers\ContactController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/destroyMultiple', [\App\Http\Controllers\ContactController::class, 'destroyMultiple'])->name('contact.destroyMultiple');
Route::post('/copyMultiple', [\App\Http\Controllers\ContactController::class, 'copyMultiple'])->name('contact.copyMultiple');
Route::post('/copy/{id}', [\App\Http\Controllers\ContactController::class, 'copy'])->name('contact.copy');
Route::post('/export', [\App\Http\Controllers\ContactController::class, 'export'])->name('contact.export');
Route::post('/exportMultiple', [\App\Http\Controllers\ContactController::class, 'exportMultiple'])->name('contact.exportMultiple');
Route::post('/exportSingle/{id}', [\App\Http\Controllers\ContactController::class, 'exportSingle'])->name('contact.exportSingle');
Route::post('/printAll', [\App\Http\Controllers\ContactController::class, 'printAll'])->name('contact.printAll');
