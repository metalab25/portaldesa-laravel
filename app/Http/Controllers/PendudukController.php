<?php

namespace App\Http\Controllers;

use App\Models\Kb;
use App\Models\Ktp;
use App\Models\Desa;
use App\Models\Agama;
use App\Models\Cacat;
use App\Models\Darah;
use App\Models\Hamil;
use App\Models\Sakit;
use App\Models\Config;
use App\Models\Kelamin;
use App\Models\Keluarga;
use App\Models\Penduduk;
use App\Models\Pekerjaan;
use App\Models\StatusKtp;
use App\Models\StatusKawin;
use App\Models\PendidikanKk;
use Illuminate\Http\Request;
use App\Models\JenisKelahiran;
use App\Models\StatusPenduduk;
use App\Models\Kewarganegaraan;
use App\Models\HubunganKeluarga;
use App\Models\PendidikanTempuh;
use App\Models\TempatDilahirkan;
use App\Models\PenolongKelahiran;
use Faker\Provider\ar_EG\Person;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kependudukan.penduduk.index', [
            'user'      =>  Auth::user(),
            'config'    =>  Config::find(1),
            'desa'      =>  Desa::find(1),
            'penduduks' =>  Penduduk::orderBy('keluarga_id', 'asc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kependudukan.penduduk.add', [
            'user'                  =>  Auth::user(),
            'config'                =>  Config::find(1),
            'desa'                  =>  Desa::find(1),
            'keluargas'             =>  Keluarga::orderBy('no_kk', 'asc')->get(),
            'ektps'                 =>  Ktp::orderBy('id', 'asc')->get(),
            'ektp_rekam'            =>  StatusKtp::orderBy('id', 'asc')->get(),
            'hubungan'              =>  HubunganKeluarga::orderBy('id', 'asc')->get(),
            'kelamin'               =>  Kelamin::orderBy('id', 'asc')->get(),
            'agama'                 =>  Agama::orderBy('id', 'asc')->get(),
            'statuspen'             =>  StatusPenduduk::orderBy('id', 'asc')->get(),
            'tempat_dilahirkan'     =>  TempatDilahirkan::orderBy('id', 'asc')->get(),
            'jenis_kelahiran'       =>  JenisKelahiran::orderBy('id', 'asc')->get(),
            'penolong_kelahiran'    =>  PenolongKelahiran::orderBy('id', 'asc')->get(),
            'pendidikan_kk'         =>  PendidikanKk::orderBy('id', 'asc')->get(),
            'pendidikan_tempuh'     =>  PendidikanTempuh::orderBy('id', 'asc')->get(),
            'pekerjaan'             =>  Pekerjaan::orderBy('id', 'asc')->get(),
            'kewarganegaraan'       =>  Kewarganegaraan::orderBy('id', 'asc')->get(),
            'status_kawin'          =>  StatusKawin::orderBy('id', 'asc')->get(),
            'darah'                 =>  Darah::orderBy('id', 'asc')->get(),
            'cacat'                 =>  Cacat::orderBy('id', 'asc')->get(),
            'sakit'                 =>  Sakit::orderBy('id', 'asc')->get(),
            'hamil'                 =>  Hamil::orderBy('id', 'asc')->get(),
            'kbs'                   =>  Kb::orderBy('id', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'nik'                   =>  'required|max:16',
                'nama'                  =>  'required',
                'ktp_id'                =>  'required',
                'hubungan_keluarga_id'  =>  'required',
                'kelamin_id'            =>  'required',
                'tempat_lahir'          =>  'required',
                'tanggal_lahir'         =>  'required',
                'status_penduduk_id'    =>  'required',
                'agama_id'              =>  'required',
                'pendidikan_kk_id'      =>  'required',
                'pekerjaan_id'          =>  'required',
                'kewarganegaraan_id'    =>  'required',
                'status_kawin_id'       =>  'required',
                // 'foto'                  =>  'image|file|max:2048'
            ],
            [
                'nik.required'                  =>  'Nomor Induk Penduduk harus diisi',
                'nama.required'                 =>  'Nama harus diisi',
                'ktp_id.required'               =>  'Status eKTP harus diisi',
                'hubungan_keluarga_id.required' =>  'Hubungan dalam keluarga harus diisi',
                'kelamin_id.required'           =>  'Jenis kelamin harus diisi',
                'tempat_lahir.required'         =>  'Tempat lahir harus diisi',
                'tanggal_lahir.required'        =>  'Tanggal lahir harus diisi',
                'status_penduduk_id.required'   =>  'Status kependudukan harus diisi',
                'agama_id.required'             =>  'Agama harus diisi',
                'pendidikan_kk_id.required'     =>  'Pendidikan dalam KK harus diisi',
                'pekerjaan_id.required'         =>  'Pekerjaan harus diisi',
                'kewarganegaraan_id.required'   =>  'Kewarganegaraan harus diisi',
                'status_kawin_id.required'      =>  'Status perkawinan harus diisi',
            ]
        );

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('photos');
        }

        $validatedData['keluarga_id']           = $request->keluarga_id;
        $validatedData['no_kk_sebelumnya']      = $request->no_kk_sebelumnya;
        $validatedData['pendidikan_tempuh_id']  = $request->pendidikan_tempuh_id;
        $validatedData['dokumen_pasport']       = $request->dokumen_pasport;
        $validatedData['tanggal_akhir_paspor']  = $request->tanggal_akhir_paspor;
        $validatedData['dokumen_kitas']         = $request->dokumen_kitas;
        $validatedData['nik_ayah']              = $request->nik_ayah;
        $validatedData['nama_ayah']             = $request->nama_ayah;
        $validatedData['nik_ibu']               = $request->nik_ibu;
        $validatedData['nama_ibu']              = $request->nama_ibu;
        $validatedData['darah_id']              = $request->darah_id;
        $validatedData['hamil_id']              = $request->hamil_id;
        $validatedData['cacat_id']              = $request->cacat_id;
        $validatedData['sakit_id']              = $request->sakit_id;
        $validatedData['akta_lahir']            = $request->akta_lahir;
        $validatedData['akta_perkawinan']       = $request->akta_perkawinan;
        $validatedData['tanggal_perkawinan']    = $request->tanggal_perkawinan;
        $validatedData['akta_perceraian']       = $request->akta_perceraian;
        $validatedData['tanggal_perceraian']    = $request->tanggal_perceraian;
        $validatedData['kb_id']                 = $request->kb_id;
        $validatedData['telepon']               = $request->telepon;
        $validatedData['alamat_sebelumnya']     = $request->alamat_sebelumnya;
        $validatedData['alamat_sekarang']       = $request->alamat_sekarang;
        $validatedData['status_ktp_id']         = $request->status_ktp_id;
        $validatedData['waktu_lahir']           = $request->waktu_lahir;
        $validatedData['tempat_dilahirkan_id']  = $request->tempat_dilahirkan_id;
        $validatedData['jenis_kelahiran_id']    = $request->jenis_kelahiran_id;
        $validatedData['penolong_kelahiran_id'] = $request->penolong_kelahiran_id;
        $validatedData['anak_ke']               = $request->anak_ke;
        $validatedData['berat_lahir']           = $request->berat_lahir;
        $validatedData['panjang_lahir']         = $request->panjang_lahir;
        $validatedData['tag_id_ktp']            = $request->tag_id_ktp;
        $validatedData['tag_id_ktp']            = $request->tag_id_ktp;
        $validatedData['status_dasar_id']       = 1;

        Penduduk::create($validatedData);
        Alert::success('Berhasil', 'Penduduk baru berhasil ditambahkan');
        return redirect('adminduk/penduduk');
    }

    /**
     * Display the specified resource.
     */
    public function show($nik)
    {
        $penduduk = Penduduk::where('nik', $nik)->firstOrFail();
        return view('dashboard.kependudukan.penduduk.details', [
            'user'                  =>  Auth::user(),
            'config'                =>  Config::find(1),
            'desa'                  =>  Desa::find(1),
            'penduduk'              =>  $penduduk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $penduduk = Penduduk::where('id', $id)->firstOrFail();
        return view('dashboard.kependudukan.penduduk.edit', [
            'user'                  =>  Auth::user(),
            'config'                =>  Config::find(1),
            'desa'                  =>  Desa::find(1),
            'keluargas'             =>  Keluarga::orderBy('no_kk', 'asc')->get(),
            'ektps'                 =>  Ktp::orderBy('id', 'asc')->get(),
            'ektp_rekam'            =>  StatusKtp::orderBy('id', 'asc')->get(),
            'hubungan'              =>  HubunganKeluarga::orderBy('id', 'asc')->get(),
            'kelamin'               =>  Kelamin::orderBy('id', 'asc')->get(),
            'agama'                 =>  Agama::orderBy('id', 'asc')->get(),
            'statuspen'             =>  StatusPenduduk::orderBy('id', 'asc')->get(),
            'tempat_dilahirkan'     =>  TempatDilahirkan::orderBy('id', 'asc')->get(),
            'jenis_kelahiran'       =>  JenisKelahiran::orderBy('id', 'asc')->get(),
            'penolong_kelahiran'    =>  PenolongKelahiran::orderBy('id', 'asc')->get(),
            'pendidikan_kk'         =>  PendidikanKk::orderBy('id', 'asc')->get(),
            'pendidikan_tempuh'     =>  PendidikanTempuh::orderBy('id', 'asc')->get(),
            'pekerjaan'             =>  Pekerjaan::orderBy('id', 'asc')->get(),
            'kewarganegaraan'       =>  Kewarganegaraan::orderBy('id', 'asc')->get(),
            'status_kawin'          =>  StatusKawin::orderBy('id', 'asc')->get(),
            'darah'                 =>  Darah::orderBy('id', 'asc')->get(),
            'cacat'                 =>  Cacat::orderBy('id', 'asc')->get(),
            'sakit'                 =>  Sakit::orderBy('id', 'asc')->get(),
            'hamil'                 =>  Hamil::orderBy('id', 'asc')->get(),
            'kbs'                   =>  Kb::orderBy('id', 'asc')->get(),
            'penduduk'              =>  $penduduk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $rules = $request->validate(
            [
                'nik'                   =>  'required|max:16',
                'nama'                  =>  'required',
                'ktp_id'                =>  'required',
                'hubungan_keluarga_id'  =>  'required',
                'kelamin_id'            =>  'required',
                'tempat_lahir'          =>  'required',
                'tanggal_lahir'         =>  'required',
                'status_penduduk_id'    =>  'required',
                'agama_id'              =>  'required',
                'pendidikan_kk_id'      =>  'required',
                'pekerjaan_id'          =>  'required',
                'kewarganegaraan_id'    =>  'required',
                'status_kawin_id'       =>  'required',
                // 'foto'                  =>  'image|file|max:2048'
            ],
            [
                'nik.required'                  =>  'Nomor Induk Penduduk harus diisi',
                'nama.required'                 =>  'Nama harus diisi',
                'ktp_id.required'               =>  'Status eKTP harus diisi',
                'hubungan_keluarga_id.required' =>  'Hubungan dalam keluarga harus diisi',
                'kelamin_id.required'           =>  'Jenis kelamin harus diisi',
                'tempat_lahir.required'         =>  'Tempat lahir harus diisi',
                'tanggal_lahir.required'        =>  'Tanggal lahir harus diisi',
                'status_penduduk_id.required'   =>  'Status kependudukan harus diisi',
                'agama_id.required'             =>  'Agama harus diisi',
                'pendidikan_kk_id.required'     =>  'Pendidikan dalam KK harus diisi',
                'pekerjaan_id.required'         =>  'Pekerjaan harus diisi',
                'kewarganegaraan_id.required'   =>  'Kewarganegaraan harus diisi',
                'status_kawin_id.required'      =>  'Status perkawinan harus diisi',
            ]
        );

        $validatedData = $rules;

        $validatedData['keluarga_id']           = $request->keluarga_id;
        $validatedData['no_kk_sebelumnya']      = $request->no_kk_sebelumnya;
        $validatedData['pendidikan_tempuh_id']  = $request->pendidikan_tempuh_id;
        $validatedData['dokumen_pasport']       = $request->dokumen_pasport;
        $validatedData['tanggal_akhir_paspor']  = $request->tanggal_akhir_paspor;
        $validatedData['dokumen_kitas']         = $request->dokumen_kitas;
        $validatedData['nik_ayah']              = $request->nik_ayah;
        $validatedData['nama_ayah']             = $request->nama_ayah;
        $validatedData['nik_ibu']               = $request->nik_ibu;
        $validatedData['nama_ibu']              = $request->nama_ibu;
        $validatedData['darah_id']              = $request->darah_id;
        $validatedData['hamil_id']              = $request->hamil_id;
        $validatedData['cacat_id']              = $request->cacat_id;
        $validatedData['sakit_id']              = $request->sakit_id;
        $validatedData['akta_lahir']            = $request->akta_lahir;
        $validatedData['akta_perkawinan']       = $request->akta_perkawinan;
        $validatedData['tanggal_perkawinan']    = $request->tanggal_perkawinan;
        $validatedData['akta_perceraian']       = $request->akta_perceraian;
        $validatedData['tanggal_perceraian']    = $request->tanggal_perceraian;
        $validatedData['kb_id']                 = $request->kb_id;
        $validatedData['telepon']               = $request->telepon;
        $validatedData['alamat_sebelumnya']     = $request->alamat_sebelumnya;
        $validatedData['alamat_sekarang']       = $request->alamat_sekarang;
        $validatedData['status_ktp_id']         = $request->status_ktp_id;
        $validatedData['waktu_lahir']           = $request->waktu_lahir;
        $validatedData['tempat_dilahirkan_id']  = $request->tempat_dilahirkan_id;
        $validatedData['jenis_kelahiran_id']    = $request->jenis_kelahiran_id;
        $validatedData['penolong_kelahiran_id'] = $request->penolong_kelahiran_id;
        $validatedData['anak_ke']               = $request->anak_ke;
        $validatedData['berat_lahir']           = $request->berat_lahir;
        $validatedData['panjang_lahir']         = $request->panjang_lahir;
        $validatedData['tag_id_ktp']            = $request->tag_id_ktp;
        $validatedData['tag_id_ktp']            = $request->tag_id_ktp;
        $validatedData['status_dasar_id']       = 1;

        Penduduk::where('id', $penduduk->id)->update($validatedData);
        Alert::success('Berhasil', 'Data penduduk berhasil diperbaharui');
        return redirect('adminduk/penduduk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        Penduduk::destroy($penduduk->id);
        Alert::success('Berhasil', 'Penduduk berhasil dihapus');
        return redirect('adminduk/penduduk');
    }
}
