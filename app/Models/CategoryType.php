<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryType extends Model
{
    use HasFactory;

    protected $table = 'category_types';

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
