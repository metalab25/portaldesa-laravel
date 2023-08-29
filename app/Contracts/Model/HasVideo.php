<?php

namespace App\Contracts\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface HasVideo
{
    public function video(): HasOne|MorphOne;
}
