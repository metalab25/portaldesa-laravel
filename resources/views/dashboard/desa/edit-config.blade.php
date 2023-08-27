@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('konfigurasi') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="{{ url('desa/konfigurasi/' . $data->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $data->id }}">
            <div class="row">
                <div class="col-xl-3 col-md-3">
                    <div class="card mb-3 p-3">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="oldLogo" value="{{ $data->logo }}">
                            @if ($data->logo)
                                <img src="{{ asset('storage/' . $data->logo) }}"
                                    class="logo-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @else
                                <img src="/assets/img/default_logo.png"
                                    class="logo-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @endif
                        </div>
                        <div class="mb-0">
                            <p class="text-center font-outfit font-weight-bold text-sm mb-0">Lambang Desa</p>
                            <p class="text-center text-xs text-danger mb-4">Maksimal 2MB</p>
                            <input class="form-control form-control-sm @error('logo') is-invalid @enderror" type="file"
                                name="logo" id="logo" onchange="previewLogo()">
                            @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card mb-3 p-3">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="oldTtd" value="{{ $data->ttd }}">
                            @if ($data->ttd)
                                <img src="{{ asset('storage/' . $data->ttd) }}"
                                    class="ttd-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @else
                                <img src="/assets/img/default_logo.png"
                                    class="ttd-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @endif
                        </div>
                        <div class="mb-0">
                            <p class="text-center font-outfit font-weight-bold text-sm mb-0">TTD/Stempel Desa</p>
                            <p class="text-center text-xs text-danger mb-4">Maksimal 2MB</p>
                            <input class="form-control form-control-sm @error('ttd') is-invalid @enderror" type="file"
                                name="ttd" id="ttd" onchange="previewTtd()">
                            @error('ttd')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card mb-3 p-3">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="oldBanner" value="{{ $data->banner }}">
                            @if ($data->banner)
                                <img src="{{ asset('storage/' . $data->banner) }}"
                                    class="banner-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @else
                                <img src="/assets/img/no-picture.webp"
                                    class="banner-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @endif
                        </div>
                        <div class="mb-0">
                            <p class="text-center font-outfit font-weight-bold text-sm mb-0">Banner Website</p>
                            <p class="text-center text-xs text-danger mb-4">Maksimal 2MB</p>
                            <input class="form-control form-control-sm @error('banner') is-invalid @enderror" type="file"
                                name="banner" id="banner" onchange="previewBanner()">
                            @error('banner')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-md-9 mb-3">
                    <div class="card p-3">
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama_desa" class="form-label text-sm opacity-6">Nama Desa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="nama_desa"
                                        id="nama_desa" value="{{ old('nama_desa', $data->nama_desa) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="kode_desa" class="form-label text-sm opacity-6">Kode Desa</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control form-control-sm" name="kode_desa"
                                        id="kode_desa" value="{{ old('kode_desa', $data->kode_desa) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="kodepos" class="form-label text-sm opacity-6">Kode Pos</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control form-control-sm" name="kodepos" id="kodepos"
                                        value="{{ old('kodepos', $data->kodepos) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama_kepala_desa" class="form-label text-sm opacity-6">Nama Kepala
                                        Desa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="nama_kepala_desa"
                                        id="nama_kepala_desa"
                                        value="{{ old('nama_kepala_desa', $data->nama_kepala_desa) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="niap_kepala_desa" class="form-label text-sm opacity-6">Nomor Induk Kepala
                                        Desa</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-sm" name="niap_kepala_desa"
                                        id="niap_kepala_desa"
                                        value="{{ old('niap_kepala_desa', $data->niap_kepala_desa) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="telepon_kepala_desa" class="form-label text-sm opacity-6">Telepon Kepala
                                        Desa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="telepon_kepala_desa"
                                        id="telepon_kepala_desa"
                                        value="{{ old('telepon_kepala_desa', $data->telepon_kepala_desa) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="alamat" class="form-label text-sm opacity-6">Alamat Kantor Desa
                                        Desa</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea name="alamat" id="alamat" cols="30" rows="5" class="form-control form-control-sm">{{ old('alamat', $data->alamat) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="telepon" class="form-label text-sm opacity-6">Telepon Kantor
                                        Desa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="telepon"
                                        id="telepon" value="{{ old('telepon', $data->telepon) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="email" class="form-label text-sm opacity-6">Email Desa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="email"
                                        id="email" value="{{ old('email', $data->email) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="website" class="form-label text-sm opacity-6">Website Desa</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="url" class="form-control form-control-sm" name="website"
                                        id="website" value="{{ old('website', $data->website) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label text-sm opacity-6">Koordinat Kantor
                                        Desa</label>
                                </div>
                                <div class="col-md-4">
                                    <label class="text-xs">Latitude <code>(Misal : -8.57122922)</code></label>
                                    <input type="text" class="form-control form-control-sm" name="lat"
                                        id="lat" value="{{ old('lat', $data->lat) }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="text-xs">Longitude <code>(Misal : 116.07578158)</code></label>
                                    <input type="text" class="form-control form-control-sm" name="lng"
                                        id="lng" value="{{ old('lng', $data->lng) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama_kecamatan" class="form-label text-sm opacity-6">Nama
                                        Kecamatan</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="nama_kecamatan"
                                        id="nama_kecamatan" value="{{ old('nama_kecamatan', $data->nama_kecamatan) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="kode_kecamatan" class="form-label text-sm opacity-6">Kode
                                        Kecamatan</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control form-control-sm" name="kode_kecamatan"
                                        id="kode_kecamatan" value="{{ old('kode_kecamatan', $data->kode_kecamatan) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama_kepala_camat" class="form-label text-sm opacity-6">Nama Camat</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="nama_kepala_camat"
                                        id="nama_kepala_camat"
                                        value="{{ old('nama_kepala_camat', $data->nama_kepala_camat) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nip_kepala_camat" class="form-label text-sm opacity-6">NIP Camat</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-sm" name="nip_kepala_camat"
                                        id="nip_kepala_camat"
                                        value="{{ old('nip_kepala_camat', $data->nip_kepala_camat) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nama_kecamatan" class="form-label text-sm opacity-6">Nama
                                        Kabupaten</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control form-control-sm" name="nama_kabupaten"
                                        id="nama_kabupaten" value="{{ old('nama_kabupaten', $data->nama_kabupaten) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="kode_kabupaten" class="form-label text-sm opacity-6">Kode
                                        Kabupaten</label>
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control form-control-sm" name="kode_kabupaten"
                                        id="kode_kabupaten" value="{{ old('kode_kabupaten', $data->kode_kabupaten) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="kode_kabupaten" class="form-label text-sm opacity-6">Provinsi</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control form-control-sm" id="provinsi_id" name="provinsi_id">
                                        <option value="">-- Pilih Provinsi --</option>
                                        @foreach ($provinsi as $item)
                                            @if (old('provinsi_id', $data->provinsi_id) == $item->id)
                                                <option value="{{ $item->id }}" selected>
                                                    {{ $item->nama }}
                                                </option>
                                            @else
                                                <option value="{{ $item->id }}"> {{ $item->nama }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary pull-right">Simpan</button>
                </div>
            </div>
        </form>
        <!-- /.card -->

    </section>

    <script>
        function previewLogo() {
            const logo = document.querySelector('#logo');
            const imgPreview = document.querySelector('.logo-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(logo.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(logo.files[0]);
            imgPreview.src = blob;
        }

        function previewTtd() {
            const ttd = document.querySelector('#ttd');
            const imgPreview = document.querySelector('.ttd-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(ttd.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(ttd.files[0]);
            imgPreview.src = blob;
        }

        function previewBanner() {
            const banner = document.querySelector('#banner');
            const imgPreview = document.querySelector('.banner-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(banner.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(banner.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
