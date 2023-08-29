@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('keluarga') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <button tupe="button"
                    class="btn btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Tambah
                    Anggota
                </button>
                <a href=""
                    class="btn btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Cetak
                    Kartu
                    Keluarga
                </a>
                <a href="{{ url('adminduk/keluarga') }}"
                    class="btn btn-danger btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Kembali
                    Ke Daftar Keluarga
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mb-3">
                        <tbody>
                            <tr>
                                <td class="text-xs" width="10%">Nomor Kartu Keluarga</td>
                                <td class="text-xs">{{ $keluarga->no_kk }}</td>
                            </tr>
                            <tr>
                                <td class="text-xs" width="10%">Kepala Keluarga</td>
                                <td class="text-xs">{{ $keluarga->penduduk->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-xs" width="10%">Alamat</td>
                                <td class="text-xs">{{ $keluarga->alamat }} RT {{ $keluarga->rt->rt }}
                                    RW {{ $keluarga->rw->rw }}
                                    {{ $keluarga->wilayah->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive p-0">
                    <table class="table table-bordered table-striped align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit"
                                    width="2%">
                                    No</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                    NIK</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                    Nama</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                    Tanggal Lahir</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                    Jenis Kelamin</th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit ps-3">
                                    Hubungan Keluarga</th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-600 opacity-7 font-outfit">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($anggota as $item)
                                <tr>
                                    <td>
                                        <p class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}
                                        </p>
                                    </td>
                                    <td class="text-center align-middle text-xs">
                                        <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                            {{ $item->nik }}</p>
                                    </td>
                                    <td class="align-middle text-xs">
                                        <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                            {{ $item->nama }}</p>
                                    </td>
                                    <td class="text-center align-middle text-xs">
                                        <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                            {{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d F Y') }}
                                        </p>
                                    </td>
                                    <td class="text-center align-middle text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            {{ $item->kelamin->name }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            {{ $item->hubungan_keluarga->name }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-center pe-3">
                                        <a href="{{ url('adminduk/penduduk/' . $item->nik) }}" class="btn btn-xs btn-info"
                                            data-toggle="tooltip" title="Edit Kategori">
                                            <i class="fad fa-eye text-white text-xs"></i>
                                        </a>
                                        <a href="{{ url('adminduk/penduduk/' . $item->id . '/edit') }}"
                                            class="btn btn-xs btn-warning"data-toggle="tooltip" title="Edit Kategori">
                                            <i class="fad fa-pencil text-white text-xs"></i>
                                        </a>
                                        <form action="/adminduk/penduduk/{{ $item->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm ('Anda yakin akan menghapus penduduk ini ?')">
                                                <i class="fad fa-trash-can text-white text-xs"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
@endsection
