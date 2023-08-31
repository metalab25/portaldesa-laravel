<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/authenticate', 'authenticate');
    Route::get('logout', 'logout')->middleware();
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('desa/identitas', [DesaController::class, 'index'])->name('identitas')->middleware('auth', 'admin');
Route::put('desa/identitas/{desa:id}', [DesaController::class, 'update'])->middleware('auth', 'admin');
// Wilayah
Route::resource('wilayah/cluster', WilayahController::class)->middleware('auth', 'admin');
Route::resource('wilayah/rw', RwController::class)->middleware('auth', 'admin');
Route::resource('wilayah/rt', RtController::class)->middleware('auth', 'admin');

// Kependudukan > Keluarga
Route::resource('adminduk/keluarga', KeluargaController::class)->middleware('auth', 'admin', 'operator');
// Kependudukan > Penduduk
Route::resource('adminduk/penduduk', PendudukController::class)->middleware('auth', 'admin', 'operator');
Route::get('adminduk/penduduk/pdf/{nik}', [PendudukController::class, 'get_pdf'])->middleware('auth', 'admin');

// webmin > Kategori
Route::resource('webmin/categories', CategoryController::class)->middleware('auth', 'admin', 'operator');
Route::get('webmin/categories/checkSlug', [CategoryController::class, 'checkSlug'])->middleware('auth', 'admin', 'operator');

// webmin > Kategori
Route::resource('webmin/article', ArticleController::class)->middleware('auth', 'admin', 'operator');
Route::get('webmin/article/checkSlug', [ArticleController::class, 'checkSlug'])->middleware('auth', 'admin');
Route::get('webmin/article/checkSlug', [ArticleController::class, 'checkSlug'])->middleware('auth', 'admin');
Route::patch('webmin/article/status/{id}', [ArticleController::class, 'status'])->name('article.status')->middleware('auth', 'admin');
Route::patch('webmin/article/comment/{id}', [ArticleController::class, 'comment'])->name('article.comment')->middleware('auth', 'admin');
// Route::patch('webmin/article/disable/{id}', [ArticleController::class, 'disable'])->name('article.disable')->middleware('auth', 'admin');

Route::get('setting/application', [ConfigController::class, 'index'])->name('application')->middleware('auth', 'admin');
Route::put('setting/application/{config:id}', [ConfigController::class, 'update'])->middleware('auth', 'admin');

Route::resource('setting/users', UserController::class)->middleware('auth', 'admin');
