@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('article') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xl-3 col-md-3">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Kategori Dinamis</h6>
                    </div>
                    <div class="card-body px-3 pt-0">
                        <ul class="list-group">
                            @foreach ($dinamis as $item)
                                <li class="list-group-item text-sm {{ request()->segment(2) == $item->id ? 'active' : '' }}">
                                    <a href="{{ url('webmin/posts/categories/' . $item->id) }}">
                                        {{ $item->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-md-9">
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
                                <a href="{{ url('webmin/posts/create') }}"
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
                                            Judul</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                            Kategori</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                            Status</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                            Penulis</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-3">
                                            Tanggal Dipublish</th>
                                        <th
                                            class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $item)
                                        <td class="ps-2">
                                            <p class="text-center text-xs text-secondary mb-0">{{ $loop->iteration }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                                {{ $item->title }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-center text-secondary font-outfit mb-0">
                                                {{ $item->category->name }}
                                            </p>
                                        </td>
                                        <td class="text-sm text-center text-secondary font-outfit mb-0">
                                            @if ($item->status == 1)
                                                <i class="fad fa-check text-success mt-1"></i>
                                            @else
                                                <i class="fad fa-lock text-danger mt-1"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <p class="text-sm text-center text-secondary font-outfit mb-0">
                                                {{ $item->user->name }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-sm text-center text-secondary font-outfit mb-0">
                                                {{ $item->created_at }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-xs btn-warning" data-id="{{ $item->id }}"
                                                data-toggle="modal" data-target="#edit{{ $item->id }}"
                                                title="Edit Kategori">
                                                <i class="fad fa-pencil text-white text-xs"></i>
                                            </button>
                                            <form action="{{ route('posts.status', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @method('PATCH')
                                                @csrf
                                                @if ($item->status == 0)
                                                    <button type="submit" class="btn btn-xs btn-dark" value="1">
                                                        <i class="fad fa-toggle-on text-white text-xs"></i>
                                                    </button>
                                                @elseif ($item->status == 1)
                                                    <button type="submit" class="btn btn-xs btn-success" value="0">
                                                        <i class="fad fa-toggle-off text-white text-xs"></i>
                                                    </button>
                                                @endif
                                            </form>
                                            <form action="{{ route('posts.comment', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @method('PATCH')
                                                @csrf
                                                @if ($item->komentar == 0)
                                                    <button type="submit" class="btn btn-xs btn-dark" value="1">
                                                        <i class="fad fa-comments text-white text-xs"></i>
                                                    </button>
                                                @elseif ($item->komentar == 1)
                                                    <button type="submit" class="btn btn-xs btn-info" value="0">
                                                        <i class="fad fa-comments text-white text-xs"></i>
                                                    </button>
                                                @endif
                                            </form>
                                            <form action="/webmin/posts/{{ $item->id }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-xs btn-danger"
                                                    onclick="return confirm ('Anda yakin akan menghapus ketegori ini ?')">
                                                    <i class="fad fa-trash-can text-white text-xs"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
