<?php

namespace App\Services\Sanitisers;

class StringSanitiser
{
    /**
     * @param string $validateData
     * @return string
     */
    public static function sanitiseString(string $validateData): string
    {
        return trim(filter_var($validateData, FILTER_SANITIZE_STRING));
    }
}
