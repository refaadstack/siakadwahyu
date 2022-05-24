<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\KelasSiswaController;

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
route::get('guru/tambah-mapel', [GuruController::class, 'tambahMapel'])->name('guru.tambah-mapel');
route::post('guru/store-mapel', [GuruController::class, 'storeMapel'])->name('guru.store-mapel');

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


route::get('siswa',[SiswaController::class, 'index'])->name('siswa.index');
route::get('siswa/json',[SiswaController::class,'json']);
route::get('siswa/create',[SiswaController::class,'create'])->name('siswa.create');
route::post('siswa/store',[SiswaController::class,'store'])->name('siswa.store');
route::get('siswa/{id}/edit',[SiswaController::class,'edit'])->name('siswa.edit');
route::put('siswa/{id}/update',[SiswaController::class,'update'])->name('siswa.update');
route::get('siswa/{id}/delete',[SiswaController::class,'destroy'])->name('siswa.destroy');
Route::get('siswa/{id}/show',[SiswaController::class,'show'])->name('siswa.show');
route::post('siswa/{id}/addnilai',[SiswaController::class,'addnilai']);
route::get('siswa/{idmapel}/{idsiswa}/editnilaimapel',[SiswaController::class,'editnilai'])->name('siswa.editnilai');
route::post('siswa/{idmapel}/{idsiswa}/updatenilai',[SiswaController::class,'updatenilai'])->name('siswa.updatenilai');
route::get('/siswa/{idsiswa}/{idmapel}/deletenilai',[SiswaController::class,'deletenilai']);

route::get('kelas-siswa/{id}/show',[KelasSiswaController::class, 'show'])->name('kelas-siswa.show');
route::get('kelas-siswa/{id}/getSiswa',[KelasSiswaController::class,'getSiswa'])->name('kelas-siswa.getSiswa');
route::get('kelas-siswa/{id}/create',[KelasSiswaController::class,'create'])->name('kelas-siswa.create');
route::post('kelas-siswa/{id}/store',[KelasSiswaController::class,'store'])->name('kelas-siswa.store');
route::get('kelas-siswa/{id}/edit',[KelasSiswaController::class,'edit'])->name('kelas-siswa.edit');
route::put('kelas-siswa/{id}/update',[KelasSiswaController::class,'update'])->name('kelas-siswa.update');
route::get('kelas-siswa/{idsiswa}/{idkelas}/delete',[KelasSiswaController::class,'destroy'])->name('kelas-siswa.destroy');
route::get('kelas-siswa/select2/{id}',[KelasSiswaController::class,'select2'])->name('kelas-siswa.select2');





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
