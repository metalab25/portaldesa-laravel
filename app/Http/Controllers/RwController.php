<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Desa;
use App\Models\Config;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RwController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.desa.rw.index', [
            'user'      =>  Auth::user(),
            'config'    =>  Config::find(1),
            'desa'      =>  Desa::find(1),
            'cluster'   =>  Wilayah::orderBy('name', 'asc')->get(),
            'rws'       =>  Rw::orderBy('rw', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.desa.rw.add', [
            'user'      =>  Auth::user(),
            'config'    =>  Config::find(1),
            'desa'      =>  Desa::find(1),
            'cluster'   =>  Wilayah::orderBy('name', 'asc')->where('level', 1)->get(),
            'rws'       =>  Wilayah::orderBy('name', 'asc')->where('level', 2)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'wilayah_id'    =>  'required',
            'rw'            =>  'required'
        ]);

        $validatedData['penduduk_id']   = $request->penduduk_id;

        Rw::create($validatedData);
        Alert::success('Berhasil', 'Rukun Warga baru berhasil ditambahkan');
        return redirect('wilayah/rw');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $rw = Wilayah::firstWhere('parent', $parent);
        $rw = Wilayah::orderBy('name', 'asc')->where('id', $id)->get();
        return view('dashboard.desa.rw.details', [
            'user'      =>  Auth::user(),
            'config'    =>  Config::find(1),
            'desa'      =>  Desa::find(1),
            'rw'        =>  $rw,
            'rts'       =>  Wilayah::orderBy('name', 'asc')->where('parent', $id)->get()
        ]);

        // dd($rw);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rw $rw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rw $rw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rw $rw)
    {
        //
    }
}
