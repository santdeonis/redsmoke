<?php

namespace App\Entities;

use Illuminate\Contracts\Support\Arrayable;

class DictionaryItem implements Arrayable
{
    protected int $id;
    protected string $value;

    public function __construct(int $id, string $value)
    {
        $this->id = $id;
        $this->value = $value;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'value' => __($this->value),
        ];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getValue(): string
    {
        return __($this->value);
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}
