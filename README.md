# Componenta Arrayable

Minimal contract for objects that expose a public array representation.

Use it when a package needs to accept DTOs, view models, pagination results, or collections without depending on a serializer implementation.

## Installation

```bash
composer require componenta/arrayable
```

## Related Packages

| Package | Why it matters here |
|---|---|
| `componenta/array` | `to_array()` consumes `Arrayable` objects. |
| `componenta/http-responder` | Responders can turn arrayable objects into JSON responses. |
| `componenta/paginator` | Pagination results can expose a public array shape. |

## Usage

```php
use Componenta\Arrayable\Arrayable;

final readonly class UserView implements Arrayable
{
    public function __construct(
        public string $id,
        public string $name,
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
```

## Contract

`Arrayable::toArray()` returns the public array representation of an object.

The interface does not define:

- JSON encoding
- recursive conversion rules
- key naming conventions
- whether private/internal state is included

Those decisions belong to the implementing object or to a serializer package.

## Typical Consumers

Packages such as paginator, iterator helpers, HTTP responders, and config exporters can depend on this contract when they only need an array shape and do not need object-specific behavior.
