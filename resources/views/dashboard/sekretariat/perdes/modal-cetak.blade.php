<div class="modal fade" id="cetak" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="cetakLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title opacity-8" id="cetakLabel">Cetak Buku Peraturan {{ $config->sebutan_desa }}</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('webmin/documents') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="doc_type_id" value="2">
                    <div class="form-group mb-2">
                        <label for="tahun" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            Tahun Laporan</label>
                        <select name="tahun" id="tahun" class="form-control form-control-sm">
                            <option value="">-- Pilih Tahun Laporan --</option>
                            @foreach ($years as $item)
                                @if (old('tahun') == $item->id)
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
                    <div class="form-group mb-0">
                        <label for="penandatangan"
                            class="form-label text-sm font-outfit font-weight-bold opacity-8">Pamong
                            Penandatangan</label>
                        <select name="penandatangan" id="penandatangan" class="form-control form-control-sm">
                            <option value="">-- Pilih pamong Penandatangan --</option>
                            @foreach ($pamong as $item)
                                @if (old('penandatangan') == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->penduduk->nama }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}"> {{ $item->penduduk->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-0">
                        <label for="mengetahui" class="form-label text-sm font-outfit font-weight-bold opacity-8">Pamong
                            Mengetahui</label>
                        <select name="mengetahui" id="mengetahui" class="form-control form-control-sm">
                            <option value="">-- Pilih Pamong Mengetahui --</option>
                            @foreach ($pamong as $item)
                                @if (old('mengetahui') == $item->id)
                                    <option value="{{ $item->id }}" selected>
                                        {{ $item->penduduk->nama }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}"> {{ $item->penduduk->nama }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
