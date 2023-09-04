<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Config;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use App\Models\KlasifikasiSurat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Config::find(1);

        return view('dashboard.sekretariat.surat.masuk.index', [
            'user'          => Auth::user(),
            'desa'          => Desa::find(1),
            'config'        => $data,
            'masuk'         => SuratMasuk::latest()->filter(request(['search']))->paginate(12)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Config::find(1);

        $cek = SuratMasuk::count();
        if ($cek == 0) {
            $urut   = '1';
        } else {
            $ambil  = SuratMasuk::all()->last();
            $urut   = (int)substr($ambil->nomor_urut, -3) + 1;
        }
        return view('dashboard.sekretariat.surat.masuk.add', [
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
                'tanggal_penerimaan'    =>  'required',
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
                'tanggal_penerimaan.required'       => 'Tanggal penerimaan surat harus pilih',
                'attach.mimetypes'                  => 'Lampiran dokumen harus berupa PDF'
            ]
        );

        if ($request->file('attach')) {
            $validatedData['attach'] = $request->file('attach')->store('surat_masuk');
        }

        $validatedData['pengirim']          = $request->pengirim;
        $validatedData['perihal_surat']     = $request->perihal_surat;
        $validatedData['isi_disposisi']     = $request->isi_disposisi;

        SuratMasuk::create($validatedData);
        Alert::success('Berhasil', 'Surat masuk berhasil ditambahkan');
        return redirect('sekretariat/surat_masuk');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        if ($suratMasuk->attach) {
            Storage::delete([$suratMasuk->attach]);
        }

        SuratMasuk::destroy($suratMasuk->id);
        Alert::success('Berhasil', 'Data surat masuk berhasil dihapus');
        return redirect('sekretariat/surat_masuk');
    }
}
