<?php

namespace App\Abstractions\Action;

use App\Contracts\Action\RuledActionContract;

abstract class IndexAction extends Action implements RuledActionContract
{
    public function rules(array $payload): array
    {
        return [
            'keyword' => ['nullable', 'string'],
            'columns' => ['nullable', 'array'],
            'limit' => ['nullable', 'numeric'],
        ];
    }
}
