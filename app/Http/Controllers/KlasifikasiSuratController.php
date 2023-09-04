<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\KlasifikasiSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KlasifikasiSuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Config::find(1);

        return view('dashboard.sekretariat.klasifikasi.index', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            'klasifikasi'   => KlasifikasiSurat::orderBy('kode', 'asc')->filter(request(['search']))->paginate(12)->withQueryString()
        ]);
    }

    public function selectSearch()
    {
        $data = KlasifikasiSurat::where('nama', 'LIKE', '%' . request('q') . '%')->paginate(10);
        return response()->json($data);
    }
}
