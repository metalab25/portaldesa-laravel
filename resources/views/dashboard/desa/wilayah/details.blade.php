@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('rw') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row align-middle">
                    <div class="col-md-8">
                        <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Management RW</h6>
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
                        {{-- <a href="{{ url('desa/wilayah/rw/create') }}"
                            class="">Tambah RW</a> --}}
                        <button type="button" class="btn btn-sm btn-block btn-primary pull-right" data-toggle="modal"
                            data-target="#tambahRW">
                            Tambah RW
                        </button>
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
                                <th
                                    class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                    RW</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Nama Ketua RW</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    RT</th>
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
                            @foreach ($rws as $item)
                                <tr>
                                    <td>
                                        <p class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                            {{ $item->rw }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="mb-0 text-sm font-outfit opacity-9">
                                            @if ($item->penduduk_id !== null)
                                                {{ $item->penduduk_id }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            -
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            -
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            -
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            -
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            -
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="javascript:;" class="btn btn-xs btn-info" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            <i class="fad fa-list text-white text-xs"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-xs btn-warning" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            <i class="fad fa-pencil text-white text-xs"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-xs btn-danger" data-toggle="tooltip"
                                            data-original-title="Delete user">
                                            <i class="fad fa-trash-can text-white text-xs"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- Modal -->
    <div class="modal fade" id="tambahRW" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="tambahRWLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahRWLabel">Tambah RW</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('desa/wilayah/rw') }}" method="POST">
                    @csrf
                    <input type="hidden" name="level" value="2">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="name" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                                {{ $config->sebutan_dusun }}</label>
                            <select name="parent" id="parent" class="form-control form-control-sm">
                                <option value="">-- Pilih Wilayah --</option>
                                @foreach ($cluster as $item)
                                    @if (old('parent') == $item->id)
                                        <option value="{{ $item->id }}" selected>
                                            {{ $item->name }}
                                        </option>
                                    @else
                                        <option value="{{ $item->id }}"> {{ $item->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-2">
                            <label for="rw" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nomor
                                RW (Rukun Warga)</label>
                            <input type="text" name="rw" id="rw" class="form-control form-control-sm"
                                placeholder="Tuliskan nomor RW" value="{{ old('rw') }}">
                        </div>
                        <div class="form-group mb-0">
                            <label for="penduduk_id"
                                class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama Ketua RW</label>
                            <input type="text" name="penduduk_id" id="penduduk_id"
                                class="form-control form-control-sm" placeholder="Tuliskan nama Ketua RW"
                                value="{{ old('penduduk_id') }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
