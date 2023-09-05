@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('surat_keluar') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('sekretariat/surat_keluar') }}" method="POST" enctype="multipart/form-data">
            <div class="card p-3">
                @csrf
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="ajaxklasifikasi" class="form-label text-sm align-middle opacity-8">Klasifikasi
                            Surat</label>
                    </div>
                    <div class="col-md-8">
                        <select name="klasifikasi_surat_id" id="ajaxklasifikasi" class="form-control form-control-sm">
                        </select>
                        @error('klasifikasi_surat_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="nomor_urut" class="form-label text-sm align-middle opacity-8">Nomor Urut</label>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="nomor_urut" id="nomor_urut" class="form-control form-control-sm"
                            value="{{ $nomor_urut }}" readonly>
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="nomor_surat" class="form-label text-sm align-middle opacity-8">Nomor Surat</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="nomor_surat" id="nomor_surat"
                            class="form-control form-control-sm @error('nomor_surat') is-invalid @enderror"
                            value="{{ old('nomor_surat') }}" placeholder="Tuliskan nomor surat">
                        @error('nomor_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="tanggal_surat" class="form-label text-sm align-middle opacity-8">Tanggal Surat</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="tanggal_surat" id="tanggal_surat"
                            class="form-control form-control-sm @error('nomor_surat') is-invalid @enderror"
                            value="{{ old('nomor_surat') }}">
                        @error('nomor_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="tujuan" class="form-label text-sm align-middle opacity-8">Tujuan</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="tujuan" id="tujuan"
                            class="form-control form-control-sm @error('tujuan') is-invalid @enderror"
                            value="{{ old('tujuan') }}" placeholder="Tuliskan tujuan surat">
                        @error('tujuan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="attach" class="form-label text-sm align-middle opacity-8">Berkas Scan Surat
                            Keluar</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control form-control-sm @error('attach') is-invalid @enderror" type="file"
                            name="attach" id="attach">
                        <code class="text-center text-xs">(Kosongkan jika tidak ingin mengubah berkas)</code>
                        @error('attach')
                            <div class="invalid-feedback text-center">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="attach" class="form-label text-sm align-middle opacity-8">Uraian Singkat
                            Surat</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="short_desc" id="short_desc" cols="30" rows="5" class="form-control form-control-sm"
                            placeholder="Isikan uraian singkat surat">{{ old('tujuan') }}</textarea>
                    </div>
                </div>
            </div>
            <a href="{{ url('sekretariat/surat_keluar') }}" class="btn btn-sm btn-danger text-sm">Batal</a>
            <button type="submit" class="btn btn-sm btn-primary text-sm pull-right">Simpan</button>
        </form>
        <!-- /.card -->
    </section>
    <script>
        $(document).ready(function() {
            $('#ajaxklasifikasi').on('select2:open', function() {
                $('.select2-search--dropdown .select2-search__field').attr('placeholder',
                    'Ketik kode klasifikasi surat...');
            });
            $("#ajaxklasifikasi").select2({
                placeholder: '-- Pilih Klasifikasi Surat --',
                ajax: {
                    url: "{{ url('get_klasifikasi') }}",
                    delay: 250,
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: [
                                        item.kode + ' - ' + item.nama
                                    ]
                                }
                            })
                        }
                    }

                }
            });
        });
    </script>
@endsection
