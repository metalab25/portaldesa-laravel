<body>
    <div id="content" class="container_12 clearfix">
        <div id="content-main">
            <link rel="stylesheet" href="{{ asset('assets/css/adminlte.css') }}">
            <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
            <table width="100%" style="border: solid 0px black; text-align: left;">
                <tr>
                    <td class="text-sm" width="8%">NIK</td>
                    <td class="text-sm" width="2%">:</td>
                    <td class="text-sm" width="90%">{{ $penduduk->nik }}</td>
                </tr>
                <tr>
                    <td class="text-sm" width="8%">No.KK</td>
                    <td class="text-sm" width="2%">:</td>
                    <td class="text-sm" width="90%">{{ $penduduk->keluarga->no_kk }}</td>
                    </td>
                </tr>
            </table>
            <table width="100%" style="border: solid 0px black; text-align: center;">
                <tr>
                    <td align="center"><img src="{{ asset('storage/' . $desa->logo) }}" class="logo-biodata"
                            alt="{{ $desa->nama_desa }}">
                </tr>
                <tr>
                    </td>
                    <td>
                        <h6 class="mb-0 font-weight-bold">BIODATA PENDUDUK WARGA NEGARA INDONESIA</h6>
                        <p class="text-sm">
                            {{ $config->singkatan_kabupaten }} {{ $desa->nama_kabupaten }},
                            {{ $config->singkatan_kecamatan }} {{ $desa->nama_kecamatan }},
                            {{ $config->sebutan_desa }} {{ $desa->nama_desa }}
                        </p>
                    </td>
                </tr>
            </table>
            <table width="100%" style="border: solid 0px black; padding: 10px;">
                <tr>
                    <td class="text-sm"><b>DATA PERSONAL</b></td>
                </tr>
                <tr>
                    <td class="text-sm" width="150">Nama Lengkap</td>
                    <td class="text-sm" width="2%">:</td>
                    <td class="text-sm" width="200">{{ $penduduk->nama }}</td>
                    <td class="text-sm" rowspan="18" style="vertical-align: middle;">
                        @if ($penduduk->foto)
                            <img src="{{ asset('storage/' . $penduduk->foto) }}" class="foto-biodata" alt=""
                                style="border: solid 1px black; padding: 5px;" />
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="text-sm">Tempat Lahir</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Tanggal Lahir</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Jenis Kelamin</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->kelamin->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Akta lahir</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->akta_lahir }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Agama</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->agama->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Pendidikan Terakhir</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->pendidikan_kk->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Pekerjaan</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->pekerjaan->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Golongan Darah</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->darah->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Cacat</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->cacat->nama }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Status Kawin</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->status_kawin->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Hubungan dalam Keluarga</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->hubungan_keluarga->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Warga Negara</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->kewarganegaraan->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm">NIK Ayah</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->nik_ayah }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Nama Ayah</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->nama_ayah }}</td>
                </tr>
                <tr>
                    <td class="text-sm">NIK Ibu</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->nik_ibu }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Nama Ibu</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->nama_ibu }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Status Kependudukan</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->status_penduduk->name }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Alamat</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">
                        {{ $penduduk->keluarga->alamat }}<br>
                        RT. {{ $penduduk->keluarga->rt->rt }} RW. {{ $penduduk->keluarga->rw->rw }}
                        {{ $config->sebutan_dusun }}
                        {{ $penduduk->keluarga->wilayah->name }}
                    </td>
                </tr>
                <tr>
                    <td class="text-sm" colspan="4" style="padding-top: 15px;"><strong>DATA KEPEMILIKAN
                            DOKUMEN</strong></td>
                </tr>
                <tr>
                    <td class="text-sm">Nomor Kartu Keluarga (No.KK)</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->keluarga->no_kk }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Dokumen Paspor</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->dokumen_pasport }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Dokumen Kitas</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->dokumen_kitas }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Akta Perkawinan</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->akta_perkawinan }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Tanggal Perkawinan</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->tanggal_perkawinan }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Akta Perceraian</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->akta_perkawinan }}</td>
                </tr>
                <tr>
                    <td class="text-sm">Tanggal Perceraian</td>
                    <td class="text-sm">:</td>
                    <td class="text-sm">{{ $penduduk->tanggal_perceraian }}</td>
                </tr>
            </table>
            @php
                $today = \Carbon\Carbon::now()->isoFormat('D MMMM Y');
            @endphp
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class="text-sm" align="center" scope="col" width="40%">Yang Bersangkutan</td>
                    <td class="text-sm" align="center" scope="col" width="10%">&nbsp;</td>
                    <td class="text-sm" align="center" scope="col" width="50%">
                        {{ $config->sebutan_desa }} {{ $desa->nama_desa }}, {{ $today }}</td>
                </tr>
                <tr>
                    <td class="text-sm" align="center">&nbsp;</td>
                    <td class="text-sm" align="center">&nbsp;</td>
                    <td class="text-sm" align="center">{{ $config->sebutan_kepala_desa }} {{ $desa->nama_desa }}
                    </td>
                </tr>
                <tr>
                    <td class="text-sm" align="center" height="50">&nbsp;</td>
                    <td class="text-sm" align="center">&nbsp;</td>
                    <td class="text-sm" align="center">&nbsp;</td>
                </tr>
                <tr>
                    <td class="text-sm" align="center" height="50">( {{ $penduduk->nama }} )</td>
                    <td class="text-sm" align="center">&nbsp;</td>
                    <td class="text-sm" align="center"><b>( {{ $desa->nama_kepala_desa }} )</b></td>
                </tr>
            </table>
        </div>
        <div id="aside">
        </div>
    </div>
</body>
