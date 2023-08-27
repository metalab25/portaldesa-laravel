<div class="modal fade" id="tambahKK" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="tambahKKLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahKKLabel">Tambah Data Keluarga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('adminduk/keluarga') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="no_kk" class="form-label text-sm">Nomor Kartu Keluarga</label>
                        <input type="text" name="no_kk" id="no_kk" class="form-control form-control-sm"
                            placeholder="Masukan nomor Kartu Keluarga..." value="{{ old('no_kk') }}">
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="wilayah_id" class="form-label text-sm">{{ $config->sebutan_dusun }}</label>
                                <select name="wilayah_id" id="wilayah_id" class="form-control form-control-sm">
                                    <option value="">-- Pilih {{ $config->sebutan_dusun }} --</option>
                                    @foreach ($cluster as $item)
                                        @if (old('wilayah_id') == $item->id)
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
                                        @if (old('rw_id') == $item->id)
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
                                        @if (old('rt_id') == $item->id)
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
                            placeholder="Alamat...">{{ old('alamat') }}</textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label for="sosial_id" class="form-label text-sm">Kelas Sosial</label>
                        <select name="sosial_id" id="sosial_id" class="form-control form-control-sm">
                            <option value="">-- Pilih Kelas Sosial --</option>
                            @foreach ($sosials as $item)
                                @if (old('sosial_id') == $item->id)
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
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
