@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('users') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="row align-middle">
                    <div class="col-md-8">
                        <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Management Pengguna</h6>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-0">
                            <div class="input-group mb-2">
                                <input type="text"
                                    class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                    name="username" id="username" placeholder="Cari pengguna...">
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
                        <a href="" class="btn btn-sm btn-block btn-primary pull-right">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Name</th>
                                <th
                                    class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2">
                                    Username
                                </th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Level
                                </th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Phone</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Status</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Latest Login</th>
                                <th
                                    class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                @if ($item->avatar !== null)
                                                    <img src="{{ asset('storage/' . $item->avatar) }}"
                                                        class="avatar avatar-sm me-3" alt="{{ $item->name }}">
                                                @else
                                                    <img src="{{ asset('assets/img/no-pic.png' . $item->avatar) }}"
                                                        class="avatar avatar-sm me-3" alt="{{ $item->name }}">
                                                @endif

                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm font-outfit">{{ $item->name }}</h6>
                                                <p class="text-xs text-secondary mb-0">{{ $item->email }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <p class="text-sm text-secondary mb-0">{{ $item->username }}</p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="mb-0 text-sm font-outfit opacity-9">
                                            @if ($item->level == 1)
                                                Administrator
                                            @elseif ($item->level == 2)
                                                Operator
                                            @elseif ($item->level == 3)
                                                Kontributor
                                            @endif
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            @if ($item->phone !== null)
                                                {{ $item->phone }}
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm text-secondary mb-0">
                                            @if ($item->status == 1)
                                                <i class="fad fa-check text-success"></i>
                                            @elseif ($item->status == 0)
                                                <i class="fad fa-lock text-danger"></i>
                                            @endif
                                        </p>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-sm">
                                            @if ($item->last_login_at !== null)
                                                {{ \Carbon\Carbon::parse($item->last_login_at)->diffForHumans() }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <a href="javascript:;" class="btn btn-sm btn-warning" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            <i class="fad fa-pencil text-white"></i>
                                        </a>
                                        <a href="javascript:;" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                            data-original-title="Delete user">
                                            <i class="fad fa-trash-can text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
@endsection
