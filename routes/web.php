<?php

use App\Models\KlasifikasiSurat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RtController;
use App\Http\Controllers\RwController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\PamongController;
use App\Http\Controllers\PerdesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\KeluargaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesProfileController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\KlasifikasiSuratController;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/authenticate', 'authenticate');
    Route::get('logout', 'logout')->middleware();
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');

Route::get('desa/identitas', [DesaController::class, 'index'])->name('identitas')->middleware('auth', 'admin');
Route::put('desa/identitas/{desa:id}', [DesaController::class, 'update'])->middleware('auth', 'admin');

// Desa > Wilayah
Route::resource('wilayah/cluster', WilayahController::class)->middleware('auth', 'admin');
Route::resource('wilayah/rw', RwController::class)->middleware('auth', 'admin');
Route::resource('wilayah/rt', RtController::class)->middleware('auth', 'admin');

// Desa > Profile
Route::resource('desa/profile', DesProfileController::class)->middleware('auth', 'admin');
Route::get('desa/profile/checkSlug', [DesProfileController::class, 'checkSlug'])->middleware('auth', 'admin');

// Desa > Pemerintahan
Route::resource('desa/pamong', PamongController::class)->middleware('auth', 'admin');

// Kependudukan > Keluarga
Route::resource('adminduk/keluarga', KeluargaController::class)->middleware('auth', 'admin', 'operator');
// Kependudukan > Penduduk
Route::resource('adminduk/penduduk', PendudukController::class)->middleware('auth', 'admin', 'operator');
Route::get('adminduk/penduduk/pdf/{nik}', [PendudukController::class, 'get_pdf'])->middleware('auth', 'admin');

// Get Penduduk
Route::get('get_penduduk', [PendudukController::class, 'selectSearch'])->middleware('auth', 'admin');

// Sekretariat > Klasifikasi Surat
Route::resource('sekretariat/klasifikasi', KlasifikasiSuratController::class)->middleware('auth', 'admin');

// Sekretariat > Surat Keluar
Route::resource('sekretariat/surat_keluar', SuratKeluarController::class)->middleware('auth', 'admin');

// Sekretariat > Surat Keluar
Route::resource('sekretariat/surat_masuk', SuratMasukController::class)->middleware('auth', 'admin');

// Get Klasifikasi Surat
Route::get('get_klasifikasi', [KlasifikasiSuratController::class, 'selectSearch'])->middleware('auth', 'admin');

// Sekretariat > Peraturan Desa
Route::resource('sekretariat/perdes', PerdesController::class)->middleware('auth', 'admin');
Route::get('sekretariat/perdes/checkSlug', [PerdesController::class, 'checkSlug'])->middleware('auth', 'admin', 'operator');
Route::get('sekretariat/perdes/cetak', [PerdesController::class, 'cetakLaporan'])->middleware('auth', 'admin', 'operator');

// webmin > Artikel
Route::resource('webmin/posts', ArticleController::class)->middleware('auth', 'admin', 'operator');
Route::get('webmin/posts/checkSlug', [ArticleController::class, 'checkSlug'])->middleware('auth', 'admin');
Route::patch('webmin/posts/status/{id}', [ArticleController::class, 'status'])->name('posts.status')->middleware('auth', 'admin');
Route::patch('webmin/posts/comment/{id}', [ArticleController::class, 'comment'])->name('posts.comment')->middleware('auth', 'admin');

// webmin > Kategori
Route::resource('webmin/categories', CategoryController::class)->middleware('auth', 'admin', 'operator');
Route::get('webmin/categories/checkSlug', [CategoryController::class, 'checkSlug'])->middleware('auth', 'admin', 'operator');

// webmin > Dokumen
Route::resource('webmin/documents', DocumentController::class)->middleware('auth', 'admin', 'operator');
Route::get('webmin/documents/checkSlug', [DocumentController::class, 'checkSlug'])->middleware('auth', 'admin', 'operator');
Route::post('webmin/documents/', [DocumentController::class, 'storePublicDoc'])->middleware('auth', 'admin');

Route::get('setting/application', [ConfigController::class, 'index'])->name('application')->middleware('auth', 'admin');
Route::put('setting/application/{config:id}', [ConfigController::class, 'update'])->middleware('auth', 'admin');

Route::resource('setting/users', UserController::class)->middleware('auth', 'admin');
