<div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Unggah Dokumen Publik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('webmin/documents') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="doc_type_id" value="2">
                    <div class="form-group mb-2">
                        <label for="name" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            Dokumen Publik</label>
                        <input type="text" name="name" id="name"
                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                            placeholder="Tuliskan nama dokumen" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                        <input type="hidden" name="slug" id="slug" class="form-control form-control-sm"
                            value="{{ old('slug') }}">
                    </div>
                    <div class="form-group mb-0">
                        <label for="slug" class="form-label text-sm font-outfit font-weight-bold opacity-8">Unggah
                            Dokumen <code class="text-danger">(Tipe dokumen PDF, maksimal besar berkas
                                4Mb)</code></label>
                        <input class="form-control form-control-sm @error('attach') is-invalid @enderror" type="file"
                            name="attach" id="attach">
                        @error('attach')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    name.addEventListener("keyup", function() {
        let preslug = name.value;
        preslug = preslug.replace(/ /g, "-");
        slug.value = preslug.toLowerCase();
    });
</script>
