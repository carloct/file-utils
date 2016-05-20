<?php

namespace Belt;

use Illuminate\Support\Str;


class Filename
{
    /**
     * Filename constructor.
     */
    private function __construct()
    {

    }

    /**
     * Append a random string at the end of the file name
     * preserving the extension
     *
     * @param   string    $filename
     * @param   int       $factor     number of random character
     * @return  string
     */
    public static function appendEntropy(string $filename, int $factor = 6) : string
    {
        $ext = '.' . Filename::ext($filename);

        return basename($filename, $ext) . '-' . Str::random($factor) . $ext;
    }

    /**
     * Prepend a random string at the begin of the file name
     *
     * @param   string  $filename
     * @param   int     $factor
     * @return  string
     */
    public static function prependEntropy(string $filename, int $factor) : string
    {
        return Str::random($factor) . '-' . $filename;
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