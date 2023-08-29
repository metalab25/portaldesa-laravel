<?php

namespace App\Contracts\Model;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HasSpecifications
{
    public function specifications(): MorphMany;
}
