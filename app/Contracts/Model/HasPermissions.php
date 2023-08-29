<?php

namespace App\Contracts\Model;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface HasPermissions
{
    public function permissions(): BelongsToMany;
}
