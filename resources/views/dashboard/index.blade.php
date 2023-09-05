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
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-outfit mb-0">Surat Masuk</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <a href="{{ url('sekretariat/surat_masuk') }}" class="text-sm">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-3 py-0">
                        <ul class="list-group">
                            @foreach ($sm_recent as $item)
                                <li class="list-group-item border-0 justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-warning mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                    class="fas fa-arrow-down" aria-hidden="true"></i></button>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-0 text-dark text-sm font-outfit">{{ $item->nomor_surat }}</h6>
                                                <span class="text-xs">{{ $item->tanggal_penerimaan }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center text-danger text-sm ms-auto">
                                            {{ $item->pengirim }}
                                        </div>
                                    </div>
                                    <hr class="horizontal dark mt-3 mb-1">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="font-outfit mb-0">Surat Keluar</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <a href="{{ url('sekretariat/surat_keluar') }}" class="text-sm">
                                    Lihat Semua
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-3 py-0">
                        <ul class="list-group">
                            @foreach ($sk_recent as $item)
                                <li class="list-group-item border-0 justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center">
                                            <button
                                                class="btn btn-icon-only btn-rounded btn-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                    class="fas fa-arrow-up" aria-hidden="true"></i></button>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-0 text-dark text-sm font-outfit">{{ $item->nomor_surat }}
                                                </h6>
                                                <span class="text-xs">{{ $item->tanggal_surat }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center text-success text-sm ms-auto">
                                            {{ $item->tujuan }}
                                        </div>
                                    </div>
                                    <hr class="horizontal dark mt-3 mb-1">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-header pb-0 p-3">
                        <h6 class="font-outfit mb-0">Recent Login</h6>
                    </div>
                    <div class="card-body px-3 py-0">
                        <ul class="list-group">
                            @foreach ($login_recent as $item)
                                <li class="list-group-item border-0 justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center">
                                            @if ($item->avatar !== null)
                                                <img src="{{ asset('storage/' . $item->avatar) }}"
                                                    class="avatar avatar-sm me-3" alt="{{ $item->name }}">
                                            @else
                                                <img src="{{ asset('assets/img/no-pic.png') }}"
                                                    class="avatar avatar-sm me-3" alt="{{ $item->name }}">
                                            @endif
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-0 text-dark text-sm font-outfit">{{ $item->name }}</h6>
                                                <span class="text-xs">
                                                    @if ($item->level == 1)
                                                        Administrator
                                                    @elseif ($item->level == 2)
                                                        Operator
                                                    @elseif ($item->level == 3)
                                                        Kontributor
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center text-primary text-sm ms-auto">
                                            {{ \Carbon\Carbon::parse($item->last_login_at)->diffForHumans() }}
                                        </div>
                                    </div>
                                    <hr class="horizontal dark mt-3 mb-1">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
