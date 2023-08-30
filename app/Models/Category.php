<?php

namespace App\Models;

use App\Models\CategoryType;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    protected $table = 'categories';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function category_type()
    {
        return $this->belongsTo(CategoryType::class);
    }

    public function post()
    {
        return $this->hasMany(Post::class);
    }
}
