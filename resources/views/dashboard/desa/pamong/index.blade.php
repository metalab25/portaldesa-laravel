@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('pamong') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-1">
            <div class="col-md-10">
                <a href="{{ url('desa/pamong/create') }}"
                    class="btn btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Tambah
                    Perangkat {{ $config->sebutan_desa }}
                </a>
            </div>
            <div class="col-md-2">
                <div class="form-groupmb-0">
                    <div class="input-group mb-2">
                        <form action="{{ url('desa/pamong') }}" method="GET"
                            class="visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                            @csrf
                            <div class="input-group-append">
                                <input type="text"
                                    class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                    name="search" id="search" placeholder="Cari nama perangkat..."
                                    value="{{ request('search') }}">
                                <div class="input-group-text border-top-left-0 border-bottom-left-0 bg-none border-left-0">
                                    <span class="fad fa-search"></span>
                                </div>
                                <a href="{{ url('desa/pamong') }}" class="btn btn-sm btn-primary ms-2">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($pamong->count())
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Data Perangkat {{ $config->sebutan_desa }}</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit"
                                        width="2%">
                                        No
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                        Foto</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit ps-3">
                                        Nama, NIK, NIPD</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit ps-2">
                                        Tempat, Tanggal Lahir</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                        Jabatan</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                        Golongan</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                        Tanggal Pengangkatan</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                        Nomor SK Pengangkatan</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                        Pendidikan Terakhir</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                        Status</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit ps-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pamong as $item)
                                    <tr>
                                        <td class="align-middle text-sm ps-2">
                                            <p class="text-center text-sm text-secondary mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <img src="{{ asset('storage/' . $item->foto) }}" class="avatar avatar-sm"
                                                alt="avatar image">
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->penduduk->nama }}<br>
                                                <span class="font-weight-500">NIK :</span> {{ $item->penduduk->nik }}<br>
                                                <span class="font-weight-500">NIPD :</span> {{ $item->nipd }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->penduduk->tempat_lahir }}, {{ $item->penduduk->tanggal_lahir }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->jabatan }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                @if ($item->golongan == null)
                                                    -
                                                @else
                                                    {{ $item->golongan }}
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->tgl_pengangkatan }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->sk_pengangkatan }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->penduduk->pendidikan_kk->name }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                @if ($item->status == 1)
                                                    <i class="fad fa-check text-success mt-1"></i>
                                                @else
                                                    <i class="fad fa-lock text-danger mt-1"></i>
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ url('desa/pamong', $item->sk_pengangkatan . '/edit') }}"
                                                class="btn btn-xs btn-warning" data-toggle="tooltip"
                                                data-original-title="Edit Perangkat">
                                                <i class="fad fa-pencil text-white text-xs"></i>
                                            </a>
                                            <a href="{{ url('desa/pamong', $item->sk_pengangkatan . '/edit') }}"
                                                class="btn btn-xs btn-info" data-toggle="tooltip"
                                                data-original-title="Edit Perangkat">
                                                <p class="text-xxs text-white mb-0">A.N</p>
                                            </a>
                                            <a href="{{ url('desa/pamong', $item->sk_pengangkatan . '/edit') }}"
                                                class="btn btn-xs btn-dark" data-toggle="tooltip"
                                                data-original-title="Edit Perangkat">
                                                <p class="text-xxs text-white mb-0">U.B</p>
                                            </a>
                                            <form action="{{ url('webmin/documents', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn bg-gradient-danger btn-xs"
                                                    onclick="return confirm ('Anda yakin akan menghapus surat keluar ini ?')"><i
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
                {{ $pamong->links() }}
            </div>
        @else
            <div class="alert alert-danger bg-gradient-danger text-center" role="alert">
                <strong>Sorry!</strong> Data tidak ditemukan!
            </div>
        @endif

        <!-- /.card -->
    </section>
@endsection
