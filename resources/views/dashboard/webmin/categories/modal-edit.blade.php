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
                        <input type="text" name="name" id="name"
                            class="form-control form-control-sm @error('name') is-invalid @enderror"
                            placeholder="Tuliskan nama kategori" value="{{ old('name', $item->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="slug"
                            class="form-label text-sm font-outfit font-weight-bold opacity-8">Slug</label>
                        <input type="text" name="slug" id="slug"
                            class="form-control form-control-sm @error('slug') is-invalid @enderror"
                            placeholder="Tuliskan slug kategori" value="{{ old('slug', $item->slug) }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label for="category_type_id"
                            class="form-label text-sm font-outfit font-weight-bold opacity-8">Tipe
                            Kategori</label>
                        <select name="category_type_id" id="category_type_id"
                            class="form-control form-control-sm @error('category_type_id') is-invalid @enderror">
                            <option value="">-- Pilih Tipe Kategori --</option>
                            @foreach ($types as $item)
                                @if (old('category_type_id', $item->category_type_id) == $item->id)
                                    <option value="{{ $item->id }}" selected> Kategori {{ $item->name }}
                                    </option>
                                @else
                                    <option value="{{ $item->id }}"> Kategori {{ $item->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        @error('category_type_id')
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
