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

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->isoFormat('DD MMMM Y - HH:mm:ss');
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->isoFormat('DD MMMM Y - HH:mm:ss');
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
