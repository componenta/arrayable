<?php

declare(strict_types=1);

namespace Componenta\Arrayable\Tests;

use Componenta\Arrayable\Arrayable;

it('defines an object to array conversion contract', function (): void {
    $value = new class implements Arrayable {
        public function toArray(): array
        {
            return ['id' => 1];
        }
    };

    expect($value->toArray())->toBe(['id' => 1]);
});
