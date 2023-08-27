<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DesaController extends Controller
{
    public function index()
    {
        $data = Desa::find(1);

        return view('dashboard.desa.config', [
            'user'      => Auth::user(),
            'provinsi'  => Provinsi::all(),
            'config'    => Config::find(1),
            'desa'      => $data
        ]);
    }

    public function update(Request $request, Desa $desa)
    {
        $rules = [
            'id'                =>  'required',
            'nama_desa'         =>  'required',
            'alamat'            =>  'required',
            'telepon'           =>  'required',
            'email'             =>  'required',
            'website'           =>  'required',
            'kode_desa'         =>  'required',
            'nama_kepala_desa'  =>  'required',
            'kodepos'           =>  'required',
            'nama_kecamatan'    =>  'required',
            'kode_kecamatan'    =>  'required',
            'nama_kepala_camat' =>  'required',
            'nama_kabupaten'    =>  'required',
            'kode_kabupaten'    =>  'required',
            'provinsi_id'       =>  'required',
            'logo'              =>  'image|file|max:2048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('logo')) {
            if ($request->oldLogo) {
                Storage::delete($request->oldLogo);
            }
            $validatedData['logo'] = $request->file('logo')->store('logo');
        }

        if ($request->file('ttd')) {
            if ($request->oldTtd) {
                Storage::delete($request->oldTtd);
            }
            $validatedData['ttd'] = $request->file('ttd')->store('ttd');
        }

        if ($request->file('banner')) {
            if ($request->oldBanner) {
                Storage::delete($request->oldBanner);
            }
            $validatedData['banner'] = $request->file('banner')->store('banner');
        }

        $validatedData['niap_kepala_desa'] = $request->niap_kepala_desa;
        $validatedData['telepon_kepala_desa'] = $request->telepon_kepala_desa;
        $validatedData['nip_kepala_camat'] = $request->nip_kepala_camat;
        $validatedData['lat'] = $request->lat;
        $validatedData['lng'] = $request->lng;

        // dd($validatedData);

        Desa::where('id', $desa->id)->update($validatedData);
        Alert::success('Berhasil', 'Identitas desa berhasil diperbaharui');
        return redirect('desa/identitas');
    }
}
