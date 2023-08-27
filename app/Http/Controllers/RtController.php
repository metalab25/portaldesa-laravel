<?php

namespace App\Http\Controllers;

use App\Models\Rt;
use App\Models\Rw;
use App\Models\Desa;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.desa.rt.index', [
            'user'      =>  Auth::user(),
            'config'    =>  Config::find(1),
            'desa'      =>  Desa::find(1),
            'rws'       =>  Rw::orderBy('rw', 'asc')->get(),
            'rts'       =>  Rt::orderBy('rt', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rw_id'    =>  'required',
            'rt'            =>  'required'
        ]);

        $validatedData['penduduk_id']   = $request->penduduk_id;

        Rt::create($validatedData);
        Alert::success('Berhasil', 'Rukun Tetangga baru berhasil ditambahkan');
        return redirect('wilayah/rt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rt $rt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rt $rt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rt $rt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rt $rt)
    {
        //
    }
}
