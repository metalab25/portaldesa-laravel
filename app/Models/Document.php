<?php

namespace App\Models;

use App\Models\User;
use App\Models\DocType;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $table = 'documents';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['search']) ? $filters['search'] : false) {
            return $query->where('jenis', 'like', '%' . $filters['search'] . '%');
        }
    }

    public function scopeFilterTahun($query, array $filters)
    {
        if (isset($filters['tahun']) ? $filters['tahun'] : false) {
            return $query->where('created_at', 'like', '%' . $filters['tahun'] . '%');
        }
    }

    // public function getCreatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])->isoFormat('DD MMMM Y - HH:mm:ss');
    // }

    // public function getUpdatedAtAttribute()
    // {
    //     return Carbon::parse($this->attributes['updated_at'])->isoFormat('DD MMMM Y - HH:mm:ss');
    // }

    public function getTglTetapanAttribute()
    {
        return Carbon::parse($this->attributes['tgl_tetapan'])->isoFormat('DD-MM-Y');
    }

    public function getTglKeputusanAttribute()
    {
        return Carbon::parse($this->attributes['tgl_keputusan'])->isoFormat('DD-MM-Y');
    }

    public function getTglSepakatAttribute()
    {
        return Carbon::parse($this->attributes['tgl_sepakat'])->isoFormat('DD-MM-Y');
    }

    public function getTglLaporkanAttribute()
    {
        return Carbon::parse($this->attributes['tgl_laporkan'])->isoFormat('DD-MM-Y');
    }

    public function getTglLembaranDiundangkanAttribute()
    {
        return Carbon::parse($this->attributes['tgl_lembaran_diundangkan'])->isoFormat('DD-MM-Y');
    }

    public function getTglBeritaDiundangkanAttribute()
    {
        return Carbon::parse($this->attributes['tgl_berita_diundangkan'])->isoFormat('DD-MM-Y');
    }

    public function doc_type()
    {
        return $this->belongsTo(DocType::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
