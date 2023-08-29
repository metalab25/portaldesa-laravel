<?php

namespace App\Contracts\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface HasPicture
{
    public function picture(): HasOne|MorphOne;
}
