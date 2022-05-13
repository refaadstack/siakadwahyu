<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MapelController;

use App\Http\Controllers\DashboardController;

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

route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('guru',[GuruController::class, 'index'])->name('guru.index');
Route::get('guru/json',[GuruController::class,'json']);
Route::get('guru/create',[GuruController::class,'create'])->name('guru.create');
Route::post('guru/store',[GuruController::class,'store'])->name('guru.store');
Route::get('guru/{id}/edit',[GuruController::class,'edit'])->name('guru.edit');
Route::put('guru/{id}/update',[GuruController::class,'update'])->name('guru.update');
Route::get('guru/{id}/show',[GuruController::class,'show'])->name('guru.show');
Route::get('guru/{id}/delete',[GuruController::class,'destroy'])->name('guru.destroy');

route::get('kelas',[KelasController::class, 'index'])->name('kelas.index');
route::get('kelas/json',[KelasController::class,'json']);
route::get('kelas/create',[KelasController::class,'create'])->name('kelas.create');
route::post('kelas/store',[KelasController::class,'store'])->name('kelas.store');
route::get('kelas/{id}/edit',[KelasController::class,'edit'])->name('kelas.edit');
route::put('kelas/{id}/update',[KelasController::class,'update'])->name('kelas.update');
route::get('kelas/{id}/show',[KelasController::class,'show'])->name('kelas.show');
route::get('kelas/{id}/delete',[KelasController::class,'destroy'])->name('kelas.destroy');


route::get('semester',[SemesterController::class, 'index'])->name('semester.index');
route::get('semester/json',[SemesterController::class,'json']);
route::get('semester/create',[SemesterController::class,'create'])->name('semester.create');
route::post('semester/store',[SemesterController::class,'store'])->name('semester.store');
route::get('semester/{id}/edit',[SemesterController::class,'edit'])->name('semester.edit');
route::put('semester/{id}/update',[SemesterController::class,'update'])->name('semester.update');
route::get('semester/{id}/delete',[SemesterController::class,'destroy'])->name('semester.destroy');


route::get('jurusan',[JurusanController::class, 'index'])->name('jurusan.index');
route::get('jurusan/json',[JurusanController::class,'json']);
route::get('jurusan/create',[JurusanController::class,'create'])->name('jurusan.create');
route::post('jurusan/store',[JurusanController::class,'store'])->name('jurusan.store');
route::get('jurusan/{id}/edit',[JurusanController::class,'edit'])->name('jurusan.edit');
route::put('jurusan/{id}/update',[JurusanController::class,'update'])->name('jurusan.update');
route::get('jurusan/{id}/delete',[JurusanController::class,'destroy'])->name('jurusan.destroy');


route::get('mapel',[MapelController::class, 'index'])->name('mapel.index');
route::get('mapel/json',[MapelController::class,'json']);
route::get('mapel/create',[MapelController::class,'create'])->name('mapel.create');
route::post('mapel/store',[MapelController::class,'store'])->name('mapel.store');
route::get('mapel/{id}/edit',[MapelController::class,'edit'])->name('mapel.edit');
route::put('mapel/{id}/update',[MapelController::class,'update'])->name('mapel.update');
route::get('mapel/{id}/delete',[MapelController::class,'destroy'])->name('mapel.destroy');




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
