<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\User;
use App\Models\Config;
use App\Models\Wilayah;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'user'              =>  Auth::user(),
            'config'            =>  Config::find(1),
            'desa'              =>  Desa::find(1),
            'cluster_count'     =>  Wilayah::all()->count(),
            'keluarga_count'    =>  Keluarga::all()->count(),
            'penduduk_count'    =>  Penduduk::all()->count(),
            'sm_recent'         =>  SuratMasuk::latest()->limit(5)->get(),
            'sk_recent'         =>  SuratKeluar::latest()->limit(5)->get(),
            'login_recent'      =>  User::orderBy('last_login_at', 'DESC')->limit(5)->get()
        ]);
    }
}
