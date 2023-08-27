<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ConfigController extends Controller
{
    public function index()
    {
        $data = Config::find(1);

        return view('dashboard.settings.application.index', [
            'user'      => Auth::user(),
            'desa'      => Desa::find(1),
            'config'      => $data
        ]);
    }

    public function update(Request $request, Config $config)
    {
        $rules = [
            'id'                        =>  'required',
            'nama_aplikasi'             =>  'required',
            'admin_title'               =>  'required',
            'login_title'               =>  'required',
            'website_title'             =>  'required',
            'sebutan_kabupaten'         =>  'required',
            'singkatan_kabupaten'       =>  'required',
            'sebutan_kecamatan'         =>  'required',
            'sebutan_kepala_kecamatan'  =>  'required',
            'singkatan_kecamatan'       =>  'required',
            'sebutan_desa'              =>  'required',
            'sebutan_kepala_desa'       =>  'required',
            'sebutan_dusun'             =>  'required',
            'sebutan_kepala_dusun'      =>  'required',
            'format_nomor_surat'        =>  'required',
            'artikel_per_page'          =>  'required',
            'timezone'                  =>  'required',
            'current_version'           =>  'required',
            'copyright_desa'            =>  'required',
            'footer_aplikasi'           =>  'required',
            'banner'                    =>  'image|file|max:2048',
            'background'                =>  'image|file|max:2048'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('background')) {
            if ($request->oldBackground) {
                Storage::delete($request->oldBackground);
            }
            $validatedData['background'] = $request->file('background')->store('background');
        }

        if ($request->file('banner')) {
            if ($request->oldBanner) {
                Storage::delete($request->oldBanner);
            }
            $validatedData['banner'] = $request->file('banner')->store('banner');
        }

        $validatedData['footer_aplikasi'] = $request->footer_aplikasi;

        // dd($validatedData);

        Config::where('id', $config->id)->update($validatedData);
        Alert::success('Berhasil', 'Pengaturan aplikasi berhasil diperbaharui');
        return redirect('setting/application');
    }
}
