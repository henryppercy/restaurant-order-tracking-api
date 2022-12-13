<?php

namespace App\Services\Sanitisers;

class StringSanitiser
{
    /**
     * @param string $validateData
     * @return string
     */
    public static function sanitiseString(?string $validateData): string
    {
        if ($validateData === null) {
            return '';
        }
        $clean = filter_var($validateData, FILTER_SANITIZE_STRING);
        $clean = trim($clean);
        return $clean;
    }
}
