<?php

namespace App\Contracts\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface HasRoles
{
    public function roles(): BelongsToMany;
}
