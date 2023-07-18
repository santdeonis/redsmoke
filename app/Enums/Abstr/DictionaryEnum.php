<?php

namespace App\Enums\Abstr;

use App\Entities\DictionaryItem;
use Illuminate\Support\Collection;

abstract class DictionaryEnum
{
    protected static array $enumItems;

    public static function all(): Collection
    {
        $objStatuses = collect();
        array_walk(static::$enumItems, function ($value, $key) use (&$objStatuses) {
            $objStatuses->add(new DictionaryItem($key, $value));
        });

        return $objStatuses;
    }

    public static function find(int $id): DictionaryItem|null
    {
        return in_array($id, array_keys(static::$enumItems))
            ? new DictionaryItem($id, static::$enumItems[$id])
            : null;
    }

    public static function toSelect(): array
    {
        return self::all()->mapWithKeys(function ($item) {
            return [
                $item->getId() => $item->getValue(),
            ];
        })->toArray();
    }
}
