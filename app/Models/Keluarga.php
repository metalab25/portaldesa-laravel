<?php

namespace App\Models;

use App\Models\Rt;
use App\Models\Rw;
use Carbon\Carbon;
use App\Models\Wilayah;
use App\Models\Penduduk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Keluarga extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];
    protected $table    = 'keluargas';

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d M Y H:i:s');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->format('d M Y H:i:s');
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

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class);
    }

    public function anggota(): HasMany
    {
        return $this->hasMany(Penduduk::class);
    }

    public function kelamin()
    {
        return $this->belongsTo(Kelamin::class);
    }
}
