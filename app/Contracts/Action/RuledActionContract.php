<?php

namespace App\Contracts\Action;

interface RuledActionContract
{
    public function rules(array $payload): array;
}
