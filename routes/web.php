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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function (){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/kelas', [App\Http\Controllers\Admin\KelasController::class, 'index'])->name('admin.kelas.index');
    Route::get('/add-kelas', [App\Http\Controllers\Admin\KelasController::class, 'add'])->name('admin.kelas.add');
    Route::post('/create-kelas', [App\Http\Controllers\Admin\KelasController::class, 'create'])->name('admin.kelas.create');
    Route::get('/edit-kelas/{id}', [App\Http\Controllers\Admin\KelasController::class, 'edit'])->name('admin.kelas.edit');
    Route::post('/update-kelas', [App\Http\Controllers\Admin\KelasController::class, 'update'])->name('admin.kelas.update');
    Route::get('/delete-kelas/{id}', [App\Http\Controllers\Admin\KelasController::class, 'delete'])->name('admin.kelas.delete');

    Route::get('/guru', [App\Http\Controllers\Admin\GuruController::class, 'index'])->name('admin.guru.index');
    Route::get('/add-guru', [App\Http\Controllers\Admin\GuruController::class, 'add'])->name('admin.guru.add');
    Route::post('/create-guru', [App\Http\Controllers\Admin\GuruController::class, 'create'])->name('admin.guru.create');
    Route::get('/edit-guru/{id}', [App\Http\Controllers\Admin\GuruController::class, 'edit'])->name('admin.guru.edit');
    Route::post('/update-guru', [App\Http\Controllers\Admin\GuruController::class, 'update'])->name('admin.guru.update');
    Route::get('/delete-guru/{id}', [App\Http\Controllers\Admin\GuruController::class, 'delete'])->name('admin.guru.delete');

    Route::get('/siswa', [App\Http\Controllers\Admin\SiswaController::class, 'index'])->name('admin.siswa.index');
    Route::get('/add-siswa', [App\Http\Controllers\Admin\SiswaController::class, 'add'])->name('admin.siswa.add');
    Route::post('/create-siswa', [App\Http\Controllers\Admin\SiswaController::class, 'create'])->name('admin.siswa.create');
    Route::get('/edit-siswa/{id}', [App\Http\Controllers\Admin\SiswaController::class, 'edit'])->name('admin.siswa.edit');
    Route::post('/update-siswa', [App\Http\Controllers\Admin\SiswaController::class, 'update'])->name('admin.siswa.update');
    Route::get('/delete-siswa/{id}', [App\Http\Controllers\Admin\SiswaController::class, 'delete'])->name('admin.siswa.delete');

    Route::get('/pelajaran', [App\Http\Controllers\Admin\PelajaranController::class, 'index'])->name('admin.pelajaran.index');
    Route::get('/add-pelajaran', [App\Http\Controllers\Admin\PelajaranController::class, 'add'])->name('admin.pelajaran.add');
    Route::post('/create-pelajaran', [App\Http\Controllers\Admin\PelajaranController::class, 'create'])->name('admin.pelajaran.create');
    Route::get('/edit-pelajaran/{id}', [App\Http\Controllers\Admin\PelajaranController::class, 'edit'])->name('admin.pelajaran.edit');
    Route::post('/update-pelajaran', [App\Http\Controllers\Admin\PelajaranController::class, 'update'])->name('admin.pelajaran.update');
    Route::get('/delete-pelajaran/{id}', [App\Http\Controllers\Admin\PelajaranController::class, 'delete'])->name('admin.pelajaran.delete');

    Route::get('/nilai', [App\Http\Controllers\Admin\NilaiController::class, 'index'])->name('admin.nilai.index');
    Route::get('/add-nilai', [App\Http\Controllers\Admin\NilaiController::class, 'add'])->name('admin.nilai.add');
    Route::post('/create-nilai', [App\Http\Controllers\Admin\NilaiController::class, 'create'])->name('admin.nilai.create');
    Route::get('/edit-nilai/{id}', [App\Http\Controllers\Admin\NilaiController::class, 'edit'])->name('admin.nilai.edit');
    Route::post('/update-nilai', [App\Http\Controllers\Admin\NilaiController::class, 'update'])->name('admin.nilai.update');
    Route::get('/delete-nilai/{id}', [App\Http\Controllers\Admin\NilaiController::class, 'delete'])->name('admin.nilai.delete');
});
