<div class="modal fade" id="tambah" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('webmin/categories') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="name" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            Kategori</label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm"
                            placeholder="Tuliskan nama kategori" value="{{ old('name') }}">
                        <input type="hidden" class="form-control form-control-sm" id="slug" name="slug">
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

    title.addEventListener("keyup", function() {
        let preslug = title.value;
        preslug = preslug.replace(/ /g, "-");
        slug.value = preslug.toLowerCase();
    });
</script>
