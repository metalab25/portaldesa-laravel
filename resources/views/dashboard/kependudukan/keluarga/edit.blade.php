@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('keluarga') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <form action="{{ url('adminduk/keluarga/' . $keluarga->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="card">
                <div class="card-header border-bottom-1 pb-2">
                    <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Ubah Data kartu Keluarga</h6>
                </div>
                <div class="card-body p-3">
                    <div class="form-group mb-2">
                        <label for="no_kk" class="form-label text-sm">Nomor Kartu Keluarga</label>
                        <input type="text" name="no_kk" id="no_kk" class="form-control form-control-sm"
                            placeholder="Masukan nomor Kartu Keluarga..." value="{{ old('no_kk', $keluarga->no_kk) }}">
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="wilayah_id" class="form-label text-sm">{{ $config->sebutan_dusun }}</label>
                                <select name="wilayah_id" id="wilayah_id" class="form-control form-control-sm">
                                    <option value="">-- Pilih {{ $config->sebutan_dusun }} --</option>
                                    @foreach ($cluster as $item)
                                        @if (old('wilayah_id', $keluarga->wilayah_id) == $item->id)
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
                                <label for="rw_id" class="form-label text-sm">RW</label>
                                <select name="rw_id" id="rw_id" class="form-control form-control-sm">
                                    <option value="">-- Pilih RW --</option>
                                    @foreach ($rws as $item)
                                        @if (old('rw_id', $keluarga->rw_id) == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->rw }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}"> {{ $item->rw }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label for="sosial_id" class="form-label text-sm">RT</label>
                                <select name="rt_id" id="rt_id" class="form-control form-control-sm">
                                    <option value="">-- Pilih RT --</option>
                                    @foreach ($rts as $item)
                                        @if (old('rt_id', $keluarga->rt_id) == $item->id)
                                            <option value="{{ $item->id }}" selected>
                                                {{ $item->rt }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->rt }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label for="alamat" class="form-label text-sm">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control form-control-sm"
                            placeholder="Alamat...">{{ old('alamat', $keluarga->alamat) }}</textarea>
                    </div>
                    <div class="form-group mb-0">
                        <label for="penduduk_id" class="form-label text-sm">Kepala Keluarga</label>
                        <select name="penduduk_id" id="penduduk_id" class="form-control form-control-sm">
                            <option value="">-- Pilih Kepala Keluarga --</option>
                            @foreach ($kepala_keluarga as $item)
                                @if (old('penduduk_id', $keluarga->penduduk_id) == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        NIK : {{ $item->nik }} - {{ $item->nama }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">NIK : {{ $item->nik }} - {{ $item->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-2">
                        <label for="sosial_id" class="form-label text-sm">Kelas Sosial</label>
                        <select name="sosial_id" id="sosial_id" class="form-control form-control-sm">
                            <option value="">-- Pilih Kelas Sosial --</option>
                            @foreach ($sosials as $item)
                                @if (old('sosial_id', $keluarga->sosial_id) == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->name }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <a href="{{ url('adminduk/keluarga') }}" class="btn btn-sm btn-danger">Kembali</a>
            <button type="submit" class="btn btn-sm btn-primary pull-right">Simpan</button>
        </form>
        <!-- /.card -->

    </section>
@endsection
