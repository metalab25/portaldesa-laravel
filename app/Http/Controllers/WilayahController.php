<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.desa.wilayah.index', [
            'user'      =>  Auth::user(),
            'config'    =>  Config::find(1),
            'desa'      =>  Desa::find(1),
            'cluster'   =>  Wilayah::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.desa.wilayah.add', [
            'user'      =>  Auth::user(),
            'config'    =>  Config::find(1),
            'desa'      =>  Desa::find(1),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'          =>  'required|max:255'
        ]);

        $validatedData['penduduk_id'] = $request->penduduk_id;
        $validatedData['level'] = $request->level;

        Wilayah::create($validatedData);
        Alert::success('Berhasil', 'Wilayah baru berhasil ditambahkan');
        return redirect('wilayah/cluster');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $wilayah = Wilayah::firstWhere('id', $id);

        return view('dashboard.desa.wilayah.details', [
            'user'      =>  Auth::user(),
            'config'    =>  Config::find(1),
            'desa'      =>  Desa::find(1),
            'wilayah'   =>  $wilayah,
            'cluster'   =>  Wilayah::orderBy('name', 'asc')->where('level', 1)->get(),
            'rws'       =>  Wilayah::orderBy('name', 'asc')->where('parent', $id)->get(),
            'count_rw'  =>  Wilayah::orderBy('name', 'asc')->where('parent', $id)->count()

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wilayah $wilayah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wilayah $wilayah)
    {
        //
    }
}
