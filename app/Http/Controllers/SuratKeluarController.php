<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use App\Models\KlasifikasiSurat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Config::find(1);

        return view('dashboard.sekretariat.surat.keluar.index', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            'keluar'        => SuratKeluar::latest()->filter(request(['search']))->paginate(12)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Config::find(1);

        $cek = SuratKeluar::count();
        if ($cek == 0) {
            $urut   = '1';
        } else {
            $ambil  = SuratKeluar::all()->last();
            $urut   = (int)substr($ambil->nomor_urut, -3) + 1;
        }
        return view('dashboard.sekretariat.surat.keluar.add', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            'klasifikasi'   => KlasifikasiSurat::all(),
            'nomor_urut'    => $urut
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nomor_urut'            =>  'required',
                'nomor_surat'           =>  'required',
                'klasifikasi_surat_id'  =>  'required',
                'tanggal_surat'         =>  'required',
                'attach'                =>  'mimetypes:application/pdf|max:4096'
            ],
            [
                'nomor_urut.required'               => 'Nomor urut harus isi',
                'nomor_surat.required'              => 'Nomor surat harus isi',
                'klasifikasi_surat_id.required'     => 'Klasifikasi surat harus pilih',
                'tanggal_surat.required'            => 'Tanggal surat harus pilih',
                'attach.mimetypes'                  => 'Lampiran dokumen harus berupa PDF'
            ]
        );

        if ($request->file('attach')) {
            $validatedData['attach'] = $request->file('attach')->store('surat_keluar');
        }

        $validatedData['tujuan']        = $request->tujuan;
        $validatedData['short_desc']    = $request->short_desc;

        SuratKeluar::create($validatedData);
        Alert::success('Berhasil', 'Dokumen baru berhasil ditambahkan');
        return redirect('sekretariat/surat_keluar');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        if ($suratKeluar->attach) {
            Storage::delete([$suratKeluar->attach]);
        }

        SuratKeluar::destroy($suratKeluar->id);
        Alert::success('Berhasil', 'Dokumen berhasil dihapus');
        return redirect('sekretariat/surat_keluar');
    }
}
