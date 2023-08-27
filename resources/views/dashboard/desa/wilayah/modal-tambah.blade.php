<div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Tambah {{ $config->sebutan_dusun }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('desa/wilayah') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="name" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            {{ $config->sebutan_dusun }}</label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm"
                            placeholder="Tuliskan nama {{ $config->sebutan_dusun }}" value="{{ old('name') }}">
                    </div>
                    {{-- <div class="form-group mb-0">
                        <label for="penduduk_id" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            {{ $config->sebutan_kepala_dusun }}</label>
                        <input type="text" name="penduduk_id" id="penduduk_id" class="form-control form-control-sm"
                            placeholder="Tuliskan nama {{ $config->sebutan_kepala_dusun }}"
                            value="{{ old('penduduk_id') }}">
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
