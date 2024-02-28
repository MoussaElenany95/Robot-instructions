<?php

/**
 * FileGeneratorService
 * to generate a file with the robot's final position
 */

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileGeneratorService
{
    /**
     * generateFile
     * @param  string  $commands
     * @param  int  $x
     * @param  int  $y
     * @return string
     */
    public static function generateFile(string $commands, int $x, int $y): string
    {
        // Generate file content
        $content = "$commands => x=$x y=$y";
        // Generate file
        $fileName = "robot.txt";
        $file = Storage::put('public/' . $fileName, $content);
        if (!$file) {
            throw new \Exception('Error generating file');
        }
        $fileUrl = Storage::url($fileName);
        return $fileUrl;
    }
}
