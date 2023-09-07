@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('profile') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-1">
            <div class="col-md-10">
                <a href="{{ url('desa/profile/create') }}"
                    class="btn btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Tambah
                    Profil {{ $config->sebutan_desa }}
                </a>
                {{-- <button type="button"
                    class="btn btn-success btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1"
                    data-toggle="modal" data-target="#cetak">
                    Cetak Laporan
                </button> --}}
            </div>
            <div class="col-md-2">
                <div class="form-groupmb-0">
                    <div class="input-group mb-2">
                        <form action="{{ url('desa/profile') }}" method="GET"
                            class="visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                            @csrf
                            <div class="input-group-append">
                                <input type="text"
                                    class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                    name="search" id="search" placeholder="Cari profil desa..."
                                    value="{{ request('search') }}">
                                <div class="input-group-text border-top-left-0 border-bottom-left-0 bg-none border-left-0">
                                    <span class="fad fa-search"></span>
                                </div>
                                <a href="{{ url('desa/profile') }}" class="btn btn-sm btn-primary ms-2">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row align-middle">
                    <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Data Profil {{ $config->sebutan_desa }}</h6>
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
                                    Judul Profil</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                    Status</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Penulis</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Ditulis Pada</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Diperbaharui Pada</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profiles as $item)
                                <tr>
                                    <td class="align-middle ps-2">
                                        <p class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="align-middle">
                                        <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                            {{ $item->title }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        @if ($item->status == 1)
                                            <i class="fad fa-check text-success"></i>
                                        @elseif($item->status == 0)
                                            <i class="fad fa-lock text-danger"></i>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-sm text-center text-secondary font-outfit mb-0">
                                            {{ $item->user->name }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-sm text-center text-secondary font-outfit mb-0">
                                            {{ $item->created_at }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-sm text-center text-secondary font-outfit mb-0">
                                            @if ($item->updated_at == $item->created_at)
                                                -
                                            @else
                                                {{ $item->updated_at }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ url('desa/profile/' . $item->id) . '/edit' }}"
                                            class="btn btn-xs btn-warning" title="Edit Profile">
                                            <i class="fad fa-pencil text-white text-xs"></i>
                                        </a>
                                        <form action="/desa/profile/{{ $item->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm ('Anda yakin akan menghapus ketegori ini ?')"
                                                title="Hapus Profile">
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
