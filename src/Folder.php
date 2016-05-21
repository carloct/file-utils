<?php

namespace Belt;

use Belt\Exceptions\FolderNotWritableException;

class Folder
{
    
    private function __construct()
    {

    }

    /**
     * Check if the folder exists and if not creates it
     *
     * @param string $folder
     * @param int $mode
     *
     * @return bool
     */
    public static function create(string $folder, int $mode = 0777) : bool
    {
        if (!file_exists($folder)) {
            return mkdir($folder, $mode, true);
        }

        return true;
    }

    /**
     * Delete folder content (recursively)
     *
     * @param string $folder
     *
     * @return void
     */
    public static function rrmdir(string $folder)
    {
        foreach (glob($folder . '/*') as $file) {
            if (is_dir($file)) {
                self::rrmdir($file);
            } else {
                unlink($file);
            }
        }

        rmdir($folder);
    }
    
    public static function empty(string $folder)
    {
        foreach (glob($folder . '/*') as $file) {
            if (is_dir($file)) {
                self::rrmdir($file);
            } else {
                unlink($file);
            }
        }
        
    }
}