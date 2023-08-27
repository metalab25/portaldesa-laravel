<?php

namespace App\Models;

use App\Models\Wilayah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rw extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
