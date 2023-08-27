<div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Tambah RW</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('wilayah/rt') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="rw_id" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nomor
                            Rukun Warga (RW)</label>
                        <select name="rw_id" id="rw_id" class="form-control form-control-sm">
                            <option value="">-- Pilih Rukun Warga (RW) --</option>
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
                    <div class="form-group mb-2">
                        <label for="rt" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nomor
                            RT (Rukun Tetangga)</label>
                        <input type="text" name="rt" id="rt" class="form-control form-control-sm"
                            placeholder="Tuliskan nomor rt" value="{{ old('rt') }}">
                    </div>
                    <div class="form-group mb-0">
                        <label for="penduduk_id" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            Ketua RT</label>
                        <input type="text" name="penduduk_id" id="penduduk_id" class="form-control form-control-sm"
                            placeholder="Tuliskan nama Ketua RWT" value="{{ old('penduduk_id') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
