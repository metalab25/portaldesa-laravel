<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Article;
use App\Models\Wilayah;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function index()
    {
        return view('web.index', [
            'user'              =>  Auth::user(),
            'desa'              =>  Desa::find(1),
            'config'            =>  Config::find(1),
            'cluster_count'     =>  Wilayah::all()->count(),
            'keluarga_count'    =>  Keluarga::all()->count(),
            'penduduk_count'    =>  Penduduk::all()->count(),
            'sambutan'          =>  Article::latest()->where('category_id', 12)->limit(1)->get()
        ]);
    }
}
