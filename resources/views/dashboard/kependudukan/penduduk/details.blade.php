@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('penduduk') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 mb-2">
                <a href="{{ url('adminduk/penduduk/' . $penduduk->id . '/edit') }}"
                    class="btn btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Ubah
                    Biodata
                </a>
                <a href="{{ url('adminduk/penduduk/pdf/' . $penduduk->nik) }}"
                    class="btn btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Cetak
                    Biodata
                </a>
                <a href="{{ url('adminduk/penduduk') }}"
                    class="btn btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Kembali
                    Ke Daftar Penduduk
                </a>
            </div>
        </div>
        <!-- Default box -->
        <div class="row">
            <div class="col-xl-3 col-md-3">
                <div class="card mb-3 p-3">
                    <div class="d-flex justify-content-center">
                        <input type="hidden" name="oldFoto" value="{{ $penduduk->foto }}">
                        @if ($penduduk->foto)
                            <img src="{{ asset('storage/' . $penduduk->foto) }}"
                                class="img-rounded img-fluid d-block mx-auto mb-2">
                        @else
                            <img src="/assets/img/kuser.png" class="img-rounded img-fluid d-block mx-auto mb-2">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-md-9 mb-3">
                <div class="card p-3">
                    <div class="row align-middle">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label class="form-label text-sm font-outfit opacity-8">Nomor Induk
                                    Penduduk (NIK)</label>
                                <input class="form-control form-control-sm" value="{{ $penduduk->nik }}" disabled>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label class="form-label text-sm font-outfit opacity-8">Nama
                                    Lengkap <code class="text-danger">(Sesuai KTP)</code></label>
                                <input class="form-control form-control-sm" value="{{ $penduduk->nama }}"disabled>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mb-2">
                            <thead>
                                <tr>
                                    <th class="text-center text-sm opacity-7">Status Wajib KTP</th>
                                    <th class="text-center text-sm opacity-7">Status eKTP</th>
                                    <th class="text-center text-sm opacity-7">Status Rekam</th>
                                    <th class="text-center text-sm opacity-7">Tag eKTP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>

                                    </td>
                                    <td>
                                        @if ($penduduk->ktp_id !== null)
                                            <p class="text-sm text-center mb-0">{{ $penduduk->ktp->name }}</p>
                                        @else
                                            <p class="text-sm text-center text-danger mb-0">
                                                Belum diisi
                                            </p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($penduduk->tag_id_ktp !== null)
                                            <p class="text-sm text-center mb-0">{{ $penduduk->status_ktp->name }}</p>
                                        @else
                                            <p class="text-sm text-center text-danger mb-0">
                                                Belum diisi
                                            </p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($penduduk->tag_id_ktp !== null)
                                            <p class="text-sm text-center mb-0">
                                                {{ $penduduk->tag_id_ktp }}
                                            </p>
                                        @else
                                            <p class="text-sm text-center text-danger mb-0">
                                                Belum ada data
                                            </p>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nomor
                                    Kartu Keluarga</label>
                                @if ($penduduk->keluarga_id !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->keluarga->no_kk }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Hubungan
                                    Dalam Keluarga</label>
                                @if ($penduduk->hubungan_keluarga_id !== null)
                                    <input class="form-control form-control-sm"
                                        value="{{ $penduduk->hubungan_keluarga->name }}" disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nomor
                                    Kartu Keluarga Sebelummnya</label>
                                @if ($penduduk->no_kk_sebelumnya !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->no_kk_sebelumnya }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Jenis
                                    Kelamin</label>
                                @if ($penduduk->kelamin_id !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->kelamin->name }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Status
                                    Kependudukan</label>
                                @if ($penduduk->status_penduduk_id !== null)
                                    <input class="form-control form-control-sm"
                                        value="{{ $penduduk->status_penduduk->name }}" disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Agama</label>
                                @if ($penduduk->agama_id !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->agama->name }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="sub-header my-2">
                        <h5 class="text-sm text-uppercase font-outfit opacity-8 mb-0">Data Kelahiran</h5>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nomor
                                    Akta Kelahiran</label>
                                @if ($penduduk->akta_lahir !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->akta_lahir }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Tempat
                                    Lahir</label>
                                @if ($penduduk->tempat_lahir !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->tempat_lahir }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Tanggal
                                    Lahir</label>
                                @if ($penduduk->tanggal_lahir !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->tanggal_lahir }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Waktu
                                    Lahir</label>
                                @if ($penduduk->waktu_lahir !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->waktu_lahir }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-3">
                            <label class="form-label text-sm font-outfit opacity-8">Tempat
                                Dilahirkan</label>
                            @if ($penduduk->tempat_dilahirkan_id !== null)
                                <input class="form-control form-control-sm"
                                    value="{{ $penduduk->tempat_dilahirkan->name }}" disabled>
                            @else
                                <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-sm font-outfit opacity-8">Jenis
                                Kelahiran</label>
                            @if ($penduduk->jenis_kelahiran_id !== null)
                                <input class="form-control form-control-sm"
                                    value="{{ $penduduk->jenis_kelahiran->name }}" disabled>
                            @else
                                <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label class="form-label text-sm font-outfit opacity-8">Penolong
                                Kelahiran</label>
                            @if ($penduduk->penolong_kelahiran_id !== null)
                                <input class="form-control form-control-sm"
                                    value="{{ $penduduk->penolong_kelahiran->name }}" disabled>
                            @else
                                <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Anak
                                    Ke</label>
                                @if ($penduduk->anak_ke !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->anak_ke }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Berat
                                    Lahir</label>
                                @if ($penduduk->berat_lahir !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->berat_lahir }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Panjang
                                    Lahir</label>
                                @if ($penduduk->panjang_lahir !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->panjang_lahir }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="sub-header my-2">
                        <h5 class="text-sm text-uppercase font-outfit opacity-8 mb-0">Data Pendidikan dan Pekerjaan
                        </h5>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Pendidikan
                                    Dalam Kartu Keluarga</label>
                                @if ($penduduk->pendidikan_kk_id !== null)
                                    <input class="form-control form-control-sm"
                                        value="{{ $penduduk->pendidikan_kk->name }}" disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Pendidikan
                                    Dalam Sedang Ditempuh</label>
                                @if ($penduduk->pendidikan_tempuh_id !== null)
                                    <input class="form-control form-control-sm"
                                        value="{{ $penduduk->pendidikan_tempuh->name }}" disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Pekerjaan</label>
                                @if ($penduduk->pekerjaan_id !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->pekerjaan->name }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="sub-header my-2">
                        <h5 class="text-sm text-uppercase font-outfit opacity-8 mb-0">Data Kewarganegaraan
                        </h5>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Kewarganegaraan</label>
                                @if ($penduduk->kewarganegaraan_id !== null)
                                    <input class="form-control form-control-sm"
                                        value="{{ $penduduk->kewarganegaraan->name }}" disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nomor Paspor</label>
                                @if ($penduduk->dokumen_pasport !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->dokumen_pasport }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Tanggal Berakhir Paspor</label>
                                @if ($penduduk->tanggal_akhir_paspor !== null)
                                    <input class="form-control form-control-sm"
                                        value="{{ $penduduk->tanggal_akhir_paspor }}" disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nomor Kitas/Kitap</label>
                                @if ($penduduk->dokumen_kitas !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->dokumen_kitas }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="sub-header my-2">
                        <h5 class="text-sm text-uppercase font-outfit opacity-8 mb-0">Data Orang Tua
                        </h5>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nomor Induk Kependudukan
                                    Ayah</label>
                                @if ($penduduk->nik_ayah !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->nik_ayah }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nama Ayah</label>
                                @if ($penduduk->nama_ayah !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->nama_ayah }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nomor
                                    Induk Kependudukan Ibu</label>
                                @if ($penduduk->nik_ibu !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->nik_ibu }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nama
                                    Ibu</label>
                                @if ($penduduk->nama_ibu !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->nama_ibu }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="sub-header my-2">
                        <h5 class="text-sm text-uppercase font-outfit opacity-8 mb-0">Data Telepon dan Alamat
                        </h5>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Alamat
                                    Sekarang</label>
                                @if ($penduduk->alamat_sekarang !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->alamat_sekarang }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Alamat
                                    Sebelumnya</label>
                                @if ($penduduk->alamat_sebelumnya !== null)
                                    <input class="form-control form-control-sm"
                                        value="{{ $penduduk->alamat_sebelumnya }}" disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Nomor
                                    Telepon</label>
                                @if ($penduduk->telepon !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->telepon }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="sub-header my-2">
                        <h5 class="text-sm text-uppercase font-outfit opacity-8 mb-0">Data Perkawinan
                        </h5>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Status
                                    Perkawinan</label>
                                @if ($penduduk->status_kawin_id !== null)
                                    <input class="form-control form-control-sm"
                                        value="{{ $penduduk->status_kawin->name }}" disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">No. Akta
                                    Nikah (Buku Nikah)</label>
                                @if ($penduduk->akta_perkawinan !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->akta_perkawinan }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <div class="form-group mb-2">
                                    <label class="form-label text-sm font-outfit opacity-8">Tanggal Perkawinan></label>
                                    @if ($penduduk->tanggal_perkawinan !== null)
                                        <input class="form-control form-control-sm"
                                            value="{{ $penduduk->tanggal_perkawinan }}" disabled>
                                    @else
                                        <input class="form-control form-control-sm text-danger" value="Belum diisi"
                                            disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-8">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">No. Akta
                                    Perceraian</label>
                                @if ($penduduk->akta_perceraian !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->akta_perceraian }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-2">
                                <div class="form-group mb-2">
                                    <label class="form-label text-sm font-outfit opacity-8">Tanggal Perceraian</label>
                                    @if ($penduduk->tanggal_perceraian !== null)
                                        <input class="form-control form-control-sm"
                                            value="{{ $penduduk->tanggal_perceraian }}" disabled>
                                    @else
                                        <input class="form-control form-control-sm text-danger" value="Belum diisi"
                                            disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sub-header my-2">
                        <h5 class="text-sm text-uppercase font-outfit opacity-8 mb-0">Data Kesehatan
                        </h5>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Golongan
                                    Darah</label>
                                @if ($penduduk->darah_id !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->darah->name }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Cacat</label>
                                @if ($penduduk->cacat_id !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->cacat->name }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Sakit
                                    Menahun</label>
                                @if ($penduduk->sakit_id !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->sakit->name }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Status
                                    Kehamilan</label>
                                @if ($penduduk->hamil_id !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->hamil->name }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row align-middle">
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label class="form-label text-sm font-outfit opacity-8">Penggunaan
                                    KB</label>
                                @if ($penduduk->kb_id !== null)
                                    <input class="form-control form-control-sm" value="{{ $penduduk->kb->name }}"
                                        disabled>
                                @else
                                    <input class="form-control form-control-sm text-danger" value="Belum diisi" disabled>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
