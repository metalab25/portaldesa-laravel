<div class="modal fade" id="edit{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">Edit Kategori {{ $item->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('webmin/categories/' . $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label for="name" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                            Kategori</label>
                        <input type="text" name="name" id="name" class="form-control form-control-sm"
                            placeholder="Tuliskan nama kategori" value="{{ old('name', $item->name) }}">
                        <input type="hidden" class="form-control form-control-sm" id="slug" name="slug">
                    </div>
                    <div class="form-group mb-0">
                        <label for="slug"
                            class="form-label text-sm font-outfit font-weight-bold opacity-8">Slug</label>
                        <input type="text" name="slug" id="slug" class="form-control form-control-sm"
                            placeholder="Tuliskan slug kategori" value="{{ old('slug', $item->slug) }}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
