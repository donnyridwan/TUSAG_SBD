<?php
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [NotaController::class, 'index'])->name('nota.index');
});

Route::get('add', [PeminjamController::class, 'create'])->name('peminjam.create');
Route::post('store', [PeminjamController::class, 'store'])->name('peminjam.store');
Route::get('Peminjam_index', [PeminjamController::class, 'index'])->name('peminjam.index');
Route::get('edit/{id}', [PeminjamController::class, 'edit'])->name('peminjam.edit');
Route::post('update/{id}', [PeminjamController::class,'update'])->name('peminjam.update');
Route::post('delete/{id}', [PeminjamController::class,'delete'])->name('peminjam.delete');
Route::post('softdelete/{id}', [PeminjamController::class, 'softDelete'])->name('peminjam.softDelete');
Route::get('restore', [PeminjamController::class, 'restore'])->name('peminjam.restore');

Route::get('film_add', [FilmController::class, 'create'])->name('film.create');
Route::post('film_store', [FilmController::class, 'store'])->name('film.store');
Route::get('film_index', [FilmController::class, 'index'])->name('film.index');
Route::get('film_edit/{id}', [FilmController::class, 'edit'])->name('film.edit');
Route::post('film_update/{id}', [FilmController::class,'update'])->name('film.update');
Route::post('film_delete/{id}', [FilmController::class,'delete'])->name('film.delete');

Route::get('detail_add', [DetailController::class, 'create'])->name('detail.create');
Route::post('detail_store', [DetailController::class, 'store'])->name('detail.store');
Route::get('detail_index', [DetailController::class, 'index'])->name('detail.index');
Route::get('detail_edit/{id}', [DetailController::class, 'edit'])->name('detail.edit');
Route::post('detail_update/{id}', [DetailController::class,'update'])->name('detail.update');
Route::post('detail_delete/{id}', [DetailController::class,'delete'])->name('detail.delete');

Route::get('petugas_index', [PetugasController::class, 'index'])->name('petugas.index');
Route::get('nota_index', [NotaController::class, 'index'])->name('nota.index');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
