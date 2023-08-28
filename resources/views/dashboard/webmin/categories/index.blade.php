@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('categories') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row align-middle">
                    <div class="col-md-8">
                        <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Management Kategori</h6>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-0">
                            <div class="input-group mb-2">
                                <input type="text"
                                    class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                    name="username" id="username" placeholder="Cari kategori...">
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
                        <button type="button" class="btn btn-sm btn-block btn-primary mb-2" data-toggle="modal"
                            data-target="#tambah">
                            Tambah
                        </button>
                    </div>
                    @include('dashboard.webmin.categories.modal-tambah')
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
                                    Nama Kategori</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Artikel</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                    Status</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                                <tr>
                                    <td class="ps-2">
                                        <p class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                            {{ $item->name }}
                                        </p>
                                    </td>
                                    <td></td>
                                    <td class="text-center">
                                        @if ($item->active == 1)
                                            <i class="fad fa-check text-success"></i>
                                        @elseif($item->active == 0)
                                            <i class="fad fa-lock text-danger"></i>
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-xs btn-warning btn-edit" data-id="{{ $item->id }}"
                                            data-toggle="tooltip" data-target="#edit{{ $item->id }}"
                                            title="Edit Kategori">
                                            <i class="fad fa-pencil text-white text-xs"></i>
                                        </button>
                                        <a href="javascript:;" class="btn btn-xs btn-danger" data-toggle="tooltip"
                                            data-original-title="Delete user">
                                            <i class="fad fa-trash-can text-white text-xs"></i>
                                        </a>
                                    </td>
                                    @include('dashboard.webmin.categories.modal-edit')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    {{-- @include('dashboard.webmin.categories.modal-tambah') --}}

    <div class="modal fade" id="edit" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel">Tambah Kategori {{ $item->id }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('webmin/categories') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="name" class="form-label text-sm font-outfit font-weight-bold opacity-8">Nama
                                Kategori</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm"
                                placeholder="Tuliskan nama kategori" value="{{ old('name') }}">
                            <input type="hidden" class="form-control form-control-sm" id="slug" name="slug">
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
