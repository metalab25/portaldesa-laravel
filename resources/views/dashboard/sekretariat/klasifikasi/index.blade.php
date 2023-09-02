@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('klasifikasi') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="mb-3">
            <div class="form-group mb-0">
                <div class="input-group d-block mb-2">
                    <form action="{{ url('sekretariat/klasifikasi') }}" method="GET">
                        @csrf
                        <div class="input-group-append">
                            <input type="text"
                                class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                name="search" id="search" placeholder="Cari klasifikasi surat..."
                                value="{{ request('search') }}">
                            <div class="input-group-text border-top-left-0 border-bottom-left-0 bg-none border-left-0">
                                <span class="fad fa-search"></span>
                            </div>
                            <a href="{{ url('sekretariat/klasifikasi') }}" class="btn btn-sm btn-primary ms-2">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Default box -->
        @if ($klasifikasi->count())
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row align-middle">
                        <div class="col-md-10">
                            <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Klasifikasi Surat</h6>
                        </div>
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
                                    <th class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2"
                                        width="5%">
                                        Kode</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2"
                                        width="20%">
                                        Nama Klasifikasi</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2">
                                        Uraian</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($klasifikasi as $item)
                                    <tr>
                                        <td>
                                            <p class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                                {{ $item->kode }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->nama }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ Str::limit($item->uraian, 50) }}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                {{ $klasifikasi->links() }}
            </div>
        @else
            <div class="alert alert-danger bg-gradient-danger text-center" role="alert">
                <strong>Sorry!</strong> Data tidak ditemukan!
            </div>
        @endif
        <!-- /.card -->
    </section>
@endsection
