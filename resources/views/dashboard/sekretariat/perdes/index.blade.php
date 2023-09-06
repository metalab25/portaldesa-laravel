@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('perdes') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-1">
            <div class="col-md-10">
                <a href="{{ url('sekretariat/perdes/create') }}"
                    class="btn btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Tambah
                    Peraturan {{ $config->sebutan_desa }}
                </a>
                <button type="button"
                    class="btn btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1"
                    data-toggle="modal" data-target="#cetak">
                    Cetak Laporan
                </button>
            </div>
            <div class="col-md-2">
                <div class="form-groupmb-0">
                    <div class="input-group mb-2">
                        <form action="{{ url('sekretariat/perdes') }}" method="GET"
                            class="visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                            @csrf
                            <div class="input-group-append">
                                <input type="text"
                                    class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                    name="search" id="search" placeholder="Cari peraturan..."
                                    value="{{ request('search') }}">
                                <div class="input-group-text border-top-left-0 border-bottom-left-0 bg-none border-left-0">
                                    <span class="fad fa-search"></span>
                                </div>
                                <a href="{{ url('sekretariat/perdes') }}" class="btn btn-sm btn-primary ms-2">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($peraturan->count())
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Data Peraturan {{ $config->sebutan_desa }}</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit"
                                        width="2%">
                                        No.
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit ps-3">
                                        Nama Peraturan {{ $config->sebutan_desa }}</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit ps-3">
                                        Jenis Peraturan {{ $config->sebutan_desa }}
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                        Nomor dan Tanggal Ditetapkan</th>

                                    <th <th
                                        class="text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit ps-3">
                                        Uraian Singkat Peraturan {{ $config->sebutan_desa }}</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit ps-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peraturan as $item)
                                    <tr>
                                        <td class="align-middle text-sm ps-2">
                                            <p class="text-center text-sm text-secondary mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                                {{ $item->name }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->jenis }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->no_tetapan }}/{{ $item->tgl_tetapan }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                @if ($item->short_desc == null)
                                                    -
                                                @else
                                                    {{ $item->short_desc }}
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ asset('storage/' . $item->attach) }}"
                                                class="btn btn-xs btn-success" data-toggle="tooltip"
                                                data-original-title="Download Peraturan">
                                                <i class="fad fa-download text-white text-xs"></i>
                                            </a>
                                            <form action="{{ url('sekretariat/perdes', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn bg-gradient-danger btn-xs"
                                                    onclick="return confirm ('Anda yakin akan menghapus peraturan ini ?')"><i
                                                        class="fad fa-trash-can text-xs"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                {{ $peraturan->links() }}
            </div>
        @else
            <div class="alert alert-danger bg-gradient-danger text-center" role="alert">
                <strong>Sorry!</strong> Data tidak ditemukan!
            </div>
        @endif
        <!-- /.card -->
    </section>
    @include('dashboard.sekretariat.perdes.modal-cetak')
@endsection
