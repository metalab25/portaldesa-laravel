@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('surat_masuk') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('sekretariat/surat_masuk') }}" method="POST" enctype="multipart/form-data">
            <div class="card p-3">
                @csrf
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="tanggal_penerimaan" class="form-label text-sm align-middle opacity-8">Tanggal
                            Penerimaan</label>
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="tanggal_penerimaan" id="tanggal_penerimaan"
                            class="form-control form-control-sm @error('tanggal_penerimaan') is-invalid @enderror"
                            value="{{ old('tanggal_penerimaan') }}">
                        @error('tanggal_penerimaan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
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
                            class="form-control form-control-sm @error('tanggal_surat') is-invalid @enderror"
                            value="{{ old('tanggal_surat') }}">
                        @error('tanggal_surat')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="pengirim" class="form-label text-sm align-middle opacity-8">Pengirim</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" name="pengirim" id="pengirim"
                            class="form-control form-control-sm @error('pengirim') is-invalid @enderror"
                            value="{{ old('pengirim') }}" placeholder="Tuliskan pengirim surat">
                        @error('pengirim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="attach" class="form-label text-sm align-middle opacity-8">Berkas Scan Surat
                            Masuk</label>
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
                        <label for="perihal_surat" class="form-label text-sm align-middle opacity-8">Perihal Surat</label>
                    </div>
                    <div class="col-md-8">
                        <input name="perihal_surat" id="perihal_surat" cols="30" rows="5"
                            class="form-control form-control-sm" placeholder="Isikan perihal surat"
                            value="{{ old('perihal_surat') }}">
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="pamong_id" class="form-label text-sm align-middle opacity-8">Disposisi</label>
                    </div>
                    <div class="col-md-8">
                        <select name="pamong_id" id="pamong_id"
                            class="form-control form-control-sm @error('pamong_id') is-invalid @enderror">
                            <option value="">-- Pilih Disposisi --</option>
                            @foreach ($pamong as $item)
                                @if (old('pamong_id') == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->jabatan }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}"> {{ $item->jabatan }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row form-group mb-2">
                    <div class="col-md-3">
                        <label for="isi_disposisi" class="form-label text-sm align-middle opacity-8">Isi Disposisi</label>
                    </div>
                    <div class="col-md-8">
                        <textarea name="isi_disposisi" id="isi_disposisi" cols="30" rows="5"
                            class="form-control form-control-sm" placeholder="Tuliskan isi disposisi surat">{{ old('isi_disposisi') }}</textarea>
                    </div>
                </div>
            </div>
            <a href="{{ url('sekretariat/surat_masuk') }}" class="btn btn-sm btn-danger text-sm">Batal</a>
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
