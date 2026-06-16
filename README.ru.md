# Componenta Arrayable

Минимальный контракт для объектов, которые раскрывают публичное array-представление.

Используйте его, когда пакету нужно принимать DTO, view models, pagination results или collections без зависимости от конкретного serializer.

## Установка

```bash
composer require componenta/arrayable
```

## Связанные пакеты

| Пакет | Зачем нужен здесь |
|---|---|
| `componenta/array` | Функция `to_array()` использует `Arrayable`, если объект умеет раскрывать массивное представление. |
| `componenta/http-responder` | HTTP responder может безопасно превращать arrayable-объекты в JSON-ответ. |
| `componenta/paginator` | Пагинаторы могут раскрывать публичное представление через `toArray()`. |
| сериализатор приложения | Определяет правила рекурсивного обхода и имена полей; `Arrayable` задаёт только минимальный интерфейс. |

## Использование

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

## Контракт

`Arrayable::toArray()` возвращает публичное array-представление объекта.

Интерфейс не определяет:

- JSON encoding
- правила recursive conversion
- соглашения по именам ключей
- включается ли private/internal state

Эти решения принадлежат реализации или serializer-пакету.

## Типичные Потребители

Пагинаторы, итераторы, HTTP-ответы и экспортёры конфигурации могут зависеть от этого интерфейса, когда им нужно только массивное представление, а не поведение конкретного объекта.
