<div class="modal fade" id="tambahRW" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="tambahRWLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahRWLabel">Tambah RW</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('wilayah/rw') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="wilayah_id" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            {{ $config->sebutan_dusun }}</label>
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
                    <div class="form-group mb-2">
                        <label for="rw" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nomor
                            RW (Rukun Warga)</label>
                        <input type="text" name="rw" id="rw" class="form-control form-control-sm"
                            placeholder="Tuliskan nomor RW" value="{{ old('rw') }}">
                    </div>
                    <div class="form-group mb-0">
                        <label for="penduduk_id" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            Ketua RW</label>
                        <input type="text" name="penduduk_id" id="penduduk_id" class="form-control form-control-sm"
                            placeholder="Tuliskan nama Ketua RW" value="{{ old('penduduk_id') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
