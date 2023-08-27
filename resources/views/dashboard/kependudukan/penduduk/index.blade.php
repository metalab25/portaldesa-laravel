@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('penduduk') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row align-middle">
                    <div class="col-md-8">
                        <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Data {{ $config->sebutan_dusun }}</h6>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-0">
                            <div class="input-group mb-2">
                                <input type="text"
                                    class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                    name="username" id="username" placeholder="Cari wilayah...">
                                <div class="input-group-append">
                                    <div
                                        class="input-group-text border-top-left-0 border-bottom-left-0 bg-none border-left-0">
                                        <span class="fad fa-search"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a href="{{ url('adminduk/penduduk/create') }}" class="btn btn-sm btn-primary btn-block">Tambah</a>
                    </div>
                    {{-- <div class="col-md-1">
                        <button type="button" class="btn btn-sm btn-block btn-info mb-2" data-toggle="modal"
                            data-target="#tambahRW">
                            Tambah RW
                        </button>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-sm btn-block btn-success mb-2" data-toggle="modal"
                            data-target="#tambahRT">
                            Tambah RT
                        </button>
                    </div> --}}
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit"
                                    width="2%">
                                    No
                                </th>
                                <th
                                    class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                    {{ $config->sebutan_dusun }}</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    {{ $config->sebutan_kepala_dusun }}</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    RW</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    RT</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    KK</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    KK</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    L+P</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    L</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    P</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>

    <script>
        function previewBackground() {
            const background = document.querySelector('#background');
            const imgPreview = document.querySelector('.background-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(background.files[0]);

            oFReader.onLoad = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
            const blob = URL.createObjectURL(background.files[0]);
            imgPreview.src = blob;
        }
    </script>
@endsection
