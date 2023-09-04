<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Models\KlasifikasiSurat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'surat_keluars';

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('nomor_urut', 'like', '%' . $filters['search'] . '%')
                ->orWhere('nomor_surat', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tanggal_surat', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tujuan', 'like', '%' . $filters['search'] . '%')
                ->orWhere('short_desc', 'like', '%' . $filters['search'] . '%');
        }
    }

    public function klasifikasi_surat()
    {
        return $this->belongsTo(KlasifikasiSurat::class);
    }

    public function getTanggalSuratAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_surat'])->isoFormat('DD-MM-Y');
    }

    public static function getNoUrut()
    {
        return $getNoUrut = SuratKeluar::orderBy('nomor_urut')->take(1)->get();
    }
}
