<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Kelamin;
use App\Models\HubunganKeluarga;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penduduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->format('d M Y H:i:s');
    }

    public function kelamin()
    {
        return $this->belongsTo(Kelamin::class);
    }

    public function hubungan_keluarga()
    {
        return $this->belongsTo(HubunganKeluarga::class);
    }
}
