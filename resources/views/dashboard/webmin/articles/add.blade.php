@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('article') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('webmin/article/') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xl-9 col-md-9">
                    <div class="card p-3">
                        <div class="form-group mb-2">
                            <label for="title" class="form-label text-sm opacity-8">Judul</label>
                            <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror"
                                name="title" id="title" placeholder="Tulis judul artikel...">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="hidden" class="form-control form-control-sm" id="slug" name="slug">
                        </div>
                        <div class="form-group mb-0">
                            <label for="body" class="form-label text-sm opacity-8">Isi Artikel</label>
                            <textarea id="body" name="body" class="form-control block w-full mt-1 @error('isi') is-invalid @enderror">{{ old('isi') }}</textarea>
                            @error('isi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <div class="card p-3">
                                <div class="form-group mb-0">
                                    <div class="d-flex justify-content-center">
                                        <img src="/assets/img/no-picture.webp"
                                            class="image1-preview img-rounded img-fluid d-block mx-auto mb-2">
                                    </div>
                                    <div class="mb-0">
                                        <p class="text-center font-outfit font-weight-bold text-sm mb-0">Gambar Tambahan</p>
                                        <p class="text-center text-xs text-danger mb-2">Maksimal 2MB, 800 pixel x 450 pixel
                                        </p>
                                        <input
                                            class="form-control form-control-sm @error('image1') is-invalid @enderror mb-2"
                                            type="file" name="image1" id="image1" onchange="previewImage1()">
                                        @error('image1')
                                            <div class="invalid-feedback text-center">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="text" class="form-control form-control-sm" id="caption_image1"
                                            name="caption_image1" placeholder="Caption Gambar Tambahan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="card p-3">
                                <div class="form-group mb-0">
                                    <div class="d-flex justify-content-center">
                                        <img src="/assets/img/no-picture.webp"
                                            class="image2-preview img-rounded img-fluid d-block mx-auto mb-2">
                                    </div>
                                    <div class="mb-0">
                                        <p class="text-center font-outfit font-weight-bold text-sm mb-0">Gambar Tambahan
                                        </p>
                                        <p class="text-center text-xs text-danger mb-2">Maksimal 2MB, 800 pixel x 450 pixel
                                        </p>
                                        <input
                                            class="form-control form-control-sm @error('image2') is-invalid @enderror mb-2"
                                            type="file" name="image2" id="image2" onchange="previewImage2()">
                                        @error('image2')
                                            <div class="invalid-feedback text-center">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="text" class="form-control form-control-sm" id="caption_image2"
                                            name="caption_image2" placeholder="Caption Gambar Tambahan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <div class="card p-3">
                                <div class="form-group mb-0">
                                    <div class="d-flex justify-content-center">
                                        <img src="/assets/img/no-picture.webp"
                                            class="image3-preview img-rounded img-fluid d-block mx-auto mb-2">
                                    </div>
                                    <div class="mb-0">
                                        <p class="text-center font-outfit font-weight-bold text-sm mb-0">Gambar Tambahan
                                        </p>
                                        <p class="text-center text-xs text-danger mb-2">Maksimal 2MB, 800 pixel x 450 pixel
                                        </p>
                                        <input
                                            class="form-control form-control-sm @error('image3') is-invalid @enderror mb-2"
                                            type="file" name="image3" id="image3" onchange="previewImage3()">
                                        @error('image3')
                                            <div class="invalid-feedback text-center">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                        <input type="text" class="form-control form-control-sm" id="caption_image3"
                                            name="caption_image3" placeholder="Caption Gambar Tambahan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="card p-3">
                        <div class="form-group mb-2">
                            <label for="category_id" class="form-label text-sm opacity-8">Kategori Artikel</label>
                            <select name="category_id" id="category_id"
                                class="form-control form-control-sm @error('category_id') is-invalid @enderror">
                                <option value="">-- Pilih Kategori Artikel --</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="link_embed" class="form-label text-sm opacity-8">Link Embed</label>
                            <input type="text" class="form-control form-control-sm" name="link_embed" id="link_embed"
                                placeholder="Tulis judul artikel...">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header px-3 pb-1">
                            <h5 class="card-title text-sm font-outfit font-weight-500 opacity-8">Gambar Artikel</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body px-3 pt-0">
                            <div class="form-group mb-0">
                                <div class="d-flex justify-content-center">
                                    <img src="/assets/img/no-picture.webp"
                                        class="image-preview img-rounded img-fluid d-block mx-auto mb-2">
                                </div>
                                <div class="mb-0">
                                    <p class="text-center font-outfit font-weight-bold text-sm mb-0">Gambar Utama</p>
                                    <p class="text-center text-xs text-danger mb-2">Maksimal 2MB, 800 pixel x 450 pixel</p>
                                    <input class="form-control form-control-sm @error('image') is-invalid @enderror mb-2"
                                        type="file" name="image" id="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback text-center">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <input type="text" class="form-control form-control-sm" id="caption_image"
                                        name="caption_image" placeholder="Caption Gambar Utama">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header px-3 pb-0">
                            <h5 class="card-title text-sm font-outfit font-weight-500 opacity-8">Pengaturan Lain</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                    title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body px-3 pt-0">
                            <div class="form-group mb-2">
                                <label for="link_embed" class="form-label text-sm opacity-8">Link Embed</label>
                                <input type="url" class="form-control form-control-sm" name="link_embed"
                                    id="link_embed"
                                    placeholder="Contoh : https://youtu.be/HR_Piu6qtoI?si=vehl5oEUlotpJxqu">
                            </div>
                            <div class="form-group mb-2">
                                <label for="sumber_berita" class="form-label text-sm opacity-8">Sumber Berita</label>
                                <input type="text" class="form-control form-control-sm" name="sumber_berita"
                                    id="sumber_berita" placeholder="Contoh : Detik">
                            </div>
                            <div class="form-group mb-2">
                                <label for="link_sumber_berita" class="form-label text-sm opacity-8">Link Sumber</label>
                                <input type="url" class="form-control form-control-sm" name="link_sumber_berita"
                                    id="link_sumber_berita"
                                    placeholder="Contoh : https://youtu.be/HR_Piu6qtoI?si=vehl5oEUlotpJxqu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- CK Editor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        CKEDITOR.ClassicEditor.create(document.getElementById("body"), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|', 'fontSize', 'fontFamily', 'fontColor',
                    'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'outdent', 'indent', 'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                    'undo', 'redo',
                    '-',
                    'codeBlock',
                    '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                    'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            },
            list: {
                properties: {
                    styles: true,
                    startIndex: true,
                    reversed: true
                }
            },
            heading: {
                options: [{
                        model: 'paragraph',
                        title: 'Paragraph',
                        class: 'ck-heading_paragraph'
                    },
                    {
                        model: 'heading1',
                        view: 'h1',
                        title: 'Heading 1',
                        class: 'ck-heading_heading1'
                    },
                    {
                        model: 'heading2',
                        view: 'h2',
                        title: 'Heading 2',
                        class: 'ck-heading_heading2'
                    },
                    {
                        model: 'heading3',
                        view: 'h3',
                        title: 'Heading 3',
                        class: 'ck-heading_heading3'
                    },
                    {
                        model: 'heading4',
                        view: 'h4',
                        title: 'Heading 4',
                        class: 'ck-heading_heading4'
                    },
                    {
                        model: 'heading5',
                        view: 'h5',
                        title: 'Heading 5',
                        class: 'ck-heading_heading5'
                    },
                    {
                        model: 'heading6',
                        view: 'h6',
                        title: 'Heading 6',
                        class: 'ck-heading_heading6'
                    }
                ]
            },
            placeholder: 'Tuliskan isi artikel...',
            fontFamily: {
                options: [
                    'default',
                    'Arial, Helvetica, sans-serif',
                    'Courier New, Courier, monospace',
                    'Georgia, serif',
                    'Lucida Sans Unicode, Lucida Grande, sans-serif',
                    'Tahoma, Geneva, sans-serif',
                    'Times New Roman, Times, serif',
                    'Trebuchet MS, Helvetica, sans-serif',
                    'Verdana, Geneva, sans-serif'
                ],
                supportAllValues: true
            },
            fontSize: {
                options: [10, 12, 14, 'default', 18, 20, 22],
                supportAllValues: true
            },
            htmlSupport: {
                allow: [{
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }]
            },
            htmlEmbed: {
                showPreviews: true
            },
            link: {
                decorators: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    toggleDownloadable: {
                        mode: 'manual',
                        label: 'Downloadable',
                        attributes: {
                            download: 'file'
                        }
                    }
                }
            },
            mention: {
                feeds: [{
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes',
                        '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread',
                        '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding',
                        '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }]
            },
            removePlugins: [
                'CKBox',
                'CKFinder',
                'EasyImage',
                'RealTimeCollaborativeComments',
                'RealTimeCollaborativeTrackChanges',
                'RealTimeCollaborativeRevisionHistory',
                'PresenceList',
                'Comments',
                'TrackChanges',
                'TrackChangesData',
                'RevisionHistory',
                'Pagination',
                'WProofreader',
                'MathType',
                'SlashCommand',
                'Template',
                'DocumentOutline',
                'FormatPainter',
                'TableOfContents'
            ]
        });
    </script>
@endsection
