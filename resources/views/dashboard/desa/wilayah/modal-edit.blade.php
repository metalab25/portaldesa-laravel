<div class="modal fade" id="edit{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $config->sebutan_dusun }} {{ $item->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('desa/wilayah/' . $item->id) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="name" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            {{ $config->sebutan_dusun }}</label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm"
                            placeholder="Tuliskan nama {{ $config->sebutan_dusun }}"
                            value="{{ old('name', $item->name) }}">
                    </div>
                    <div class="form-group mb-0">
                        <label for="penduduk_id" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            {{ $config->sebutan_kepala_dusun }}</label>
                        <input type="text" name="penduduk_id" id="penduduk_id" class="form-control form-control-sm"
                            placeholder="Tuliskan nama {{ $config->sebutan_kepala_dusun }}"
                            value="{{ old('penduduk_id') }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
