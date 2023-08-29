<?php

namespace App\Contracts\Action;

interface InvokeableActionContract
{
    public function __invoke(array $payload);
}
