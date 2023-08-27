<?php

namespace App\Models;

use App\Models\Rw;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rt extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rw()
    {
        return $this->belongsTo(Rw::class);
    }
}
