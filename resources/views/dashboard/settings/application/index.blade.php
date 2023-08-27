@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('application') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="{{ url('setting/application/' . $config->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" id="id" value="{{ $config->id }}">
            <div class="row">
                <div class="col-xl-3 col-md-3">
                    <div class="card mb-3 p-3">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="oldBackground" value="{{ $config->background }}">
                            @if ($config->background !== null)
                                <img src="{{ asset('storage/' . $config->background) }}"
                                    class="background-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @else
                                <img src="/assets/img/no-picture.webp"
                                    class="background-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @endif
                        </div>
                        <div class="mb-0">
                            <p class="text-center font-outfit font-weight-bold text-sm mb-0">Background Login Page</p>
                            <p class="text-center text-xs text-danger mb-4">Maksimal 2MB</p>
                            <input class="form-control form-control-sm @error('banner') is-invalid @enderror" type="file"
                                name="background" id="background" onchange="previewBackground()">
                            @error('background')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="card mb-3 p-3">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="oldBanner" value="{{ $config->banner }}">
                            @if ($config->banner !== null)
                                <img src="{{ asset('storage/' . $config->banner) }}"
                                    class="banner-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @else
                                <img src="/assets/img/no-picture.webp"
                                    class="banner-preview img-rounded img-fluid d-block mx-auto mb-2">
                            @endif
                        </div>
                        <div class="mb-0">
                            <p class="text-center font-outfit font-weight-bold text-sm mb-0">Banner Admin Login Form</p>
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
                                    <label for="nama_desa" class="form-label text-sm opacity-6">Nama Aplikasi</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="nama_aplikasi"
                                        id="nama_aplikasi" value="{{ old('nama_aplikasi', $config->nama_aplikasi) }}"
                                        readonly>
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Nama
                                        aplikasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="admin_title" class="form-label text-sm opacity-6">Admin Title</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="admin_title"
                                        id="admin_title" value="{{ old('admin_title', $config->admin_title) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Judul tab
                                        browser modul administrasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="login_title" class="form-label text-sm opacity-6">Login Title</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="login_title"
                                        id="login_title" value="{{ old('login_title', $config->login_title) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Judul tab
                                        browser halaman login modul administrasi</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="website_title" class="form-label text-sm opacity-6">Website Title</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="website_title"
                                        id="website_title" value="{{ old('website_title', $config->website_title) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Judul tab
                                        browser halaman website</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sebutan_kabupaten" class="form-label text-sm opacity-6">Sebutan
                                        Kabupaten</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="sebutan_kabupaten"
                                        id="sebutan_kabupaten"
                                        value="{{ old('sebutan_kabupaten', $config->sebutan_kabupaten) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengganti
                                        sebutan wilayah kabupaten</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="singkatan_kabupaten" class="form-label text-sm opacity-6">Singkatan
                                        Kabupaten</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="singkatan_kabupaten"
                                        id="singkatan_kabupaten"
                                        value="{{ old('singkatan_kabupaten', $config->singkatan_kabupaten) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengganti
                                        singkatan wilayah kabupaten</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sebutan_kecamatan" class="form-label text-sm opacity-6">Sebutan
                                        Kecamatan</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="sebutan_kecamatan"
                                        id="sebutan_kecamatan"
                                        value="{{ old('sebutan_kecamatan', $config->sebutan_kecamatan) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengganti
                                        sebutan wilayah kecamatan</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="singkatan_kecamatan" class="form-label text-sm opacity-6">Singkatan
                                        Kecamatan</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="singkatan_kecamatan"
                                        id="singkatan_kecamatan"
                                        value="{{ old('singkatan_kecamatan', $config->singkatan_kecamatan) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengganti
                                        singkatan wilayah kecamatan</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sebutan_kepala_kecamatan" class="form-label text-sm opacity-6">Sebutan
                                        Camat</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm"
                                        name="sebutan_kepala_kecamatan" id="sebutan_kepala_kecamatan"
                                        value="{{ old('sebutan_kepala_kecamatan', $config->sebutan_kepala_kecamatan) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengganti
                                        sebutan pimpinan kecamatan</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sebutan_desa" class="form-label text-sm opacity-6">Sebutan
                                        Desa</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="sebutan_desa"
                                        id="sebutan_desa" value="{{ old('sebutan_desa', $config->sebutan_desa) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengganti
                                        sebutan wilayah desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sebutan_kepala_desa" class="form-label text-sm opacity-6">Sebutan Kepala
                                        Desa</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="sebutan_kepala_desa"
                                        id="sebutan_kepala_desa"
                                        value="{{ old('sebutan_kepala_desa', $config->sebutan_kepala_desa) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengganti
                                        sebutan Kepala Desa</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sebutan_dusun" class="form-label text-sm opacity-6">Sebutan
                                        Dusun</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="sebutan_dusun"
                                        id="sebutan_dusun" value="{{ old('sebutan_dusun', $config->sebutan_dusun) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengganti
                                        sebutan wilayah dusun</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sebutan_kepala_dusun" class="form-label text-sm opacity-6">Sebutan
                                        Kepala Dusun</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm"
                                        name="sebutan_kepala_dusun" id="sebutan_kepala_dusun"
                                        value="{{ old('sebutan_kepala_dusun', $config->sebutan_kepala_dusun) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengganti
                                        sebutan kepala dusun</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="format_nomor_surat" class="form-label text-sm opacity-6">Format Penomoran
                                        Surat</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="format_nomor_surat"
                                        id="format_nomor_surat"
                                        value="{{ old('format_nomor_surat', $config->format_nomor_surat) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Fomat
                                        penomoran surat</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="artikel_per_page" class="form-label text-sm opacity-6">Artikel Per
                                        Halaman</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="artikel_per_page"
                                        id="artikel_per_page"
                                        value="{{ old('artikel_per_page', $config->artikel_per_page) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Jumlah
                                        artikel dalam satu halaman</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="timezone" class="form-label text-sm opacity-6">Zona Waktu</label>
                                </div>
                                <div class="col-md-4">
                                    <select class="form-control form-control-sm" name="timezone">
                                        @if ($config->timezone == 'Asia/Jakarta')
                                            <option value="Asia/Jakarta" selected>
                                                Asia/Jakarta</option>
                                        @elseif($config->timezone == 'Asia/Makassar')
                                            <option value="Asia/Makassar" selected>
                                                Asia/Makassar</option>
                                        @elseif($config->timezone == 'Asia/Jayapura')
                                            <option value="Asia/Jayapura" selected>
                                                Asia/Jayapura</option>
                                        @endif
                                    </select>
                                    {{-- <input type="text" class="form-control form-control-sm" name="timezone"
                                        id="timezone" value="{{ old('timezone', $config->timezone) }}"> --}}
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengaturan
                                        zona waktu</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="current_version" class="form-label text-sm opacity-6">Versi
                                        Aplikasi</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="current_version"
                                        id="current_version"
                                        value="{{ old('current_version', $config->current_version) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Versi
                                        aplikasi yang berjalan</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="copyright_desa" class="form-label text-sm opacity-6">Copyright
                                        Desa</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control form-control-sm" name="copyright_desa"
                                        id="copyright_desa" value="{{ old('copyright_desa', $config->copyright_desa) }}">
                                </div>
                                <div class="col-md-4">
                                    <p class="text-sm align-items-center mb-0 pt-1 font-outfit font-weight-500">Pengaturan
                                        Copyright website</p>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" class="form-control form-control-sm" name="footer_aplikasi"
                            id="footer_aplikasi" value="{{ old('footer_aplikasi', $config->footer_aplikasi) }}">
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary pull-right">Simpan</button>
                </div>
            </div>
        </form>
        <!-- /.card -->

    </section>

    <script>
        function previewBackground() {
            const background = document.querySelector('#background');
            const imgPreview = document.querySelector('.background-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(background.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(background.files[0]);
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
