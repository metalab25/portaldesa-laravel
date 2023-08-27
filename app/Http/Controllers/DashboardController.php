<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Wilayah;
use App\Models\Keluarga;
use App\Models\Penduduk;
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
        ]);
    }
}
