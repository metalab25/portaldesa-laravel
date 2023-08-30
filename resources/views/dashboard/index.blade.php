@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('dashboard') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary border-radius-md">
                    <div class="inner">
                        <h3 class="font-outfit">{{ $cluster_count }}</h3>

                        <p class="font-outfit">Wilayah Administratif</p>
                    </div>
                    <div class="icon">
                        <i class="fad fa-map text-white opacity-6"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success border-radius-md">
                    <div class="inner">
                        <h3 class="font-outfit">{{ $keluarga_count }}</h3>

                        <p class="font-outfit">Keluarga Tercatat</p>
                    </div>
                    <div class="icon">
                        <i class="fad fa-user-group text-white opacity-6"></i>
                    </div>
                    <a href="{{ url('adminduk/keluarga') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning border-radius-md">
                    <div class="inner">
                        <h3 class="font-outfit text-white">{{ $penduduk_count }}</h3>

                        <p class="font-outfit text-white">Penduduk Tercatat</p>
                    </div>
                    <div class="icon">
                        <i class="fad fa-users text-white opacity-6"></i>
                    </div>
                    <a href="{{ url('adminduk/penduduk') }}" class="small-box-footer text-white">More info <i
                            class="fas fa-arrow-circle-right text-white"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger border-radius-md">
                    <div class="inner">
                        <h3 class="font-outfit">65</h3>

                        <p class="font-outfit">Layanan Surat</p>
                    </div>
                    <div class="icon">
                        <i class="fad fa-file-circle-check text-white opacity-6"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                Start creating your amazing application!
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
@endsection
