<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Wilayah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function childs(): HasMany
    {
        return $this->hasMany(static::class, 'parent');
    }

    public function listRw()
    {
        return $this->childs()->whereLevel(2);
    }

    // public function listRt()
    // {
    //     if ($this->level == 1);

    //     $this->hasManyTrough(static::class, static::class, 'parent', 'parent');

    //     return $this->childs()->whereLevel(3);
    // }
}
