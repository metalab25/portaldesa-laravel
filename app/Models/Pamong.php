<?php

namespace App\Models;

use App\Models\Penduduk;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pamong extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'pamongs';

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('jabatan', 'like', '%' . $filters['search'] . '%');
        }
    }

    public function getTglPengangkatanAttribute()
    {
        return Carbon::parse($this->attributes['tgl_pengangkatan'])->isoFormat('DD MMMM Y');
    }

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }
}
