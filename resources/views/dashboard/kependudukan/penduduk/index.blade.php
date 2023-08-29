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
                        <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Data Penduduk</h6>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-0">
                            <form action="/adminduk/penduduk" method="GET">
                                @csrf
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
                            </form>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a href="{{ url('adminduk/penduduk/create') }}" class="btn btn-sm btn-primary btn-block">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                @if ($penduduks->count())
                    <div class="table-responsive p-0">
                        <table class="table table-bordered table-striped align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        No
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                        Nama</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        NIK
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        NO KK</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        Nama Ayah</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        Nama Ibu</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        Tempat, Tanggal Lahir</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        Dusun</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        RW</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        RT</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                        Pekerjaan</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                        Pendidikan Dalam KK
                                    </th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penduduks as $item)
                                    <tr>
                                        <td>
                                            <p class="text-center text-xs text-secondary mb-0 pe-2">{{ $loop->iteration }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs text-secondary font-weight-500 mb-0">{{ $item->nama }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-center text-secondary mb-0">
                                                {{ $item->nik }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-center text-secondary mb-0">
                                                @if ($item->keluarga_id !== null)
                                                    {{ $item->keluarga->no_kk }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-center text-secondary mb-0">
                                                @if ($item->nama_ayah !== null)
                                                    {{ $item->nama_ayah }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-center text-secondary mb-0">
                                                @if ($item->nama_ibu !== null)
                                                    {{ $item->nama_ibu }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-center text-secondary mb-0">
                                                {{ $item->tempat_lahir }}, {{ $item->tanggal_lahir }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-center text-secondary mb-0">
                                                @if ($item->keluarga_id !== null)
                                                    {{ $item->keluarga->wilayah->name }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-center text-secondary mb-0">
                                                @if ($item->keluarga_id !== null)
                                                    {{ $item->keluarga->rw->rw }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-center text-secondary mb-0">
                                                @if ($item->keluarga_id !== null)
                                                    {{ $item->keluarga->rt->rt }}
                                                @else
                                                    -
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->pekerjaan->name }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->pendidikan_kk->name }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center pe-3">
                                            <a href="{{ url('adminduk/penduduk/' . $item->nik) }}"
                                                class="btn btn-xs btn-info" data-toggle="tooltip" title="Edit Kategori">
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
                @else
                    <div class="alert alert-danger bg-danger text-center" role="alert">
                        <strong>Sorry!</strong> Data {{ $page }} tidak ada!
                    </div>
                @endif
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection
