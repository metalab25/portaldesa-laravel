<?php

namespace App\Models;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Desa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
