<?php

namespace App\Contracts\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HasPictures
{
    public function pictures(): HasMany|MorphMany;
}
