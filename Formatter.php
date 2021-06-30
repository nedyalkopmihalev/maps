<?php

/**
 * Class Formatter
 */
class Formatter
{
    /**
     * @param string $address
     * @return string
     */
    public static function formatAddress(string $address): string
    {
        $address = str_replace('+', ' ', $address);

        return $address;
    }
}