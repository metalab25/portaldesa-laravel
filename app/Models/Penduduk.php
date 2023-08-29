<?php

namespace App\Models;

use App\Models\Kb;
use App\Models\Rt;
use App\Models\Rw;
use Carbon\Carbon;
use App\Models\Ktp;
use App\Models\Agama;
use App\Models\Cacat;
use App\Models\Darah;
use App\Models\Hamil;
use App\Models\Sakit;
use App\Models\Kelamin;
use App\Models\Wilayah;
use App\Models\Keluarga;
use App\Models\Pekerjaan;
use App\Models\StatusKtp;
use App\Models\StatusKawin;
use App\Models\PendidikanKk;
use App\Models\JenisKelahiran;
use App\Models\StatusPenduduk;
use App\Models\Kewarganegaraan;
use App\Models\HubunganKeluarga;
use App\Models\PendidikanTempuh;
use App\Models\TempatDilahirkan;
use App\Models\PenolongKelahiran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penduduk extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];
    protected $table    = 'penduduks';

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->format('d M Y H:i:s');
    }

    public function getTanggalLahirAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])->format('d-m-Y');
    }

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }

    public function rt()
    {
        return $this->belongsTo(Rt::class);
    }

    public function kelamin()
    {
        return $this->belongsTo(Kelamin::class);
    }

    public function hubungan_keluarga()
    {
        return $this->belongsTo(HubunganKeluarga::class);
    }

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class);
    }

    public function pendidikan_kk()
    {
        return $this->belongsTo(PendidikanKk::class);
    }

    public function pendidikan_tempuh()
    {
        return $this->belongsTo(PendidikanTempuh::class);
    }

    public function kewarganegaraan()
    {
        return $this->belongsTo(Kewarganegaraan::class);
    }

    public function ktp()
    {
        return $this->belongsTo(Ktp::class);
    }

    public function status_ktp()
    {
        return $this->belongsTo(StatusKtp::class);
    }

    public function status_penduduk()
    {
        return $this->belongsTo(StatusPenduduk::class);
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }

    public function tempat_dilahirkan()
    {
        return $this->belongsTo(TempatDilahirkan::class);
    }

    public function jenis_kelahiran()
    {
        return $this->belongsTo(JenisKelahiran::class);
    }

    public function penolong_kelahiran()
    {
        return $this->belongsTo(PenolongKelahiran::class);
    }

    public function status_kawin()
    {
        return $this->belongsTo(StatusKawin::class);
    }

    public function darah()
    {
        return $this->belongsTo(Darah::class);
    }

    public function cacat()
    {
        return $this->belongsTo(Cacat::class);
    }

    public function sakit()
    {
        return $this->belongsTo(Sakit::class);
    }

    public function hamil()
    {
        return $this->belongsTo(Hamil::class);
    }

    public function kb()
    {
        return $this->belongsTo(Kb::class);
    }
}
