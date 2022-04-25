<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;

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

Route::get('guru',[GuruController::class, 'index'])->name('guru.index');
Route::get('guru/json',[GuruController::class,'json']);
Route::get('guru/create',[GuruController::class,'create']);
Route::post('guru/store',[GuruController::class,'store']);
Route::get('guru/{id}/edit',[GuruController::class,'edit'])->name('guru.edit');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
