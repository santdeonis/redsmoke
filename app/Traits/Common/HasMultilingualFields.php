<?php

namespace App\Traits\Common;

trait HasMultilingualFields
{
    public function getLanguageField(string $field, string|null $language = null): string
    {
        return $field . '_' . (is_null($language) ? app()->getLocale() : $language);
    }
}
