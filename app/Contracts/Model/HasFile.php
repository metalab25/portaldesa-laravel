<?php

namespace App\Contracts\Model;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface HasFile
{
    public function file(): HasOne|MorphOne;
}
