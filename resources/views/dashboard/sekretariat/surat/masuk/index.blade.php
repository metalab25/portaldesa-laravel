@extends('dashboard.layouts.master')

@section('content')
    <section class="content-header">
        {{ Breadcrumbs::render('surat_masuk') }}
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-1">
            <div class="col-md-10">
                <a href="{{ url('sekretariat/surat_masuk/create') }}"
                    class="btn btn-primary btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block mb-1">Tambah
                    Surat Masuk
                </a>
            </div>
            <div class="col-md-2">
                <div class="form-groupmb-0">
                    <div class="input-group mb-2">
                        <form action="{{ url('sekretariat/surat_masuk') }}" method="GET"
                            class="visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                            @csrf
                            <div class="input-group-append">
                                <input type="text"
                                    class="form-control form-control-sm border-top-right-0 border-bottom-right-0 border-right-0"
                                    name="search" id="search" placeholder="Cari surat masuk..."
                                    value="{{ request('search') }}">
                                <div class="input-group-text border-top-left-0 border-bottom-left-0 bg-none border-left-0">
                                    <span class="fad fa-search"></span>
                                </div>
                                <a href="{{ url('sekretariat/surat_masuk') }}" class="btn btn-sm btn-primary ms-2">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($masuk->count())
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="font-outfit font-weight-600 opacity-8 pt-1">Data Surat Keluar</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit"
                                        width="2%">
                                        No. Urut
                                    </th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2">
                                        No Surat</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        Tanggal Penerimaan</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        Tanggal Surat</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2">
                                        Klasifikasi Surat</th>
                                    <th <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit">
                                        Pengirim Surat</th>
                                    <th
                                        class="text-uppercase text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2">
                                        Perihal Surat</th>
                                    <th
                                        class="text-uppercase text-center text-secondary text-xs font-weight-600 opacity-7 font-outfit ps-2">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masuk as $item)
                                    <tr>
                                        <td class="align-middle text-sm ps-2">
                                            <p class="text-center text-sm text-secondary mb-0">{{ $item->nomor_urut }}</p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary font-outfit font-weight-500 mb-0">
                                                {{ $item->nomor_surat }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->tanggal_penerimaan }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->tanggal_surat }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                {{ $item->klasifikasi_surat->kode . ' - ' . $item->klasifikasi_surat->nama }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                @if ($item->pengirim == null)
                                                    -
                                                @else
                                                    {{ $item->pengirim }}
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-sm">
                                            <p class="text-sm text-secondary mb-0">
                                                @if ($item->perihal_surat == null)
                                                    -
                                                @else
                                                    {{ $item->perihal_surat }}
                                                @endif
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="{{ asset('storage/' . $item->attach) }}"
                                                class="btn btn-xs btn-success" data-toggle="tooltip"
                                                data-original-title="Download Surat Masuk">
                                                <i class="fad fa-download text-white text-xs"></i>
                                            </a>
                                            <form action="{{ url('sekretariat/surat_masuk', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn bg-gradient-danger btn-xs"
                                                    onclick="return confirm ('Anda yakin akan menghapus surat keluar ini ?')"><i
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
            <div class="d-flex justify-content-end">
                {{ $masuk->links() }}
            </div>
        @else
            <div class="alert alert-danger bg-gradient-danger text-center" role="alert">
                <strong>Sorry!</strong> Data tidak ditemukan!
            </div>
        @endif

        <!-- /.card -->
    </section>
@endsection
