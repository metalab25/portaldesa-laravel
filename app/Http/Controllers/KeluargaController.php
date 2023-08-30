<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Desa;
use App\Models\Config;
use App\Models\Sosial;
use App\Models\Wilayah;
use App\Models\Keluarga;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kependudukan.keluarga.index', [
            'user'      =>  Auth::user(),
            'config'    =>  Config::find(1),
            'desa'      =>  Desa::find(1),
            'cluster'   =>  Wilayah::orderBy('name', 'asc')->get(),
            'rws'       =>  Rw::orderBy('rw', 'asc')->get(),
            'rts'       =>  Rt::orderBy('rt', 'asc')->get(),
            'sosials'   =>  Sosial::orderBy('name', 'asc')->get(),
            'keluarga'  =>  Keluarga::orderBy('no_kk', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_kk'    =>  'required|max:16',
            'alamat'    =>  'required',
        ]);

        $validatedData['wilayah_id'] = $request->wilayah_id;
        $validatedData['rw_id'] = $request->rw_id;
        $validatedData['rt_id'] = $request->rt_id;
        $validatedData['sosial_id'] = $request->sosial_id;
        $validatedData['user_id']   = auth()->user()->id;

        Keluarga::create($validatedData);
        Alert::success('Berhasil', 'Kartu Keluarga baru berhasil ditambahkan');
        return redirect('adminduk/keluarga');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keluarga $keluarga)
    {
        return view('dashboard.kependudukan.keluarga.details', [
            'user'              =>  Auth::user(),
            'config'            =>  Config::find(1),
            'desa'              =>  Desa::find(1),
            'cluster'           =>  Wilayah::orderBy('name', 'asc')->get(),
            'rws'               =>  Rw::orderBy('rw', 'asc')->get(),
            'rts'               =>  Rt::orderBy('rt', 'asc')->get(),
            'sosials'           =>  Sosial::orderBy('name', 'asc')->get(),
            'anggota'           =>  $keluarga->anggota,
            'penduduk'          =>  $keluarga->penduduk,
            'keluarga'          =>  $keluarga,
            // 'keluargas'          =>  Keluarga::where('no_kk', $no_kk)->firstOrFail()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('dashboard.kependudukan.keluarga.edit', [
            'user'              =>  Auth::user(),
            'config'            =>  Config::find(1),
            'desa'              =>  Desa::find(1),
            'cluster'           =>  Wilayah::orderBy('name', 'asc')->get(),
            'rws'               =>  Rw::orderBy('rw', 'asc')->get(),
            'rts'               =>  Rt::orderBy('rt', 'asc')->get(),
            'sosials'           =>  Sosial::orderBy('name', 'asc')->get(),
            'kepala_keluarga'   =>  Penduduk::orderBy('nama', 'asc')->where('hubungan_keluarga_id', 1)->get(),
            'keluarga'          =>  Keluarga::where('id', $id)->firstOrFail()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keluarga $keluarga)
    {
        $rules = [
            'no_kk'    =>  'required|max:16',
            'alamat'   =>  'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['penduduk_id']   = $request->penduduk_id;
        $validatedData['wilayah_id']    = $request->wilayah_id;
        $validatedData['rw_id']         = $request->rw_id;
        $validatedData['rt_id']         = $request->rt_id;
        $validatedData['sosial_id']     = $request->sosial_id;
        $validatedData['user_id']       = auth()->user()->id;

        Keluarga::where('id', $keluarga->id)->update($validatedData);
        Alert::success('Berhasil', 'Data kartu keluarga berhasil diperbaharui');
        return redirect('adminduk/keluarga');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keluarga $keluarga)
    {
        //
    }
}
