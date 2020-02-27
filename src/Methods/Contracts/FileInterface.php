<?php


namespace mo3golom\LaravelServiceSkeleton\Methods\Contracts;


interface FileInterface
{
    public function fileStrReplace($inputFile, $outputFile, $search, $replace);

    public function copy($inputFile,$outputFile);
}