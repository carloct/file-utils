<?php

namespace Belt;

class Filename
{
    /**
     * Filename constructor.
     */
    private function __construct()
    {

    }

    /**
     * Append a random string at the end of the filename
     * preserving the extension
     *
     * @param string    $filename
     * @param int       $factor     number of random character
     * @return string
     */
    public static function appendEntropy(string $filename, int $factor) : string
    {
        
    }

    /**
     * Sanitize the file name, removing nasty characters
     *
     * @param string $filename
     * @return string
     */
    public static function sanitize(string $filename) : string
    {
        return preg_replace(
            "/[^a-z0-9\\._-]+/",
            "",
            strtolower($filename)
        );
    }

    /**
     * Get filename extension, excluding the "."
     *
     * @param string $filename
     * @return string
     */
    public static function ext(string $filename) : string
    {
        return pathinfo($filename, PATHINFO_EXTENSION);
    }
}