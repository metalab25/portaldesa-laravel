@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('documents') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row align-middle">
                    <div class="col-md-8">
                        <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Data Dokumen Publik</h6>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-0">
                            <div class="input-group mb-2">
                                <input type="text"
                                    class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                    name="username" id="username" placeholder="Cari dokumen...">
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
                                    Nama Dokumen</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Tanggal Unggah</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Oleh</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Diunduh</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documents as $item)
                                <tr>
                                    <td>
                                        <p class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                            {{ $item->name }}</p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            {{ $item->created_at }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            {{ $item->user->name }}
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            @if ($item->hit == 0)
                                                -
                                            @else
                                                {{ $item->hit }}
                                            @endif
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="{{ asset('storage/' . $item->attach) }}" class="btn btn-xs btn-success"
                                            data-toggle="tooltip" data-original-title="Download Document">
                                            <i class="fad fa-download text-white text-xs"></i>
                                        </a>
                                        <form action="{{ url('webmin/documents', $item->id) }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn bg-gradient-danger btn-xs"
                                                onclick="return confirm ('Anda yakin akan menghapus dokumen ini ?')"><i
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
        <!-- /.card -->
    </section>
    @include('dashboard.webmin.documents.modal-tambah')
@endsection
