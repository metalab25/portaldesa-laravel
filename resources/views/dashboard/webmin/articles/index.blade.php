@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('article') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row align-middle">
                    <div class="col-md-8">
                        <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Management Artikel</h6>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-0">
                            <div class="input-group mb-2">
                                <input type="text"
                                    class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                    name="username" id="username" placeholder="Cari artikel...">
                                <div class="input-group-append">
                                    <div
                                        class="input-group-text border-top-left-0 border-bottom-left-0 bg-none border-left-0">
                                        <span class="fad fa-search text-xs"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <a href="{{ url('webmin/article/create') }}"
                            class="btn btn-sm btn-block btn-primary mb-2">Tambah</a>
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
                                    Nama Kategori</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Tipe Kategori</th>
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
                            {{-- @foreach ($categories as $item)
                                <tr>
                                    <td class="ps-2">
                                        <p class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                            {{ $item->name }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-sm text-center text-secondary font-outfit mb-0">
                                            {{ $item->category_type->name }}
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
                                        <button class="btn btn-xs btn-warning" data-id="{{ $item->id }}"
                                            data-toggle="modal" data-target="#edit{{ $item->id }}"
                                            title="Edit Kategori">
                                            <i class="fad fa-pencil text-white text-xs"></i>
                                        </button>
                                        <form action="/webmin/categories/{{ $item->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-xs btn-danger"
                                                onclick="return confirm ('Anda yakin akan menghapus ketegori ini ?')">
                                                <i class="fad fa-trash-can text-white text-xs"></i>
                                            </button>
                                        </form>

                                    </td>
                                    @include('dashboard.webmin.categories.modal-edit')
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
