<?php

namespace App\Abstractions\Action;

use App\Contracts\Action\RuledActionContract;
use Illuminate\Support\Facades\Validator;

abstract class Action
{
    abstract protected function handler(array $payload = []);

    final public function execute(array $payload = [])
    {
        if ($this instanceof RuledActionContract) {
            $payload = Validator::make($payload, $this->rules($payload))->validate();
        }

        return $this->handler($payload);
    }

    final public static function handle(array $payload = [], callable $before = null)
    {
        /**
         * @var self
         */
        $action = app(static::class);

        if (isset($before)) {
            $before($action);
        }

        return $action->execute($payload);
    }
}
