@extends('dashboard.layouts.master')

@section('content')
    <style>
        .ck-source-editing-area {
            min-height: 200px;
        }

        .ck-rounded-corners .ck.ck-editor__main>.ck-editor__editable,
        .ck.ck-editor__main>.ck-editor__editable.ck-rounded-corners {
            min-height: 200px;
        }
    </style>
    <section class="content-header">
        {{ Breadcrumbs::render('pamong') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <form action="{{ url('desa/pamong') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card p-3">
                <div class="form-group mb-0">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="ajaxPenduduk" class="form-label text-sm opacity-8">Pilih Perangkat Dari
                                Penduduk<code class="text-danger text-sm">*</code></label>
                        </div>
                        <div class="col-md-6">
                            <select name="penduduk_id" id="ajaxPenduduk"
                                class="form-control form-control-sm text-sm @error('penduduk_id') is-invalid @enderror"
                                value="{{ old('penduduk_id') }}">
                            </select>
                            @error('penduduk_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-3">
                    <div class="card mb-3 p-3">
                        <div class="d-flex justify-content-center">
                            <input type="hidden" name="foto">
                            <img src="/assets/img/kuser.png"
                                class="foto-preview img-rounded img-fluid d-block mx-auto mb-2">
                        </div>
                        <div class="mb-0">
                            <p class="text-center font-outfit font-weight-bold text-sm mb-0">Foto Perangkat
                                {{ $config->sebutan_desa }}</p>
                            <p class="text-center text-xs text-danger mb-4">Maksimal 2MB</p>
                            <input class="form-control form-control-sm @error('foto') is-invalid @enderror" type="file"
                                name="foto" id="foto" onchange="previewFoto()">
                            @error('foto')
                                <div class="invalid-feedback text-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-md-9 mb-3">
                    <div class="card mb-3 p-3">
                        <div class="row form-group mb-2">
                            <div class="col-md-3">
                                <label for="nipd" class="form-label text-sm opacity-8">Nomor Induk
                                    Perangkat
                                    {{ $config->sebutan_desa }}</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="nipd" id="nipd"
                                    class="form-control form-control-sm text-sm" placeholder="NIPD"
                                    value="{{ old('nipd') }}">
                            </div>
                        </div>
                        <div class="row form-group mb-2">
                            <div class="col-md-3">
                                <label for="jabatan" class="form-label text-sm opacity-8">Jabatan<code
                                        class="text-danger text-sm">*</code></label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="jabatan" id="jabatan"
                                    class="form-control form-control-sm @error('jabatan') is-invalid @enderror text-sm"
                                    placeholder="Jabatan" value="{{ old('jabatan') }}">
                                @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group mb-2">
                            <div class="col-md-3">
                                <label for="golongan" class="form-label text-sm opacity-8">Pangkat/Golongan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="golongan" id="golongan"
                                    class="form-control form-control-sm text-sm" placeholder="Pangkat/Golongan"
                                    value="{{ old('golongan') }}">
                            </div>
                        </div>
                        <div class="row form-group mb-2">
                            <div class="col-md-3">
                                <label for="tgl_pengangkatan" class="form-label text-sm opacity-8">Tanggal
                                    Pengangkatan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="date" name="tgl_pengangkatan" id="tgl_pengangkatan"
                                    class="form-control form-control-sm text-sm" value="{{ old('tgl_pengangkatan') }}">
                            </div>
                        </div>
                        <div class="row form-group mb-2">
                            <div class="col-md-3">
                                <label for="sk_pengangkatan" class="form-label text-sm opacity-8">Nomor SK
                                    Pengangkatan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="sk_pengangkatan" id="sk_pengangkatan"
                                    class="form-control form-control-sm text-sm" placeholder="Nomor SK Pengangkatan"
                                    value="{{ old('sk_pengangkatan') }}">
                            </div>
                        </div>
                        <div class="row form-group mb-2">
                            <div class="col-md-3">
                                <label for="masa_jabatan" class="form-label text-sm opacity-8">Masa Jabatan</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" name="masa_jabatan" id="masa_jabatan"
                                    class="form-control form-control-sm text-sm"
                                    placeholder="Contoh : 6 Tahun Periode Pertama (2015 s/d 2021)"
                                    value="{{ old('masa_jabatan') }}">
                            </div>
                        </div>
                        <div class="row form-group mb-2">
                            <div class="col-md-3">
                                <label for="email" class="form-label text-sm opacity-8">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" name="email" id="email"
                                    class="form-control form-control-sm text-sm" placeholder="Contoh : jabatan@gmail.com"
                                    value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="row form-group mb-0">
                            <div class="col-md-3">
                                <label for="email" class="form-label text-sm opacity-8">Tupoksi</label>
                            </div>
                            <div class="col-md-9">
                                <textarea id="tupoksi" name="tupoksi"
                                    class="form-control block w-full mt-1 @error('tupoksi') is-invalid @enderror">{{ old('tupoksi') }}</textarea>
                                @error('tupoksi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('desa/pamong') }}" class="btn btn-sm btn-danger text-sm">Batal</a>
                    <button type="submit" class="btn btn-sm btn-primary text-sm pull-right">Simpan</button>
                </div>
            </div>
        </form>
    </section>
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('#ajaxPenduduk').on('select2:open', function() {
                $('.select2-search--dropdown .select2-search__field').attr('placeholder',
                    'Ketik NIK atau nama penduduk');
            });
            $("#ajaxPenduduk").select2({
                placeholder: '-- Pilih Penduduk --',
                ajax: {
                    url: "{{ url('get_penduduk') }}",
                    delay: 250,
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: [
                                        item.nik,
                                        ' - ',
                                        item.nama
                                    ]
                                }
                            })
                        }
                    }

                }
            });
        });

        CKEDITOR.ClassicEditor.create(document.getElementById("tupoksi"), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'strikethrough', 'underline', 'code', 'removeFormat', '|',
                    'bulletedList', 'numberedList', 'todoList', '|', 'fontSize', 'fontFamily', 'fontColor',
                    'fontBackgroundColor', 'highlight', '|',
                    'alignment', '|',
                    'outdent', 'indent', 'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', '|',
                    'specialCharacters', 'horizontalLine', 'pageBreak', '|', 'sourceEditing', '|',
                    'undo', 'redo'
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

        function previewFoto() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.foto-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(foto.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(foto.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
