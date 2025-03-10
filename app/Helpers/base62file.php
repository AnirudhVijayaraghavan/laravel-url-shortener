<?php

if (!function_exists('base62Encode')) {
    /**
     * Encode an integer into a base62 string.
     *
     * @param  int    $number
     * @return string
     */
    function base62Encode(int $number): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $base = strlen($characters);
        $encoded = '';

        if ($number === 0) {
            return $characters[0];
        }

        while ($number > 0) {
            $remainder = $number % $base;
            $encoded = $characters[$remainder] . $encoded;
            $number = (int) ($number / $base);
        }

        return $encoded;
    }
}

if (!function_exists('base62Decode')) {
    /**
     * Decode a base62 string back to an integer.
     *
     * @param  string  $encoded
     * @return int
     */
    function base62Decode(string $encoded): int
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $base = strlen($characters);
        $decoded = 0;
        $length = strlen($encoded);

        for ($i = 0; $i < $length; $i++) {
            $position = strpos($characters, $encoded[$i]);
            if ($position === false) {
                throw new \InvalidArgumentException("Invalid character found in input: {$encoded[$i]}");
            }
            $decoded = $decoded * $base + $position;
        }

        return $decoded;
    }
}
