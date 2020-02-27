<?php


namespace mo3golom\LaravelServiceSkeleton\Methods;

use mo3golom\LaravelServiceSkeleton\Methods\Contracts\FileInterface;

class File implements FileInterface
{
    public function fileStrReplace($inputFile, $outputFile, $search, $replace)
    {
        $content = file_get_contents($inputFile);
        $content = str_replace($search, $replace, $content);
        file_put_contents($outputFile, $content);
    }

    public function copy($inputFile, $outputFile)
    {
        copy($inputFile, $outputFile);
    }

}