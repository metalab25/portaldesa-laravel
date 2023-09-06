@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('perdes') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('sekretariat/perdes') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="doc_type_id" value="3">
            <div class="card p-3">
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="name" class="form-label text-sm opacity-8">Nama Peraturan
                            {{ $config->sebutan_desa }}</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                            name="name" id="name" placeholder="Nama Dokumen" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <input type="hidden" name="slug" id="slug" class="form-control form-control-sm"
                        value="{{ old('slug') }}">
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="attach" class="form-label text-sm opacity-8">Unggah Dokumen</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control form-control-sm @error('attach') is-invalid @enderror" type="file"
                            name="attach" id="attach">
                        <code class="text-danger text-xxs">(Tipe dokumen PDF, maksimal besar berkas
                            4Mb)</code>
                        @error('attach')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="short_desc" class="form-label text-sm opacity-8">Uraian Singkat</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm" name="short_desc" id="short_desc"
                            placeholder="Uraian Singkat Peraturan" value="{{ old('short_desc') }}">
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="jenis" class="form-label text-sm opacity-8">Jenis Peraturan</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm @error('jenis') is-invalid @enderror"
                            name="jenis" id="jenis" placeholder="Jenis Peraturan" value="{{ old('jenis') }}">
                        @error('jenis')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="no_tetapan" class="form-label text-sm opacity-8">Nomor Ditetapkan Peraturan</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm @error('no_tetapan') is-invalid @enderror"
                            name="no_tetapan" id="no_tetapan" placeholder="Nomor Ditetapkan Peraturan"
                            value="{{ old('no_tetapan') }}">
                        @error('no_tetapan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="tgl_tetapan" class="form-label text-sm opacity-8">Tanggal Ditetapkan Peraturan</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date"
                            class="form-control form-control-sm @error('tgl_tetapan') is-invalid @enderror"
                            name="tgl_tetapan" id="tgl_tetapan" value="{{ old('tgl_tetapan') }}">
                        @error('tgl_tetapan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="tgl_sepakat" class="form-label text-sm opacity-8">Tanggal Kesepakatan Peraturan</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date"
                            class="form-control form-control-sm @error('tgl_sepakat') is-invalid @enderror"
                            name="tgl_sepakat" id="tgl_sepakat" value="{{ old('tgl_sepakat') }}">
                        @error('tgl_sepakat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="no_laporkan" class="form-label text-sm opacity-8">Nomor Dilaporkan</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text"
                            class="form-control form-control-sm @error('no_laporkan') is-invalid @enderror"
                            name="no_laporkan" id="no_laporkan" value="{{ old('no_laporkan') }}"
                            placeholder="Nomor dilaporkan">
                        @error('no_laporkan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="tgl_laporkan" class="form-label text-sm opacity-8">Tanggal Dilaporkan</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date"
                            class="form-control form-control-sm @error('tgl_laporkan') is-invalid @enderror"
                            name="tgl_laporkan" id="tgl_laporkan" value="{{ old('tgl_laporkan') }}">
                        @error('tgl_laporkan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="no_lembaran_diundangkan" class="form-label text-sm opacity-8">Nomor Diundangkan Dalam
                            Lembaran {{ $config->sebutan_desa }}</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text"
                            class="form-control form-control-sm @error('no_lembaran_diundangkan') is-invalid @enderror"
                            name="no_lembaran_diundangkan" id="no_lembaran_diundangkan"
                            value="{{ old('no_lembaran_diundangkan') }}" placeholder="Nomor Diundangkan Dalam Lembaran">
                        @error('no_lembaran_diundangkan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="tgl_lembaran_diundangkan" class="form-label text-sm opacity-8">Tanggal Diundangkan
                            Dalam Lembaran {{ $config->sebutan_desa }}</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date"
                            class="form-control form-control-sm @error('tgl_lembaran_diundangkan') is-invalid @enderror"
                            name="tgl_lembaran_diundangkan" id="tgl_lembaran_diundangkan"
                            value="{{ old('tgl_lembaran_diundangkan') }}">
                        @error('tgl_lembaran_diundangkan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="no_berita_diundangkan" class="form-label text-sm opacity-8">Nomor Diundangkan Dalam
                            Berita {{ $config->sebutan_desa }}</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text"
                            class="form-control form-control-sm @error('no_berita_diundangkan') is-invalid @enderror"
                            name="no_berita_diundangkan" id="no_berita_diundangkan"
                            value="{{ old('no_berita_diundangkan') }}" placeholder="Nomor Diundangkan Dalam Berita">
                        @error('no_berita_diundangkan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="tgl_berita_diundangkan" class="form-label text-sm opacity-8">Tanggal Diundangkan
                            Dalam Berita {{ $config->sebutan_desa }}</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date"
                            class="form-control form-control-sm @error('tgl_berita_diundangkan') is-invalid @enderror"
                            name="tgl_berita_diundangkan" id="tgl_berita_diundangkan"
                            value="{{ old('tgl_berita_diundangkan') }}">
                        @error('tgl_berita_diundangkan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <a href="{{ url('sekretariat/perdes') }}" class="btn btn-danger btn-sm">Batal</a>
            <button type="submit" class="btn btn-primary btn-sm pull-right mb-3">Simpan</button>
        </form>
    </section>
    <script>
        const name = document.querySelector("#name");
        const slug = document.querySelector("#slug");

        name.addEventListener("keyup", function() {
            let preslug = name.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });
    </script>
@endsection
