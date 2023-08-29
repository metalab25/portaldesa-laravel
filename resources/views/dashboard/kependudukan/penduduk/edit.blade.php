@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('penduduk') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="{{ url('adminduk/penduduk/' . $penduduk->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col-xl-3 col-md-3">
                    <div class="card mb-3 p-3">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="oldFoto" value="{{ $penduduk->foto }}">
                            @if ($penduduk->foto)
                                <img src="{{ asset('storage/' . $penduduk->foto) }}"
                                    class="foto-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @else
                                <img src="/assets/img/kuser.png"
                                    class="foto-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @endif
                        </div>
                        <div class="mb-0">
                            <p class="text-center font-outfit font-weight-bold text-sm mb-0">Foto Penduduk</p>
                            <p class="text-center text-xs text-danger mb-4">Maksimal 2MB</p>
                            <input class="form-control form-control-sm @error('foto') is-invalid @enderror" type="file"
                                name="foto" id="foto" onchange="previewFoto()">
                            @error('foto')
                                <div class="invalid-feedback text-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-md-9 mb-3">
                    <div class="card p-3">
                        <div class="row align-middle">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="nik" class="form-label text-sm font-outfit opacity-8">Nomor Induk
                                        Penduduk (NIK)</label>
                                    <input type="number" name="nik" id="nik"
                                        class="form-control form-control-sm @error('nik') is-invalid @enderror"
                                        placeholder="Contoh : 852365......." value="{{ old('nik', $penduduk->nik) }}">
                                    @error('nik')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="nama" class="form-label text-sm font-outfit opacity-8">Nama
                                        Lengkap <code class="text-danger">(Sesuai KTP)</code></label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                        placeholder="Nama Lengkap" value="{{ old('nama', $penduduk->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                                            <select name="ktp_id" id="ktp_id"
                                                class="form-control form-control-sm @error('ktp_id') is-invalid @enderror">
                                                <option value="">-- Pilih Status eKTP --</option>
                                                @foreach ($ektps as $item)
                                                    @if (old('ktp_id', $penduduk->ktp_id) == $item->id)
                                                        <option value="{{ $item->id }}" selected>
                                                            {{ $item->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $item->id }}"> {{ $item->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </td>
                                        <td>
                                            <select name="status_ktp_id" id="status_ktp_id"
                                                class="form-control form-control-sm">
                                                <option value="">-- Pilih Status Rekam eKTP --</option>
                                                @foreach ($ektp_rekam as $item)
                                                    @if (old('status_ktp_id', $penduduk->status_ktp_id) == $item->id)
                                                        <option value="{{ $item->id }}" selected>
                                                            {{ $item->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $item->id }}"> {{ $item->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row align-middle">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="keluarga_id" class="form-label text-sm font-outfit opacity-8">Nomor
                                        Kartu Keluarga</label>
                                    <select name="keluarga_id" id="keluarga_id"
                                        class="form-control form-control-sm @error('hubungan_keluarga_id') is-invalid @enderror">
                                        <option value="">-- Pilih Kartu Keluarga --</option>
                                        @foreach ($keluargas as $item)
                                            @if (old('keluarga_id', $penduduk->keluarga_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    No. KK : {{ $item->no_kk }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> No. KK : {{ $item->no_kk }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('keluarga_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="hubungan_keluarga_id"
                                        class="form-label text-sm font-outfit opacity-8">Hubungan
                                        Dalam Keluarga</label>
                                    <select name="hubungan_keluarga_id" id="hubungan_keluarga_id"
                                        class="form-control form-control-sm @error('hubungan_keluarga_id') is-invalid @enderror">
                                        <option value="">-- Pilih Hubungan Keluarga --</option>
                                        @foreach ($hubungan as $item)
                                            @if (old('hubungan_keluarga_id', $penduduk->hubungan_keluarga_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('hubungan_keluarga_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="no_kk_sebelumnya" class="form-label text-sm font-outfit opacity-8">Nomor
                                        Kartu Keluarga Sebelummnya</label>
                                    <input type="text" name="no_kk_sebelumnya" id="no_kk_sebelumnya"
                                        class="form-control form-control-sm" placeholder="Contoh : 852365......."
                                        value="{{ old('no_kk_sebelumnya', $penduduk->no_kk_sebelumnya) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row align-middle">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="kelamin_id" class="form-label text-sm font-outfit opacity-8">Jenis
                                        Kelamin</label>
                                    <select name="kelamin_id" id="kelamin_id"
                                        class="form-control form-control-sm @error('kelamin_id') is-invalid @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        @foreach ($kelamin as $item)
                                            @if (old('kelamin_id', $penduduk->kelamin_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('kelamin_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="status_penduduk_id"
                                        class="form-label text-sm font-outfit opacity-8">Status Kependudukan</label>
                                    <select name="status_penduduk_id" id="status_penduduk_id"
                                        class="form-control form-control-sm @error('status_penduduk_id') is-invalid @enderror">
                                        <option value="">-- Pilih Status Kependudukan --</option>
                                        @foreach ($statuspen as $item)
                                            @if (old('status_penduduk_id', $penduduk->status_penduduk_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('status_penduduk_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="agama_id" class="form-label text-sm font-outfit opacity-8">Agama</label>
                                    <select name="agama_id" id="agama_id"
                                        class="form-control form-control-sm @error('agama_id') is-invalid @enderror">
                                        <option value="">-- Pilih Agama --</option>
                                        @foreach ($agama as $item)
                                            @if (old('agama_id', $penduduk->agama_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('agama_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="sub-header my-2">
                            <h5 class="text-sm text-uppercase font-outfit opacity-8 mb-0">Data Kelahiran</h5>
                        </div>
                        <div class="row align-middle">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="akta_lahir" class="form-label text-sm font-outfit opacity-8">Nomor
                                        Akta Kelahiran</label>
                                    <input type="text" name="akta_lahir" id="akta_lahir"
                                        class="form-control form-control-sm" placeholder="Contoh : 852365......."
                                        value="{{ old('akta_lahir', $penduduk->akta_lahir) }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="tempat_lahir" class="form-label text-sm font-outfit opacity-8">Tempat
                                        Lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        class="form-control form-control-sm @error('tempat_lahir') is-invalid @enderror"
                                        placeholder="Contoh : Jakarta"
                                        value="{{ old('tempat_lahir', $penduduk->tempat_lahir) }}">
                                    @error('tempat_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="tanggal_lahir" class="form-label text-sm font-outfit opacity-8">Tanggal
                                        Lahir <code>(contoh : 2002-05-21)</code></label>
                                    <input type="text" name="tanggal_lahir" id="tanggal_lahir"
                                        class="form-control form-control-sm @error('tanggal_lahir') is-invalid @enderror"
                                        value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="waktu_lahir" class="form-label text-sm font-outfit opacity-8">Waktu
                                        Lahir</label>
                                    <input type="time" name="waktu_lahir" id="waktu_lahir"
                                        class="form-control form-control-sm" placeholder="Contoh : 852365......."
                                        value="{{ old('waktu_lahir', $penduduk->waktu_lahir) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row align-middle">
                            <div class="col-md-3">
                                <label for="tempat_dilahirkan_id" class="form-label text-sm font-outfit opacity-8">Tempat
                                    Dilahirkan</label>
                                <select name="tempat_dilahirkan_id" id="tempat_dilahirkan_id"
                                    class="form-control form-control-sm">
                                    <option value="">-- Pilih Tempat Dilahirkan --</option>
                                    @foreach ($tempat_dilahirkan as $item)
                                        @if (old('tempat_dilahirkan_id', $penduduk->tempat_dilahirkan_id) == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->name }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}"> {{ $item->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="jenis_kelahiran_id" class="form-label text-sm font-outfit opacity-8">Jenis
                                    Kelahiran</label>
                                <select name="jenis_kelahiran_id" id="jenis_kelahiran_id"
                                    class="form-control form-control-sm">
                                    <option value="">-- Pilih Jenis Kelahiran --</option>
                                    @foreach ($jenis_kelahiran as $item)
                                        @if (old('jenis_kelahiran_id', $penduduk->jenis_kelahiran_id) == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->name }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}"> {{ $item->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="penolong_kelahiran_id"
                                    class="form-label text-sm font-outfit opacity-8">Penolong Kelahiran</label>
                                <select name="penolong_kelahiran_id" id="penolong_kelahiran_id"
                                    class="form-control form-control-sm">
                                    <option value="">-- Pilih Penolong Kelahiran --</option>
                                    @foreach ($penolong_kelahiran as $item)
                                        @if (old('penolong_kelahiran_id', $penduduk->penolong_kelahiran_id) == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->name }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}"> {{ $item->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="anak_ke" class="form-label text-sm font-outfit opacity-8">Anak
                                        Ke</label>
                                    <input type="number" name="anak_ke" id="anak_ke"
                                        class="form-control form-control-sm" placeholder="Contoh : 2"
                                        value="{{ old('anak_ke', $penduduk->anak_ke) }}">
                                </div>
                            </div>
                        </div>
                        <div class="row align-middle">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="berat_lahir" class="form-label text-sm font-outfit opacity-8">Berat Lahir
                                        <code class="text-danger">(Kg)</code></label>
                                    <input type="number" name="berat_lahir" id="berat_lahir"
                                        class="form-control form-control-sm" placeholder="Contoh : 3.5"
                                        value="{{ old('berat_lahir', $penduduk->berat_lahir) }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="panjang_lahir" class="form-label text-sm font-outfit opacity-8">Panjang
                                        Lahir
                                        <code class="text-danger">(Cm)</code></label>
                                    <input type="number" name="panjang_lahir" id="panjang_lahir"
                                        class="form-control form-control-sm" placeholder="Contoh : 52"
                                        value="{{ old('panjang_lahir', $penduduk->panjang_lahir) }}">
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
                                    <label for="pendidikan_kk_id"
                                        class="form-label text-sm font-outfit opacity-8">Pendidikan
                                        Dalam Kartu Keluarga</label>
                                    <select name="pendidikan_kk_id" id="pendidikan_kk_id"
                                        class="form-control form-control-sm @error('pendidikan_kk_id') is-invalid @enderror">
                                        <option value="">-- Pilih Pendidikan
                                            Dalam Kartu Keluarga --</option>
                                        @foreach ($pendidikan_kk as $item)
                                            @if (old('pendidikan_kk_id', $penduduk->pendidikan_kk_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('pendidikan_kk_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="pendidikan_tempuh_id"
                                        class="form-label text-sm font-outfit opacity-8">Pendidikan
                                        Dalam Sedang Ditempuh</label>
                                    <select name="pendidikan_tempuh_id" id="pendidikan_tempuh_id"
                                        class="form-control form-control-sm">
                                        <option value="">-- Pilih Pendidikan Sedang Ditempuh --</option>
                                        @foreach ($pendidikan_tempuh as $item)
                                            @if (old('pendidikan_tempuh_id', $penduduk->pendidikan_tempuh_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="pekerjaan_id"
                                        class="form-label text-sm font-outfit opacity-8">Pekerjaan</label>
                                    <select name="pekerjaan_id" id="pekerjaan_id"
                                        class="form-control form-control-sm @error('pekerjaan_id') is-invalid @enderror">
                                        <option value="">-- Pilih Pekerjaan --</option>
                                        @foreach ($pekerjaan as $item)
                                            @if (old('pekerjaan_id', $penduduk->pekerjaan_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('pekerjaan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
                                    <label for="kewarganegaraan_id"
                                        class="form-label text-sm font-outfit opacity-8">Kewarganegaraan</label>
                                    <select name="kewarganegaraan_id" id="kewarganegaraan_id"
                                        class="form-control form-control-sm @error('kewarganegaraan_id') is-invalid @enderror">
                                        <option value="">-- Pilih Kewarganegaraan --</option>
                                        @foreach ($kewarganegaraan as $item)
                                            @if (old('kewarganegaraan_id', $penduduk->kewarganegaraan_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('kewarganegaraan_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="dokumen_pasport" class="form-label text-sm font-outfit opacity-8">Nomor
                                        Paspor</label>
                                    <input type="text" name="dokumen_pasport" id="dokumen_pasport"
                                        class="form-control form-control-sm" placeholder="Tuliskan nomor paspor..."
                                        value="{{ old('dokumen_pasport', $penduduk->dokumen_pasport) }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="tanggal_akhir_paspor"
                                        class="form-label text-sm font-outfit opacity-8">Tanggal Berakhir Paspor</label>
                                    <input type="text" name="tanggal_akhir_paspor" id="tanggal_akhir_paspor"
                                        class="form-control form-control-sm" placeholder="Contoh : 25-12-2005"
                                        value="{{ old('tanggal_akhir_paspor', $penduduk->tanggal_akhir_paspor) }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="dokumen_kitas" class="form-label text-sm font-outfit opacity-8">Nomor
                                        Kitas/Kitap</label>
                                    <input type="text" name="dokumen_kitas" id="dokumen_kitas"
                                        class="form-control form-control-sm" placeholder="Tuliskan nomor kitas/kitap..."
                                        value="{{ old('dokumen_kitas', $penduduk->dokumen_kitas) }}">
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
                                    <label for="nik_ayah" class="form-label text-sm font-outfit opacity-8">Nomor
                                        Induk Kependudukan Ayah</label>
                                    <input type="text" name="nik_ayah" id="nik_ayah"
                                        class="form-control form-control-sm" placeholder="Contoh : 52072565822..."
                                        value="{{ old('nik_ayah', $penduduk->nik_ayah) }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="nama_ayah" class="form-label text-sm font-outfit opacity-8">Nama
                                        Ayah</label>
                                    <input type="text" name="nama_ayah" id="nama_ayah"
                                        class="form-control form-control-sm" placeholder="Tuliskan nama ayah..."
                                        value="{{ old('nama_ayah', $penduduk->nama_ayah) }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="nik_ibu" class="form-label text-sm font-outfit opacity-8">Nomor
                                        Induk Kependudukan Ibu</label>
                                    <input type="text" name="nik_ibu" id="nik_ibu"
                                        class="form-control form-control-sm" placeholder="52072565822..."
                                        value="{{ old('nik_ibu', $penduduk->nik_ibu) }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="nama_ibu" class="form-label text-sm font-outfit opacity-8">Nama
                                        Ibu</label>
                                    <input type="text" name="nama_ibu" id="nama_ibu"
                                        class="form-control form-control-sm" placeholder="Tuliskan nama ibu..."
                                        value="{{ old('nama_ibu', $penduduk->nama_ibu) }}">
                                </div>
                            </div>
                        </div>
                        <div class="sub-header my-2">
                            <h5 class="text-sm text-uppercase font-outfit opacity-8 mb-0">Data Telepon dan Alamat
                            </h5>
                        </div>
                        <div class="row align-middle">
                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                    <label for="telepon" class="form-label text-sm font-outfit opacity-8">Nomor
                                        Telepon</label>
                                    <input type="number" name="telepon" id="telepon"
                                        class="form-control form-control-sm" placeholder="Contoh : 081258922..."
                                        value="{{ old('telepon', $penduduk->telepon) }}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group mb-2">
                                    <label for="alamat_sebelumnya" class="form-label text-sm font-outfit opacity-8">Alamat
                                        Sebelumnya</label>
                                    <input type="text" name="alamat_sebelumnya" id="alamat_sebelumnya"
                                        class="form-control form-control-sm" placeholder="Tuliskan alamat sebelumnya..."
                                        value="{{ old('alamat_sebelumnya', $penduduk->alamat_sebelumnya) }}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group mb-2">
                                    <label for="alamat_sekarang" class="form-label text-sm font-outfit opacity-8">Alamat
                                        Sekarang</label>
                                    <input type="text" name="alamat_sekarang" id="alamat_sekarang"
                                        class="form-control form-control-sm" placeholder="Tuliskan alamat sekarang..."
                                        value="{{ old('alamat_sekarang', $penduduk->alamat_sekarang) }}">
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
                                    <label for="status_kawin_id" class="form-label text-sm font-outfit opacity-8">Status
                                        Perkawinan</label>
                                    <select name="status_kawin_id" id="status_kawin_id"
                                        class="form-control form-control-sm @error('status_kawin_id') is-invalid @enderror">
                                        <option value="">-- Pilih Status Perkawinan --</option>
                                        @foreach ($status_kawin as $item)
                                            @if (old('status_kawin_id', $penduduk->status_kawin_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('status_kawin_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="akta_perkawinan" class="form-label text-sm font-outfit opacity-8">No. Akta
                                        Nikah (Buku Nikah)</label>
                                    <input type="text" name="akta_perkawinan" id="akta_perkawinan"
                                        class="form-control form-control-sm"
                                        placeholder="Tuliskan nomor akta pernikahan..."
                                        value="{{ old('akta_perkawinan', $penduduk->akta_perkawinan) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <div class="form-group mb-2">
                                        <label for="tanggal_perkawinan"
                                            class="form-label text-sm font-outfit opacity-8">Tanggal Perkawinan <code
                                                class="text-danger">(Wajib diisi apabila status Kawin)</code></label>
                                        <input type="text" name="tanggal_perkawinan" id="tanggal_perkawinan"
                                            class="form-control form-control-sm" placeholder="Contoh : 25-07-1990"
                                            value="{{ old('tanggal_perkawinan', $penduduk->tanggal_perkawinan) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-middle">
                            <div class="col-md-8">
                                <div class="form-group mb-2">
                                    <label for="akta_perceraian" class="form-label text-sm font-outfit opacity-8">No. Akta
                                        Perceraian</label>
                                    <input type="text" name="akta_perceraian" id="akta_perceraian"
                                        class="form-control form-control-sm"
                                        placeholder="Tuliskan nomor akta perceraian..."
                                        value="{{ old('akta_perceraian', $penduduk->akta_perceraian) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <div class="form-group mb-2">
                                        <label for="tanggal_perceraian"
                                            class="form-label text-sm font-outfit opacity-8">Tanggal Perceraian <code
                                                class="text-danger">(Wajib diisi apabila status Cerai)</code></label>
                                        <input type="text" name="tanggal_perceraian" id="tanggal_perceraian"
                                            class="form-control form-control-sm" placeholder="Contoh : 25-07-1990"
                                            value="{{ old('tanggal_perceraian', $penduduk->tanggal_perceraian) }}">
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
                                    <label for="darah_id" class="form-label text-sm font-outfit opacity-8">Golongan
                                        Darah</label>
                                    <select name="darah_id" id="darah_id" class="form-control form-control-sm">
                                        <option value="">-- Pilih Golongan Darah --</option>
                                        @foreach ($darah as $item)
                                            @if (old('darah_id', $penduduk->darah_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="cacat_id" class="form-label text-sm font-outfit opacity-8">Cacat</label>
                                    <select name="cacat_id" id="cacat_id" class="form-control form-control-sm">
                                        <option value="">-- Pilih Cacat --</option>
                                        @foreach ($cacat as $item)
                                            @if (old('cacat_id', $penduduk->cacat_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="sakit_id" class="form-label text-sm font-outfit opacity-8">Sakit
                                        Menahun</label>
                                    <select name="sakit_id" id="sakit_id" class="form-control form-control-sm">
                                        <option value="">-- Pilih Penyakit Menahun --</option>
                                        @foreach ($sakit as $item)
                                            @if (old('sakit_id', $penduduk->sakit_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="hamil_id" class="form-label text-sm font-outfit opacity-8">Status
                                        Kehamilan</label>
                                    <select name="hamil_id" id="hamil_id" class="form-control form-control-sm">
                                        <option value="">-- Pilih Status Kehamilan --</option>
                                        @foreach ($hamil as $item)
                                            @if (old('hamil_id', $penduduk->hamil_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row align-middle">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label for="kb_id" class="form-label text-sm font-outfit opacity-8">Penggunaan
                                        KB</label>
                                    <select name="kb_id" id="kb_id" class="form-control form-control-sm">
                                        <option value="">-- Pilih Akseptor KB --</option>
                                        @foreach ($kbs as $item)
                                            @if (old('kb_id', $penduduk->kb_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->name }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('adminduk/penduduk') }}" class="btn btn-sm btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary pull-right">Simpan</button>
                </div>
            </div>
        </form>
        <!-- /.card -->

    </section>

    <script>
        function previewFoto() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.foto-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(foto.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
