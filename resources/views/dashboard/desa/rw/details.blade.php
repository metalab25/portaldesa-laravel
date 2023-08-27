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
                    <div class="col-md-7">
                        <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Management RT</h6>
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
                        <a href="{{ url('desa/wilayah/create') }}"
                            class="btn btn-block btn-sm btn-primary pull-right">Tambah
                            {{ $config->sebutan_dusun }}
                        </a>
                    </div>
                    <div class="col-md-1">
                        <a href="{{ url('desa/wilayah/rw/create') }}"
                            class="btn btn-block btn-sm btn-success pull-right">Tambah RW
                        </a>
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
                                    {{ $config->sebutan_dusun }}</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    {{ $config->sebutan_kepala_dusun }}</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    RW</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    RT</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    KK</th>
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
                            {{-- @foreach ($rws as $item)
                                <tr>
                                    <td>
                                        <p class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                            {{ $item->name }}</p>
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
                                        <a href="{{ url('desa/wilayah/' . $item->id) }}" class="btn btn-xs btn-info"
                                            data-toggle="tooltip" data-original-title="Edit user">
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
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
