<?php


namespace mo3golom\LaravelServiceSkeleton\Methods\Controllers;

use mo3golom\LaravelServiceSkeleton\Methods\Controllers\Contracts\DirControllerInterface;
use mo3golom\LaravelServiceSkeleton\Methods\Contracts\DirInterface;

abstract class DirController implements DirControllerInterface
{
    protected $root;
    protected $dir;
    protected $path;
    protected $subPaths;

    public function __construct(DirInterface $dir, string $root)
    {
        $this->dir = $dir;
        $this->root = $root;
    }

    public function check()
    {
        $fullPath = $this->root . '/' . $this->path;
        $this->dir->check($fullPath);
        foreach ($this->subPaths as $subPath) {
            $fullSubPath = $fullPath . '/' . $subPath;
            $this->dir->check($fullSubPath);
        }
    }
}