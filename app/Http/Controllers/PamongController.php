<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Pamong;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PamongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Config::find(1);
        return view('dashboard.desa.pamong.index', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            'pamong'        => Pamong::latest()->filter(request(['search']))->paginate(12)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Config::find(1);
        return view('dashboard.desa.pamong.add', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            'penduduk'      => Penduduk::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'penduduk_id'   =>  'required',
                'jabatan'       =>  'required',
                'email'         =>  'email'
            ],
            [
                'penduduk_id.required'      => 'Penduduk harus dipilih',
                'jabatan.required'          => 'Jabatan harus isi',
                'email.email'               => 'Penulisan email tidak valid'
            ]
        );

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('perangkat');
        }

        $validatedData['nipd']              = $request->nipd;
        $validatedData['golongan']          = $request->golongan;
        $validatedData['masa_jabatan']      = $request->masa_jabatan;
        $validatedData['tgl_pengangkatan']  = $request->tgl_pengangkatan;
        $validatedData['sk_pengangkatan']   = $request->sk_pengangkatan;
        $validatedData['tupoksi']           = $request->tupoksi;
        $validatedData['status']            = 1;

        Pamong::create($validatedData);
        Alert::success('Berhasil', 'Perangkat baru berhasil ditambahkan');
        return redirect('desa/pamong');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pamong $pamong)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pamong $pamong)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pamong $pamong)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pamong $pamong)
    {
        //
    }
}
