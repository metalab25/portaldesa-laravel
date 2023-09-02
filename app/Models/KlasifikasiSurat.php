<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlasifikasiSurat extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];

    protected $tabel    =   ['klasifikasi_surats'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('nama', 'like', '%' . $filters['search'] . '%')
                ->orWhere('kode', 'like', '%' . $filters['search'] . '%')
                ->orWhere('uraian', 'like', '%' . $filters['search'] . '%');
        }
    }
}
